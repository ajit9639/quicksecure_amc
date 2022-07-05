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
                                            <th>Dealer Id / City</th>
                                            
                                            <th>Gst Amt</th>
                                            <th>Total Amt</th>
                                            <th>Payment Mode </th>
                                            <th>Order Status </th>

                                            <th>Remarks </th>
                                            <th>Attachment </th>
                                            <th>Update Order </th>

                                        </thead>
                                        <tbody>
                                            <?php //
        // $sql = "SELECT * FROM tbl_order_peripheral where `type`='dealer' order by id desc";
        $sql = "SELECT sum(qty) as qty1,sum(`gst_amount`) as gst1,sum(`total_price`) as total1,`dealer_id`,`qty`,`gst_percentage`,`gst_amount`,`total_price`,`order_date`,`remarks`,`order_status`,`payment_mode`,`orderid`,`attachment`,`status_date`,`id` FROM `tbl_order_peripheral` where `type`='dealer' AND `product`='peripharel' group BY orderid order by orderid";
        $query = $conn->query($sql);
          while($row = $query->fetch_assoc()){
            $odd = $row['orderid'];
            $attach = $row['attachment'];
            $dealer_id = $row['dealer_id'];

            $get_dealer = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `tbl_dealer` where `id`=' $dealer_id'"));

            echo "
            <tr>
              <td valign='center'>".$row['id']."</td>
              <td style='text-align:center;'><a href='order-detail-view-peripheral-dl.php?odid=$odd'>$odd</a></td>
              
              <td>".$row['order_date']."</td>
              <td>".$get_dealer['dealerid']. '<br>' . $get_dealer['city']."</td>
              

              
              <td>".$row['gst_amount']."</td>
              <td>".$row['total_price']."</td>

              <td>".$row['payment_mode']."</td>
              <td>".$row['order_status']."<br>".$row['status_date']."</td>
              <td>".$row['remarks']."</td>
              <td><a href='upload/$attach' class='btn btn-success btn-xs' target='_blank'>Attachment</a></td>
              <td><a href='update_order_peripheral.php?id=$odd' class='btn btn-success btn-xs'>Update</a></td>
 
             
            </tr>";
                    }
                  ?>
                                            <!--button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button-->
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
            url: 'periferals-row-from-dealer.php',
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