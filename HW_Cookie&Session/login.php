<div><h1 align = "center">登入頁面</h1></div>

<div style = "text-align: center"><form action = "login.php" method = "post">
    <p>帳號：<input type = "text" name = "Id"/></p>
    <p>密碼：<input type = "password" name = "Pwd"/></p>
    <p><input type = "submit" name = "" value = "登入"/><br/></p>
</form></div>

<div style = "text-align: center"><a href = "register.php">註冊</a></div>

<?php
ob_start();
session_start();

$adminId = "admin";
$adminPwd = "admin";
$userId = "justin_huang";
$userPwd = "19980409";

if (isset($_POST["Id"])){
    if ($_POST["Id"] != NULL && $_POST["Pwd"]!= NULL){
        if($_POST["Id"] == $adminId && $_POST["Pwd"] == $adminPwd){
            $_SESSION ["admin_login"] = "Yes";
            setcookie("credentials", $adminId, time()+3600);
            header ("Location: /admin.php");
        }
        else{
            if ($_POST["Id"] == $userId && $_POST["Pwd"] == $userPwd){
                $_SESSION ["user_login"] = "Yes";
                setcookie("credentials", $userId, time()+3600);
                header ("Location: /user.php");
            }
            else{
                echo "帳號或密碼有誤！";
            }
        }
    }
    else{
        echo "您尚未輸入帳號或密碼！";
    }
}
else{
echo "歡迎使用本系統<br/>";
}

if (isset($_COOKIE["credentials"])){
    echo "歡迎".$_COOKIE["credentials"]."回來";
}
else{
    echo "歡迎初次登入";
}

echo "</br>";
date_default_timezone_set('Asia/Taipei');
echo date("m-d-Y H:i:s", time())."<br/>";

ob_flush();
?>