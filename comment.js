var isLogined = $('.isLogined');
$('.buttonBox').click(function() {
  var name = $(this).parent().attr('class');
  var commentContent = $(this).parent().children('.commentContent');
  name = name.split(' ');
  var url = $(location).attr('href');
  url = url.split('=');
  $.ajax({
    type:'post',
    dataType:'json',
    url:'replyComment.php',
    data:{replySourceIdx:name[1],commentContent:commentContent.val(),boardIdx:url[1]},
    success:function(json) {
      if(json.res == 'suc') {
        commentContent.val('');
        console.log('suc');
      }
      else {
        console.log('fail2');
      }
    },
    error:function() {
      console.log('fail');
    }
  })
});

$('.commentRegisterBox').click(function() {
  $.ajax({
    type:'post',
    dataType:'json',
    url:'loginChk.php',
    data:{isLogined:isLogined.val()},
    success:function(json) {
      if(json.res != 'logged') {
        var loginQuestion = confirm('로그인 하러 갈래?');
        if(loginQuestion) {
          location.replace('login.php');
        }
      }
    },
    error:function() {
      console.log('failed to check login');
    }
  })
});

$('.commentMakeBtn').click(function() {
  var commentContent = $(this).parent().children('.commentContent');
  var url = $(location).attr('href');
  url = url.split('=');
  $.ajax({
    type:'post',
    dataType:'json',
    url:'commentPost.php',
    data:{commentContent:commentContent,boardIdx:url[1]},
    success:function(json) {
      
    },
    error:function() {

    }
  })
});
