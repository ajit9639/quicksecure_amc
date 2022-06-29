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
      <h1>Edit AMC Sale</h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
    
        <li class="active">Edit AMC Sale</li>
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
      var txtItemType1 = $('#txtItemType').val();
      var txtPurchaseYear1 = $('#txtPurchaseYear').val();
      var txtItemCategory1 = $('#txtItemCategory').val();
      var txtBrandName1 = $('#txtBrandName').val();
      var txtItemDescription1 = $('#txtItemDescription').val();
  
      var txtPackageName1 = $('#txtPackageName').val();
      var txtYrofAMC1 = $('#txtYrofAMC').val();
      var txtQTY1 = $('#txtQTY').val();
      var txtPrice1 = $('#txtPrice').val();
      var txtGST1 = $('#txtGST').val();
      var txtTotAmt1 = $('#txtTotAmt').val();


      //syntax - $.post('filename', {data}, function(response){});
        $.post('update-amc-data.php',{action: "add1", txtID:txtID1,txtItemType:txtItemType1,txtPurchaseYear:txtPurchaseYear1,txtItemCategory:txtItemCategory1,txtBrandName:txtBrandName1,txtItemDescription:txtItemDescription1,txtPackageName:txtPackageName1,txtYrofAMC:txtYrofAMC1,txtQTY:txtQTY1,txtPrice:txtPrice1,txtGST:txtGST1,txtTotAmt:txtTotAmt1},function(res){
          $('#result').html(res);
        });   

          $('#txtItemType').val('');
          $('#txtPurchaseYear').val('');
          $('#txtItemCategory').val('');
          $('#txtBrandName').val('');
          $('#txtItemDescription').val('');
          $('#txtPackageName').val('');
          $('#txtYrofAMC').val('');
          $('#txtQTY').val('');
          $('#txtPrice').val('');
          $('#txtGST').val('');
          $('#txtTotAmt').val('');
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
			
	   <input type="hidden" class="form-control" id="txt_name" name="txt_name" value="<?php //echo $user['firstname'].' '.$user['lastname']; ?>" required readonly>

            <!--form class="form-horizontal"-->

<div class="form-horizontal">
  <div class="box-body">


		<div class="form-group">
      <!--<label for="txtBillNo" class="col-sm-2 control-label">ID</label>-->

        <div class="col-sm-4">
            <?php
            $id=$_GET['ordid'];
             $sql = "SELECT * FROM tbl_amc_sale where id='$id'";
              $query = $conn->query($sql);
              if($crow = $query->fetch_assoc()){
                	$tID = $crow['id'];

                	$tItemType = $crow['item_type'];
									$tPurchaseYear = $crow['purchase_year'];
									$tItemCategory = $crow['item_category'];
									$tBrandName = $crow['brand_name'];
									$tItemDescription = $crow['item_description'];
                  $tPackageName=$crow['package_name'];
                  $tYrofAMC=$crow['no_year'];
                  $tQTY=$crow['qty'];
                  $tPrice=$crow['basic_price'];
                  $tGST=$crow['gst'];
                  $tTotAmt=$crow['tot_amt'];
              }
                   
            ?>
          

            <input type="hidden" class="form-control" id="txtID" name="txtID" value="<?php echo $tID; ?>" style="text-align: center;" readonly>
        </div>
 
 
</div>

    <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        

    <div class="form-group">
      <label for="txtItemType" class="col-sm-2 control-label">Item Type</label>
        <div class="col-sm-4">
         <select class="form-control" name="txtItemType" id="txtItemType">
          <option value="<?php echo $tItemType; ?>"><?php echo $tItemType; ?></option>
            <option value="-">--Select--</option> 
            <option value="New">New</option>
            <option value="Old">Old</option>
          </select> 
        </div>
      
      <label for="txtPurchaseYear" class="col-sm-2 control-label">Purchase Year</label>

        <div class="col-sm-2">
          <input type="text" class="form-control pull-right" id="txtPurchaseYear" name="txtPurchaseYear" value="<?php echo $tPurchaseYear; ?>"> 
        </div>  

  </div>

  <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        

    <div class="form-group">
      <label for="txtItemCategory" class="col-sm-2 control-label">Item Category</label>
        <div class="col-sm-4">
         <select class="form-control" name="txtItemCategory" id="txtItemCategory">
          <option value="<?php echo $tItemCategory; ?>"><?php echo $tItemCategory; ?></option>
            <option value="-">--Select--</option> 
            <option value="Laptop">Laptop</option>
            <option value="Desktop">Desktop</option>
          </select> 
        </div>
      <label for="txtBrandName" class="col-sm-2 control-label">Brand Name</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtBrandName" name="txtBrandName" value="<?php echo $tBrandName; ?>">
        </div>          
  </div>  
<!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        
       

    <div class="form-group">
      <label for="txtItemDescription" class="col-sm-2 control-label">Item Description</label>
        <div class="col-sm-4">
          <textarea class="form-control pull-right" id="txtItemDescription" name="txtItemDescription" rows="3"><?php echo $tItemDescription; ?></textarea>
        </div>        
    </div>  
<!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        
       

    <div class="form-group">
      <label for="txtPackageName" class="col-sm-2 control-label">Package Name</label>
        <div class="col-sm-4">
          <select class="form-control" name="txtPackageName" id="txtPackageName">
            <option value="<?php echo $tPackageName; ?>"><?php echo $tPackageName; ?></option>
            <option value="-">--Select--</option> 
          <?php
              $sql = "SELECT distinct package_name FROM tbl_amc order by id";
              $query = $conn->query($sql);
              while($crow = $query->fetch_assoc()){
          ?>  
            <option value="<?php echo $crow['package_name'];?>"><?php echo $crow['package_name'];?></option>
           <?php }?>
          </select> 
        </div>  
      
      <label for="txtYrofAMC" class="col-sm-2 control-label">Year of AMC</label>
        <div class="col-sm-4">
         <select class="form-control" name="txtYrofAMC" id="txtYrofAMC">
          <option value="<?php echo $tYrofAMC; ?>"><?php echo $tYrofAMC; ?></option>
            <option value="0">--Select--</option> 
            <option value="1">1 Yr</option>
            <option value="2">2 Yr</option>
            <option value="3">3 Yr</option>
            <option value="5">5 Yr</option>
          </select> 
        </div>        
    </div>
  
<!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        
       

    <div class="form-group">
      <label for="txtQTY" class="col-sm-2 control-label">QTY</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtQTY" name="txtQTY" value="<?php echo $tQTY; ?>">
        </div>  
      
      <label for="txtPrice" class="col-sm-2 control-label">Price</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtPrice" name="txtPrice" value="<?php echo $tPrice; ?>">
        </div>        
    </div>  

<!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        
       

    <div class="form-group">
      <label for="txtGST" class="col-sm-2 control-label">GST Amt</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtGST" name="txtGST" value="<?php echo $tGST; ?>">
        </div>  
      
      <label for="txtTotAmt" class="col-sm-2 control-label">Total Amt</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtTotAmt" name="txtTotAmt" value="<?php echo $tTotAmt; ?>">
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
