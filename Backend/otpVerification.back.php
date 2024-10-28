<?php
session_start();

if (
    !(isset($_SESSION['userEmail'])) &&
    !(isset($_SESSION['userName'])) &&
    !(isset($_SESSION['userPassword'])) &&
    !(isset($_SESSION['userGender'])) &&
    !(isset($_SESSION['userOTP'])) &&
    !(isset($_SESSION['otpSentTime']))
) {
    header("location:../signUp_Login.php");
}

require './Components_Functions/mailSendFunction.php';
require './Components_Functions/headerFunction.php';
require './Components_Functions/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);
    $userOTP = $_POST['userOTP'];
    $sessionOtp = $_SESSION['userOTP'];
    $OtpSentTime = $_SESSION['otpSentTime'];

    $presentTime = time();


    if (($presentTime - $OtpSentTime) <= 30) {
        if ($userOTP == $sessionOtp) {

            // creating user id
            $userId = uniqid('user-');
            $userName = $_SESSION['userName'];
            $userEmail = $_SESSION['userEmail'];
            $userPassword = $_SESSION['userPassword'];
            $userGender = $_SESSION['userGender'];

            $hashpass = password_hash($userPassword, PASSWORD_DEFAULT); //hashig of password



            if ($userGender === 'male') {
                $profilePic = 'https://images.sftcdn.net/images/t_app-cover-l,f_auto/p/e76d4296-43f3-493b-9d50-f8e5c142d06c/2117667014/boys-profile-picture-screenshot.png';
            } elseif ($userGender === 'female') {
                $profilePic = 'https://cdn4.sharechat.com/compressed_gm_40_img_781769_37704dec_1692977776995_sc.jpg?tenant=sc&referrer=pwa-sharechat-service&f=995_sc.jpg';
            }




            // insert query
            $insertData = "INSERT INTO `users`
                            (`user_Id`, `email_id`, `password`, `name`, `gender`, `profilePic`)
                             VALUES 
                             ('$userId','$userEmail','$hashpass','$userName','$userGender','$profilePic')";
            $queryExec = mysqli_query($connection, $insertData);

            // if ($queryExec) {
            unset($_POST['userOTP']);
            unset($_SESSION['userOTP']);
            unset($_SESSION['otpSentTime']);
            unset($_SESSION['userPassword']);
            unset($_SESSION['userEmail']);
            unset($_SESSION['userGender']);

            // creating new session variables 
            $_SESSION['userId'] = $userId;
            // $_SESSION['userActive'] = true;
            headerFunction(
                "../index.php",
                'Account Created Successfully',
                '<i class="fa-solid fa-check"></i>'
            );
            // }


        } else {
            headerFunction(
                "../verification.php",
                'OTP does not Match',
                '<i class="fa-solid fa-triangle-exclamation"></i>'
            );
        }
    } else {
        headerFunction(
            "../verification.php",
            'Otp Expired.Click on Resend .',
            '<i class="fa-solid fa-triangle-exclamation"></i>'
        );
    }








































}




?>