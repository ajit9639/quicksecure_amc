<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM tbl_peripherals_order_by_dealer WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Delete selected record successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: periferals-detail-from-dealer.php');
	
?>