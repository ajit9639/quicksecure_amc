<?php

include 'includes/session.php';

	if($_POST['action'] == 'add1'){
		
 		
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
		$txtcpass= $_POST['txtcpass']; 

if($txtPass === $txtcpass){
         $sql = "SELECT max(id) as mxid FROM tbl_dealer order by id desc";
        $query = $conn->query($sql);
          if($row = $query->fetch_assoc()){
			$tempid=$row['mxid'];
          }		

		$dlrid = 'QSDL' . str_pad(($tempid + 1), 3, '0', STR_PAD_LEFT);
 		
		$sql = "insert into tbl_dealer (dealerid,dealer_name,store_name,address,city,state1,pincode,gst,phno,email,uid,pwd) values('$dlrid','$tDealerName','$tStoreName','$tAddress','$tCity','$tState','$tPinNo','$tGST','$tPhNo','$tEMail','$txtUserid','$txtPass')";

		if($conn->query($sql)){
			//$_SESSION['success'] = 'Record inserted successfully';
 			//echo "Record inserted successfully";
 		?>
 		<script type="text/javascript">
 			alert("Record inserted successfully........");
 		</script>
 		<?php	
		}else{echo "mismatch"}
 		echo "<script>window.location.href='dealer-detail.php'</script>"; 
		}
		else{
			$_SESSION['error'] = $conn->error;
			echo $conn->error;
		}
		
	}

?>
