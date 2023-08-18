<?php include_once'header.php';?>

<div class="form-box">
        <div class="form-value">
            <?php 
                echo "<div class='white_sentence'><b>Hi there ". $_SESSION["useruid"]. "！</b></div>";
                echo "<div class='white_sentence'><b>Your email is " .$_SESSION["useremail"]. "！</b></div>";
                echo "<div class='white_sentence'><b>you are the no. " .$_SESSION["userid"]. "！</b></div>";
            ?>
        </div>
    </div>
<?php include_once'footer.php';?>