<?php
include_once "../config/db.class.php";
$orgid = $_POST['org'];
$today = date("Y-m-d");
			
$count = mysqli_query("INSERT INTO logincount(org_id,date,orgincvdwld) VALUES ('$orgid','$today ',1) ON DUPLICATE KEY UPDATE orgincvdwld=orgincvdwld+1")
			                            or die(mysqli_error());
