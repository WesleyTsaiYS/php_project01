<?php
include_once'header.php';
?>
 <div class="white_singup">Log In</div>


 <section>
<form action="inclouds/login.inc.php" method="post">
<div class="white_input"><input type="text" name="uid" placeholder="Username/email ..."></div>
<div class="white_input"><input type="password" name="pwd" placeholder="Password..."></div>
<div class="white_input"><button type="submit" name="submit">log in</button></div>
</form>
<?php
if(isset($_GET["error"])){
if($_GET["error"] == "emptyinput"){
    echo "<div class='white_error'>Fill in all fields!</div>";
}
else if($_GET["error"] == "wronglogin"){
    echo "<div class='white_error'>Incorrect login information!</div>";
}
}?>
</section>
<?php
include_once'footer.php';
?>