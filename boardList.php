<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <body>
    <?php include "nav.php"; ?>

    <?php
      include "db.php";
      $stmt = mq('SELECT * FROM LISTOFBOARD');
      while($row = mysqli_fetch_array($stmt)):
        $link = "boardIdx.php?ci=".$row['categoryIdx'];
     ?>
     <div class="container">
     <a href="<?php echo $link; ?>"><?php echo $row['boardSubject']; ?></a>
      </div>
   <?php endwhile; ?>

    <?php include "footer.php"; ?>
  </body>
</html>
