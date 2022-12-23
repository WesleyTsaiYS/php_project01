<?php include_once'header.php';?>
<div class="white_singup">Log In</div>


<section>
    <form action="includs/login.inc.php" method="post">
        <div class="white_input"><input type="text" name="uid" placeholder="Username/email ..."></div>
        <div class="white_input"><input type="password" name="pwd" placeholder="Password..."></div>
        <div class="white_input"><button type="submit" name="submit">log in</button></div>
    </form>
    <?php if(isset($_GET["error"])):?>
        <?php if($_GET["error"] == "emptyinput"):?>
            <?="<div class='white_error'>Fill in all fields!</div>";?>
        <?php elseif($_GET["error"] == "wronglogin"):?>
            <?="<div class='white_error'>Incorrect login information!</div>";?>
        <?php endif;?>
    <?php endif;?>
</section>


<?php include_once'footer.php';?>