<?php
	//connect to db
include 'includes/session.php';

	//if insert key is pressed then do insertion
	if($_POST['action'] == 'add1'){

 
		
		$tID= $_POST['txtID']; 
		$tPackageName= $_POST['txtPackageName']; 
 		  		
		$sql = "update tbl_package set package_name='$tPackageName' where id='$tID'";

		if($conn->query($sql)){
			//$_SESSION['success'] = 'Record updated successfully';
 			//echo "Record updated successfully";
 		?>
 		<script type="text/javascript">
 			alert("Record updated successfully.......");
 		</script>
 		<?php	
 		echo "<script>window.location.href='package-detail.php'</script>"; 
		}
		else{
			$_SESSION['error'] = $conn->error;
			echo $conn->error;
		}
		
	}
	


?>
