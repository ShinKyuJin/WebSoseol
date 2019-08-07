<?php
  session_start();
  include "db.php";

  $boardIdx = re('boardIdx','post');
  $commentWriter = re('commentWriter','post');
  $commentContent = re('commentContent','post');
  $commentDateTime = date('Y-m-d H:i:s');

  $stmt = mq("INSERT INTO COMMENT_BOARD(
    boardIdx,
    commentWriter,
    commentContent,
    commentDateTime
  ) VALUES(
    '$boardIdx',
    '$commentWriter',
    '$commentContent',
    '$commentDateTime'
  )");

  $row = mysqli_fetch_array(mq("SELECT MAX(commentIdx) FROM COMMENT_BOARD"));
  $replySourceIdx = $row[0];

  if($stmt) {
    echo json_encode(array("res"=>$replySourceIdx));
  }
  else {
    echo json_encode(array("res"=>"fail"));
  }
 ?>
