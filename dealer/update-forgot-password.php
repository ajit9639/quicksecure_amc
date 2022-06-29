<?php
	//connect to db
include 'includes/session.php';

	//if insert key is pressed then do insertion
	if($_POST['action'] == 'add1'){
		
		//$tID= $_POST['txtID']; 
		$tEMail= $_POST['txtEMail']; 
		$tUID= $_POST['txtUID']; 
		$tOldPWD= $_POST['txtOldPWD']; 
		$tNewPwd= $_POST['txtNewPwd']; 
		 
		$sql = "update tbl_dealer set pwd='$tNewPwd' where uid='$tUID' and pwd='$tOldPWD' and email='$tEMail'";

		if($conn->query($sql)){
 		?>
 		<script type="text/javascript">
 			alert("Record updated successfully....... Refresh page to see updated data.");
 		</script>
 		<?php	
		}
		else{
 			echo $conn->error;
		}
		
	}
	 
	 
?>
