<?php
$server   = "mysql.hostinger.in";
$database = "u426162963_lob";
$username = "u426162963_admin";
$password = "6pgHDcoHxo";

$mysqlConnection = mysqli_connect($server, $username, $password,$database);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
mysqli_select_db($mysqlConnection,$database);

mysqli_close($con);
?>
