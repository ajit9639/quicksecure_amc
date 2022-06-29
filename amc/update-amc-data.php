<?php
	//connect to db
include 'includes/session.php';

	//if insert key is pressed then do insertion
	if($_POST['action'] == 'add1'){

		//$name  = mysql_real_escape_string($_POST['name']);
		//$email = mysql_real_escape_string($_POST['email']);
		
		$tID= $_POST['txtID']; 
		$tItemType= $_POST['txtItemType'];
		$tPurchaseYear= $_POST['txtPurchaseYear'];
		$tItemCategory= $_POST['txtItemCategory'];
		$tBrandName= $_POST['txtBrandName'];
		$tItemDescription= $_POST['txtItemDescription'];
		$tPackageName= $_POST['txtPackageName'];
		$tYrofAMC= $_POST['txtYrofAMC'];
		$tQTY= $_POST['txtQTY'];
		$tPrice= $_POST['txtPrice'];
		$tGST= $_POST['txtGST'];
		$tTotAmt= $_POST['txtTotAmt'];
		 
		  
		
		$sql = "update tbl_amc_sale set item_type='$tItemType',purchase_year='$tPurchaseYear',item_category='$tItemCategory',brand_name='$tBrandName',item_description='$tItemDescription',package_name='$tPackageName',no_year='$tYrofAMC',qty='$tQTY',basic_price='$tPrice',gst='$tGST',tot_amt='$tTotAmt' where id='$tID'";

		if($conn->query($sql)){
			//$_SESSION['success'] = 'Record updated successfully';
 			//echo "Record updated successfully";
 		?>
 		<script type="text/javascript">
 			alert("Record updated successfully........");
 			echo "<script>window.location.href='amc-sale.php'</script>"; 
 		</script>
 		<?php	
		}
		else{
			$_SESSION['error'] = $conn->error;
			echo $conn->error;
		}
		
	}
	


?>
