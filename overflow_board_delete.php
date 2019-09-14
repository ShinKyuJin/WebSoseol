<?php
    session_start();
    include "db.php";

    $contentIdx = re('idx','get');
    $isRoot = re('isR', 'get');
    $categoryNo = re('ci', 'get');

    $string = "Location:overflow_board_1.php?ci=".$categoryNo;


    $sql = $sql = mq("SELECT * from OVERFLOW_BOARD where contentIdx='" . $contentIdx . "'");
    $board = $sql->fetch_array();
    $user = $board["contentWriter"];
    if(!isset($_SESSION['userID']) || $_SESSION['userID'] != $user) { 
        echo "<script>alert('권한 없음');</script>";
        header($string);
        die();
    }

    $sql4 = mq("SELECT numOfContents FROM OVERFLOW_LISTOFBOARD WHERE categoryIdx = $categoryNo");
    $arr = $sql4->fetch_array();
    $numOfContents = $arr["numOfContents"];

    if($isRoot == "Y") {
        $sql = mq("SELECT contentIdx FROM OVERFLOW_BOARD WHERE contentRootIdx = '$contentIdx'");
        while($list = $sql->fetch_array()) {
            $stmt = mq("DELETE FROM OVERFLOW_BOARD_TAG_RELATION WHERE contentIdx='$list[contentIdx]'"); 
            $stmt = mq("DELETE FROM OVERFLOW_BOARD WHERE contentIdx='$list[contentIdx]'");
            $numOfContents -= 1;
        }
    }
    $stmt = mq("DELETE FROM OVERFLOW_BOARD_TAG_RELATION WHERE contentIdx='$contentIdx'"); 
    $stmt = mq("DELETE FROM OVERFLOW_BOARD WHERE contentIdx='$contentIdx'");
    $numOfContents -= 1;

    if($stmt) {
        $sql3 = mq("UPDATE OVERFLOW_LISTOFBOARD
                    SET numOfContents = $numOfContents
                    WHERE categoryIdx = $categoryNo");
    }

    header($string);
?>