<div class="tab_menu">
  <ul style="height: auto;">
    <?php while($linkRow = mysqli_fetch_array($link)) : ?>
    <li ><a href="boardIdx.php?ci=<?php echo $linkRow['categoryIdx']; ?>"
      <?php
      if($linkRow['categoryIdx'] == $_GET['ci']) echo "style='background-color:#990e17;color:white;'";

       ?>><?php echo $linkRow['boardSubject']; ?></a></li>
    <?php endwhile; ?>
  </ul>
</div>
