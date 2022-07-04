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
                <h1>Summery</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Summery</li>
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
                                    <div id="printableArea">
                                        <table id="example1" class="table table-bordered" style="width:100%;">


                                            <tbody>
                                                <tr>
                                                    <td colspan="12" align="center">
                                                        <h3>Quick Secure India Pvt Ltd.</h3>

                                                        Holding No-2, Ramdas Bhatta, Main Road
                                                        Adjecent to Brajdham Mandir, near Dhobhi Ghat<br>
                                                        Bistupur, Jamshedpur-831001, Jharkhand.<br>
                                                        <strong>Phone:</strong> [000-000-0000],
                                                        <strong>Website:</strong> www.quicksecureindia.com
                                                        <br>

                                                    </td>
                                                </tr>
                                                <?php 

       $idd=$_GET['odid'];
        $pmmode="";$dlrid="";
        // echo $sql = "SELECT a.*,c.staff_name FROM tbl_order a, tbl_staff_master b, tbl_staff_master c where a.id='$idd' and a.staffid=b.staffid order by a.id desc";
       $sql = "SELECT * from `tbl_order` where `orderid`='$idd'";
        
        $query = mysqli_query($conn ,$sql);
        $row = mysqli_fetch_assoc($query);
          // echo $dlridd = $query['dealer_id'];
          $oddid = $row['orderid'];
          // if($row = $query->fetch_assoc()){
                // exit();
                $dlridd = $row['dealer_id'];
                $date = $row['order_date'];
               
                // $pmmode = $row['payment_option'];
                // $dlrname = $row['dealer_name'];
                // $premarks = $row['payment_remarks'];
                // $attchmt = $row['payment_attachment'];                
                
            // $dateTimeObj = date_create($row['sale_dt']); 
            // $dt1=date_format($dateTimeObj, "d-m-Y");
 
         $sql1 = "SELECT * FROM `tbl_staff_master` where id='$dlridd'";
        $query1 = $conn->query($sql1);
          if($row1 = $query1->fetch_assoc()){
            $staffname = $row1['staff_name'];
            $staffid = $row1['staffid'];
            $staffcity = $row1['city'];

          } ?>


                                                <tr>
                                                 
                                                <td valign='center'>Staff Name : <?php echo $staffname ?></td>
                                                <td valign='center' >Staff ID : <?php echo $staffid ?></td>
                                                <td valign='center' >Staff City : <?php echo $row1['city'] ?></td>  
                                                <td valign='center'>Order Id : <?php echo $staffcity ?></td>
                                                <td valign='center'>Order Date : <?php echo $date ?></td>
                                                
                                                <td valign='center' colspan='2'>Payment Mode : <?php echo $row['payment_mode'] ?></td>
                                                <td valign='center' colspan='3'>Remarks : <?php echo $row['remarks'] ?></td>
                                                <td valign='center' colspan='3'>Attachment : 
                                            <a href="upload/<?php echo $row['attachment'] ?>" download="dowmload" class="btn btn-danger btn-xs">Download</a>
                                            </td>
                                                                                                
                                                </tr>


                                                <tr>
                                                    <th>SNO. </th>
                                                    <th>Model No. </th>
                                                    <th>Processor. </th>
                                                    <th>RAM. </th>
                                                    <th>HDD/SSD. </th>
                                                    <th>OS. </th>
                                                    <th>Graphics. </th>
                                                    <th>Display. </th>
                                                    <th>Unit Price. </th>
                                                    <th>Qty. </th>
                                                    <th>GST% </th>
                                                    <th>GST Amount </th>
                                                    <th>Amount. </th>
                                                </tr>


                                                <?php 
$s = 1;
$sql1 = mysqli_query($conn , "SELECT * from `tbl_order` where `orderid`='$idd'");
// $row22 = mysqli_fetch_array($sql1);
$i = 0;
while($row2 = mysqli_fetch_assoc($sql1)){
    $all_total = $row2['exclusive_price'] * $row2['qty'];
?>
                                                <tr>
                                                    <td><?php echo $s ?> </td>
                                                    <td><?php echo $row2['modalno'] ?> </td>
                                                    <td><?php echo $row2['processor1'] ?> </td>
                                                    <td><?php echo $row2['ram1'] ?> </td>
                                                    <td><?php echo $row2['hddssd'] ?> </td>
                                                    <td><?php echo $row2['os1'] ?> </td>
                                                    <td><?php echo $row2['graphics1'] ?> </td>
                                                    <td><?php echo $row2['display1'] ?> </td>
                                                    <td><?php echo $row2['unit_price'] ?> </td>
                                                    <td><?php echo $row2['qty'] ?> </td>
                                                    <td><?php echo $row2['gst_percentage'] ?>% </td>
                                                    <td><?php echo $row2['gst_amount'] ?> </td>
                                                    <td><?php echo $all_total ?> </td>
                                                </tr>
                                                <?php 
$s++;
number_format((float)$i = $i + $all_total, 2, '.', '');
} 


