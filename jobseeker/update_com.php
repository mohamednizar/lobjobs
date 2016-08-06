<?php
include_once "../config/db.class.php";

$com_info=$_POST["com_info"];
$id=  $_POST['id'];

$query=("UPDATE user_info SET com_info='$com_info'  WHERE id='$id'");



$data = mysqli_query($query) 
or die(mysqli_error()); 



?>