<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      .navBar {
        height:100px;
        background-color: #f0f0f0;
        }
    </style>
  </head>
  <body>
    <div class="navBar">
      <?php
      if(!isset($_SESSION['userID'])) {
        echo "<a href='login.php'>로그인</a>";
        echo "<a href='register.php'>회원가입</a>";
      }
      else {
        echo "<a href='logout.php'>로그아웃</a>";
      }
       ?>
    </div>
  </body>
</html>
