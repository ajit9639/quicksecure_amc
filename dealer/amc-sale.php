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
      <h1>AMC Sale</h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
    
        <li class="active">AMC Sale</li>
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
      
      //var txtID1 = $('#txtID').val();
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
      var txtGSTAmt1 = $('#txtGSTAmt').val();
      var txtTotAmt1 = $('#txtTotAmt').val();

      var txtCustomerName1 = $('#txtCustomerName').val();
      var txtMobileNo1 = $('#txtMobileNo').val();
      var txtEMail1 = $('#txtEMail').val();
      var txtAddress1 = $('#txtAddress').val();
      var txtPinCode1 = $('#txtPinCode').val();
      var txtCity1 = $('#txtCity').val();
      var txtState1 = $('#txtState').val();
      var txtDealerName1 = $('#txtDealerName').val();
      var txtRemarks1 = $('#txtRemarks').val();
      var txtDate1 = $('#txtDate').val();




      //syntax - $.post('filename', {data}, function(response){});
        $.post('insert-amc-data.php',{action: "add1", txtDate:txtDate1,txtCustomerName:txtCustomerName1,txtMobileNo:txtMobileNo1,txtEMail:txtEMail1,txtAddress:txtAddress1,txtPinCode:txtPinCode1,txtCity:txtCity1,txtState:txtState1,txtDealerName:txtDealerName1,txtItemType:txtItemType1,txtPurchaseYear:txtPurchaseYear1,txtItemCategory:txtItemCategory1,txtBrandName:txtBrandName1,txtItemDescription:txtItemDescription1,txtPackageName:txtPackageName1,txtYrofAMC:txtYrofAMC1,txtQTY:txtQTY1,txtPrice:txtPrice1,txtGST:txtGST1,txtGSTAmt:txtGSTAmt1,txtTotAmt:txtTotAmt1,txtRemarks:txtRemarks1},function(res){
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
          $('#txtGSTAmt').val('');
          $('#txtTotAmt').val('');

          $('#txtCustomerName').val('');
          $('#txtMobileNo').val('');
          $('#txtEMail').val('');
          $('#txtAddress').val('');
          $('#txtPinCode').val('');
          $('#txtCity').val('');
          $('#txtState').val('');
          $('#txtRemarks').val('');
    
        });

 
 
      });
</script>     
       
            <!--form class="form-horizontal"-->

<div class="form-horizontal">
  <div class="box-body">

<!-- ==========================  ==============================  -->
<script type="text/javascript">
  function changeSID()
  {
    oForm  = eval(document.getElementById("frmForm"));
    pkgnme = document.getElementById("txtPackageName").value;
    url    = "amc-sale.php?frm_action=3&pkgnm=" +pkgnme;
    document.location = url;
  }

  function calcu()
  {
    var rate1 = document.getElementById("txtPrice").value;
    var qt = document.getElementById("txtQTY").value;
    var gt = document.getElementById("txtGST").value;
    document.getElementById("txtTotAmt").value = (rate1*qt)+gt;  
  }
</script>
            <?php
              if(isset($_GET['pkgnm'])){
              $pkgnm=$_GET['pkgnm'];
               $sql = "SELECT * FROM tbl_amc where package_name='$pkgnm'";
                $query = $conn->query($sql);
                if($crow = $query->fetch_assoc()){
                    $tID = $crow['id'];
                    $tItemDescription = $crow['description'];
                    $tPackageName=$crow['package_name'];
                    $tPrice=$crow['basic_price'];
                    $tGST=$crow['gst'];
                    $amc_year=$crow['duration'];
                    
                    $pricerange = $crow['price_from']." - ".$crow['proce_to'];
                     
                }else{
                    $tItemDescription = "";
                    $tPackageName="";
                    $tPrice="";
                    $tGST="";
                    $pricerange="";
                }

              }else{
                    $tItemDescription = "";
                    $tPackageName="";
                    $tPrice="";
                    $tGST="";
                    $pricerange = "";
                }
                   
            ?>
  <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        
<form role="form" method="POST" action="insert-amc-data.php" name="frmForm" id="frmForm">

