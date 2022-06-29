<?php
session_start();
//error_reporting(0);
include('include/config.php');
 
 
// Code for User login
if(isset($_POST['login']))
{
   //$email=$_POST['txtEmail'];
   $password=$_POST['txtPWD'];
   $uid=$_POST['txtUID'];
 
 	$usrtype="Dealer";

$query=mysqli_query($conn,"SELECT * FROM tbl_dealer WHERE uid='$uid' and status='Y'");
$num=mysqli_fetch_array($query);
 

if($num>0 && $num['pwd']==$password)
{
	$_SESSION['id']=$num['id'];	
	$_SESSION['dealer']=$num['uid'];

	$_SESSION['user'] = $num['dealer_name'];
	$_SESSION['usrtype'] = $num['uid'];
	$_SESSION['userid'] = $num['uid'];

	$extra="../dealer/";
	$host=$_SERVER['HTTP_HOST'];
	$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("location:http://$host/$uri/$extra");
	exit();
}
else
{
	$_SESSION['errmsg']="Invalid username or password";
	$extra="dealer-login.php";
	$host  = $_SERVER['HTTP_HOST'];
	$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("location:http://$host/$uri/$extra");
	exit();
}


}

?>


<!DOCTYPE html>
<html>
<head>
<title>Forgot Password :: Quick Secure India</title>
<link rel="stylesheet" href="login_css/bootstrap.min.css">
<link rel="stylesheet" href="login_css/bootstrap-select.css">
<link href="login_css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--//fonts-->	
 
 
</head>
<body>
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
	     <form class="register-form outer-top-xs" method="post" action="forgot-email.php">
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-in-form">
						<div class="sign-in-form-top">
							<h1>Forgot Password ?</h1>
						</div>
						<div class="signin">
				 
				 
							<div class="log-input">
								<div class="log-input-left">
								   <input type="text" id="txtEMail" name="txtEMail" class="user" value="" placeholder="Enter Registered E-Mail ID"/>
								</div>
			 
								<div class="clearfix"> </div>
							</div>
	 
							<input type="submit" name="login" value="Submit">
					 
						</div>
						<div class="new_people">
				
	 
							<a href="./">Back to Login</a>
						</div>
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