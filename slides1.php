<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<link rel="stylesheet" href="slide1.css">
</head>
<body>
<div class="slideshow-container1">

<div class="mySlides1 fade">
  <div class="numbertext1">1 / 3</div>
  <img src="point-1.png">
</div>

<div class="mySlides1 fade">
  <div class="numbertext1">2 / 3</div>
  <img src="point-2.png">
</div>

<div class="mySlides1 fade">
  <div class="numbertext1">3 / 3</div>
  <img src="point-3.png">
  </div>

</div>
<br>

<div class="dots1" style="text-align:center">
  <span class="dot1"></span>
  <span class="dot1"></span>
  <span class="dot1"></span>
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides1");
  var dots = document.getElementsByClassName("dot1");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 4000);
}
</script>

</body>
</html>