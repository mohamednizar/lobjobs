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

$id=$_POST['id'];






$sql = "INSERT INTO vacancies (jobCat,jobtype, jobPos, jobRes , jobQua, jobGen, salaryDis,cname,emlphn, jobInd, jobAdress,Orgid,updateTime)
VALUES ('$Category','$Jobtype','$Position', '$Resp' , '$Quali' , '$Gender' , '$salaryDis','$cname','$emlphn','$Business' , '$address' ,'$id',now())";

$data = mysql_query($sql)
 or die(mysql_error()); 

 echo " Job vacancy submitted Successfully " ;

?>