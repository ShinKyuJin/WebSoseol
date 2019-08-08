<script>
    $(document).ready(function() {
        var editor = CodeMirror.fromTextArea(document.getElementById("codeeditor"), {
            readonly : 'nocursor',
            mode: "javascript",
            theme: "blackboard",
            tabSize: 4,
            indentWithTabs: true,
            lineNumbers: true,
            lineWrapping: true
        });
        var codeValue = "<?php echo htmlspecialchars_decode($board['contentTextPrimary']); ?>";

        editor.setValue(codeValue);
        editor.refresh();
    });
</script>