<?php
    session_start();#取得連線
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="css/reset.css"/>
        <link rel="stylesheet" type="text/css" href="css/header.css"/>
        <!-- <link rel="stylesheet" type="text/css" href="css/member.css"/> -->
        
        <title>HASH TECHIE OFFICIAL</title>
    </head>
    <body>
        <section>
            <div class="title_block">
                    <?php
                        if(isset($_SESSION["useruid"])){
                            echo "<a class='title' href='index.php';>HOME</a>";
                            echo "<a class='title' href='cart.php'>CART</a>";
                            echo "<a class='title' href='profile.php'>PROFILE PAGE</a>";
                            echo "<a class='title' href='includes/logout.inc.php'>LOG OUT</a>";
                        }
                        else{
                            echo "<a class='title' href='not_logged.php';>HOME</a>";
                            echo "<a class='title' href='signup.php'>SIGN UP</a>";
                            echo "<a class='title' href='login.php'>LOG IN</a>";
                        }
                    ?>
            </div>





