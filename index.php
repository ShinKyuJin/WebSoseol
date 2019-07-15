<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>CSS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
  </head>
  <body>
    <div id="jb-container">
      <div id="jb-header">
        <img src="logo.png" class="rounded-circle">

          <?php
          include "db.php";
          $sql = "SELECT * FROM LISTOFBOARD";
          $stmt = mysqli_query($con,$sql);
          for($i=0;$i<$stmt->num_rows;$i++) {
            $row = mysqli_fetch_array($stmt);
            $link = 'board.php?categoryIdx='.$categoryIdx;
            echo "
            <a href='$link'>$row[1]</a>
            ";
          }
           ?>
       </div>
      <div id="jb-content">
        <h2>Content</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec mollis nulla. Phasellus lacinia tempus mauris eu laoreet. Proin gravida velit dictum dui consequat malesuada. Aenean et nibh eu purus scelerisque aliquet nec non justo. Aliquam vitae aliquet ipsum. Etiam condimentum varius purus ut ultricies. Mauris id odio pretium, sollicitudin sapien eget, adipiscing risus.</p>
      </div>
      <div id="jb-sidebar">
        <h2>Sidebar</h2>
        <ul>
          <li>Lorem</li>
          <li>Ipsum</li>
          <li>Dolor</li>
        </ul>
      </div>
      <div id="jb-footer">
        <p>Copyright</p>
      </div>
    </div>
  </body>
</html>
