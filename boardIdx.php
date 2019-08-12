<?php
  include "db.php";
  $categoryIdx = re('ci','get');
  $boardSubject = mysqli_fetch_array(mq("SELECT * FROM LISTOFBOARD WHERE categoryIdx='$categoryIdx'"));
  $stmt = mq("SELECT * FROM BOARD WHERE categoryIdx='$categoryIdx'");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <?php include "nav.php"; ?>
    <div class="container">
      <table class="table" style="text-align:center;">
        <?php echo $boardSubject['boardSubject']; ?>
        <thead>
          <th>제목</th>
          <th>작성자</th>
          <th>날짜</th>
          <th>조회수</th>
        </thead>
        <?php
          while($row = mysqli_fetch_array($stmt)) :
            $boardIdx = $row['boardIdx'];
            $commentCnt = mq("SELECT * FROM COMMENT_BOARD WHERE boardIdx='$boardIdx'");
            $link = "board.php?bi=".$row['boardIdx']."&ci=".$categoryIdx;
            $boardDate = substr($row['boardDate'],0,10) == date('Y-m-d') ? substr($row['boardDate'],10,8) : substr($row['boardDate'],0,10);
         ?>
         <tr>
           <td><a href="<?php echo $link; ?>"><?php echo $row['boardTitle']; ?></a>[<?php echo $commentCnt->num_rows; ?>]</td>
           <td><?php echo $row['boardWriter']; ?></td>
           <td><?php echo $boardDate; ?></td>
           <td><?php echo $row['boardHit']; ?></td>
         </tr>
       <?php endwhile; ?>
      </table>
      <a href="addBoard.php?ci=<?php echo $categoryIdx; ?>">글쓰기</a>
    </div>
    <?php include "footer.php"; ?>
  </body>
</html>
