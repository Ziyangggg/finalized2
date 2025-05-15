<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if(isset($_POST["sendforget"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'jobseeker331@gmail.com';                     //SMTP username
    $mail->Password   = 'anojplqdhzzxrhfs';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;         


    $mail->setFrom('jobseeker331@gmail.com');
    $mail->addAddress($_POST['forget-email']);     //Add a recipient

    
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Recover your password';
    $mail->Body    = 'We received a request to reset your password.';
    $mail->AltBody = 'Kindly click the below link to reset your password';



?>
