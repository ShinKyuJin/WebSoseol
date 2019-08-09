<?php
    include "db.php";
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8" type="text/html">
    <title>READ_WITH_COMMENT</title>
    <script src="lib/codemirror.js"></script>
    <link rel="stylesheet" href="lib/codemirror.css" />
    <link rel="stylesheet" href="theme/blackboard.css" />
    <script src="mode/javascript/javascript.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        body {
            background-color: #999;
        }
        .wi_line {
            border: solid 1px lightgray;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <?php
    $index = $_GET["idx"];

    $sql = mq("select * from OVERFLOW_BOARD where contentIdx='" . $index . "'");
    $board = $sql->fetch_array();

    $tagIdx_sql = mq("select tagName from OVERFLOW_BOARD_TAG_RELATION where contentIdx='" . $index . "'");
    ?>

    <div id="board_read">
        <h2><?php echo $board["contentTitle"]; ?></h2>
        <div id="user_info">
            <?php echo $board["contentWriter"];
            echo $board["contentWriteDateTime"]; ?>
            <div id="bo_line"></div>
        </div>
        <input type="hidden" id="bo_content" value="<?php echo nl2br($board['contentTextPrimary']); ?>">
        <textarea id="codeeditor"></textarea>
        <div class="wi_line"></div> 
        <div class="wi_line"></div> 
        <div id="bo_content2">
            <?php echo nl2br(htmlentities("$board[contentTextSecondary]")); ?>
        </div>
        <div class="wi_line"></div> 
        <div class="wi_line"></div> 
        <div id="bo_content_tags">
            <?php 
                while($tagIdxes = $tagIdx_sql->fetch_array()){
                    echo $tagIdxes['tagName'];
                    echo ' ';
                }    
            ?>    
        <div>
        <div id="bo_ser">
            <ul>
                <li><a href="board.php">[목록]</a></li>
                <li><a href="modify.php?idx=<?php echo $board['contentIdx']; ?>">[수정]</a></li>
                <li><a href="delete.php?idx=<?php echo $board['contentIdx']; ?>">[삭제]</a></li>
            </ul>
        </div>
    </div>   
    <div id="foot_box"></div>

    <script>
        $(document).ready(function() {
            var codeeditor = CodeMirror.fromTextArea(document.getElementById("codeeditor"), {
                readonly : 'nocursor',
                mode: "javascript",
                theme: "blackboard",
                tabSize: 4,
                indentWithTabs: true,
                lineNumbers: true
            });
 
            var contentCode = $("#bo_content").val();
            contentCode = removeBr(contentCode);
            codeeditor.setValue(contentCode);
            codeeditor.refresh();
        });

        function removeBr(str) {
            return str.replace(/<br\s*\/?>/mg,"");
        }
    </script>
</body>

</html>