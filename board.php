<?php
  include "db.php";
  $boardIdx = re('bi','get');
  $board = mysqli_fetch_array(mq("SELECT * FROM BOARD WHERE boardIdx='$boardIdx'"));
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style media="screen">
      .Card {
        border:1px solid black;
      }
      .reply {
        margin-left: 20px;
      }
    </style>
  </head>
  <body>
    <?php include "nav.php"; ?>
    <div class="container">
      <div class="boardTitle"><h2><?php echo $board['boardTitle'] ?></h2></div>
      <div class="boardWriter"><?php echo $board['boardWriter']; ?></div><hr>
      <div class="boardContent"><?php echo nl2br($board['boardContent']); ?></div><hr>
      <div class="boardFile"><?php echo $board['boardFile']; ?></div><hr>
      <a href="deleteBoard.php?bi=<?php echo $board['boardIdx']; ?>&ci=<?php echo $board['categoryIdx']; ?>" action = "alert('hello');"style="float:right;">삭제</a>
      <textarea rows="3" cols="80" class="commentContent"></textarea>
      <button type="button" class="commentButton">작성</button>

      <div class="commentZone">
      <?php
        $comment = mq("SELECT * FROM COMMENT_BOARD WHERE replySourceIdx IS NULL and boardIdx='$boardIdx'");
        while($commentRow = mysqli_fetch_array($comment)) :
       ?>
       <div class="ONE">
         <div class="Card <?php echo $commentRow['commentIdx']; ?>">
           <div class="commentWriter"><?php echo $commentRow['commentWriter']; ?></div>
           <div class="commentContent"><?php echo $commentRow['commentContent']; ?></div>
           <div class="commentDate"><?php echo $commentRow['commentDateTime']; ?></div>
         </div>
         <div class="createReply <?php echo $commentRow['commentIdx']; ?>">
           <input type="text" class="content">
           <div class="makeBtn" style="width:40px;">작성</div>
         </div>
         <?php
          $reply = mq("SELECT * FROM COMMENT_BOARD WHERE boardIdx='$boardIdx' and replySourceIdx!=0");
          while($replyRow = mysqli_fetch_array($reply)) :
            if($replyRow['replySourceIdx'] == $commentRow['commentIdx']) :
          ?>
          <div class="Card reply">
            <div class="replyWriter"><?php echo $replyRow['commentWriter']; ?></div>
            <div class="replyContent"><?php echo $replyRow['commentContent']; ?></div>
            <div class="replyDate"><?php echo $replyRow['commentDateTime']; ?></div>
          </div>
        <?php endif;endwhile; ?>
          </div>
          <?php endwhile; ?>
        </div>
      </div>
    <?php include "footer.php"; ?>
  </body>
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
  <script type="text/javascript" src="comment.js"></script>

</html>
