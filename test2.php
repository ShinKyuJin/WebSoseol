<?php
  include "db.php";

  $categoryIdx = 1;
  $boardTitle = "그냥그냥그냥";
  $boardWriter = "123";
  $boardContent = $_POST['boardContent'];
  $boardDate = date('Y-m-d H:i:s');

  $boardFile = $_FILES['boardFile']['name'];
  $tmpFile = $_FILES['boardFile']['tmp_name'];
  $filePath = "./uploads";
  if(move_uploaded_file($tmpFile,$filePath)) {
    echo "<img src='$boardFile'>";
  }else {
    echo "실패";
  }

  $stmt = mq("INSERT INTO BOARD(
    categoryIdx,
    boardTitle,
    boardWriter,
    boardContent,
    boardFile,
    boardDate
  ) VALUES(
    '$categoryIdx',
    '$boardTitle',
    '$boardWriter',
    '$boardContent',
    '$boardFile',
    '$boardDate'
  )");

  if($stmt) {
    echo "성공";
    }
  else {
    echo "fail";
  }

 ?>
