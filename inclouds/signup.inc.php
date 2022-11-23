<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
#如果用戶正確輸入
if (isset($_POST["submit"])){
    #$_POST=用戶輸入list
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    #將輸入資料回傳資料庫
    require_once 'dbh.inc.php';
    #將數入資料回傳檢查錯函示檢查有無錯誤
    require_once 'functions.inc.php';
    #如果輸入有空格
    if(emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat) !== false){
    header("location: ../signup.php?error=emptyinput");
    exit();}
    #如有輸入錯誤的Uid
    if(invalidUid($username) !== false){
        header("location: ../signup.php?error=invaliduid");
        exit();}
    #如有輸入錯誤的email
    if(invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();}
    #如有輸入錯誤的email
    if(pwdMatch($pwd,$pwdRepeat) !== false){
        header("location: ../signup.php?error=passworddontmatch");
        exit();}
    if(uidExists($conn,$username,$email) !== false){
        header("location: ../signup.php?error=usernametaken");
        exit();}


    createUser($conn,$name,$email,$username,$pwd);
    }
#如果用戶輸入錯誤
else {
    header("location: ../signup.php");
    exit();
}