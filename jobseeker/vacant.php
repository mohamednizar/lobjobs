<?php

include_once "../config/db.class.php";

$vacant = $_POST['id'];
$seeker = "";
$quary = "INSERT INTO seeker_vacant(id,vacant_id) "
        . "VALUES('','$vacant')";
$data = mysqli_query($query) or die('failed');
