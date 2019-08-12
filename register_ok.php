<?php
  include "db.php";

  $userID = $_POST['userID'];
  $userPassword = $_POST['userPassword'];
  $userEmail = $_POST['userEmail'];
  $userBirth = $_POST['userBirth'];
  $userName = $_POST['userName'];
  $userMajor = $_POST['userMajor'];
  $userStudentID = $_POST['userStudentID'];

  $hashPassword = password_hash($userPassword,PASSWORD_DEFAULT);

  $stmt = mq("INSERT INTO USERPROFILE(userID,userPassword,userEmail,userBirth,userName,userMajor,userStudentID) VALUES(
    '$userID',
    '$hashPassword',
    '$userEmail',
    '$userBirth',
    '$userName',
    '$userMajor',
    '$userStudentID'
  )");

  if($stmt) {
    session_start();
    $_SESSION['userID'] = $userID;
    echo "<script>alert('회원가입 성공');location.replace('index.php');</script>";
  }
  else {
    echo "<script>alert('회원가입 실패');history.go(-1);</script>";
  }

 ?>
