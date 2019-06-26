<?php
  $userID = $_POST['userID'];
  $userPassword = $_POST['userPassword'];
  $userPassword2 = $_POST['userPassword2'];
  $userEmail = $_POST['userEmail'];
  $userName = $_POST['userName'];
  $userBirth = $_POST['userBirth'];

  if($userPassword != $userPassword2) {
    echo "<script>alert('비밀번호가 일치하지 않습니다.');location.replace('userRegister.html');";
  }

  $check = "SELECT * FROM USERPROFILE WHERE userID = '$userID'";
  if($check) {
    echo "<script>alert('중복된 아이디입니다.');location.replace('userRegister.html');</script>";
  }

  $encrypted_password = password_hash($userPassword, PASSWORD_DEFAULT);
  $sql = "INSERT INTO USERPROFILE(userID,userPassword,userEmail,userName,userBirth) VALUES('$userID','$encrypted_password','$userEmail','$userName','$userBirth')";
  $con = mysqli_connect('miminishin.cafe24.com','miminishin','s7731731','miminishin');
  $result = mysqli_query($con,$sql);
  if($result) {
    session_start();
    $_SESSION['userID'] = $userID;
    echo '<script>alert("Success");location.replace("../index.php");</script>';
  }
  else {
    echo '<script>alert("Fail");</script>';
  }
?>
