<?php
	//connect to db
include 'includes/session.php';

	//if insert key is pressed then do insertion
	if($_POST['action'] == 'add1'){

 
		
		$tID= $_POST['txtID']; 

		$tDesignation= $_POST['txtDesignation']; 
		$tAssignTo= $_POST['txtAssignTo']; 
 
		 
		  
		
		$sql = "update tbl_assigned set designation='$tDesignation', assignation='$tAssignTo' where id='$tID'";

		if($conn->query($sql)){
			//$_SESSION['success'] = 'Record updated successfully';
 			//echo "Record updated successfully";
 		?>
 		<script type="text/javascript">
 			alert("Record updated successfully.......");
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
