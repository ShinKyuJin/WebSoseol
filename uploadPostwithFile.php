<?php
  include "db.php";

  $userID = mysqli_real_escape_string($con,$_POST['boardWriter']);
  $boardTitle = mysqli_real_escape_string($con,$_POST['boardTitle']);
  $boardContent = mysqli_real_escape_string($con,$_POST['boardContent']);
  $boardFile = mysqli_real_escape_string($con,$_POST['boardFile']);
  $boardDate = date('Y-m-d H:i:s');

  echo $_POST['boardWriter'];

  $stmt = mq("INSERT INTO BOARD(categoryIdx,boardTitle,boardWriter,boardContent,boardFile,boardDate) VALUES(
    '$categoryIdx',
    '$boardTitle',
    '$userID',
    '$boardContent',
    '$boardFile',
    '$boardDate'
  )");

    if($stmt) {
      echo "okay";
    }
    else {
      echo "no";
    }

 ?>
