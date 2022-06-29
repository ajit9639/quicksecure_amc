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
      <h1>AMC Detail</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">AMC Detail</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
   
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="new-amc-entry.php" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp;Add New AMC</a>
            </div>
            <div class="box-body">
      <div style="overflow-x:auto;">
      <table id="example1" class="table table-bordered" style="width:100%;">
        <thead style="background-color: #80CBC4;">
          <th>ID</th>
          <th>Item</th>
          <th>Description</th>
          <th>Price Range</th>
          <th>Package Name</th>
          <th>Duration</th>
          <th>Basic Price</th>
          <th>GST</th>
          <th>Total Price</th>
          <th>Tools</th>
        </thead>
        <tbody>
      <?php //
        $sql = "SELECT * FROM tbl_amc order by id desc";
        $query = $conn->query($sql);
          while($row = $query->fetch_assoc()){
                                  
            echo "
            <tr>
              <td valign='center'>".$row['id']."</td>
              <td>".$row['item']."</td>
              <td>".$row['description']."</td>
              <td>".$row['price_from'].'-'.$row['proce_to']."</td>
              <td>".$row['package_name']."</td>
              <td>".$row['duration']." Year</td>
              <td>".$row['basic_price']."</td>
              <td>".$row['gst']."</td>
              <td>".$row['total_price']."</td>

              <td>            
                <a href='edit-amc.php?id=".$row['id']."' class='btn btn-info btn-sm btn-flat'><i class='fa fa-edit'></i> Edit</a>
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
<?php include 'includes/del_amc_model.php'; ?>
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
    url: 'amc_row.php',
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
