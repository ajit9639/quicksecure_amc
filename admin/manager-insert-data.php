<?php

include 'includes/session.php';

	//if($_POST['action'] == 'add1'){
		
 		
		$tStaffName= $_POST['txtStaffName']; 
		$tAddress= $_POST['txtAddress']; 
		$tCity= $_POST['txtCity']; 
		$tState= $_POST['txtState']; 
 
		$tPinNo= $_POST['txtPinNo']; 
 
		$tPhNo= $_POST['txtPhNo']; 
		$tEMail= $_POST['txtEMail']; 
		 

          $sql = "SELECT max(id) as mxid FROM tbl_manager order by id desc";
        $query = $conn->query($sql);
          if($row = $query->fetch_assoc()){
			$tempid=$row['mxid'];
          }		

$dlrid = 'QSEM' . str_pad(($tempid + 1), 3, '0', STR_PAD_LEFT);
		
$sql = "insert into tbl_manager (staffid,staff_name,address,city,state1,pincode,phno,email,status) values('$dlrid','$tStaffName','$tAddress','$tCity','$tState','$tPinNo','$tPhNo','$tEMail','N')";

		if($conn->query($sql)){
			//$_SESSION['success'] = 'Record inserted successfully';
 			//echo "Record inserted successfully";
 		?>
 		<script type="text/javascript">
 			alert("Record inserted successfully........");
 		</script>
 		<?php	
  
 		echo "<script>window.location.href='manager-detail.php'</script>"; 
		}
		else{
			//$_SESSION['error'] = $conn->error;
			//echo $conn->error;
                $text=$conn->error;
                echo '<script type="text/javascript">alert("'.$text.'")</script>';

		}
		
	//}

?>
