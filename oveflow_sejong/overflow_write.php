<!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
        <title>OVERFLOW SEJONG</title>
        <script src="lib/codemirror.js"></script>
        <link rel="stylesheet" href="lib/codemirror.css" />
        <link rel="stylesheet" href="theme/blackboard.css" />
        <script src="mode/javascript/javascript.js"></script>
        <script src="mode/css/css.js"></script>
        <style>
            body {
                background-color: #999;
            }
        </style>
    </head>
    <body>
        <div id="board-write">
            <h1>자유게시판</h1>
            <h4>게시글을 작성하는 공간입니다.</h4>
            <div id="write-area">
                <form action="overflow_write_ok.php" method="post">
                    <div id="in_title">
                        <textarea name="title", id="utitle", rows="1", cols="55", placeholder="제목(필수)", maxlength="100", required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="codeeditor"></div>
                    <div class="wi_line"></div> 
                    <div id="in_content">
                        <textarea name="content_2", id="ucontent", placeholder="내용",  style="width:80%; height:200px;", required></textarea>
                    </div>
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>          
                    <script>
                        var editor = CodeMirror(document.getElementById("codeeditor"), {
                            value: "test {\n\tposition: absolute; \n\twidth: 200px; \n\theight: 50px;\n}",
                            mode: "css",
                            theme: "blackboard",
                            tabSize: 4,
                            indentWithTabs: true,
                            lineNumbers: true
                        });
                    </script>      
                </form>
            </div>
        </div>
    </body>
</html>
