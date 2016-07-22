<?php
include_once "../config/db.class.php";

$Incname=$_POST["Incname"];
$id=  $_POST['id'];

$query=("UPDATE user_info SET Incname='$Incname'  WHERE id='$id'");



$data = mysql_query($query) 
or die(mysql_error()); 



?>