<?php

include_once "../config/db.class.php";



$cname = $_POST["cname"];
$phone = $_POST["phone"];
$web = $_POST["web"];
$address = $_POST["address"];
$cperson = $_POST["cperson"];
$designation = $_POST["designation"];
$mobile = $_POST["mobile"];
$id = $_POST["orgid"];
$query = ("update org_info SET cname='$cname',phone='$phone',address='$address',website='$web',cperson='$cperson',designation='$designation',moblie='$mobile' WHERE id = '$id'");
$data = mysql_query($query);

if (mysql_affected_rows() >= 1) {
    $response_array['status'] = 'success';
    header('Content-type: application/json');
    echo json_encode($response_array);
} else {
    $response_array['status'] = 'error';
    header('Content-type: application/json');
    echo json_encode($response_array);
}





