<?php
  include "db.php";

  $userID = $_POST['userID1'];
  $userPassword = $_POST['userPassword1'];

  $row = mysqli_fetch_array(mq("SELECT * FROM USERPROFILE WHERE userID='$userID'"));

  /*if($row['userID'] == $userID && password_verify($userPassword,$row['userPassword'])) {
    $_SESSION['userID'] = "miminishin";
    echo json_encode(array("res"=>"suc"));
  }
  else {
    echo json_encode(array("res"=>"fail"));
  }*/
  if($row['userID'] == $userID && password_verify($userPassword,$row['userPassword'])) {
    session_start();
    $_SESSION['userID'] = $userID;
    echo json_encode(array("res"=>"suc"));
  }
  else {
    echo json_encode(array("res"=>"$userID"));
  }
 ?>
