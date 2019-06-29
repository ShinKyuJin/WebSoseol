<?php
  session_start();
  session_destroy();
  echo '<script>location.replace("userLogin.html");</script>';
 ?>
