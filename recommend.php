<?php
  include_once "db.php";

  $boardIdx = re("boardIdx",'post');
  $reID = re("reID",'post');
  $isRecommend = re("isRecommend",'post');

  $sql = $isRecommend == "1" ? $sql = mq("DELETE FROM RECOMMEND WHERE boardIdx='$boardIdx' AND reID='$reID'") : $sql = mq("INSERT INTO RECOMMEND(boardIdx,reID) VALUES('$boardIdx','$reID')");

  if($sql) {
    echo json_encode(array("res"=>"suc"));
  }
  else {
    echo json_encode(array("res"=>"fail"));
  }
 ?>
