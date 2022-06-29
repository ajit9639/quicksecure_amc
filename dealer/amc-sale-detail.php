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
            <td colspan="6" align="center">
                <h3>Quick Secure India Pvt Ltd.</h3>
                
Holding No-2, Ramdas Bhatta, Main Road 
Adjecent to Brajdham Mandir, near Dhobhi Ghat<br>
Bistupur, Jamshedpur-831001, Jharkhand.<br>
<strong>Phone:</strong> [000-000-0000], 
<strong>Website:</strong> www.quicksecureindia.com
<hr>
                
            </td>
          </tr>
      <?php 

       $idd=$_GET['amcsid'];
       $pmmode="";$dlrid="";
       
       $sql = "SELECT * FROM tbl_amc_sale_dealer where id='$idd'";
        
        $query = $conn->query($sql);
          if($row = $query->fetch_assoc()){
                
                $pmmode = $row['payment_option'];
                $dlrname = $row['dealer_name'];
                $premarks = $row['payment_remarks'];
                $attchmt = $row['payment_attachment'];

            $dateTimeObj = date_create($row['sale_dt']); 
            $dt1=date_format($dateTimeObj, "d-m-Y");
 
       $dlid1 = $_SESSION['dlrid'];

         $sql1 = "SELECT * FROM tbl_dealer where dealerid='$dlid1' order by id desc";
        $query1 = $conn->query($sql1);
          if($row1 = $query1->fetch_assoc()){$dlrnm=$row1['dealer_name'];}
              $del_nm = $_SESSION["deal_name"];
            echo "
            <tr>
              <td><strong>Dealer Name </strong></td><td><strong>:</strong></td>
              <td valign='center'><font >".$del_nm."</font></td>

             <td><strong>Dealer Id </strong></td><td><strong>:</strong></td>
              <td valign='center'><font >".$dlid1."</font></td>
            </tr>            
            <tr>
              <td><strong>ID </strong></td><td><strong>:</strong></td><td valign='center'>".$row['id']."</td>
  
              <td><strong>AMC ID </strong></td><td><strong>:</strong></td><td valign='center'>QSAMC".$row['id']."</td>
            </tr>
            <tr>  
              <td><strong>Date </strong></td><td><strong>:</strong></td><td valign='center'>".$dt1."</td>
       
              <td><strong>Item Type </strong></td><td><strong>:</strong></td><td>".$row['item_type']."</td>
            </tr>
            <tr>  
              <td><strong>Purchase Year </strong></td><td><strong>:</strong></td><td>".$row['purchase_year']."</td>
  
              <td><strong>Item Category </strong></td><td><strong>:</strong></td><td>".$row['item_category']."</td>
            </tr>
            <tr>  
              <td><strong>Brand Name </strong></td><td><strong>:</strong></td><td>".$row['brand_name']."</td>
          
              <td><strong>Description </strong></td><td><strong>:</strong></td><td>".$row['item_description']."</td>
            </tr>
            <tr>  

              <td><strong>Package Name </strong></td><td><strong>:</strong></td><td>".$row['package_name']."</td>
       
              <td><strong>Year for AMC </strong></td><td><strong>:</strong></td><td>".$row['no_year']."</td>
            </tr>
            <tr>  
              <td><strong>QTY </strong></td><td><strong>:</strong></td><td>".$row['qty']."</td>
          
              <td><strong>Price </strong></td><td><strong>:</strong></td><td>".$row['basic_price']."</td>
            </tr>
            <tr>  
              <td><strong>GST % </strong></td><td><strong>:</strong></td><td>".$row['gst']."</td>
         
              <td><strong>Total Amt </strong></td><td><strong>:</strong></td><td>".$row['tot_amt']."</td>
            </tr>
            <tr>
              <td colspan='6'>&nbsp;</td>
            </tr>
            <tr>
              <td colspan='6'><h3>Customer Detail</h3></td>
            </tr>
            <tr>  
              <td><strong>Customer Name </strong></td><td><strong>:</strong></td><td>".$row['customer_name']."</td>
         
              <td><strong>Contact No. </strong></td><td><strong>:</strong></td><td>".$row['mob_no']."</td>
            </tr>
            <tr>  
              <td><strong>E-Mail </strong></td><td><strong>:</strong></td><td>".$row['email']."</td>
         
              <td><strong>Address </strong></td><td><strong>:</strong></td><td>".$row['address']."</td>
            </tr>
            <tr>  
              <td><strong>City </strong></td><td><strong>:</strong></td><td>".$row['city1']."</td>
         
              <td><strong>State </strong></td><td><strong>:</strong></td><td>".$row['state1']."</td>
            </tr>
            <tr>  
              <td><strong>Pin Code </strong></td><td><strong>:</strong></td><td>".$row['pin_code']."</td>
         
              <td><strong>Bill Copy </strong></td><td><strong>:</strong></td><td><img src='upload/".$attchmt."' style='width:250px;height:auto;'></td>
            </tr>                                    
            ";

         }
                  ?>

                </tbody>
              </table>
</div>
<hr>
             
             
<form action="print-amc-sale.php?amcsid=<?php echo $_GET['amcsid'];?>" method="post"  enctype="multipart/form-data">
    <div class="form-group">
      <label for="txtItemType" class="col-sm-2 control-label">Payment Mode</label>
        <div class="col-sm-2">
         <select class="form-control" name="txtPaymentMode" id="txtPaymentMode" onchange="getText(this)" required>
             <option value="<?php echo $pmmode;?>"><?php echo $pmmode;?></option>
            <option value="-">--Select--</option> 
            <option value="Cash">Cash</option>
            <option value="OnLine">OnLine</option>
          </select> 
        </div>
      <label for="txtRemarks" class="col-sm-1 control-label">Remarks</label>
        <div class="col-sm-2">
          <input type="text" name="txtRemarks" id="txtRemarks" value="<?php echo $premarks;?>">
        </div>  
 
 <label for="txtmyfile" class="col-sm-1 control-label"></label>

        <div class="col-sm-2">
          <input type="file" id="myfile" name="myfile">
        </div>
<label for="txtsubmit" class="col-sm-1 control-label"></label>
        <div class="col-sm-1">
          <input type="submit" name="submit" class="btn btn-block btn-primary btn-sm" value="&nbsp;Print&nbsp;">
        </div>              
  </div>
  
  </form>

  <!--<button id="myBtn">Open Modal</button>-->

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" id="close" >&times;</span>
    <img src="images/qrcode.jpg" class="img-fluid qr-code">
  </div>

</div>


            <!-- <a href="print-amc-sale.php?amcsid=<?php //echo $_GET['amcsid'];?>"><i class="fa fa-print"></i>&nbsp;Print</a>-->
             
      

        </div>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
<?php 

// include 'includes/del_amc_model.php'; 

?>
</div>
<?php include 'includes/scripts.php'; ?>
<style type="text/css">
    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 999; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 30%;

    }

    .modal-content .qr-code{
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
    if(textHolder=="OnLine"){modal.style.display = "block";}
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
    function printPageArea(areaID){
        var printContent = document.getElementById(areaID);
        var WinPrint = window.open('', '', 'width=900,height=650');
            WinPrint.document.write(printContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
    }

$(function(){
  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'amc-row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.catid').val(response.id);
      $('#del_cat').val(response.id);

    }
  });
}

 
</script>
 
 
</body>
</html>
