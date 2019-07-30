<?php
  include "db.php";
  class boardClass {
    public function echoBoard($categoryIdx,$num) {
      $stmt = mq("SELECT * FROM BOARD ORDER BY boardIdx desc LIMIT $num");
      $row2 = mysqli_fetch_array(mq("SELECT boardSubject FROM LISTOFBOARD WHERE categoryIdx='$categoryIdx'"));
      echo "<table class='table table-hover'>"."<h2>최근 글</h2>"."<thead><th></th><th></th><th></th></thead>"."<tbody>";
      for($i=0;$i<$num;$i++) {
        $row = mysqli_fetch_array($stmt);
        $date = '';
        if(substr($row['boardDate'],0,10) == date("Y-m-d")) {
          $date = substr($row['boardDate'],10,8);
        }
        else {
          $date = substr($row['boardDate'],0,10);
        }
        echo "<tr>";
        if(strlen($row['boardTitle']) > 40) {
          $row['boardTitle'] = substr($row['boardTitle'],0,40)."...";
        }
        $boardIdx = $row['boardIdx'];
        $link = "board.php?bi=$boardIdx";

        echo "<td><a href='$link'>".$row['boardTitle']."</a></td>";
        echo "<td>".$row['boardWriter']."</td>";
        echo "<td>".$date."</td>";
        echo "</tr>";
      }
      echo "</tbody></table>";
    }
  }
 ?>
