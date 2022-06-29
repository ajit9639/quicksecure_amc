<?php

include 'includes/session.php';

	if($_POST['action'] == 'add1'){
		
 		
		$tBrandName= $_POST['txtBrandName']; 
  
		$sql = "insert into tbl_brand (brandname) values('$tBrandName')";

		if($conn->query($sql)){
			//$_SESSION['success'] = 'Record inserted successfully';
 			//echo "Record inserted successfully";
 		?>
 		<script type="text/javascript">
 			alert("Record inserted successfully........");
 		</script>
 		<?php	
  
 		echo "<script>window.location.href='brand-detail.php'</script>"; 
		}
		else{
			$_SESSION['error'] = $conn->error;
			echo $conn->error;
		}
		
	}

?>
