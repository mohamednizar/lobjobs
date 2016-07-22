<?php
include_once "../config/db.class.php";
$id=$_POST['id'];
$cv_status=$_POST['status'];


$query=("UPDATE user_info SET cv_status='$cv_status' WHERE id='$id'");




$data = mysql_query($query) 
or die(mysql_error()); 

?>