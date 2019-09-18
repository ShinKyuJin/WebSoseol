<?php
  include_once "db.php";

  $boardIdx = re("boardIdx",'post');
  $reID = re("reID",'post');
  $isRecommend = re("isRecommend",'post');

  $sql = $isRecommend == "1" ? $sql = mq("DELETE FROM RECOMMEND WHERE boardIdx='$boardIdx' AND reID='$reID'") : $sql = mq("INSERT INTO RECOMMEND(boardIdx,reID) VALUES('$boardIdx','$reID')");

  $sql2 = mq("SELECT * FROM RECOMMEND WHERE boardIdx='$boardIdx'");

  if($sql) {
    echo json_encode(array("res"=>$sql2->num_rows));
  }
  else {
    echo json_encode(array("res"=>"fail"));
  }
 ?>
