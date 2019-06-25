<?php
  $con = mysqli_connect('miminishin.cafe24.com','miminishin','s7731731','miminishin');
  $userID = $_POST['userID'];
  $userPassword = $_POST['userPassword'];
  $userName = $_POST['userName'];
  $encrypted_password = password_hash($userPassword, PASSWORD_DEFAULT);
  $sql = "INSERT INTO USER(userID,userPassword,userName) VALUES('$userID','$encrypted_password','$userName')";
  $result = mysqli_query($con,$sql);
  if($result) {
    echo '<script>alert("Success");location.replace("SignIn.html");</script>';
  }
  else {
    echo '<script>alert("Fail");</script>';
  }
?>
