<?php


require '../Components_Functions/mailSendFunction.php';
require '../Components_Functions/connection.php';
require '../Components_Functions/headerFunction.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);
    $userEmail = $_POST['userEmail'];
    // $mailSent = sendMail($userEmail, 'utsab', '../../');




    $query = "SELECT * FROM `users` WHERE `email_id`=  '$userEmail' ;";
    $queryExec = mysqli_query($connection, $query);

    $userData = mysqli_fetch_assoc($queryExec);
    $userName = $userData['name'];
    $user_Id = $userData['user_Id'];
    // var_dump($userData);
    // echo $user_Id;
    // echo $userName;


    if (mysqli_num_rows($queryExec) === 1) {
        $mailSent = sendMail($userEmail, $userName, '../../');
        // var_dump($mailSent);
        $ifmailSend = $mailSent['ifSent'];
        $otp = $mailSent['OTP'];

        if ($ifmailSend) {
            session_start();
            $_SESSION['otp'] = $otp;
            $_SESSION['ifmailSend'] = $ifmailSend;
            $_SESSION['user_Id'] = $user_Id;
            headerFunction(
                '../../otpVerifyForgotPassword.php',
                'Enter The 6 Digit Code here.',
                '<i class="fa-solid fa-triangle-exclamation"></i>',
            );
        }



    } elseif (mysqli_num_rows($queryExec) < 1) {
        headerFunction(
            '../../forgetPassword.php',
            'No User found in this Email. Check Email.',
            '<i class="fa-solid fa-triangle-exclamation"></i>',
        );
    }
}
else{
    header("location:../../signUp_Login.php");
}









?>
<!-- array(3) { ["OTP"]=> int(111345) ["ifSent"]=> bool(true) ["otpSentTime"]=> int(1716098468) } -->