<?php
$server   = "mysql.hostinger.in";
$database = "u426162963_lob";
$username = "u426162963_admin";
$password = "6pgHDcoHxo";

$mysqlConnection = mysql_connect($server, $username, $password);
if (!$mysqlConnection)
{
  echo "Please try later.";
}
else{
mysql_select_db($database, $mysqlConnection);

}
?>
