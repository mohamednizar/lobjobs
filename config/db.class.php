<?php
$server   = "mysql.hostinger.in";
$database = "u426162963_lob";
$username = "u426162963_admin";
$password = "ICkP5hRudr";

$mysqlConnection = mysqli_connect($server, $username, $password);
if (!$mysqlConnection)
{
  echo "Please try later.";
}
else{
mysqli_select_db($mysqlConnection,$database);

}
?>
