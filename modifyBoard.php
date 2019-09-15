<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="addBoard.css">
</head>
<body>
    <?php include "nav.php"; ?>
    <div class="container">
      <div class="tab_menu">
        <ul style="height: auto;">
          <?php
          $link = mq("SELECT * FROM LISTOFBOARD");
          while($linkRow = mysqli_fetch_array($link)) : ?>
          <li ><a href="boardIdx.php?ci=<?php echo $linkRow['categoryIdx']; ?>"
            <?php
            if($linkRow['categoryIdx'] == $_GET['ci']) echo "style='background-color:#990e17;color:white;'";

             ?>><?php echo $linkRow['boardSubject']; ?></a></li>
          <?php endwhile; ?>
        </ul>
      </div>
      <form class="" action="modifyBoard_ok.php?ci=<?php echo $linkRow['categoryIdx']; ?>" method="post" style="width: 100%;">
        <table class="writing">
          <tbody>
            <?php
              $boardIdx = re('bi','get');
              $value = mysqli_fetch_array(mq("SELECT boardTitle,boardContent FROM BOARD WHERE boardIdx='$boardIdx'"));
             ?>
            <tr class="form-group">
              <th scope="row">제목</th>
              <td colspan="3">
                <input type="text" name="boardTitle3" class="form-control" placeholder="제목" value="<?php echo $value['boardTitle']; ?>">
              </td>
            </th>

           <tr class="md-form">
              <th scope="row">내용</th>
              <td colspan="3">

                <textarea name="boardContent3" id="ckeditor" style="resize: none; border: 1px solid #e1e1e1;"><?php echo $value['boardContent']; ?></textarea>
              </td>
            </th>

            <tr class="md-form">
               <th scope="row">파일첨부</th>
               <td colspan="3">
                 <input type="file" name="boardFile">
               </td>
             </th>
           </tbody>
         </table>

         <div class="buttonBox">
           <input type="hidden" name="categoryIdx3" value="<?php echo re('ci','get'); ?>">
           <input type="hidden" name="boardIdx3" value="<?php echo re('bi','get'); ?>">
           <input type="submit" name="" value="저장" style="float:right;" class="buttons submitBtn">
         </div>
       </form>
     </div>
     <?php include "footer.php"; ?>
   </body>
   <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
   <script type="text/javascript">
     window.onload=function() {
       CKEDITOR.replace('ckeditor',{height:'500px'});
     };
   </script>
  </html>
