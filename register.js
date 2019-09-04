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
  var slides = document.getElementsByClassName("slide");
  var bars = document.getElementsByClassName("bar");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
  bars[slideIndex-1].className += " active";
}

var prevBtn = $('.prev');
var nextBtn = $('.next');

prevBtn.click(function() {
  if(slideIndex != 1) {
    plusSlides(-1);
    showSlides(slideIndex);
  }
});

nextBtn.click(function() {
  var listString = "#user_" + slideIndex;

  if(slideIndex == 1 || slideIndex == 2 || slideIndex == 6 || slideIndex == 7) {
    if($(listString).val() != "" && slideIndex != 7) {
      plusSlides(1);
      showSlides(slideIndex);
      $('.userNamechk').text("");
      $('.userStudentIDchk').text("");
    }
    else {
      if(slideIndex == 1) {
        $('.userNamechk').text("이름을 입력해주세요!");
        $('.userNamechk').css("color","red");
        $('.userNamechk').css("font-size","12px");
      }
      else if(slideIndex == 6) {
        $('.userMajorchk').text("학과를 선택해주세요!");
        $('.userMajorchk').css("color","red");
        $('.userMajorchk').css("font-size","12px");
      }
      else {
        $('.userStudentIDchk').text("학번을 입력해주세요!");
        $('.userStudentIDchk').css("color","red");
        $('.userStudentIDchk').css("font-size","12px");
      }
      $(listString).focus();
      $(listString).addClass("shake");
      setTimeout(function() {
        $(listString).removeClass("shake");
      },300);
    }
  }
  else {
    if(slideIndex == 3) {
      var re = /^[A-za-z0-9]{5,15}/g;

      var idOverlapChk = false;
      $.ajax({
        type:'post',
        dataType:'json',
        async:false,
        url:'register_idchk.php',
        data:{userID1:$(listString).val()},
        success:function(json) {
          if(json.res == 'suc') {
            idOverlapChk = true;
          }
        },
        error:function() {
          console.log('fail');
        }
      });



      if(!re.test($(listString).val())) {
        $('.userIDchk').text("아이디는 영어 소문자나 대문자 혹은 숫자 5~15 문자로 구성해주세요!");
        $('.userIDchk').css("color","red");
        $('.userIDchk').css("font-size","12px");
        $(listString).focus();
        $(listString).addClass("shake");
        setTimeout(function() {
          $(listString).removeClass("shake");
        },300);
      }
      else {
        if(idOverlapChk == true) {
          $('.userIDchk').text("");
          plusSlides(1);
          showSlides(slideIndex);
        }
        else {
          $('.userIDchk').text("중복된 아이디입니다!");
          $('.userIDchk').css("color","red");
          $('.userIDchk').css("font-size","12px");
          $(listString).focus();
          $(listString).addClass("shake");
          setTimeout(function() {
            $(listString).removeClass("shake");
          },300);
        }

      }
    }
    else if(slideIndex == 4) {
      var re = /^[A-za-z0-9]{5,15}/g;
      var listString1 = listString + "_1";
      var listString2 = listString + "_2";
      if(!re.test($(listString1).val())) {
        $('.userPasswordchk').text("비밀번호는 영어 소문자나 대문자 혹은 숫자 5~15 문자로 구성해주세요!");
        $('.userPasswordchk').css("color","red");
        $('.userPasswordchk').css("font-size","12px");
        $(listString1).val("");
        $(listString1).focus();
        $(listString1).addClass("shake");
        setTimeout(function() {
          $(listString1).removeClass("shake");
        },300);

      }
      else if($(listString1).val() != $(listString2).val()) {
        $('.userPasswordchk').text("비밀번호 두개를 일치시켜주세요!");
        $('.userPasswordchk').css("color","red");
        $('.userPasswordchk').css("font-size","12px");
        $(listString2).val("");
        $(listString2).focus();
        $(listString2).addClass("shake");
        setTimeout(function() {
          $(listString2).removeClass("shake");
        },300);
      }
      else {
        $('.userPasswordchk').text("");
        plusSlides(1);
        showSlides(slideIndex);
      }
    }
    else if(slideIndex == 5) {
      var re2 = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
      if(!re2.test($(listString).val())) {
        $('.userEmailchk').text("이메일은 양식을 제대로 입력해주세요!");
        $('.userEmailchk').css("color","red");
        $('.userEmailchk').css("font-size","12px");
        $(listString).val("");
        $(listString).focus();
        $(listString).addClass("shake");
        setTimeout(function() {
          $(listString).removeClass("shake");
        },300);
      }
      else {
        $('.userEmailchk').text("");
        plusSlides(1);
        showSlides(slideIndex);
      }
    }
  }
});
