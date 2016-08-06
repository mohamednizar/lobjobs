<?php
include_once "../config/db.class.php";


$id = $_POST['id'];


$query1="DELET FROM org_info  WHERE id = '$id'";

$data = mysqli_query($query1) 
or die(mysqli_error()); 
			
echo (mysqli_insert_id());




?>
