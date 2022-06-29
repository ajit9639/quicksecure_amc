<?php

include 'includes/session.php';

	if($_POST['action'] == 'add1'){
		
 		
		$tWorkOrderNo= $_POST['txtWorkOrderNo']; 
		$tDept= $_POST['txtDept']; 
		$tItemDescription= $_POST['txtItemDescription']; 
		$tOrderDate= $_POST['txtOrderDate']; 
		$tValidityDate= $_POST['txtValidityDate']; 

 
		
		$sql = "insert into tbl_work_order (work_order_no,dept,item_description,order_date,valid_date) values('$tWorkOrderNo','$tDept','$tItemDescription','$tOrderDate','$tValidityDate')";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Record inserted successfully';
 			echo "Record inserted successfully";
 		?>
 		<script type="text/javascript">
 			alert("Record inserted successfully........");
 		</script>
 		<?php	
		}
		else{
			$_SESSION['error'] = $conn->error;
			echo $conn->error;
		}
		
	}

?>
