<!DOCTYPE html>
	
<html lang = "en">
	<head>
		<meta charset = "UTF-8" name = "viewport" content = "width=device-width, initial-scale=1"/>
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css"/>
	</head>
<body>

	<div class = "row">
		<div class = "col-md-3"></div>
		<div class = "col-md-6 well">
			 
			<hr style = "border-top:1px dotted #000;"/>
			<button class = "btn  btn-primary" id = "btn_post"><span class = "glyphicon glyphicon-plus"></span> Add Post</button>
			<button style = "display:none;" class = "btn  btn-danger" id = "btn_close"><span class = "glyphicon glyphicon-remove"></span> Close</button>
			<br /><br />
			<div  style = "display:none;" id = "post_form" class = "col-md-12">
				<form>	



<table>
  <tr>
    <td>
                <div class="form-group">
                  <label>Model No.</label>
                    <select class="form-control" name="txtModelno" id="txtModelno" required>
                      <option value="-" selected>- Select -</option>
                        <?php
                      
                          $conn = new mysqli('localhost', 'root', 'kis1601', 'insight_dealer_db');

                          if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                          }

                          $sql = "SELECT distinct modalno FROM tbl_item";
                          $query = $conn->query($sql);
                          while($crow = $query->fetch_assoc()){
                            echo "<option value='".$crow['modalno']."'>".$crow['modalno']."</option>";
                            }
                        ?>
                    </select> 
                </div>      
    </td>
    <td>
                <div class="form-group">
                  <label>Processor</label>
                  <input type="text" name="txtProcessor" id="txtProcessor" class="form-control" placeholder="Enter ...">
                </div>      
    </td>
    <td>
                <div class="form-group">
                  <label>RAM</label>
                  <input type="text" name="txtRam" id="txtRam" class="form-control" placeholder="Enter ...">
                </div>      
    </td>
    <td>
                <div class="form-group">
                  <label>HDD/SSD</label>
                  <input type="text" name="txtHddSsd" id="txtHddSsd" class="form-control" placeholder="Enter ...">
                </div>      
    </td>
    <td>
                <div class="form-group">
                  <label>OS</label>
                  <input type="text" name="txtOS" id="txtOS" class="form-control" placeholder="Enter ...">
                </div>      
    </td>
    <td>
                <div class="form-group">
                  <label>Graphics</label>
                  <input type="text" name="txtGraphics" id="txtGraphics" class="form-control" placeholder="Enter ...">
                </div>      
    </td>
    <td>
                <div class="form-group">
                  <label>Display</label>
                  <input type="text" name="txtDisplay" id="txtDisplay" class="form-control" placeholder="Enter ...">
                </div>      
    </td>
    <td>
                <div class="form-group">
                  <label>Qty</label>
                  <input type="text" name="txtQTY" id="txtQTY" class="form-control" placeholder="Enter ...">
                </div>      
    </td>
    <td>
                <div class="form-group">
                  <label>Price</label>
                  <input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Enter ...">
                </div>      
    </td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td colspan="9"><button type="button" id="add1" class="btn btn-primary btn-flat" name="add1">
            <i class="fa fa-save"></i> Add</button></td>
  </tr>
</table>




					<button type = "button" id = "add_post">Post</button>
				</form>	
				<br /><br />
			</div>
			<div id = "result"></div>	
		</div>
	</div>
</body>
<script src = "js/jquery-3.1.1.js"></script>	
<script type = "text/javascript">
	$(document).ready(function(){
	displayResult();
	/*	ADDING POST	*/	
		$('#btn_post').on('click', function(){
			$('#post_form').slideDown();
			$('#btn_close').show();
			$(this).hide();
			$('#post').val('');
		});
		
		$('#btn_close').on('click', function(){
			$('#post_form').slideUp();
			$('#btn_post').show();
			$(this).hide();
		});
		
		$('#add_post').on('click', function(){
			if($('#post').val() == "" || $('#name').val() == ""){
				alert('Please enter something first');
			}else{
				$('#post_form').slideUp();
				$('#btn_post').show();
				$('#btn_close').hide();
				$post = $('#post').val();
				$name = $('#name').val();
				$.ajax({
					type: "POST",
					url: "add_post.php",
					data: {txtModelno:txtModelno1,txtProcessor:txtProcessor1,txtRam:txtRam1,txtHddSsd:txtHddSsd1,txtOS:txtOS1,txtGraphics:txtGraphics1,txtDisplay:txtDisplay1,txtQTY:txtQTY1,txtPrice:txtPrice1},
					success: function(){
						$('#name').val('');
						displayResult();
					}
				});
			}	
		});
	/*****	*****/
	});
	
	function displayResult(){
		$.ajax({
			url: 'add_post.php',
			type: 'POST',
			async: false,
			data:{
				res: 1
			},
			success: function(response){
				$('#result').html(response);
			}
		});
	}
	
</script>
</html>