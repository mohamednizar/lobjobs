<?php
include_once "../config/db.class.php";

$pro_info=$_POST["pro_info"];
$id=  $_POST['id'];

$query=("UPDATE user_info SET pro_info='$pro_info'  WHERE id='$id'");



$data = mysql_query($query) 
or die(mysql_error()); 



?>