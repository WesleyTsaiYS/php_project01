<?php
function emptyInputSignup($email,$username,$pwd,$pwdRepeat){
    $result;
    #查看變數是否為空，empty()是PHP內建函示
    if (empty($email)||empty($username)||empty($pwd)||empty($pwdRepeat)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidUid($username){
    $result;
    #preg_match() 是PHP的RegEx
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidEmail($email){
    $result;
    #filter_var() 檢查email是否為正確格式
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function pwdMatch($pwd,$pwdRepeat){
    $result;
    if ($pwd !== $pwdRepeat){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function uidExists($conn,$username,$email){
  #mysql 指令，搜尋有無重複的姓名
  $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail=?;";
  #初始化mysql 指令，不讓惡意代碼進入資料庫
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location: ../signup.php?error=stmtfailed");
        exit();
  }
  #傳送參數給mysql,ss兩個參數
  mysqli_stmt_bind_param($stmt,"ss",$username,$email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if($row = mysqli_fetch_assoc($resultData)){
    return $row;
  }
  else{
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}
function createUser($conn,$email,$username,$pwd){
    #mysql 指令
    $sql = "INSERT INTO users(usersEmail, usersUid, usersPwd) VALUES(?,?,?);";
    #初始化mysql 指令，不讓惡意代碼進入資料庫
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      header("location: ../signup.php?error=stmtfailed");
          exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    #傳送參數給mysql,sss三個參數
    mysqli_stmt_bind_param($stmt,"sss",$email,$username,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
          exit();
}
function emptyInputLogin($username,$pwd){
    $result;
    #查看變數是否為空，empty()是PHP內建函示
    if (empty($username)||empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn,$username,$username);

    if ($uidExists === false){
        header("location: ../login.php?error=wronglogin");
          exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd,$pwdHashed);

    if ($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
          exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersID"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        $_SESSION["useremail"] = $uidExists["usersEmail"];
        header("location: ../index.php");
          exit();
    }
}

