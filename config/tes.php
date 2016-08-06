<?php
$server   = "localhost:3036";
$database = "ruchira_lobjobs";
$username = "ruchira_lobjobs";
$password = "nimalka123";

$mysqliConnection = mysqli_connect($server, $username, $password);
if (!$mysqliConnection)
{
  echo "Please try later.";
}
else
{
mysqli_select_db($database, $mysqliConnection);
  echo "good to go.";
}
?>