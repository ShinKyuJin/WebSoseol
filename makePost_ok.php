<?php
  include "db.php";
  $boardSubject = $_GET['boardSubject'];
  $boardTitle = $_POST['boardTitle'];
  $boardContent = $_POST['boardContent'];

  $sql1 = "SELECT categoryIdx FROM LISTOFBOARD";
  $sql2 = "SELECT userID FROM USERPROFILE";

  $categoryIdx = mysqli_query($con,$sql1);
  $boardWriter = mysqli_query($con,$sql2);

  $sql = "INSERT INTO BOARD(boardIdx,categoryIdx,boardTitle,boardWriter,boardContent) VALUES('','$categoryIdx','$boardTitle','$boardWriter','$boardContent')";

  $stmt = mysqli_query($con,$sql);
  if($stmt) {
    echo "success";
  }
  else {
    echo "fail";
  }
 ?>
