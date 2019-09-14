<?php
    include_once "db.php";
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>BOARD</title>
    <link rel="stylesheet" type="text/css" href="overflow_board_1.css?after" />
</head>

<body>
  <?php 
    include "nav.php"; 
    $ci =  re('ci', 'get');
    $searchTitle = re('contentTitle', 'get');
    $isContent = false;
  ?>
    <div id="board-area">
        <h1><?php echo $searchTitle; echo " 검색 결과"; ?></h1>
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
            $searchTitle = '%'.$searchTitle.'%';
            $sql = mq("SELECT * from OVERFLOW_BOARD where contentCategoryNo = '$ci' and contentTitle LIKE '$searchTitle'");
            while ($board = $sql->fetch_array()) :
                $isContent = true;
                $title = $board["contentTitle"];
                if (strlen($title) > 30) {
                    $title = str_replace($board["contentTitle"], mb_substr($board["contentTitle"], 0, 30, "utf-8") . "...", $board["contentTitle"]);
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
        <?php        
            if(!$isContent) {
                echo '<h1>NO CONTENTS</h1>';
            }
        ?>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>
