<?php
// error_reporting(0);
 include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini" onload="printPageArea('printableArea')">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Summery</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Summery</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <!--    <a href="amc-sale.php" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp;Sale New AMC</a>-->
                            </div>
                            <div class="box-body">
                                <div style="overflow-x:auto;">
                                    <div id="printableArea">
                                        <table id="example1" class="table table-bordered" style="width:100%;">


                                            <tbody>
                                                <tr>
                                                    <td colspan="6" align="center">
                                                        <h3>Quick Secure India Pvt Ltd.</h3>

                                                        Holding No-2, Ramdas Bhatta, Main Road
                                                        Adjecent to Brajdham Mandir, near Dhobhi Ghat<br>
                                                        Bistupur, Jamshedpur-831001, Jharkhand.<br>
                                                        <strong>Phone:</strong> [000-000-0000],
                                                        <strong>Website:</strong> www.quicksecureindia.com
                                                        <hr>

                                                    </td>
                                                </tr>
                                                <?php 

       $idd=$_GET['amcsid'];

        $sql = "SELECT * FROM tbl_amc_sale_dealer where id='$idd'";
        
        $query = $conn->query($sql);
          if($row = $query->fetch_assoc()){
                
            $dateTimeObj = date_create($row['sale_dt']); 
            $dt1=date_format($dateTimeObj, "d-m-Y");
            $dlid2 = $row['dealer_name'];
            $attach = $row['payment_attachment'];
 
         $sql1 = "SELECT * FROM tbl_dealer where id='$dlid2' order by id desc";
        $query1 = $conn->query($sql1);
          if($row1 = $query1->fetch_assoc()){
            
            $dlrid=$row1['dealerid'];
            $dlnm=$row1['dealer_name'];
            $dlcity=$row1['city'];
          
          }

            echo "
            <tr>
            


              <td><strong>Dealer Id </strong></td><td><strong>:</strong></td><td valign='center'>".$dlrid."</td>
  
              <td><strong>Dealer City </strong></td><td><strong>:</strong></td><td valign='center'>".$dlcity."</td>
 
            </tr>            
            <tr>
              <td><strong>ID </strong></td><td><strong>:</strong></td><td valign='center'>".$row['id']."</td>
  
              <td><strong>AMC ID </strong></td><td><strong>:</strong></td><td valign='center'>QSAMC".$row['id']."</td>
            </tr>
            <tr>  
              <td><strong>Date </strong></td><td><strong>:</strong></td><td valign='center'>".$dt1."</td>
       
              <td><strong>Item Type </strong></td><td><strong>:</strong></td><td>".$row['item_type']."</td>
            </tr>
            <tr>  
              <td><strong>Purchase Year </strong></td><td><strong>:</strong></td><td>".$row['purchase_year']."</td>
  
              <td><strong>Item Category </strong></td><td><strong>:</strong></td><td>".$row['item_category']."</td>
            </tr>
            <tr>  
              <td><strong>Brand Name </strong></td><td><strong>:</strong></td><td>".$row['brand_name']."</td>
          
              <td><strong>Description </strong></td><td><strong>:</strong></td><td>".$row['item_description']."</td>
            </tr>
            <tr>  

              <td><strong>Package Name </strong></td><td><strong>:</strong></td><td>".$row['package_name']."</td>
       
              <td><strong>Year for AMC </strong></td><td><strong>:</strong></td><td>".$row['no_year']."</td>
            </tr>
            <tr>  
              <td><strong>QTY </strong></td><td><strong>:</strong></td><td>".$row['qty']."</td>
          
              <td><strong>Price </strong></td><td><strong>:</strong></td><td>".$row['basic_price']."</td>
            </tr>
            <tr>  
              <td><strong>GST % </strong></td><td><strong>:</strong></td><td>".$row['gst']."</td>
         
              <td><strong>Total Amt </strong></td><td><strong>:</strong></td><td>".$row['tot_amt']."</td>
            </tr>
            
            <tr>  
              <td><strong>Payment Mode</strong></td><td><strong>:</strong></td><td>".$row['payment_option']."</td>
         
              <td><strong>Remarks </strong></td><td><strong>:</strong></td><td>".$row['payment_remarks']."</td>
            </tr>            
            
            <tr>
              <td colspan='6'>&nbsp;</td>
            </tr>
            <tr>
              <td colspan='6'><h3>Customer Detail</h3></td>
            </tr>
            <tr>  
              <td><strong>Customer Name </strong></td><td><strong>:</strong></td><td>".$row['customer_name']."</td>
         
              <td><strong>Contact No. </strong></td><td><strong>:</strong></td><td>".$row['mob_no']."</td>
            </tr>
            <tr>  
              <td><strong>E-Mail </strong></td><td><strong>:</strong></td><td>".$row['email']."</td>
         
              <td><strong>Address </strong></td><td><strong>:</strong></td><td>".$row['address']."</td>
            </tr>
            <tr>  
              <td><strong>City </strong></td><td><strong>:</strong></td><td>".$row['city1']."</td>
         
              <td><strong>State </strong></td><td><strong>:</strong></td><td>".$row['state1']."</td>
            </tr>
            <tr>  
              <td><strong>Pin Code </strong></td><td><strong>:</strong></td><td>".$row['pin_code']."</td>
         
              <td><strong> </strong></td><td><strong></strong></td><td></td>
            </tr> 
            <tr>  
              <td><strong>Payment Mode </strong></td><td><strong>:</strong></td><td>".$row['payment_option']."</td>
         
              <td><strong>Remarks </strong></td><td><strong>:</strong></td><td>".$row['payment_remarks']."</td>
            </tr>       
            <tr>  
              <td><strong>Payment Attachment </strong></td><td><strong>:</strong></td>
              <td><a href='upload/$attach' class='btn btn-xs btn-success'>Attachment</a> </td>
         
 
            </tr>                                                      
            ";

         }
                  ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>

                                    <?php

