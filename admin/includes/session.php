<?php
	session_start();
	include 'includes/conn.php';

	if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
		//header('location: ../login/');
		echo "<script>window.location.href='../login/'</script>"; 
	}

	$sql = "SELECT * FROM tbl_admin WHERE uid = '".$_SESSION['admin']."' and user_type='".$_SESSION['usrtype']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>