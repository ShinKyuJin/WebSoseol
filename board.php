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
  </head>
  <body>
    <?php include "nav.php"; ?>
    <div class="container">
      <div class="boardTitle"><h2><?php echo $board['boardTitle'] ?></h2></div>
      <div class="boardWriter"><?php echo $board['boardWriter']; ?></div><hr>
      <div class="boardContent"><?php echo nl2br($board['boardContent']); ?></div><hr>

      <textarea rows="3" cols="80" class="commentContent"></textarea>
      <button type="button" class="commentButton">작성</button>

      <?php
        $comment = mq("SELECT * FROM COMMENT_BOARD WHERE boardIdx='$boardIdx' and replySourceIdx='0'");
        while($commentRow = mysqli_fetch_array($comment)) :
       ?>
       <div class="ONE">
       <div class="Card<?php echo $commentRow['commentIdx']; ?>" style="border:1px solid black;">
         <div class="commentWriter"><?php echo $commentRow['commentWriter']; ?></div>
         <div class="commentContent"><?php echo $commentRow['commentContent']; ?></div>
         <div class="commentDate"><?php echo $commentRow['commentDateTime']; ?></div>
       </div>
       <div class="createReply <?php echo $commentRow['commentIdx']; ?>">
         <input type="text" class="content">
         <div class="makeBtn" style="width:40px;">작성</div>
       </div>
       <?php
        $reply = mq("SELECT * FROM COMMENT_BOARD WHERE boardIdx='$boardIdx' and replySourceIdx!='0'");
        while($replyRow = mysqli_fetch_array($reply)) :
        ?>
        <div class="Card" style="border:1px solid black; margin-left:10px">
          <div class="replyWriter"><?php echo $replyRow['commentWriter']; ?></div>
          <div class="replyContent"><?php echo $replyRow['commentContent']; ?></div>
          <div class="replyDate"><?php echo $replyRow['commentDateTime']; ?></div>
        </div>
        <?php endwhile; ?>
        </div>
        <?php endwhile; ?>
    </div>
    <?php include "footer.php"; ?>
  </body>
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
  <script type="text/javascript" src="comment.js"></script>
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
  <script type="text/javascript">
    window.onload=function() {
      CKEDITOR.replace('ckeditor');
    };
  </script>
</html>
