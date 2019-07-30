<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title></title>
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
    <?php
    include "indexBoardClass.php";
    $board = new boardClass();
    $board->echoBoard(1,5);
     ?>

     <?php include "footer.php"; ?>
  </body>
</html>
