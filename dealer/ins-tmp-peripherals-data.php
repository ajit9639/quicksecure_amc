<?php
 
include 'includes/session.php';
  
 $dlrid = $_SESSION['dlrid'];

       $sql = "INSERT INTO tbl_peripherals_order_by_dealer_tmp (item_name,brand_name,color_name,qty,price,gst,gstamt,totalamt,dealerid) VALUES ('".$_POST['txtItemName']."', '".$_POST['txtBrandName']."', '".$_POST['txtColorName']."', '1', '".$_POST['txtPrice']."', '".$_POST['txtGST']."', '".$_POST['txtGSTAmt']."', '".$_POST['txtTotPrice']."','$dlrid')";

            if (mysqli_query($conn, $sql)) {
               //echo "<script>alert('Record saved successfully')</script>";
               echo "<script>window.location.href='periferals-new-entry.php'</script>"; 

            }else{echo $conn->error;}		   	
 
?>