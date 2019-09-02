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

  if($stmt) {
    echo json_encode(array("res"=>"suc"));
  }
  else {
    echo json_encode(array("res"=>"fail"));
  }
 ?>
