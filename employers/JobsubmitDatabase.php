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

$id=$_POST['id'];






$sql = "INSERT INTO vacancies (jobCat,jobtype, jobPos, jobRes , jobQua, jobGen, salaryDis,cname,emlphn, jobInd, jobAdress,Orgid,updateTime)
VALUES ('$Category','$Jobtype','$Position', '$Resp' , '$Quali' , '$Gender' , '$salaryDis','$cname','$emlphn','$Business' , '$address' ,'$id',now())";

$data = mysqli_query($sql)
 or die(mysqli_error()); 

 echo " Job vacancy submitted Successfully " ;

?>