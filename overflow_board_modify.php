<?php
session_start();
include_once "db.php";

$index = $_GET['idx'];
$sql = mq("SELECT * from OVERFLOW_BOARD where contentIdx='" . $index . "'");
$board = $sql->fetch_array();
$user = $board["contentWriter"];
$string = "Location:overflow_main.php";
if(!isset($_SESSION['userID']) || $_SESSION['userID'] != $user) {
    echo "<script>alert('권한 없음');location.href='overflow_main.php'</script>";
    die();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>OVERFLOW SEJONG</title>
    <script src="lib/codemirror.js"></script>
    <link rel="stylesheet" href="lib/codemirror.css" />
    <link rel="stylesheet" href="theme/blackboard.css" />
    <link rel="stylesheet" href="overflow_write.css" />
    <script src="mode/javascript/javascript.js"></script>
    <script src="mode/css/css.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <?php include "theme_mode_links.php" ?>
</head>

<body>
    <div id="board-write">
        <div id="write-area">
            <form id="preview-form" method="post" action="overflow_board_modify_ok.php">
                <div id="in_title">
                    <textarea name="title" , id="utitle" , rows="1" , cols="55" , placeholder="제목(필수)" , maxlength="100" , required></textarea>
                </div>
                <div id="selections">
                    <?php
                    include "theme_mode_selector.php";
                    ?>
                </div>
                <textarea id="code" name="content_1"></textarea>
                <textarea class="content_2" name="content_2" id="preview-form-comment" , placeholder="게시글 수정"></textarea>
                <br />
                <textarea class="content_tag" name="content_tag" id="content_tag" placeholder="태그 삽입"></textarea>
                <input type="hidden" id="bo_content" value="<?php echo nl2br($board['contentTextPrimary']); ?>">
                <input type="hidden" name="userID" value="<?php echo $_SESSION['userID']; ?>">
                <input type="hidden" id="categoryNo" name="categoryNo" value="<?php echo $_GET['ci']; ?>">
                <input type="hidden" name="idx", value="<?php echo $_GET['idx'];?>">
                <input type="hidden" name="theme_no" id="theme_no" value="0">
                <input type="hidden" name="cm_mode" id="cm_mode" value="<?php
                    $categIdx = $_GET["ci"];
                    $csql = mq("SELECT categoryIdx, codemirrorMode FROM OVERFLOW_LISTOFBOARD WHERE categoryIdx = $categIdx");
                    $echosql = $csql->fetch_array();
                    echo $echosql["codemirrorMode"];
                ?>">
                <input type="hidden" name="theme_no" id="theme_no" value="0">
                <input type="submit" name="preview-form-submit" id="preiew-form-submit" value="Submit">
            </form>

        </div>
    </div>
    <script>
        $(document).ready(function() {
            var contentCode = $("#bo_content").val();
            var categoryNo = $("#categoryNo").val();
            var mode = $("#cm_mode").val();

            var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
                mode: "text/x-csrc",
                theme: "default",
                tabSize: 4,
                indentWithTabs: true,
                lineNumbers: true
            });

            console.log(contentCode);

            contentCode = removeBr(contentCode);
            editor.setValue(contentCode);
            editor.refresh();

            localStorage.setItem("mode", mode);
            editor.setOption("mode", mode);

            // theme mode region
            var selTheme = document.getElementById("theme");
            selTheme.addEventListener("input", selectTheme);

            function selectTheme() {
                var theme = selTheme.options[selTheme.selectedIndex].textContent;
                localStorage.setItem("theme", theme);
                editor.setOption("theme", theme);
                idx = selTheme.selectedIndex;
                $("#theme_no").val(idx.toString());
            }
        });

        function removeBr(str) {
            return str.replace(/<br\s*\/?>/mg,"");
        }
    </script>
</body>

</html>
