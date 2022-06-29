<?php
 
	$conn = new mysqli('localhost', 'root', 'kis1601', 'insight_dealer_db');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
 
 
 		
 
		for ($i = 0; $i < count($_POST['modelno']); $i++) {
 

       $sql = "INSERT INTO tbl_demo (modalno,processor1,ram1,hddssd,os1,graphics1,display1,price) VALUES ('".$_POST['modelno'][$i]."', '".$_POST['processor'][$i]."', '".$_POST['ram'][$i]."', '".$_POST['hddssd'][$i]."', '".$_POST['os'][$i]."', '".$_POST['graphics'][$i]."', '".$_POST['display'][$i]."', '".$_POST['price'][$i]."')";

            if (mysqli_query($conn, $sql)) {
               echo "<script>alert('Record saved successfully')</script>";
               echo "<script>window.location.href='create_invoice.php'</script>"; 
            }else{echo $conn->error;}		   	
 
 }
?>