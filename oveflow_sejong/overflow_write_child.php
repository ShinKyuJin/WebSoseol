<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <title>OVERFLOW SEJONG</title>
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
    </style>
</head>

<body>
    <form id="preview-form" method="post" action="overflow_write_ok.php">
        <div id="in_title">
            <textarea name="title" , id="utitle" , rows="1" , cols="55" , placeholder="제목(필수)" , maxlength="100" , required></textarea>
        </div>
        <div class="wi_line"></div>
        <textarea id="code" name="content_1"></textarea>
        <textarea class="content_2" name="content_2" id="preview-form-comment", placeholder="질문 혹은 답변 작성"></textarea>
        <br />
        <textarea class="content_tag" name="content_tag" id="content_tag" placeholder="태그 삽입"></textarea>
        <input type="hidden" name="root" value="false">
        <input type="hidden" name="rootIdx" value="<?php echo $index; ?>">
        <input type="submit" name="preview-form-submit" id="preiew-form-submit" value="Submit">
    </form>

    <script>
        $(document).ready(function() {
            var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
                mode: "css",
                theme: "blackboard",
                tabSize: 4,
                indentWithTabs: true,
                lineNumbers: true
            });

            $("#preview-form").submit(function(e) {
                var codeValue = editor.getValue();

                $(".code").val() = codeValue;

                if (codeValue.length == 0) alert('void');
                else alert(codeValue);
            });
        });
    </script>
</body>

</html>