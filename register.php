<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
    <link rel="stylesheet" href="registerStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css?after" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>
  <body>
    <?php include "nav.php"; ?>

    <form action="register_ok.php" method="post">
      <div class="mySlides fade">
        <div class="form-popup" id="myForm">
         <div class="form-container">
           <label for="register">회원가입</label><br>
           <label for="userName">이름</label><br>
           <input type="text" placeholder="이름을 입력하세요." name="userName" required>
         </div>
       </div>
       <div class="w3-container">
         <div class="w3-light-grey">
           <div class="w3-dark-gray" id="progressbar1"></div>
         </div>
       </div>
     </div>

     <div class="mySlides fade">
       <div class="form-popup" id="myForm">
       <div class="form-container">
         <label for="register">회원가입</label><br>
         <label for="userBirth">생년월일</label><br>
         <input type="date" name="userBirth">
       </div>
       </div>
       <div class="w3-container">
         <div class="w3-light-grey">
           <div class="w3-dark-gray" id="progressbar2"></div>
         </div>
       </div>
     </div>

     <div class="mySlides fade">
       <div class="form-popup" id="myForm">
       <div class="form-container">
         <label for="register">회원가입</label><br>
         <label for="userID">ID</label><br>
         <input type="text" placeholder="ID를 입력하세요." maxlength="15" name="userID" class = "userID"required>
       </div>
       </div>

       <div class="w3-container">
         <div class="w3-light-grey">
           <div class="w3-dark-gray" id="progressbar3"></div>
         </div>
       </div>
     </div>

      <div class="mySlides fade">
        <div class="form-popup" id="myForm">
        <div class="form-container" onsubmit="return retry()">
          <label for="register">회원가입</label><br>
          <label for="userPassword1">비밀번호</label><br>
          <input type="password" placeholder="비밀번호를 입력하세요." id="userPassword1" name="userPassword1" required><br>
          <label for="userPassword2">비밀번호 확인</label><br>
          <input type="password" placeholder="비밀번호를 다시 입력하세요." name="userPassword2" required>
        </div>
        </div>
        <div class="w3-container">
          <div class="w3-light-grey">
            <div class="w3-dark-gray" id="progressbar4"></div>
          </div>
        </div>
        <div class="userPasswordComment"></div>
      </div>

      <div class="mySlides fade">
        <div class="form-popup" id="myForm">
        <div class="form-container">
          <label for="register">회원가입</label><br>
          <label for="userEmail">이메일</label><br>
          <input type="email" placeholder="이메일을 입력하세요." name="userEmail">
        </div>
        </div>
        <div class="w3-container">
          <div class="w3-light-grey">
            <div class="w3-dark-gray" id="progressbar5"></div>
          </div>
        </div>
        <div class="userEmailComment"></div>
      </div>

      <div class="mySlides fade">
        <div class="form-popup" id="myForm">
        <div class="form-container">
          <label for="register">회원가입</label><br>
          <label for="userMajor">학과</label><br>
          <select name="userMajor" class = "userMajor">
            <option value="false">학과를 선택하세요.</option>
            <option value="소프트웨어학과">소프트웨어학과</option>
            <option value="컴퓨터공학과">컴퓨터공학과</option>
            <option value="정보보호학과">정보보호학과</option>
            <option value="데이터사이언스학과">데이터사이언스학과</option>
            <option value="지능기전공학부">지능기전공학부</option>
            <option value="창의소프트학부">창의소프트학부</option>
            <option value="디지털콘텐츠학과">디지털콘텐츠학과</option>
          </select>
        </div>
         </div>
         <div class="w3-container">
           <div class="w3-light-grey">
             <div class="w3-dark-gray" id="progressbar6"></div>
           </div>
         </div>
         <div class="userMajorComment"></div>
       </div>

       <div class="mySlides fade">
         <div class="form-popup" id="myForm">
         <div action="/action_page.php" class="form-container">
           <label for="register">회원가입</label><br>
           <label for="userStudentID">학번</label><br>
           <input type="text" placeholder="학번을 입력하세요." name="userStudentID" required><br>
           <input type="submit" value="제출" onclick="location.href='http://localhost/web_sua/registerfinish.html'">
         </div>
         </div>
         <div class="w3-container">
           <div class="w3-light-grey">
             <div class="w3-dark-gray" id="progressbar7"></div>
           </div>
         </div>
       </div>
      <input type="hidden" name="userNamechk" class = "userNamechk" value="">
      <input type="hidden" name="userIDchk" class = "userIDchk" value="">
      <input type="hidden" name="userPasswordchk" class="userPasswordchk"value="">
      <input type="hidden" name="userEmailchk" class = "userEamilchk" value="">
      <input type="hidden" name="userMajorchk" class="userMajorchk" value="">
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </form>

    <script>

    </script>

    <?php include "footer.php"; ?>
  </body>
  <script type="text/javascript" src="register5.js">
  </script>
</html>
