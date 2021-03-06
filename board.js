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
  var replySourceIdx = null;

  if(commentWriter == "") {
    var toLogin = confirm("로그인이 필요한 작업입니다. 로그인 하시겠습니까?");
    if(toLogin) {
      location.href = "login.php";
    }
  }
  if(commentWriter != "" && commentContent == "") {
    alert("한글자 이상을 입력해주세요");
  }
  else {
    $.ajax({
      type:'post',
      dataType:'json',
      url:'commentPost.php',
      async:false,
      data:{commentWriter:commentWriter,commentContent:commentContent,boardIdx:boardIdx},
      success:function(json) {
        if(json.res != 'fail') {
          console.log(json.res);
          replySourceIdx = json.res;
        }
        else {
          console.log("fail2");
        }
      },
      error:function() {
        console.log('fail');
      }
    })
    var element = "<div class='commentCard'><div class='commentWriter'><i class='fas fa-user'></i>"+commentWriter+"</div>"+"<div class='commentDateTime'>&nbsp&nbsp&nbsp"+commentDateTime+"</div>" + "<div class='recommentContent'>"+commentContent+"</div><div class='replyMakeZone'><input type='text' class='replyContent' placeholder='대댓글을 입력하세요.'><button type='button' class='replyMakeBtn'>작성</button></div>"+"<input type='hidden' class='commentIdx' value='"+replySourceIdx+"'></div>";
    $(this).parent().parent().append(element);
    var commentContent = $('.commentContent').val("");
  }
});

$(document).on('click','.replyMakeBtn',(function() {
  var commentWriter = $('.userID').val();
  var commentContent = $(this).parent().children('.replyContent').val();
  var commentDateTime = "방금 전";
  var replySourceIdx = $(this).parent().parent().children('.commentIdx').val();

  if(commentWriter == "") {
    var toLogin = confirm("로그인이 필요한 작업입니다. 로그인 하시겠습니까?");
    if(toLogin) {
      location.href = "login.php";
    }
  }
  else if(commentWriter != "" && commentContent == "") {
    alert("한글자 이상을 입력해주세요");
  }
  else {
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
    commentContent = commentContent.replace(/(<([^>]+)>)/ig,"");
    var element = "<div class='replyCard'><div class='reCommentZone'><div class='commentWriter'><i class='fas fa-user'></i>"+commentWriter+"</div><div class='commentDateTime'>&nbsp&nbsp"+commentDateTime+"</div><div class='recommentContent'>"+commentContent+"</div></div></div>";
    $(this).parent().parent().append(element);
    var commentContent = $(this).parent().children('.replyContent').val("");
  }
}));


$('.thumb').click(function() {
  var recommendID = $('.userID').val();
  var boardIdx = $('.boardIdx').val();
  var isRecommend = $('.isRecommend').val();
  var num = $(this).children('recommendSpan').val();
  if(recommendID == "") {
    var toLogin = confirm("로그인이 필요한 작업입니다. 로그인 하시겠습니까?");
    if(toLogin) {
      location.href = "login.php";
    }
  }
  else {
    var num = 0;
    if(isRecommend == 1) {
      $.ajax({
        type:'post',
        dataType:'json',
        async:false,
        url:'recommend.php',
        data:{boardIdx:boardIdx,reID:recommendID,isRecommend:isRecommend},
        success:function(json) {
          if(json.res != 'fail') {
            num = json.res;
          }
          else {
            console.log('fail2');
          }
        },
        error:function() {
          console.log('fail');
        }
      })
      $('.isRecommend').val("0");
      console.log(typeof num);
      console.log(num);
      $(this).children('.recommendSpan').text(num);
      $(this).css("border","2px solid #990e17");
    }
    else {
      $.ajax({
        type:'post',
        dataType:'json',
        async:false,
        url:'recommend.php',
        data:{boardIdx:boardIdx,reID:recommendID,isRecommend:isRecommend},
        success:function(json) {
          if(json.res != 'fail') {
            num = json.res;
          }
          else {
            console.log('fail2');
          }
        },
        error:function() {
          console.log('fail');
        }
      })
      $('.isRecommend').val("1");
      console.log(typeof num);
      console.log(num);
      $(this).children('.recommendSpan').text(num);
      $(this).css("border","2px solid #00f");
    }
  }
});
