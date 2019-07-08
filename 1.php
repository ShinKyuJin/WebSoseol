<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <?php

    $con = mysqli_connect('miminishin.cafe24.com','miminishin','s7731731','miminishin');
    $sql = "SELECT boardSubject FROM LISTOFBOARD";


    $stmt = mysqli_query($con,$sql);
    echo "<div class='row'>";
    for($i=0;$i<$stmt->num_rows;$i++) {
      echo "<div class='col-sm-5'>";
      $row = mysqli_fetch_array($stmt);
      echo "
      <table class='table table-hover'>
      <thead>
      ";
      echo "
      <th>
        $row[0]
      </th>
      </thead>
      ";
      echo "</table>";
      echo "</div>";
    }
    echo "</div>";

     ?>


  </body>
</html>
