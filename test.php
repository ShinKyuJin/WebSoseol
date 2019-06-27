<?php
  if($_SESSION['EmailSession'] == 'hello'){
    echo "<script>alert('이메일확인 성공');</script>";
  }
  else {
    echo "<script>alert('이메일확인 실패');</script>";
  }
 ?>
