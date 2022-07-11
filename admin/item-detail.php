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
      <h1>Item Detail</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Item Detail</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
   
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="new-item-entry.php" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp;Add New Item</a>
            </div>
            <div class="box-body">
      <div style="overflow-x:auto;">
      <table id="example1" class="table table-bordered" style="width:100%;">
        <thead style="background-color: #80CBC4;">
          <th>ID</th>
          <th>Product</th>
          <th>Modal No.</th>
          <th>Processor</th>
          <th>RAM</th>
          <th>HDD/SSD</th>
          <th>OS</th>
          <th>Office</th>
          <th>Graphics</th>
          <th>Display</th>
          <th>Colour</th>
          <th>GST %</th>
          <th>GST Amt</th>
          <th>Price</th>
          <th>Stock</th>
          <th>Tools</th>
        </thead>
        <tbody>
      <?php //
        $sql = "SELECT * FROM tbl_item order by id desc";
        $query = $conn->query($sql);
          while($row = $query->fetch_assoc()){
                                  
            echo "
            <tr>
              <td valign='center'>".$row['id']."</td>
              <td>".$row['product']."</td>
              <td>".$row['modalno']."</td>
              <td>".$row['processor1']."</td>
              <td>".$row['ram1']."</td>
              <td>".$row['hddssd']."</td>
              <td>".$row['os1']."</td>
              <td>".$row['office1']."</td>
              <td>".$row['graphics1']."</td>
              <td>".$row['display1']."</td>
              <td>".$row['color1']."</td>
              <td>".$row['gst_per']."</td>
              <td>".$row['gst_amt']."</td>
              <td>".$row['price']."</td>
              <td>".$row['stock']."</td>

              <td>            
                <a href='edit-item.php?id=".$row['id']."' class='btn btn-info btn-sm btn-flat'><i class='fa fa-edit'></i> Edit</a>
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
<?php include 'includes/del_item_model.php'; ?>
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
    url: 'item_row.php',
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
