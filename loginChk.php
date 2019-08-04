<?php
  session_start();
  if(isset($_SESSION['userID'])) {
    echo json_encode(array("res"=>"logged"));
  }
  else {
    echo json_encode(array("res"=>"unlogged"));
  }
 ?>
