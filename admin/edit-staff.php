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
      <h1>Edit Staff</h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
    
        <li class="active">Edit Staff</li>
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
      var txtDealerName1 = $('#txtDealerName').val();
      var txtStoreName1 = $('#txtStoreName').val();
      var txtAddress1 = $('#txtAddress').val();
      var txtCity1 = $('#txtCity').val();
      var txtState1 = $('#txtState').val();

      var txtPinNo1 = $('#txtPinNo').val();
      var txtGST1 = $('#txtGST').val();
      var txtPhNo1 = $('#txtPhNo').val();
      var txtEMail1 = $('#txtEMail').val();
  var txtStatus1= $('#txtStatus').val();

      //syntax - $.post('filename', {data}, function(response){});
        $.post('update-staff-data.php',{action: "add1", txtID:txtID1,txtDealerName:txtDealerName1,txtStoreName:txtStoreName1,txtAddress:txtAddress1,txtCity:txtCity1,txtState:txtState1,txtPinNo:txtPinNo1,txtGST:txtGST1,txtPhNo:txtPhNo1,txtEMail:txtEMail1,txtStatus:txtStatus1},function(res){
          $('#result').html(res);
        });   

          $('#txtDealerName').val('');
          $('#txtStoreName').val('');
          $('#txtAddress').val('');
          $('#txtCity').val('');
          $('#txtState').val('');

          $('#txtPinNo').val('');
          $('#txtGST').val('');
          $('#txtPhNo').val('');
          $('#txtEMail').val('');
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
			
 

<div class="form-horizontal">
  <div class="box-body">


		<div class="form-group">
      <!--<label for="txtBillNo" class="col-sm-2 control-label">ID</label>-->

        <div class="col-sm-4">
            <?php
            $id=$_GET['id'];
             $sql = "SELECT * FROM tbl_staff_master where id='$id'";
              $query = $conn->query($sql);
              if($crow = $query->fetch_assoc()){
                	$tID = $crow['id'];

                	$staffname = $crow['staff_name'];
									$designation = $crow['designation'];
									$address1 = $crow['address'];
									$city = $crow['city'];
									$state = $crow['state1'];

                  $pincode = $crow['pincode'];
                  $area = $crow['area'];
                  $phno = $crow['phno'];
                  $email = $crow['email'];
                  $manager = $crow['manager'];
								
						 
              }
                   
            ?>
          
<form method="post" action="update-staff-data.php">
            <input type="hidden" class="form-control" id="txtID" name="txtID" value="<?php echo $tID; ?>" style="text-align: center;" readonly>
        </div>
 
 
</div>

  <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        

  <div class="form-group">
      <label for="txtStaffName" class="col-sm-2 control-label">Staff Name</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtStaffName" name="txtStaffName" value="<?php echo $staffname;?>">
        </div>
      
      <label for="txtAddress" class="col-sm-2 control-label">Address</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtAddress" name="txtAddress" value="<?php echo $address1;?>">
        </div>

  </div>

  <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        

  <div class="form-group">

      
      <label for="txtCity" class="col-sm-2 control-label">City</label>

        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtCity" name="txtCity" value="<?php echo $city;?>">
        </div>  
      <label for="txtState" class="col-sm-2 control-label">State</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtState" name="txtState" value="<?php echo $state;?>">
        </div>
  </div>  
<!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        
       

  <div class="form-group">    
      <label for="txtPinNo" class="col-sm-2 control-label">Pin Code</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtPinNo" name="txtPinNo" value="<?php echo $pincode;?>">
        </div>  
      <label for="txtArea" class="col-sm-2 control-label">Area</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtArea" name="txtArea" value="<?php echo $area;?>">
        </div>
  </div>  

  <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        
       

  <div class="form-group">
 
      
      <label for="txtPhNo" class="col-sm-2 control-label">Ph. No.</label>

        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtPhNo" name="txtPhNo" value="<?php echo $phno;?>">
        </div>  
      <label for="txtEMail" class="col-sm-2 control-label">E-Mail</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtEMail" name="txtEMail" value="<?php echo $email;?>">
        </div>
  </div> 
  <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        
       

  <div class="form-group">

      <label for="txtDesignation" class="col-sm-2 control-label">Designation</label>
        <div class="col-sm-4">
          <select id="txtDesignation" name="txtDesignation" class="form-control">
            <option value="<?php echo $designation;?>"><?php echo $designation;?></option>
            <option value="0">-- Select Designation --</option>
            <?php
             $sql = "SELECT * FROM tbl_designation";
              $query = $conn->query($sql);
              while($row1 = $query->fetch_assoc()){
               ?>
              <option value="<?php echo $row1['designation'];?>"><?php echo $row1['designation'];?></option>
            <?php    
              }
            ?>
          </select>          
        </div>
      
      <label for="txtManager" class="col-sm-2 control-label">Manager</label>
        <div class="col-sm-4">
          <select id="txtManager" name="txtManager" class="form-control">
            <option value="<?php echo $manager;?>"><?php echo $manager;?></option>
            <option value="0">-- Select Manager --</option>
            <?php
             $sql = "SELECT * FROM tbl_manager";
              $query = $conn->query($sql);
              while($row1 = $query->fetch_assoc()){
               ?>
              <option value="<?php echo $row1['staff_name'];?>"><?php echo $row1['staff_name'];?></option>
            <?php    
              }
            ?>
          </select>           
        </div>       
 

  </div> 
  
  <div class="form-group">

      <label for="txtEMail" class="col-sm-2 control-label">Approve</label>
        <div class="col-sm-4">
          <select class="form-control pull-right" id="txtStatus" name="txtStatus">
            <option value="0">--Select--</option>
            <option value="Y">Yes</option>
            <option value="N">No</option>
          </select>
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
                   <!--<button type="submit" id="add1" name="add1" class="btn btn-primary btn-flat pull-left"><i class="fa fa-save"></i> Update</button>-->
                   <input type="submit" name="add1" value="Update" class="btn btn-primary btn-flat pull-left">
                </div>
            </div>                  
      	</div>
  	</div>
</form>
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
