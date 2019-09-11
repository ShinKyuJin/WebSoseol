<?php session_start(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="navStyle.css">
<link rel="stylesheet" href="footerStyle.css">
  <div class="menubar">
      <ul>
        <li><a href="index.php">홈</a></li>
        <li><a href="">게시판</a>
           <ul>
             <?php
             include "db.php";
             $category = mq("SELECT * FROM LISTOFBOARD");
             while($categoryRow = mysqli_fetch_array($category)) :
              ?>
             <li><a href="boardIdx.php?ci=<?php echo $categoryRow['categoryIdx']; ?>"><?php echo $categoryRow['boardSubject']; ?></a></li>
           <?php endwhile; ?>
           </ul>
         </li>
         <li><a href="#">학과 소개</a>
           <ul>
             <?php
             $intro = mq("SELECT * FROM MAJORINTRO");
             while($introRow = mysqli_fetch_array($intro)) :
              ?>
              <li><a href="introduce.php?i=<?php echo $introRow['idx']; ?>"><?php echo $introRow['MajorName']; ?></a></li>
            <?php endwhile;  ?>
           </ul>
         </li>
         <li><a href="#">세종플로우</a>
           <ul>
             <li><a href="">C,C++</a></li>
             <li><a href="">JAVA</a></li>
             <li><a href="">Python</a></li>
             <li><a href="">Javascript</a></li>
           </ul>
         </li>

         <?php if(isset($_SESSION['userID'])) {?>
           <li style="float:right;"><a href="logout.php">로그아웃</a></li>
       <?php }else { ?>
         <li style="float:right;"><a href="login.php">로그인</a></li>
       <?php } ?>
       </ul>
     </div>
