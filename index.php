<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>세종대학교 소프트웨어 융합대학</title>
    <link rel="stylesheet" href="index.css?">
  </head>
  <body style="background-color:#f1f1f1">
    <?php include "nav.php"; ?>
    <div class="slick">

    </div>

    <div class="container">

    <div class="Board">
    <?php
    include "indexBoardClass.php";
    $board = new boardClass;
    $stmt = mq("SELECT * FROM LISTOFBOARD");
    while($stmtRow = mysqli_fetch_array($stmt)) :
      $board->echoBoard($stmtRow['categoryIdx']);
    endwhile;
     ?>
   </div>
 </div>

    <?php include "footer.php"; ?>
  </body>
</html>
