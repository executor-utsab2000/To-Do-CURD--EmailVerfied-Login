<?php

require './Components_Functions/mailSendFunction.php';
require './Components_Functions/headerFunction.php';
require './Components_Functions/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // var_dump($_POST);
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    $ifPresentAlready = "SELECT * FROM `users` WHERE `email_id` = '$email' ;";
    $ifDataPresentExe = mysqli_query($connection, $ifPresentAlready);
    $countIfpresent = mysqli_num_rows($ifDataPresentExe);
    // var_dump($countIfpresent);

    if ($countIfpresent === 1) {
        headerFunction(
            "../signUp_Login.php",
            "Email Id already exists",
            '<i class="fa-solid fa-triangle-exclamation"></i>'
        );
    } else {
        $mailData = sendMail($email, $name, '../');

        $ifMailSent = $mailData['ifSent'];
        $otp = $mailData['OTP'];
        $otpSentTime = $mailData['otpSentTime'];

        if ($ifMailSent) {
            session_start();
            $_SESSION['userEmail'] = $email;
            $_SESSION['userName'] = $name;
            $_SESSION['userPassword'] = $password;
            $_SESSION['userGender'] = $gender;
            $_SESSION['userOTP'] = $otp;
            $_SESSION['otpSentTime'] = $otpSentTime;
            headerFunction(
                "../verification.php",
                "OTP sent Successfully",
                '<i class="fa-solid fa-check"></i>'
            );
        }

    }


}











































?>