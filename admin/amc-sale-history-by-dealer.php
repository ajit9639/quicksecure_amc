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
      <h1>AMC Sale By Dealer</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">AMC Sale By Dealer</li>
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
      <table id="example1" class="table table-bordered" style="width:100%;">
        <thead style="background-color: #80CBC4;">
          <th>ID</th>
          <th>Sl. No.</th>
          <th>Date</th>
          <th>Item Category</th>
          <th>QTY</th>
          <th>Total Amt</th>
          <th>Dealer ID</th>
          <th>Remarks</th>
          <th>View Detail</th>
         <!-- <th>Tools</th>-->
        </thead>
        <tbody>

      <?php 
        $sql = "SELECT * FROM tbl_amc_sale_dealer order by id desc";
        $query = $conn->query($sql);
          while($row = $query->fetch_assoc()){
                                  
            echo "
            <tr>
              <td valign='center'>".$row['id']."</td>
              <td valign='center'><a href='amc-sale-dealer.php?amcsid=".$row['id']."'>QSAMC".$row['id']."</a></td>
              <td valign='center'>".$row['sale_dt']."</td>
              <td>".$row['item_category']."</td>
              <td>".$row['qty']."</td>
              <td>".$row['tot_amt']."</td>
              <td>".$row['dealer_name']."</td>
              <td>".$row['remarks']."</td>
              <td><a href='amc-sale-dealer.php?amcsid=".$row['id']."' class='btn btn-info btn-sm btn-flat'><i class='fa fa-eye'></i> View Detail</a></td>

            </tr>";
                    }
                  ?><!--

              <td>            
                <a href='amc-edit.php?ordid=".$row['id']."' class='btn btn-info btn-sm btn-flat'><i class='fa fa-edit'></i> Edit</a>
                <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>

              </td>
                    button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button-->
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
