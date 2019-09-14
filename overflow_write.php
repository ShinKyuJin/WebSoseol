<?php session_start(); ?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OVERFLOW SEJONG</title>
    <script src="lib/codemirror.js"></script>
    <link rel="stylesheet" href="lib/codemirror.css" />
    <link rel="stylesheet" href="theme/blackboard.css" />
    <link rel="stylesheet" href="overflow_write.css?after" />
    <script src="mode/javascript/javascript.js"></script>
    <script src="mode/css/css.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <?php 
        include_once "db.php";
        include "theme_mode_links.php";
        $categIdx = $_GET["ci"];
    ?>

    <style>
        body {
            background-color: #DDD;
        }
    </style>
</head>

<body>
    <div id="head">
        <h3>ENJOY CODING <?php echo $_SESSION['userID']; ?></h3>
    </div>
    <form id="preview-form" method="post" action="overflow_write_ok.php">
        <div id="in_title">
            <textarea name="title" , id="utitle" , rows="1" , cols="55" , placeholder="제목(필수)" , maxlength="100" , required></textarea>
        </div>
        <div id="selections">
            <?php 
                include "theme_mode_selector.php";    
            ?>
        </div>
        <textarea id="code" name="content_1"></textarea>
        <br />
        <textarea id="content_2" class="content_2" name="content_2" placeholder="질문 작성"></textarea>
        <br />
        <textarea id="content_tag" class="content_tag" name="content_tag" placeholder="태그 삽입"></textarea>
        <input type="hidden" name="userID" value="<?php echo $_SESSION['userID']; ?>">        
        <input type="hidden" id="categoryNo" name="categoryNo" value="<?php echo $categIdx;?>">
        <input type="hidden" name="root" value="true">
        <input type="hidden" name="rootIdx" value="0">
        <input type="hidden" name="cm_mode" id="cm_mode" value="<?php
            $csql = mq("SELECT categoryIdx, codemirrorMode FROM OVERFLOW_LISTOFBOARD WHERE categoryIdx = $categIdx");
            $echosql = $csql->fetch_array();
            echo $echosql["codemirrorMode"];
        ?>">
        <input type="hidden" name="theme_no" id="theme_no" value="0"> 
        <br />
        <input type="submit" name="preview-form-submit" id="preiew-form-submit" value="Submit">
    </form>

    <script>
        $(document).ready(function() {
            var categoryNo = $("#categoryNo").val();
            var mode = $("#cm_mode").val();
            
            var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
                mode: "text/x-csrc",
                theme: "default",
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

            localStorage.setItem("mode", mode);
            editor.setOption("mode", mode);
            
            // theme mode region
            var selTheme = document.getElementById("theme");
            selTheme.addEventListener("input",selectTheme);

            function selectTheme() {
                var theme = selTheme.options[selTheme.selectedIndex].textContent;
                localStorage.setItem("theme",theme);
                editor.setOption("theme", theme);
                idx = selTheme.selectedIndex;
                document.getElementById("theme_no").value = idx.toString();
                // location.hash = "#" + theme;
            }
        });
    </script>
</body>

</html>
