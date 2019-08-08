
<?php
    include "db.php";

    $content = $_POST['content_1'];
    $content = htmlentities(addslashes($content));
    $content2 = $_POST['content_2'];

    $title = $_POST['title'];
    if($title == '') die();

    $date = date('Y-m-d h:m:s');
    $sql = mq("INSERT INTO OVERFLOW_BOARD (contentWriter, contentTitle, contentCategoryNo,
    contentTextPrimary, contentTextSecondary, contentWriteDateTime, contentIsRoot, contentIsQuestion) 
    values (
        'admin',
        '$title',
        -1,
        '$content',
        '$content2',
        '$date',
        true,
        true)");

    if($sql) echo 'suc';
    else echo mysqli_error($con);
?>
