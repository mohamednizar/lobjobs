<?php
include_once "../config/db.class.php";
$id=$_POST['id'];
$cv_status=$_POST['status'];


$query=("UPDATE user_info SET cv_status='$cv_status' WHERE id='$id'");




$data = mysqli_query($query) 
or die(mysqli_error()); 

?>