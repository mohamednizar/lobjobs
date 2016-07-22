<?php
include_once "../config/db.class.php";

$NIncname=$_POST["NIncname"];
$id=  $_POST['id'];

$query=("UPDATE user_info SET NIncname='$NIncname'  WHERE id='$id'");



$data = mysql_query($query) 
or die(mysql_error()); 



?>