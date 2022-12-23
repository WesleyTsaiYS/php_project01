<?php include_once'header.php';?>

<?php 
echo "<div class='white_sentence'><b>Hello there ". $_SESSION["useruid"]. " !</b></div>";
echo "<div class='white_sentence'><b>Your email is " .$_SESSION["useremail"]. " !</b></div>";
echo "<div class='white_sentence'><b>you are the no. " .$_SESSION["userid"]. "!</b></div>";
?>

<?php include_once'footer.php';?>