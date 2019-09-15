<?php
    include_once "db.php";
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8" type="text/html">
    <title>READ_WITH_COMMENT</title>
    <script src="lib/codemirror.js"></script>
    <link rel="stylesheet" href="overflow_board_1.css" />
    <link rel="stylesheet" href="lib/codemirror.css" />
    <script src="mode/javascript/javascript.js"></script>
    <script src="mode/css/css.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <?php include "theme_mode_links.php" ?>
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
  <div class="title">OVERFLOW SEJONG<br>질문</div>
    <?php
    $index = $_GET["idx"];
    $sql = mq("select * from OVERFLOW_BOARD where contentIdx='" . $index . "'");
    $board = $sql->fetch_array();
    if(!$board["contentIsRoot"]) {
      $rootIdx = $board["contentRootIdx"];
      $sql = mq("select * from OVERFLOW_BOARD where contentIdx='" . $rootIdx . "'");
      $board = $sql->fetch_array();
      $index = $board["contentIdx"];
    }
    $tagIdx_sql = mq("select tagName from OVERFLOW_BOARD_TAG_RELATION where contentIdx='" . $index . "'");

    ?>
    <div id="selections" style="display: none;">
      <?php
        include "overflow_theme_text.php";
      ?>
    </div>

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
      <input type="hidden" name="cm_mode" id="cm_mode" value="<?php
          $categIdx = $_GET["ci"];
          $csql = mq("SELECT categoryIdx, codemirrorMode FROM OVERFLOW_LISTOFBOARD WHERE categoryIdx = $categIdx");
          $echosql = $csql->fetch_array();
          echo $echosql["codemirrorMode"];
        ?>">
      <input type="hidden" id="theme_idx" value="<?php echo $board['theme_no']; ?>">
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
        <div id="buttonArea">
        <?php
            if(isset($_SESSION['userID'])) { ?>
          <button type="button" class="modify" style="<?php
              if(isset($_SESSION['userID']) && $_SESSION['userID'] == $board["contentWriter"]) echo 'display:inline';
              else echo 'display:none;'
            ?>">
            <span><a href="overflow_board_modify.php?ci=<?php echo $board['contentCategoryNo']; ?>&idx=<?php echo $board['contentIdx']; ?>">수정</a></span>
          </button>
          <button type="button" class="delete" style="<?php
              if(isset($_SESSION['userID']) && $_SESSION['userID'] == $board["contentWriter"]) echo 'display:inline';
              else echo 'display:none;'
            ?>">
            <span><a href="overflow_board_delete.php?ci=<?php echo $board['contentCategoryNo']; ?>&isR=Y&idx=<?php echo $board['contentIdx']; ?>">삭제</a></span>
          </button>
          <?php  } ?>
        </div>
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
    </div>

      <div id="buttonArea">
        <button type="button" class="list">
          <span><a href="overflow_board_1.php?ci=<?php echo $_GET['ci']; ?>">목록</a></span>
        </button>
      </div>

      <div id="foot_box"></div>

      <?php include "footer.php"; ?>

    <script>
        $(document).ready(function() {
            var contentCode = $("#bo_content").val();
            var codeeditor = CodeMirror.fromTextArea(document.getElementById("codeeditor"), {
                readonly : 'nocursor',
                mode: "javascript",
                theme: "blackboard",
                tabSize: 4,
                indentWithTabs: true,
                lineNumbers: true
            });

            var categoryNo = $("#categoryNo").val();
            var mode= $("#cm_mode").val();

            localStorage.setItem("mode", mode);
            codeeditor.setOption("mode", mode);

            contentCode = removeBr(contentCode);
            codeeditor.setValue(contentCode);
            codeeditor.refresh();

            //console.log(codeeditor);

            // write code here
            var theme_id = document.getElementById("theme_idx").value;
            var themeul = document.getElementById("theme_select");
            var themesli = themeul.getElementsByTagName("li");
            var theme = themesli[theme_id].textContent;

            console.log(theme_id);
            console.log(theme);

            localStorage.setItem("theme", theme);
            codeeditor.setOption("theme", theme);
        });
        function removeBr(str) {
            return str.replace(/<br\s*\/?>/mg,"");
        }
    </script>
</body>

</html>
