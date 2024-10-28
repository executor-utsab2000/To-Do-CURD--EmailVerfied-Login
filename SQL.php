<?php

// $user_Id = $_SESSION['userId'];
// top user Data 

$userData = "SELECT * FROM `users` WHERE `user_Id`='$user_Id';";
$queryExec = mysqli_query($connection, $userData);

$data = mysqli_fetch_assoc($queryExec);
// var_dump($data);
$name = $data['name'];
$profilePic = $data['profilePic'];
$gender = $data['gender'];

if ($gender == 'male') {
    $genderIcon = '<i class="fa-solid fa-venus text-danger"></i>';
} elseif ($gender == 'female') {
    $genderIcon = '<i class="fa-solid fa-mars text-info"></i>';
}



// ---------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------

// highest exp data
$highestExpQuery = "SELECT `topic`, `expenses` FROM `todonotes` WHERE `user_Id` = '$user_Id' ORDER BY `expenses`DESC   ;";
$highestExpQueryExecution = mysqli_query($connection, $highestExpQuery);

$highestExpQueryData = mysqli_fetch_assoc($highestExpQueryExecution);
// var_dump($highestExpQueryData);

if ($highestExpQueryData === NULL) {
    $highestExpItem = '---';
    $highestExpAmount = '0';
} else {
    $highestExpItem = $highestExpQueryData['topic'];
    $highestExpAmount = $highestExpQueryData['expenses'];

}



// ---------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------



$mostExpense = "SELECT topic , sum(expenses) , count(topic) as `maxTimesItemSpentOn`  from todonotes  WHERE `user_Id` = '$user_Id' group by `topic` order by(`maxTimesItemSpentOn`) desc ;";
$mostExpenseQueryExec = mysqli_query($connection, $mostExpense);

$mostExpQueryData = mysqli_fetch_assoc($mostExpenseQueryExec);
// var_dump($mostExpQueryData);
if ($mostExpQueryData === NULL) {
    $mostExpItem = '---';
    $mostExpAmount = '0';
    $totalTimesExpense = '0';
} else {
    $mostExpItem = $mostExpQueryData['topic'];
    $mostExpAmount = $mostExpQueryData['sum(expenses)'];
    $totalTimesExpense = $mostExpQueryData['maxTimesItemSpentOn'];
}
















?>