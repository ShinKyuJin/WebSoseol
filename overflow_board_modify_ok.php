<?php
    include "db.php";

    $index = $_POST['idx'];
    $title = $_POST['title'];
    $contentPri = $_POST['content_1'];
    $contentPri = htmlentities(addslashes($contentPri));
    $contentSec = $_POST['content_2'];
    $contentTags = $_POST['content_tag'];
    $theme_no = $_POST['theme_no'];
    $date = date('Y-m-d h:m:s');

    function parseTag($content_tag, $iidx) {
        //1. 정규식을 통해 개행과 탭 제거 후 공백 문자를 모두 ','로 대체
        //2. 중복된 ,가 있는 경우 하나로 만들기
        //3. 문자열의 맨 마지막에 ,가 있으면 무효화
        //4. explode를 사용해서 태그 분할

        echo $iidx;
        echo '<br/>';

        $content_tag = str_replace(" ", ",", $content_tag);
        $content_tag = preg_replace('/\r\n|\r|\n/','',$content_tag);
        $content_tag = preg_replace('/,+/',',',$content_tag);
        $tag_array = array_unique(explode(",", $content_tag));

        echo count($tag_array);
        echo '<br/>';

        for($i = 0; $i < count($tag_array); $i++) {
            echo $tag_array[$i];
            echo '<br/>';

            $tag_sql = mq("INSERT INTO OVERFLOW_BOARD_TAG_RELATION (
                contentIdx, tagName) values (
                '$iidx',
                '$tag_array[$i]')"
                );
        }

        if($tag_sql) echo 'suc';
        else echo 'fuck2';
        echo '< br/>';
    }

    //$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);

    $sql = mq("UPDATE OVERFLOW_BOARD
            SET contentTitle = '$title',
            contentTextPrimary = '$contentPri',
            contentTextSecondary = '$contentSec',
            contentTextTags = '$contentTags',
            contentWriteDateTime = '$date',
            theme_no = '$theme_no'
            WHERE contentIdx = $index");

    $sql3 = mq("DELETE from OVERFLOW_BOARD_TAG_RELATION where contentIdx = '$index'");

    parseTag($contentTags, $index);

    if($sql) {
         echo 'suc2'; 
         if($sql3) echo 'suc3'; 
         else echo 'wrong1';
    }
    else echo 'wrong2';
?>
