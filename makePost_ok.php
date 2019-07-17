<?php
  include "db.php";
  $boardSubject = $_GET['boardSubject'];
  $categoryIdx = $_GET['categoryIdx'];
  $boardTitle = $_POST['boardTitle'];
  $boardContent = $_POST['boardContent'];
  $boardWriter = $_POST['userID'];

  $sql1 = "SELECT categoryIdx FROM LISTOFBOARD";

  $categoryIdx = mq($sql1);
  $datetime = date("Y-m-d h:i:s");

  $sql =
  $stmt = mq("INSERT INTO BOARD(categoryIdx,boardTitle,boardWriter,boardContent,boardHit,boardDate) VALUES($categoryIdx','$boardTitle','$boardWriter','$boardContent',0,$datetime)");
  if($stmt) {
    echo "success";
  }
  else {
    echo "fail";
  }
 ?>
