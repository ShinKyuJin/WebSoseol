<?php
  session_start();
  if(!isset($_SESSION['userID'])) {
      echo "<script>location.replace('UserProfile/userLogin.html');</script>";
  }
  $userID = $_SESSION['userID'];
  $userName = $_SESSION['userName'];
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     hello!<br>
     <a href="UserProfile/userLogout.php">Logout</a>
   </body>
 </html>
