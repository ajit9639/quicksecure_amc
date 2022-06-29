<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['change']))
{
   $email=$_POST['email'];
    $contact=$_POST['contact'];
    $password=md5($_POST['password']);
	$query=mysqli_query($con,"SELECT * FROM users WHERE email='$email' and contactno='$contact'");
	$num=mysqli_fetch_array($query);
	if($num>0)
{
	$extra="forgot-password.php";
	mysqli_query($con,"update users set password='$password' WHERE email='$email' and contactno='$contact' ");
	$host=$_SERVER['HTTP_HOST'];
	$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("location:http://$host$uri/$extra");
	$_SESSION['errmsg']="Password Changed Successfully";
	exit();
}
else
{
	$extra="forgot-password.php";
	$host  = $_SERVER['HTTP_HOST'];
	$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("location:http://$host$uri/$extra");
	$_SESSION['errmsg']="Invalid email id or Contact no";
	exit();
}
}


?>


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
      <h1>Forgot Password</h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
    
        <li class="active">Forgot Password</li>
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
			var txtEMail1 = $('#txtEMail').val();
			var txtUID1 = $('#txtUID').val();
			var txtOldPWD1 = $('#txtOldPWD').val();
			var txtNewPwd1 = $('#txtNewPwd').val();
 
	  
				$.post('update-forgot-password.php',{action: "add1", txtID:txtID1, txtEMail:txtEMail1, txtUID:txtUID1, txtOldPWD:txtOldPWD1, txtNewPwd:txtNewPwd1},function(res){
					$('#result').html(res);
				});		

					//$('#txtEMail').val('');
					//$('#txtUID').val('');
					//$('#txtOldPWD').val('');
					//$('#txtNewPwd').val('');
	 
				});

 
				
 
			});
</script>						
<div class="form-horizontal">
  <div class="box-body">
 
<!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->   


    <div class="form-group">      
	    <label for="txtEMail" class="col-sm-3 control-label">E-Mail</label>
	      <div class="col-sm-3">   
	        <input type="text" class="form-control pull-right" id="txtEMail" name="txtEMail">
	      </div>
	    <label for="txtUID" class="col-sm-3 control-label">User ID</label>
	      <div class="col-sm-3">   
	        <input type="text" class="form-control pull-right" id="txtUID" name="txtUID">
	      </div>	      
 	</div>

    <div class="form-group">      
	    <label for="txtOldPWD" class="col-sm-3 control-label">Old Password</label>
	      <div class="col-sm-3">   
	        <input type="text" class="form-control pull-right" id="txtOldPWD" name="txtOldPWD">
	      </div>
	    <label for="txtNewPwd" class="col-sm-3 control-label">New Password</label>
	      <div class="col-sm-3">   
	        <input type="text" class="form-control pull-right" id="txtNewPwd" name="txtNewPwd">
	      </div>	      
 	</div>

   	<div class="form-group">
      	<div class="col-sm-12">
            <div class="form-group">
                <div class="col-sm-12">
                   <button id="add1" class="btn btn-primary btn-flat pull-left" name="add1"><i class="fa fa-save"></i> Update Credentials</button>
                </div>
            </div>                  
      	</div>
  	</div>   


<!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->   



   </div>  
<!-- ************* ************* ****************** --> 
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
