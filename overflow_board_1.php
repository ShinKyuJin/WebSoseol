<?php
    require_once "db.php";
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>BOARD</title>
    <link rel="stylesheet" type="text/css" href="overflow_board_1.css?after" />
    <link rel="stylesheet" href="overflow_man.css?after" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <style>
    body {
      background-color: #CCC;
    }
  </style>
</head>

<body>
    <?php
        include "nav.php";
        $categoryNo = $_GET['ci'];
        $categoryName = "C언어";
        $redir_string = "Location:overflow_main.php";

        $csql = mq("SELECT * from OVERFLOW_LISTOFBOARD WHERE categoryIdx = $categoryNo");
        $cc = $csql->fetch_array();
        $categoryName = $cc["categorySubject"];
        if(!isset($cc["categorySubject"]))
           header($redir_string);

    ?>
    <div id="board-area">
        <div class="title"><?php echo $categoryName; ?></div>
        <table class="list-table" style="width:100%;">
            <thead>
                <tr>
                    <th>글번호</th>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>작성일</th>
                </tr>
            </thead>
            <?php
            $osql = mq("SELECT * from OVERFLOW_BOARD where contentIsRoot = 1 and contentCategoryNo = $categoryNo order by contentIdx desc");
            while ($board = $osql->fetch_array()) :
                $title = $board["contentTitle"];
                if (strlen($title) > 30) {
                    $title = iconv_substr($board['contentTitle'],0,30)."...";
                }
                ?>
                <tbody>
                    <tr>
                        <td style="text-align:center;"><?php echo $board["contentIdx"]; ?></td>
                        <td><a href="overflow_board_read.php?ci=<?php echo $categoryNo; ?>&idx=<?php echo $board["contentIdx"]; ?>"><?php echo $title; ?></a></td>
                        <td><?php echo $board["contentWriter"]; ?></td>
                        <td><?php echo substr($board["contentWriteDateTime"],0,10); ?></td>
                    </tr>
                </tbody>
            <?php endwhile; ?>
        </table>
        <div id="write-btn">
          <div class="write_btn">
            <?php
                if(!isset($_SESSION['userID'])) echo "<a href='login.php'>글쓰기</a>";
                else echo "<a href='overflow_write.php?ci=".$categoryNo."'>글쓰기</a>";
            ?>
            </div>
        </div>
        <div class="search-form">
            <form method="get" action="overflow_board_search_query.php">
                <input type="hidden" name="ci" value="<?php echo $categoryNo; ?>" />
                <input type="text" name="contentTitle" id="searchthing"/>
                <input type="submit" value="검색" style="background-color: #990e17; color: white; border: none; width: 50px; height: 30px; font-size: 14px;">
            </form>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>
