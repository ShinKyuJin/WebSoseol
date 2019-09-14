<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="overflow_main test.css">
  <link href="https://fonts.googleapis.com/css?family=Gamja+Flower|Nanum+Gothic:400,700,800|Nanum+Pen+Script|Song+Myung|Stylish|Sunflower:300|Yeon+Sung&display=swap&subset=korean" rel="stylesheet">
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.2.0.min.js" ></script>

<script type="text/javascript">
$(function(){
  var button = $('.button-container-1');
  var tagusage = $('.mediabtn-container-1');
  var howtotag = $('.howtotag');
  var howtotag1 = $('.howtotag1');
  var tagtext = $('.tagtext');
  var windowWidth = $( document).width();

  tagusage.click(function(){
    howtotag1.fadeIn();
  });

  howtotag1.click(function(){
    howtotag1.fadeOut();
  });
  button.click(function(){
    howtotag.fadeIn();

    button.css("display","none")
  });
  howtotag.click(function(){
    howtotag.fadeOut();
    button.css("display","block")
  });
});
</script>
    <title></title>
  </head>
  <body>
    <h1>OVERFLOW 소개</h1>
    <div class="mainslide">
      <?php include "slide2.php"; ?>
    </div>
    <div class="mediaslide">
      <?php include "slide1.php"; ?>
    </div>
    <div class="intro">
      <h2>'세종 OVERFLOW'란 학우 여러분이 모르는 코드를 다른 학우분들과 공유를 한 후 서로 수정해주거나 코드를 올려 새로운 알고리즘을 공유하는 곳 입니다!  </h2>
    </div>
    <div class="describe">
      <img src="overflow_order.png" style="width:1000px; height:400px; display:block; margin:0px auto;">
    </div>
    <div class="describe2">
      <img src="overflow_order-2.png" style="width:200px; height:850px; display:block; margin:0px auto;">
    </div>
    <div class="overbtn">
      <div class="button-shadow">
        <div class="button-container-1">
          <span class="mas">TAG 사용법</span>
          <button id='work' type="button" name="Hover">TAG 사용법</button>
        </div>
      </div>
      <div class="button-shadow2">
        <div class="button-container-3">
          <span class="mas">코드 올리러가기</span>
          <button type="button" name="Hover" onclick="location.href='index.php'">코드 올리러가기</button>
        </div>
      </div>
    </div>
    <div class="mediabtn">
      <div class="mediabtn-shadow-1">
        <div class="mediabtn-container-1">
          <button type="button" name="button">TAG 사용법</button>
        </div>
      </div>
      <div class="mediabtn-shadow-2">
        <div class="mediabtn-container-2">
          <button type="button" name="button" onclick="location.href='index.php'">코드 올리러 가기</button>
        </div>
      </div>
    </div>
    <div class="howtotag">
      <div class="howto">
        <h2>"태그 사용하는 방법"</h2>
        <p class="int">1. 코드를 훑어보면서 특정단어로 표현할수 있는 것을 확인한다.</p>
        <p class="ex"> →(예를 들어, 내가 쓴 코드가 어떤언어로 이루어 져있는지, 특정 함수 또는 단어등...)</p>
        <p class="int">2. 찾은 단어를 태그 적는 칸에 쓰는데 이때 그 단어 앞에 '#'을 붙인다.</p>
        <p class="ex"> →(예를 들어, #c언어 #printf()...)</p>
        <p class="int">3. 그 후에 내가 쓴 글이나 다른사람의 게시글에 들어간후 거기에 있는 태그를 누르면 그 단어로 태그했던 게시글들이 나온다.</p>
      </div>
    </div>
    <div class="howtotag1">
      <div class="howto1">
        <h2>"태그 사용하는 방법"</h2>
        <p class="int1">1. 코드를 훑어보면서 특정단어로 표현할수 있는 것을 확인한다.</p>
        <p class="ex1"> →(예를 들어, 내가 쓴 코드가 어떤언어로 이루어 져있는지, 특정 함수 또는 단어등...)</p>
        <p class="int1">2. 찾은 단어를 태그 적는 칸에 쓰는데 이때 그 단어 앞에 '#'을 붙인다.</p>
        <p class="ex1"> →(예를 들어, #c언어 #printf()...)</p>
        <p class="int1">3. 그 후에 내가 쓴 글이나 다른사람의 게시글에 들어간후 거기에 있는 태그를 누르면 그 단어로 태그했던 게시글들이 나온다.</p>
      </div>
    </div>
    <?php include "footer.php"; ?>
  </body>
</html>