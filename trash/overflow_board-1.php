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
        <h1>OVERFLOW SEJONG</h1>
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
            $osql = mq("select * from OVERFLOW_BOARD where contentIsRoot = 1 order by contentIdx desc");
            while ($board = $osql->fetch_array()) {
                $title = $board["contentTitle"];
                if (strlen($title) > 30) {
                    $title = str_replace($board["contentTitle"], mb_substr($board["contentTitle"], 0, 30, "utf-8") . "...", $board["contentTitle"]);
                }
                ?>
                <tbody>
                    <tr>
                        <td width="100"><?php echo $board["contentIdx"]; ?></td>
                        <td width="720"><a href="overflow_board_read.php?idx=<?php echo $board["contentIdx"]; ?>"><?php echo $title; ?></a></td>
                        <td width="150"><?php echo $board["contentWriter"]; ?></td>
                        <td width="130"><?php echo $board["contentWriteDateTime"]; ?></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
        <div id="nowdate"><div>

        <script>
            var diff = new Date("2019/08/19 17:38:43").getTime() - new Date().getTime();

            //alert(diff);
            function clock() {
                var x, h, m, s, n, xingqi, y, mon, d;
                var x = new Date(new Date().getTime() + diff);
                y = x.getYear() + 1900;
                if (y > 3000)
                    y -= 1900;
                mon = x.getMonth() + 1;
                d = x.getDate();
                xingqi = x.getDay();
                h = x.getHours();
                m = x.getMinutes();
                s = x.getSeconds();
                n = y + "-" + (mon >= 10 ? mon : "0" + mon) + "-" + (d >= 10 ? d : "0" + d) + " " + (h >= 10 ? h : "0" + h) + ":" + (m >= 10 ? m : "0" + m) + ":" + (s >= 10 ? s : "0" + s);
                //alert(n);
                document.getElementById('nowdate').innerHTML = n;
                setTimeout("clock()", 1000);
            }

            clock();
        </script>

        <div id="write-btn">
          <div class="write_btn"><a href="overflow_write.php">글쓰기</a></div>
        </div>
    </div>
</body>

</html>
