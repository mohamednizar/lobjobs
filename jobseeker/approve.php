<?php

$id=$_POST['id'];

$query=("UPDATE user_info SET active='1' WHERE id='$id'");




$data = mysql_query($query) 
or die(mysql_error()); 

?>