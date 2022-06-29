<?php
/*
define('DB_SERVER','localhost');
define('DB_USER','sodhukno_dealeramc');
define('DB_PASS' ,'CR7U@d9&qV+4');
define('DB_NAME', 'sodhukno_DealeramcDB');
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
 
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
*/

if($_SERVER['SERVER_NAME']=="localhost"){
    $conn = new mysqli('localhost', 'root', '', 'sodhukno_DealeramcDB');
}else{
	$conn = new mysqli('localhost', 'sodhukno_dealer', 'VNA1Pj)E0DUv', 'sodhukno_DealeramcDB');
}
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}


?>
<?php
   /* define("DB_HOST", "localhost");
    define("DB_USER", "sodhukno_dealer");
    define("DB_PASSWORD", "VNA1Pj)E0DUv");
    define("DB_DATABASE", "sodhukno_DealeramcDB");

    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);*/
?>