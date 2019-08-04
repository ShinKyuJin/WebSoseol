<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style media="screen">
      html,body {
        height:100%;
      }
      .md-form{
        height:300px;
      }
      textarea {
        height:50%;
      }
    </style>
  </head>
  <body>
    <?php include "nav.php"; ?>
    <div class="container">
      <form class="" action="addBoard_ok.php" method="post">
        <hr>
        <div class="form-group">
          <input type="text" name="boardTitle" class="form-control" placeholder="제목">
        </div>
        <hr>
        <div class="md-form">
          <textarea name="boardContent" class="md-textarea form-control" rows="12" cols="80"placeholder="내용을 입력하세요."></textarea>
        </div>
        <hr>
        파일첨부
        <input type="file" name="boardFile">
        <div class="buttonBox">
          <input type="submit" name="" value="저장" style="float:right;" class="btn btn-primary">
        </div>
        <hr>
        <?php
          include "db.php";
          $categoryIdx = re('ci','get');
          $boardWriter = getUserID();
         ?>
        <input type="hidden" name="boardWriter" value="<?php echo $boardWriter; ?>">
        <input type="hidden" name="categoryIdx" value="<?php echo $categoryIdx; ?>">
      </form>
    </div>
    <?php include "footer.php"; ?>
  </body>
</html>
