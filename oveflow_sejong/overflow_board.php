<?php
include "db.php";
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>BOARD</title>
    <link rel="stylesheet" type="text/css" href="css/style.css?after" />
</head>

<body>
    <div id="board-area">
        <h1>자유게시판</h1>
        <h4>자유롭게 글을 쓸 수 있는 공간입니다.</h4>
        <table class="list-table">
            <thead>
                <tr>
                    <th width="70">글번호</th>
                    <th width="500">제목</th>
                    <th width="120">작성자</th>
                    <th width="100">작성일</th>
                </tr>
            </thead>
            <?php
            $sql = mq("select * from BOARD order by boardIdx desc");
            $osql = mq("select * from OVERFLOW_BOARD order by contentIdx desc");
            while ($board = $osql->fetch_array()) {
                $title = $board["contentTitle"];
                if (strlen($title) > 30) {
                    $title = str_replace($board["contentTitle"], mb_substr($board["contentTitle"], 0, 30, "utf-8") . "...", $board["contentTitle"]);
                }
                ?>
                <tbody>
                    <tr>
                        <td width="70"><?php echo $board["contentIdx"]; ?></td>
                        <td width="500"><a href="board_read.php?idx=<?php echo $board["contentIdx"]; ?>"><?php echo $board["contentTitle"]; ?>
                        <td width="120"><?php echo $board["contentWriter"]; ?></td>
                        <td width="100"><?php echo $board["contentWriteDateTime"]; ?></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
        <div id="write-btn">
            <a href="form.php"><button>글쓰기</button></a>
        </div>
    </div>
</body>

</html>