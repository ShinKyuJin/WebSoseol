<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <?php include "nav.php"; ?>
    <div class="container">
      <div class="loginForm">
        <div class="loginBox">
          <div class="inputBox">
            <input type="text" class="login userID" placeholder="아이디" autofocus><br>
            <input type="password" class="login userPassword" placeholder="비밀번호"><br>
            <div class="loginResult">
            </div>
            <button type="button" class="button">로그인</button>

          </div>
        </div>
      </div>
    </div>


    <?php include "footer.php"; ?>
  </body>
  <script src="login.js" charset="utf-8"></script>
</html>
