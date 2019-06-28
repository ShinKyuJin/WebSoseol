<?php
  $con = mysqli_connect('miminishin.cafe24.com','miminishin','s7731731','miminishin');
  $f1 = $_POST['f1'];
  $f2 = $_POST['f2'];
  $f3 = $_POST['f3'];
  $f4 = $_POST['f4'];
  $f5 = $_POST['f5'];
  $f6 = $_POST['f6'];
  $f7 = $_POST['f7'];
  $BoardName = $_POST['BoardName'];

  $sqlForNumOfBoard = sprintf("SELECT * FROM LISTOFBOARD");
  $res = mysqli_query($con,$sqlForNumOfBoard);
  $BoardCnt = $res->num_rows;

  $s2 = sprintf("CREATE TABLE BOARD'%s' ",$BoardCnt+1,);
  $s2. = "(";
  for($i=1;$i<=7;$i++) {
    if(${'f'.$i} != 'NoOption') {
      $s2. = "'.{${"f".$i}}.'"
      if($i == 1 || $i == 6) { // int
        $s2. = " int,";
      }
      else if($i == 2 || $i == 3) { // varchar
        $s2. = " VARCHAR(255),";
      }
      else if($i == 4) { // text
        $s2. = " text,";
      }
      else if($i == 5) { // datetime/date/time
        if(${"f".$i} == "Datetime") {
          $s2. = " datetime,";
        }
        else if(${"f".$i} == "Date") {
          $s2. = " date,";
        }
      }
      else if($i == 7) { // bool
        $s2. = " bool,";
      }
    }
  }
  $s2. = ")";
  if($s2[strlen($s2) - 2] == ','){
    $s2[strlen($s2) - 2] = '';
  }
  $stmt = mysqli_query($con,$s2);
  if($stmt) {
    $s3 = "INSERT INTO LISTOFBOARD(BoardName,BoardField) VALUES('.$BoardName.','.$s2.')";
    $stmt2 = mysqli_query($con,$s3);
    if($stmt2) {
      echo "<script>alert('성공');</script>";
    }
    else {
      echo "<script>alert('게시판은 만들었으나, LISTOFBOARD에 안들어감');</script>";
    }
  }
  else {
    echo "<script>alert('실패');</script>";
  }

 ?>
