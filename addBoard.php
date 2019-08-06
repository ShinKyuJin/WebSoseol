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
        height:600px;
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
          <textarea name="boardContent" id="ckeditor"></textarea>
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
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
  <script type="text/javascript">
    window.onload=function() {
      CKEDITOR.replace('ckeditor',{height:'500px'});
    };
  </script>
</html>
