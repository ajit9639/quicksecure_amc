<?php

include 'includes/session.php';

//	if($_POST['action'] == 'add1'){
		
 		
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
		$tGSTAmt= $_POST['txtGSTAmt'];
		$tTotAmt= $_POST['txtTotAmt']; 

		$tCustomerName = $_POST['txtCustomerName'];
		$tMobileNo = $_POST['txtMobileNo'];
		$tEMail = $_POST['txtEMail'];
		$tAddress = $_POST['txtAddress'];
		$tPinCode = $_POST['txtPinCode'];
		$tCity = $_POST['txtCity'];
		$tState = $_POST['txtState'];
		$tDealerName = $_POST['txtDealerName'];
		$tRemarks = $_POST['txtRemarks'];
		$tDate = $_POST['txtDate'];

		$stfid = $_SESSION['dlrid'];
		 

		$sql = "insert into tbl_amc_sale_dealer (sale_dt,item_type,purchase_year,item_category,brand_name,item_description,package_name,no_year,qty,basic_price,gst,gstamt,tot_amt,customer_name,mob_no,email,address,pin_code,city1,state1,dealer_name,staffid,remarks,  payment_option,order_status) values('$tDate','$tItemType','$tPurchaseYear','$tItemCategory','$tBrandName','$tItemDescription','$tPackageName','$tYrofAMC','$tQTY','$tPrice','$tGST','$tGSTAmt','$tTotAmt','$tCustomerName','$tMobileNo','$tEMail','$tAddress','$tPinCode','$tCity','$tState','$tDealerName','$stfid','$tRemarks','','Pending')";

		if($conn->query($sql)){


                          $sql = "SELECT max(id) as mxid FROM tbl_amc_sale_dealer";
              $query = $conn->query($sql);
              while($crow = $query->fetch_assoc()){
                  $mxidd = $crow['mxid'];
              }
 			
 			echo "<script>window.location.href='amc-sale-detail.php?amcsid=$mxidd';</script>";
 		?>
 		<script type="text/javascript">
 		//	alert("Record inserted successfully........");
 			
 		</script>
 		<?php	
 
		}
		else{
			//alert("Error : ".$conn->error);
			echo $conn->error;

		}
		
///	}

?>
