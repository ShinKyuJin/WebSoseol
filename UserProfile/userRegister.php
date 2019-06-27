<?php
  $userID = $_POST['userID'];
  $userPassword = $_POST['userPassword'];
  $userPassword2 = $_POST['userPassword2'];
  $userEmail = $_POST['userEmail'];
  $userName = $_POST['userName'];
  $userBirth = $_POST['userBirth'];
  #이부분부터
  if(!isset($userID) || !isset($userPassword) || !isset($userPassword2) || !isset($userEmail) || !isset($userName) || !isset($userBirth)) {
    echo '<script>alert("빈칸을 모두 채워주세요");location.replace("userRegister.html");</script>';
  }

  if($userPassword != $userPassword2) {
    echo "<script>alert('비밀번호가 일치하지 않습니다.');location.replace('userRegister.html');";
  }
  #이부분까지 실행이안됨?ㅋㅋ
  $con = mysqli_connect('miminishin.cafe24.com','miminishin','s7731731','miminishin');

  $overlap_chk = sprintf("SELECT * FROM USERPROFILE WHERE userID = '%s'",$userID);
  $res = mysqli_query($con,$overlap_chk);
  $row = mysqli_fetch_array($res);
  if($row[0] == $userID) {
    echo "<script>alert('".$row[0]."는 이미 사용중인 아이디입니다.');history.go(-1);</script>";
  }

  $sql = sprintf("INSERT INTO USERPROFILE(userID,userPassword,userEmail,userName,userBirth) VALUES('%s','%s','%s','%s','%s')",$userID,$userPassword,$userEmail,$userName,$userBirth);
  $stmt = mysqli_query($con,$sql);

  session_start();

  if($stmt) {
    echo "<script>alert('회원 가입 성공');location.replace('userLogin.html');</script>";
  }

 ?>
