<?php
function Send_Mail($to,$subject,$body)
{
require 'class.phpmailer.php';
$from       = "from@yourwebsite.com";
$mail       = new PHPMailer();
$mail->IsSMTP(true);            // use SMTP
$mail->IsHTML(true);
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "mail.lobjobs.lk "; // SMTP host
$mail->Port       =  110;                    // set the SMTP port
$mail->Username   = "accounts@lobjobs.lk";  // SMTP  username
$mail->Password   = "*(yuw6q0%";  // SMTP password
$mail->SetFrom($from, 'Lobobs.lk');
$mail->AddReplyTo($from,'accounts@lobjobs.lk');
$mail->Subject    = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->Send();
}
?>

