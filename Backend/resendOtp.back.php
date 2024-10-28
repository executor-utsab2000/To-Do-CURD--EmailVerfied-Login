<?php

session_start();
// var_dump($_SESSION);

// updation of session OTP
// updation of time 

if (
    !(isset($_SESSION['userEmail'])) &&
    !(isset($_SESSION['userName'])) &&
    !(isset($_SESSION['userPassword'])) &&
    !(isset($_SESSION['userGender'])) &&
    !(isset($_SESSION['userOTP'])) &&
    !(isset($_SESSION['otpSentTime']))
) {
    header("location:../verification.php");
}

require './Components_Functions/mailSendFunction.php';
require './Components_Functions/headerFunction.php';
require './Components_Functions/connection.php';



$email = $_SESSION['userEmail'];
$name = $_SESSION['userName'];
$mailDataResend = sendMail($email, $name, '../');

$ifMailSent = $mailDataResend['ifSent'];
$newOtp = $mailDataResend['OTP'];
$otpSentTimeUpd = $mailDataResend['otpSentTime'];


$_SESSION['userOTP'] = $newOtp;
$_SESSION['otpSentTime'] = $otpSentTimeUpd;

headerFunction(
    "../verification.php",
    "OTP resent Successfully . Check your email Account",
    '<i class="fa-solid fa-check"></i>'
);















?>