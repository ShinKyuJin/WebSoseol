var userID = $('.userID');
var userPassword = $('.userPassword');
var loginComment = $('.loginComment');
var loginBtn = $('.loginBtn');
loginBtn.click(function() {
  $.ajax({
    type:'post',
    dataType:'json',
    url:'login_ok.php',
    data:{userID:userID.val(),userPassword:userPassword.val()},
    success:function(json) {
      if(json.res == 'suc') {
        location.href = 'index.php';
      }
      else {
        loginComment.text('아이디나 비밀번호가 틀렸습니다.');
        loginComment.css('color','red');
        loginComment.css('margin-left','125px');
        loginComment.css('font-size','16px');
      }
    },
    error:function() {
      console.log('fail');
    }
  })
});

$('input').focus(function() {
  var tmp = $(this).parent().children('.icon');
  tmp.css("color","black");
  tmp.animate({
    width: "30px",
    height: "30px",
  }, 400, function() {
  });
})
$('input').blur(function() {
  var tmp = $(this).parent().children('.icon');
  tmp.css("color","rgb(160,160,160)");
  tmp.animate({
    height: "24px",
    width: "24px",
  }, 400, function() {
  });
});
