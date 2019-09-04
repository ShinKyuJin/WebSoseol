<?php
public function compareDate($date) {
  $result = strtotime(date("Y-m-d H:i:s"))-strtotime($date);
  $result = (int)$result;
  if($result / 31536000 >= 1) {
    return floor($result / 31536000)."년 전";
  }
  else if($result / 2592000 >= 1) {
    return floor($result / 2592000)."달 전";
  }
  else if($result / 86400 >= 1) {
    return floor($result / 86400)."일 전";
  }
  else if($result / 3600 >= 1) {
    return floor($result / 3600)."시간 전";
  }
  else if($result / 60 >= 1) {
    return floor($result / 60)."분 전";
  }
  else {
    return "방금 전";
  }
}    

 ?>
