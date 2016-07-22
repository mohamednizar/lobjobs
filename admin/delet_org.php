<?php
include_once "../config/db.class.php";


$id = $_POST['id'];


$query1="DELET FROM org_info  WHERE id = '$id'";

$data = mysql_query($query1) 
or die(mysql_error()); 
			
echo (mysql_insert_id());




?>
