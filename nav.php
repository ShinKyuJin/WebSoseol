<?php session_start(); ?>
<link rel="stylesheet" href="navStyle.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css?after" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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
        <li><a href="boardIdx.php?ci=1">게시판</a></li>
        <li><a href="#">학생회소개</a></li>
        <li><a href="#">공모전</a></li>
        <li><a href="#">소융대사회봉사</a></li>
      </ul>
    </div>
  </div>
</div>
