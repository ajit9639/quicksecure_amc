<?php 
session_start();
include('inc/header.php');
//include 'Invoice.php';
//include 'ins_data.php';
//$invoice = new Invoice();
//$invoice->checkLoggedIn();
///if(!empty($_POST['companyName']) && $_POST['companyName']) {	
//	$invoice->saveInvoice($_POST);
//	header("Location:invoice_list.php");	
//}
?>
<title>Place Order</title>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">
<?php include('inc/container.php');?>
<div class="container content-invoice">
	<form action="ins_data.php" id="invoice-form" method="post" class="invoice-form" role="form" novalidate=""> 
		<div class="load-animate animated fadeInUp">
			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<h2 class="title">Place New Order</h2>
					<?php //include('menu.php');?>	
				</div>		    		
			</div>
			<input id="currency" type="hidden" value="$">
			<!--<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<h3>From,</h3>
					<?php //echo $_SESSION['user']; ?><br>	
					<?php //echo $_SESSION['address']; ?><br>	
					<?php //echo $_SESSION['mobile']; ?><br>
					<?php //echo $_SESSION['email']; ?><br>	
				</div>      		
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
					<h3>To,</h3>
					<div class="form-group">
						<input type="text" class="form-control" name="companyName" id="companyName" placeholder="Company Name" autocomplete="off">
					</div>
					<div class="form-group">
						<textarea class="form-control" rows="3" name="address" id="address" placeholder="Your Address"></textarea>
					</div>
					
				</div>

			</div>-->
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<table class="table table-bordered table-hover" id="invoiceItem">	
						<tr>
							<th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
							<th>Model No.</th>
							<th>Processor</th>
							<th>RAM</th>
							<th>HDD/SSD</th>
							<th>OS</th>
							<th>Graphics</th>
							<th>Display</th>
							<th width="5%">Quantity</th>
							<th width="8%">Price</th>								
							<th>Total</th>
						</tr>							
						<tr>
							<td><input class="itemRow" type="checkbox"></td>
							<td>
								<!--<input type="text" name="modelno[]" id="modelno_1" class="form-control" autocomplete="off">-->

            <select class="form-control" name="modelno[]" id="modelno_1" onChange="getCatID();" required>
              <option value="-" selected>- Select -</option>
                <?php
     
 
	$conn = new mysqli('localhost', 'root', 'kis1601', 'insight_dealer_db');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
                  $sql = "SELECT distinct modalno FROM tbl_item";
                  $query = $conn->query($sql);
                  while($crow = $query->fetch_assoc()){
                    echo "
                      <option value='".$crow['modalno']."'>".$crow['modalno']."</option>
                            ";
                    }
                ?>
            </select> 
							</td>
							<td><input type="text" name="processor[]" id="processor_1" class="form-control" autocomplete="off"></td>			
							<td><input type="text" name="ram[]" id="ram_1" class="form-control" autocomplete="off"></td>
							<td><input type="text" name="hddssd[]" id="hddssd_1" class="form-control" autocomplete="off"></td>
							<td><input type="text" name="os[]" id="os_1" class="form-control" autocomplete="off"></td>
							<td><input type="text" name="graphics[]" id="graphics_1" class="form-control" autocomplete="off"></td>
							<td><input type="text" name="display[]" id="display_1" class="form-control" autocomplete="off"></td>

							<td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
							<td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off"></td>
							<td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
						</tr>						
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					<button class="btn btn-danger delete" id="removeRows" type="button">- Delete</button>
					<button class="btn btn-success" id="addRows" type="button">+ Add More</button>
				</div>
			</div>
			<div class="row">	
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
					<h3>Notes: </h3>
					<div class="form-group">
						<textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Your Notes"></textarea>
					</div>
					<br>
					<div class="form-group">
						<input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
						<input data-loading-text="Saving Invoice..." type="submit" name="invoice_btn" value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">						
					</div>
					
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<span class="form-inline">
						<div class="form-group">
							<label>Subtotal: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">$</div>
								<input value="" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
							</div>
						</div>

					<!--
						<div class="form-group">
							<label>Tax Rate: &nbsp;</label>
							<div class="input-group">
								<input value="" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
								<div class="input-group-addon">%</div>
							</div>
						</div>
						<div class="form-group">
							<label>Tax Amount: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">$</div>
								<input value="" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
							</div>
						</div>							
						<div class="form-group">
							<label>Total: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">$</div>
								<input value="" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
							</div>
						</div>
						<div class="form-group">
							<label>Amount Paid: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">$</div>
								<input value="" type="number" class="form-control" name="amountPaid" id="amountPaid" placeholder="Amount Paid">
							</div>
						</div>
						<div class="form-group">
							<label>Amount Due: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">$</div>
								<input value="" type="number" class="form-control" name="amountDue" id="amountDue" placeholder="Amount Due">
							</div>
						</div>
					-->


					</span>
				</div>
			</div>
			<div class="clearfix"></div>		      	
		</div>
	</form>			
</div>
</div>	
<?php include('inc/footer.php');?>