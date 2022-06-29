<?php
	//connect to db
include 'includes/session.php';

	//if insert key is pressed then do insertion
	if($_POST['action'] == 'add1'){
		
	   $tID= $_POST['txtID']; 		
	   $tModalNo1 = $_POST['txtModalNo'];
       $tProcessor1 = $_POST['txtProcessor'];
       $tRam1 = $_POST['txtRam'];
       $thddSsd1 = $_POST['txthddSsd'];
       $tOS1 = $_POST['txtOS'];
       $tGraphics1 = $_POST['txtGraphics'];
       $tDisplay1 = $_POST['txtDisplay'];
       $tPrice1 = $_POST['txtPrice'];
       $tExPrice1 = $_POST['txtExPrice'];
       $tOffice1 = $_POST['txtOffice'];
       $tColor1 = $_POST['txtColor'];
       $tGST1 = $_POST['txtGST'];
       $tGSTAmt1 = $_POST['txtGSTAmt'];
       $tProductType1 = $_POST['txtProductType'];		

		$sql = "update tbl_item set product='$tProductType1',modalno='$tModalNo1',processor1='$tProcessor1',ram1='$tRam1',hddssd='$thddSsd1',os1='$tOS1',office1='$tOffice1',graphics1='$tGraphics1',display1='$tDisplay1',color1='$tColor1',gst_per='$tGST1',gst_amt='$tGSTAmt1',price='$tPrice1',excludingprice='$tExPrice1' where id='$tID'";

		if($conn->query($sql)){
			//$_SESSION['success'] = 'Record updated successfully';
 			//echo "Record updated successfully";
 		?>
 		<script type="text/javascript">
 			alert("Record updated successfully.......");
 		</script>
 		<?php	
 		echo "<script>window.location.href='item-detail.php'</script>"; 
		}
		else{
			$_SESSION['error'] = $conn->error;
			echo $conn->error;
		}
		
	}
	


?>
