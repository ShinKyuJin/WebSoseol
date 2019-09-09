var userID = $('.userID');
var userPassword = $('.userPassword');

$('.button').click(function() {
  $.ajax({
    type:'post',
    dataType:'json',
    url:'login_ok.php',
    data:{userID1:userID.val(),userPassword1:userPassword.val()},
    success:function(json) {
      if(json.res == 'suc') {
        location.href = "index.php";
      }
      else {
        $('.loginResult').text("아이디나 비밀번호가 일치하지 않습니다.")
      }
    },
    error:function() {
      console.log('fail');
    }
  })
});

$('.login').keydown(function(key) {
  if(key.keyCode == 13) {
    $.ajax({
      type:'post',
      dataType:'json',
      url:'login_ok.php',
      data:{userID1:userID.val(),userPassword1:userPassword.val()},
      success:function(json) {
        if(json.res == 'suc') {
          location.href = "index.php";
        }
        else {
          $('.loginResult').css("color","red");
          $('.loginResult').text("아이디나 비밀번호가 일치하지 않습니다.")
        }
      },
      error:function() {
        console.log('fail');
      }
    })
  }
});
