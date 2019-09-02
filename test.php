<?php
  include "db.php";
  include "passwordEncryption.php";

  $userID = $_POST['userID'];
  $userPassword = $_POST['userPassword'];

  $sql = mysqli_fetch_array(mq("SELECT * FROM USERPROFILE WHERE userID='$userID'"));

  if($sql['userID'] == $userID && $sql['userPassword'] == $userPassword) {
    echo "suc";
  }
  else {
    echo "fail";
  }
 ?>
