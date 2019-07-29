var userID = $('.userID');
var userIDchk = $('.userIDchk');
var userIDComment = $('.userIDComment');
var userPassword = $('.userPassword');
var userPassword2 = $('.userPassword2');
var userPasswordComment = $('.userPasswordComment');
var userPasswordchk = $('.userPasswordchk');
var userEmail = $('.userEmail');
var userEmailComment = $('.userEmailComment');
var userEmailchk = $('.userEmailchk');
var userMajor =$('.userMajor');
var userMajorComment = $('.userMajorComment');
var userMajorchk = $('.userMajorchk');



userID.blur(function() {
  $.ajax({
    type:'post',
    dataType:'json',
    url:'register_idchk.php',
    data:{userID:userID.val()},
    success:function(json) {
      if(json.res == 'suc') {
        userIDComment.text('사용가능한 아이디입니다.');
        userIDComment.css('color','#8beb88');
        userIDComment.css('font-size','5px');
        userIDchk.val('1');
      }
      else {
        userIDComment.text('중복된 아이디입니다.');
        userIDComment.css('color','red');
        userIDComment.css('font-size','5px');
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
    userPasswordComment.text('두개의 비밀번호가 일치하지 않습니다.');
    userPasswordchk = 0;
  }
  else {
    userPasswordComment.text('두개의 비밀번호가 일치합니다.');
    userPasswordchk = 1;
  }
});

userEmail.blur(function() {
});

userMajor.blur(function() {
  if(userMajor.val() == 'false') {
    userMajorComment.text('전공을 선택해주세요');
    userMajorchk = 0;
  }
  else {
    userMajorComment.text('확인');
    userMajorchk = 1;
  }
});
