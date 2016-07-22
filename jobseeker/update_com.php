<?php
include_once "../config/db.class.php";

$com_info=$_POST["com_info"];
$id=  $_POST['id'];

$query=("UPDATE user_info SET com_info='$com_info'  WHERE id='$id'");



$data = mysql_query($query) 
or die(mysql_error()); 



?>