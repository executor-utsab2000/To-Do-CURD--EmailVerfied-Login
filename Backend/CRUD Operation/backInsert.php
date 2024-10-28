<?php

session_start();
// echo $_SESSION['userId'] ;
require '../Components_Functions/connection.php';
require '../Components_Functions/headerFunction.php';


$user_Id = $_SESSION['userId'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $itemName = $_POST['itemName'];
    $itemExpense = $_POST['itemExpense'];

    $location = '../../index.php';

    if ($itemName == '' && $itemExpense == '') {
        $msg = 'Fill all the Fields';
        $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
        headerFunction($location, $msg, $icon);
    } else {

        $count = "SELECT * FROM `todonotes` WHERE `user_Id`='$user_Id'";
        $countNumber = mysqli_num_rows(mysqli_query($connection, $count));
        // echo $countNumber;

        if ($countNumber <= 30) {
            $notesId = uniqid('notes-');

            $sql = "INSERT INTO `todonotes`(`notesID`, `user_Id`, `topic`, `expenses`) 
                    VALUES 
                    ('$notesId','$user_Id','$itemName','$itemExpense')";

            $queryExec = mysqli_query($connection, $sql);

            if ($queryExec) {
                $msg = 'Data inserted successfully';
                $icon = '<i class="fa-solid fa-check"></i>';
                headerFunction($location, $msg, $icon);
            } else {
                $msg = 'There Might be some Error ... Please Try Again';
                $icon = '<i class="fa-solid fa-xmark"></i>';
                headerFunction($location, $msg, $icon);
            }
        } elseif ($countNumber > 30) {
            $msg = 'Maximum Limit Reached ... Max Limit 30';
            $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
            headerFunction($location, $msg, $icon);
        }
    }
} else {
    header("location:../../index.php");
}




































?>