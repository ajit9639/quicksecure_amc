<?php

include 'include/config.php';

	//if($_POST['action'] == 'add1'){
		
 		
		$tStaffName= $_POST['txtStaffName']; 
		$tAddress= $_POST['txtAddress']; 
		$tCity= $_POST['txtCity']; 
		$tState= $_POST['txtState']; 
		$tArea= $_POST['txtArea'];
		$tPinNo= $_POST['txtPinNo']; 
		$tDesignation= $_POST['txtDesignation']; 
		$tPhNo= $_POST['txtMobileNo']; 
		$tEMail= $_POST['txtEmail']; 
		$tDesignation= $_POST['txtDesignation'];

		$tUserID= $_POST['txtUserID'];
		$tPWD= $_POST['txtPWD'];
		$tLoc= $_POST['txtLoc'];
 

         $sql = "SELECT max(id) as mxid FROM tbl_staff_master order by id desc";
         $query = $conn->query($sql);
          if($row = $query->fetch_assoc()){
						$tempid=$row['mxid'];
          }		

					$dlrid = 'QSEM' . str_pad(($tempid + 1), 3, '0', STR_PAD_LEFT);

		



$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    //echo "File is an image - " . $check["mime"] . ".";
    move_uploaded_file($target_file, $target_dir);
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}



    $filename1 = $_FILES['fileToUpload']['name'];
    $temp = explode(".", $_FILES["fileToUpload"]["name"]);

    $flnm = pathinfo($filename1, PATHINFO_FILENAME);
    $filename =$flnm."_QSEM". round(microtime(true)) . '.' . end($temp);

    // destination of the file on the server
    $destination = 'upload/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['fileToUpload']['tmp_name'];
    $size = $_FILES['fileToUpload']['size'];

        if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
            echo "You file extension must be .jpg or .png";
            } elseif ($_FILES['fileToUpload']['size'] > 2000000) { // file shouldn't be larger than 2Megabyte
            echo "File too large!";
            } else {

            	if (move_uploaded_file($file, $destination)) {


				$sql = "insert into tbl_staff_master (staffid,staff_name,address,city,state1,pincode,area,phno,email,designation,loc,uid,pwd,status,emp_img) values('$dlrid','$tStaffName','$tAddress','$tCity','$tState','$tPinNo','$tArea','$tPhNo','$tEMail','$tDesignation','$tLoc','$tUserID','$tPWD','N','$filename')";

		if($conn->query($sql)){
       
 		?>
 		
 		<script type="text/javascript">
 			alert("Record inserted successfully........");
 		</script>
 		<?php	
  
 			echo "<script>window.location.href='staff-login.php'</script>"; 
		}
	}
		else{
          $text=$conn->error;
          echo '<script type="text/javascript">alert("'.$text.'")</script>';

		}
	}	
	//}

?>
