<?php 

include  "includes/session.php";

if(isset($_POST['search'])){
    $search = mysqli_real_escape_string($conn,$_POST['search']);
    $itmname = mysqli_real_escape_string($conn,$_POST['itmname']);
      
    $query = "SELECT item_name,price FROM tbl_periferals WHERE item_name like'%".$search."%'";
 
    $result = mysqli_query($conn,$query);
    
    while($row = mysqli_fetch_array($result) ){
        $response[] = array("label"=>$row['item_name'],"rt"=>$row['price']);
    }
//"value"=>$row['rate'],"pn"=>$row['party_name']
    echo json_encode($response);
}

exit;

?>