<?php


require '../Components_Functions/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputValue = $_POST['inputValue'];
    // echo $inputValue;


    $query = "SELECT SUM(expenses) as 'totalExpense' FROM `todonotes` WHERE `topic` LIKE '%$inputValue%' ";
    $queryExec = mysqli_query($connection, $query);
    // echo mysqli_num_rows($queryExec);
    $totalExpense = mysqli_fetch_assoc($queryExec)['totalExpense'];
    echo $totalExpense;
}















?>