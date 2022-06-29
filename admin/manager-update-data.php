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
 
		$tPinNo= $_POST['txtPinNo']; 
	 
		$tPhNo= $_POST['txtPhNo']; 
		$tEMail= $_POST['txtEMail']; 
 
		 
		  

		$sql = "update tbl_manager set staff_name='$tStaffName',address='$tAddress',city='$tCity',state1='$tState',pincode='$tPinNo',phno='$tPhNo',email='$tEMail' where id='$tID'";

		if($conn->query($sql)){
			//$_SESSION['success'] = 'Record updated successfully';
 			//echo "Record updated successfully";
 		?>
 		<script type="text/javascript">
 			alert("Record updated successfully.......");
 		</script>
 		<?php	
 		echo "<script>window.location.href='manager-detail.php'</script>"; 
		}
		else{
			$_SESSION['error'] = $conn->error;
			echo $conn->error;
		}
		
	//}
	


?>
