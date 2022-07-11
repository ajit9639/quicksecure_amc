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
      <h1>Edit Item</h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
    
        <li class="active">Edit Item</li>
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
 			
 <script type="text/javascript">
		$(function(){
			//insert record
			$('#add1').click(function(){
 			
 			var txtID1 = $('#txtID').val();
      var txtProductType1 = $('#txtProductType').val();
      var txtModalNo1  = $('#txtModalNo').val();
      var txtProcessor1  = $('#txtProcessor').val();
      var txtRam1  = $('#txtRam').val();
      var txthddSsd1  = $('#txthddSsd').val();
      var txtOS1  = $('#txtOS').val();
      var txtOffice1  = $('#txtOffice').val();
      var txtGraphics1  = $('#txtGraphics').val();
      var txtColor1  = $('#txtColor').val();
      var txtDisplay1  = $('#txtDisplay').val();
      var txtPrice1  = $('#txtPrice').val();
      var txtExPrice1  = $('#txtExPrice').val();
      var txtGST1  = $('#txtGST').val();
      var txtGSTAmt1 = $('#txtGSTAmt').val();
      var txtTotPrice1  = $('#txtTotPrice').val();
      var stock  = $('#stock').val();
  
      //syntax - $.post('filename', {data}, function(response){});
        $.post('update-item-data.php',{action: "add1", txtID:txtID1,txtProductType:txtProductType1,txtModalNo:txtModalNo1,txtProcessor:txtProcessor1,txtRam:txtRam1,txthddSsd:txthddSsd1,txtOS:txtOS1,txtOffice:txtOffice1,txtGraphics:txtGraphics1,txtColor:txtColor1,txtDisplay:txtDisplay1,txtPrice:txtPrice1,txtExPrice:txtExPrice1,txtGST:txtGST1,txtGSTAmt:txtGSTAmt1,txtTotPrice:txtTotPrice1,stock:stock},function(res){
          $('#result').html(res);
        });   

          //$('#txtDealerName').val('');
 
        });

 
 
      });
</script>			
					
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript"> 
      $(document).ready( function() {
        $('#msg').delay(4000).fadeOut();
        $('#result').delay(4000).fadeOut();
      });
    </script>	
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible' id='msg'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible' id='msg'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4> 
              ".$_SESSION['success']."
            </div>
          ";
         unset($_SESSION['success']);
					//echo "<div class='alert alert-success alert-dismissible' id='result'> </div>";
					//echo "<div id='result'></div>";
        } 
      ?>			
			
             <?php
            $id=$_GET['id'];
             $sql = "SELECT * FROM tbl_item where id='$id'";
              $query = $conn->query($sql);
              if($crow = $query->fetch_assoc()){
  
                  $tID = $crow['id'];
                  $tProductType = $crow['product'];
                  $tModalNo = $crow['modalno'];
                  $tProcessor = $crow['processor1'];
                  $tRam = $crow['ram1'];
                  $thddSsd = $crow['hddssd'];
                  $tOS = $crow['os1'];
                  $tOffice = $crow['office1'];
                  $tGraphics = $crow['graphics1'];
                  $tDisplay = $crow['display1'];
                  $tColor = $crow['color1'];
                  $tGST = $crow['gst_per'];
                  $tGSTAmt = $crow['gst_amt'];
                  $tPrice = $crow['price'];
                  $tExPrice = $crow['excludingprice'];
                  $tTotPrice = $crow['excludingprice'];
                  $stock = $crow['stock'];
                  
              }
                   
            ?>

<div class="form-horizontal">
  <div class="box-body">
<input type="hidden" id="txtID" name="txtID" value="<?php echo $tID;?>">
  <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        

  <div class="form-group">
      <label for="txtProductType" class="col-sm-2 control-label">Product/Item</label>
        <div class="col-sm-4">
                    <select class="form-control" name="txtProductType" id="txtProductType">
                      <option value="<?php echo $tProductType;?>"><?php echo $tProductType;?></option>
                      <option value="0">- Select Item -</option>
                      <option value="Laptop">Laptop</option>
                      <option value="Desktop">Desktop</option>
                    </select>
        </div>
     
      <label for="txtModalNo" class="col-sm-2 control-label">Modal No.</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtModalNo" name="txtModalNo" value="<?php echo $tModalNo;?>">
        </div>

  </div>
  <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        

  <div class="form-group">

     
      <label for="txtProcessor" class="col-sm-2 control-label">Processor</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtProcessor" name="txtProcessor" value="<?php echo $tProcessor;?>">
        </div>
      <label for="txtRam" class="col-sm-2 control-label">RAM</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtRam" name="txtRam" value="<?php echo $tRam;?>">
        </div>
  </div>

    <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        

  <div class="form-group">

     
      <label for="txthddSsd" class="col-sm-2 control-label">HDD/SSD</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txthddSsd" name="txthddSsd" value="<?php echo $thddSsd;?>">
        </div>
      <label for="txtOS" class="col-sm-2 control-label">OS</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtOS" name="txtOS" value="<?php echo $tOS;?>">
        </div>
  </div>
      <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        

  <div class="form-group">

     
      <label for="txtOffice" class="col-sm-2 control-label">Office</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtOffice" name="txtOffice" value="<?php echo $tOffice;?>">
        </div>
      <label for="txtGraphics" class="col-sm-2 control-label">Graphics</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtGraphics" name="txtGraphics" value="<?php echo $tGraphics;?>">
        </div>
  </div>
