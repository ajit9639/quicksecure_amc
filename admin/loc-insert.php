<?php

include 'includes/session.php';

	if($_POST['action'] == 'add1'){
		
 		
		$tLoc= $_POST['txtLoc']; 
		 
 
		$sql = "insert into tbl_loc (loc) values('$tLoc')";

		if($conn->query($sql)){
			//$_SESSION['success'] = 'Record inserted successfully';
 			//echo "Record inserted successfully";
 		?>
 		<script type="text/javascript">
 			alert("Record inserted successfully........");
 		</script>
 		<?php	
  
 		echo "<script>window.location.href='loc-detail.php'</script>"; 
		}
		else{
			$_SESSION['error'] = $conn->error;
			echo $conn->error;
		}
		
	}

?>
