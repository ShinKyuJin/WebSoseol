var categoryIdx = $('.categoryIdx').val();
var boardIdx = $('.boardIdx').val();

$('.modify').click(function() {
  var link = "modifyBoard.php?bi=" + boardIdx + "&ci=" + categoryIdx;
  location.href = link;
});

$('.delete').click(function() {
  var tmp = confirm("정말 삭제하시겠습니까?");
  if(tmp) {
    var link = "deleteBoard.php?bi=" + boardIdx + "&ci=" + categoryIdx;
    location.href = link;
  }
});

$('.list').click(function() {
  var link = "boardIdx.php?ci=" + categoryIdx;
  location.href = link;
});

$('.commentMakeBtn').click(function() {
  var commentWriter = $('.userID').val();
  var commentContent = $('.commentContent').val();
  var commentDateTime = "방금 전";
  $.ajax({
    type:'post',
    dataType:'json',
    url:'commentPost.php',
    data:{commentWriter:commentWriter,commentContent:commentContent,boardIdx:boardIdx},
    success:function(json) {
      if(json.res == 'suc') {
        console.log(json.res);
      }
      else {
        console.log("fail2");
      }
    },
    error:function() {
      console.log('fail');
    }
  })
  var element = "<div class='commentCard'><div class='commentWriter'><i class='fas fa-user'>"+commentWriter+"</i></div>"+"<div class='commentDateTime'>&nbsp&nbsp"+commentDateTime+"</div>" + "<div class='commentContent'>"+commentContent+"</div><div class='replyMakeZone'><input type='text' class='replyContent' placeholder='대댓글을 입력하세요.'><button type='button' class='replyMakeBtn'>작성</button></div></div>";
  $(this).parent().parent().append(element);
});

$(document).on('click','.replyMakeBtn',(function() {
  var commentWriter = $('.userID').val();
  var commentContent = $(this).parent().children('.replyContent').val();
  var commentDateTime = "방금 전";
  var replySourceIdx = $(this).parent().parent().children('.commentIdx').val();
  $.ajax({
    type:'post',
    dataType:'json',
    url:'replyPost.php',
    data:{commentWriter:commentWriter,commentContent:commentContent,boardIdx:boardIdx,replySourceIdx:replySourceIdx},
    success:function(json) {
      if(json.res == 'suc') {
        console.log(json.res);
      }
      else {
        console.log("fail2");
      }
    },
    error:function() {
      console.log('fail');
    }
  })
  var element = "<div class='replyCard'><div class='commentWriter'><i class='fas fa-user'>"+commentWriter+"</i></div><div class='commentDateTime'>&nbsp&nbsp"+commentDateTime+"</div><div class='commentContent'>"+commentContent+"</div></div>";
  $(this).parent().parent().append(element);
}));
