<?php
  session_start();
  header('Content-type: text/html; charset=utf-8');

  $db = new mysqli("miminishin.cafe24.com", "miminishin", "s7731731", "miminishin");
  $db->set_charset("utf8");

  function mq($sql)
  {
    global $db;
    return $db->query($sql);
  }

  function re($string,$method) { // mysqli_real_escape_string
    global $db;
    if($method == 'post' || $method == 'POST'){
      return mysqli_real_escape_string($db,$_POST[$string]);
    }
    else if($method == 'get' || $method == 'GET'){
      return mysqli_real_escape_string($db,$_GET[$string]);
    }
  }

  $categoryIdx = 4;
  $boardTitle = re('boardTitle','post');
  $boardWriter = $_POST['userID'];
  $boardContent = re('boardContent','post');
  $boardFile = re('boardFile','post');
  $boardDate = date('Y-m-d H:i:s');

  $file = $_FILES['boardImage'];
  $encFile = md5(uniqid(rand(), true));
  $fileOriginName = $file['name'];
  $path = substr($file['name'], strrpos($file['name'], '.') + 1);
  $path = md5(microtime()) . '.' . $path;

  $upload_directory = 'uploadFile/gallery/';


  $sql = mq("INSERT INTO BOARD(
    categoryIdx,
    boardTitle,
    boardWriter,
    boardContent,
    boardFile,
    boardDate
  ) VALUES(
    '$categoryIdx',
    '$boardTitle',
    '$boardWriter',
    '$boardContent',
    '$fileOriginName',
    '$boardDate'
  )");

  $boardIdx = $db->insert_id;
  echo $boardIdx; echo '<br />';

  if(move_uploaded_file($file['tmp_name'], $upload_directory.$path)) {
    chmod($upload_directory.$path, 0777);
  $sql2 = mq("INSERT INTO FILE_BOARD(
    boardIdx,
    fileExt,
    originName,
    saveName,
    regDate
  ) VALUES(
    '$boardIdx',
    '$encFile',
    '$fileOriginName',
    '$path',
    '$boardDate'
  )");

  $link = 'galleryIndex.php';

  if($sql) {
    echo $boardIdx; echo '<br />';
    echo $encFile; echo '<br />';
    echo $fileOriginName; echo '<br />';
    echo $path; echo '<br />';
    echo $boardDate; echo '<br />';

    if($sql2) {
      echo 'suc2';
      header("Location:$link");
    } else {
      echo mysqli_error($db);
    }
  }
  else {
    echo mysqli_error($db);
  }
}
 ?>
