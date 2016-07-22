<?php
include_once "../config/db.class.php";
/* All form fields are automatically passed to the PHP script through the array $HTTP_POST_VARS. */

$message = $_POST['body'];
	$query="INSERT INTO comments (id, comments) VALUES ('','$message')";
	$data = mysql_query($query) 
			or die(mysql_error()); 
?>