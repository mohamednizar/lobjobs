<?php
include_once "../config/db.class.php";

$lang_info=$_POST["lang_info"];
$id=  $_POST['id'];

$query=("UPDATE user_info SET lan_info='$lang_info'  WHERE id='$id'");



$data = mysql_query($query) 
or die(mysql_error()); 



?>