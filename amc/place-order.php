<?php 
// session_start();
include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-12">

                        <!-- general form elements disabled -->
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">Place New Order</h3>
                            </div>
                            <!-- /.box-header -->

                            <div class="box-body">
                                <!-- ==========================  ==============================  -->
                                <script type="text/javascript">
                                function changeSID() {
                                    oForm = eval(document.getElementById("frmForm"));
                                    iMdlNo = document.getElementById("txtModelno").value;
                                    url = "place-order.php?frm_action=3&mdl_no=" + iMdlNo;
                                    document.location = url;
                                }

                                function calcu() {
                                    var rate1 = document.getElementById("txtRate").value;
                                    var qt = document.getElementById("txtQTY").value;
                                    document.getElementById("txtTotal").value = rate1 * qt;
                                    var price1 = document.getElementById("txtTotal").value;
                                    var gstper = document.getElementById("txtGST").value;
                                    if (document.getElementById("txtGST").value == "") {
                                        gstper = 0;
                                    }
                                    var gstamt = 0;
                                    var examt = 0;

                                    examt = price1 / 1.18;
                                    document.getElementById("txtExPrice").value = examt.toFixed(2);

                                    gstamt = price1 - examt; // (price1 * gstper) /100;

                                    document.getElementById("txtGSTAmt").value = (price1 - examt).toFixed(2);
                                    document.getElementById("txtTotPrice").value = (+examt) + (+gstamt);
                                }
                                </script>

                                <?php
                          include "includes/conn.php";


                          //===========================================
                          if(isset($_GET['mdl_no'])){
                           $mdlno=0;
                         
                          $mdlno = $_GET['mdl_no'];

                          $sql = "SELECT * FROM tbl_item where modalno='$mdlno'";
                          $query = $conn->query($sql);
                          if($crow = $query->fetch_assoc()){
                            $mdn=$crow['modalno'];
                            $proc=$crow['processor1'];

                            $ram2=$crow['ram1'];
                            $hddssd2=$crow['hddssd'];
                            $os2=$crow['os1'];
                            $graphics2=$crow['graphics1'];
                            $display2=$crow['display1'];
                           $rt=$crow['price'];
                           $prd=$crow['product'];
                           $gst_per=$crow['gst_per'];
                           $stock=$crow['stock'];
                            }  
                          }else{
                            $mdn="";
                            $proc="";

                            $ram2="";
                            $hddssd2="";
                            $os2="";
                            $graphics2="";
                            $display2="";
                           $rt="";
                           $prd="";
                           $gst_per="";
                           $stock="";
                          }
                      ?>

                                <form role="form" method="POST" action="ins_data.php" name="frmForm" id="frmForm">
                                    <input type="hidden" name="txtRate" id="txtRate" value="<?php echo $rt;?>">

                                    <table width="100%">
                                        <tr>
                                            <td>Order ID</td>
                                            <?php
         $sql = "SELECT max(id) as mxid FROM tbl_order order by id desc";
        $query = $conn->query($sql);
          if($row = $query->fetch_assoc()){
      $tempid=$row['mxid'];
          }   


          $dealer_id_name =  $_SESSION['staffid'];
