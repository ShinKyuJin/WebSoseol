<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
    <link rel="stylesheet" href="registerStyle.css?ver=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css?after" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
    @import url(http://fonts.googleapis.com/earlyaccess/jejugothic.css);
    .form-container label[for="register"]{
      font-size: 35px;
      font-family: 'Jeju Gothic';
      position: relative;
      top: 15px;
      font-weight: thin bold;
    }
    </style>
  </head>
  <body>
    <?php include "nav.php"; ?>
    <form action="register_ok.php" method="post">
      <div class="slidershow middle">
        <div class="slides">
          <input type="radio" name="r" id="r1" checked>
          <input type="radio" name="r" id="r2">
          <input type="radio" name="r" id="r3">
          <input type="radio" name="r" id="r4">
          <input type="radio" name="r" id="r5">
          <input type="radio" name="r" id="r6">
          <input type="radio" name="r" id="r7">

          <div class="slide s1 fade">
            <div class="form-container">
              <label for="register">회원가입</label><br>
              <label for="userName">이름</label><br>
              <input type="text"id="username" placeholder="이름을 입력하세요." name="userName">
            </div>
          </div>

          <div class="slide fade">
            <div class="form-container">
              <label for="register">회원가입</label><br>
              <label for="userBirth">생년월일</label><br>
              <input type="date"id="birth" name="userBirth">
            </div>
          </div>

          <div class="slide fade">
            <div class="form-container">
              <label for="register">회원가입</label><br>
              <label for="userID">ID</label><br>
              <input type="text"id="id" placeholder="ID를 입력하세요." maxlength="15" name="userID" required>
            </div>
          </div>

          <div class="slide fade">
            <div class="form-container" onsubmit="return retry()">
              <label for="register">회원가입</label><br>
              <label for="userPassword1">비밀번호</label><br>
              <input type="password" placeholder="비밀번호를 입력하세요." id="userPassword1" name="userPassword1" required><br>
              <label for="userPassword2">비밀번호 확인</label><br>
              <input type="password" placeholder="비밀번호를 다시 입력하세요."id="userPassword2" name="userPassword2" required>
            </div>
          </div>

          <div class="slide fade">
            <div class="form-container">
              <label for="register">회원가입</label><br>
              <label for="userEmail">이메일</label><br>
              <input type="email"id="email" placeholder="이메일을 입력하세요." name="userEmail">
            </div>
          </div>

          <div class="slide fade">
            <div class="form-container">
              <label for="register">회원가입</label><br>
              <label for="userMajor">학과</label><br>
              <select name="userMajor"id="userMajor" class = "userMajor">
                <option value="false">학과를 선택하세요.</option>
                <option value="s1">소프트웨어학과</option>
                <option value="s2">컴퓨터공학과</option>
                <option value="s3">정보보호학과</option>
                <option value="s4">데이터사이언스학과</option>
                <option value="s5">지능기전공학부</option>
                <option value="s6">창의소프트학부</option>
                <option value="s7">디지털콘텐츠학과</option>
              </select>
            </div>
          </div>

          <div class="slide fade">
            <div class="form-container">
              <label for="register">회원가입</label><br>
              <label for="userStudentID">학번</label><br>
              <input type="text"id="userStudentID" placeholder="학번을 입력하세요." name="userStudentID" required><br>
              <input type="submit" value="제출" onclick="location.href='http://localhost/web_sua/registerfinish.html'">
            </div>
          </div>
        </div>
          <div class="navigation">
            <label class="bar"></label>
            <label class="bar"></label>
            <label class="bar"></label>
            <label class="bar"></label>
            <label class="bar"></label>
            <label class="bar"></label>
            <label class="bar"></label>
          </div>
          <a class="prev" onclick="myFunction1()">&#10094;</a>
          <a class="next" onclick="myFunction2()">&#10095;</a>
        </div>
      </form>
        <script>
         var slideIndex = 1;
         showSlides(slideIndex);

         function plusSlides(n) {
           showSlides(slideIndex += n);
         }

         function currentSlide(n) {
           showSlides(slideIndex = n);
         }

         function showSlides(n) {
           var i;
           var slides = document.getElementsByClassName("slide");
           var bars = document.getElementsByClassName("bar");
           if (n > slides.length) {slideIndex = 1}
           if (n < 1) {slideIndex = slides.length}
           for (i = 0; i < slides.length; i++) {
               slides[i].style.display = "none";
           }
           slides[slideIndex-1].style.display = "block";
           bars[slideIndex-1].className += " active";
         }
         </script>
         <?php include "footer.php"; ?>
       </body>
       <script type="text/javascript" src="register.js"></script>
       </html>
