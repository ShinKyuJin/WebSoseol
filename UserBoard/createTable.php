<?php
  $con = mysqli_connect('miminishin.cafe24.com','miminishin','s7731731','miminishin');
  $f1 = $_POST['f1'];
  $f2 = $_POST['f2'];
  $f3 = $_POST['f3'];
  $f4 = $_POST['f4'];
  $f5 = $_POST['f5'];
  $f6 = $_POST['f6'];
  $f7 = $_POST['f7'];
  $BoardName = mysqli_real_escape_string($con,$_POST['BoardName']);

  $s1 = "SELECT MAX(Idx) AS hello FROM LISTOFBOARD";
  $st = mysqli_query($con,$s1);
  $row = mysqli_fetch_array($st);

  if($row['hello'] == 0) {
    $name = "BOARD0";
  }
  else {
    $name = "BOARD".$row['hello'];
  }

  $s2 = "CREATE TABLE $name";
  $s2 = $s2."(";
  for($i=1;$i<8;$i++) {
    if(${"f".$i} != 'NoOption') {
      if($i == 1||$i == 6) { // int
        $s2 = $s2.${"f".$i}." int";
        if($i == 1) {
          $s2 = $s2." auto_increment";
        }
        $s2 = $s2.",";
      }
      else if($i == 2 || $i == 3) { // varchar(255)
        $s2 = $s2.${"f".$i}." varchar(255),";
      }
      else if($i == 4) { // text
        $s2 = $s2.${"f".$i}." text,";
      }
      else if($i == 5) { // datetime,date
        if(${"f".$i} == "Datetime") {
          $s2 = $s2.${"f".$i}." datetime,";
        }
        else if(${"f".$i} == "Date") {
          $s2 = $s2.${"f".$i}." date,";
        }
      }
      else if($i == 7) { // bool
        $s2 = $s2.${"f".$i}." bool,";
      }
    }
  }

  if($s2[strlen($s2)-1] != ',') {
    $s2[strlen($s2)-1] = ',';
  }
  $s2 = $s2."PRIMARY KEY($f1), FOREIGN KEY($f2) REFERENCES USERPROFILE(userID)";
  $s2 = $s2.");";
  echo $s2;
  $res = mysqli_query($con,$s2);
  if($res) {
    $s3 = "INSERT INTO LISTOFBOARD(BoardName,BoardField,Idx,BoardID) VALUES('$BoardName','$s2','','$name')";
    $res2 = mysqli_query($con,$s3);
    if($res2) {
      echo "<script>alert('게시판 만들기 성공');</script>";
    }
    else {
      echo "<script>alert('게시판은 만들었으나, 보드리스트에 안들어감');</script>";
    }
  }
  else {
    echo "<script>alert('Fail');</script>";
  }
 ?>
