<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>갤러리</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="boardIdx.css">
    <link rel="stylesheet" href="galleryIndex.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
  </head>
  <body>
    <?php include "nav.php"; ?>
    <?php
    $paging = re('page','get');
     ?>
    <div class="container">
      <h1 class="bulletinboard">소융대 갤러리&nbsp&nbsp<a class="write"href="galleryUpload.php"><i class="fas fa-pen"></i></a></h1>
      <hr>
      <?php
      $cardViewBind = mq("SELECT * FROM BOARD WHERE categoryIdx=4 ORDER BY boardIdx desc");
      $number = 0;
      while($cardViewRow = mysqli_fetch_array($cardViewBind)) :
        $boardIdx = $cardViewRow["boardIdx"];
        $link = 'uploadFile/gallery/';
        $imagesrc = mysqli_fetch_array(mq("SELECT * FROM FILE_BOARD WHERE boardIdx = $boardIdx"));
        $link = $link.$imagesrc["saveName"];

        ?>
        <div class="Card Card<?php echo ++$number; ?>">
          <a href="galleryBoard.php?bi=<?php echo $cardViewRow['boardIdx']; ?>"><img src="<?php echo $link;?>" alt="" >
            <div class="info">
              <div class="smallInfo Date">
                <?php echo substr($cardViewRow['boardDate'],0,10); ?>
              </div>
              <div class="smallInfo Title">
                <?php echo $cardViewRow['boardTitle']; ?>
              </div>
              <div class="smallInfo Writer">
                <?php echo $cardViewRow['boardWriter']; ?>
              </div>
            </div>
          </a>
        </div>
      <?php endwhile; ?>
      <div class="plusBox">
        <a class="plus" href="#" onclick="return false;">+</a>
      </div>
    </div>

  <?php include "footer.php"; ?>
  </body>
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
  <script type="text/javascript">
  var number = <?php echo $number; ?>;
  var k = 5;
  var beforeK = k;
  if(number > 5) {
    for(var i=6;i<=number;i++) {
      var className = ".Card"+i;
      $(className).css("display","none");
    }
  }
  $('.plus').click(function() {
    if(k+5 > number) {
      k = number;
      $('.plusBox').css("display","none");
    }
    else {
      k+=5;
    }
    for(var i=beforeK;i<=k;i++) {
      var className = ".Card"+i;
      if(i!=beforeK) {
        $(className).css("display","block");
        $(className).addClass('fade');
      }
    }
    beforeK = k;
    setTimeout(function() {
      $(".Card").removeClass("fade");
    },1400);
  })

  </script>
</html>
