<?php

include 'includes/session.php';

	if($_POST['action'] == 'add1'){
		
 		
		$tPackageName= $_POST['txtPackageName']; 
  
		$sql = "insert into tbl_package (package_name) values('$tPackageName')";

		if($conn->query($sql)){
			
			echo json_encode($tPackageName);
			$response[] = array("value1"=>$tPackageName);
 
 		?>
 		<script type="text/javascript">
 			alert("Record inserted successfully........");
 		</script>
 		<?php	
  
 		echo "<script>window.location.href='new-package-entry.php'</script>"; 
		}
		else{
			$_SESSION['error'] = $conn->error;
			echo $conn->error;
		}
		
	}

?>