<input type="hidden" name="txtDealerName" id="txtDealerName" value="<?php echo $_SESSION['dlrid'];?>">


  <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->      
    <div class="form-group">
      <label for="txtPackageName" class="col-sm-2 control-label">Package Name</label>
        <div class="col-sm-4">
          <select class="form-control" name="txtPackageName" id="txtPackageName" onchange="javascript:changeSID();">
            <option value="<?php echo $tPackageName;?>"><?php echo $tPackageName;?></option> 
            <option value="0">--Select--</option> 
          <?php
              $sql = "SELECT distinct package_name FROM tbl_amc order by id";
              $query = $conn->query($sql);
              while($crow = $query->fetch_assoc()){
          ?>  
            <option value="<?php echo $crow['package_name'];?>"><?php echo $crow['package_name'];?></option>
           <?php }?>
          </select> 
        </div> 
        
      <label for="txtPriceRange" class="col-sm-1 control-label">Price Range</label>

        <div class="col-sm-2">
          <input type="text" class="form-control pull-right" id="txtPriceRange" name="txtPriceRange" value="<?php echo $pricerange;?>" readonly> 
        </div>
        
      <label for="txtDate" class="col-sm-1 control-label">Date</label>

        <div class="col-sm-2">
          <input type="text" class="form-control pull-right" id="txtDate" name="txtDate" value="<?php echo date('d-m-Y');?>" autocomplete="off"> 
        </div>          
</div>

<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->

    <div class="form-group">

      <label for="txtItemType" class="col-sm-2 control-label">Item Type</label>
        <div class="col-sm-4">
         <select class="form-control" name="txtItemType" id="txtItemType">
            <option value="-" selected>--Select--</option> 
            <option value="New">New</option>
            <option value="Old">Old</option>
          </select> 
        </div>
      
      <label for="txtPurchaseYear" class="col-sm-2 control-label">Purchase Year</label>

        <div class="col-sm-2">
          <input type="text" class="form-control pull-right" id="txtPurchaseYear" name="txtPurchaseYear" autocomplete="off"> 
        </div>  

    </div>

  <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        

    <div class="form-group">
      <label for="txtItemCategory" class="col-sm-2 control-label">Item Category</label>
        <div class="col-sm-4">
         <select class="form-control" name="txtItemCategory" id="txtItemCategory">
            <option value="-" selected>--Select--</option> 
            <option value="Laptop">Laptop</option>
            <option value="Desktop">Desktop</option>
            <option value="Assembled Pc">Assembled Pc</option>
            <option value="Gaming PC">Gaming PC</option>
          </select> 
        </div>
      <label for="txtBrandName" class="col-sm-2 control-label">Brand Name</label>
        <div class="col-sm-4">
     
                    <select class="form-control" name="txtBrandName" id="txtBrandName">
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
    <div class="form-group">
      <label for="txtItemDescription" class="col-sm-2 control-label">Item Description</label>
        <div class="col-sm-4">
          <textarea class="form-control pull-right" id="txtItemDescription" name="txtItemDescription" rows="3"><?php echo $tItemDescription;?></textarea>
        </div>    


      <label for="txtYrofAMC" class="col-sm-2 control-label">Year of AMC</label>
        <div class="col-sm-4">
          <input type="text" value="<?php echo $amc_year;?>" readonly id="txtYrofAMC" class="form-control">
         <!-- <select class="form-control" name="txtYrofAMC" id="txtYrofAMC">
            <option value="-" selected>--Select--</option> 
            <option value="1">1 Yr</option>
            <option value="2">2 Yr</option>
            <option value="3">3 Yr</option>
            <option value="5">5 Yr</option>
          </select>  -->
        </div>             
    </div>  
 
  
<!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        
       
<script type="text/javascript">
   function calcu()
    {
        var price1 = document.getElementById("txtPrice").value;
        var gstper = document.getElementById("txtGST").value;

        var qt = document.getElementById("txtQTY").value;

        if (document.getElementById("txtQTY").value=="")
        {
          qt = 0;
        }

        if (document.getElementById("txtGST").value=="")
        {
          gstper = 0;
        }

        var amt = price1 * qt;
        var gstamt = (amt * gstper) /100;

        document.getElementById("txtGSTAmt").value = gstamt ;
        document.getElementById("txtTotAmt").value = (+amt) + (+gstamt);
    }
