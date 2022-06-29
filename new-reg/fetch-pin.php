<?php
	include('include/config.php');

	$category_id = $_POST["category_id"];
	$result = mysqli_query($conn,"SELECT * FROM tbl_dealer where city = '$category_id'");
	?>
	<option value="">--select PIN Code--</option>
	<?php
	while($row = mysqli_fetch_array($result)) {
	?>
	<option value="<?php echo $row["pincode"];?>"><?php echo $row["pincode"];?></option>
	<?php
	}
?>