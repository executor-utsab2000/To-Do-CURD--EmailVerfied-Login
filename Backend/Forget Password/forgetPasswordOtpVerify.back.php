<!-- forgetpass.php >> ifEmailValid.php >> otpVerifyForgotPassword.php >> forgetPasswordOtpVerify.back.php  -->
<?php
session_start();
// var_dump($_SESSION);

require '../Components_Functions/connection.php';
require '../Components_Functions/headerFunction.php';

if (isset($_SESSION['ifmailSend'])) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // var_dump($_POST);

        $userOTP = $_POST['userOTP'];
        // $userTime = time();
        $sessionOTP = $_SESSION['otp'];
        if ($userOTP == $sessionOTP) {

            unset($_SESSION['otp']);
            unset($_SESSION['ifmailSend']);

            $_SESSION['verifiedUser'] = true;
            headerFunction(
                '../../passwordReset.php',
                'Enter Your Passsword',
                '<i class="fa-solid fa-key"></i>'
            );
            // echo 'otp matched';
        } else {
            headerFunction(
                '../../otpVerifyForgotPassword.php',
                'Invalid OTP',
                '<i class="fa-solid fa-key"></i>'
            );
        }







    } else {
        echo 'method not post';
    }


} else {
    echo 'session not set';
}






?>