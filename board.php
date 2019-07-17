<?php
include "db.php";
$categoryIdx = $_GET['categoryIdx'];
$row = mysqli_fetch_array(mq("SELECT * FROM LISTOFBOARD WHERE categoryIdx='$categoryIdx'"));
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style media="screen">
      td,th {
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <table>
        <h1><?php echo $row[1]; ?></h1>
        <thead>
          <tr>
            <th>번호</th>
            <th>제목</th>
            <th>작성자</th>
            <th>작성일</th>
            <th>조회수</th>
          </tr>
        </thead>
        <tbody>
            <?php
            $stmt = mq("SELECT * FROM BOARD WHERE categoryIdx='$row[0]'");
            while($row1 = mysqli_fetch_array($stmt)) {
             ?>
             <tr>
             <td><?php echo $row1['boardIdx']; ?></td>
             <td><?php echo $row1['boardTitle']; ?></td>
             <td><?php echo $row1['boardWriter'] ?></td>
             <td><?php if(substr($row1['boardDate'],0,10) != date('Y-m-d')) echo substr($row1['boardDate'],0,10); else echo substr($row1['boardDate']);?></td>
             <td><?php echo $row1['boardHit']; ?></td>
           </tr>
           <?php } ?>
        </tbody>
      </table>
    </div>

  </body>
</html>
