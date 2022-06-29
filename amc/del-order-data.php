<?php
	include 'includes/session.php';

	// if(isset($_POST['delete'])){
		$id = $_GET['id'];
		$sql = "DELETE FROM tbl_order WHERE id = '$id'";
		if($conn->query($sql)){
			 
			echo "<script>alert('Data Deleted successfully')</script>";
			echo "<script>window.location.href='order-detail.php'</script>";
		}
		else{
			$err = $conn->error;
			echo "<script>alert('".$err."')</script>";
			echo "<script>window.location.href='order-detail.php'</script>";			
		}
	// }
	// else{
	 
	// 	echo "<script>alert('Select item to delete first')</script>";
	// }
       
 
	
?>