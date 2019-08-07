<?php
  include "db.php";
  $row = mysqli_fetch_array(mq("SELECT MAX(commentIdx) FROM COMMENT_BOARD"));
  $replySourceIdx = $row[0];
  echo $replySourceIdx;
 ?>
