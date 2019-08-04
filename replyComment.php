<?php
  session_start();
  include "db.php";
  $boardIdx = $_POST['boardIdx'];
  $commentWriter = $_SESSION['userID'];
  $commentContent = $_POST['commentContent'];
  $commentDateTime = date('Y-m-d H:i:s');
  $replySourceIdx = $_POST['replySourceIdx'];
  $stmt = mq("INSERT INTO COMMENT_BOARD(boardIdx,commentWriter,commentContent,commentDateTime,replySourceIdx) VALUES(
    '$boardIdx',
    '$commentWriter',
    '$commentContent',
    '$commentDateTime',
    '$replySourceIdx'
  )");
  if($stmt) {
    echo json_encode(array("res"=>"suc"));
  }
  else {
    echo json_encode(array("res"=>"hello"));
  }
 ?>
