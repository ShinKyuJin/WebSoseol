<?php
  session_start();
  include "db.php";
  $con = mysqli_connect('miminishin.cafe24.com','miminishin','s7731731','miminishin');
  $userID = mysqli_real_escape_string($con,$_POST['userID']);
  $userPassword = mysqli_real_escape_string($con,$_POST['userPassword']);

  $row = mysqli_fetch_array(mq("SELECT userID,userPassword FROM USERPROFILE WHERE userID='$userID'"));

  if($row['userID'] == $userID && password_verify($userPassword,$row['userPassword'])) {
    $_SESSION['userID'] = $userID;
    echo json_encode(array('res'=>'suc'));
  }
  else {
    echo json_encode(array('res'=>'fail'));
  }
 ?>
