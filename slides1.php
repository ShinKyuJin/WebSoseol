<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<link rel="stylesheet" href="slides1.css">
</head>
<body>
<div class="slideshow-container1">

<div class="mySlides1">
  <div class="numbertext1">1 / 3</div>
  <img src="overflow-1.png">
</div>

<div class="mySlides1">
  <div class="numbertext1">2 / 3</div>
  <img src="overflowimg-2.jpg">
</div>

<div class="mySlides1">
  <div class="numbertext1">3 / 3</div>
  <img src="overflowimg-1.jpg">
  </div>

</div>
<br>

<div class="dots1" style="text-align:center">
  <span class="dot1"></span>
  <span class="dot1"></span>
  <span class="dot1"></span>
</div>

<script>
var slideIndex1 = 0;
showSlides1();

function showSlides1() {
  var i;
  var slides1 = document.getElementsByClassName("mySlides1");
  var dots1 = document.getElementsByClassName("dot1");
  for (i = 0; i < slides1.length; i++) {
    slides1[i].style.display = "none";
  }
  slideIndex1++;
  if (slideIndex1 > slides1.length) {slideIndex1 = 1}
  for (i = 0; i < dots1.length; i++) {
    dots1[i].className = dots1[i].className.replace(" active", "");
  }
  slides1[slideIndex1-1].style.display = "block";
  dots1[slideIndex1-1].className += " active";
  setTimeout(showSlides1, 4000);
}
</script>

</body>
</html>
