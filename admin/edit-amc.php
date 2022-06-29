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
      <h1>Edit AMC</h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
    
        <li class="active">Edit AMC</li>
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
              var txtDescription1 = $('#txtDescription').val();
              var txtPRF1 = $('#txtPRF').val();
              var txtPRT1 = $('#txtPRT').val();
              var txtPackageName1 = $('#txtPackageName').val();
              var txtDuration1 = $('#txtDuration').val();
              var txtBasicPrice1 = $('#txtBasicPrice').val();
              var txtGST1 = $('#txtGST').val();
              var txtTotalPrice1 = $('#txtTotalPrice').val();
  
      //syntax - $.post('filename', {data}, function(response){});
        $.post('update-amc-data.php',{action: "add1", txtID:txtID1,txtItemName:txtItemName1,txtDescription:txtDescription1,txtPRF:txtPRF1,txtPRT:txtPRT1,txtPackageName:txtPackageName1,txtDuration:txtDuration1,txtBasicPrice:txtBasicPrice1,txtGST:txtGST1,txtTotalPrice:txtTotalPrice1},function(res){
          $('#result').html(res);
        });   

          $('#txtDealerName').val('');
 
        });

 
 
      });
</script>			
					
 
 		
			
<div class="form-horizontal">
  <div class="box-body">


		<div class="form-group">
      <!--<label for="txtBillNo" class="col-sm-2 control-label">ID</label>-->

        <div class="col-sm-4">
            <?php
              $id=$_GET['id'];
             $sql = "SELECT * FROM tbl_amc where id='$id'";
              $query = $conn->query($sql);
              if($crow = $query->fetch_assoc()){
                	$tID = $crow['id'];
                  $tItemName = $crow['item'];
                  $tDescription = $crow['description'];
                  $tPRF = $crow['price_from'];
                  $tPRT = $crow['proce_to'];
                  $tPackageName = $crow['package_name'];
                  $tDuration = $crow['duration'];
                  $tBasicPrice = $crow['basic_price'];
                  $tGST = $crow['gst'];
                  $tTotalPrice = $crow['total_price'];
              }
                   
            ?>
          

            
        </div>
 
 
</div>

  <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->   
  <form name="frm" method="post" action="update-amc-data.php">
<input type="hidden" class="form-control" id="txtID" name="txtID" value="<?php echo $tID; ?>" style="text-align: center;" readonly>
  <div class="form-group">
      <label for="txtItemName" class="col-sm-2 control-label">Item Name</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtItemName" name="txtItemName" value="<?php echo $tItemName; ?>">
        </div>
     
      <label for="txtDescription" class="col-sm-2 control-label">Description</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtDescription" name="txtDescription" value="<?php echo $tDescription; ?>">
        </div>

  </div>

    <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        

  <div class="form-group">
      <label for="txtPRF" class="col-sm-2 control-label">Price Range From</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtPRF" name="txtPRF" value="<?php echo $tPRF; ?>">
        </div>
     
      <label for="txtPRT" class="col-sm-2 control-label">Price Range To</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtPRT" name="txtPRT" value="<?php echo $tPRT; ?>">
        </div>

  </div>
      <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        

  <div class="form-group">
      <label for="txtPackageName" class="col-sm-2 control-label">Package Name</label>
        <div class="col-sm-4">
          <select class="form-control pull-right" id="txtPackageName" name="txtPackageName">
           <!-- <option value="<?php // echo $tPackageName;?>"><?php //echo $tPackageName;?></option>-->
            <option value="0">--Select--</option>
            <?php  
             $sql = "SELECT * FROM tbl_package";
              $query = $conn->query($sql);
               while($crow = $query->fetch_assoc()){?>
            <option value="<?php echo $crow['package_name'];?>"><?php echo $crow['package_name'];?></option>
              <?php }?>
          </select>          
        </div>
     
      <label for="txtDuration" class="col-sm-2 control-label">Duration</label>
        <div class="col-sm-4">
  
          <select class="form-control pull-right" id="txtDuration" name="txtDuration">
            <option value="<?php echo $tDuration;?>"><?php echo $tDuration;?> Year</option>
            <option value="0">--Select--</option>
            <option value="1">1 Year</option>
            <option value="2">2 Year</option>
            <option value="3">3 Year</option>
            <option value="5">5 Year</option>
          </select>
        </div>

  </div>
      <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        

  <div class="form-group">
      <label for="txtBasicPrice" class="col-sm-2 control-label">Basic Price</label>
        <div class="col-sm-2">
          <input type="text" class="form-control pull-right" id="txtBasicPrice" name="txtBasicPrice" value="<?php echo $tBasicPrice; ?>">
        </div>
     
      <label for="txtGST" class="col-sm-2 control-label">GST</label>
        <div class="col-sm-2">
          <input type="text" class="form-control pull-right" id="txtGST" name="txtGST" value="<?php echo $tGST; ?>">
        </div>

      <label for="txtTotalPrice" class="col-sm-2 control-label">Total Price</label>
        <div class="col-sm-2">
          <input type="text" class="form-control pull-right" id="txtTotalPrice" name="txtTotalPrice" value="<?php echo $tTotalPrice; ?>">
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
			  </form>
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
