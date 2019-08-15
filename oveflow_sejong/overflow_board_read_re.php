    <h2><?php echo $reboard["contentTitle"]; ?></h2>
    <div id="user_info">
        <?php echo $reboard["contentWriter"];
        echo $reboard["contentWriteDateTime"]; ?>
        <div id="bo_line"></div>
    </div>
    <input type="hidden" id="re_content_<?php echo $iterator ?>" value="<?php echo nl2br($reboard['contentTextPrimary']); ?>">
    <textarea id="codeeditor_<?php echo $iterator ?>"></textarea>
    <div class="wi_line"></div>
    <div class="wi_line"></div>
    <div id="bo_content">
        <?php echo nl2br(htmlentities("$reboard[contentTextSecondary]")); ?>
    </div>
    <div class="wi_line"></div>
    <div class="wi_line"></div>
    <div id="bo_content_tags">
        <?php
        while ($retagIdxes = $retagIdx_sql->fetch_array()) {
            ?>
            <a href="overflow_board_sortbytag.php?tname=<?php echo $retagIdxes['tagName']; ?>">
                <?php echo $retagIdxes['tagName']; ?></a>
        <?php } ?>
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