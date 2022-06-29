<?php

include 'includes/session.php';

	if($_POST['action'] == 'add1'){
		
 		
		$tItemName= $_POST['txtItemName']; 
		$tPrice= $_POST['txtPrice'];
		$tGST= $_POST['txtGST'];
		$tGSTAmt= $_POST['txtGSTAmt'];
		$tTotPrice= $_POST['txtTotPrice'];
		$tBrandName= $_POST['txtBrandName'];
		$tColorName= $_POST['txtColorName'];  
 $tExPrice= $_POST['txtExPrice']; 
         $sql = "SELECT max(id) as mxid FROM tbl_periferals order by id desc";
        $query = $conn->query($sql);
          if($row = $query->fetch_assoc()){
			$tempid=$row['mxid'];
			$pcode = 'QSPF' . str_pad(($tempid + 1), 3, '0', STR_PAD_LEFT);
          }		


		$sql = "insert into tbl_periferals (pcode,item_name,brand_name,color_name,price,exclusuveprice,gst,gstamt,totalamt) values('$pcode','$tItemName','$tBrandName','$tColorName','$tPrice','$tExPrice','$tGST','$tGSTAmt','$tTotPrice')";

		if($conn->query($sql)){
			//$_SESSION['success'] = 'Record inserted successfully';
 			//echo "Record inserted successfully";
 		?>
 		<script type="text/javascript">
 			alert("Record inserted successfully........");
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
