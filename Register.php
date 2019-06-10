<?php
  $con = mysqli_connect('miminishin.cafe24.com','miminishin','s7731731','miminishin');
  $userID = $_POST['userID'];
  $userPassword = $_POST['userPassword'];
  $userName = $_POST['userName'];
  $sql = "INSERT INTO USER(userID,userPassword,userName) VALUES('$userID','$userPassword','$userName')";
  $result = mysqli_query($con,$sql);
  header('Location:Login.php');
?>
