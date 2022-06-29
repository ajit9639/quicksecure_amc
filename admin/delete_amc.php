<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM tbl_amc WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Selected record deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: amc-detail.php');
	
?>