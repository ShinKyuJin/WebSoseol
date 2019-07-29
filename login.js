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
        loginComment.css('font-size','8px');
      }
    },
    error:function() {
      console.log('fail');
    }
  })  
});
