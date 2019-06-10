<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post">
      <input type="text" name="userID" placeholder="ID">
      <input type="password" name="userPassword" placeholder="Password">
      <input type="text" name="userName" placeholder="Name">
      <input type="submit" value="submit">
      <?php
        $con = mysqli_connect('miminishin.cafe24.com','miminishin','s7731731','miminishin');

        $userID = $_POST['userID'];
        $userPassword = $_POST['userPassword'];
        $userName = $_POST['userName'];
        $sql = "INSERT INTO USER(userID,userPassword,userName) VALUES('$userID','$userPassword','$userName')";
        $result = mysqli_query($con,$sql);
        
       ?>
    </form>
  </body>
</html>
