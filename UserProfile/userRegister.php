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

  $chk = sprintf("SELECT * FROM USERPROFILE WHERE userID = '%s'",$userID);

  $result = mysqli_query($con,$chk);
  $row = mysqli_fetch_array($result);

  if($row[0] == $userID) {
    echo "<script>alert('아이디 중복임');location.replace('userRegister.html');</script>";
  }
  $password_encryption = password_hash($userPassword,PASSWORD_DEFAULT);
  echo "<script>alert('".$password_encryption."');</script>";
  $sql = sprintf("INSERT INTO USERPROFILE(userID,userPassword,userEmail,userName,userBirth) VALUES('%s','%s','%s','%s','%s')",$userID,$password_encryption,$userEmail,$userName,$userBirth);

  $stmt = mysqli_query($con,$sql);
  session_start();
  if($stmt) {
    $_SESSION['userEmail'] = $userEmail;
    echo "<script>alert('회원가입 성공');location.replace('userLogin.html');</script>";
  }
  else {
    echo "<script>alert('회원가입 실패');history.go(-1);</script>";
  }
 ?>
