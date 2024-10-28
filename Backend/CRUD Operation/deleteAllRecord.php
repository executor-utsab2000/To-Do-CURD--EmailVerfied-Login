<?php


session_start();

require '../Components_Functions/connection.php';
require '../Components_Functions/headerFunction.php';

$user_Id = $_SESSION['userId'];

$deleteAllQuery = "DELETE FROM `todonotes` WHERE `user_Id` = '$user_Id' ;";
$deleteAllExec = mysqli_query($connection, $deleteAllQuery);
if ($deleteAllExec) {
    $location = "../../index.php";
    $msg = "Your All Expenses are deleted Successfully";
    $icon = '<i class="fa-solid fa-check"></i>';
    headerFunction($location, $msg, $icon);
}



















?>