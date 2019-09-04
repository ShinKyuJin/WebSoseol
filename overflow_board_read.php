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
    <script src="mode/css/css.js"></script>
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
  <?php include "nav.php"; ?>
  <h2>OVERFLOW SEJONG</h2>
  <h1>질문</h1>
    <?php
    $index = $_GET["idx"];

    $sql = mq("select * from OVERFLOW_BOARD where contentIdx='" . $index . "'");
    $board = $sql->fetch_array();

    $tagIdx_sql = mq("select tagName from OVERFLOW_BOARD_TAG_RELATION where contentIdx='" . $index . "'");
    ?>

    <div id="board_read">
      <div class="wi_line"></div>

      <div id="user_info">
      <dl>
        <dt><?php echo $board["contentTitle"]; ?></dt>
        <div class="txtInfo">
          <span class="writer">
            <span class="sort">작성자</span><?php echo $board["contentWriter"]; ?>
          </span>
          <span class="date">
            <span class="sort">등록일</span><?php echo $board["contentWriteDateTime"]; ?>
          </span>
        </div>
      </dl>
    </div>


        <input type="hidden" id="bo_content" value="<?php echo nl2br($board['contentTextPrimary']); ?>">
        <textarea id="codeeditor"></textarea>

        <div id="bo_content2">
            <?php echo nl2br(htmlentities("$board[contentTextSecondary]")); ?>
        </div>
        <div class="wi_line2"></div>

        <div id="bo_content_tags">
            <?php
                while($tagIdxes = $tagIdx_sql->fetch_array()){
            ?>
                    <a href="overflow_board_sortbytag.php?tname=<?php echo $tagIdxes['tagName']; ?>" style="color: blue;">
                    <?php echo $tagIdxes['tagName']; ?></a>
            <?php } ?>
            <div class="wi_line"></div>
        </div>

        <?php

        $sql = mq("select * from OVERFLOW_BOARD where contentRootIdx='" . $index . "'");

        $iterator = 1;

        while($reboard = $sql->fetch_array()) {
            $reindex = $reboard['contentIdx'];
            $retagIdx_sql = mq("select tagName from OVERFLOW_BOARD_TAG_RELATION where contentIdx='" . $reindex . "'");

            include "overflow_board_read_re.php";
            $iterator++;
        }
        ?>
        <?php include "overflow_write_child.php"; ?>
        <div id="buttonArea">
          <button type="button" class="modify">
            <span><a href="modify.php?idx=<?php echo $board['contentIdx']; ?>">수정</a></span>
          </button>
          <button type="button" class="delete">
            <span><a href="delete.php?idx=<?php echo $board['contentIdx']; ?>">삭제</a></span>
          </button>
          <button type="button" class="list">
            <span><a href="overflow_board-1.php">목록</a></span>
          </button>
        </div>
      </div>
      <div id="foot_box"></div>
      <?php include "footer.php"; ?>

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
