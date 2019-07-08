<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <form class="" action="index.html" method="post">

    <div class="container">
      <table class="table table-hover">
        <thead>
          <th>게시판 선택</th>
          <th>제목</th>
          <th>내용</th>
        </thead>
        <tbody>
          <tr>
            <td><select name="boardSubject">
              <?php
                include "db.php";
                $sql = "SELECT * FROM LISTOFBOARD";
                $stmt = mysqli_query($con,$sql);
                if($stmt) {
                  for($i=0;$i<$stmt->num_rows;$i++) {
                    $row = mysqli_fetch_array($stmt);
                    echo "
                    <option value='$row[0]'>$row[1]</option>
                    ";
                  }
                }
               ?>
            </select></td>
            <td> <input type="text" name="boardTitle"> </td>
            <td> <input type="textarea" name="boardTitle"> </td>
          </tr>
        </tbody>
      </table>
    </div>
  </form>
  </body>
</html>
