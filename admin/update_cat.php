<?php
include_once "../config/db.class.php";


$cat=$_POST["cat_info"];
$id = $_POST['id'];


$query1="UPDATE user_info SET cat='$cat' WHERE id = '$id'";

$data = mysql_query($query1) 
or die(mysql_error()); 
			
echo (mysql_insert_id());




?>
