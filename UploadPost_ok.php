<?php
  session_start();
  $con = mysqli_connect('miminishin.cafe24.com','miminishin','s7731731','miminishin');
  $Title = $_POST['Title'];
  $Comment = $_POST['Comment'];
  $today = date("Y-m-d H:i:s");
  if(!isset($_SESSION['userID']))
    echo "<script>alert('세션이 만료되었습니다.');location.replace('UserProfile/userLogin.html');</script>";

    if(!isset($Title) || !isset($Comment)) {
      echo "<script>alert('제목이나 내용이 비었습니다.');location.replace('UploadPost.php');</script>";
    }
    $sql = sprintf("INSERT INTO NOTICEBOARD(Writer,Title,Comment,TDate) VALUES('%s','%s','%s','%s')",$_SESSION['userID'],$Title,$Comment,$today);
    $result = mysqli_query($con,$sql);

    if($result){
      echo "<script>alert('성공');</script>";
    }
    else {
      echo "<script>alert('실패');</script";
    }
 ?>
