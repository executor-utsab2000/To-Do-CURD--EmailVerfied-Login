<?php

session_start();
$user_Id = $_SESSION['userId'];

require '../Components_Functions/connection.php';
require '../Components_Functions/headerFunction.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $deleteID = $_POST['deleteID'];


    $sqlQuery = "DELETE FROM `todonotes` WHERE `notesID` = '$deleteID' AND `user_Id`='$user_Id'";
    $queryExecution = mysqli_query($connection, $sqlQuery);

    $location = '../../index.php';

    if ($queryExecution) {
        $msg = "Data Deleted Successfully";
        $icon = "<i class='fa-solid fa-check'></i>";
        headerFunction($location, $msg, $icon);
    } else {
        $msg = "There was a problem in Delete ..Please try Again .";
        $icon = "<i class='fa-solid fa-xmark'></i>";
        headerFunction($location, $msg, $icon);
    }
} else {
    header("location:../../index.php");
}














?>