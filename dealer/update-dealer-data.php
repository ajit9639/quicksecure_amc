<?php
	//connect to db
include 'includes/session.php';

	//if insert key is pressed then do insertion
	if($_POST['action'] == 'add1'){

		//$name  = mysql_real_escape_string($_POST['name']);
		//$email = mysql_real_escape_string($_POST['email']);
		
		$tID= $_POST['txtID']; 
		$tWorkOrderNo= $_POST['txtWorkOrderNo']; 
		$tDept= $_POST['txtDept']; 
		$tItemDescription= $_POST['txtItemDescription']; 
		$tOrderDate= $_POST['txtOrderDate']; 
		$tValidityDate= $_POST['txtValidityDate']; 
		 
		  
		
		$sql = "update tbl_work_order set work_order_no='$tWorkOrderNo',dept='$tDept',item_description='$tItemDescription',order_date='$tOrderDate',valid_date='$tValidityDate' where id='$tID'";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Record updated successfully';
 			echo "Record updated successfully";
 		?>
 		<script type="text/javascript">
 			alert("Record updated successfully....... Refresh page to see updated data.");
 		</script>
 		<?php	
		}
		else{
			$_SESSION['error'] = $conn->error;
			echo $conn->error;
		}
		
	}
	


?>
