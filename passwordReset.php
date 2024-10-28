<?php
session_start();
if (!isset($_SESSION['verifiedUser'])) {
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
            <form action="./Backend/Forget Password/passwordUpdate.php" method="post" id="paswordReset"
                autocomplete="off">
                <div class="row">
                    <div class="col-12 p-0 m-0">
                        <div class="timerBar"></div>
                    </div>
                    <div class="my-2 col-12 header mt-3">Password Reset</div>
                    <div class="col-12 my-3 password">
                        <label for="password">Enter Your Password :</label>
                        <input type="text" name="password" id="password" class="inputs"
                            placeholder="Enter Your Password">
                    </div>
                    <div class="col-12 my-3 password">
                        <label for="cPassword">Retype Your Password :</label>
                        <input type="text" id="cPassword" class="inputs" placeholder="Retype Your Password">
                    </div>
                    <div class="my-2 col-12 buttons d-flex justify-content-center">
                        <button type="submit" id="submit">Submit </button>
                    </div>

                </div>
            </form>

        </div>
    </div>


</body>

<script src="./Script/resetPassValidate.js"></script>

</html>