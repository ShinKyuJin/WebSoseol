<?php
    include "db.php"
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="overflow_main.css" />
</head>
<body>
  <?php include "nav.php"; ?>
    <?php
        function rvsort($a,$b){
            return ($a[1] <= $b[1]) ? 1 : -1;
        }

        define("NUM_OF_CATEGORIES", 7);
        $sortingElement = [];

        $sql = mq("SELECT contentCategoryNo, count(*) as numOfContents from OVERFLOW_BOARD
            GROUP BY contentCategoryNo HAVING contentCategoryNo >= 1");

        for($i = 1; $i <= NUM_OF_CATEGORIES; $i++) {
            $sortingElement[] = array($i, 0);
        }

        while($sqldata = $sql->fetch_array()) {
            $temp = $sqldata["contentCategoryNo"];
            $temp2 = $sqldata["numOfContents"];
            $sortingElement[$temp][1] = $temp2;
        }

        usort($sortingElement, "rvsort");
        $account = 0;
        for($i=0;$i<7;$i++) {
          $account += $sortingElement[$i][1];
        }
        $rateElements = [];

    ?>

    <div class="sidebar">
      <?php
      for($i=0;$i<7;$i++) :
        $rateElements[$i][1] = $sortingElement[$i][1] / $account;
      ?>
      <div class="box" style="height:100px;width:<?php echo $rateElements[$i][1]*200 + 60; ?>px; background-color:red; border:1px solid black;" >

      </div>
    <?php endfor;  ?>

        <a href="overflow_board_1.php?ci=1">C언어</a>
        <a href="overflow_board_1.php?ci=2">C++</a>
        <a href="overflow_board_1.php?ci=3">Python</a>
        <a href="overflow_board_1.php?ci=4">Javascript</a>
        <a href="overflow_board_1.php?ci=5">JAVA</a>
        <a href="overflow_board_1.php?ci=6">C#</a>
        <a href="overflow_board_1.php?ci=7">HTML/CSS/JS</a>
    </div>

    <script>
        $(document).ready(function() {
            $(".sidebar").hide();
            $(".sidebar").show();
        });
    </script>

    <?php include "footer.php"; ?>
</body>
</html>
