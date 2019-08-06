$('.makeBtn').click(function() {
  var index = $(this).parent().attr('class').split(' ');
  var className = '';
  className = className.concat('.Card',index[1]);
  alert(className);
  var string=  '<div class="Card" style="border:1px solid black; margin-left:10px">
    <div class="replyWriter"><?php echo $replyRow["commentWriter"]; ?></div>
    <div class="replyContent"><?php echo $replyRow["commentContent"]; ?></div>
    <div class="replyDate"><?php echo $replyRow["commentDateTime"]; ?></div>
  </div>'
  $(className).parent().append('

  ');
});
