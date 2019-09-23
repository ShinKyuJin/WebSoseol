<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>게시판</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="boardIdx.css">
    <link href="https://fonts.googleapis.com/css?family=Jua&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <?php include "nav.php"; ?>
    <?php
      $categoryIdx = re('ci','get');
      $boardSubject = mysqli_fetch_array(mq("SELECT * FROM LISTOFBOARD WHERE categoryIdx='$categoryIdx'"));
      $stmt = mq("SELECT * FROM BOARD WHERE categoryIdx='$categoryIdx' ORDER BY boardIdx desc");
     ?>
    <div class="container">
      <div class="bulletinboard"><img src="ai.jpg" style="repeat: none; width: 103%; height: 400px; opacity: 0.7"></div>
      <div class="text">게시판</div>
      <div class="tab_menu">
        <ul style="height: auto;">
          <?php
          $link = mq("SELECT * FROM LISTOFBOARD WHERE categoryIdx!=4");
          while($linkRow = mysqli_fetch_array($link)) : ?>
          <li ><a href="boardIdx.php?ci=<?php echo $linkRow['categoryIdx']; ?>"
            <?php
            if($linkRow['categoryIdx'] == $_GET['ci']) echo "style='background-color:#990e17;color:white;'";

             ?>><?php echo $linkRow['boardSubject']; ?></a></li>
          <?php endwhile; ?>
        </ul>
      </div>
      <div class="board_area">
        <div class="search">
          <form action="boardIdxSearch.php" method="get">
            <input type="text" class="input" placeholder="검색어를 입력해주세요." name="search" onkeyup="searchEnterKey()" autofocus >
            <button class="btn_search" type="submit"></button>
          </form>
        </div>
      </div>

      <div class="main">
        <table class="table" style="text-align:center;">
          <?php echo $boardSubject['boardSubject']; ?>
          <thead>
            <th>제목</th>
            <th>작성자</th>
            <th>날짜</th>
            <th>조회수</th>
          </thead>
          <?php
            while($row = mysqli_fetch_array($stmt)) :
              $boardIdx = $row['boardIdx'];
              $commentCnt = mq("SELECT * FROM COMMENT_BOARD WHERE boardIdx='$boardIdx'");
              $link = "board.php?bi=".$row['boardIdx']."&ci=".$categoryIdx;
              $boardDate = substr($row['boardDate'],0,10) == date('Y-m-d') ? substr($row['boardDate'],10,8) : substr($row['boardDate'],0,10);
           ?>
           <tr>
             <td><a href="<?php echo $link; ?>" title="<?php echo $row['boardTitle']; ?>"><?php echo $row['boardTitle']; ?></a>[<?php echo $commentCnt->num_rows; ?>]</td>
             <td><?php echo $row['boardWriter']; ?></td>
             <td><?php echo substr($row['boardDate'],2,8); ?></td>
             <td><?php echo $row['boardHit']; ?></td>
           </tr>
         <?php endwhile; ?>
        </table>
        <?php
        if(isset($_SESSION['userID'])) :
         ?>
        <div class="submit" style="margin-bottom:15px;"><a href="addBoard.php?ci=<?php echo $categoryIdx; ?>">글쓰기</a></div>
      <?php endif; ?>
      </div>
    </div>
  <?php include "footer.php"; ?>
  </body>
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
  </html>
