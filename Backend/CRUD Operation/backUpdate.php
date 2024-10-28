<?php

session_start();
$user_Id = $_SESSION['userId'];

require '../Components_Functions/connection.php';
require '../Components_Functions/headerFunction.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['updateId'];
    $topic = $_POST['updateItem'];
    $expenses = $_POST['updateItemExpense'];

    // echo "$id   $topic $expenses"  ;

    $sqlQuery = " UPDATE `todonotes` SET `topic`='$topic',`expenses`='$expenses' , `updateTime`=current_timestamp()  WHERE `notesID` =  '$id' AND `user_Id`= '$user_Id'";
    $queryExecution = mysqli_query($connection, $sqlQuery);


    $location = '../../index.php';

    if ($queryExecution) {
        $msg = "Data Updated Successfully";
        $icon = "<i class='fa-solid fa-check'></i>";
        headerFunction($location, $msg, $icon);
    } else {
        $msg = "There was a problem in Updation ..Please try Again .";
        $icon = "<i class='fa-solid fa-xmark'></i>";
        headerFunction($location, $msg, $icon);
    }
} else {
    header("location:../../index.php");
}















?>