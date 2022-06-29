<?php
	include('include/config.php');

	$category_id = $_POST["category_id"];
	$result = mysqli_query($conn,"SELECT * FROM tbl_dealer where pincode = '$category_id'");
	?>
	<option value="">--select Dealer--</option>
	<?php
	while($row = mysqli_fetch_array($result)) {
	?>
	<option value="<?php echo $row["dealer_name"];?>"><?php echo $row["dealer_name"];?></option>
	<?php
	}
?>