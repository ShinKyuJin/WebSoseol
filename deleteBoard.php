<?php
  include "db.php";
  $boardIdx = re('bi','get');
  $categoryIdx = re('ci','get');
  $stmt = mq("DELETE FROM FILE_BOARD WHERE boardIdx='$boardIdx'"); 
  $stmt = mq("DELETE FROM COMMENT_BOARD WHERE boardIdx='$boardIdx'");
  $stmt = mq("DELETE FROM BOARD WHERE boardIdx='$boardIdx'");
  $string = "Location:boardIdx.php?ci=".$categoryIdx;
  header($string);
 ?>
