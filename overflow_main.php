<?php
include_once "db.php"
?>

<!DOCTYPE html>

<head>
  <meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="overflow_man.css?after" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
  <?php include "nav.php";

  $sortingElement = [];
  $id_str = "box_id_";
  $resultStr;

  $sql = mq("SELECT * from OVERFLOW_LISTOFBOARD ORDER BY numOfContents DESC");

  for ($i = 1; $sqldata = $sql->fetch_array(); $i++) {
    $sortingElement[] = array($sqldata["categoryIdx"], $sqldata["numOfContents"], $sqldata["categorySubject"]);
  }
  $categoryCnt = $i - 1;

  $account = 0;
  for ($i = 0; $i < $categoryCnt; $i++) {
    $account += $sortingElement[$i][1];
  }
  $rateElements = [];
  ?>

  <input type="hidden" id="categoryCnt" value="<?php echo $categoryCnt; ?>" />

  <div class="mid-content">
    <div class="sidebar col-3 col-s-12">
      <?php
      for ($i = 0; $i < $categoryCnt; $i++) :
        $rateElements[$i][1] = $sortingElement[$i][1] / $account;
        $resultStr = $id_str . $sortingElement[$i][0];
        ?>
        <div class="box" id="<?php echo $resultStr; ?>" style="width:<?php echo floor(log10($rateElements[$i][1] + 1) * 500) + 150; ?>px;">
          <a href="overflow_board_1.php?ci=<?php echo $sortingElement[$i][0]; ?>"><?php echo $sortingElement[$i][2]; ?></a> <div id="bos-content"><?php echo $sortingElement[$i][1]; ?> Contents</div>
        </div>
      <?php endfor;  ?>
    </div>
    <div class="main-area col-9 col-s-12">
      <?php include "slides0.php"; ?>
    </div>
  </div>
  <?php include "footer.php"; ?>


  <script>
    $(document).ready(function() {
      var numOfElem = $("#categoryCnt").val();
      for (let index = 0; index < numOfElem; index++) {
        var box_id_str = "#box_id";
        var id_no_str = index + 1;
        box_id_str = box_id_str.concat("_", id_no_str.toString());
        var color = (255 / numOfElem) * index;
        var rgbString = "rgb(255";
        rgbString = rgbString.concat(",", color, ",", color, ")");
        //console.log(box_id_str);
        $(box_id_str).css("background", rgbString);
      }
    });
  </script>
</body>

</html>