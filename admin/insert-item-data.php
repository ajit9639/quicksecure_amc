<?php

include 'includes/session.php';

	///if($_POST['action'] == 'add1'){
		
 		
		$tModalNo= $_POST['txtModalNo']; 
		$tProcessor= $_POST['txtProcessor'];
		$tRam= $_POST['txtRam'];
		$thddSsd= $_POST['txthddSsd'];
		$tOS= $_POST['txtOS'];
		$tGraphics= $_POST['txtGraphics'];
		$tDisplay= $_POST['txtDisplay'];
		$tPrice= $_POST['txtPrice'];
		$tExPrice= $_POST['txtExPrice'];
		 
		$tOffice= $_POST['txtOffice'];
		$tColor= $_POST['txtColor'];
		$tGST= $_POST['txtGST'];
		$tGSTAmt= $_POST['txtGSTAmt']; 

 		$tProductType= $_POST['txtProductType'];

		$sql = "insert into tbl_item (product,modalno,processor1,ram1,hddssd,os1,office1,graphics1,display1,color1,gst_per,gst_amt,price,excludingprice) values('$tProductType','$tModalNo','$tProcessor','$tRam','$thddSsd','$tOS','$tOffice','$tGraphics','$tDisplay','$tColor','$tGST','$tGSTAmt','$tPrice','$tExPrice')";

		if($conn->query($sql)){
			//$_SESSION['success'] = 'Record inserted successfully';
 			//echo "Record inserted successfully";
 		?>
 		<script type="text/javascript">
 			alert("Record inserted successfully........");
 		</script>
 		<?php	
  
 		echo "<script>window.location.href='item-detail.php'</script>"; 
		}
		else{
			$_SESSION['error'] = $conn->error;
			echo $conn->error;
		}
		
	//}

?>
