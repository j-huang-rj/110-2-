<div style = "text-align: center"><h1>登入頁面</h1></div>

<div style = "text-align: center"><form action = "login.php" method = "post">
    <p>帳號：<input type = "text" name = "Id"/></p>
    <p>密碼：<input type = "password" name = "Pwd"/></p>
    <p><input type = "submit" name = "" value = "登入"/><br/></p>
</form></div>

<div style = "text-align: center"><a href = "register.php">註冊</a></div>

<?php
ob_start();
session_start();

// $adminId = "admin";
// $adminPwd = "admin";
// $userId = "justin_huang";
// $userPwd = "19980409";

$link = @mysqli_connect(
    "localhost",
    "root",
    "RootsCanadaLtd.",
    "php");

if (isset($_POST["Id"])){
    $Id = $_POST["Id"];
    $Pwd = $_POST["Pwd"];
    if ($Id != NULL && $Pwd != NULL){

        // if($_POST["Id"] == $adminId && $_POST["Pwd"] == $adminPwd){
        //     $_SESSION ["admin_login"] = "Yes";
        //     setcookie("credentials", $adminId, time()+3600);
        //     header ("Location: /admin.php");
        // }

        $sql = "SELECT * FROM user WHERE uId = '$Id' AND uPwd = '$Pwd'";
        
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) == 1){
            setcookie("credentials", $Id, time()+3600);
            $sql2 = "SELECT * FROM user WHERE uRole = 'admin'";
            $result2 = mysqli_query($link, $sql2);
            $row = mysqli_fetch_assoc($result2);
            if ($row["uId"] == $Id){
                $_SESSION ["admin_login"] = "Yes";
                header ("Location: /admin.php");
            }
            else{
                $_SESSION ["user_login"] = "Yes";
                header ("Location: /user.php");
            }
        }
        else{
            echo "帳號或密碼有誤！<br/><br/>";
        }
    }
    else{
        echo "您尚未輸入帳號或密碼！<br/><br/>";
    }
}
else{
echo "歡迎使用本系統<br/><br/>";
}

if (isset($_COOKIE["credentials"])){
    echo "歡迎".$_COOKIE["credentials"]."回來<br/><br/>";
}
else{
    echo "歡迎初次登入<br/><br/>";
}

date_default_timezone_set('Asia/Taipei');
echo date("m-d-Y H:i:s", time())."<br/>";

ob_flush();
?>
