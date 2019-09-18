<?php
  session_start();

  include "db.php";

  $boardTitle = re('boardTitle3','post');
  $categoryIdx = re('categoryIdx3','post');
  $boardContent = re('boardContent3','post');
  $boardIdx = re('boardIndex','post');
  $boardDate = date('Y-m-d H:i:s');

  $file = $_FILES['boardImage3'];
  $encFile = md5(uniqid(rand(), true));

  $fileOriginName = $file['name'];
  $path = substr($file['name'], strrpos($file['name'], '.') + 1);
  $path = md5(microtime()) . '.' . $path;

  $upload_directory = 'uploadFile/gallery/';

  echo $fileOriginName;
  echo '<br/>'; echo $path;   echo '<br/>';

  if(move_uploaded_file($file['tmp_name'], $upload_directory.$path)) {
    chmod($upload_directory.$path, 0777);

    echo 'suc';

  $stmt = mq("UPDATE FILE_BOARD SET(
    fileExt = '$encFile',
    originName = '$fileOriginName',
    saveName = '$path',
    regDate = '$boardDate'
    WHERE boardIdx = $boardIdx)");
  }
  $stmt = mq("UPDATE BOARD SET boardTitle='$boardTitle',boardContent='$boardContent'
  WHERE boardIdx='$boardIdx' and categoryIdx = 4");

  $link = "galleryIndex.php";

  if($stmt) {
    //header("Location:$link");
  }
  else {
    echo getErrorMsg();
  }
?>
