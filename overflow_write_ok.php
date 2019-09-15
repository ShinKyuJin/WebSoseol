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

    function parseTag($content_tag, $iidx, $dbs) {
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

        if($tag_sql) return true;
        else return false;
    }

    $categoryNo = $_POST["categoryNo"];

    $content = $_POST['content_1'];
    $content = htmlentities(addslashes($content));
    $content2 = $_POST['content_2'];
    $content2 = htmlentities(addslashes($content2));
    $contentTags = $_POST['content_tag'];

    $isRoot = $_POST['root'];
    $rootIdx = $_POST['rootIdx'];
    $userID = $_POST['userID'];
    $themeno = (int)($_POST['theme_no']);

    echo $userID;
    if(!$userID) die();

    echo 'theme number';
    echo $themeno;
    echo '<br />';
    $title = $_POST['title'];
    if($title == '') die();

    $date = date('Y-m-d h:m:s');

    if($isRoot == 1) $rootIdx = 0;

    echo $content;

    $sql = mq("INSERT INTO OVERFLOW_BOARD (contentWriter, contentTitle, contentCategoryNo,
    contentTextPrimary, contentTextSecondary, contentTextTags, contentWriteDateTime, contentIsRoot,
    contentIsQuestion, contentRootIdx, theme_no)
    values (
        '$userID',
        '$title',
        $categoryNo,
        '$content',
        '$content2',
        '$contentTags',
        '$date',
        $isRoot,
        true,
        $rootIdx,
        $themeno)"
    );

    if($sql) echo 'firstsuc';
    else echo mysqli_error($db);

    $contentIdx = $db->insert_id;
    echo 'contentIdx';
    echo $contentIdx;
    echo '<br />';

    if(parseTag($contentTags, $contentIdx, $db)) {
        $sql4 = mq("SELECT numOfContents FROM OVERFLOW_LISTOFBOARD WHERE categoryIdx = $categoryNo");
        $arr = $sql4->fetch_array();
        $numOfContents = $arr["numOfContents"];
        $numOfContents += 1;
        if($sql) {
            $sql3 = mq("UPDATE OVERFLOW_LISTOFBOARD
                        SET numOfContents = $numOfContents
                        WHERE categoryIdx = $categoryNo");
        }
        if($sql3) echo 'suc';
        else echo mysqli_error($db);
    } else {
        echo 'err';
    }
    header("Location:overflow_board_1.php?ci=$categoryNo");
?>
