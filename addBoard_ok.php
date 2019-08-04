<?php
  include "db.php";

  $categoryIdx = re('categoryIdx','post');
  $boardTitle = re('boardTitle','post');
  $boardWriter = re('boardWriter','post');
  $boardContent = re('boardContent','post');
  $boardFile = re('boardFile','post');
  $boardDate = date('Y-m-d H:i:s');

  $sql = "INSERT INTO BOARD(
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
  )";
  $link = 'boardIdx.php?bi='.$categoryIdx;
  if($stmt = mq($sql)) {
    header("Location:$link");
  }
  else {
    echo mysqli_error($con);
  }
 ?>
