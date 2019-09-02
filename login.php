<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
    <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css?after" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <?php include "nav.php"; ?>
    <div class="login">
    <form id="loginform">
      <div class="loginletter">로그인</div>
      <div class="userID" style="font-size: 13px;">
        <i class="fas fa-user icon" style="font-size:24px; color: rgb(160,160,160);"></i>
        <input type="text" class="userID inputHere" id="userID" placeholder="아이디">
      </div>
      <div class="userPassword" style="font-size: 13px; margin-top: 25px;">
        <i class="fas fa-lock icon" style="font-size:24px; color: rgb(160,160,160);"></i>
        <input type="password" class="userPassword inputHere" id="userPassword"placeholder="비밀번호">
      </div>
      <div class="loginComment"></div>
    </form>
    <div class="loginBtn">로그인</div>
  </div>
    <?php include "footer.php"; ?>
  </body>
  <script src="login.js" charset="utf-8"></script>
  </html>