<!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        
  <div class="form-group">

     
      <label for="txtColor" class="col-sm-2 control-label">Colour</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtColor" name="txtColor" value="<?php echo $tColor;?>">
        </div>
      <label for="txtDisplay" class="col-sm-2 control-label">Display</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtDisplay" name="txtDisplay" value="<?php echo $tDisplay;?>">
        </div>
  </div>    
   
<!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->  
<script type="text/javascript">
     function calcu()
      {
        var price1 = document.getElementById("txtPrice").value;
        var gstper = document.getElementById("txtGST").value;

        if (document.getElementById("txtGST").value=="")
        {
          gstper = 0;
        }

    var gstamt=0;
    var examt=0;

    if (gstper==12){examt=price1/1.12;
    document.getElementById("txtExPrice").value = examt ;
    }else if (gstper==18){examt=price1/1.18;
    document.getElementById("txtExPrice").value = examt ;
    }else if (gstper==28){examt=price1/2.28;
    document.getElementById("txtExPrice").value = examt ;
    }

        gstamt =price1 - examt; // (price1 * gstper) /100;

        document.getElementById("txtGSTAmt").value = price1 - examt;
        document.getElementById("txtTotPrice").value = (+examt) + (+gstamt);
      }
</script> 
<div class="form-group">
  <label class="col-sm-2 control-label"></label><label for="txtPrice" class="col-sm-2 control-label">Inclusive Price</label>
  <label for="txtPrice" class="col-sm-2 control-label">Exclusive Price</label>
  <label for="txtGST" class="col-sm-2 control-label">GST %</label>
  <label for="txtGSTAmt" class="col-sm-2 control-label">GST Amt</label>
</div>

  <div class="form-group">
      <label class="col-sm-2 control-label"></label>
        <div class="col-sm-2">
          <input type="text" class="form-control pull-right" id="txtPrice" name="txtPrice" onchange="calcu()" value="<?php echo $tPrice;?>">
        </div>
        
        <div class="col-sm-2">
          <input type="text" class="form-control pull-right" id="txtExPrice" name="txtExPrice" value="<?php echo $tExPrice;?>">
        </div>

      
        <div class="col-sm-2">
          <select class="form-control pull-right" id="txtGST" name="txtGST" onchange="calcu()">
            <option value="<?php echo $tGST;?>"><?php echo $tGST;?></option>
            <option value="0">0</option>
            <option value="12">12</option>
            <option value="18">18</option>
            <option value="28">28</option>

          </select>
          
        </div>
     
      
        <div class="col-sm-2">
          <input type="text" class="form-control pull-right" id="txtGSTAmt" name="txtGSTAmt" readonly value="<?php echo $tGSTAmt;?>">
        </div>

  </div>   
      <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        

  <div class="form-group">

     
      <label for="txtTotPrice" class="col-sm-2 control-label">Total Price</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtTotPrice" name="txtTotPrice" readonly value="<?php echo $tPrice;?>">
        </div>

        <label for="stock" class="col-sm-2 control-label">Stock</label>
        <div class="col-sm-4">
          <input type="number" class="form-control pull-right" id="stock" name="stock" value="<?php echo $stock;?>">
        </div>

  </div>  
  <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        
 
  
</div>
               
  <div class="box-footer">
    
    <div class="form-group">
        <div class="col-sm-12">
            <div class="form-group">
                <div class="col-sm-12">
                   <!--<a href="#" class="btn btn-info pull-right"><i class="fa fa-save"></i> Update & Review </a> -->
                   <button id="add1" class="btn btn-primary btn-flat pull-left" name="add1"><i class="fa fa-save"></i> Update</button>
                </div>
            </div>                  
        </div>
    </div>

  </div>

<!-- /.box-footer -->
        
        </div>
			  
            <!--/form-->
		<hr>
				<div class="form-group">
					<div id="result"></div>
				</div>
				
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
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
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
</body>
</html>
