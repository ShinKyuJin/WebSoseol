<!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     hello!<br>
     <div id = "server_time">
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
        echo '<script>alert("잘못된 접근!");';
        echo '<script>location.replace("userLogin.html");</script>';
      }
      date_default_timezone_set('Asia/Seoul');
      echo date("Y-m-d H:i:s");

      if(isset($_SESSION['userID']))
      {
        if((time() - $_SESSION['last_login_timestamp']) > 15)
        {
          session_destroy();
          echo '<script>alert("세션 타임 오버!");';
          header("location:UserProfile/userLogin.html");
        }
        else
        {
          $_SESSION['last_login_timestamp'] = time();
        }
      }
      else
      {
        header("location:logout.php");
      }

      // end code
    ?>

  </div>
    <a href="UserProfile/userLogout.php">Logout</a>
  </body>
 </html>