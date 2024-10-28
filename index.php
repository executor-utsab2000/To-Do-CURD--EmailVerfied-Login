<?php
require './Backend/Components_Functions/user_Auth_Check.php';
require './Backend/Components_Functions/connection.php';
require './Components/popUpMsgBackend.php';
require './Components/popUpMsgFrontend.php';
require './SQL.php';

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Do List </title>

    <?php include './Components/CDN_Links.php' ?>

    <link rel="stylesheet" href="./Style/style.css">
    <link rel="stylesheet" href="./Style/Navbar.css">
    <!-- <script src="script.js"></script> -->
</head>

<body>

    <div class="container-fluid">

        <!-- delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content deleteModalStyle">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Topic</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modalTopic">Are you sure you want to Delete ?<span
                            id='deleteTopic'></span></div>
                    <div class="modal-footer">
                        <form action="./Backend/CRUD Operation/backDelete.php" method="post">
                            <input type="hidden" id="input" name="deleteID">
                            <button type="submit" class="btn btn-primary">Yes</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- -------------------------------------------------------------------------------------------------------------------------------- -->



        <!-- header -->
        <div class="row">
            <div class="col-12 px-1 px-md-3 px-lg-5 header py-3  ">
                <div class="titleLogo">
                    <img src="Images/logo.png" alt="" class="img-fluid">
                    <span>𝗧𝗼𝗗𝗼 𝗟𝗶𝘀𝘁</span>
                </div>

                <div class="userLogo">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <div class="" data-bs-toggle="dropdown" aria-expanded="false">
                                <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="<?php echo $name ?>">
                                    <img src="<?php echo $profilePic ?>" class="img-fluid" alt="">
                                </button>
                            </div>
                            <ul class="dropdown-menu dropdown-menu mt-2">
                                <li><a class="dropdown-item" href="./userProfile.php">
                                        <i class="fa-solid fa-user me-2"></i>Profile</a>
                                </li>
                                <li><a class="dropdown-item text-danger" href="./Backend/logout.php">
                                        <i class="fa-solid fa-right-from-bracket me-2"></i>Log Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>



            </div>
            <!-- ---------------------------------------------------------------------------- -->

            <!-- form input -->
            <div class="col-12  mt-5">
                <div class="row container mt-5 mt-lg-0 mx-auto">
                    <!-- <form action="#" method="post" onsubmit="return submitHandler()"> -->
                    <form action="./Backend/CRUD Operation/backInsert.php" method="post" id="inputExpenseDetailsForm">
                        <div class="col-5 mx-auto formContent">
                            <p class="formHeader">Enter Your Items</p>
                            <div class="row">
                                <div class="col-md-6 my-1">
                                    <input class="inputExpenseDetails" type="text" id="itemName" name="itemName"
                                        placeholder="Enter Item Name">
                                </div>
                                <div class="col-md-6 my-1">
                                    <input class="inputExpenseDetails" type="text" id="itemExpense" name="itemExpense"
                                        placeholder="Enter Item Expense">
                                </div>
                                <div class="col-12 my-2">
                                    <input type="submit" value="Submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <div class="col-4 mt-4 mb-3 d-flex justify-content-center mx-auto">
                        <input class="form-control me-2" type="search" placeholder="Search your Items"
                            aria-label="Search" id='searchFormInput'>
                    </div>
                </div>
            </div>



            <!-- fetch and print -->

            <div class="row">
                <div class="col-12 d-flex justify-content-lg-end justify-content-center my-2 pe-lg-5 ">
                    <span class="expenseDisplay" id="expenseDisplay">
                        <?php
                        // sum print                        
                        
                        $queryAdd = " SELECT SUM(`expenses`) as `SUMRESULT` FROM `todonotes` WHERE `user_Id` = '$user_Id';";

                        $res = mysqli_query($connection, $queryAdd);
                        // var_dump($res);
                        
                        $result = mysqli_fetch_assoc($res);
                        $addRes = $result["SUMRESULT"];

                        if ($addRes == 0) {
                            echo '0';
                        } else {
                            echo $addRes;
                        }



                        ?>
                    </span>
                </div>
            </div>

            <div class="col-12 mt-5 w-75 mx-auto">
                <div class="row">


                    <div class="col-12 tableHeader">
                        <div class="row">
                            <div class="col-4 text-center ">Sl No.</div>
                            <div class="col-4 text-center ">Item </div>
                            <div class="col-4 text-center ">Expenses</div>
                        </div>
                    </div>

                    <div id="content">
                        <?php


                        $user_Id = $_SESSION['userId'];

                        $sqlQuery = "SELECT * FROM `todonotes` WHERE `user_Id`= '$user_Id';";
                        $queryExecution = mysqli_query($connection, $sqlQuery);

                        // if the no of rows returned is greater than 0 thn it will work 
                        if (mysqli_num_rows($queryExecution) > 0) {
                            $slNo = 1;
                            while ($eachRowData = mysqli_fetch_assoc($queryExecution)) { // this line runs till the table has data each time it returns one row 
                        
                                // storing responses individually
                                $id = $eachRowData['notesID'];
                                $topic = $eachRowData['topic'];
                                $expenses = $eachRowData['expenses'];

                                $initialDtTime = ($eachRowData['initialDtTime']);
                                $updateDtTime = ($eachRowData['updateTime']);

                                echo "
                            <div class='col-12 tableData'>
                            <form id='updateFetchForm' action='./Backend/CRUD Operation/backUpdate.php' method='post' autocomplete='off'>
                            <div class='row' >
                            <div class='col-4 text-center'>$slNo</div>
                            <input type='hidden' name='updateId' value='$id' >
                            <div class='col-4 text-center' > <input type='text' name='updateItem' class='editInput expenseItem' id='expenseItem' value='$topic' readonly required></div>
                            <div class='col-4 text-center' > <input type='text' name='updateItemExpense' class='editInput' id='expenseAmount' value='$expenses' readonly required></div>

                            <!--button start  -->
                            <div class='col-12  mt-3 pe-lg-5  d-flex  justify-content-lg-end justify-content-center '>
                            <button class='btn btn-warning px-4 py-1 me-3 btnUpdate' id='editBtn'>Update</button>
                            </form>
                            <button type='button' class='deleteBtn btn btn-danger px-4 py-1' data-bs-toggle='modal' data-bs-target='#deleteModal' onClick='deleteConfirmModal(\"$id\" , \"$topic\")'>Delete</button>
                            </div> 
                            <!-- button end -->

                            <!-- date time start -->
                            <div class='col-8  mt-3 pe-lg-5'>
                                <div class='row'>
                                    <div class='col-6 text-center'>
                                    <span class='dtTimelabel'>Initial Time : <span class='dtTimetxt'> $initialDtTime</span></span>
                                    </div>
                                    <div class='col-6 text-center'>
                                <span class='dtTimelabel'>Latest Updated Time : <span class='dtTimetxt'> $updateDtTime </span>  </span>
                                    </div>
                                </div>
                            </div>
                            <!-- date time end -->

                        </div> 
                    </div>
                    ";
                                $slNo++;
                            }
                        } else {
                            echo
                                "
                                    <div class='alert alert-primary text-center' role='alert ' >
                                    <span style='font-weight: 750;'>
                                    <p>No Data Entered till yet.</p>
                                    <p>Enter Some Data</p>
                                    </span>
                                    </div>
                                ";
                        }



                        ?>
                    </div>

                </div>
            </div>


        </div>





    </div>














</body>

<script src="./Script/updateHandler.js"></script>
<script src="./Script/ajax_Script.js"></script>
<script src="./Script/inputExpenseDetailsForm_Validation.js"></script>

</html>