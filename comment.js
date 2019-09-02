$('.commentMakeBtn').click(function() {
  var commentWriter = $('.commentWriter').val();
  if(!commentWriter) {
    var tmp = confirm("로그인 하시겠습니까?");
    if(tmp) {
      location.href = "login.php";
    }
  }
  else {
    var commentDate = "방금 전";
    var commentContent = $(this).parent().children('.replyCommentTxt').val();
    var boardIdx = $('.boardIdx').val();
    $.ajax({
      type:'post',
      dataType:'json',
      url:'commentPost.php',
      data:{boardIdx:boardIdx,commentWriter:commentWriter,commentContent:commentContent},
      success:function(json) {
        if(json.res == "suc") {
          console.log('suc');
        }
        else {
          console.log('fail');
        }
      },
      error:function() {
        console.log('http 통신 실패');
      }
    })
    commentContent = commentContent.replace(/(?:\r\n|\r|\n)/g, '<br />');
    var element = "<div class='commentsBody'><div class='comment'><i class='fas fa-user-circle'>&nbsp&nbsp"+commentWriter+"</i>&nbsp&nbsp<label class='commentDateTime'>"+commentDate+"</label><br>"+commentContent+"<ul class='more'><li class='rerecoment'>답글달기</li><li class='recommend'> 추천 </li><li class='abuse'>신고</li></ul><div class='reply'><textarea class='replyText' placeholder='답글을 작성해주세요'></textarea><button type='button' class='replyMakeBtn' style='cursor:pointer' >작성</button><input type='hidden' class='replySourceIdx'></div></div></div>";
    $(this).parent().parent().append(element);
    $(this).parent().children('.replyCommentTxt').val('');
    $(document).on('click','.rerecoment',function() {
      $(this).parent().parent().children('.reply').css("display","block");
    });
  }
});
$(document).on('click','.rerecoment',function() {
  $(this).parent().parent().children('.reply').css("display","block");
});

$(document).on('click','.replyMakeBtn',function() {
  if($(this).parent().children('.replyText').val() != "") {
    var commentWriter = $('.commentWriter').val();
    var commentContent = $(this).parent().children('.replyText').val();
    var boardIdx = $('.boardIdx').val();
    var replySourceIdx = $(this).parent().children('.replySourceIdx').val();

    $.ajax({
      type:'post',
      dataType:'json',
      url:'replyPost.php',
      data:{boardIdx:boardIdx,commentWriter:commentWriter,commentContent:commentContent,replySourceIdx:replySourceIdx},
      success:function(json) {
        if(json.res == 'suc') {
          console.log(json.res);
          var element = "<div style='background-color:red;'>hello</div>";
          $(this).parent().parent().html(element);
          console.log("댓글 완성");
          $(this).parent().children('.replyText').val('');
        }
        else {
          console.log("fail");
        }
      },
      error:function() {
        console.log('http통신 실패');
      }
    })
  }
});
