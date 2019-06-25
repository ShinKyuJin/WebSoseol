<?php
  $con = mysqli_connect('miminishin.cafe24.com','miminishin','s7731731','miminishin');
  $userID = $_POST['userID'];
  $userPassword = $_POST['userPassword'];
  $sql = "SELECT * FROM USER WHERE userID = '$userID' ";
  $result = mysqli_query($con,$sql);

  $row = mysqli_fetch_array($result);

  if($userID == $row[0] && $userPassword == $row[1]) {
    echo '<script>alert("로그인 성공");location.replace("index.html");</script>';
  }
  else {
    echo '<script>alert("아이디나 비밀번호가 일치하지 않습니다.");location.replace("SignIn.html");</script>';
  }
 ?>
