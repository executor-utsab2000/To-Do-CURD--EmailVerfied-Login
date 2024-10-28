<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login SignUp</title>

    <link rel="stylesheet" href="Style/signUp_Login.css">
    <?php require './Components/CDN_Links.php' ?>
</head>

<body>

    <?php include './Components/popUpMsgFrontend.php' ?>
    <?php include './Components/popUpMsgBackend.php' ?>


    <div class="container-fluid loginSignUp px-0 mx-0">

        <div class="cardContainer card">
            <div class="button mx-auto">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Sign Up</button>
                    </li>
                </ul>
            </div>


            <div class="formContainer">


                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">
                        <!-- Login Start -->
                        <form action="./Backend/login.back.php" method="post" id="loginForm">
                            <div class="row">
                                <div class="col-12 my-3">
                                    <label for="loginEmail">Enter Your Email :</label>
                                    <input type="text" name="loginEmail" id="loginEmail" class="inputs loginInputs"
                                        placeholder="Enter Your Email">
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="loginPassword">Enter Your Password :</label>
                                    <input type="password" name="loginPassword" id="loginPassword"
                                        class="inputs loginInputs" placeholder="Enter Password">
                                    <!-- <button type="button" class="btn eye"><i class="fa-solid fa-eye-slash"></i></button> -->
                                </div>
                                <div class="col-12 pe-4 d-flex justify-content-end mb-3 mt-1">
                                    <a href="./forgetPassword.php" class="forgotPassLink">Forgot Password ?</a>
                                </div>
                                <div class="col-12 my-3">
                                    <button type="submit">Submit </button>
                                </div>
                            </div>
                        </form>
                        <!-- Login End -->
                    </div>


                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <!-- signUpForm Start -->
                        <form action="./Backend/signUp.back.php" method="post" id="signUpFormHandler">
                            <div class="row">
                                <div class="col-12 my-3">
                                    <label for="email">Enter Your Email :</label>
                                    <input type="text" name="email" id="email" class="inputs signUpInputs"
                                        placeholder="Enter Your Email">
                                </div>
                                <div class="col-12 my-3">
                                    <label for="name">Enter Your Name :</label>
                                    <input type="text" name="name" id="name" class="inputs signUpInputs"
                                        placeholder="Enter Your Name">
                                </div>
                                <div class="col-12 my-3">
                                    <label>Select Your Gender :</label>
                                    <table class="w-50">
                                        <tr>
                                            <td>
                                                <input type="radio" name="gender" id="maleGender" value="male"
                                                    class="me-2" checked>
                                                <label for="maleGender">Male</label>
                                            </td>
                                            <td>
                                                <input type="radio" name="gender" id="femaleGender" value="female"
                                                    class="me-2">
                                                <label for="femaleGender">Female</label>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-12 my-3">
                                    <label for="password">Enter Your Password :</label>
                                    <input type="password" name="password" id="password" class="inputs signUpInputs"
                                        placeholder="Enter Password">
                                    <!-- <button type="button" class="btn eye"><i class="fa-solid fa-eye-slash"></i></button> -->
                                </div>
                                <div class="col-12 my-3">
                                    <label for="cPassword">Retype Password :</label>
                                    <input type="password" id="cPassword" class="inputs signUpInputs"
                                        placeholder="Retype Password">
                                    <!-- <button type="button" class="btn eye"><i class="fa-solid fa-eye-slash"></i></button> -->
                                </div>
                                <div class="col-12 my-3">
                                    <button type="submit">Submit </button>
                                </div>
                            </div>
                        </form>
                        <!-- signUpForm End -->
                    </div>

                </div>

            </div>



        </div>







    </div>

</body>

<script src="./Script/login_signUp_Validation.js"></script>
<script src="./Script/passwordToggle.js"></script>

</html>