<?php
    include_once "db.php";

  $file = $_FILES['boardFile'];
  $encFile = md5(uniqid(rand(), true));
  $fileOriginName = $file['name'];
  $path = substr($file['name'], strrpos($file['name'], '.') + 1);
  $path = md5(microtime()) . '.' . $path;

  $upload_directory = 'uploadFile/';

  if(move_uploaded_file($file['tmp_name'], $upload_directory.$path)) {
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
    
        $link = 'boardIdx.php?ci='.$categoryIdx;
    
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
?>