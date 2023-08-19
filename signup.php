<?php include_once'header.php';?>

<div class="form-box">
    <div class="form-value">
        <form action="includes/signup.inc.php" method="post">

            <h2>Sign up</h2>

            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="text" name="email" required>
                <label for="">Email</label>
            </div>

            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="text" name="uid" required>
                <label for="">Username</label>
            </div>

            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" name="pwd" required>
                <label for="">Password</label>
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" name="pwdrepeat" required>
                <label for="">Repeat password</label>
            </div>

            <button type="submit" name="submit">sign up</button>
           
        </form>


        <?php
            if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<div class='error'>Fill in all fields!</div>";
            }
            else if($_GET["error"] == "invaliduid"){
                echo "<div class='error'>Choose a proper username!</div>";
            }
            else if($_GET["error"] == "invalidemail"){
                echo "<div class='error'>Choose a proper email!</div>";
            }
            else if($_GET["error"] == "passworddontmatch"){
                echo "<div class='error'>Passwords doesn't match!</div>";
            }
            else if($_GET["error"] == "stmtfailed"){
                echo "<div class='error'>Something went wrong, try again!</div>";
            }
            else if($_GET["error"] == "usernametaken"){
                echo "<div class='error'>Username already taken!</div>";
            }
            else if($_GET["error"] == "none"){
                echo "<div class='success'>You have signed up!</div>";
            }}?>
    </div>
</div>




<?php include_once'footer.php';?>