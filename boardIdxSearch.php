<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="boardIdx.css">
  </head>
  <body>
    <?php include "nav.php"; ?>
    검색
    <div class="container">

    <div class="main">
    <table class="table" style="text-align:center;">
      <thead>
        <th>제목</th>
        <th>작성자</th>
        <th>등록일</th>
        <th>조회수</th>
      </thead>
       <tbody>
         <?php
         $search = re('search','get');
         $search = '%'.$search.'%';
         $sql = mq("SELECT * FROM BOARD WHERE boardTitle LIKE '$search'");
         while($row = mysqli_fetch_array($sql)) :
           $link = "board.php?ci=".$row['categoryIdx']."&bi=".$row['boardIdx'];
          ?>
          <tr>
            <td><a href="<?php echo $link; ?>"><?php echo $row['boardTitle']; ?></a></td>
            <td><?php echo $row['boardWriter']; ?></td>
            <td><?php echo substr($row['boardDate'],2,8); ?></td>
            <td><?php echo $row['boardHit']; ?></td>
          </tr>
        <?php endwhile; ?>
       </tbody>
    </table>
  </div>
</div>
    <?php include "footer.php"; ?>
  </body>
</html>
