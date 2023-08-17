<?php
$server = "localhost";         # MySQL/MariaDB 伺服器
$dbusername = "root";       # 使用者帳號
$dbpassword = "root"; # 使用者密碼
$dbname = "phpproject01";    # 資料庫名稱
$conn = mysqli_connect($server,$dbusername,$dbpassword,$dbname);
if(!$conn){
    die("Connection failed" . mysql_connect_error());
}