$pmode = $_POST['txtPaymentMode'];
$tRemarks = $_POST['txtRemarks'];

$idd = $_GET['amcsid'];

if ($pmode==""){
    $pmode="Cash";
}

    //=============== file upload =========================================
    
    
    
    $filename1 = $_FILES['myfile']['name'];
    
    if( $filename1==""){
?>

                                    <script type="text/javascript">
                                    //window.location.href="amc-sale.php" ;

                                    // setTimeout(function() {
                                    //     window.location.href = 'amc-sale.php';
                                    // }, 5000);
                                    </script>

                                    <?php
    }else{
    
    $temp = explode(".", $_FILES["myfile"]["name"]);

    $flnm = pathinfo($filename1, PATHINFO_FILENAME);

    $filename =$flnm."_op". round(microtime(true)) . '.' . end($temp);
    // destination of the file on the server
    $destination = 'upload/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

        if (!in_array($extension, ['pdf', 'docx', 'jpg', 'jpeg', 'png', 'bmp'])) {
            echo "You file extension must be .pdf or .docx";
            } elseif ($_FILES['myfile']['size'] > 40000000) { // file shouldn't be larger than 1Megabyte
            echo "File too large!";
            } else {

    // move the uploaded (temporary) file to the specified destination

                if (move_uploaded_file($file, $destination)) {

		echo "update tbl_amc_sale_dealer set payment_option='$pmode', payment_remarks='$tRemarks', payment_attachment='$filename' where id='$idd'";exit();
    $sql = "update tbl_amc_sale_dealer set payment_option='$pmode', payment_remarks='$tRemarks', payment_attachment='$filename' where id='$idd'";

		if($conn->query($sql)){
		     
 		?>
                                    <script type="text/javascript">
                                    //window.location.href="amc-sale.php" ;

                                    // setTimeout(function() {
                                    //     window.location.href = 'amc-sale.php';
                                    // }, 5000);
                                    </script>
                                    <?php	
		}
		else{
			$_SESSION['error'] = $conn->error;
			echo $conn->error;
		}

   } 
}   
} 
?>

                                    <!-- <div class="form-group">
      <label for="txtItemType" class="col-sm-2 control-label">Payment Mode</label>
        <div class="col-sm-2">
         <select class="form-control" name="txtItemType" id="txtItemType" required>
            <option value="-">--Select--</option> 
            <option value="Cash">Cash</option>
            <option value="OnLine">OnLine</option>
          </select> 
        </div>
      
  </div>
         
             
              <a href="javascript:void(0);" onclick="printPageArea('printableArea')"><i class="fa fa-print"></i>&nbsp;Print</a>
-->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include 'includes/footer.php'; ?>
        <?php include 'includes/del_amc_model.php'; ?>
    </div>
    <?php include 'includes/scripts.php'; ?>
    <script>
    function printPageArea(areaID) {
        var printContent = document.getElementById(areaID);
        var WinPrint = window.open('', '', 'width=900,height=650');
        WinPrint.document.write(printContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }

    $(function() {
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            $('#delete').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });
    });

    function getRow(id) {
        $.ajax({
            type: 'POST',
            url: 'amc-row.php',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                $('.catid').val(response.id);
                $('#del_cat').val(response.id);

            }
        });
    }
    </script>


</body>

</html>