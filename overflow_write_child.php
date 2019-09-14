<div class="recomment">답글 작성</div>
  <div class="wi_line"></div>
    <div id="selections">
        <?php 
            include "theme_mode_selector.php";    
        ?>
    </div>
    <form id="preview-form" method="post" action="overflow_write_ok.php">
        <div id="in_title">
            <textarea name="title" , id="utitle" , rows="1" , cols="55" , placeholder="제목(필수)" , maxlength="100" , required></textarea>
        </div>
        <textarea id="code" name="content_1"></textarea>
        <textarea class="content_2" name="content_2" id="preview-form-comment", placeholder="질문 작성"></textarea>
        <br />
        <textarea class="content_tag" name="content_tag" id="content_tag" placeholder="태그 삽입"></textarea>
        
        <input type="hidden" name="userID" value="<?php echo $_SESSION['userID']; ?>">        
        <input type="hidden" id="categoryNo" name="categoryNo" value="<?php echo $_GET['ci'];?>">
        <input type="hidden" name="root" value="false">
        <input type="hidden" name="rootIdx" value="<?php echo $index; ?>">
        <input type="hidden" id="theme_no" name="theme_no" value="0">

        <?php
                if(!isset($_SESSION['userID'])) echo "<a id='preview-form-submit' href='login.php'>글쓰기</a>";
                else echo "<input type='submit' name='preview-form-submit' id='preview-form-submit' value='등록하기'>글쓰기</a>";
            ?>
        
    </form>
    <div class="wi_line"></div>

    <script>
        $(document).ready(function() {
            var categoryNo = $("#categoryNo").val();
            var mode = $("#cm_mode").val();

            var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
                mode: "css",
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

            // theme mode region
            var selTheme = document.getElementById("theme");
            selTheme.addEventListener("input",selectTheme);

            function selectTheme() {
                var theme = selTheme.options[selTheme.selectedIndex].textContent;
                localStorage.setItem("theme",theme);
                editor.setOption("theme", theme);
                idx = selTheme.selectedIndex;
                console.log(idx);
                document.getElementById("theme_no").value = idx.toString();
                // location.hash = "#" + theme;
            }
        });
    </script>
