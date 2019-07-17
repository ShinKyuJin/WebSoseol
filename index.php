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
       </div>
      <div id="jb-content">
        <h2>Content</h2>
        <?php include "board.php"; ?>
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
  <script type="text/javascript">
    var boardContent = <?php

     ?>;
  </script>
</html>
