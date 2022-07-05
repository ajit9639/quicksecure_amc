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
      <h1>Order Detail</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Order Detail</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
   
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
<!--             <div class="box-header with-border">
              <a href="brand-entry.php" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp;Place New Order</a>
            </div> -->
            <div class="box-body">
      <div style="overflow-x:auto;">
      <table id="example1" class="table table-bordered" style="width:100%;">
        <thead style="background-color: #80CBC4;">
        <th style='width:0%;'>SNO</th>
        <th>Order ID</th>
        <th>Order Date</th>


        <!-- sno,order id,order date,dealer city,
   qty,gst%,gst amount,total amount,payment mode,payment status,remarks ,attachment,view details -->


        <th>QTY</th>
        <th>GST Amt</th>
        <th>Total Amt</th>
        <!-- <th>Dealer City</th> -->
        <th>Payment Mode</th>
        <th>Payment Status</th>
        <th>Remarks</th>
        <th>Attachment</th>
        
        <!-- <th>Display</th>
        <th>QTY</th>
        <th>Amount</th> -->
        <!-- <th>Delete</th> -->
        </thead>
        <tbody>
      <?php //


        $delid = $_SESSION["del_id"]; 
        // $sql = "SELECT * FROM tbl_order_peripheral where `product`='peripharel' order by id desc";
        // echo "SELECT sum(qty) as qty1,sum(`gst_amount`) as gst1,sum(`total_price`) as total1,`order_date`,`remarks`,`order_status`,`payment_mode`,`orderid`,`attachment`,`status_date`,`id` FROM `tbl_order_peripheral` where `dealer_id`='$delid' AND `product`='peripharel' group BY orderid order by orderid";exit();
        $sql = "SELECT sum(qty) as qty1,sum(`gst_amount`) as gst1,sum(`total_price`) as total1,`order_date`,`remarks`,`order_status`,`payment_mode`,`orderid`,`attachment`,`status_date`,`id` FROM `tbl_order_peripheral` where `dealer_id`='$delid' AND `product`='peripharel' group BY orderid order by orderid";
        $query = $conn->query($sql);
          while($crow = $query->fetch_assoc()){
            // $get_attachment = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `tbl_dealer_attachment`"));
                                  
      echo "<tr><td style='text-align:center;'>
      <input type='hidden' style='width:20px;border-width:0px;border:none;background: transparent;' id='txtN' name='txtN' value='$crow[id]' readonly>$crow[id]</td>
      

      <td style='text-align:center;'><a href='order-detail-view-peripheral.php?odid=".$crow['orderid']."'>".$crow['orderid']."</a></td>
      
      


      <td style='text-align:center;'>$crow[order_date]</td>
      <td style='text-align:center;'>$crow[qty1]</td>
      <td style='text-align:center;'>$crow[gst1]</td>
      <td style='text-align:center;'>$crow[total1]</td>

      <td style='text-align:center;'>$crow[payment_mode]</td>
      <td style='text-align:center;'>$crow[order_status]</td>
      <td style='text-align:center;'>$crow[remarks] / $crow[status_date]</td>
      <td style='text-align:center;'>
      <a href='upload/$crow[attachment]' class='btn btn-xs btn-danger'>Download</a>
      </td>
      
      
      
      </tr>";
                    }
                  ?><!--button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button-->
              <!-- <td style='text-align:left;'><a href='del-order-data.php?id=$crow[id]' class='btn btn-danger btn-flat'> 
              <i class='fa fa-save'></i> Del</a></td> -->


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
<?php include 'includes/del_brand_model.php'; ?>
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
    url: 'brand-row.php',
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
