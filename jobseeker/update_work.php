<?php
include_once "../config/db.class.php";

$lang_info=$_POST["work_info"];
$id=  $_POST['id'];

$query=("UPDATE user_info SET wok_info='$lang_info'  WHERE id='$id'");



$data = mysqli_query($query) 
or die(mysqli_error()); 



?>