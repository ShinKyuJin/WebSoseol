<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table>
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
         include "db.php";
         $res = mq("SELECT * FROM BOARD");
         while($row = mysqli_fetch_assoc($res)) {
           $date = substr($row['boardDate'],0,10);
           $time = substr($row[7],10,18);

           echo $row['boardDate'];
           if($date == Date('Y-m-d'))
            $row['boardDate'] = $time;
          else
            $row['boardDate'] = $date;

        ?>
        <tr>
          <td><?php echo $row['Idx']; ?></td>
          <td><?php echo $row['boardTitle']; ?></td>
          <td><?php echo $row['boardWriter']; ?></td>
          <td><?php echo $row['boardDate']; ?></td>
          <td><?php echo $row['boardHit']; ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </body>
</html>
