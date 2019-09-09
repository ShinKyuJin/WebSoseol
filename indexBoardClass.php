<?php
  class boardClass {
    public function echoBoard($categoryIdx) {
      $boardSubject = mysqli_fetch_array(mq("SELECT * FROM LISTOFBOARD WHERE categoryIdx='$categoryIdx'"));
      $board = mq("SELECT * FROM BOARD WHERE categoryIdx='$categoryIdx' LIMIT 5");

      echo "
      <div class='Board'>
        <h3>
        ".$boardSubject['boardSubject']."</h3>
        <table style='border-top:1px solid black'>

          <thead>
            <th></th>
            <th></th>
            <th></th>
          </thead>
          <tbody>";
          while($boardRow = mysqli_fetch_array($board)) :
            echo "<tr><td><a href='board.php?ci=".$categoryIdx."&bi=".$boardRow['boardIdx']."'>".$boardRow['boardTitle']."</a></td>
              <td>".$boardRow['boardDate']."</td><td>".$boardRow['boardWriter']."</td></tr>";
            endwhile;
      echo "</tbody></table></div>";
    }
  }
 ?>
