<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="navStyle.css">
  </head>
  <body>
    <div class="TOP">
       <?php
       if(!isset($_SESSION['userID'])) {
         echo "<a href='register.php' style='text-decoration: none; color: white; float: right; margin-top: 7px; margin-right: 7px;' >회원가입</a>";
         echo "<a href='login.php'style='text-decoration: none; color: white; float: right; margin-top: 7px; margin-right: 15px;'>로그인</a>";
       }
       else {
         echo "<div class='userName'>".$_SESSION['userID']."</div>";
         echo "<a href='logout.php'>로그아웃</a>";
       }
       ?>
     </div>
    <div class="navBox">
      <div class="navShadow">
        <div class="navLogo">
          <img src="logo.png">
        </div>
        <div class="navMenu">
          <ul>
            <li><a href="boardList.php">게시판</a></li>
            <li><a href="#">학생회소개</a></li>
            <li><a href="#">공모전</a></li>
            <li><a href="#">소융대사회봉사</a></li>
          </ul>
        </div>
      </div>
    </div>
  </body>
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
  <script type="text/javascript">
    var divBox = $('.navLogo');
    divBox.click(function() {
      location.href = "index.php";
    });
  </script>
</html>
