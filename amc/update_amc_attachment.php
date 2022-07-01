<?php
                                    
echo $idd=$_GET['id'];exit();
  $txtPaymentMode = $_POST['txtPaymentMode'];
  $txtRemarks = $_POST['txtRemarks'];

  $filename = $_FILES["myfile"]["name"];
  $tempname = $_FILES["myfile"]["tmp_name"];
  $folder = "upload/".$filename;
  move_uploaded_file($tempname, $folder);

   echo $a ="UPDATE `tbl_amc_sale` SET `payment_option`='$txtPaymentMode',`payment_remarks`='$txtRemarks',`payment_attachment`='$filename' where `id `='$idd'";
exit();
  $update_attachment = mysqli_query($conn ,"UPDATE `tbl_order_peripheral` SET `payment_mode`='$txtPaymentMode',`remarks`='$txtRemarks',`attachment`='$filename' ,`order_active`='active' where `orderid`='$idd'");
  if($update_attachment){
    echo "<script>
    
    window.onload = function() {
        if(!window.location.hash) {
            window.location = window.location + '#loaded';
            window.location.reload();
        }
    }
    
    </script>";
  }
?>