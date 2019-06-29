<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="/css/nav.css">
    <style media="screen">
      html,body {
        height: 100%;
        overflow: hidden;
        margin-left:0;
        margin-top:0;
      }
      div {
        margin:0;
        float:left;
      }
      .navBox {
        width:15%;
        height: 100%;
      }
      .iFrameBox {
        width:85%;
        height:100%;
      }
    </style>
  </head>
  <body>
      <?php
      $con = mysqli_connect('miminishin.cafe24.com','miminishin','s7731731','miminishin');
      $sql = "SELECT * FROM LISTOFBOARD";
      $stmt = mysqli_query($con,$sql);
      echo "";
      echo "<div class='navBox'>";
      for($i = 0;$i<$stmt->num_rows;$i++) {
        $res = mysqli_fetch_array($stmt);
        echo "
        <button type='button' name = ''>$res[0]</button>
        "; #여기까지했었음
      }
      echo "</div>";

      $cur_src = "index.php";
        echo "
        <div class='iFrameBox'>
          <iframe src='$cur_src' width='100%' height='100%'></iframe>
        </div>";
       ?>
       <iframe src="" width="" height=""></iframe>
  </body>
</html>
