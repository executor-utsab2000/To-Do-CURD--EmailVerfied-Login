<?php

session_start();


var_dump($_SESSION);
var_dump($_POST);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require '../Components_Functions/connection.php';
    require '../Components_Functions/headerFunction.php';

    $user_Id = $_SESSION['user_Id'];
    $newPassword = $_POST['password'];

    $newHashPass = password_hash($newPassword, PASSWORD_DEFAULT);

    $passwordUpdateSql = "UPDATE `users` SET `password`='$newHashPass' WHERE `user_Id`= '$user_Id' ;";
    $queryExec = mysqli_query($connection, $passwordUpdateSql);

    if ($queryExec) {
        headerFunction(
            '../../signUp_Login.php',
            'Password Reset Successful. Get back and Login again with new Password',
            '<i class="fa-solid fa-check"></i>'
        );
    }

}













?>