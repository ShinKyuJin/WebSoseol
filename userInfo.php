<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style media="screen">
    table {
      text-align: center;
    }
    p {
      font-size:16px;
    }
    h1 {
      font-size: 22px;
    }
  </style>
  <body>
    <?php include "nav.php"; ?>
    <?php
    if(!isset($_SESSION['userID'])) {
      echo "<script>alert('접근 권한이없습니다.');history.go(-1);</script>";
    }
    $userID = $_SESSION['userID'];
     ?>
    <div class="container">
      <?php
      $sql = mysqli_fetch_array(mq("SELECT * FROM USERPROFILE WHERE userID='$userID'"));
       ?>
       <h1>아이디</h1> <p><?php echo $sql['userID']; ?></p>
       <h1>이메일</h1><p><?php echo $sql['userEmail']; ?></p>
       <h1>이름</h1><p><?php echo $sql['userName']; ?></p>
       <h1>생일</h1><p><?php echo $sql['userBirth']; ?></p>
       <h1>학번</h1><p><?php echo $sql['userStudentID']; ?></p>
       <h1>학과</h1><p><?php echo $sql['userMajor']; ?></p>
      <table class="table">
        <h1>내가 올린 글</h1>
        <thead>
          <th>제목</th>
        </thead>
        <tbody>
          <?php
          $sql = mq("SELECT * FROM BOARD WHERE boardWriter='$userID'");
          while($row = mysqli_fetch_array($sql)) :
            $boardTitle = $row['boardTitle'];
            if(strlen($boardTitle) > 28) {
              $boardTitle = iconv_substr($boardTitle,0,28)."...";
            }
           ?>
           <tr>
             <td><a href="board.php?ci=<?php echo $row['categoryIdx']; ?>&bi=<?php echo $row['boardIdx']; ?>"><?php echo $boardTitle; ?></td>
           </tr>
         <?php endwhile; ?>
      </table>
      <table class="table">
        <h1>댓글 단 글</h1>
        <thead>
          <thead>
            <th>글 제목</th>
            <th>댓글</th>
          </thead>
        </thead>
        <tbody>
          <?php
          $sql = mq("SELECT * FROM COMMENT_BOARD WHERE commentWriter='$userID'");
          while($row = mysqli_fetch_array($sql)) :
            $boardIdx = $row['boardIdx'];
            $sql2 = mysqli_fetch_array(mq("SELECT * FROM BOARD WHERE boardIdx='$boardIdx'"));
            $boardTitle = $sql2['boardTitle'];
            if(strlen($boardTitle) > 28) {
              $boardTitle = iconv_substr($sql2['boardTitle'],0,28)."...";
            }
            $commentContent = $row['commentContent'];
            if(strlen($commentContent) > 28) {
              $commentContent = iconv_substr($commentContent,0,28)."...";
            }
           ?>
           <tr>
             <td><a href="board.php?ci=<?php echo $sql2['categoryIdx']; ?>&bi=<?php echo $row['boardIdx']; ?>"><?php echo $boardTitle; ?></a></td>
             <td><?php echo $commentContent; ?></td>
           </tr>
         <?php endwhile; ?>
        </tbody>
      </table>
      <table class="table">
        <h1>추천한 글</h1>
        <thead>
          제목
        </thead>
        <tbody>
          <?php
          $sql = mq("SELECT * FROM RECOMMEND WHERE reID='$userID'");
          while($row = mysqli_fetch_array($sql)) :
            $boardTitle = $row['boardTitle'];
            if(strlen($boardTitle) > 28) {
              $boardTitle = iconv_substr($boardTitle,0,28)."...";
            }
           ?>
           <tr>
             <td><a href="board.php?ci=<?php  ?>&bi=<?php echo $row['boardIdx']; ?>"><?php echo $boardTitle; ?></td>
           </tr>
         <?php endwhile; ?>
        </tbody>
      </table>
    </div>
    <?php include "footer.php"; ?>
  </body>
</html>
