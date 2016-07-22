<?php
include_once "../config/db.class.php";
$id = $_POST['id'];
$sdate = $_POST['sdate'];
$edate = $_POST['edate'];
$type = $_POST['type'];
$referrence = $_POST['referrence'];


$sql = "INSERT INTO  account_control (id,start_date,end_date,type,referrence) VALUES ('$id','$sdate','$edate','$type','$reference') ON DUPLICATE KEY UPDATE  start_date ='$sdate' ,end_date = '$edate',type='$type',referrence='$referrence'  ";

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
