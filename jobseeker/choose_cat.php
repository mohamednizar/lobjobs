<?php
include_once "../config/db.class.php";

$delet = "DELETE FROM user_info WHERE user_name='NULL'";


if (mysqli_query($delet)){
$cat=$_POST["cat_info"];
$username = "NULL";


$query1="INSERT INTO user_info (id,cat,basic_info,ol_info,al_info,pro_info,lan_info,com_info,wok_info,drive_info,city_info,cv_info,pic_info,user_name,password,active) VALUES
('','$cat','','','','','','','','','','','','$username','','')";



$data = mysqli_query($query1) 
or die(mysqli_error()); 
			
echo (mysqli_insert_id());

}


?>
