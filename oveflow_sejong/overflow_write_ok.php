
<?php
    include "db.php";

    if($_POST['title'] == '') die();

    $date = date('Y-m-d h:m:s');
    $sql = mq("insert into OVERFLOW_BOARD (contentWriter, contentTitle, contentCategoryNo,
    , contentTextPrimary, contentTextSecondary, contentWriteDateTime, contentIsRoot, contentIsQuestion) 
    values ('vv', '".$_POST['title']."', -1,'".$_POST['content_1']."', '".$_POST['content_2']."', 0, '".$date."', true, true)");
?>

<script type= "text/javascript">alert("글쓰기 성공.");
location.replace("index_no.html");</script>
