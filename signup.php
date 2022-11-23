<?php
include_once'header.php';
?>
<section>
<div class="white_singup">Sign UP</div>
<form action="inclouds/signup.inc.php" method="post">
<div class="white_input"><input type="text" name="name" placeholder="Full name ..."></div>
<div class="white_input"><input type="text" name="email" placeholder="Email..."></div>
<div class="white_input"><input type="text" name="uid" placeholder="Username..."></div>
<div class="white_input"><input type="password" name="pwd" placeholder="Password..."></div>
<div class="white_input"><input type="password" name="pwdrepeat" placeholder="Repeat password..."></div>
<div class="white_input"><button type="submit" name="submit">sign up</button></div>
</form>
<?php
if(isset($_GET["error"])){
if($_GET["error"] == "emptyinput"){
    echo "<div class='white_error'>Fill in all fields!</div>";
}
else if($_GET["error"] == "invaliduid"){
    echo "<div class='white_error'>Choose a proper username!</div>";
}
else if($_GET["error"] == "invalidemail"){
    echo "<div class='white_error'>Choose a proper email!</div>";
}
else if($_GET["error"] == "passworddontmatch"){
    echo "<div class='white_error'>Passwords doesn't match!</div>";
}
else if($_GET["error"] == "stmtfailed"){
    echo "<div class='white_error'>Something went wrong, try again!</div>";
}
else if($_GET["error"] == "usernametaken"){
    echo "<div class='white_error'>Username already taken!</div>";
}
else if($_GET["error"] == "none"){
    echo "<div class='white_error'>You have signed up!</div>";
}}?>
</section>


<?php
include_once'footer.php';
?>