<?php include 'includes/session.php'; ?>
<?php
header('Content-Type: application/json');

//$conn = mysqli_connect("localhost","root","test","phpsamples");

$sqlQuery = "SELECT orderid,modalno,sum(qty) as qt,order_date FROM tbl_order group by order_date ORDER BY id";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>