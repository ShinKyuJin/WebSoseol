<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>게시판</title>
      <link rel="stylesheet" href="board.css">
      <link href="https://fonts.googleapis.com/css?family=Jua&display=swap" rel="stylesheet">
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
      <div class="bulletinboard"><?php echo $category['boardSubject']; ?></div>
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

      <div class="boardArea">
        <div class="text">
          <dl>
            <dt><?php echo $board['boardTitle'] ?></dt>
            <?php
            if($_SESSION['userID'] != $board['boardWriter']) {
              $board['boardHit']++;
              $boardHit = $board['boardHit'];
              $stmt = mq("UPDATE BOARD SET boardHit='$boardHit' WHERE boardIdx = '$boardIdx'");
            }
             ?>
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
            <dd>
              <?php
                $file = mysqli_fetch_array(mq("SELECT * FROM FILE_BOARD WHERE boardIdx = '$boardIdx'"));
                $file_dwlink = "uploadFile/".$file['saveName'];
              ?>
              <div class="file_link"><a href="<?php echo $file_dwlink; ?>"><?php echo $file['originName']; ?></a></div>
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
          <button type="button" class="thumb">
            <?php
            $recommendCnt = mq("SELECT * FROM RECOMMEND WHERE boardIdx='$boardIdx'");
            $userID = $_SESSION['userID'];
            $userRecommendChk =mysqli_fetch_array(mq("SELECT * FROM RECOMMEND WHERE reID='$userID' AND boardIdx='$boardIdx'"));
             ?>
            <span class="recommendSpan">&nbsp&nbsp&nbsp<?php echo $recommendCnt->num_rows; ?></span>
            <input type="hidden" class="isRecommend" value="<?php if($userRecommendChk) echo "1"; else echo "0"; ?>">
          </button>
        </div>
    </div>
    <!-- 여기까지 !-->
    <div class="comment"><img src="chat.png" style="width: 20px; height: 20px;">&nbsp&nbsp댓글</div>
    <hr>
    <!-- 여기부터 Comment관련 !-->

    <div class="commentZone">
      <!-- TextArea !-->
      <div class="commentMakeZone">
        <textarea class="commentContent"></textarea>
      </div>
      <div class="submit">
        <button type="button" class="commentMakeBtn">작성</button>
      </div>
      <!-- /TextArea !-->

      <!-- Comment !-->

      <?php
      $comment = mq("SELECT * FROM COMMENT_BOARD WHERE boardIdx = $boardIdx AND replySourceIdx IS NULL");
      while($commentRow = mysqli_fetch_array($comment)) :
       ?>
       <div class="commentCard">
         <div class="commentWriter"> <i class="fas fa-user"></i>&nbsp<?php echo $commentRow['commentWriter']; ?></div>
         <div class="commentDateTime">&nbsp&nbsp
           <?php
           $timeString = (strtotime(date("Y-m-d H:i:s")) - strtotime($commentRow['commentDateTime']));
              $timeString = (int)$timeString;
              if($timeString / 31536000 >= 1) {
                echo floor($timeString / 31536000)."년 전";
              }
              else if($timeString / 2592000 >= 1) {
                echo floor($timeString / 2592000)."달 전";
              }
              else if($timeString / 86400 >= 1) {
                echo floor($timeString / 86400)."일 전";
              }
              else if($timeString / 3600 >= 1) {
                echo floor($timeString / 3600)."시간 전";
              }
              else if($timeString / 60 >= 1) {
                echo floor($timeString / 60)."분 전";
              }
              else {
                echo "방금 전";
              }
          ?></div>
         <div class="recommentContent"><p><?php echo $commentRow['commentContent']; ?></p></div>

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
            <div class='reCommentZone'>
              <div class='commentWriter'> <i class="fas fa-user"></i>&nbsp<?php echo $replyRow['commentWriter']; ?></div>
              <div class='commentDateTime'>&nbsp&nbsp
                <?php
                $timeString = (strtotime(date("Y-m-d H:i:s")) - strtotime($replyRow['commentDateTime']));
              $timeString = (int)$timeString;
              if($timeString / 31536000 >= 1) {
                echo floor($timeString / 31536000)."년 전";
              }
              else if($timeString / 2592000 >= 1) {
                echo floor($timeString / 2592000)."달 전";
              }
              else if($timeString / 86400 >= 1) {
                echo floor($timeString / 86400)."일 전";
              }
              else if($timeString / 3600 >= 1) {
                echo floor($timeString / 3600)."시간 전";
              }
              else if($timeString / 60 >= 1) {
                echo floor($timeString / 60)."분 전";
              }
              else {
                echo "방금 전";
              }
                ?></div>
              <div class='recommentContent'><p><?php echo htmlspecialchars($replyRow['commentContent']) ; ?></p></div>
            </div>
          </div>
        <?php endwhile; ?>
       </div>
     <?php endwhile; ?>
      <!-- /Comment !-->
    </div>


    <!-- 여기까지 !-->
  </div>
  <?php include "footer.php"; ?>
  </body>
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
  <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
  <script type="text/javascript"src = "board.js"></script>
  <script type="text/javascript">
    var getData = function() {
      $.get('getRecommendCnt.php',function() {})
    }
  </script>
</html>
