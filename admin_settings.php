<?php
    include_once "db.php";

    function insBoard($param_1, $param_2) {
        $sql_insert = mq("INSERT INTO
        LISTOFBOARD(boardSubject, boardType, isComment, boardAccessLevel) VALUES(
            '$param_1',
            1,
            1,
            $param_2
            )");
    }


    function delBoard($categoryIdx) {
    // delete all
    if($categoryIdx == 4){
        return;
    }
    else {
        $sql_delete = mq("DELETE FROM FILE_BOARD WHERE boardIdx IN
        (SELECT boardIdx FROM BOARD WHERE categoryIdx = $categoryIdx)");
        $sql_delete = mq("DELETE FROM COMMENT_BOARD WHERE boardIdx IN
        (SELECT boardIdx FROM BOARD WHERE categoryIdx = $categoryIdx)");
        $sql_delete = mq("DELETE FROM BOARD WHERE categoryIdx = $categoryIdx");
        $sql_delete = mq("DELETE FROM LISTOFBOARD WHERE categoryIdx = $categoryIdx");
    }
}
    function modBoard($categoryIdx, $param_1, $param_2) {
        mq("UPDATE LISTOFBOARD
            SET boardSubject = '$param_1',
            boardAccessLevel = $param_2
            WHERE categoryIdx = $categoryIdx");
    }

    function insOverflowBoard($param_1, $param_2) {
        $sql_insert = mq("INSERT INTO
        OVERFLOW_LISTOFBOARD(categorySubject, codemirrorMode) VALUES(
            '$param_1',
            '$param_2'
            )");
    }

    function delOverflowBoard($categoryIdx) {
        // delete all
        $sql_delete = mq("DELETE FROM OVERFLOW_BOARD_TAG_RELATION
                        WHERE contentIdx IN (SELECT contentIdx FROM OVERFLOW_BOARD WHERE contentCategoryNo = $categoryIdx)");
        $sql_delete = mq("DELETE FROM OVERFLOW_BOARD WHERE contentCategoryNo = $categoryIdx");
        $sql_delete = mq("DELETE FROM OVERFLOW_LISTOFBOARD WHERE categoryIdx = $categoryIdx");
    }

    function getoffIllegalUser($userID) {
        $sql_delete = mq("DELETE FROM FILE_BOARD WHERE boardIdx IN
        (SELECT boardIdx FROM BOARD WHERE boardWriter = '$userID')");
        if(!$sql_delete) echo 'fail1';
        $sql_delete = mq("DELETE FROM COMMENT_BOARD WHERE commentWriter = '$userID'");
        if(!$sql_delete) echo 'fail2';
        $sql_delete = mq("DELETE FROM BOARD WHERE boardWriter = '$userID'");
        if(!$sql_delete) echo 'fail3';
        $sql_delete = mq("DELETE FROM OVERFLOW_BOARD_TAG_RELATION
                        WHERE contentIdx IN (SELECT contentIdx FROM OVERFLOW_BOARD WHERE contentWriter = '$userID')");
        if(!$sql_delete) echo 'fail4';
        $sql_mod = mq("SELECT categoryIdx, numOfContents FROM OVERFLOW_LISTOFBOARD");
        if(!$sql_mod) echo 'fail60';
        while($sql_m = $sql_mod->fetch_array()) {
            $cnt = 0;
            $categoryId = $sql_m['categoryIdx'];
            $sql_mo2_cnt = $sql_m["numOfContents"];
            echo $categoryId; echo '<br />';
            $sql_mod3 = mq("SELECT count(*) from OVERFLOW_BOARD where contentCategoryNo = $categoryId and contentWriter = '$userID'");
            if(!$sql_mod3) echo 'fail63';

            $sql_mod3f = $sql_mod3->fetch_array();
            $cnt += $sql_mod3f["count(*)"];

            echo $cnt; echo '<br />';
            $sql_mo2_cnt = $sql_mo2_cnt - $cnt;
            echo $sql_mo2_cnt; echo '<br />';

            if($cnt > 0) {
                $sql_delete = mq("DELETE FROM OVERFLOW_BOARD WHERE contentWriter = '$userID' and contentCategoryNo = $categoryId");
                if(!$sql_delete) echo 'fail6';
                $sql_update = mq("UPDATE OVERFLOW_LISTOFBOARD SET numOfContents = $sql_mo2_cnt WHERE categoryIdx = $categoryId");
                if(!$sql_update) echo 'fail62';
            }
        }
        $sql_delete = mq("DELETE FROM USERPROFILE WHERE userID = '$userID'");
        if(!$sql_delete) echo 'fail7';
    }

    function superUser($userID, $userGrant) {
        mq("UPDATE USERPROFILE
            SET userGrant = $userGrant
            WHERE userID = '$userID'");
    }

    function presentLogoInNavigationBar($isPresent) {
        if($isPresent) {
            $sql = mq("SELECT fileIdx FROM ADMINFILE WHERE category ='logo' ORDER BY fileIdx DESC");
            $s = $sql->fetch_array();
            $update = $s["fileIdx"];
            $sql = mq("UPDATE ADMINFILE SET
            selected = 1 WHERE
            fileIdx = $update");
        } else {
            $sql = mq("UPDATE ADMINFILE SET
            selected = 0 WHERE
            category = 'logo'");
        }
    }

    function changeLogo() {
        $file = $_FILES['logoFile'];
        $encFile = md5(uniqid(rand(), true));
        $fileOriginName = $file['name'];
        $path = substr($file['name'], strrpos($file['name'], '.') + 1);
        $path = md5(microtime()) . '.' . $path;

        $upload_directory = 'admin/logo/';

        if(move_uploaded_file($file['tmp_name'], $upload_directory.$path)) {
            $sql3 = mq("UPDATE ADMINFILE SET
            selected = 0 WHERE
            category = 'logo'");

            chmod($upload_directory.$path, 0777);
            $sql2 = mq("INSERT INTO ADMINFILE(
                fileExt,
                originName,
                saveName,
                category
                ) VALUES(
                '$encFile',
                '$fileOriginName',
                '$path'
                ,'logo'
                )");
            $sql = mq("SELECT fileIdx FROM ADMINFILE WHERE category ='logo' ORDER BY fileIdx DESC");
            $s = $sql->fetch_array();
            $update = $s["fileIdx"];
            $sql = mq("UPDATE ADMINFILE SET
            selected = 1 WHERE
            fileIdx = $update");
        }
    }

    function changeStudentPageImage($idx) {
        $file = $_FILES['studentFile'];
        $encFile = md5(uniqid(rand(), true));
        $fileOriginName = $file['name'];
        $path = substr($file['name'], strrpos($file['name'], '.') + 1);
        $path = md5(microtime()) . '.' . $path;

        $upload_directory = 'admin/introduction/';

        if(move_uploaded_file($file['tmp_name'], $upload_directory.$path)) {
            chmod($upload_directory.$path, 0777);
              $sql2 = mq("UPDATE MAJORINTRO SET
              fileExt = '$encFile',
              originName = '$fileOriginName',
              saveName = '$path' WHERE
              idx = '$idx'");
          }
    }

    function changeStudentPageText($idx, $text) {
        $sql2 = mq("UPDATE MAJORINTRO SET
        IntroText = '$text' WHERE idx = $idx");
    }
    //$sql->fetch_array();

    switch($_POST["menuIdx"]) {
        case "pan_1" :
            $param_1 = $_POST["bdname"];
            $boradAuth = $_POST["bdauth"];
            if($boradAuth == "admin") {
                $param_2 = 1;
            } else {
                $param_2 = 0;
            }
            insBoard($param_1, $param_2);
            break;
        case "pan_2" :
            $param_0 = $_POST["select_board_m"];
            $param_1 = $_POST["bdname_m"];
            $param_2 = $_POST["bdauth_m"];
            if($param_2 == "admin") {
                $param_2 = 1;
            } else {
                $param_2 = 0;
            }
            modBoard($param_0, $param_1, $param_2);
            break;
        case "pan_3" :
            $param_1 = $_POST["select_board"];
            delBoard($param_1);
            break;
        case "pan_4" :
            $param_1 = $_POST["ofwname"];
            $param_2 = $_POST["prlang"];
            insOverflowBoard($param_1, $param_2);
            break;
        case "pan_5" :
            $param_1 = $_POST["select_board_r"];
            delOverflowBoard($param_1);
            break;
        case "pan_6" :
            if($_POST["logo_present"] == "true") presentLogoInNavigationBar(true);
            else presentLogoInNavigationBar(false);
            if(isset($_FILES['logoFile'])) changeLogo();
            break;
        case "pan_7" :
            $introIdx = $_POST['introduction_select'];
            if(isset($_FILES['studentFile'])) changeStudentPageImage($introIdx);
            $text = $_POST['introText'];
            changeStudentPageText($introIdx, $text);
            break;
        case "pan_10" :
            $param_1 = $_POST["userID"];
            echo $param_1; echo '<br />';
            $sql = mq("SELECT userID FROM USERPROFILE WHERE userID = '$param_1'");
            $usr = $sql->fetch_array();
            echo $usr["userID"]; echo '<br />';
            if($param_1 == $usr["userID"])
                getoffIllegalUser($param_1);
            else
                echo 'fail';
            break;
        case "pan_11" :
            $param_1 = $_POST["userID_a"];
            if($_POST["usrauth_m"] == "admin" || $param_1 == $_SESSION['userID']) {
                superUser($param_1, 1);
            } else {
                superUser($param_1, 0);
            }
            break;
        default:
            break;
    }

    header("Location:admin_portal.php");
    /*
    $stmt = mq("INSERT INTO USERPROFILE(userID,userPassword,userEmail,userBirth,userName,userMajor,userStudentID) VALUES(
        '$userID',
        '$hashPassword',
        '$userEmail',
        '$userBirth',
        '$userName',
        '$userMajor',
        '$userStudentID'
      )");
      */
?>
