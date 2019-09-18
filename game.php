<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php include "nav.php"; ?>

    <canvas id="gameContainer" style="width:1800px;height:300px;background-color:#f1f1f1;" >

    </canvas>

    <iframe src="rank.php" width="100%" height="500px"></iframe>


    <?php include "footer.php"; ?>
  </body>
  <script type="text/javascript">
  $(document).on("keydown.disableScroll", function(e) {
      var eventKeyArray = [32, 33, 34, 35, 36, 37, 38, 39, 40];
      for (var i = 0; i < eventKeyArray.length; i++) {
          if (e.keyCode === eventKeyArray [i]) {
              e.preventDefault();
              return;
          }
      }
  });
  </script>
</html>
