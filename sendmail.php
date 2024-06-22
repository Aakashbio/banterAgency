<?php
   require 'vendor/autoload.php';
   use PHPMailer\PHPMailer\PHPMailer;
   
    $name = $_POST['name'];
    $phone = $_POST['phone_number'];
    $email = $_POST['email'];
    $cases  = $_POST['message'];
   
   
   $mail = new PHPMailer;
   $mail->isSMTP();
   $mail->SMTPDebug = 2;
   $mail->Host = 'smtp.hostinger.com';
   $mail->Port = 587;
   $mail->SMTPAuth = true;
   $mail->Username = 'sales@banters.agency';
   $mail->Password = 'Banterbox$sales07';
   $mail->setFrom('sales@banters.agency', 'Banters Agency');
   $mail->addReplyTo('sales@banters.agency', 'Banters Agency');
   $mail->addAddress('sales@banters.agency', 'Banters Agency');
   $mail->Subject = 'Enquiry Details';
   $mail->msgHTML(file_get_contents('message.html'), __DIR__);
   $mail->Body = 'Name :'.$_POST['name'].       '<br> Contact No.:'.$_POST['phone_number'].'<br> Email Id: '.$_POST['email'].'<br> Message: '.$_POST['message'];
   
   
   //$mail->addAttachment('attachment.txt');
   if (!$mail->send()) {
       echo 'Mailer Error: ' . $mail->ErrorInfo;
   } else {
      header("Location: https://www.banters.agency/thank-you.html");
   }
   
   header("Location: https://www.banters.agency/thank-you.html");
?>