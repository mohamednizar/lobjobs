<?php
$server   = "127.13.70.130:3036";
$database = "lobjobs";
$username = "adminALvIq7k";
$password = "YJcrW76tbMj2%";

$mysqlConnection = mysql_connect($server, $username, $password);
if (!$mysqlConnection)
{
  echo "Please try later.";
}
else{
mysql_select_db($database, $mysqlConnection);

}
?>