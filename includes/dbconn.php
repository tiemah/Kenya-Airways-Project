<?php
$host = 'localhost';
$port = 3306;
$user = 'root';
$password = '';
$database = 'flightdb';

$conn = mysqli_connect($host, $user, $password, $database, $port);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connection sucess";
?>