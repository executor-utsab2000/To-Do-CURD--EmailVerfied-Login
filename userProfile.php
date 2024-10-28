<?php
require './Backend/Components_Functions/user_Auth_Check.php';
require './Backend/Components_Functions/connection.php';
// require './Components/popUpMsgBackend.php';
// require './Components/popUpMsgFrontend.php';
require './SQL.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>To Do List</title>

  <?php require './Components/CDN_Links.php' ?>

  <link rel="stylesheet" href="./style/profile.css" />
</head>

<body>
  <div class="container-fluid userprofile">
    <div class="contentContainer">
      <div class="row">
        <div class="col-12 d-flex justify-content-center">
          <div class="imageContainer">
            <img src="<?php echo $profilePic ?>" alt="" />
          </div>
        </div>

        <div class="col-12 mb-2 userName"><?php echo $name ?></div>
        <div class="col-12 mb-2 gender"><?php echo $genderIcon ?></div>
        <div class="col-12 my-2">
          <div class="highestExpense">
            <div class="title">Highest Expense :</div>
            <table class="mt-2 text-center">
              <tr>
                <th><?php echo ucwords($highestExpItem) ?></th>
                <td class="text-danger"><?php echo number_format($highestExpAmount) ?></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="col-12 my-2">
          <div class="mostExpense">
            <div class="title">Most Expense :</div>
            <table class="mt-2 text-center">
              <tr>
                <th class="text-capitalize"><?php echo $mostExpItem ?></th>
                <td class="text-danger text-center"><?php echo $mostExpAmount ?></td>
                <td class="text-danger text-capitalize"><?php echo number_format($totalTimesExpense) ?> times</td>
              </tr>
            </table>
          </div>
        </div>

        <div class="col-12 my-2 deleteAll">
          <a href="./Backend/CRUD Operation/deleteAllRecord.php" class="nav-link">
            <button class="btn">
              <i class="fa-solid fa-trash-can me-2"></i>
              <span>Delete All Records</span>
            </button>
          </a>
        </div>

        <div class="col-12 mt-4">
          <div class="row">
            <div class="col-sm-6 d-flex justify-content-center">
              <a href="index.php" class="nav-link">
                <button class="btn">Back to Home</button>
              </a>
            </div>
            <div class="col-sm-6 d-flex justify-content-center">
              <a href="./Backend/logout.php" class="nav-link">
                <button class="btn">Log Out</button>
              </a>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
</body>

</html>