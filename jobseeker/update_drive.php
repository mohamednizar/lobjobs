<?php
include_once "../config/db.class.php";

$drive_info=$_POST["drive_info"];
$id=  $_POST['id'];

$query=("UPDATE user_info SET drive_info='$drive_info'  WHERE id='$id'");



$data = mysql_query($query) 
or die(mysql_error()); 



?>