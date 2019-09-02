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

  $getCommentIdx = mysqli_fetch_array(mq("SELECT * FROM COMMENT_BOARD ORDER BY commentIdx desc LIMIT 1"));
  $commentIdx = $getCommentIdx['commentIdx'];
  if($stmt) {
    echo json_encode(array("res"=>"$commentIdx"));
  }
  else {
    echo json_encode(array("res"=>"fail"));
  }
 ?>
