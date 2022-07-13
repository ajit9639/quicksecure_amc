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


//echo "= ".$dlrid;

//exit();

         $sql = "SELECT max(id) as mxid FROM tbl_order order by id desc";
        $query = $conn->query($sql);
          if($row = $query->fetch_assoc()){
			$tempid=$row['mxid'];
          }		

$staff_id = $_SESSION['staffid'];
$staff_name = $_SESSION['staffname'];


// $ordrid = 'QSDL' . str_pad(($tempid + 1), 3, '0', STR_PAD_LEFT);
// $ordrid = $dealer_id_name1 . str_pad(($tempid + 1), 3, '-', STR_PAD_LEFT);

$ordrid = $staff_id.'-'. ($tempid + 1);

//=============================================================

    $sql   = "select * from tbl_demo where dealerid='$dlrid'";
    $query = $conn->query($sql);
    while($crow = $query->fetch_assoc()){
		// $pro = $crow['product'];
		$dealerid2 = $crow['dealerid'];
		$modalno2 = $crow['modalno'];
		$processor2 = $crow['processor1'];
		$ram2 = $crow['ram1'];
		$hddssd2 = $crow['hddssd'];
		$os2 = $crow['os1'];
		$graphics2 = $crow['graphics1'];
		$display2 = $crow['display1'];
		$qty2 = $crow['qty'];

		$unit_price = $crow['unit_price'];
		$inclusive_price = $crow['inclusive_price'];
		$exclusive_price = $crow['exclusive_price'];
		$gst_percentage = $crow['gst_percentage'];
		$gst_amount = $crow['gst_amount'];
		$total_price = $crow['total_price'];
		// $price2 = $crow['price'];
		$pro= $crow['product'];

		// $tamt = $qty2 * $price2;
		$dlrname = $staff_name;
		$all_total = $crow['exclusive_price'] * $crow['qty'];

		$get1 = mysqli_fetch_assoc(mysqli_query($conn , $sql = "SELECT * FROM `tbl_item` WHERE `modalno`='$modalno2'"));
		$final_stock = $get1['stock'] - $qty2;
		mysqli_query($conn , $sql21 = "UPDATE `tbl_item` SET `stock`='$final_stock' WHERE `modalno`='$modalno2'");
	
   		$sql = "INSERT INTO tbl_order (type,orderid,order_date,dealer_id,dealer_name,product,modalno,processor1,ram1,hddssd,os1,graphics1,display1,    qty,unit_price,inclusive_price,exclusive_price,gst_percentage,gst_amount,total_price,order_status,all_total) VALUES ('staff','$ordrid','$dt','$dealerid2','$dlrname','$pro','$modalno2','$processor2','$ram2','$hddssd2','$os2','$graphics2','$display2',      '$qty2','$unit_price','$inclusive_price','$exclusive_price','$gst_percentage','$gst_amount','$total_price','pending','$all_total')";
// exit();
            if (mysqli_query($conn, $sql)) {
				
            //    echo "<script>alert('Record saved successfully')</script>";
			//    echo '<script>header("location:ins-order-data.php?dlrid='$ordrid'")</script>';
			
               
            }else{echo $conn->error;}	
     }	   	

 

 		$sql2 = "delete from tbl_demo where dealerid='$dlrid'";
		if($conn->query($sql2)){}    	

    //   echo "<script>window.location.href='order-detail.php'</script>"; 
	echo "<script>window.location.href='order-detail-view.php?odid=$ordrid'</script>"; 
	
?>