    <div class="comment_area">
    <div class="read_re_title"><?php echo $reboard["contentTitle"]; ?></div>
    <div id="user_info">
      <div class="txtInfo">
        <span class="writer">
          <span class="sort">작성자</span><?php echo $board["contentWriter"]; ?>
        </span>
        <span class="date">
          <span class="sort">등록일</span><?php echo $board["contentWriteDateTime"]; ?>
        </span>
      </div>
    </div>
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
            <a href="overflow_board_sortbytag.php?tname=<?php echo $retagIdxes['tagName']; ?>" style="color: blue;">
                <?php echo $retagIdxes['tagName']; ?></a>
        <?php } ?>
    </div>
  </div>

    <script>
        $(document).ready(function() {
            var i = <?php echo $iterator ?>;

            var idString = "#re_content";
            var i_string = i.toString();
            var editorString = "codeeditor";
            idString = idString.concat("_", i_string);
            editorString = editorString.concat("_", i_string);

            var codeeditor2 = CodeMirror.fromTextArea(document.getElementById(editorString), {
                readonly: 'nocursor',
                mode: "javascript",
                theme: "blackboard",
                tabSize: 4,
                indentWithTabs: true,
                lineNumbers: true
            });

            console.log(idString);
            console.log(editorString);
            var contentCode = $(idString).val();
            contentCode = removeBr(contentCode);
            codeeditor2.setValue(contentCode);
            codeeditor2.refresh();

        });

        function removeBr(str) {
            return str.replace(/<br\s*\/?>/mg, "");
        }
    </script>
