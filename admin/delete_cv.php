<?php
include_once "../config/db.class.php";
$cvid = $_POST['cvid'];


$sql = "DELETE FROM user_info WHERE id=$cvid";

$data = mysqli_query($sql)
 or die(mysqli_error()); 
 
 if (mysqli_affected_rows() >= 1) {
    $response_array['status'] = 'success';
    header('Content-type: application/json');
    echo json_encode($response_array);
} else {
    $response_array['status'] = 'error';
    header('Content-type: application/json');
    echo json_encode($response_array);
}