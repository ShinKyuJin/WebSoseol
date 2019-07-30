<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <style media="screen">
    body {
      margin: 0;
    }
  </style>
  <body>
    <?php include "nav.php"; ?>
    <div class="container">

    <?php
      include "db.php";
      $boardIdx = $_GET['bi'];
      $row = mysqli_fetch_array(mq("SELECT * FROM BOARD WHERE boardIdx = '$boardIdx'"));
     ?>
     <hr>
     <div class="boardTitle">
       <h1>
       <?php echo $row['boardTitle']; ?>
      </h1>
     </div>
     <hr>
     <?php echo $row['boardWriter']; ?>
     <?php echo $row['boardDate']; ?>
     <hr>
     <?php echo nl2br($row['boardContent']); ?>
     <?php
     $boardIdx = $_GET['bi'];
     $chk = 0;
     $comment = mq("SELECT * FROM COMMENT_BOARD WHERE boardIdx='$boardIdx' and replySourceIdx IS NULL");
     while($cRow = mysqli_fetch_array($comment)) :
       $commentIdx = $cRow['commentIdx'];
       $reply = mq("SELECT * FROM COMMENT_BOARD WHERE replySourceIdx='$commentIdx' and replySourceIdx IS NOT NULL");
      ?>
      <div class="Card" style="border:1px solid black;">
        <div class="commentWriter">작성자 <?php echo $cRow['commentWriter']; ?></div>
        <div class="commentContent">내용 <?php echo $cRow['commentContent']; ?></div>
        <div class="commentDateTime">시간 <?php echo $cRow['commentDateTime']; ?></div>
        <div class="commnetIdx">인덱스 <?php echo $cRow['commentIdx']; ?></div>
      </div>
      <?php
        echo "<div class='replyBox ".$cRow['commentIdx']."'><input type='text' name='commentContent' class='commentContent'><div class='buttonBox' style='width:40px'>작성</div></div>";
       ?>

      <?php
       while($rRow = mysqli_fetch_array($reply)):
       ?>
       <div class="Card" style="margin-left:20px; border:1px solid black;">
         <div class="replyWriter">작성자 <?php echo $rRow['commentWriter']; ?></div>
         <div class="replyContent">내용 <?php echo $rRow['commentContent']; ?></div>
         <div class="replyDateTime">시간 <?php echo $rRow['commentDateTime']; ?></div>
         <div class="replyIdx">인덱스 <?php echo $rRow['commentIdx']; ?></div>
       </div>
     <?php endwhile; ?>
   <?php endwhile; ?>
 </div>
    <?php include "footer.php"; ?>
  </body>
  <script src="comment.js" charset="utf-8"></script>

</html>
