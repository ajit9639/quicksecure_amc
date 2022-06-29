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
        <th style='width:0%;'>#</th>
        <th>Dealer Name/ID</th>
        <th>Order ID</th>
        <th>Order Date</th>
        <th>Product</th>
        <th>Model No.</th>
        <th>Processor</th>
        <th>Ram</th>
        <th>HDD/SSD</th>
        <th>OS</th>
        <th>Graphics</th>
        <th>Display</th>
        <th>Amount</th>
        <th>Delete</th>
        </thead>
        <tbody>
      <?php //
        $sql = "SELECT * FROM tbl_order order by id desc";
        $query = $conn->query($sql);
          while($crow = $query->fetch_assoc()){
                                  
      echo "<tr><td style='text-align:center;'>
      <input type='hidden' style='width:20px;border-width:0px;border:none;background: transparent;' id='txtN' name='txtN' value='$crow[id]' readonly>$crow[id]</td>
      <td style='text-align:center;'>$crow[dealer_name] / QSDL$crow[dealer_id]</td>
      <td style='text-align:center;'>$crow[orderid]</td>
      <td style='text-align:center;'>$crow[order_date]</td>
      <td style='text-align:center;'>$crow[product]</td>
      <td style='text-align:center;'>$crow[modalno]</td>
      <td style='text-align:center;'>$crow[processor1]</td>
      <td style='text-align:center;'>$crow[ram1]</td>
      <td style='text-align:left;'>$crow[hddssd]</td>
      <td style='text-align:left;'>$crow[os1]</td>
      <td style='text-align:center;'>$crow[graphics1]</td>
      <td style='text-align:left;'>$crow[display1]</td>
      <td style='text-align:left;'>$crow[total_amt]</td>
      <td style='text-align:left;'><a href='del-temp-data.php?id=$crow[id]' class='btn btn-danger btn-flat'>
        <i class='fa fa-save'></i> Del</a></td>
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
