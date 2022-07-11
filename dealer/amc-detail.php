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
      <h1>Dealer Detail</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dealer Detail</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
   
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="amc-sale.php" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp;Sale New AMC</a>
            </div>
            <div class="box-body">
      <div style="overflow-x:auto;">
      <table id="example1" class="table table-bordered" style="width:100%;">
        <thead style="background-color: #80CBC4;">
          <th>ID</th>
          <th>AMC ID</th>
          <th>Date</th>

          <th>Dealer ID / City</th>
          <th>Package Name</th>
          <th>GST %</th>
          <th>GST Amount</th>
          <th>Total Amount</th>
          <th>Payment Mode</th>
          <th>Order Status</th>
          <th>Remarks</th>
          <th>Attachment</th>
          



          <!-- <th>PC Type</th>
          <th>Purchase Year</th>
          <th>Category</th>
          <th>Brand Name</th>
          <th>Description</th>
          <th>Package Name</th>
          <th>Year for AMC</th>
          <th>QTY</th>
          <th>Price</th>
          <th>GST Amt</th>
          <th>Total Amt</th>
          <th>Order Status</th>
          
          <th>Payment Option</th>
          <th>payment Remarks</th>
          <th>Attchment</th>-->
           
        </thead>
        <tbody>
      <?php //
      $iiid = $_SESSION["deal_id"];
      $dlid = $_SESSION['dlrid'];
      $idds = $_SESSION["del_id"];
        $sql = "SELECT * FROM `tbl_amc_sale_dealer` where dealer_name='$dlid' order by id desc";
        $query = $conn->query($sql);
          while($row = $query->fetch_assoc()){
                                  
            echo "
            <tr>
              <td valign='center'>".$row['id']."</td>
              <td valign='center'><a href='amc-sale-detail.php?amcsid=".$row['id']."'>$iiid".$row['id']."</a></td>
              <td>".$row['sale_dt']."</td>
              <td>QSDL0".$row['dealer_name'].' / '.$row['city1']."</td>
              
              <td>".$row['package_name']."</td>
              <td>".$row['gst']."</td>
              <td>".$row['gstamt']."</td>
              <td>".$row['tot_amt']."</td>
              <td>".$row['payment_option']."</td>
              <td>".$row['order_status']."<br>".$row['status_date']."</td>

              

              <td>".$row['payment_remarks']."</td>
              <td><a href='upload/".$row['payment_attachment']."' target='_blank' class='btn btn-xs btn-success'>Attacment</a></td>              
              

            </tr>";
                    }
                  ?><!--button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button-->
                </tbody>
              </table>
        </div>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
<?php 
//include  'includes/del_amc_model.php'; 
?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
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
