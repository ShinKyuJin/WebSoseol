<?php
    session_start();
    include_once "db.php";

    function searchUser($keyword, $search_mthd) {
        #AJAX
        if($search_mthd == "userID") {
            $userkwd = '%'.$keyword.'%';
            $sql = mq("SELECT * FROM USERPROFILE WHERE userID LIKE '$userkwd'");
            while($s = $sql->fetch_array()) {
                echo $s['userID']; echo ' | '; echo $s['userName']; echo ' | '; 
                if($s['userGrant'] == 1) echo 'admin';
                else echo 'user';
                 echo $s['userEmail']; echo ' | '; echo $s['userMajor'];
                echo '<br />';
            }
        } else if ($search_mthd == "userMajor") {
            $userkwd = '%'.$keyword.'%';
            $sql = mq("SELECT * FROM USERPROFILE WHERE userMajor LIKE '$userkwd'");
            while($s = $sql->fetch_array()) {
                echo $s['userID']; echo ' | '; echo $s['userName']; echo ' | '; 
                if($s['userGrant'] == 1) echo 'admin';
                else echo 'user';
                 echo $s['userEmail']; echo ' | '; echo $s['userMajor'];
                echo '<br />';
            }
        } else if ($search_mthd == "userName") {
            $userkwd = '%'.$keyword.'%';
            $sql = mq("SELECT * FROM USERPROFILE WHERE userName LIKE '$userkwd'");
            while($s = $sql->fetch_array()) {
                echo $s['userID']; echo ' | '; echo $s['userName']; echo ' | '; 
                if($s['userGrant'] == 1) echo 'admin';
                else echo 'user';
                 echo $s['userEmail']; echo ' | '; echo $s['userMajor'];
                echo '<br />';
            }
        }
    }

    $method = $_GET["mt"];
    $kwd = $_GET["kw"];
    searchUser($kwd,$method);
?>