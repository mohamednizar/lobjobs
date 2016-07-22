<?php
include_once "../config/db.class.php";
$cvid = $_POST['cvid'];
$jobid = $_POST['jobid'];
$status = $_POST['status'];
$svid = $_POST['svid'];
$track = $cvid.$jobid;

$sql = "INSERT INTO haedhunting (svid,seeker_id,vacant_id,status) VALUES('$svid','$cvid','$jobid','$status') ON DUPLICATE KEY UPDATE status = '$status'";

$data = mysql_query($sql)
 or die(mysql_error()); 
 
 if (mysql_affected_rows() >= 1) {
    $response_array['status'] = 'success';
    header('Content-type: application/json');
    echo json_encode($response_array);
} else {
    $response_array['status'] = 'error';
    header('Content-type: application/json');
    echo json_encode($response_array);
}
