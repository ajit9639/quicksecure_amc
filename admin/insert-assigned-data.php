<?php

include 'includes/session.php';

	if($_POST['action'] == 'add1'){
		
 		
		$tDesignation= $_POST['txtDesignation']; 
		$tAssignTo= $_POST['txtAssignTo'];
		 
 
		$sql = "insert into tbl_assigned (designation,assignation) values('$tDesignation','$tAssignTo')";

		if($conn->query($sql)){
			//$_SESSION['success'] = 'Record inserted successfully';
 			//echo "Record inserted successfully";
 		?>
 		<script type="text/javascript">
 			alert("Record inserted successfully........");
 		</script>
 		<?php	
  
 		echo "<script>window.location.href='assigned-detail.php'</script>"; 
		}
		else{
			$_SESSION['error'] = $conn->error;
			echo $conn->error;
		}
		
	}

?>
