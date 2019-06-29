<!DOCTYPE html>
<html>
    <head>
        <title>"A"</title>
        <style>
            .navigation_bar{
                background-color : #33CF77;
                height : 100%;
                width : 15%;
                overflow : auto;
            }
            .ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
            }
        </style>
    </head>
    <body>
    <nav class ="navigation_bar">
    <ul>
        <?php
        if (isset($_SESSION['userID'])) {
            echo "<li><a href = "index.php">"Main"</a></li>";
            echo "<li><a href = "UserBoard/noticeBoard.php">"Board"</a></li>";
            echo "<li><a href = "logout.php">"Logout"</a></li>";
        } else {
            echo "<li><a href = "index.php">"Main"</a></li>";
            echo "<li><a href = "UserBoard/noticeBoard.php">"Board"</a></li>";
            echo "<li><a href = "UserProfile/userLogin">"Logout"</a></li>";
            echo "<li><a href = "UserProfile/userRegister.html">"Logout"</a></li>";       
        }
        ?>
    </ul>
    </nav>
    </body>
</html>