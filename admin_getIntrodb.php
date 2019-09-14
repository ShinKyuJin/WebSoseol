<?php
include_once "db.php";

$ci = intval($_GET['ci']);

$sql = mq("SELECT IntroText FROM MAJORINTRO WHERE idx = $ci");
$s = $sql->fetch_array();
$text = $s["IntroText"];

echo nl2br($text);
?>