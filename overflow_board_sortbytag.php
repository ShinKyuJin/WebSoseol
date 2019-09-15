<?php
    include "db.php";
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>BOARD</title>
    <link rel="stylesheet" type="text/css" href="overflow_board-1.css?after" />
</head>

<body>
  <?php include "nav.php"; ?>
    <div id="board-area">
        <h1><?php echo urldecode($_GET['tname']); ?></h1>
        <table class="list-table">
            <thead>
                <tr>
                  <th width="100">글번호</th>
                  <th width="720">제목</th>
                  <th width="150">작성자</th>
                  <th width="130">작성일</th>
                </tr>
            </thead>
            <?php
            $tag_name = $_GET['tname'];
            $sql = mq("select contentIdx from OVERFLOW_BOARD_TAG_RELATION where tagName = '$tag_name'");
            while ($cidx = $sql->fetch_array()) :
                $osql = mq("select * from OVERFLOW_BOARD where contentIdx = '$cidx[contentIdx]'");
                $board = $osql->fetch_array();

                $title = $board["contentTitle"];
                if (strlen($title) > 30) {
                    $title = iconv_substr($board['contentTitle'],0,30)."...";
                }
                ?>
                <tbody>
                    <tr>
                        <td width="100"><?php echo $board["contentIdx"]; ?></td>
                        <td width="720"><a href="overflow_board_read.php?ci=<?php echo $board["contentCategoryNo"]; ?>&idx=<?php echo $board["contentIdx"]; ?>"><?php echo $board["contentTitle"]; ?>
                        <td width="150"><?php echo $board["contentWriter"]; ?></td>
                        <td width="130"><?php echo $board["contentWriteDateTime"]; ?></td>
                    </tr>
                </tbody>
            <?php endwhile; ?>
        </table>
    </div>
    <?php include "footer.php"; ?>
    <?php echo "hello"; ?>
</body>

</html>
