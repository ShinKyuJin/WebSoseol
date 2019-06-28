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

  $s1 = "SELECT * FROM LISTOFBOARD";
  $stmt = mysqli_query($con,$s1);
  $boardCnt = mysqli_num_rows($stmt);
  $k = (string)$boardCnt;
  $name = "BOARD"."$k";
  $s2 = "CREATE TABLE $name";
  $s2 = $s2."(";
  for($i=1;$i<=7;$i++) {
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
        $s2 = $s2.${"f".$i." bool"};
      }
    }
  }
  $s2 = $s2."PRIMARY KEY($f1)";
  $s2 = $s2.");";
  if($s2[strlen($s2)-3] == ',') {
    $s2[strlen($s2)-3] = ' ';
  }
  echo $s2;
  $res = mysqli_query($con,$s2);
  if($res) {
    echo "Table 만들기 성공";
  }
  else {
    echo "실패";
  }
 ?>
