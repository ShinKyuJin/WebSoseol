<?php
  include "db.php";
  class boardClass {
    public function echoBoard($categoryIdx,$num) {
      $row = mysqli_fetch_array(mq("SELECT * FROM BOARD WHERE boardIdx='$categoryIdx'"));
      $row2 = mysqli_fetch_array(mq("SELECT * FROM LISTOFBOARD WHERE boardIdx='$categoryIdx'"));
      echo "<table>".$row2['boardSubject']."<thead><th>1</th><th>2</th></thead>"."<tbody>";
      for($i=0;$i<$num;$i++) {
        echo "<tr>";
        if(strlen($row['boardTitle']) > 20) {
          $row['boardTitle'] = substr($row['boardTitle'],0,20)."...";
        }
        else {
          echo "<td>".$row['boardTitle']."</td>";
        }
        echo "<td>".$row['boardWriter']."</td>";
        echo "</tr>";
      }
      echo "</tbody></table>";
    }
  }
 ?>
