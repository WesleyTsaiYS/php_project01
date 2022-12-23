<?php
    session_start();#取得連線
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My First login Project</title>
        <link rel="stylesheet" href="css/reset.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/member.css"/>

    </head>
    <body class="all_block">
        <div class="title_block">
            <span class="Blogs_title">Blogs</span>
            <span class="other_title">
                <?php
                    if(isset($_SESSION["useruid"])){
                        
                        echo "<span class='title'><a href='index.php';>HOME</a></span>";
                        echo "<span class='title'><a href='cart.php'>CART</a></span>";
                        echo "<span class='title'><a href='index.php'>FIND BLOGS</a></span>";
                        echo "<span class='title'><a href='profile.php'>PROFILE PAGE</a></span>";
                        echo "<span class='title'><a href='includs/logout.inc.php'>LOG OUT</a></span>";
                    }
                    else{
                        echo "<span class='title'><a href='index.php';>HOME</a></span>";
                        echo "<span class='title'><a href='index.php'>ABOUT US</a></span>";
                        echo "<span class='title'><a href='index.php'>FIND BLOGS</a></span>";
                        echo "<span class='title'><a href='signup.php'>SIGN UP</a></span>";
                        echo "<span class='title'><a href='login.php'>LOG IN</a></span>";
                    }
                ?>
            </span>
        </div>
        <div class="white_block">

            