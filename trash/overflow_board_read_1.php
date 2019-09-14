<?php
include "db.php";
?>

<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <title>READ_WITH_COMMENT</title>
  <script src="lib/codemirror.js"></script>
  <link rel="stylesheet" href="lib/codemirror.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- theme mode region -->
  <?php include "theme_mode_links.php" ?>

  <style>
    body {
      background-color: #CCC;
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
    <div id="selections">
        <?php include "theme_mode_selector.php"; ?>
    </div>
    <input type="hidden" id="bo_content_c" value="<?php echo nl2br($board['contentTextPrimary']); ?>">
    <input type="hidden" id="categoryNo" value="<?php echo $_GET["ci"]; ?>">    
    <textarea id="codeeditor"></textarea>
    <div id="bo_content2">
      <?php echo nl2br(htmlentities("$board[contentTextSecondary]")); ?>
    </div>
    <div class="wi_line2"></div>
    <div id="bo_content_tags">
      <?php
      while ($tagIdxes = $tagIdx_sql->fetch_array()) {
        ?>
        <a href="overflow_board_sortbytag.php?tname=<?php echo $tagIdxes['tagName']; ?>" style="color: blue;">
          <?php echo $tagIdxes['tagName']; ?></a>
      <?php } ?>
      <div class="wi_line"></div>
    </div>

    <?php
    $sql = mq("select * from OVERFLOW_BOARD where contentRootIdx='" . $index . "'");

    $iterator = 1;

    while ($reboard = $sql->fetch_array()) {
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
        <span><a href="overflow_board_1.php">목록</a></span>
      </button>
    </div>
  </div>
  <div id="foot_box"></div>
  <?php include "footer.php"; ?>

  <script>
    $(document).ready(function() {


      var codeeditor = CodeMirror.fromTextArea(document.getElementById("codeeditor"), {
        readonly: true,
        mode: "text/x-csrc",
        theme: "default",
        tabSize: 4,
        indentWithTabs: true,
        lineNumbers: true
      });
      var categoryNo = $("#categoryNo").val();
      if(categoryNo == 1) {
          mode = "text/x-csrc";
      } else if (categoryNo == 2) {
          mode = "text/x-c++src";
      } else if (categoryNo == 3) {
          mode = "python";
      } else if (categoryNo == 4) {
          mode = "javascript";
      } else if (categoryNo == 5) {
          mode = "text/x-java";
      } else if (categoryNo == 6) {
          mode = "text/x-csharp";
      } else if (categoryNo == 7) {
          mode = "text/html";
      }
      localStorage.setItem("mode", mode);
      codeeditor.setOption("mode", mode);

      var contentCode = $("#bo_content_c").val();
      contentCode = removeBr(contentCode);
      codeeditor.setValue(contentCode);
      codeeditor.refresh();

      // theme mode region
      var selTheme = document.getElementById("theme");
      selTheme.addEventListener("click", selectTheme);

      function selectTheme() {
        var theme = selTheme.options[selTheme.selectedIndex].textContent;
        localStorage.setItem("theme", theme);
        codeeditor.setOption("theme", theme);
        // location.hash = "#" + theme;
      }

    function removeBr(str) {
      return str.replace(/<br\s*\/?>/mg, "");
    }
  </script>
</body>

</html>