<?php
 
include 'includes/session.php';
  
 $dlrid = $_SESSION['id'];
$txtOrderID = $_POST['txtOrderID'];
 $ordrdt = $_POST['txtDate'];
 $product = $_POST['txtProductType']; 
 $modalno = $_POST['txtModelno'];
 $processor1 = $_POST['txtProcessor']; 
 $ram1 = $_POST['txtRam']; 
 $hddssd = $_POST['txtHddSsd'] ;
 $os1 = $_POST['txtOS'] ;
 $graphics1 = $_POST['txtGraphics'];
 $display1 = $_POST['txtDisplay'];
 $qty = $_POST['txtQTY'];

 $unit_price = $_POST['txtPrice'];
 $inclusive_price = $_POST['txtTotal'];
$exclusive_price = $_POST['txtExPrice'];
$gst_percentage = $_POST['txtGST'];
$gst_amount = $_POST['txtGSTAmt'];
$total_price = $_POST['txtTotPrice'];

 $sql = "INSERT INTO `tbl_demo`(`txtOrderID`,`ordrdt`, `dealerid`, `product`, `modalno`, `processor1`, `ram1`, `hddssd`, `os1`, `graphics1`, `display1`, `qty`, `unit_price`, `inclusive_price`, `exclusive_price`, `gst_percentage`, `gst_amount`, `total_price`) VALUES ('$txtOrderID','$ordrdt','$dlrid','$product','$modalno','$processor1','$ram1','$hddssd','$os1','$graphics1','$display1','$qty','$unit_price','$inclusive_price','$exclusive_price','$gst_percentage','$gst_amount','$total_price')";
//   exit();
//  $sql = "INSERT INTO tbl_demo (ordrdt,dealerid,product,modalno,processor1,ram1,hddssd,os1,graphics1,display1,qty,price,  txtPrice,txtExPrice,txtGST,txtGSTAmt,txtTotPrice) VALUES ('".$_POST['txtDate']."','$dlrid','".$_POST['txtProductType']."', '".$_POST['txtModelno']."', '".$_POST['txtProcessor']."', '".$_POST['txtRam']."', '".$_POST['txtHddSsd']."', '".$_POST['txtOS']."', '".$_POST['txtGraphics']."', '".$_POST['txtDisplay']."', '".$_POST['txtQTY']."', '".$_POST['txtPrice']."' ,          '".$_POST['txtExPrice']."','".$_POST['txtGST']."','".$_POST['txtGSTAmt']."','".$_POST['txtTotPrice']."')";
    
            if (mysqli_query($conn, $sql)) {
               //echo "<script>alert('Record saved successfully')</script>";
              echo "<script>window.location.href='place-order.php'</script>"; 

            }else{echo $conn->error;}		   	
 
?>