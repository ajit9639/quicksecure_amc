<?php
error_reporting(0);
global $conn;
session_start();


if($_SERVER['SERVER_NAME']=="localhost"){
	$conn = new mysqli('localhost', 'root', '', 'sodhukno_DealeramcDB');
}else{
	$conn = new mysqli('localhost', 'sodhukno_dealer', 'VNA1Pj)E0DUv', 'sodhukno_DealeramcDB');
}
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($cnn,$str) {
		global $conn;
		$str = @trim($str);
		// if(get_magic_quotes_gpc()) {
		// 	$str = stripslashes($str);
		// }
		return mysqli_real_escape_string($conn,$str);
	}
	
?>