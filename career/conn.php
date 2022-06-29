<?php

//session_start();


if($_SERVER['SERVER_NAME']=="localhost"){
  $conn = new mysqli('localhost', 'root', '', 'sodhukno_DealeramcDB');
}else{
  $conn = new mysqli('localhost', 'sodhukno_dealer', 'VNA1Pj)E0DUv', 'sodhukno_DealeramcDB');
}
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


?> 