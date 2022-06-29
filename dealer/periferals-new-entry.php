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
      <h1>Order Peripherals</h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
    
        <li class="active">Order Peripherals</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
 
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
 					 	
			
<div class="form-horizontal">
  <div class="box-body">
 
<!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->   
<script type="text/javascript">
    $(document).ready(function(){
      $("#txtItemName").keyup(function(){
        $.ajax({
        type: "POST",
        url: "readItem.php",
        data:'keyword='+$(this).val(),
        beforeSend: function(){
          $("#txtItemName").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
        },
        success: function(data){
          $("#suggesstion-box").show();
          $("#suggesstion-box").html(data);
          $("#txtItemName").css("background","#FFF");
        }
        });
      });
    });

    function selectCountry(val) {
    $("#txtItemName").val(val);
    $("#suggesstion-box").hide();
    }
</script>     

<?php
                          include "../dbConnect.php";


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
                          }
                      ?>
  <form role="form" method="POST" action="ins-tmp-peripherals-data.php" name="frmForm" id="frmForm">
  <div class="form-group">
<center>
<table border="0" width="85%">
  <tr>
 
   <th align="center"><label for="txtItemName" class="control-label">Item Name</label></th>
   <th align="center"><label for="txtBrandName" class="control-label">Brand Name</label></th>
   <th align="center"><label for="txtColorName" class="control-label">Color Name</label></th> 
   <th align="center"><label for="txtQty" class="control-label">QTY</label></th>
  </tr>
<?php


?>
  <tr>
 
    <td>
      <input type="text" class="form-control" id="txtItemName" name="txtItemName" autocomplete="off" style="width: 300px;"> 
    </td>

    <td><select class="form-control" name="txtBrandName" id="txtBrandName" style="width: 150px;">
              <option value="NA">- Select -</option>
                <?php
                  $sql = "SELECT * FROM tbl_brand";
                  $query = $conn->query($sql);
                    while($crow = $query->fetch_assoc()){
                      echo "<option value='".$crow['brandname']."'>".$crow['brandname']."</option>";
                    }
                ?>
            </select> </td>
    <td><input type="text" class="form-control" id="txtColorName" name="txtColorName" style="width: 130px;"></td>
    <td><input type="text" class="form-control" id="txtQty" name="txtQty" onchange="calcu()" style="width: 65px;"></td>
</tr>
</table>

<table border="0" width="75%">
  <tr> 
   <th align="center"><label for="txtPrice" class="control-label">Price</label></th>
   <th align="center"><label for="txtGST" class="control-label">GST %</label></th>
   <th align="center"><label for="txtGSTAmt" class="control-label">GST Amt</label></th>
   <th align="center"><label for="txtTotPrice" class="control-label">Total Price</label></th>
  </tr>    
    <td><input type="text" class="form-control" id="txtPrice" name="txtPrice" onchange="calcu()" style="width: 100px;"></td>
    <td><input type="text" class="form-control" id="txtGST" name="txtGST" value="18" onchange="calcu()" style="width: 65px;"></td>
    <td><input type="text" class="form-control" id="txtGSTAmt" name="txtGSTAmt" style="width: 100px;" readonly></td>
    <td><input type="text" class="form-control" id="txtTotPrice" name="txtTotPrice" style="width: 130px;" readonly></td>
  </tr>
<tr>
  <td colspan="4"><hr></td>
</tr>
  <tr>
    <td><a href="ins-peripherals-data.php" class="btn btn-success btn-flat">
            <i class="fa fa-save"></i> Save</a>
    </td>
    <td></td>
    <td></td>
    <td><button type="submit" id="add1" class="btn btn-primary btn-flat" name="add1"><i class="fa fa-save"></i> Add</button></td>
  </tr>



</table>




</center>
    
<!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->  
<script type="text/javascript">
   function calcu()
    {
        var price1 = document.getElementById("txtPrice").value;
        var gstper = document.getElementById("txtGST").value;

 qt = 1; 

        if (document.getElementById("txtGST").value=="")
          {gstper = 0;}

        var amt = price1 * qt;
        var gstamt = (amt * gstper) /100;

        document.getElementById("txtGSTAmt").value = gstamt ;
        document.getElementById("txtTotPrice").value = (+amt) + (+gstamt);
    }
</script>     
 <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        
   </div>  
  <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        
</div>
 
 <!--              
	<div class="box-footer">
	 	
  	<div class="form-group">
      <div class="col-sm-12">
        <div class="form-group">
          <div class="col-sm-12">
           <button id="add1" class="btn btn-primary btn-flat pull-left" name="add1"><i class="fa fa-save"></i> Save</button>
          </div>
        </div>                  
      </div>
  	</div>

	</div>-->

<!-- /.box-footer -->
			  
			  </div>
			  
            </form>
		<hr>
        <div class="form-group">
          <div id="result"></div>

<?php

//z x z x z x z xz x z x z x z xz x z x z x z xz x z x z x z xz x z x z x z x
      $sql   = "select * from tbl_peripherals_order_by_dealer_tmp order by id desc";
    $query = $conn->query($sql);
    
    echo "<table class='table table-bordered'>";
    echo  "<tr style='background:#eeeeee; text-align:center;'>
        <th style='width:0%;'>#</th>
        <th>Item Name</th>
        <th>Brand Name</th>
        <th>Color Name</th>
        <th>QTY</th>
        <th>Price</th>
        <th>GST %</th>
        <th>GST Amt</th>
        <th>Total</th>
        <th>Delete</th>
        </tr>";
        
    while($crow = $query->fetch_assoc()){
      
      echo "<tr>
              <td style='text-align:center;'>
              <input type='hidden' style='width:20px;border-width:0px;border:none;background: transparent;' id='txtN' name='txtN' value='$crow[id]' readonly>$crow[id]</td>
              <td style='text-align:center;'>$crow[item_name]</td>
              <td style='text-align:center;'>$crow[brand_name]</td>
              <td style='text-align:center;'>$crow[color_name]</td>
              <td style='text-align:left;'>$crow[qty]</td>
              <td style='text-align:left;'>$crow[price]</td>
              <td style='text-align:center;'>$crow[gst]</td>
              <td style='text-align:left;'>$crow[gstamt]</td>
              <td style='text-align:left;'>$crow[totalamt]</td>
              <td style='text-align:left;'>
              <a href='del-temp-peripheral-data.php?id=$crow[id]' class='btn btn-danger btn-flat'><i class='fa fa-save'></i> Del</a></td>
            </tr>";
    }
      echo "</table>";    
  //z x z x z x z xz x z x z x z xz x z x z x z xz x z x z x z xz x z x z x z x 


?>


        </div>  
<!-- ************* ************* ****************** --> 

				
          </div>
       
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
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'DD/MM/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('D MMMM, YYYY') + ' - ' + end.format('D MMMM, YYYY'))
      }
    )

    //Date picker
    $('#txtOrderDate').datepicker({
      autoclose: true
    })
    $('#txtValidityDate').datepicker({
      autoclose: true
    })
          
    //iCheck for checkbox and radio inputs   
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript" src="frontend-script.js"></script>

</body>
</html>
