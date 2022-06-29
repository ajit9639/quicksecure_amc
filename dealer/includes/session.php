<?php
	session_start();
	include 'includes/conn.php';

	if(!isset($_SESSION['dlr']) || trim($_SESSION['dlr']) == ''){
		header('location: ../new-reg/dealer-login.php');
	}

	//$sql = "SELECT * FROM tbl_admin WHERE uid = '".$_SESSION['admin']."' and user_type='".$_SESSION['usrtype']."'";

	$sql = "SELECT * FROM tbl_dealer WHERE uid = '".$_SESSION['dlr']."' and status='Y'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>