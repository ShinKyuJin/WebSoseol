<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    #include "blankPage.php";
     ?>
     <form action="BoardMaker_ok.php" method="post">
       <select name="boardType">
         <option value="Image">사진</option>
         <option value="Text">글</option>
         <option value="File">파일</option>
         <option value="Image">사진,글</option>
         <option value="Image">사진,파일</option>
         <option value="Image">글,파일</option>
         <option value="Image">사진,글,파일</option>
       </select>
       <input type="text" name="boardSubject" value="">
       <input type="submit" name="subBtn">
     </form>
  </body>
</html>
