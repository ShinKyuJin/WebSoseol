<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      include "db.php";
      $stmt = mq("SELECT * FROM LISTOFBOARD");
      for($i=0;$i<$stmt->num_rows;$i++) {
        $row = mysqli_fetch_array($stmt);
        $link = "board.php?categoryIdx=".$row[0]."&boardSubject=".$row[1];
        echo "
        <a href='$link'>$row[1]</a>
        ";
      }
     ?>
  </body>
</html>
