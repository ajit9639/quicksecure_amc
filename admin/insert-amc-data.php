<?php

include 'includes/session.php';

	if($_POST['action'] == 'add1'){
		
 		
		$tItemName= $_POST['txtItemName']; 
		$tDescription= $_POST['txtDescription'];
		$tPRF= $_POST['txtPRF'];
		$tPRT= $_POST['txtPRT'];
		$tPackageName= $_POST['txtPackageName'];
		$tDuration= $_POST['txtDuration'];
		$tBasicPrice= $_POST['txtBasicPrice'];
		$tGST= $_POST['txtGST'];
		$tTotalPrice= $_POST['txtTotalPrice'];
		 
 
		$sql = "insert into tbl_amc (item,description,price_from,proce_to,package_name,duration,basic_price,gst,total_price) values('$tItemName','$tDescription','$tPRF','$tPRT','$tPackageName','$tDuration','$tBasicPrice','$tGST','$tTotalPrice')";

		if($conn->query($sql)){
			//$_SESSION['success'] = 'Record inserted successfully';
 			//echo "Record inserted successfully";
 		?>
 		<script type="text/javascript">
 			alert("Record inserted successfully........");
 		</script>
 		<?php	
  
 		echo "<script>window.location.href='amc-detail.php'</script>"; 
		}
		else{
			$_SESSION['error'] = $conn->error;
			echo $conn->error;
		}
		
	}

?>
