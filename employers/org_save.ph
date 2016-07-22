<?php

include_once "../config/db.class.php";



$cname = $_POST["cname"];
$phone = $_POST["phone"];
$web = $_POST["web"];
$address = $_POST["address"];
$cperson = $_POST["cperson"];
$designation = $_POST["designation"];
$mobile = $_POST["mobile"];
$user = $_POST["user"];
$pass = $_POST["pass"];
$pass = hash('sha512', $pass);
$filename=$_POST['logo'];
$imgData = file_get_contents($filename);
$img=mysql_real_escape_string($imgData);
$query = ("INSERT INTO org_info (id,cname,phone,address,website,logo,cperson,designation,moblie,username,password) "
        . "VALUES ('','$cname','$phone','$address' ,'$web','$img','$cperson','$designation','$mobile','$user','$pass')");
$data = mysql_query($query)
        or die(mysql_error());


    

if(mysql_fetch_array($data)>=1){
    $response_array['status'] = 'success';  
     header('Content-type: application/json');
 echo json_encode($response_array);
}else {
    $response_array['status'] = 'error';  
     header('Content-type: application/json');
 echo json_encode($response_array);
}

 header('Content-type: application/json');
 echo json_encode($response_array);



