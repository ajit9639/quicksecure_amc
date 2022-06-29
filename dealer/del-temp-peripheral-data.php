<?php
include 'includes/session.php';
		$id = $_GET['id'];
		$sql = "DELETE FROM tbl_peripheral_tmp WHERE id = '$id'";
		if($conn->query($sql)){
			echo "<script>alert('Record deleted successfully')</script>";
               echo "<script>window.location.href='periferals-new-entry.php'</script>"; 
		}else{
			$_SESSION['error'] = $conn->error;
		}
?>