<?php 
include 'includes/session.php';
include 'includes/timezone.php';   
 
date_default_timezone_set('Asia/Kolkata');// change according timezone

$currentTime = date( 'd-m-Y h:i:s A', time () );

$dd = date( 'd', time () );
$mm = date( 'm', time () );
$yy = date( 'Y', time () );

$dt = $dd."-".$mm."-".$yy;

 $dlrid = $_SESSION['dlrid'];

//echo "= ".$dlrid;

//exit();

   //       $sql = "SELECT max(id) as mxid FROM tbl_peripherals_dealer order by id desc";
   //      $query = $conn->query($sql);
   //        if($row = $query->fetch_assoc()){
			// $tempid=$row['mxid'];
   //        }		
   // $ordrid = 'QSDL' . str_pad(($tempid + 1), 3, '0', STR_PAD_LEFT);


//=============================================================

    $sql   = "select * from tbl_peripherals_order_by_dealer_tmp where dealerid='$dlrid'";
    $query = $conn->query($sql);
    while($crow = $query->fetch_assoc()){

		$item_name1 = $crow['item_name'];
		$brand_name1 = $crow['brand_name'];
		$color_name1 = $crow['color_name'];
		$qty1 = $crow['qty'];
		$price1 = $crow['price'];
		$gst1 = $crow['gst'];
		$gstamt1 = $crow['gstamt'];
		$totalamt1 = $crow['totalamt'];
		$dealerid1 = $crow['dealerid'];
	 
//$tamt = $qty2 * $price2;
$dlrname = $_SESSION['user'];
$pcode = $dealerid1;
$ordrid =$dealerid1.'/PH' . rand(1000,9999);

       $sql = "INSERT INTO tbl_peripherals_order_by_dealer (ordno,order_date,pcode,item_name,brand_name,color_name,qty,price,gst,gstamt,totalamt,dealerid) VALUES ('$ordrid','$dt','$pcode','$item_name1','$brand_name1','$color_name1','$qty1','$price1','$gst1','$gstamt1','$totalamt1','$dealerid1')";

            if (mysqli_query($conn, $sql)) {
               echo "<script>alert('Record saved successfully')</script>";
            }else{echo $conn->error;}	
     }	   	

 		$sql2 = "delete from tbl_peripherals_order_by_dealer_tmp where dealerid='$dlrid'";
		if($conn->query($sql2)){}    	

      echo "<script>window.location.href='periferals-detail.php'</script>"; 
?>