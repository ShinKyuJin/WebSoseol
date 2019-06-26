 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <style>
       table {
         border:1px solid black;
         border-collapse: separate;
         border-spacing: 0 10px;
       }
       tr {
         border-bottom:10px solid #fff;
       }
     </style>
   </head>
   <body>

     <table>
       <thead>
         <tr>
           <th>번호</th>
           <th style="text-align:left;">제목</th>
           <th>작성자</th>
           <th>날짜</th>
           <th>조회수</th>
         </tr>
       </thead>
       <tbody>
         <?php
            $con = mysqli_connect('miminishin.cafe24.com','miminishin','s7731731','miminishin');
            $sql = "SELECT Idx,Title,Writer,TDate,view FROM NOTICEBOARD";
            $result = mysqli_query($con,$sql);
            $num_rows = mysqli_num_rows($result);
            for($i=0;$i<$num_rows;$i++) {
              echo '<tr>';
              $row = mysqli_fetch_array($result);
              for($j=0;$j<5;$j++) {
                echo '<td>';
                echo $row[$j];
                echo '</td>';
              }

              echo '</tr>';
            }
          ?>
       </tbody>
     </table>

   </body>
 </html>
