<?php 

include  "includes/conn.php";

if(isset($_POST['search'])){
    $search = mysqli_real_escape_string($conn,$_POST['search']);

    $query = "SELECT * FROM tbl_item WHERE modalno ='".$search."'";
    $result = mysqli_query($con,$query);
    
    while($row = mysqli_fetch_array($result) ){
        $response[] = array("value"=>$row['processor1'],"label"=>$row['ram1']);
    }

    echo json_encode($response);
}

exit;

?>
