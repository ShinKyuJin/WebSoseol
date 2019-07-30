var userID = $('.userID');
var userIDchk = $('.userIDchk');
var userPassword = $('.userPassword');
var userPassword2 = $('.userPassword2');
var userPasswordchk = $('.userPasswordchk');
var userEmail = $('.userEmail');
var userEmailchk = $('.userEmailchk');
var userMajor =$('.userMajor');
var userMajorchk = $('.userMajorchk');

userID.blur(function() {
  $.ajax({
    type:'post',
    dataType:'json',
    url:'register_idchk.php',
    data:{userID:userID.val()},
    success:function(json) {
      if(json.res == 'suc') {
        userID.css('-webkit-')
        userID.css('background','green');
        userIDchk.val('1');
      }
      else {
        userID.css('background','red');
        userIDchk.val('0');
        userID.focus();
      }
    },
    error:function() {
      console.log('fail');
    }

  })
});

userPassword2.blur(function() {
  if(userPassword.val()!=userPassword2.val()) {
    userPasswordchk.val('0');
  }
  else {
    userPasswordchk.val('1');
  }
});

userEmail.blur(function() {
});

userMajor.blur(function() {
  if(userMajor.val() == 'false') {
    userMajorchk.val('0');
  }
  else {
    userMajorchk.val('1');
  }
});

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
}

function retry(){
  var a = document.getElementById("userPassword1");

  if(a==""){
    document.getElementById("messages").innerhtml="비밀번호를 입력하세요.";
  }
  if(a.length<8){
    document.getElementById("messages").innerhtml="비밀번호는 8자리 이상입니다.";
    return false;
  }
  if(a.length>15){
    document.getElementById("messages").innerhtml="비밀번호는 15자리 이하입니다.";
    return false;
  }
}
