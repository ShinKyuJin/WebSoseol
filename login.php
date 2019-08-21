<?php
  session_start();
 ?>
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
    <style>
    .login{
      margin-top: 100px;
      margin-left: 750px;
      width: 500px;
    }
    .loginletter{
      font-size: 30px;
      font-weight: bold;
      font-family: '고딕';
      color:black;
      text-align: center;
      position: relative;
      padding-top: 30px;
    }
    hr.line{
      width: 100%;
      border-color: black;
      border-width: thin;
    }
    #loginform{
      margin-left: 0px;
      width: 500px;
      height: 400px;
      color: black;
    }
    .userID{
      border: none;
      margin-left: 55px;
    }
    .userPassword{
      border: none;
      margin-left: 55px;
    }
    input:focus{
      outline-color: rgb(128,0,0);
    }
    .userID input[type=text]{
      width: 350px;
      height: 50px;
      margin-left: 10px;
      margin-top: 40px;
      border: 0.5px solid rgb(160,160,160);
      border-top: none;
      border-left: none;
      border-right: none;
    }
    .userPassword input[type=password]{
      width: 350px;
      height: 50px;
      margin-left: 10px;
      border: 0.5px solid rgb(160,160,160);
      border-top: none;
      border-left: none;
      border-right: none;
    }
    .loginBtn{
      margin-top: -95px;
      margin-left: 55px;
      background-color: #990e17;
      color: white;
      padding: 12px;
      font-size: 18px;
      text-align: center;
      height: 50px;
      width: 390px;
      position: absolute;
    }
    </style>
  </head>
  <body>
    <?php include "nav.php"; ?>
    <div class="login">
    <form id="loginform">
      <div class="loginletter">로그인</div>
      <div class="userID" style="font-size: 13px;">
        <i class="fas fa-user icon" style="font-size:24px; color: rgb(160,160,160);"></i>
        <input type="text" name="userID" value="" class="userID inputHere" placeholder="아이디">
      </div>
      <div class="userPassword" style="font-size: 13px; margin-top: 25px;">
        <i class="fas fa-lock icon" style="font-size:24px; color: rgb(160,160,160);"></i>
        <input type="password" name="userPassword" value="" class="userPassword inputHere" placeholder="비밀번호">
      </div>
      <div class="loginComment"></div>
    </form>
    <div class="loginBtn">로그인</div>
  </div>
    <?php include "footer.php"; ?>
  </body>
  <script src="login.js" charset="utf-8"></script>
  </html>
