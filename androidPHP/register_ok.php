<?php
  include "../db.php";

  $userID = $_POST['userID'];
  $userPassword = $_POST['userPassword'];
  $userEmail = $_POST['userEmail'];
  $userBirth = $_POST['userBirth'];
  $userName = $_POST['userName'];
  $userMajor = $_POST['userMajor'];
  $userStudentID = $_POST['userStudentID'];
  $androidLogin = $_POST['androidLogin'];
  $deviceID = $_POST['deviceID'];

  $hashPassword = password_hash($userPassword,PASSWORD_DEFAULT);

  $chk = mq("SELECT * FROM USERPROFILE WHERE userID='$userID'");
  $chk2 = mq("SELECT * FROM USERPROFILE WHERE userStudentID='$userStudentID'");
  $chk3 = mq("SELECT * FROM USERPROFILE WHERE userEmail='$userEmail'");

  if($chk->num_rows >= 1) {
    echo json_encode(array("stmt"=>"existID"));
  }
  else if($chk2->num_rows >= 1) {
    echo json_encode(array("stmt"=>"existStudentID"));
  }
  else if($chk3->num_rows >= 1) {
    echo json_encode(array("stmt"=>"existEmail"));
  }
  else {
    $stmt = mq("INSERT INTO USERPROFILE(
      userID,
      userPassword,
      userEmail,
      userBirth,
      userName,
      userMajor,
      userStudentID,
      androidLogin,
      deviceID)
       VALUES(
      '$userID',
      '$hashPassword',
      '$userEmail',
      '$userBirth',
      '$userName',
      '$userMajor',
      '$userStudentID',
      '$androidLogin',
      '$deviceID'
    )");
    if($stmt) {
      echo json_encode(array("stmt"=>"suc"));
    }
    else {
      echo json_encode(array("stmt"=>"fail"));
    }
  }
 ?>
