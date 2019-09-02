<?php
  include "db.php";

  $boardTitle = $_POST['boardTitle3'];
  $categoryIdx = $_POST['categoryIdx3'];
  $boardContent = $_POST['boardContent3'];
  $boardIdx = $_POST['boardIdx3'];

  $stmt = mq("UPDATE BOARD SET boardTitle='$boardTitle',boardContent='$boardContent' WHERE boardIdx='$boardIdx'");

  $link = "board.php?ci=".$categoryIdx."&bi=".$boardIdx;
  if($stmt) {
    header("Location:$link");
  }
  else {
    echo getErrorMsg();
  }
 ?>
