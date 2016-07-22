<?php
$server   = "localhost:3036";
$database = "ruchira_lobjobs";
$username = "ruchira_lobjobs";
$password = "nimalka123";

$mysqlConnection = mysql_connect($server, $username, $password);
if (!$mysqlConnection)
{
  echo "Please try later.";
}
else
{
mysql_select_db($database, $mysqlConnection);
  echo "good to go.";
}
?>