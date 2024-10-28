<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // var_dump($_POST);
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    require './Components_Functions/connection.php';
    require './Components_Functions/headerFunction.php';

    $fetchDataQuery = "SELECT * FROM `users` WHERE email_id = '$email' ;";
    $fetchDataQueryExce = mysqli_query($connection, $fetchDataQuery);
    $userData = mysqli_fetch_assoc($fetchDataQueryExce);

    $ifDataPresent = mysqli_num_rows($fetchDataQueryExce);

    if ($ifDataPresent === 1) {
        $userDbPassword = $userData['password'];

        $ifpasswordMatch = password_verify($password, $userDbPassword);

        if ($ifpasswordMatch) {

            $userId = $userData['user_Id'];
            $userName = $userData['name'];

            session_start();
            $_SESSION['userName'] = $userName;
            $_SESSION['userId'] = $userId;
            headerFunction(
                "../index.php",
                "You have logged in SuccessFully",
                '<i class="fa-solid fa-check"></i>'
            );
        } else {
            headerFunction(
                "../signUp_Login.php",
                'Password Incorrect',
                '<i class="fa-solid fa-x"></i>'
            );
        }


    } else {
        headerFunction(
            "../signUp_Login.php",
            'User does not Exists',
            '<i class="fa-solid fa-triangle-exclamation"></i>'
        );
    }


} else {
    header("location:../signUp_Login.php");
}




?>