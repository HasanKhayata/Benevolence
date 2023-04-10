<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'mailer/autoload.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();
  //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'benevolence.application@gmail.com';                     //SMTP username
    $mail->Password   = 'kejppmnkidpyrqfd';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
	
	 //Content
    $mail->isHTML(true);   
	$mail->CharSet = 'UTF-8';//لدعم اللغة العربية
//receiver info	
$mail->setFrom('benevolence.application@gmail.com', 'Benevolence Company');
$mail->addAddress("{$column_email}"); 
$mail->Subject = 'Check Verification Code';
$mail->Body    = "Your Verification Code is : <b>'{$Active_code}'</b>";
$mail->send();


?>