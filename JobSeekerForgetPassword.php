<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Forget Password</title>
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="login">
  <div class="container">
    <div class="cover">
      <div class="front">
        <img src="wallhaven-4y3370.jpg" alt="">
        <div class="text">
          <span class="text-1">Forget Password?</span>

        </div>
      </div>

    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Job Seeker Forget Password</div>
          <form method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                 <input type="email" class="form-control" id="forget-email" name="forget-email" placeholder="Enter your email" require>
              </div>
             </div>
              
              <div class="button input-box">
                <input type="submit" value="Sumbit" name="sendforget">
              </div>
            </div>
        </form>
      </div>

    </div>
    </div>
  </div>
</div>
</body>
</html>

<?php
include("connect.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["sendforget"])) {
    $email = $_REQUEST['forget-email'];
    $query = "SELECT * FROM finalyearproject.job_seekerinfo WHERE Job_SeekerEmail = ? AND is_deleted = '0'";
    $params = array($email);
    $stmt = sqlsrv_query($connect, $query, $params);

    if ($stmt === false) {
        echo "<script>alert('Database error');</script>";
    } else {
        if (sqlsrv_has_rows($stmt)) {
            $message = '<div>
                <p><b>Hello!</b></p>
                <p>You are receiving this email because we received a password reset request for your account.</p>
                <br>
                <p><a href="http://localhost/finalized2/JobSeekerResetPassword.php?secret=' . base64_encode($email) . '">Reset Password</a></p>
                <p>If you did not request a password reset, no further action is required.</p>
            </div>';

            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'jobseeker331@gmail.com';
                $mail->Password   = 'anojplqdhzzxrhfs';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;

                $mail->setFrom('jobseeker331@gmail.com');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Recover your password';
                $mail->Body    = $message;

                if ($mail->send()) {
                    echo "<script>
                        alert('Sent Successfully');
                        window.location.replace('JobSeekerLogin.php');
                    </script>";
                }
            } catch (Exception $e) {
                echo "<script>alert('Mailer Error: {$mail->ErrorInfo}');</script>";
            }
        } else {
            echo "<script>alert('The email is not a registered email');</script>";
        }
    }
}
?>