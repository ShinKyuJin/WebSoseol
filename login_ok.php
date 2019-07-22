<?php
  session_start();
  include "db.php";
  $userID = $_POST['userID'];
  $userPassword = $_POST['userPassword'];

  $stmt = mq("SELECT * FROM USERPROFILE WHERE userID='$userID'");

  $row = mysqli_fetch_array($stmt);

  echo $row['userID'].' '.$userID.' '.$row['userPassword'].' '.$userPassword;

  if($row['userID'] == $userID && password_verify($userPassword,$row['userPassword'])) {
    echo "suc";
    $_SESSION['userID'] = $userID;
  }
  else {
    echo "fail";
  }

 ?>
