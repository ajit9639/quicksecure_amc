<?php
session_start();
//error_reporting(0);
include('include/config.php');
 	$timezone = 'Asia/Kolkata';
	date_default_timezone_set($timezone);
 
// Code for User login
if(isset($_POST['login']))
{
   //$email=$_POST['txtEmail'];
   $password=$_POST['txtPWD'];
   $uid=$_POST['txtUID'];
 
 	$usrtype="Dealer";
 	$dlrnm = $_POST['txtDealerName'];
 
// echo "SELECT * FROM tbl_staff_master WHERE uid='$uid' and status='Y'";exit();
$query=mysqli_query($conn,"SELECT * FROM tbl_staff_master WHERE uid='$uid' and status='Y'");
$num=mysqli_fetch_array($query);

 

if($num>0 && $num['pwd']==$password)
{
	$_SESSION['id']=$num['id'];	
	$_SESSION['stfid'] = $num['staffid'];

	$_SESSION['staff']=$num['uid'];

	$_SESSION['user1'] = $num['staff_name'];
	$_SESSION['usrtype'] = $num['uid'];

	$_SESSION['dlrnm'] = $dlrnm;

$stfid=$num['id'];
$curdt=date('d-m-Y');
$curtm= date( 'h:i:s A', time () );

       $sql = "INSERT INTO tbl_log (staff_id,staff_dt,staff_tm) VALUES ('$stfid', '$curdt', '$curtm')";

            if (mysqli_query($conn, $sql)) {}else{echo $conn->error;}


	$extra="../amc/";
	$host=$_SERVER['HTTP_HOST'];
	$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("location:https://$host$uri/$extra");
	exit();
}
else
{
	$_SESSION['errmsg']="Invalid username or password";
	echo $_SESSION['errmsg'];
	$extra="staff-login.php";
	$host  = $_SERVER['HTTP_HOST'];
	$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("location:http://$host$uri/$extra");
	exit();
}


}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Login :: Quick Secure India</title>
    <link rel="stylesheet" href="login_css/bootstrap.min.css">
    <link rel="stylesheet" href="login_css/bootstrap-select.css">
    <link href="login_css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- //for-mobile-apps -->
    <!--fonts-->
    <link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <link
        href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'>
    <!--//fonts-->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body style="background: url(./upload/bg.jpg);
    background-size: cover;
    background-position: bottom;
    height: 100vh;
    background-repeat: no-repeat;">
    <div class="header" style="position: fixed;">
        <div class="container">
            <div class="logo">
                <!--<a href="index.php"><span>Quick</span> Secure India</a>-->
                <a href="index.php"><img src="logo.png" style="width:300px; height: auto;"></a>
            </div>

            <!--<div class="header-right">
				<a class="account" href="staff-register.php">Staff Registration</a>&nbsp;&nbsp;
	   		<a class="account" href="dealer-register.php">Dealer Registration</a>
			</div>-->

        </div>
    </div>

    <section>
        <form class="register-form outer-top-xs" method="post">
            <div id="page-wrapper" class="sign-in-wrapper">
                <div class="graphs">
                    <div class="sign-in-form">
                        <div class="sign-in-form-top">
                        <h1 style="text-align:center">Log in as staff</h1>
                        </div>
                        <div class="signin">
						<div class="">
                           
                        </div>
                            <!-- <div class="signin-rit">
                                <span class="checkbox1">
                                    <label class="checkbox"><input type="checkbox" name="checkbox" checked="">Forgot
                                        Password ?</label>
                                </span>
                                <p>

                                    <a href="forgot-password.php">Click Here</a>
                                </p>

                                <div class="clearfix"> </div>
                            </div> -->

                            <div class="log-input">
                                <div class="log-input-left">
                                    <select class="user" name="txtCity" id="txtCity">
                                        <option value="0">--select City--</option>
                                        <?php
									 		$sql = "SELECT * FROM tbl_dealer order by id asc";
											 $query = $conn->query($sql);
											   while($row = $query->fetch_assoc()){

									   ?>
                                        <option value="<?php echo $row['city'];?>"><?php echo $row['city'];?></option>
                                        <?php }?>
                                    </select>
                                </div>


                            </div>
                            <script type="text/javascript">
                            $(document).ready(function() {
                                $('#txtCity').on('change', function() {
                                    var category_id = this.value;
                                    $.ajax({
                                        url: "fetch-pin.php",
                                        type: "POST",
                                        data: {
                                            category_id: category_id
                                        },
                                        cache: false,
                                        success: function(result) {
                                            $("#txtPinCode").html(result);
                                        }
                                    });
                                });
                            });

                            //0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0\\
                            $(document).ready(function() {
                                $('#txtPinCode').on('change', function() {
                                    var category_id = this.value;
                                    $.ajax({
                                        url: "fetch-dealer.php",
                                        type: "POST",
                                        data: {
                                            category_id: category_id
                                        },
                                        cache: false,
                                        success: function(result) {
                                            $("#txtDealerName").html(result);
                                        }
                                    });
                                });
                            });
                            </script>
                            <div class="log-input">
                                <div class="log-input-left">
                                    <select class="user" name="txtPinCode" id="txtPinCode"></select>
                                </div>


                            </div>

                            <div class="log-input">
                                <div class="log-input-left">
                                    <select class="user" name="txtDealerName" id="txtDealerName"></select>
                                </div>


                            </div>

                            <div class="log-input">
                                <div class="log-input-left">
                                    <input type="text" id="txtUID" name="txtUID" class="user" value=""
                                        placeholder="Enter User ID" />
                                </div>

                                <div class="clearfix"> </div>
                            </div>


                            <div class="log-input">
                                <div class="log-input-left">
                                    <input type="password" id="txtPWD" name="txtPWD" class="lock" value="" 
									placeholder="Enter Password"/>
                                </div>

                                <div class="clearfix"> </div>
                            </div>
							<div style="display:flex">

								<input type="submit" name="login" value="Log in">
								<div class="new_people">
                            <a href="staff-register.php">Staff Register Now!</a>
                        </div>
							</div>

                        </div>
                        <!-- <div class="new_people">
                            <a href="staff-register.php">Staff Register Now!</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </form>
        <!--footer section start-->
        <footer class="diff">
            <p class="text-center">© 2021-2022 Quick Secure India</p>
        </footer>
        <!--footer section end-->
    </section>
</body>

</html>