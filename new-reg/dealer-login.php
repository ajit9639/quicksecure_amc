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
	$_SESSION['admin']=$uid;

$_SESSION['dlrid']=$num['id'];

	$_SESSION['user'] = $num['dealer_name'];
	$_SESSION['dlr'] = $num['uid'];
	$_SESSION['userid'] = $num['dealerid'];

	// $extra="../dealer/";
	// $host=$_SERVER['HTTP_HOST'];
	// $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	// if($_SERVER['SERVER-NAME'] == "localhost"){
		header("location:../dealer/index.php");
	// }else{
		// header("location:https://$host$uri/$extra");
	// }
	exit();
}
else
{
	$_SESSION['errmsg']="Invalid username or password";
	$extra="dealer-login.php";
	// $host  = $_SERVER['HTTP_HOST'];
	// $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	// if($_SERVER['SERVER-NAME'] == "localhost"){
		header("location:$extra");
	// }else{
		// header("location:https://$host$uri/$extra");
	// }
	exit();
}


}

?>


<!DOCTYPE html>
<html>
<head>
<title>Dealer Login :: Quick Secure India</title>
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
	
	 <section><form class="register-form outer-top-xs" method="post">
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-in-form">
						<div class="sign-in-form-top">
							<h1>Dealer Login..</h1>
						</div>
						<div class="signin">
							<div class="signin-rit">
								<span class="checkbox1">
									 <label class="checkbox"><input type="checkbox" name="checkbox" checked="">Forgot Password ?</label>
								</span>
								<p>
	
	<a href="forgot-password.php">Click Here</a> </p>

								<div class="clearfix"> </div>
							</div>
				 
							<div class="log-input">
								<div class="log-input-left">
								   <input type="text" id="txtUID" name="txtUID" class="user" value="" placeholder="Enter User ID"/>
								</div>
			 
								<div class="clearfix"> </div>
							</div>
							<div class="log-input">
								<div class="log-input-left">
								   <input type="password" id="txtPWD" name="txtPWD" class="lock" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password:';}"/>
								</div>
				 
								<div class="clearfix"> </div>
							</div>
							<input type="submit" name="login" value="Log in">
					 
						</div>
						<div class="new_people">
				
	 
							<a href="dealer-register.php">Dealer Register Now!</a>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!--footer section start-->
			<footer class="diff">
			   <p class="text-center">© 2022-23 Quick Secure India</p>
			</footer>
        <!--footer section end-->
	</section>
</body>
</html>