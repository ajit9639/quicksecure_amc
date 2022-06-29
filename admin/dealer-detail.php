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
              <a href="new-dealer-registration.php" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp;Add New Dealer</a>
            </div>
            <div class="box-body">
      <div style="overflow-x:auto;">
      <table id="example1" class="table table-bordered" style="width:100%;">
        <thead style="background-color: #80CBC4;">
          <th>ID</th>
          <th>Dealer ID</th>
          <th>Dealer Name</th>
          <th>Store Name</th>
          <th>Ph. No.</th>
          <th>Address</th>
          <th>City</th>
          <th>State</th>
          <th>Pin Code</th>
          <th>GST</th>
          <th>E-Mail</th>
          <th>UID</th>
          <th>Approved</th>
          <th>Tools</th>
        </thead>
        <tbody>
      <?php //
        $sql = "SELECT * FROM tbl_dealer order by id desc";
        $query = $conn->query($sql);
          while($row = $query->fetch_assoc()){
                                  
            echo "
            <tr>
              <td valign='center'>".$row['id']."</td>
              <td>".$row['dealerid']."</td>
              <td>".$row['dealer_name']."</td>
              <td>".$row['store_name']."</td>
              <td>".$row['phno']."</td>
              <td>".$row['address']."</td>
              <td>".$row['city']."</td>
              <td>".$row['state1']."</td>
              <td>".$row['pincode']."</td>
              <td>".$row['gst']."</td>
              <td>".$row['email']."</td>
              <td>".$row['uid']."</td>
              <td>".$row['status']."</td>

              <td>            
                <a href='edit-dealer.php?id=".$row['id']."' class='btn btn-info btn-sm btn-flat'><i class='fa fa-edit'></i> Edit</a>
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
<?php include 'includes/del_dealer_model.php'; ?>
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
    url: 'dealer_row.php',
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
