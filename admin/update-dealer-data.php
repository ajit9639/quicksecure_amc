<?php
	//connect to db
include 'includes/session.php';

	//if insert key is pressed then do insertion
	if($_POST['action'] == 'add1'){

 
		
		$tID= $_POST['txtID']; 
		$tDealerName= $_POST['txtDealerName']; 
		$tStoreName= $_POST['txtStoreName']; 
		$tAddress= $_POST['txtAddress']; 
		$tCity= $_POST['txtCity']; 
		$tState= $_POST['txtState']; 

		$tPinNo= $_POST['txtPinNo']; 
		$tGST= $_POST['txtGST']; 
		$tPhNo= $_POST['txtPhNo']; 
		$tEMail= $_POST['txtEMail']; 


		$txtUserid= $_POST['txtUserid']; 
		$txtPass= $_POST['txtPass']; 
		 
		$tStatus= $_POST['txtStatus']; 
		  
		
		$sql = "update tbl_dealer set dealer_name='$tDealerName',store_name='$tStoreName',address='$tAddress',city='$tCity',state1='$tState',pincode='$tPinNo',gst='$tGST',phno='$tPhNo',email='$tEMail', status='$tStatus', uid='$txtUserid', pwd='$txtPass' where id='$tID'";

		if($conn->query($sql)){
			//$_SESSION['success'] = 'Record updated successfully';
 			//echo "Record updated successfully";
 		?>
 		<script type="text/javascript">
 			alert("Record updated successfully.......");
 		</script>
 		<?php	
 		echo "<script>window.location.href='dealer-detail.php'</script>"; 
		}
		else{
			$_SESSION['error'] = $conn->error;
			echo $conn->error;
		}
		
	}
	


?>
