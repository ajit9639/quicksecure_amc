<!DOCTYPE html>
<html>
<head>
<title>Staff Register :: Quick Secure India</title>
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
 <style>
	.form-control{
		background-color: #dadbba!important;
	}
 </style>
 </head>
<body style="background: url(./upload/bg.jpg);
    background-size: cover;
    background-position: bottom;
    height: 100%;
    background-repeat: no-repeat;">
<div class="header" style="position: fixed;">

		<div class="container">
			<div class="logo">
				<!--<a href="index.php"><span>Quick</span> Secure India</a>-->
				<a href="./"><img src="logo.png" style="width:300px; height: auto;"></a>
			</div>
			<div class="header-right">
			<a class="account" href="staff-login.php">Login as Staff</a>
			 
	 
		</div>
		</div>


	</div>

	
	 <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-up">
						<h1>Staff Registration</h1>
					 
						<!-- <h2>Personal Information</h2> -->
				<form method="post" action="insert-staff-data.php" enctype="multipart/form-data">	

						<div class="sign-u">
							<div class="sign-up1">
								<h4>Location :</h4>
							</div>
							<div class="sign-up2">
								<select id="txtLoc" name="txtLoc" class="form-control" required>
									<option value="0" selected>-- Select Location --</option>
									 <?php
									 		include "include/config.php";
							        $sql = "SELECT * FROM tbl_loc order by loc";
							        $query = $conn->query($sql);
							          while($row = $query->fetch_assoc()){
							     ?>     	
			            
										<option value="<?php echo $row['loc'];?>"><?php echo $row['loc'];?></option>
									<?php }?>
								</select>
							</div>
							<div class="clearfix"> </div>
						</div>

						<div class="sign-u">
							<div class="sign-up1">
								<h4>Staff Name :</h4>
							</div>
							<div class="sign-up2">
									<input type="text" name="txtStaffName" id="txtStaffName" placeholder="Staff Name" required>
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
								<h4>Area :</h4>
							</div>
							<div class="sign-up2">
									<input type="text" name="txtArea" id="txtArea" placeholder="Area" required>
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
								<h4>Designation :</h4>
							</div>
							<div class="sign-up2">
			          <select id="txtDesignation" name="txtDesignation" class="form-control" required>
			            <option value="0" selected>-- Select Designation --</option>
			            <?php
			            include "include/config.php";
			             $sql = "SELECT * FROM tbl_designation";
			              $query = $conn->query($sql);
			              while($row1 = $query->fetch_assoc()){
			               ?>
			              <option value="<?php echo $row1['designation'];?>"><?php echo $row1['designation'];?></option>
			            <?php    
			              }
			            ?>
			          </select>
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

						<div class="sign-u">
							<div class="sign-up1">
								<h4>Upload Your Photo :</h4>
							</div>
							<div class="sign-up2">
									<input type="file" id="fileToUpload" name="fileToUpload">
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
							<!-- <div class="sub_home_right">
								<p>Go Back to <a href="index.php">Home</a></p>
							</div> -->
							<div class="clearfix"> </div>
						</div>
</form>

					</div>
				</div>
			</div>
		<!--footer section start-->
			<!-- <footer class="diff">
			   <p class="text-center">© 2021-2022 Quick Secure India</p>
			</footer> -->
        <!--footer section end-->
	</section>
</body>
</html>