// $ordrid = 'QSDL' . str_pad(($tempid + 1), 3, '0', STR_PAD_LEFT);
// $ordrid = $dealer_id_name . str_pad(($tempid + 1),  '-', STR_PAD_LEFT);
$ordrid = $dealer_id_name.'-CL-'. ($tempid + 1);
?>

                                            <td><input type="text" name="txtOrderID" id="txtOrderID"
                                                    class="form-control" value="<?php echo $ordrid;?>" readonly></td>
                                            <td>&nbsp;&nbsp;</td>
                                            <td>Date</td>
                                            <td colspan="2"><input type="text" name="txtDate" id="txtDate"
                                                    class="form-control" value="<?php echo date('d-m-Y');?>"></td>

                                            <td>&nbsp;&nbsp;</td>
                                            <td>Product</td>
                                            <td>
                                                <select class="form-control" name="txtProductType" id="txtProductType">
                                                    <option value="<?php echo $prd;?>"><?php echo $prd;?></option>
                                                    <option value="0">- Select Type -</option>
                                                    <option value="Laptop">Laptop</option>
                                                    <option value="Desktop">Desktop</option>
                                                </select>
                                            </td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td colspan="10">
                                                <hr>
                                            </td>
                                        </tr>
                                    </table>

                                    <table width="100%" cellpadding="10px" cellspacing="5px">
                                        <tr>
                                            <td width="20%">
                                                <div class="form-group">
                                                    <label>Model No.</label>
                                                    <select class="form-control" name="txtModelno" id="txtModelno"
                                                        onchange="javascript:changeSID();">
                                                        <option value="<?php echo $mdn;?>"><?php echo $mdn;?></option>
                                                        <option value="0">- Select -</option>
                                                        <?php
                      
                          $sql = "SELECT distinct modalno FROM tbl_item";
                          $query = $conn->query($sql);
                          while($crow = $query->fetch_assoc()){
                            echo "<option value='".$crow['modalno']."'>".$crow['modalno']."</option>";
                            }

                        ?>
                                                    </select>
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;&nbsp;</td>
                                            <td width="20%">
                                                <div class="form-group">
                                                    <label>Processor</label>
                                                    <input type="text" name="txtProcessor" id="txtProcessor"
                                                        class="form-control" value="<?php echo $proc;?>"
                                                        placeholder="Enter ...">
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;&nbsp;</td>
                                            <td width="20%">
                                                <div class="form-group">
                                                    <label>RAM</label>
                                                    <input type="text" name="txtRam" id="txtRam" class="form-control"
                                                        value="<?php echo $ram2;?>" placeholder="Enter ...">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label>HDD/SSD</label>
                                                    <input type="text" name="txtHddSsd" id="txtHddSsd"
                                                        class="form-control" value="<?php echo $hddssd2;?>"
                                                        placeholder="Enter ...">
                                                </div>
                                            </td>
                                            <td>&nbsp;&nbsp;</td>
                                            <td>
                                                <div class="form-group">
                                                    <label>OS</label>
                                                    <input type="text" name="txtOS" id="txtOS" class="form-control"
                                                        value="<?php echo $os2;?>" placeholder="Enter ...">
                                                </div>
                                            </td>
                                            <td>&nbsp;&nbsp;</td>
                                            <td>
                                                <div class="form-group">
                                                    <label>Graphics</label>
                                                    <input type="text" name="txtGraphics" id="txtGraphics"
                                                        class="form-control" value="<?php echo $graphics2;?>"
                                                        placeholder="Enter ...">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label>Display</label>
                                                    <input type="text" name="txtDisplay" id="txtDisplay"
                                                        class="form-control" value="<?php echo $display2;?>"
                                                        placeholder="Enter ...">
                                                </div>
                                            </td>
                                            <td>&nbsp;&nbsp;</td>
                                            <td>
                                                <div class="form-group">
                                                    <label>Qty</label>
                                                    <b style="color:red">(Our stock value is : <?php echo $stock;?>)</b>
                                                    <input type="number" class="form-control pull-right" id="mystock"
                                                        name="mystock" value="<?php echo $stock ?>"
                                                        style="display:none">
                                                    <input type="text" name="txtQTY" id="txtQTY" class="form-control"
                                                        onchange="javascript:calcu();" placeholder="Enter ..." required>
                                                    <b id="errorMsg" style="display:none;color:red">you can enter
                                                        quantity less then stock value</b>
                                                </div>
                                            </td>
                                            <td>&nbsp;&nbsp;</td>
                                            <td>
                                                <div class="form-group">
                                                    <label>Unit Price</label>
                                                    <input type="text" name="txtPrice" id="txtPrice"
                                                        value="<?php echo $rt;?>" class="form-control"
                                                        placeholder="Enter ..." readonly>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- <tr>
    <td>
                <div class="form-group">
                  <label>Total</label>
                  <input type="text" name="txtTotal" id="txtTotal" class="form-control" placeholder="Enter ...">
                </div>      
    </td>

    <td></td>
    <td></td>
  </tr> -->



                                        <!-- gst -->
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label>Inclusive Price</label>
                                                    <!-- <input type="text" class="form-control pull-right" id="txtPrice" name="txtPrice" onchange="calcus()"> -->
                                                    <input type="text" name="txtTotal" id="txtTotal"
                                                        class="form-control" placeholder="Enter ..." readonly>
                                                </div>
                                            </td>
                                            <td>&nbsp;&nbsp;</td>
                                            <td>
                                                <div class="form-group">
                                                    <label>Exclusive Price</label>
                                                    <input type="text" class="form-control pull-right" id="txtExPrice"
                                                        name="txtExPrice" readonly>
                                                </div>
                                            </td>
                                            <td>&nbsp;&nbsp;</td>
                                            <td>
                                                <div class="form-group">
                                                    <label>GST%</label>

                                                    <input type="text" class="form-control pull-right" id="txtGST"
                                                        name="txtGST" value="<?php echo $gst_per ?>" readonly>
                                                    <!-- <select class="form-control pull-right" id="txtGST" name="txtGST" onchange="calcus()">            
            <option value="0">0</option>
            <option value="12">12</option>
            <option value="18">18</option>
            <option value="28">28</option>
          </select>           -->
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label>GST Amt.</label>
                                                    <input type="text" class="form-control pull-right" id="txtGSTAmt"
                                                        name="txtGSTAmt" readonly>
                                                </div>
                                            </td>
                                            <td>&nbsp;&nbsp;</td>
                                            <td>
                                                <div class="form-group">
                                                    <label>Total Price</label>
                                                    <input type="text" class="form-control pull-right" id="txtTotPrice"
                                                        name="txtTotPrice" readonly>
                                                </div>
                                            </td>

                                        </tr>
                                        <!-- //gst -->




                                        <tr><?php $dlid=$_SESSION['id'];?>
                                            <td><a href="ins-order-data.php?dlrid=<?php $dlid;?>"
                                                    class="btn btn-success btn-flat">
                                                    <i class="fa fa-save"></i> Save</a></td>

                                            <td><button type="submit" id="add1" class="btn btn-primary btn-flat"
                                                    name="add1">
                                                    <i class="fa fa-save"></i> Add</button></td>

                                            <td></td>
                                        </tr>
                                    </table>

                                    <!-- stock script -->
                                    <script>
                                    $("#txtQTY").keyup(function() {

                                        if (parseInt($('#txtQTY').val()) <= parseInt($('#mystock').val())) {
                                            $('#errorMsg').hide();
                                            $('#add1').show();
                                        } else {
                                            $('#errorMsg').show();
                                            $('#add1').hide();
                                        }
                                    });
                                    </script>
                                    <!-- // stock script -->
                                    <script type="text/javascript">
                                    function calcus() {
                                        var price1 = document.getElementById("txtTotal").value;
                                        var gstper = document.getElementById("txtGST").value;

                                        if (document.getElementById("txtGST").value == "") {
                                            gstper = 0;
                                        }

                                        var gstamt = 0;
                                        var examt = 0;

                                        if (gstper == 12) {
                                            examt = price1 / 1.12;
                                            document.getElementById("txtExPrice").value = examt.toFixed(2);
                                        } else if (gstper == 18) {
                                            examt = price1 / 1.18;
                                            document.getElementById("txtExPrice").value = examt.toFixed(2);
                                        } else if (gstper == 28) {
                                            examt = price1 / 2.28;
                                            document.getElementById("txtExPrice").value = examt.toFixed(2);
                                        }

                                        gstamt = price1 - examt; // (price1 * gstper) /100;

                                        document.getElementById("txtGSTAmt").value = (price1 - examt).toFixed(2);
                                        document.getElementById("txtTotPrice").value = (+examt) + (+gstamt);
                                    }
                                    </script>
                                    <script type="text/javascript">
                                    $(function() {

                                                $('#add1').click(function() {


                                                            var txtOrderID = $('#txtOrderID').val();

                                                            var txtModelno1 = $('#txtModelno').val();
                                                            var txtProcessor1 = $('#txtProcessor').val();
                                                            var txtRam1 = $('#txtRam').val();
                                                            var txtHddSsd1 = $('#txtHddSsd').val();
                                                            var txtOS1 = $('#txtOS').val();
                                                            var txtGraphics1 = $('#txtGraphics').val();
                                                            var txtDisplay1 = $('#txtDisplay').val();
                                                            var txtQTY1 = $('#txtQTY').val();

                                                            var unit_price = $('#txtPrice').val();

                                                            var inclusive_price = $('#txtTotal').val();

                                                            var exclusive_price = $('#txtExPrice').val();

                                                            var gst_percentage = $('#txtGST').val();

                                                            var gst_amount = $('#txtGSTAmt').val();

                                                            var total_price = $('#txtTotPrice').val();

                                                            $.post('ins_data.php', {
                                                                action: "add1",
                                                                txtOrderID: txtOrderID,
                                                                txtModelno: txtModelno1,
                                                                txtProcessor: txtProcessor1,
                                                                txtRam: txtRam1,
                                                                txtHddSsd: txtHddSsd1,
                                                                txtOS: txtOS1,
                                                                txtGraphics: txtGraphics1,
                                                                txtDisplay: txtDisplay1,
                                                                txtQTY: txtQTY1,
                                                                txtPrice: unit_price,
                                                                txtTotal: inclusive_price,
                                                                txtExPrice: exclusive_price,
                                                                txtGST: gst_percentage,
                                                                txtGSTAmt: gst_amount,
                                                                txtTotPrice: total_price
                                                            }, function(res) {
                                                                $('#result').html(res);
                                                            });

                                                            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++   
                                    </script>


                                </form>

                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                <script type='text/javascript'>
                                $(function() {

                                    $("#txtModelno").OnChange({
                                        source: function(request, response) {

                                            $.ajax({
                                                url: "fetchdata.php",
                                                type: 'post',
                                                dataType: "json",
                                                data: {
                                                    search: request.term
                                                },
                                                success: function(data) {
                                                    response(data);
                                                }
                                            });
                                        },
                                        select: function(event, ui) {
                                            $('#txtProcessor').val(ui.item
                                            .label); // display the selected text
                                            $('#txtRam').val(ui.item
                                            .value); // save selected id to input        
                                            return false;
                                        },
                                        focus: function(event, ui) {
                                            $("#txtProcessor").val(ui.item.label);
                                            $("#txtRam").val(ui.item.value);
                                            return false;
                                        },
                                    });
                                });

                                function split(val) {
                                    return val.split(/,\s*/);
                                }

                                function extractLast(term) {
                                    return split(term).pop();
                                }
                                </script>
                                <!-- ************* ************* ****************** -->
                                <div class="form-group">
                                    <div id="result"></div>

                                    <?php

//z x z x z x z xz x z x z x z xz x z x z x z xz x z x z x z xz x z x z x z x
      $sql   = "select * from tbl_demo order by id desc limit 10";
    $query = $conn->query($sql);
    
    echo "<table class='table table-bordered'>";
    echo  "<tr style='background:#eeeeee; text-align:center;'>
        <td style='width:0%;'>#</td>
        <td>Model No.</td>
        <td>Processor</td>
        <td>Ram</td>
        <td>HDD/SSD</td>
        <td>OS</td>
        <td>Graphics</td>
        <td>Display</td>
        <td>Amount</td>
        
        </tr>";
        
    while($crow = $query->fetch_assoc()){
      
      echo "<tr><td style='text-align:center;'>
      <input type='hidden' style='width:20px;border-width:0px;border:none;background: transparent;' id='txtN' name='txtN' value='$crow[id]' readonly>$crow[id]</td>
      <td style='text-align:center;'>$crow[modalno]</td>
      <td style='text-align:center;'>$crow[processor1]</td>
      <td style='text-align:center;'>$crow[ram1]</td>
      <td style='text-align:left;'>$crow[hddssd]</td>
      <td style='text-align:left;'>$crow[os1]</td>
      <td style='text-align:center;'>$crow[graphics1]</td>
      <td style='text-align:left;'>$crow[display1]</td>
      <td style='text-align:left;'>$crow[total_price]</td>
      
      </tr>";
    }
    echo "</table>";    
  //z x z x z x z xz x z x z x z xz x z x z x z xz x z x z x z xz x z x z x z x 


?>


                                </div>
                                <!-- ************* ************* ****************** -->



                                <!-- ==========================  ==============================  -->
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (right) -->
        </div>
        <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>


    <!-- /.content-wrapper -->


    <?php include 'includes/footer.php'; ?>


    <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->

    <?php include 'includes/scripts.php'; ?>
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>

</body>

</html>