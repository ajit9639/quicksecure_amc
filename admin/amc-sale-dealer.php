<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Detail View of AMC Sale By Dealer</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Detail View</li>
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
            <td colspan="6"><h4>AMC Sale</h4></td>
          </tr>
      <?php 

       $idd=$_GET['amcsid'];

        $sql = "SELECT * FROM tbl_amc_sale_dealer where id='$idd' order by id desc";
        $query = $conn->query($sql);
          if($row = $query->fetch_assoc()){
                
            $dateTimeObj = date_create($row['sale_dt']); 
            $dt1=date_format($dateTimeObj, "d-m-Y");
 
         $sql1 = "SELECT * FROM tbl_dealer where dealerid='$row[dealer_name]' order by id desc";
        $query1 = $conn->query($sql1);
          if($row1 = $query1->fetch_assoc()){$dlrid=$row1['dealerid'];}

            echo "
            <tr>
              <td><strong>Dealer Name </strong></td><td><strong>:</strong></td><td valign='center' colspan='4'><font size='5'>".$row1['dealer_name'].' : '.$dlrid."</font></td>
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
              <td><strong>GST Amt </strong></td><td><strong>:</strong></td><td>".$row['gst']."</td>
         
              <td><strong>Total Amt </strong></td><td><strong>:</strong></td><td>".$row['tot_amt']."</td>
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
            ";

         }
                  ?>

                </tbody>
              </table>
</div>
<hr>
              <a href="javascript:void(0);" onclick="printPageArea('printableArea')"><i class="fa fa-print"></i>&nbsp;Print</a>

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
                    function printPageArea(areaID){
                        var printContent = document.getElementById(areaID);
                        var WinPrint = window.open('', '', 'width=900,height=650');
                        WinPrint.document.write(printContent.innerHTML);
                        WinPrint.document.close();
                        WinPrint.focus();
                        WinPrint.print();
                        WinPrint.close();
                    }

$(function(){
  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'amc-row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.catid').val(response.id);
      $('#del_cat').val(response.id);

    }
  });
}

 
</script>
 
 
</body>
</html>
