<?php
session_start();

if (
    !(isset($_SESSION['userEmail'])) &&
    !(isset($_SESSION['userName'])) &&
    !(isset($_SESSION['userPassword'])) &&
    !(isset($_SESSION['userOTP'])) &&
    !(isset($_SESSION['otpSentTime']))
) {
    header("location:./signUp_Login.php");
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Email Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="Style/verify.css">
</head>

<body>

    <?php include './Components/popUpMsgFrontend.php' ?>
    <?php include './Components/popUpMsgBackend.php' ?>


    <div class="container-fluid verificationPage">
        <div class="verifyContainer">
            <form action="./Backend/otpVerification.back.php" method="post" id="otpVerification">
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
                    <div class="col-12 my-2 timer">
                        You have <span id="timerSecond" class="text-danger">30</span>s to fill the OTP
                    </div>
                </div>
            </form>


            <form action="" method="post" id="resendOtpForm" autocomplete="off">
                <div class="row">
                    <div class="col-12">
                        <a href="./Backend/resendOtp.back.php" class="nav-link">
                            <button type="button" id="sendOtp">Resend OTP </button>
                        </a>
                    </div>
                </div>
            </form>


        </div>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

<script src="./Script/verificationPage.js"></script>

<script>

</script>

</html>