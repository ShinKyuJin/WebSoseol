<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style media="screen">
    body {
      margin: 0;
    }
    .slideShow {
      height:400px;
      background-color: grey;
    }
    table {
      text-align: center;
    }
    a {
      decoration:none;
    }
    </style>
  </head>
  <body>
    <?php include "nav.php"; ?>
    <div class="slideShow">
      <h2>SlideShow</h2>
    </div>
    <div class="container">
    <?php
    include "indexBoardClass.php";
    $board = new boardClass();
    $board->echoBoard(1,5);
     ?>
   </div>

     <?php include "footer.php"; ?>
  </body>
</html>
