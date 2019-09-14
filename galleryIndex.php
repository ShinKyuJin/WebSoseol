<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="boardIdx.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <?php include "nav.php"; ?>
    <?php
      $boardSubject = mysqli_fetch_array(mq("SELECT * FROM LISTOFBOARD WHERE categoryIdx=4"));
      $stmt = mq("SELECT * FROM BOARD WHERE categoryIdx=4");
     ?>
    <div class="container">
        <h1 class="bulletinboard">소융대 갤러리</h1>
      <div class="board_area">
        <div class="search">
          <input type="text" class="input" placeholder="검색어를 입력해주세요." name="search" onkeyup="searchEnterKey()" >
          <button class="btn_search" type="submit"></button>
        </div>
      </div>

      <div class="container">
        <table class="table" style="text-align:center; width: 1200px;">
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
              $link = "galleryBoard.php?bi=".$row['boardIdx'];
              $boardDate = substr($row['boardDate'],0,10) == date('Y-m-d') ? substr($row['boardDate'],10,8) : substr($row['boardDate'],0,10);
              $imagesrc = mysqli_fetch_array(mq("SELECT * FROM FILE_BOARD WHERE boardIdx = $boardIdx"));
              $filepath = "uploadFile/gallery/".$imagesrc['saveName'];
           ?>
           <tr>
             <td><a href="<?php echo $link; ?>"><?php echo $row['boardTitle']; ?></a>[<?php echo $commentCnt->num_rows; ?>]</td>
             <td><?php echo $row['boardWriter']; ?></td>
             <td><?php echo $boardDate; ?></td>
             <td><?php echo $row['boardHit']; ?></td>
             <td><?php echo "<a href='galleryBoard.php?bi=$boardIdx'><img src='$filepath' width='150px' height='150px'></a>"; ?></td>
           </tr>
         <?php endwhile; ?>
        </table>
        <?php
        if(isset($_SESSION['userID'])) :
         ?>
        <div class="submit"><a href="galleryUpload.php">글쓰기</a></div>
      <?php endif; ?>
      </div>
    </div>
  <?php include "footer.php"; ?>
  </body>
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
  </html>
