<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="master.css">
    <style media="screen">
    body {
      margin: 0;
    }
    .slideShow {
      height:400px;
      background-color: grey;
    }
    </style>
  </head>
  <body>
    <?php include "nav.php"; ?>
    <div class="slideShow">

    </div>
    <?php
    include "boardClass.php";
    $board = new boardClass();
    $board->echoBoard(1,5);
    $board2 = new boardClass();
    $board2->echoBoard(2,5);
     ?>

     <?php include "footer.php"; ?>
  </body>
</html>
