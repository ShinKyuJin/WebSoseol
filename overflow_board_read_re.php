<div class="comment_area">
    <div class="read_re_title"><?php echo $reboard["contentTitle"]; ?></div>
    <div id="user_info">
      <div class="txtInfo">
        <span class="writer">
          <span class="sort">작성자</span><?php echo $reboard["contentWriter"]; ?>
        </span>
        <span class="date">
          <span class="sort">등록일</span><?php echo $reboard["contentWriteDateTime"]; ?>
        </span>
      </div>
    </div>
    <input type="hidden" id="theme_idx_<?php echo $iterator ?>" value="<?php echo $reboard['theme_no']; ?>">
    <input type="hidden" id="re_content_<?php echo $iterator ?>" value="<?php echo nl2br($reboard['contentTextPrimary']); ?>">
    <textarea id="codeeditor_<?php echo $iterator ?>"></textarea>
    <div id="bo_content">
        <?php echo nl2br(htmlentities("$reboard[contentTextSecondary]")); ?>
    </div>
    <div class="wi_line2"></div>
    <div id="bo_content_tags">
        <?php
        while ($retagIdxes = $retagIdx_sql->fetch_array()) {
            ?>
            <a href="overflow_board_sortbytag.php?tname=<?php echo urlencode($retagIdxes['tagName']); ?>" style="color: blue;">
                #<?php echo $retagIdxes['tagName']; ?></a>
        <?php } ?>
    </div>
    <div id="buttonArea">
        <button type="button" class="modify" style="<?php
              if(isset($_SESSION['userID']) && $_SESSION['userID'] == $reboard["contentWriter"]) echo 'display:inline';
              else echo 'display:none;'
            ?>">
        <span><a href="overflow_board_modify.php?ci=<?php echo $reboard['contentCategoryNo']; ?>&idx=<?php echo $reboard['contentIdx']; ?>">수정</a></span>
        </button>
        <button type="button" class="delete" style="<?php
              if(isset($_SESSION['userID']) && $_SESSION['userID'] == $reboard["contentWriter"]) echo 'display:inline';
              else echo 'display:none;'
            ?>">
        <span><a href="overflow_board_delete.php?ci=<?php echo $reboard['contentCategoryNo']; ?>&isR=N&idx=<?php echo $reboard['contentIdx']; ?>">삭제</a></span>
        </button>
    </div>
  </div>

    <script>
        $(document).ready(function() {
            var i = <?php echo $iterator ?>;

            var idString = "#re_content";
            var idStringTheme = "theme_idx";
            var i_string = i.toString();
            var editorString = "codeeditor";
            idString = idString.concat("_", i_string);
            idStringTheme = idStringTheme.concat("_", i_string);
            editorString = editorString.concat("_", i_string);

            console.log(idStringTheme);

            var codeeditor2 = CodeMirror.fromTextArea(document.getElementById(editorString), {
                readonly: 'nocursor',
                mode: "javascript",
                theme: "blackboard",
                tabSize: 4,
                indentWithTabs: true,
                lineNumbers: true
            });

            var categoryNo = $("#categoryNo").val();
            var mode= $("#cm_mode").val();

            localStorage.setItem("mode", mode);
            codeeditor2.setOption("mode", mode);

            console.log(idString);
            console.log(editorString);
            var contentCode = $(idString).val();
            contentCode = removeBr(contentCode);
            codeeditor2.setValue(contentCode);
            codeeditor2.refresh();

            var theme_id = document.getElementById(idStringTheme).value;
            var themeul = document.getElementById("theme_select");
            var themesli = themeul.getElementsByTagName("li");
            var theme = themesli[theme_id].textContent;

            console.log(theme_id);
            console.log(theme);

            localStorage.setItem("theme", theme);
            codeeditor2.setOption("theme", theme);

        });

        function removeBr(str) {
            return str.replace(/<br\s*\/?>/mg, "");
        }
    </script>
