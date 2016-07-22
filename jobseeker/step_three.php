<?php
include_once "../config/db.class.php";

$id=$_POST["id"];
$pro_info=$_POST["pro_info"];
$wok_total=$_POST["org_total"];
$ol_info=$_POST["ol_info"];
$al_info=$_POST["al_info"];
$codes_pro=$_POST["codes"];

$code="";
if (!$ol_info=="") {
 $code="OL,";
}
if (!$al_info=="") {
 $code="AL,";
}
if ((!$al_info=="") && (!$al_info=="")) {

 $code="OL,AL,";
}

$all_codes=$code.$codes_pro; 



$query=("UPDATE user_info SET ol_info='$ol_info' , al_info='$al_info' , quolifications='$all_codes' , pro_info='$pro_info',wok_info='$wok_total' WHERE id='$id'");

$data = mysql_query($query) 
or die(mysql_error()); 


?>