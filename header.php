<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>My First login Project</title>
        <link rel="stylesheet" href="CSS/reset.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/member.css"/>
        <!-- #?v=<?=time()?> 刷新暫存 -->
        </head>
        <body class="all_block">
            <div class="title_block">
            <span class="Blogs_title">Blogs</span>
            <?php
                if(isset($_SESSION["useruid"])){
                echo "<span class='Home_title_login'><a href='http://35.77.87.164/php_project01/index.php';>HOME</a></span>";
                echo "<span class='title'><a href='http://35.77.87.164/php_project01/index.php'>ABOUT US</a></span>";
                echo "<span class='title'><a href='http://35.77.87.164/php_project01/index.php'>FIND BLOGS</a></span>";
                echo "<span class='title'><a href='http://35.77.87.164/php_project01/profile.php'>PROFILE PAGE</a></span>";
                echo "<span class='title'><a href='http://35.77.87.164/php_project01/inclouds/logout.inc.php'>LOG OUT</a></span>";
                }
                else{
                echo "<span class='Home_title'><a href='http://35.77.87.164/php_project01/index.php';>HOME</a></span>";
                echo "<span class='title'><a href='http://35.77.87.164/php_project01/index.php'>ABOUT US</a></span>";
                echo "<span class='title'><a href='http://35.77.87.164/php_project01/index.php'>FIND BLOGS</a></span>";
                echo   "<span class='title'><a href='http://35.77.87.164/php_project01/signup.php'>SIGN UP</a></span>";
                echo   "<span class='title'><a href='http://35.77.87.164/php_project01/login.php'>LOG IN</a></span>";
                }
                ?>
            </div>
            <div class="white_block">

            