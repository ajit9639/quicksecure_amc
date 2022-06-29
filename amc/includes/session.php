<?php
	session_start();
	include 'includes/conn.php';

	if(!isset($_SESSION['staff']) || trim($_SESSION['staff']) == ''){
	  	header('location: ../new-reg/');
	}

  
	//$sql = "SELECT * FROM tbl_staff_master WHERE uid = '".$_SESSION['admin']."' and status='Y'";
	
	$sql = "SELECT * FROM tbl_staff_master WHERE uid = '".$_SESSION['staff']."' and status='Y'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
	 
?>