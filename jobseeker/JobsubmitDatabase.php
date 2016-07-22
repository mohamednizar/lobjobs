<?php
include_once "../config/db.class.php";
$Category=$_POST['Category'];
$Position=$_POST['Position'];
$Resp=$_POST['Resp'];
$Quali=$_POST['Quali'];
$Gender=$_POST['Gender'];
$Salary=$_POST['Salary'];
$salaryDis = $_POST['salaryDis'];
$workingDays = $_POST['workingDays'];
$location=$_POST['location'];
$Business=$_POST['Business'];
$interOffice=$_POST['interOffice'];
$intTime=$_POST['intTime'];
$id=$_POST['id'];






$sql = "INSERT INTO vacancies (jobCat, jobPos, jobRes , jobQua, jobGen, jobSal,salaryDis,jobLoc,workingDays, jobInd, jobAdress,jobTime ,Orgid)
VALUES ('$Category','$Position', '$Resp' , '$Quali' , '$Gender' , '$Salary' ,'$salaryDis','$location','$workingDays','$Business' , '$interOffice' ,'$intTime' ,'$id' )";

$data = mysql_query($sql)
 or die(mysql_error()); 

 echo " Job vacancy submitted Successfully " ;

?>