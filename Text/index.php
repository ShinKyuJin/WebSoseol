<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">

    html,body {
  height:100%;
}
body {
  margin:0;
  background-color:#f1f1f1;
  overflow-x:hidden;
}
.navBox {
  height:100px;
  width:100%;
}
.navShadow{
  background-color:none;
  height:100px;
  width:1200px;
  margin:0 auto;
}
.navLogo {
  float:left;
  width:100px;
  height:100px;
  background-color:orange;

}
.navMenu {
  float:left;
  margin-left:100px;
  width:800px;
  height:100px;
  background-color:blue;
  }
  .navIcon {
    float:left;
    margin-left:100px;
    width:100px;
    height:100px;
    background-color:green;

  }
      ul{
        list-style-type: none;
        margin: 0;
        padding: 0;
        height: 100px;
      }
      li{
        display: inline;
      }
      li a{
        float:left;
        vertical-align: center;
        text-align: center;
        display: block;
        width:200px;
        height: 100px;
      }
      .bbb {
        background-color:#dddddd;
        width:500px;
        float:left;
        margin-left: 50px;
        margin-top: 50px;
box-shadow: 3px 3px 3px 3px #999;
      }
      .loginbox {
        float:left;
        width:200px;
        height:200px;
        background-color: red;
      }
      .etc1Box {
        float:left;
        width:1100px;
        height:600px;
      }
      form {
        margin-top:30px;
        margin-right:50px;
      }
      input {
        float:right;
      }
      .loginBtn {
        height:44px;
      }
      .Registration {
        text-decoration: none;
        float:right;
        margin-right:100px;
        border : 1px solid red;
        background-color: #00ff00;
      }
      </style>
  </head>
  <body>
    <div class="navBox">
      <?php
      include "navBox.php";
       ?>
    </div>
      <div class="etc1Box">
        <?php
        include "boardBox.php";
        ?>
     </div>

    <div class="loginBox">
      <?php
      echo '
      <form action="" method="post">
        <div>
        <input type="submit" value="로그인" class="loginBtn">
        </div>
        <div>
        <input type="text" placeholder="ID">
        </div>
        <div>
        <input type="password" placeholder="Password">
        </div>
      </form>
      <a href="register.php" class = "Registration">회원가입</a>
      ';
       ?>
    </div>

    <div class="etc2Box">
      <?php
       ?>
    </div>


  </body>
</html>
