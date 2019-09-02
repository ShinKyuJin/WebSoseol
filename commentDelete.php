<?php
  session_start();
  $commentIdx = re('commentIdx','post');
  $boardIdx = re('boardIdx','post');
  $categoryIdx = re('categoryIdx','post');
  if(isset($_SEESSION['userID'])) {
    $stmt = mq("DELETE FROM COMMENT_BOARD WHERE commentIdx = '$commentIdx'");
    if($stmt) {
      $link = "Location:board.php?ci=".$categoryIdx."&bi=".$boardIdx;
      header($link);
    }
    else {
      echo "삭제 실패";
    }
  }
 ?>
