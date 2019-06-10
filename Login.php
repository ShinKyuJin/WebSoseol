<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="/css/Login.css">
  </head>
  <body>
    <form class="LoginForm" action="index.html" method="post">
            <input type="text" name="userID" placeholder="ID">
            <input type="password" name="userPassword" placeholder="Password">
            <button type="submit" name="button" onclick="login">Login</button>
    </form>
    <a href="./Register.php">회원가입</a>
  </body>
  <script type="text/javascript">
    function login() {
      <?php
      $con = mysqli_connect('miminishin.cafe24.com','miminishin','s7731731','miminishin');
      $userID = $_POST['userID'];
      $userPassword = $_POST['userPassword'];

      $result = $mysqli->query($check);
      if($check->num_rows==1) {

      }
       ?>
    }
  </script>
</html>
