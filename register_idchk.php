<?php
  include "db.php";
  $userID = $_POST['userID1'];

  $stmt = mq("SELECT userID FROM USERPROFILE WHERE userID='$userID'");

  if($stmt->num_rows >= 1) {
    echo json_encode(array('res'=>'fail'));
  }
  else {
    echo json_encode(array('res'=>'suc'));
  }

 ?>
