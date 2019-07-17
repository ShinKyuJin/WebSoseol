<?php
  $con = mysqli_connect('miminishin.cafe24.com','miminishin','s7731731','miminishin');

  function mq($sql) {
    global $con;
    return mysqli_query($con,$sql);
  }
 ?>
