<?php
    session_start();
    header('Content-type: text/html; charset=utf-8');

    $db = new mysqli("miminishin.cafe24.com", "miminishin", "s7731731", "miminishin");
    $db->set_charset("utf8");

    function mq($sql)
    {
        global $db;
        return $db->query($sql);
    }
?> 