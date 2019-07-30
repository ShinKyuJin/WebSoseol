

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
        console.log('hello');
      }
      else {
        console.log('fuck');
      }
    },
    error:function() {
      console.log('fail');
    }
  })
});
