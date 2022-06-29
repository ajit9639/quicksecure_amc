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
      <h1>Peripherals Detail From Dealers</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Peripherals Detail From Dealers</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
   
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
<!--             <div class="box-header with-border">
              <a href="periferals-new-entry.php" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp;Add New Peripherals</a>
            </div> -->
            <div class="box-body">
      <div style="overflow-x:auto;">
      <table id="example1" class="table table-bordered" style="width:100%;">
        <thead style="background-color: #80CBC4;">
          <th>ID</th>
          <th>Order No.</th>
          <th>order Date</th>
          <th>Item Name</th>
          <th>Brand Name</th>
          <th>Color</th>
          <th>QTY</th>
          <th>PRICE</th>
          <th>GST %</th>
          <th>Gst Amt</th>
          <th>Total Amt</th>
          <th>Tools</th>
        </thead>
        <tbody>
      <?php //
        $sql = "SELECT * FROM tbl_peripherals_order_by_dealer order by id desc";
        $query = $conn->query($sql);
          while($row = $query->fetch_assoc()){
                                  
            echo "
            <tr>
              <td valign='center'>".$row['id']."</td>
              <td>".$row['ordno']."</td>
              <td>".$row['order_date']."</td>
              <td>".$row['item_name']."</td>
              <td>".$row['brand_name']."</td>
              <td>".$row['color_name']."</td>
              <td>".$row['qty']."</td>
              <td>".$row['price']."</td>
              <td>".$row['gst']."</td>
              <td>".$row['gstamt']."</td>
              <td>".$row['totalamt']."</td>
 
              <td>            
                <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>

              </td>
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
<?php include 'includes/del_periferals_model-from-dealer.php'; ?>
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
    url: 'periferals-row-from-dealer.php',
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
