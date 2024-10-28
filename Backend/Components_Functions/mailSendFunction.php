<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $name = '', $path = '')
{

  require $path . 'PHP Mailer Files/src/PHPMailer.php';
  require $path . 'PHP Mailer Files/src/SMTP.php';
  require $path . 'PHP Mailer Files/src/Exception.php';

  $OTP = rand(100000, 999999);

  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);

  //Server settings
  $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through => contains emailid from where email is sent
  $mail->SMTPAuth = true;                                   //Enable SMTP authentication
  $mail->Username = 'executor.official.website@gmail.com';                     //SMTP username
  $mail->Password = 'ltlv wkrw pmal jcoz';                   //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        //Enable implicit TLS encryption
  $mail->Port = 587;                                        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('executor.official.website@gmail.com', 'Executor');
  $mail->addAddress("$email", "$name");     //Add a recipient


  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Verification Code';
  $mail->Body = ' <h5>Your verification code is</h5>
                        <h1>' . $OTP . '</h1>
                          ';

  $mailSend = $mail->send();
  if ($mailSend) {
    $otpSentTime = time();
  }
  return ['OTP' => $OTP, 'ifSent' => $mailSend, 'otpSentTime' => $otpSentTime];

  // since i  needed two data so i had to store them in an array and return the whole array


}

?>