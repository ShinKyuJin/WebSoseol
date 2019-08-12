<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    body {
      text-align: center;
    }
      input {
        border:none;
        border-bottom: 1px solid black;
      }
      .loginBtn {
        border:1px solid red;
        width:100px;
        text-align: center;
        cursor: pointer;
      }
      .loginBtn:hover {
        background-color: green;
      }
    </style>
    <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
  </head>
  <body>
    <?php include "nav.php"; ?>
    <form class="" action="login_ok.php" method="post">
      <i class="fa fa-user" aria-hidden="true"></i><input type="text" name="userID" value="" class="userID"><br>
      <i class="fa fa-lock" aria-hidden="true"></i><input type="password" name="userPassword" value="" class="userPassword">
      <div class="loginComment"></div>
      <input type="submit">
    </form>
    <?php include "footer.php"; ?>
  </body>
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
</html>
