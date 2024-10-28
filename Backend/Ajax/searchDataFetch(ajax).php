<?php


require '../Components_Functions/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputValue = $_POST['value'];
    // echo $inputValue;


    $query = "SELECT * FROM `todonotes` WHERE `topic` LIKE '%$inputValue%' ";
    $queryExec = mysqli_query($connection, $query);
    // echo mysqli_num_rows($queryExec);

    $slNo = 1;
    while ($eachRowData = mysqli_fetch_assoc($queryExec)) { // this line runs till the table has data each time it returns one row 
        // storing responses individually
        $id = $eachRowData['notesID'];
        $topic = $eachRowData['topic'];
        $expenses = $eachRowData['expenses'];

        $initialDtTime = ($eachRowData['initialDtTime']);
        $updateDtTime = ($eachRowData['updateTime']);

        echo "
                    <div class='col-12 tableData'>
                    <form id='updateFetchForm' action='backUpdate.php' method='post' autocomplete='off'>
                    <div class='row' >
                    <div class='col-4 text-center'>$slNo</div>
                    <input type='hidden' name='updateId' value='$id' >
                    <div class='col-4 text-center' > <input type='text' name='updateItem' class='editInput expenseItem' id='expenseItem' value='$topic' readonly required></div>
                    <div class='col-4 text-center' > <input type='text' name='updateItemExpense' class='editInput' id='expenseAmount' value='$expenses' readonly required></div>
    
                    <!--button start  -->
                     <div class='col-12  mt-3 pe-lg-5  d-flex  justify-content-lg-end justify-content-center '>
                     <button class='btn btn-warning px-4 py-1 me-3 btnUpdate' id='editBtn'>Update</button>
                    </form>
                    <button type='button' class='deleteBtn btn btn-danger px-4 py-1' data-bs-toggle='modal' data-bs-target='#deleteModal' onClick='deleteConfirmModal($id , \"$topic\")'>Delete</button>
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
            </div>";
        $slNo++;
    }
}















?>