<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="test2.php" method="post" enctype="multipart/form-data">
      <textarea name="name" id = "ckeditor"></textarea>
      <input type="file" name="boardFile">
      <input type="submit">
    </form>
  </body>
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
  <script type="text/javascript">
    window.onload=function() {
      CKEDITOR.replace('ckeditor',{height:'500px'});
    };
  </script>
</html>
