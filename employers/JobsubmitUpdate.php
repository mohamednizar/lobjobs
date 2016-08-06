<?php
include_once "../config/db.class.php";
$Jobtype=  mysqli_real_escape_string($_POST['Jobtype']);
$Category=  mysqli_real_escape_string($_POST['Category']);
$Position=mysqli_real_escape_string($_POST['Position']);
$Resp=mysqli_real_escape_string($_POST['Resp']);
$Quali=mysqli_real_escape_string($_POST['Quali']);
$Gender=mysqli_real_escape_string($_POST['Gender']);
$salaryDis =mysqli_real_escape_string ($_POST['salaryDis']);
$cname=mysqli_real_escape_string($_POST['cname']);
$Business=mysqli_real_escape_string($_POST['Business']);
$address=mysqli_real_escape_string($_POST['address']);
$emlphn=mysqli_real_escape_string($_POST['emlphn']);
$id=mysqli_real_escape_string($_POST['jobid']);

$query = "UPDATE  vacancies SET jobCat = '$Category' ,jobtype = '$Jobtype' , jobPos = '$Position' , jobRes = '$Resp'  , jobQua = '$Quali', jobGen = '$Gender' , jobSal = '$Salary' ,salaryDis = '$salaryDis',cname ='$cname' ,emlphn ='$emlphn' , jobInd = '$Business',jobAdress='$address' ,intTime ='$intTime' ,updateTime = now() WHERE id = '$id' ";
$data = mysqli_query($query);

if (mysqli_affected_rows() >= 1) {
    $response_array['status'] = 'success';
    header('Content-type: application/json');
    echo json_encode($response_array);
} else {
    $response_array['status'] = 'error';
    header('Content-type: application/json');
    echo json_encode($response_array);
}

?>