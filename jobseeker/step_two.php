<?php
include_once "../config/db.class.php";

$id=$_POST["id"];

$lang_info=$_POST["lang_info"];
$computer=$_POST["com_exp_total"];
$city_info=$_POST["city_info"];
$drive_info=$_POST["drive_info"];
$Incname = $_POST['Incname'];
$NIncname = $_POST['NIncname'];

$array_CN = implode(',',$Incname);
$array_NCN = implode(',',$NIncname);





$query=("UPDATE user_info SET  lan_info='$lang_info' ,com_info='$computer', pro_info='$pro_qua' ,city_info='$city_info' ,drive_info='$drive_info',Incname='$array_CN',NIncname='$array_NCN' WHERE id='$id'");


$data = mysqli_query($query) 
or die(mysqli_error()); 


?>