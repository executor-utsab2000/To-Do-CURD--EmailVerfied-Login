<?php
require './Components/popUpMsgBackend.php';
require './Components/popUpMsgFrontend.php';

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Do List </title>

    <?php include './Components/CDN_Links.php' ?>
    <link rel="stylesheet" href="./Style/forgetPassword.scss">

</head>

<body>

    <div class="container-fluid forgotpassword">
        <div class="cardContainer">
            <form action="./Backend/Forget Password/ifEmailValid.php" method="post" id="forgetFormEmailTake">
                <div class="row">
                    <div class="col-12 header my-2">password reset</div>
                    <div class="col-12 inputLabel  my-2">
                        <label for="email">Enter Your Email :</label>
                        <input type="text" name="userEmail" id="email" class="inputs" placeholder="Enter Your Email">
                    </div>
                    <div class="col-12 my-2">
                        <button type="submit">Verify Email</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>
<script src="./Script/forgetPasswordValidate.js"></script>


</html>