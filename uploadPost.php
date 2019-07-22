<?php
  session_start();



  include "db.php";
  $_SESSION['userID'] = 'vv';
  $categoryIdx = $_GET['categoryIdx'];
  $stmt = mq("SELECT userID FROM USERPROFILE WHERE userID='$userID'");
  $result = mysqli_fetch_array($stmt);
  echo $_SESSION['userID'];
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      input {
        padding:10px;
      }
    </style>
  </head>
  <body>
    <form action="uploadPostWithFile.php" method="post">
      <input type="text" name="boardTitle">
      <br>
      <textarea name="boardContent" rows="8" cols="80"></textarea>
      <br>
      <input type="hidden" name="boardWriter" value="<?php echo $result[0]; ?>">
      <br>
      <input type="hidden" name="categoryIdx" value="<?php echo $categoryIdx ?>">
      <br>
      <input type="file" name="boardFile">
      <br>
      <input type="submit">
    </form>
  </body>
</html>
