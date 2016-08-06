<?php
$server   = "mysql.hostinger.in";
$database = "u426162963_lob";
$username = "u426162963_admin";
$password = "6pgHDcoHxo";

$mysqli = new mysqli($server, $username, $password, $database);
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

// $mysqlConnection = mysql_connect($server, $username, $password);
// if (!$mysqlConnection)
// {
//   echo "Please try later.";
// }
// else{
// mysql_select_db($database, $mysqlConnection);

// }
?>
