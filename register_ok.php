<?php
  include "db.php";

  $userID = $_POST['userID'];
  $userPassword = $_POST['userPassword'];
  $userEmail = $_POST['userEmail'];
  $userBirth_1 = $_POST['userBirth_1'];
  $userBirth_2 = $_POST['userBirth_2'];
  $userBirth_3 = $_POST['userBirth_3'];
  $userName = $_POST['userName'];
  $userMajor = $_POST['userMajor'];
  $userStudentID = $_POST['userStudentID'];

  $userBirth = $userBirth_1."-".$userBirth_2."-".$userBirth_3;

  $hashPassword = password_hash($userPassword,PASSWORD_DEFAULT);

  $stmt = mq("INSERT INTO USERPROFILE(userID,userPassword,userEmail,userBirth,userName,userMajor,userStudentID) VALUES(
    '$userID',
    '$userPassword',
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
