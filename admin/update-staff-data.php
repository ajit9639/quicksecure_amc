<?php
	//connect to db
include 'includes/session.php';

	//if insert key is pressed then do insertion
	//if($_POST['action'] == 'add1'){

 
		
		$tID= $_POST['txtID']; 
		$tStaffName= $_POST['txtStaffName']; 
		$tAddress= $_POST['txtAddress']; 
		$tCity= $_POST['txtCity']; 
		$tState= $_POST['txtState']; 
		$tArea= $_POST['txtArea'];
		$tPinNo= $_POST['txtPinNo']; 
		$tDesignation= $_POST['txtDesignation']; 
		$tPhNo= $_POST['txtPhNo']; 
		$tEMail= $_POST['txtEMail']; 
		$tManager= $_POST['txtManager'];
		$tStatus= $_POST['txtStatus'];
		 
		  

		$sql = "update tbl_staff_master set staff_name='$tStaffName',address='$tAddress',city='$tCity',state1='$tState',pincode='$tPinNo',area='$tArea',phno='$tPhNo',email='$tEMail',manager='$tManager',designation='$tDesignation', status='$tStatus' where id='$tID'";

		if($conn->query($sql)){
			//$_SESSION['success'] = 'Record updated successfully';
 			//echo "Record updated successfully";
 		?>
 		<script type="text/javascript">
 			alert("Record updated successfully.......");
 		</script>
 		<?php	
 		echo "<script>window.location.href='staff-detail.php'</script>"; 
		}
		else{
			$_SESSION['error'] = $conn->error;
			echo $conn->error;
		}
		
	//}
	


?>
