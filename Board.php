<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $con = mysqli_connect('miminishin.cafe24.com','miminishin','s7731731','miminishin');
    $sql = "SELECT * FROM LISTOFBOARD";
    $stmt = mysqli_query($con,$sql);
    if(!$stmt) echo"연결안댐";
    echo '
    <table>
      <thead>
        <th>게시판 이름</th>
      </thead>
      <tbody>
        <tr>
    ';
    for($i=0;$i<$stmt->num_rows;$i++) {
      $row = mysqli_fetch_array($stmt);
      if($row){
        echo "<td>$row[1]</td>";
      }
    }
    echo '
    </tr>
    </tbody>
    </table>
    ';
     ?>


  </body>
</html>
