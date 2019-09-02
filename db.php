<?php
  $con = mysqli_connect('miminishin.cafe24.com','miminishin','s7731731','miminishin');

  function mq($sql) { // mysqli_query
    global $con;
    return mysqli_query($con,$sql);
  }
  function re($string,$method) { // mysqli_real_escape_string
    global $con;
    if($method == 'post' || $method == 'POST'){
      return mysqli_real_escape_string($con,$_POST[$string]);
    }
    else if($method == 'get' || $method == 'GET'){
      return mysqli_real_escape_string($con,$_GET[$string]);
    }
  }
  function getUserID() {
    return $_SESSION['userID'];
  }
  function getErrorMsg() {
    global $con;
    return mysqli_error($con);
  }
 ?>
