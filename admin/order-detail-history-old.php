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
                                            <th>Dealer Name / ID</th>
                                            <th>QTY</th>
                                            <th>GST%</th>
                                            <th>GST Amount</th>
                                            <th>Total Amount</th>
                                            <th>Payment Mode</th>
                                            <th>Order Status</th>
                                            <th>Remarks</th>
                                            <th>Attachment</th>
                                            <th>Edit Status</th>
                                            <th>Update</th>

                                        </thead>
                                        <tbody>
                                            <?php //
        $sql = "SELECT * FROM tbl_order order by id desc";
        $query = $conn->query($sql);
          while($crow = $query->fetch_assoc()){
                                  
      echo "<tr><td style='text-align:center;'>
      <input type='hidden' style='width:20px;border-width:0px;border:none;background: transparent;' id='txtN' name='txtN' value='$crow[id]' readonly>$crow[id]</td>
      <td style='text-align:center;'>$crow[orderid]</td>
      <td style='text-align:center;'>$crow[order_date]</td>
      <td style='text-align:center;'>$crow[dealer_name] / QSDL$crow[dealer_id]</td>
      
      <td style='text-align:center;'>$crow[qty]</td>
      <td style='text-align:left;'>$crow[gst_percentage]</td>
      <td style='text-align:left;'>$crow[gst_amount]</td>
      <td style='text-align:left;'>$crow[total_price]</td>


      <td style='text-align:center;'>$crow[payment_mode]</td>

      <td style='text-align:center;'>$crow[order_status]</td>



      <td style='text-align:center;'>$crow[remarks]</td>

      <td style='text-align:center;'>$crow[attachment]</td>
      
      <td style='text-align:center;'>


<select class='form-control' name='txtPaymentMode' id='txtPaymentMode'          onchange='getText(this)' required>
                                                    
                                            </option>
                                            <option value='>$crow[orderid]'>$crow[orderid]</option>
                                            
                                            <option value='Pending Order'>Pending Order</option>
                                            <option value='Delevered Order'>Delevered Order</option>
                                            <option value='Delevered Order'>Delevered Order</option>
                                            <option value='Return Order'>Return Order</option>
                                            <option value='Cancel Order'>Cancel Order</option>
                                            <option value='Placed Order'>Placed Order</option>
                                            </select>
                                            </td>

                                            </select>

                                            <div id='myModal' class='modal'>                                               
                                            <div class='modal-content'>
                                                <span class='close' id='close'>&times;</span>
                                                <form method='POST' action=''>
                                                     <div class='form-group'>
                                                        <label for='email'>Order Status1:</label>
                                                        <select class='form-control' name='status1' id='type' important>
                                                            <option selected disabled>Select Order Status</option>
                                                            <option value='Pending_Order'>Pending Order</option>
                                                            <option value='Delevered_Order' >Delevered Order</option>
                                                            <option value='Return_Order'>Return Order</option>
                                                            <option value='Cancel_Order'>Cancel Order</option>
                                                            <option value='Placed_Order'>Placed Order</option>
                                                        </select>
                                                    </div>

                                                    <div class='form-group'>
                                                        <label for='email'>Enter Remarks:</label>
                                                        <textarea type='text' class='form-control' id='rem'
                                                            placeholder='Enter Remarks' name='remarks1' important></textarea>
                                                    </div>

                                                    <button type='button' id='btnSubmit' name='update_me' class='btn btn-default'>Submit</button>
                                                </form>
                                            </div>
                                        </div>

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

<script type="text/javascript">
    $(document).ready(function(){
            $("#btnSubmit").click(function(e) {
                e.preventDefault();

                // BUILD DATA STRING
                var id = $("#txtPaymentMode").val();
                var type = $("#type").val();
                var remark = $("#rem").val();
                var dataString = "id=" + id + "type=" + type + "&remark=" + remark;
                alert(type); 

                // $.ajax({
                //     type: 'POST',
                //     url: 'update_order.php',
                //     data: dataString,
                //     success: function(data) {
                //        alert("data is updated successfully");
                //     }
                // });
              
            });
        });
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