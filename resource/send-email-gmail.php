<?php
require 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Port = 587;
$mail->Host = 'smtp.gmail.com';
$mail->IsHTML(true);
$mail->Mailer = 'smtp';
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "giovannisturiale2@gmail.com";
$mail->Password = "Gionny32";
//Sender Info
$mail->From = "giovannisturiale2@gmail.com";
$mail->FromName = "User Authentication";
