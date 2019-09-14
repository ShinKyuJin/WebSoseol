<?php session_start(); include_once "db.php"; ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="navStyle.css">
<link rel="stylesheet" href="footerStyle.css">
  <div class="menubar">
      <ul>
        <li><?php
            $isLogo = mq("SELECT * FROM ADMINFILE WHERE category = 'logo' AND selected = 1");
            if($logoRow = mysqli_fetch_array($isLogo)) { ?>
            <img src="<?php echo "admin/logo/".$logoRow["saveName"]; ?>" width="50px" height="50px" />
          <?php } ?>

        </li>
        <li><a href="index.php">홈</a></li>
        <li><a href="boardIdx.php?ci=1">게시판</a>
           <ul>
            <?php
             $category = mq("SELECT * FROM LISTOFBOARD");
             while($categoryRow = mysqli_fetch_array($category)) :
              ?>
             <li><a href="boardIdx.php?ci=<?php echo $categoryRow['categoryIdx']; ?>"><?php echo $categoryRow['boardSubject']; ?></a></li>
           <?php endwhile; ?>
           </ul>
         </li>
         <li><a href="introduce.php?i=1">학과 소개</a>
           <ul>
             <?php
             $intro = mq("SELECT * FROM MAJORINTRO");
             while($introRow = mysqli_fetch_array($intro)) :
              ?>
              <li><a href="introduce.php?i=<?php echo $introRow['idx']; ?>"><?php echo $introRow['MajorName']; ?></a></li>
            <?php endwhile;  ?>
           </ul>
         </li>
         <li><a href="galleryIndex.php">갤러리</a></li>
         <li><a href="overflow_main.php">오버플로우세종</a>
           <ul>
           <?php
             $ovfl = mq("SELECT * FROM OVERFLOW_LISTOFBOARD");
             while($ovflRow = mysqli_fetch_array($ovfl)) :
              ?>
             <li><a href="overflow_board_1.php?ci=<?php echo $ovflRow['categoryIdx']; ?>"><?php echo $ovflRow['categorySubject']; ?></a></li>
             <?php endwhile; ?>
           </ul>
         </li>
         <li><a href="admin_portal.php">관리자페이지</a>
           <ul>
              <li><a href="admin_portal.php">ADMIN</a></li>
           </ul>
         </li>

         <?php if(isset($_SESSION['userID'])) {?>
           <li style="float:right;"><a href="logout.php">로그아웃</a></li>
       <?php }else { ?>
         <li style="float:right;"><a href="register.php">회원가입</a></li>
         <li style="float:right;"><a href="login.php">로그인</a></li>
       <?php } ?>
       </ul>
     </div>
