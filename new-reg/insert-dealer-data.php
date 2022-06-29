<?php

include 'include/config.php';

	//if($_POST['action'] == 'add1'){
		
 		
		$tDealerName= $_POST['txtDealerName']; 
		$tStoreName= $_POST['txtStoreName']; 
		$tAddress= $_POST['txtAddress']; 
		$tCity= $_POST['txtCity']; 
		$tState= $_POST['txtState']; 

		$tPinNo= $_POST['txtPinNo']; 
		$tGST= $_POST['txtGSTIN']; 
		$tPhNo= $_POST['txtMobileNo']; 
		$tEMail= $_POST['txtEmail']; 

 		$tUserID= $_POST['txtUserID']; 
		$tPWD= $_POST['txtPWD']; 
		
        $sql = "SELECT max(id) as mxid FROM tbl_dealer order by id desc";
        $query = $conn->query($sql);
          if($row = $query->fetch_assoc()){
			$tempid=$row['mxid'];
          }		

$dlrid = 'QSDL' . str_pad(($tempid + 1), 3, '0', STR_PAD_LEFT);
 

		$sql = "insert into tbl_dealer (dealerid,dealer_name,store_name,address,city,state1,pincode,gst,phno,email,uid,pwd,status) values('$dlrid','$tDealerName','$tStoreName','$tAddress','$tCity','$tState','$tPinNo','$tGST','$tPhNo','$tEMail','$tUserID','$tPWD','N')";

		if($conn->query($sql)){
			//$_SESSION['success'] = 'Record inserted successfully';
 			//echo "Record inserted successfully";
 		?>
 		<script type="text/javascript">
 			alert("Record inserted successfully........");
 		</script>
 		<?php	
  
 		echo "<script>window.location.href='dealer-login.php'</script>"; 
		}
		else{
			$_SESSION['error'] = $conn->error;
			echo $conn->error;
		}
		
//	}

?>
