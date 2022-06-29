<?php
	//connect to db
include 'includes/session.php';

	//if insert key is pressed then do insertion
//	if($_POST['action'] == 'add1'){

 
		
		$tID= $_POST['txtID']; 
		$tItemName= $_POST['txtItemName']; 
		$tDescription= $_POST['txtDescription'];
		$tPRF= $_POST['txtPRF'];
		$tPRT= $_POST['txtPRT'];
		
	 $tPackageName= $_POST['txtPackageName'];
		$tDuration= $_POST['txtDuration'];
		$tBasicPrice= $_POST['txtBasicPrice'];
		$tGST= $_POST['txtGST'];
		$tTotalPrice= $_POST['txtTotalPrice'];
 
 
			
		$sql = "update tbl_amc set item='$tItemName',description='$tDescription',price_from='$tPRF',proce_to='$tPRT',package_name='$tPackageName',duration='$tDuration',basic_price='$tBasicPrice',gst='$tGST',total_price='$tTotalPrice' where id='$tID'";

		if($conn->query($sql)){
			//$_SESSION['success'] = 'Record updated successfully';
 			echo "<script>alert('Record updated successfully.......'".$tItemName."');</script>";	
 			echo "<script>window.location.href='amc-detail.php'</script>"; 
		}
		else{
			$_SESSION['error'] = $conn->error;
			echo $conn->error;
		}
		
//	}
	


?>
