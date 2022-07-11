<?php
	//connect to db
include 'includes/session.php';

	//if insert key is pressed then do insertion
	if($_POST['action'] == 'add1'){

 
		
		$tID= $_POST['txtID']; 
		$tItemName= $_POST['txtItemName']; 
		$tPrice= $_POST['txtPrice'];
		$tGST= $_POST['txtGST'];
		$tGSTAmt= $_POST['txtGSTAmt'];
		$tTotPrice= $_POST['txtTotPrice'];
		$tBrandName= $_POST['txtBrandName'];
		$tColorName= $_POST['txtColorName'];  
		$stock= $_POST['stock'];  
  		  		
		$sql = "update tbl_periferals set item_name='$tItemName',brand_name='$tBrandName',color_name='$tColorName',price='$tPrice',gst='$tGST',gstamt='$tGSTAmt',totalamt='$tTotPrice',stock='$stock' where id='$tID'";

		if($conn->query($sql)){
			//$_SESSION['success'] = 'Record updated successfully';
 			//echo "Record updated successfully";
 		?>
 		<script type="text/javascript">
 			alert("Record updated successfully.......");
 		</script>
 		<?php	
 		echo "<script>window.location.href='periferals-detail.php'</script>"; 
		}
		else{
			$_SESSION['error'] = $conn->error;
			echo $conn->error;
		}
		
	}
	


?>
