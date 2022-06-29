<?php
	require_once 'connection.php';
	if(ISSET($_POST['name'])){		
		//$post = addslashes($_POST['post']);
		//$name = $_POST['name'];
		$conn->query("INSERT INTO tbl_demo (modalno,processor1,ram1,hddssd,os1,graphics1,display1,price) VALUES('".$_POST['txtModelno']."', '".$_POST['txtProcessor']."', '".$_POST['txtRam']."', '".$_POST['txtHddSsd']."', '".$_POST['txtOS']."', '".$_POST['txtGraphics']."', '".$_POST['txtDisplay']."', '".$_POST['txtPrice']."')") or die(mysqli_error());
	}
?>		
<?php
	if(ISSET($_POST['res'])){
		$q_post = $conn->query("SELECT * FROM tbl_demo ORDER BY id ASC") or die(mysqli_error());
		while($f_post  = $q_post->fetch_array()){
?>	
		<div class = "col-md-12 content" style = "word-wrap:break-word; background-color:#fff; padding:20px;">
<?php echo '<h4 class = "text-danger">'.$f_post['modalno'].'</h4>';?>
<hr style = "border-top:1px solid #000;"/>
<?php echo $f_post['post']?>
		</div>
		<br style = "clear:both;"/>
		<br />
<?php
		}
	}	
?>

