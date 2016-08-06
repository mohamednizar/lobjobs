<?php
include_once "../config/db.class.php";

$NIncname=$_POST["NIncname"];
$id=  $_POST['id'];

$query=("UPDATE user_info SET NIncname='$NIncname'  WHERE id='$id'");



$data = mysqli_query($query) 
or die(mysqli_error()); 



?>