<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="index.html">
			  		Shoping Cart | Seller Panel
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
					<ul class="nav pull-right">
						<li><a href="#">
							<?php echo $_SESSION['slogin']; ?>
						</a></li>
						<li class="nav-user dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="images/user.png" class="nav-avatar" />
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="change-password.php?eml=<?php echo $_SESSION['slogin'];?>">Change Password</a></li>
								<li class="divider"></li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
<!--<marquee behavior="left" scrollamount="1" scrolldelay="30" trueSpeed style="vertical-align:middle; cursor:pointer;" onmouseover="javascript:this.setAttribute('scrollamount','0');" onmouseout="javascript:this.setAttribute('scrollamount','1');">-->

<?php 
/*
$query=mysqli_query($con,"select * from tblmsg");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
	if($cnt%2==0){$fntclr="blue";}else{$fntclr="red";}*/
?>
<!--<font color="<?php //echo $fntclr;?>">#&nbsp;<?php //echo htmlentities($row['msg']);?>&nbsp;</font>-->
<?php //$cnt=$cnt+1;} ?>	

<!--</marquee>-->
			
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->


