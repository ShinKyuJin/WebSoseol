<?php
  include "../db.php";

  $userID = $_POST['userID'];
  $userPassword = $_POST['userPassword'];
  $userEmail = $_POST['userEmail'];
  $userBirth = $_POST['userBirth'];
  $userName = $_POST['userName'];
  $userMajor = $_POST['userMajor'];
  $userStudentID = $_POST['userStudentID'];
  $deviceID = $_POST['deviceID'];

  $hashPassword = password_hash($userPassword,PASSWORD_DEFAULT);

  $stmt = mq("INSERT INTO USERPROFILE(
    userID,
    userPassword,
    userEmail,
    userBirth,
    userName,
    userMajor,
    userStudentID,
    deviceID)
     VALUES(
    '$userID',
    '$hashPassword',
    '$userEmail',
    '$userBirth',
    '$userName',
    '$userMajor',
    '$userStudentID',
    '$deviceID'
  )");

  if($stmt) {
    echo json_encode(array("stmt"=>"suc"));
  }
  else {
    echo json_encode(array("stmt"=>"fail"));
  }

 ?>
