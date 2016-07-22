<?php
include_once "../config/db.class.php";

$basic_info=$_POST["basic_info"];
$ol_info=$_POST["ol_info"];
$al_info=$_POST["al_info"];
$id=  $_POST['id'];
$jobtype=$_POST['job_type'];

$query=("UPDATE user_info SET basic_info='$basic_info',updateTime=now(),job_type= '$jobtype' WHERE id='$id'");



$data = mysql_query($query) 
or die(mysql_error()); 



?>

