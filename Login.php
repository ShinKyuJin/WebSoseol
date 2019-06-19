<?php
  $con = mysqli_connect('miminishin.cafe24.com','miminishin','s7731731','miminishin');
  $userID = $_POST['userID'];
  $userPassword = $_POST['userPassword'];
  $sql = "SELECT * FROM USER WHERE userID = '$userID'";
  $result = mysqli_query($con,$sql);


 ?>
