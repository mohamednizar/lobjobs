<?php
include_once "../config/db.class.php";

$basic_info=$_POST["basic_info"];
$ol_info=$_POST["ol_info"];
$al_info=$_POST["al_info"];
$id=  $_POST['id'];

$query=("UPDATE user_info SET al_info='$al_info'  WHERE id='$id'");



$data = mysql_query($query) 
or die(mysql_error()); 



?>

