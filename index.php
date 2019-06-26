<?php
  session_start(); // 세션 시작
  if(!isset($_SESSION['userID'])) { // userID 세션이 비어있으면 로그인 페이지로 이동
      echo "<script>location.replace('UserProfile/userLogin.html');</script>";
  }
  $userID = $_SESSION['userID']; // 세션 초기화
  $ip_address = $_SERVER['REMOTE_ADDR'];
  $now_date = date("Y-m-d H:i:s");
  $sql = "INSERT INTO USERACCESS(userID,userIP,nowDate) VALUES('$userID','$ip_address','$now_date')";
  $con = mysqli_connect('miminishin.cafe24.com','miminishin','s7731731','miminishin');
  $statement = mysqli_query($con,$sql);
  if($statement){
    echo '<script>alert("'.$userID.' '.$ip_address.' : '.$now_date.'");</script>';
  }
  else {
    echo "fail";
  }
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     hello!<br>

     <a href="UserProfile/userLogout.php">Logout</a>
   </body>
 </html>
