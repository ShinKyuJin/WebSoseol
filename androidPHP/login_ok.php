<?php
  include "../db.php";
  $userID = $_POST['userID'];
  $userPassword = $_POST['userPassword'];
  $stmt = mq("SELECT * FROM USERPROFILE WHERE userID='$userID'");
  if($stmt) {
    $row = mysqli_fetch_array($stmt);
    if($row['userID'] == $userID && password_verify($userPassword,$row['userPassword'])) {
      echo json_encode(array("stmt"=>"correct"));
    }
    else {
      echo json_encode(array("stmt"=>"incorrect"));
    }
  }
  else if($stmt->num_rows == 1) {
    echo json_encode(array("stmt"=>"error"));
  }
  else {
    echo json_encode(array("stmt"=>"fail"));
  }
 ?>
