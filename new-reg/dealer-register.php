<!DOCTYPE html>
<html>
<head>
<title>Dealer Register :: Quick Secure India</title>
<link rel="stylesheet" href="login_css/bootstrap.min.css">
<link rel="stylesheet" href="login_css/bootstrap-select.css">
<link href="login_css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
 
<!-- //for-mobile-apps -->
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--//fonts-->	
 

 <script type="text/javascript">
		$(function(){
			//insert record
			$('#add1').click(function(){
 			        
 	 
			var txtDealerName1 = $('#txtDealerName').val();
			var txtStoreName1 = $('#txtStoreName').val();
			var txtAddress1 = $('#txtAddress').val();
			var txtCity1 = $('#txtCity').val();
			var txtState1 = $('#txtState').val();

      var txtPinNo1 = $('#txtPinNo').val();
      var txtGST1 = $('#txtGSTIN').val();
      var txtPhNo1 = $('#txtMobileNo').val();
      var txtEMail1 = $('#txtEmail').val();
 	
 			var txtUserID1 = $('#txtUserID').val();
			var txtPWD1 = $('#txtPWD').val();

			//syntax - $.post('filename', {data}, function(response){});
				$.post('insert-dealer-data.php',{action: "add1", txtDealerName:txtDealerName1,txtStoreName:txtStoreName1,txtAddress:txtAddress1,txtCity:txtCity1,txtState:txtState1,txtPinNo:txtPinNo1,txtGST:txtGST1,txtPhNo:txtPhNo1,txtEMail:txtEMail1,txtUserID:txtUserID1,txtPWD:txtPWD1},function(res){
					$('#result').html(res);
				});		

					$('#txtDealerName').val('');
          $('#txtStoreName').val('');
          $('#txtAddress').val('');
          $('#txtCity').val('');
          $('#txtState').val('');

          $('#txtPinNo').val('');
          $('#txtGSTIN').val('');
          $('#txtMobileNo').val('');
          $('#txtEmail').val('');

          $('#txtUserID').val('');
          $('#txtPWD').val('');
				});

 
 
			});
</script>		

</head>
<body>
<div class="header" style="position: fixed;">
		<div class="container">
			<div class="logo">
				<!--<a href="index.php"><span>Quick</span> Secure India</a>-->
				<a href="index.php"><img src="logo.png" style="width:300px; height: auto;"></a>
			</div>
			<div class="header-right">
			<a class="account" href="dealer-login.php">Login as Dealer</a>
			 
	 
		</div>
		</div>
	</div>
	 <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-up">
						<h1>Create an account</h1>
					 
						<h2>Personal Information</h2>
				<form method="post" action="insert-dealer-data.php">	
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Dealer Name :</h4>
							</div>
							<div class="sign-up2">
									<input type="text" name="txtDealerName" id="txtDealerName" placeholder="Dealer Name" required>
							</div>
							<div class="clearfix"> </div>
						</div>

						<div class="sign-u">
							<div class="sign-up1">
								<h4>Store Name :</h4>
							</div>
							<div class="sign-up2">
									<input type="text" name="txtStoreName" id="txtStoreName" placeholder="Store Name" required>
							</div>
							<div class="clearfix"> </div>
						</div>

						<div class="sign-u">
							<div class="sign-up1">
								<h4>Address :</h4>
							</div>
							<div class="sign-up2">
									<input type="text" name="txtAddress" id="txtAddress" placeholder="Address" required>
							</div>
							<div class="clearfix"> </div>
						</div>

						<div class="sign-u">
							<div class="sign-up1">
								<h4>City :</h4>
							</div>
							<div class="sign-up2">
									<input type="text" name="txtCity" id="txtCity" placeholder="City Name" required>
							</div>
							<div class="clearfix"> </div>
						</div>

						<div class="sign-u">
							<div class="sign-up1">
								<h4>State :</h4>
							</div>
							<div class="sign-up2">
									<input type="text" name="txtState" id="txtState" placeholder="State Name" required>
							</div>
							<div class="clearfix"> </div>
						</div>

						<div class="sign-u">
							<div class="sign-up1">
								<h4>PIN Code :</h4>
							</div>
							<div class="sign-up2">
									<input type="text" name="txtPinNo" id="txtPinNo" placeholder="PIN No." required>
							</div>
							<div class="clearfix"> </div>
						</div>

						<div class="sign-u">
							<div class="sign-up1">
								<h4>GSTN :</h4>
							</div>
							<div class="sign-up2">
									<input type="text" name="txtGSTIN" id="txtGSTIN" placeholder="GSTIN" required>
							</div>
							<div class="clearfix"> </div>
						</div>

						<div class="sign-u">
							<div class="sign-up1">
								<h4>Reg. Mobile No. :</h4>
							</div>
							<div class="sign-up2">
									<input type="text" name="txtMobileNo" id="txtMobileNo" placeholder="Mobile No. " required>
							</div>
							<div class="clearfix"> </div>
						</div>


						<div class="sign-u">
							<div class="sign-up1">
								<h4>Email ID* :</h4>
							</div>
							<div class="sign-up2">
									<input type="text" name="txtEmail" id="txtEmail" placeholder="E-Mail " required>
							</div>
							<div class="clearfix"> </div>
						</div>

						<div class="sign-u">
							<div class="sign-up1">
								<h4>User ID :</h4>
							</div>
							<div class="sign-up2">
									<input type="text" name="txtUserID" id="txtUserID" placeholder="User ID for Login " required>
							</div>
							<div class="clearfix"> </div>
						</div>


						<div class="sign-u">
							<div class="sign-up1">
								<h4>Password* :</h4>
							</div>
							<div class="sign-up2">
									<input type="password" name="txtPWD" id="txtPWD" placeholder=" " required>
							</div>
							<div class="clearfix"> </div>
						</div>


						<div class="sign-u">
							<div class="sign-up1">
								<h4>Confirm Password* :</h4>
							</div>
							<div class="sign-up2">
									<input type="password" name="txtPWD1" id="txtPWD1" placeholder=" " onkeyup='check1();' required>
							</div> 
							<div class="clearfix"> </div>
						</div>
<h3><span id='message1'></span></h3>
<script>
    
var check1 = function() {
  if (document.getElementById('txtPWD').value ==
    document.getElementById('txtPWD1').value) {
    document.getElementById('message1').style.color = 'green';
    document.getElementById('message1').innerHTML = 'Matching';
    document.getElementById('submit').disabled = false;
  } else {
    document.getElementById('message1').style.color = 'red';
    document.getElementById('message1').innerHTML = 'Not Matching';
    document.getElementById('submit').disabled = true;
  }
}    
    
</script>
						<div class="sub_home">
							<div class="sub_home_left">
									<input type="submit" name="submit" id="submit" value="Save">
									 
							</div>
							<div class="sub_home_right">
								<p>Go Back to <a href="index.php">Home</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
</form>

					</div>
				</div>
			</div>
		<!--footer section start-->
			<footer class="diff">
			   <p class="text-center">© 2021-2022 Quick Secure India</p>
			</footer>
        <!--footer section end-->
	</section>
</body>
</html>