<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="index.css">
    <title>세종대학교 소프트웨어 융합대학</title>
  </head>
  <style media="screen">

  </style>
  <body>
    <?php include "nav.php"; ?>
    <div class="bigdoor">
      <img src="inno.jpg" alt="" width="100%" height="70%">
    </div>
    <?php
    include "indexBoardClass.php";
    $board = new boardClass;
    $stmt = mq("SELECT * FROM LISTOFBOARD");
    while($stmtRow = mysqli_fetch_array($stmt)) :
      $board->echoBoard($stmtRow['categoryIdx']);
    endwhile;
     ?>


    <?php include "footer.php"; ?>
  </body>
</html>
