<?php
include_once "../config/db.class.php";
$Jobtype=  mysql_real_escape_string($_POST['Jobtype']);
$Category=  mysql_real_escape_string($_POST['Category']);
$Position=mysql_real_escape_string($_POST['Position']);
$Resp=mysql_real_escape_string($_POST['Resp']);
$Quali=mysql_real_escape_string($_POST['Quali']);
$Gender=mysql_real_escape_string($_POST['Gender']);
$salaryDis =mysql_real_escape_string ($_POST['salaryDis']);
$cname=mysql_real_escape_string($_POST['cname']);
$Business=mysql_real_escape_string($_POST['Business']);
$address=mysql_real_escape_string($_POST['address']);
$emlphn=mysql_real_escape_string($_POST['emlphn']);
$id=mysql_real_escape_string($_POST['jobid']);

$query = "UPDATE  vacancies SET jobCat = '$Category' ,jobtype = '$Jobtype' , jobPos = '$Position' , jobRes = '$Resp'  , jobQua = '$Quali', jobGen = '$Gender' , jobSal = '$Salary' ,salaryDis = '$salaryDis',cname ='$cname' ,emlphn ='$emlphn' , jobInd = '$Business',jobAdress='$address' ,intTime ='$intTime' ,updateTime = now() WHERE id = '$id' ";
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

?>