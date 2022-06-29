<?php
//include('db.php');
	session_start();

	include "config.php";
	$_SESSION['last_action'] = time();
	//Array to store validation errors
	
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
 
	
	//Sanitize the POST values
	$login = $_POST['username'];
	$password = $_POST['password'];
	$usrtype = $_POST['txtUserType'];
	//Input Validations
	if($login == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	

	 
	//Create query
	$sql="SELECT * FROM tbl_admin WHERE uid='$login' and user_type='$usrtype'";

			if($result = mysqli_query($conn, $sql)){
				if(mysqli_num_rows($result) > 0){
	
			session_regenerate_id();
			$member = mysqli_fetch_array($result);

					if ($member['pwd']==$password) {
						$_SESSION['userid'] = $member['id'];
						$_SESSION['user'] = $member['user_name'];
						 $_SESSION['usrtype'] = $member['user_type'];
						 
						$_SESSION['address']= $member['id'];
						$_SESSION['mobile']= $member['id'];
						$_SESSION['admin']= $member['uid'];

							session_write_close();
							header("location: ../dealer/");
					}else {
 
                        $_SESSION['error'] ='Wrong login details';
                        header("location: ./");
			
						}

			}else {
 
                        $_SESSION['usrtype'] ='Wrong login details';
                        header("location: ./");
		}
	}else {
		die("Query failed");
	}
?>