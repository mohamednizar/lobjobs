<?php
include_once "../config/db.class.php";

$jobtype=$_POST["jobtype"];
$id=  $_POST['id'];

$query=("UPDATE user_info SET job_type='$jobtype'  WHERE id='$id'");



$data = mysqli_query($query) 
or die(mysqli_error()); 



?>