<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM tbl_staff_master WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Dealer deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: staff-detail.php');
	
?>