</script>    
    <div class="form-group">
      <label for="txtQTY" class="col-sm-2 control-label">QTY</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtQTY" name="txtQTY" onchange="calcu()">
        </div>  
      
      <label for="txtPrice" class="col-sm-2 control-label">Price</label>
        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtPrice" name="txtPrice" onchange="calcu()" value="<?php echo $tPrice;?>" readonly>
        </div>        
    </div>  

<!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        
       

    <div class="form-group">
      <label for="txtGST" class="col-sm-2 control-label">GST</label>
        <div class="col-sm-2">
          <input type="text" class="form-control pull-right" id="txtGST" name="txtGST" onchange="calcu()" value="<?php echo $tGST;?>" readonly>
        </div>  
      
      <label for="txtGSTAmt" class="col-sm-2 control-label">GST Amt</label>
        <div class="col-sm-2">
          <input type="text" class="form-control pull-right" id="txtGSTAmt" name="txtGSTAmt" readonly>
        </div>  

      <label for="txtTotAmt" class="col-sm-2 control-label">Total Amt</label>
        <div class="col-sm-2">
          <input type="text" class="form-control pull-right" id="txtTotAmt" name="txtTotAmt" readonly>
        </div>        
    </div>  



<!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->        
    <div class="form-group">
      <label for="txtRemarks" class="col-sm-2 control-label">Remarks</label>
        <div class="col-sm-4">
          <textarea class="form-control pull-right" id="txtRemarks" name="txtRemarks" rows="3"></textarea>
        </div>    
            
    </div>         
  <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ --> 
  


<div style="background-color:#F3E5F5; padding:20px; margin-bottom:20px;">
    <div class="form-group">
      <label for="txtCustomerName" class="col-sm-2 control-label">Customer Name</label>
        <div class="col-sm-4">
         <input type="text" class="form-control pull-right" id="txtCustomerName" name="txtCustomerName"> 
        </div>
      
      <label for="txtMobileNo" class="col-sm-2 control-label">Mobile No.</label>

        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtMobileNo" name="txtMobileNo"> 
        </div>  

    </div>
  <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->
    <div class="form-group">
      <label for="txtEMail" class="col-sm-2 control-label">E-Mail</label>
        <div class="col-sm-4">
         <input type="email" class="form-control pull-right" id="txtEMail" name="txtEMail"> 
        </div>
      
      <label for="txtAddress" class="col-sm-2 control-label">Address</label>

        <div class="col-sm-4">
          <input type="text" class="form-control pull-right" id="txtAddress" name="txtAddress"> 
        </div>  

    </div>

   <!-- #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ #@ -->
    <div class="form-group">
      <label for="txtPinCode" class="col-sm-2 control-label">Pin Code</label>
        <div class="col-sm-2">
         <input type="text" class="form-control pull-right" id="txtPinCode" name="txtPinCode"> 
        </div>
      
      <label for="txtCity" class="col-sm-2 control-label">City</label>

        <div class="col-sm-2">
          <input type="text" class="form-control pull-right" id="txtCity" name="txtCity"> 
        </div>  
      <label for="txtState" class="col-sm-2 control-label">State</label>

        <div class="col-sm-2">
          <input type="text" class="form-control pull-right" id="txtState" name="txtState"> 
        </div>  
    </div>   
</div>    




</div>
               
  <div class="box-footer">
    
    <div class="form-group">
        <div class="col-sm-12">
            <div class="form-group">
                <div class="col-sm-12">
                   <!--<a href="#" class="btn btn-info pull-right"><i class="fa fa-save"></i> Update & Review </a>--> 
                    <!--<button id="add1" class="btn btn-primary btn-flat pull-left" name="add1"><i class="fa fa-save"></i> Save</button>-->
                  <input type="submit" class="fa fa-save btn btn-primary btn-flat pull-left" name="submit" value="Proceed Next">
                </div>
            </div>                  
        </div>
    </div>

  </div>

<!-- /.box-footer -->
        
        </div>
        
            </form>
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
    $('#txtPurchaseYear').datepicker({
      autoclose: true
    })
    $('#txtDate').datepicker({
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
