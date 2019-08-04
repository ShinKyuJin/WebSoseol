<?php
  session_start();
?>
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
    .Card {
      padding : 10px;
      margin:10px;
    }

  </style>
  <body>
    <?php include "nav.php"; ?>
    <div class="container">

    <?php
      include "db.php";
      $boardIdx = $_GET['bi'];
      $row = mysqli_fetch_array(mq("SELECT * FROM BOARD WHERE boardIdx = '$boardIdx'"));
      if($row['boardWriter'] != $_SESSION['userID']){
        $boardHit = $row['boardHit']+1;
        $updateHit = mq("UPDATE BOARD SET boardHit='$boardHit' WHERE boardIdx='$boardIdx'");
      }
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
     <hr>
     <?php echo $row['boardFile']; ?>
     <hr>
     <div class="md-form">
       <textarea name="boardContent" class="md-textarea form-control commentRegisterBox commentContent" rows="3" cols="80" placeholder="<?php if(!isset($_SESSION['userID'])) echo '로그인을 해주세요'; ?>"></textarea>
       <button type="button" name="button" class="commentMakeBtn">작성</button>
     </div>
     <input type="hidden" class="isLogined"value="<?php if(isset($_SESSION['userID'])) echo 1; else echo 0; ?>">
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
      </div>
      <?php
        echo "<div class='replyBox ".$cRow['commentIdx']."'><input type='text' class='commentContent'><div class='buttonBox' style='width:40px'>작성</div></div>";
       ?>

      <?php
       while($rRow = mysqli_fetch_array($reply)):
       ?>
       <div class="Card" style="margin-left:20px; border:1px solid black;">
         <div class="replyWriter">작성자 <?php echo $rRow['commentWriter']; ?></div>
         <div class="replyContent">내용 <?php echo nl2br($rRow['commentContent']); ?></div>
         <div class="replyDateTime">시간 <?php echo $rRow['commentDateTime']; ?></div>
       </div>
     <?php endwhile; ?>
   <?php endwhile; ?>
 </div>
    <?php include "footer.php"; ?>
  </body>
  <script src="comment.js" charset="utf-8"></script>

</html>
