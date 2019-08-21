<?php
  session_start();
  include "db.php";
  $userID = $_POST['userID'];
  $userPassword = $_POST['userPassword'];

  $row = mysqli_fetch_array(mq("SELECT * FROM USERPROFILE WHERE userID='$userID'"));

  $_SESSION['userID'] = "miminishin";
  echo json_encode(array("res"=>"suc"));
  /*if($row['userID'] == $userID && password_verify($userPassword,$row['userPassword'])) {
    $_SESSION['userID'] = "miminishin";
    echo json_encode(array("res"=>"suc"));
  }
  else {
    echo json_encode(array("res"=>"fail"));
  }*/
 ?>
