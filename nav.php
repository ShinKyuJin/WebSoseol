<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="navStyle.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div class="menubar">
      <ul>
        <li><a href="index.php">홈</a></li>
        <li><a href="#">게시판</a>
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
             <li><a href="">소프트웨어학과</a></li>
             <li><a href="">컴퓨터공학과</a></li>
             <li><a href="">정보보호학과</a></li>
             <li><a href="">데이터사이언스학과</a></li>
             <li><a href="">지능기전공학부</a></li>
             <li><a href="">창의소프트학부</a></li>
             <li><a href="">디지털콘텐츠학과</a></li>
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


         <li style="float:right;"><a href="login.php">로그인</a></li>
       </ul>
     </div>
  </body>
</html>
