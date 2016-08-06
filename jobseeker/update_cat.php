<?php
include_once "../config/db.class.php";


$cat=$_POST["cat_info"];
$id = $_POST['id'];


$query1="UPDATE user_info SET cat='$cat' WHERE id = '$id'";

$data = mysqli_query($query1) 
or die(mysqli_error()); 
			
echo (mysqli_insert_id());




?>
