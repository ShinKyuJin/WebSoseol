<?php
session_start();
session_destroy();
header('location:UserProfile/userLogin.html');
?>