// $sql12 = mysqli_query($conn , "SELECT * from `tbl_order` where `orderid`='$idd'");
$sql12 = mysqli_query($conn , "SELECT  sum(exclusive_price) as ex,sum(gst_amount) as gst,sum(total_price) as Total from `tbl_order` where `orderid`='$idd'");
$row22 = mysqli_fetch_array($sql12);
?>

                                                <tr>
                                                    <td colspan='13'></td>
                                                </tr>

                                                <tr>
                                                    <td colspan="9"></td>

                                                    <td colspan='2'><strong>Sub Total </strong></td>
                                                    <td colspan='2'><?php echo $i; ?></td>
                                                </tr>

                                                <!-- <tr>
                                                    <td colspan="8"></td>
                                                    <td colspan='2'><strong>GST% </strong></td>
                                                    <td colspan='2'><?php // echo $row22['gst_percentage'] ?>%</td>
                                                </tr> -->

                                                <tr>
                                                    <td colspan="9"></td>
                                                    <td colspan='2'><strong>GST Amt. </strong></td>
                                                    <td colspan='2'><?php echo number_format((float)$row22['gst'], 2, '.', '') ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9"></td>
                                                    <td colspan='2'><strong>Total Price </strong></td>
                                                    <td colspan='2'><?php echo number_format((float)$i + $row22['gst'], 2, '.', '') ?></td>
                                                </tr>




                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>

<?php
$get_my_data12 = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `tbl_order` WHERE `orderid`='$oddid'"));
$data11 = $get_my_data12['payment_mode'];
$data12 = $get_my_data12['remarks'];
$data13 = $get_my_data12['attachment'];

if(empty($data11) AND empty($data12) AND empty($data13)){

?>
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="txtItemType" class="col-sm-2 control-label">Payment Mode</label>
                                            <div class="col-sm-2">
                                                <select class="form-control" name="txtPaymentMode" id="txtPaymentMode"
                                                    onchange="getText(this)" required>
                                                    <option value="<?php echo $pmmode;?>"><?php echo $pmmode;?></option>
                                                    <option value="-">--Select--</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="OnLine">OnLine</option>
                                                </select>
                                            </div>
                                            <label for="txtRemarks" class="col-sm-1 control-label">Remarks</label>
                                            <div class="col-sm-2">
                                                <input type="text" name="txtRemarks" id="txtRemarks" value="" required>
                                            </div>

                                            <label for="txtmyfile" class="col-sm-1 control-label"></label>

                                            <div class="col-sm-2">
                                                <input type="file" id="attach_file" name="attach_file" required>
                                            </div>
                                            <label for="txtsubmit" class="col-sm-1 control-label"></label>
                                            <div class="col-sm-1">
                                                <input type="submit" name="print_submit"
                                                    class="btn btn-block btn-primary btn-sm" value="&nbsp;Print&nbsp;">
                                            </div>
                                        </div>

                                    </form>
                                    <?php 
}else{
    echo "<a href='#' class='btn btn-success' onclick='print()'>Print</a>";
}



if(isset($_POST['print_submit'])){
    $iddd = $_GET['odid'];
  $txtPaymentMode = $_POST['txtPaymentMode'];
  $txtRemarks = $_POST['txtRemarks'];

  $filename = $_FILES["attach_file"]["name"];
  $tempname = $_FILES["attach_file"]["tmp_name"];
  $folder = "upload/".$filename;
  move_uploaded_file($tempname, $folder);

//   echo $a ="UPDATE `tbl_order` SET `payment_mode`='$txtPaymentMode',`remarks`='$txtRemarks',`attachment`='$filename' where `orderid`='$idd'";

  $update_attachment = mysqli_query($conn ,"UPDATE `tbl_order` SET `payment_mode`='$txtPaymentMode',`remarks`='$txtRemarks',`attachment`='$filename',`order_active`='active' where `orderid`='$idd'");
  if($update_attachment){
    echo "<script>
    
    window.onload = function() {
        if(!window.location.hash) {
            window.location = window.location + '#loaded';
            window.location.reload();
        }
    }
    
    </script>";
  }
}
?>
                                    <!--<button id="myBtn">Open Modal</button>-->

                                    <!-- The Modal -->
                                    <div id="myModal" class="modal">

                                        <!-- Modal content -->
                                        <div class="modal-content">
                                            <span class="close" id="close">&times;</span>
                                            <img src="images/qrcode.jpg" class="img-fluid qr-code">
                                        </div>

                                    </div>


                                    <!-- <a href="print-amc-sale-dealer.php?odid=<?php //echo $_GET['odid'];?>"><i class="fa fa-print"></i>&nbsp;Print</a>-->



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include 'includes/footer.php'; ?>

    </div>
    <?php include 'includes/scripts.php'; ?>
    <style type="text/css">
    /* The Modal (background) */
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
        if (textHolder == "OnLine") {
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

    <script type="text/javascript">
    function printPageArea(areaID) {
        var printContent = document.getElementById(areaID);
        var WinPrint = window.open('', '', 'width=900,height=650');
        WinPrint.document.write(printContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }

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
            url: 'amc-row.php',
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