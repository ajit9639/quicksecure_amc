<?php 
include 'includes/session.php';
include 'includes/timezone.php';   
 
date_default_timezone_set('Asia/Kolkata');// change according timezone

$currentTime = date( 'd-m-Y h:i:s A', time () );

$dd = date( 'd', time () );
$mm = date( 'm', time () );
$yy = date( 'Y', time () );

$dt = $dd."-".$mm."-".$yy;

 $dlrid = $_SESSION['id'];




         $sql = "SELECT max(id) as mxid FROM tbl_order_peripheral order by id desc";
        $query = $conn->query($sql);
          if($row = $query->fetch_assoc()){
			$tempid=$row['mxid'];
          }		

$dealer_id_name1 = $_SESSION['deal_id'];
// $ordrid = 'QSDL' . str_pad(($tempid + 1), 3, '0', STR_PAD_LEFT);
// $ordrid = $dealer_id_name1 . str_pad(($tempid + 1), 3, '-', STR_PAD_LEFT);
$ordrid = $dealer_id_name1.'-PH-'. ($tempid + 1);;


 
//=============================================================

    $sql   = "select * from tbl_demo_peripheral where dealerid='$dlrid'"; 
    $query = $conn->query($sql);
    while($crow = $query->fetch_assoc()){
		// $pro = $crow['product'];
		$dealerid2 = $crow['dealerid'];
		$modalno2 = $crow['modalno'];
		$processor2 = $crow['processor1'];
		$ram2 = $crow['ram1'];
		
		
		$qty2 = $crow['qty'];

		$unit_price = $crow['unit_price'];
		$inclusive_price = $crow['inclusive_price'];
		$exclusive_price = $crow['exclusive_price'];
		$gst_percentage = $crow['gst_percentage'];
		$gst_amount = $crow['gst_amount'];
		$total_price = $crow['total_price'];
		$all_total = $crow['exclusive_price'] * $crow['qty'];

		// $price2 = $crow['price'];
		$pro= $crow['product'];

		// $tamt = $qty2 * $price2;
		$dlrname = $_SESSION['user'];

		$get_all = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `tbl_periferals` where `item_name`='$modalno2'"));
		$final = $get_all['stock'] - $qty2;

		mysqli_query($conn , "UPDATE `tbl_periferals` SET `stock`='$final' WHERE `item_name`='$modalno2'");

     	 $sql = mysqli_query($conn , "INSERT INTO `tbl_order_peripheral`(`type`,`orderid`, `order_date`, `dealer_id`, `product`, `modalno`, `processor1`, `ram1`, `qty`, `unit_price`, `inclusive_price`, `exclusive_price`, `gst_percentage`, `gst_amount`, `total_price`, `payment_mode`, `remarks`, `attachment`, `order_status`,`all_total`) VALUES ('dealer','$ordrid','$dt','$dealerid2','$pro','$modalno2','$processor2','$ram2','$qty2','$unit_price','$inclusive_price','$exclusive_price','$gst_percentage','$gst_amount','$total_price','','','','pending','$all_total')");
		// exit();

            if (mysqli_query($conn, $sql)) {

				
            //    echo "<script>alert('Record saved successfully')</script>";
               
            }else{echo $conn->error;}	
     }	   	

 

 		$sql2 = "delete from tbl_demo_peripheral where dealerid='$dlrid'";
		if($conn->query($sql2)){}    	

    //   echo "<script>window.location.href='order-detail-peripheral.php'</script>"; 
	echo "<script>window.location.href='order-detail-view-peripheral.php?odid=$ordrid'</script>"; 
?>