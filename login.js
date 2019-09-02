var userID = $('#userID');
var userPassword = $('#userPassword');
var loginComment = $('.loginComment');
var loginBtn = $('.loginBtn');
loginBtn.click(function() {
  $.ajax({
    type:'post',
    dataType:'json',
    url:'login_ok.php',
    data:{userID1:userID.val(),userPassword1:userPassword.val()},
    success:function(json) {
      if(json.res == 'suc') {
        location.href = 'index.php';
      }
      else {
        loginComment.text(json.res);
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
