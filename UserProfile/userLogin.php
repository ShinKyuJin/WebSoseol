<?php
  $con = mysqli_connect('miminishin.cafe24.com','miminishin','s7731731','miminishin');
  $userID = $_POST['userID'];
  $userPassword = $_POST['userPassword'];
  $sql = "SELECT * FROM USERPROFILE WHERE userID = '$userID' ";
  $result = mysqli_query($con,$sql);

  $row = mysqli_fetch_array($result);

  session_start();
  if($userID == $row[0] && password_verify($userPassword,$row[1])) {
    if (isset($_POST['userID'])) {
      $_SESSION['last_login_timestamp'] = time();
      $_SESSION['userID'] = $userID;

      $_SESSION['EmailSession'] = 'hello';

      $subject = "Test Email from KyuJin";
      $msg = "<a href='localhost/test.php'>Click here Session</a>";

      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      $headers .= 'From: <webmaster@example.com>' . "\r\n";
      $headers .= 'Cc: myboss@example.com' . "\r\n";

      mail($_SESSION['userEmail'],$subject,$msg,$headers);

      echo '<script>alert("로그인 성공");location.replace("../index.php");</script>';
    }
  }
  else {
    echo '<script>alert("아이디나 비밀번호가 일치하지 않습니다.");location.replace("userLogin.html");</script>';
  }
 ?>
