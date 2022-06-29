<?php
include 'includes/session.php';
		$id = $_GET['id'];
		$sql = "DELETE FROM tbl_demo WHERE id = '$id'";
		if($conn->query($sql)){
			echo "<script>alert('Record deleted successfully')</script>";
               echo "<script>window.location.href='place-order.php'</script>"; 
		}else{
			$_SESSION['error'] = $conn->error;
		}
?>