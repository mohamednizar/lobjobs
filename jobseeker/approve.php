<?php

$id=$_POST['id'];

$query=("UPDATE user_info SET active='1' WHERE id='$id'");




$data = mysqli_query($query) 
or die(mysqli_error()); 

?>