$(document).on('click','.makeBtn',function() {
  var index = $(this).parent().attr('class').split(' ');
  var className = '';
  className = className.concat('.Card ',index[1]);
  var content = $(this).parent().children('.content').val();
  var userName = $('.TOP').children('.userName').text();
  var url = location.href;
  var boardIdx = url.split('=');
  var dateString = "방금 전";
  $.ajax({
    type:'post',
    dataType:'json',
    url:'replyPost.php',
    data:{boardIdx:boardIdx[1],commentWriter:userName,commentContent:content,replySourceIdx:index[1]},
    success:function(json) {
      if(json.res=='suc') {
        console.log('suc');
      }
      else {
        console.log('fail2');
      }
    },
    error:function() {
      console.log('fail');
    }
  });

  var element = "<div class='Card reply'>" + "<div class='replyWriter'>" + userName + "</div>" + "<div class='replyContent'>" + content + "</div>" + "<div class='replyDate'>" + dateString + "</div></div>";
  $(this).parent().parent().append(element);
});

$('.commentButton').click(function() {
  var userName = $('.TOP').children('.userName').text();
  var url = location.href;
  var boardIdx = url.split('=');
  var content = $('.commentContent').val();
  var dateString = "방금 전";
  $.ajax({
    type:'post',
    dataType:'json',
    url:'commentPost.php',
    data:{boardIdx:boardIdx[1],commentWriter:userName,commentContent:content},
    success:function(json) {
      if(json.res != 'fail') {
        replySourceIdx = json.res;
        var element = "<div class='ONE'><div class='Card " + replySourceIdx + "'>" + "<div class='commentWriter'>" + userName + "</div>" + "<div class='commentContent'>" + content + "</div>" + "<div class='commentDate'>" + dateString + "</div></div>" + "<div class='createReply " + replySourceIdx + "'>" + "<input type='text' class='content'>" + "<div class='makeBtn' style='width:40px;'>작성</div></div>";
        $('.commentZone').append(element);
      }
    },
    error:function() {
      console.log('fail');
    }
  });
});
