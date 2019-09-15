<?php
  include "db.php";

  $userName = mysqli_real_escape_string($con,$_POST['userName']);
  $userBirth = mysqli_real_escape_string($con,$_POST['userBirth'];
  $userID = mysqli_real_escape_string($con,$_POST['userID']);
  $userPassword = mysqli_real_escape_string($con,$_POST['userPassword'];
  $userMajor = mysqli_real_escape_string($con,$_POST['userMajor'];
  $userStudentID = mysqli_real_escape_string($con,$_POST['userStudentID'];

  $hashPassword = password_hash($userPassword,PASSWORD_DEFAULT);

  $stmt = mq("INSERT INTO USERPROFILE(userName,userBirth,userID,userPassword,userMajor,userStudentID) VALUES(
    '$userName',
    '$userBirth',
    '$userID',
    '$hashPassword',
    '$userMajor',
    '$userStudentID'
  )");

  if($stmt) {
    echo "<script>alert('회원가입 성공');location.href('index.php');</script>";
  }
  else {
    echo "<script>alert('회원가입 실패');history.go(-1);</script>";
  }

 ?>
