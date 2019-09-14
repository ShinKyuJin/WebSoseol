<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="introduce.css">
    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sunflower:300&display=swap" rel="stylesheet">
    <title></title>
  </head>
  <body>
    <?php include "nav.php"; ?>
    <div class="major">
      <?php
      $hello = $_GET['i'];
      $name = mysqli_fetch_array(mq("SELECT * FROM MAJORINTRO WHERE idx='$hello'"));
      $imgPath = $name["saveName"];
      echo $name['MajorName'];
       ?>
    </div>
    <div class="introduce">
      <div class="sidebar">
        <?php
        $MajorIntroduce = mq("SELECT * FROM MAJORINTRO");
        while($MajorName = mysqli_fetch_array($MajorIntroduce)) :
         ?>
         <a href="introduce.php?i=<?php echo $MajorName['idx']; ?>" class="<?php if($_GET['i']==$MajorName['idx']) echo "clicked";?>"><?php echo $MajorName['MajorName']; ?></a>
       <?php endwhile; ?>
      </div>
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="<?php echo "admin/introduction/".$imgPath ?>" alt="Avatar" style="width:100%; height:100%;">
          </div>
          <div class="flip-card-back">
            <div class="title">학과소개</div>
            <div class="info">
              <?php
              $idx = $_GET['i'];
              $sql = mq("SELECT * FROM MAJORINTRO WHERE idx='$idx'");
              $content = mysqli_fetch_array($sql);
               ?>
            <br><?php echo $content['IntroText'];?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include "footer.php"; ?>
  </body>
  <script type="text/javascript">
    $('.Major').click(function() {

    });
  </script>
</html>
