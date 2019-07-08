<?php
  $subBtn = $_POST['subBtn'];
  if(!isset($subBtn)) {
    echo "<script>alert('잘못된 접근입니다.');</script>";
  }

  $con = mysqli_connect('miminishin.cafe24.com','miminishin','s7731731','miminishin');

  $boardSubject = mysqli_real_escape_string($con,$_POST['boardSubject']);
  $boardType = $_POST['boardType'];

  $sql = "INSERT INTO LISTOFBOARD(categoryIdx,boardSubject,boardType) VALUES('','$boardSubject','$boardType')";

  $stmt = mysqli_query($con,$sql);
  if($stmt) {
    echo "<script>alert('게시판 만들기 성공');</script>";
  }
  else {
    echo "<script>alert('게시판 만들기 실패');</script>";
  }
 ?>
