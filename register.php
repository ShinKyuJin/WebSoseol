<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
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
    <div class="wrap-loading display-none">
      <div><img src="loading.gif" /></div>
    </div>
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

          <div class="slide s1 ">
            <div class="form-container">
              <label for="register">회원가입</label><br>
              <label for="userName">이름</label><br>
              <input type="text"id="user_1" placeholder="이름을 입력하세요." name="userName" autofocus>
              <div class="userNamechk"></div>
            </div>
          </div>

          <div class="slide ">
            <div class="form-container">
              <label for="register">회원가입</label><br>
              <label for="userBirth">생년월일</label><br>
              <select name="userBirth_1" class="userBirth">
                <?php for($i=1990;$i<=2001;$i++) : ?>
                 <option value="<?php echo $i; ?>"><?php echo $i; ?>년</option> <?php endfor; ?>
              </select>
              <select name="userBirth_2" class="userBirth">
                <?php for($i=1;$i<=12;$i++) : ?>
                 <option value="<?php echo $i; ?>"><?php echo $i; ?>월</option> <?php endfor; ?>
              </select>
              <select name="userBirth_3" class="userBirth">
                <?php for($i=1;$i<=31;$i++) : ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?>일</option> <?php endfor; ?>
              </select>
            </div>
          </div>

          <div class="slide ">
            <div class="form-container">
              <label for="register">회원가입</label><br>
              <label for="userID">ID</label><br>
              <input type="text"id="user_3" placeholder="ID를 입력하세요." maxlength="15" name="userID" required>
              <div class="userIDchk"></div>
            </div>
          </div>

          <div class="slide ">
            <div class="form-container">
              <label for="register">회원가입</label><br>
              <label for="userPassword1">비밀번호</label><br>
              <input type="password" placeholder="비밀번호를 입력하세요." id="user_4_1" name="userPassword1" required><br>
              <label for="userPassword2">비밀번호 확인</label><br>
              <input type="password" placeholder="비밀번호를 다시 입력하세요."id="user_4_2" name="userPassword2" required>
              <div class="userPasswordchk"></div>
            </div>
          </div>

          <div class="slide ">
            <div class="form-container">
              <label for="register">회원가입</label><br>
              <label for="userEmail">이메일</label><br>
              <input type="email"id="user_5" placeholder="이메일을 입력하세요." name="userEmail">
              <div class="userEmailchk"></div>
            </div>
          </div>

          <div class="slide ">
            <div class="form-container">
              <label for="register">회원가입</label><br>
              <label for="userMajor">학과</label><br>
              <select name="userMajor"id="user_6" class = "userMajor">
                <option value="">학과를 선택하세요.</option>
                <option value="소프트웨어학과">소프트웨어학과</option>
                <option value="컴퓨터공학과">컴퓨터공학과</option>
                <option value="정보보호학과">정보보호학과</option>
                <option value="데이터사이언스학과">데이터사이언스학과</option>
                <option value="지능기전공학부">지능기전공학부</option>
                <option value="창의소프트학부">창의소프트학부</option>
                <option value="디지털콘텐츠학과">디지털콘텐츠학과</option>
              </select>
              <div class="userMajorchk"></div>
            </div>
          </div>

          <div class="slide ">
            <div class="form-container">
              <label for="register">회원가입</label><br>
              <label for="userStudentID">학번</label><br>
              <input type="text"id="user_7" placeholder="학번을 입력하세요." name="userStudentID" required><br>
              <div class="userStudentIDchk"></div>
              <input type="submit" value="제출">
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
          <a class="prev">&#10094;</a>
          <a class="next">&#10095;</a>
        </div>
      </form>
         <?php include "footer.php"; ?>
       </body>
       <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
       <script type="text/javascript" src="register.js"></script>
       </html>
