<?php
include_once "../config/db.class.php";

$drive_info=$_POST["drive_info"];
$id=  $_POST['id'];

$query=("UPDATE user_info SET drive_info='$drive_info'  WHERE id='$id'");



$data = mysqli_query($query) 
or die(mysqli_error()); 



?>