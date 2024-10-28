<?php
session_start();
// var_dump($_SESSION);

if (
    !isset($_SESSION['userName']) &&
    !isset($_SESSION['userId'])
    // !isset($_SESSION['userActive']) && 
    // $_SESSION['userActive'] == true
) {
    header("location:./signUp_Login.php");
}


// array(2) { 
//     ["userName"]=> string(12) "utsab sarkar" 
//     ["userId"]=> string(18) "uniq-66451819b2929" }

$user_Id  = $_SESSION['userId'] ;

?>