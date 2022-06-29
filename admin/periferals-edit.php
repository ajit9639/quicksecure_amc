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
      <h1>Edit Peripherals</h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
    
        <li class="active">Edit Peripherals</li>
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
      var txtItemName1 = $('#txtItemName').val();
      var txtPrice1 = $('#txtPrice').val();
      var txtGST1 = $('#txtGST').val();
      var txtGSTAmt1 = $('#txtGSTAmt').val();
      var txtTotPrice1 = $('#txtTotPrice').val();
      var txtBrandName1 = $('#txtBrandName').val();
      var txtColorName1 = $('#txtColorName').val();
   
        $.post('periferals-update-data.php',{action: "add1", txtID:txtID1,txtItemName:txtItemName1,txtPrice:txtPrice1,txtGST:txtGST1,txtGSTAmt:txtGSTAmt1,txtTotPrice:txtTotPrice1,txtBrandName:txtBrandName1,txtColorName:txtColorName1},function(res){
          $('#result').html(res);
        });   

          $('#txtProcessor').val('');
 
        });

 
 
      });
</script>			
			
            <?php
             $id=$_GET['id'];
             $sql = "SELECT * FROM tbl_periferals where id='$id'";
              $query = $conn->query($sql);
              if($crow = $query->fetch_assoc()){
                  $tID = $crow['id'];
                  $pcode = $crow['pcode'];
                  $itemname = $crow['item_name'];
                  $price = $crow['price'];
                  $gst = $crow['gst'];
                  $gstamt = $crow['gstamt'];
                  $totalamt = $crow['totalamt'];
                  $colorname = $crow['color_name'];
                  $brandname = $crow['brand_name'];
              }
                   
            ?> 
			
<div class="form-horizontal">
  <div class="box-body">
 <input type="hidden" id="txtID" name="txtID" value="<?php echo $tID;?>">
<!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        
  <div class="form-group">
      <label for="txtItemName" class="col-sm-2 control-label">Item Name</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtItemName" name="txtItemName" value="<?php echo $itemname;?>">
        </div>

      <label for="txtBrandName" class="col-sm-2 control-label">Brand Name</label>
        <div class="col-sm-4">
   
          <select class="form-control" name="txtBrandName" id="txtBrandName">
            <option value="<?php echo $brandname;?>"><?php echo $brandname;?></option>
            <option value="NA">- Select -</option>
              <?php
                $sql = "SELECT * FROM tbl_brand";
                $query = $conn->query($sql);
                  while($crow = $query->fetch_assoc()){
                    echo "<option value='".$crow['brandname']."'>".$crow['brandname']."</option>";
                }
              ?>
          </select> 
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

        var amt = price1 * 1;
        var gstamt = (amt * gstper) /100;

        document.getElementById("txtGSTAmt").value = gstamt ;
        document.getElementById("txtTotPrice").value = (+amt) + (+gstamt);
    }
</script>     

  <div class="form-group">
      <label for="txtColorName" class="col-sm-2 control-label">Color Name</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtColorName" name="txtColorName" value="<?php echo $colorname;?>">
        </div> 
</div>

  <div class="form-group">
      <label for="txtPrice" class="col-sm-2 control-label">Price</label>
        <div class="col-sm-2">
          <input type="text" class="form-control pull-right" id="txtPrice" name="txtPrice" onchange="calcu()" value="<?php echo $price;?>">
        </div>     
      <label for="txtGST" class="col-sm-2 control-label">GST %</label>
        <div class="col-sm-2">
          <input type="text" class="form-control pull-right" id="txtGST" name="txtGST" value="18" onchange="calcu()" value="<?php echo $gst;?>">
        </div>
     
      <label for="txtGSTAmt" class="col-sm-2 control-label">GST Amt</label>
        <div class="col-sm-2">
          <input type="text" class="form-control pull-right" id="txtGSTAmt" name="txtGSTAmt" readonly value="<?php echo $gstamt;?>">
        </div>

  </div>   
      <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        

  <div class="form-group">   
      <label for="txtTotPrice" class="col-sm-2 control-label">Total Price</label>
        <div class="col-sm-2">
          <input type="text" class="form-control pull-right" id="txtTotPrice" name="txtTotPrice" readonly value="<?php echo $totalamt;?>">
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
                   <button id="add1" class="btn btn-primary btn-flat pull-left" name="add1"><i class="fa fa-save"></i> Save</button>
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
