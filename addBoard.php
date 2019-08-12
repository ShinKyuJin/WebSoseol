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
            include "db.php";
            $stmt = mq("SELECT * FROM LISTOFBOARD");
            while($row = mysqli_fetch_array($stmt)) {
              echo "<li><a href='boardIdx.php?ci=".$row['categoryIdx']."'>".$row['boardSubject'].'</a></li>';
            }
           ?>
        </ul>
      </div>
      <form class="" action="addBoard_ok.php" method="post" style="width: 100%;">
        <table class="writing">
          <tbody>
            <tr class="form-group">
              <th scope="row">제목</th>
              <td colspan="3">
                <input type="text" name="boardTitle" class="form-control" placeholder="제목" >
              </td>
            </th>

           <tr class="md-form">
              <th scope="row">내용</th>
              <td colspan="3">
                <textarea name="boardContent" id="ckeditor" style="resize: none; border: 1px solid #e1e1e1;"></textarea>
              </td>
            </th>

            <tr class="md-form">
               <th scope="row">파일첨부</th>
               <td colspan="3">
                 <input type="file" name="fileName">
               </td>
             </th>
           </tbody>
         </table>

         <div class="buttonBox">
           <input type="submit" name="" value="저장" style="float:right;" class="buttons">
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
