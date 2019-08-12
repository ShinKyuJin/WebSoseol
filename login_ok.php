<?php
  session_start();
  include "db.php";
  $userID = $_POST['userID'];
  $userPassword = $_POST['userPassword'];

  $row = mysqli_fetch_array(mq("SELECT * FROM USERPROFILE WHERE userID='$userID'"));

  if($row['userID'] == $userID && password_verify($userPassword,$row['userPassword'])) {
    $_SESSION['userID'] = $userID;
    header("Location:index.php");
  }
  else {
    echo "<script>alert('아이디나 비밀번호가 일치하지 않습니다.');history.go(-1);</script>";
  }
 ?>
