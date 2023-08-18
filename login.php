<?php include_once'header.php';?>

<div class="form-box">
    <div class="form-value">
        <form action="includes/login.inc.php" method="post">
            <h2>Login</h2>
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="text" name="uid" required>
                <label for="">Username/email</label>
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" name="pwd" required>
                <label for="">Password</label>
            </div>
            <div class="forget">
                <label for=""><input type="checkbox">Remember Me  <a href="#">Forget Password</a></label>
            </div>
            <button type="submit" name="submit">log in</button>
            <div class="register">
                <p>Don't have a account <a href="signup.php">Register</a></p>
            </div>
        </form>
        <?php if(isset($_GET["error"])):?>
            <?php if($_GET["error"] == "emptyinput"):?>
                <?="<div class='error' >Fill in all fields!</div>";?>
            <?php elseif($_GET["error"] == "wronglogin"):?>
                <?="<div class='error' >Incorrect login information!</div>";?>
            <?php endif;?>
        <?php endif;?>
    </div>
</div>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


<?php include_once'footer.php';?>