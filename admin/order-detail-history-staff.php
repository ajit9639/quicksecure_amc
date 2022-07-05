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
                                            <th>Staff Name / ID</th>
                                            <th>Staff City</th>
                                            
                                            <th>GST Amount</th>
                                            <th>Total Amount</th>
                                            <th>Payment Mode</th>
                                            <th>Order Status / Date</th>
                                            <th>Remarks</th>
                                            <th>Attachment</th>
                                            <th>Edit Status</th>

                                        </thead>
                                        <tbody>
                                            <?php //
        // $sql = "SELECT * FROM `tbl_order` where `type`='staff' order by id desc";
        $sql = "SELECT sum(qty) as qty1,sum(`gst_amount`) as gst1,sum(`total_price`) as total1,`dealer_name`,`dealer_id`,`qty`,`gst_percentage`,`gst_amount`,`total_price`,`dealer_name`,`order_date`,`remarks`,`order_status`,`payment_mode`,`orderid`,`attachment`,`status_date`,`id` FROM `tbl_order`where `type`='staff' AND `product`='laptop' || `product`='desktop' group BY orderid order by orderid";
        $query = $conn->query($sql);
          while($crow = $query->fetch_assoc()){
                                  $idd = $crow['orderid'];
                                  $attach = $crow['attachment'];
                                  $dlid = $crow['dealer_id'];
$get_delid = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_staff_master` WHERE `id`='$dlid'"));

      echo "<tr><td style='text-align:center;'>
      <input type='hidden' style='width:20px;border-width:0px;border:none;background: transparent;' id='txtN' name='txtN' value='$crow[id]' readonly>$crow[id]</td>
      <td style='text-align:center;'><a href='order-detail-view.php?odid=$crow[orderid]'>$crow[orderid]</a></td>
      <td style='text-align:center;'>$crow[order_date]</td>
      <td style='text-align:center;'>$crow[dealer_name] / QSDL$crow[dealer_id]</td>
      
      
      <td style='text-align:left;'>$get_delid[city]</td>
      <td style='text-align:left;'>$crow[gst_amount]</td>
      <td style='text-align:left;'>$crow[total_price]</td>


      <td style='text-align:center;'>$crow[payment_mode]</td>

      <td style='text-align:center;'>$crow[order_status]  $crow[status_date]</td>



      <td style='text-align:center;'>$crow[remarks]</td>

      <td style='text-align:center;'><a href='../amc/upload/$attach' class='btn btn-xs btn-success'>Attachment</a></td>
      <td style='text-align:center;'><a href='update_order.php?id=$idd' class='btn btn-xs btn-success'>Update Status</a></td>
  


                                        
                                            </tr>
                                                                                                                                                                                
                                            ";
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
        <?php include 'includes/del_brand_model.php'; ?>
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
            url: 'brand-row.php',
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



    <!-- model start -->
    <style type="text/css">
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 999;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 30%;

    }

    .modal-content .qr-code {
        width: 100%;
        height: auto;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
    </style>

    <script type="text/javascript">
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];


    var btn = document.getElementById("txtPaymentMode").value;

    function getText(element) {
        var textHolder = element.options[element.selectedIndex].text
        if (textHolder == "Pending Order" || textHolder == "Delevered Order" || textHolder == "Return Order" ||
            textHolder == "Cancel Order" || textHolder == "Placed Order") {
            modal.style.display = "block";
        }
    }


    // When the user clicks the button, open the modal 
    btn.onchange = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
    <!-- model end -->



</body>

</html>