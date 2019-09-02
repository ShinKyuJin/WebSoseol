<?php
session_start();
include "db.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <link rel="stylesheet" href="board.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>

  <body>
    <?php include "nav.php"; ?>
    <div class="container">

      <?php
      $boardIdx = re('bi','get');
      $categoryIdx = re('ci','get');
      $board = mysqli_fetch_array(mq("SELECT * FROM BOARD WHERE boardIdx = $boardIdx"));
      $category = mysqli_fetch_array(mq("SELECT * FROM LISTOFBOARD WHERE categoryIdx='$categoryIdx'"));
       ?>
       <!-- 여기부터  javascript용 히든값!-->
      <input type="hidden" class="boardIdx" value="<?php echo $boardIdx; ?>">
      <input type="hidden" class="categoryIdx" value="<?php echo $categoryIdx; ?>">
      <input type="hidden" class="userID" value="<?php echo $_SESSION['userID']; ?>">
      <!-- 여기까지 !-->

      <!-- 여기부터  Board !-->
      <h1 class="bulletinboard"><?php echo $category['boardSubject']; ?></h1>
      <div class="tabMenu">
        <ul style="height: auto;">
          <?php
          $tmp = mq("SELECT * FROM LISTOFBOARD");
          while($tmpRow = mysqli_fetch_array($tmp)) :
          ?>
          <li><a href="boardIdx.php?ci=<?php echo $tmpRow['categoryIdx']; ?>"><?php echo $tmpRow['boardSubject']; ?></a></li>
        <?php endwhile; ?>
        </ul>
      </div>

      <div class="boardArea">
        <div class="text">
          <dl>
            <dt><?php echo $board['boardTitle'] ?></dt>
            <div class="txtInfo">
              <span class="writer">
                <span class="sort">작성자</span><?php echo $board['boardWriter']; ?>
              </span>
              <span class="date">
                <span class="sort">등록일</span><?php echo $board['boardDate']; ?>
              </span>
              <span class="view">
                <span class="sort">조회수</span><?php echo $board['boardHit']; ?>
              </span>
            </div>
            <dd>
              <div class="view_txt"><?php echo nl2br($board['boardContent']); ?></div>
            </dd>
          </dl>
        </div>
        <div class="buttonArea">
          <?php
          if($_SESSION['userID'] == $board['boardWriter']) :
           ?>
          <button type="button" class="modify" onclick="modifyClicked">
            <span>수정</span>
          </button>
          <button type="button" class="delete">
            <span>삭제</span>
          </button>
        <?php endif; ?>
          <button type="button" class="list">
            <span>목록</span>
          </button>
        </div>
    </div>
    <!-- 여기까지 !-->
    <hr>
    <!-- 여기부터 Comment관련 !-->

    <div class="commentZone">
      <!-- TextArea !-->
      <div class="commentMakeZone">
        <textarea class="commentContent"></textarea>
        <button type="button" class="commentMakeBtn">작성</button>
      </div>
      <!-- /TextArea !-->

      <!-- Comment !-->

      <?php
      $comment = mq("SELECT * FROM COMMENT_BOARD WHERE boardIdx = $boardIdx AND replySourceIdx IS NULL");
      while($commentRow = mysqli_fetch_array($comment)) :
       ?>
       <div class="commentCard">
         <div class="commentWriter"> <i class="fas fa-user"><?php echo $commentRow['commentWriter']; ?></i></div>
         <div class="commentDateTime">&nbsp&nbsp<?php echo $commentRow['commentDateTime']; ?></div>
         <div class="commentContent"><?php echo $commentRow['commentContent']; ?></div>

         <input type="hidden" class="commentIdx" value="<?php echo $commentRow['commentIdx']; ?>">

         <div class="replyMakeZone">
           <input type='text' class='replyContent' placeholder='대댓글을 입력하세요.'>
           <button type='button' class='replyMakeBtn'>작성</button>
         </div>

         <?php
         $commentIdx = $commentRow['commentIdx'];
         $reply = mq("SELECT * FROM COMMENT_BOARD WHERE replySourceIdx = $commentIdx");
         while($replyRow = mysqli_fetch_array($reply)) :
          ?>
          <div class='replyCard'>
            <div class='commentWriter'> <i class="fas fa-user"><?php echo $replyRow['commentWriter']; ?></i></div>
            <div class='commentDateTime'>&nbsp&nbsp<?php echo $replyRow['commentDateTime']; ?></div>
            <div class='commentContent'><?php echo $replyRow['commentContent']; ?></div>
          </div>
        <?php endwhile; ?>
       </div>
     <?php endwhile; ?>
      <!-- /Comment !-->
    </div>


    <!-- 여기까지 !-->

    <?php include "footer.php"; ?>
  </div>
  </body>
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
  <script type="text/javascript"src = "board.js"></script>
</html>
