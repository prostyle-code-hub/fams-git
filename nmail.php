<?php
require 'PHPMailerAutoload.php';
   use PHPMailer\PHPMailer\PHPMailer;
   $mail = new PHPMailer;
   $mail->isSMTP();
   $mail->SMTPDebug = 2;
   $mail->Host = 'smtp.alpha-prm.jp';
   $mail->Port = 587;
   $mail->SMTPAuth = true;
   $mail->Username = 'Daiki_fams@dai-ki.co.jp';
   $mail->Password = 'qX8%Juve';
   $mail->setFrom('Daiki_fams@dai-ki.co.jp', 'FAMS');
   $mail->addReplyTo('Daiki_fams@dai-ki.co.jp', 'FAMS');
   $mail->addAddress('m.fonseka@prostyle.technolgy', 'Receiver Name');
   $mail->Subject = 'Checking if PHPMailer works';
   $mail->msgHTML(file_get_contents('message.html'), __DIR__);
   $mail->Body = 'This is just a plain text message body';
   //$mail->addAttachment('attachment.txt');
   if (!$mail->send()) {
       echo 'Mailer Error: ' . $mail->ErrorInfo;
   } else {
       echo 'The email message was sent.';
   }
?>