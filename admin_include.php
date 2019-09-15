<?php
    include "db.php";
    include "nav.php";

    $isAdmin = false;
    $sql = $sql = mq("SELECT * from USERPROFILE where userGrant = 1");

    while ($adminIds = $sql->fetch_array()) {
        if($adminIds["userID"] == $_SESSION["userID"])
            $isAdmin = true;
    }

    if(!isset($_SESSION['userID']) || !$isAdmin) {
        echo "<script>alert('권한이 없습니다');location.href='index.php';</script>";
        die();
    }
?>
