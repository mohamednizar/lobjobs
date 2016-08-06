<?php
include_once "../config/db.class.php";

$Incname=$_POST["Incname"];
$id=  $_POST['id'];

$query=("UPDATE user_info SET Incname='$Incname'  WHERE id='$id'");



$data = mysqli_query($query) 
or die(mysqli_error()); 



?>