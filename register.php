<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
    <style media="screen">
      body {
        text-align: center;
      }
    </style>
  </head>
  <body>
    <?php include "nav.php"; ?>

    <form action="register_ok.php" method="post">
      <h3>이름</h3>
      <input type="text" name="userName" value="" class="userName">
      <h3>태어난 날짜</h3>
      <input type="date" name="userBirth" value="" class="userBirth">
      <h3>아이디</h3>
      <input type="text" name="userID" class="userID"><br>
      <div class="userIDComment"></div>
      <h3>비밀번호</h3>
      <input type="password" name="userPassword" class="userPassword"><br>
      <h3>비밀번호 확인</h3>
      <input type="password" name="userPassword2" class="userPassword2"><br>
      <div class="userPasswordComment"></div>
      <h3>이메일</h3>
      <input type="text" name="userEmail" class = "userEmail">
      <div class="userEmailComment"></div>
      <h3>학과</h3>
      <select name="userMajor" class = "userMajor">
        <option value="false">학과를 선택하세요.</option>
        <option value="s1">소프트웨어학과</option>
        <option value="s2">컴퓨터공학과</option>
        <option value="s3">정보보호학과</option>
        <option value="s4">데이터사이언스학과</option>
        <option value="s5">지능기전공학부</option>
        <option value="s6">창의소프트학부</option>
        <option value="s7">디지털콘텐츠학과</option>
      </select>
      <div class="userMajorComment"></div>
      <h3>학번</h3>
      <input type="text" name="userStudentID" value="">
      <h3>제출!</h3>
      <input type="submit" value="확인">
      <input type="hidden" name="userNamechk" class = "userNamechk" value="">
      <input type="hidden" name="userIDchk" class = "userIDchk" value="">
      <input type="hidden" name="userPasswordchk" class="userPasswordchk"value="">
      <input type="hidden" name="userEmailchk" class = "userEamilchk" value="">
      <input type="hidden" name="userMajorchk" class="userMajorchk" value="">
    </form>

    <?php include "footer.php"; ?>
  </body>
  <script type="text/javascript" src="register3.js">
  </script>
</html>
