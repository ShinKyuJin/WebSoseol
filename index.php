<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>세종대학교 소프트웨어 융합대학</title>
    <link rel="stylesheet" href="index.css?">
    <link href="https://fonts.googleapis.com/css?family=Gamja+Flower|Nanum+Gothic+Coding|Nanum+Gothic:400,700,800|Nanum+Pen+Script|Song+Myung|Stylish|Sunflower:300|Yeon+Sung&display=swap&subset=korean" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>
  <body >
    <?php include "nav.php"; ?>
    <div class="container mt-3">
      <div id="myCarousel" class="carousel slide">
        <ul class="carousel-indicators">
          <li class="item1 active"></li>
          <li class="item2"></li>
          <!--
            <li><?php
            //$isLogo = mq("SELECT * FROM ADMINFILE WHERE category = 'logo' AND selected = 1");
            //if($logoRow = mysqli_fetch_array($isLogo)) : ?>
            <img src="<?php //echo "admin/logo/".$logoRow["saveName"]; ?>" width="50px" height="50px" />
          <?php //endif; ?></li>
          -->
        </ul>
        <div class="carousel-inner">
          <div class="carousel-item active" style="width: 100%;">
            <img src="inno.jpg" alt="" style="width:100%; height: 400px;">
          </div>
          <div class="carousel-item">
            <img src="sejong.jpg" alt="" style="width:100%; height: 400px;">
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" onclick="return false">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" onclick="return false">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
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
    <script>
    $(document).ready(function(){
      $("#myCarousel").carousel({interval: 5000});
      $(".item1").click(function(){
        $("#myCarousel").carousel(0);
      });
      $(".item2").click(function(){
        $("#myCarousel").carousel(1);
      });
      $(".carousel-control-prev").click(function(){
        $("#myCarousel").carousel("prev");
      });
      $(".carousel-control-next").click(function(){
        $("#myCarousel").carousel("next");
      });
    });
  </script>
    <?php include "footer.php"; ?>
  </body>
  </html>
