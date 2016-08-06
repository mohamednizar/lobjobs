<?php
$server   = "mysql.hostinger.in";
$database = "lobjobs";
$username = "u426162963_admin";
$password = "aTiE-N3vLNx6";

$mysqlConnection = mysql_connect($server, $username, $password);
if (!$mysqlConnection)
{
  echo "Please try later.";
}
else{
mysql_select_db($database, $mysqlConnection);

}
?>
