<?php
session_start();
if (
    !isset($_SESSION['otpSentTime']) &&
    !isset($_SESSION['otp']) &&
    !isset($_SESSION['ifmailSend'])

) {
    header("location:./signUp_Login.php");
}

require './Components/popUpMsgBackend.php';
require './Components/popUpMsgFrontend.php';
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Do List || Reset Password </title>

    <?php include './Components/CDN_Links.php' ?>
    <link rel="stylesheet" href="Style/resetPass.scss">
</head>

<body>



    <div class="container-fluid verificationPage">
        <div class="verifyContainer">
            <form action="./Backend/Forget Password/forgetPasswordOtpVerify.back.php" method="post" id="otpVerification"
                autocomplete="off">
                <div class="row">
                    <div class="col-12 p-0 m-0">
                        <div class="timerBar"></div>
                    </div>
                    <div class="my-2 col-12 header">OTP Verify</div>
                    <div class="my-2 col-12 otp">
                        <input type="text" name="userOTP" id="userOtp" class="inputs"
                            placeholder="Enter OTP sent To Your Email">
                        <div class="txt">Enter the <span class="text-danger">6-Digit</span> OTP sent to xyz@gmail.com
                        </div>
                    </div>
                    <div class="my-2 col-12 buttons d-flex justify-content-center">
                        <button type="submit" id="submit">Submit </button>
                    </div>

                </div>
            </form>

        </div>
    </div>


</body>

<script src="./Script/verificationPage.js"></script>

</html>