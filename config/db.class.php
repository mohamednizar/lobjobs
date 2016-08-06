<?php
$server   = "mysql.hostinger.in";
$database = "u426162963_lob";
$username = "u426162963_admin";
$password = "ICkP5hRudr";

$mysqlConnection = mysql_connect($server, $username, $password);
if (!$mysqlConnection)
{
  echo "Please try later.";
}
else{
mysql_select_db($database, $mysqlConnection);

}
?>
