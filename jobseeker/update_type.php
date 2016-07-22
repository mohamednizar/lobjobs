<?php
include_once "../config/db.class.php";

$jobtype=$_POST["jobtype"];
$id=  $_POST['id'];

$query=("UPDATE user_info SET job_type='$jobtype'  WHERE id='$id'");



$data = mysql_query($query) 
or die(mysql_error()); 



?>