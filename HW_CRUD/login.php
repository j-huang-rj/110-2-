<div style = "text-align: center"><h1>登入頁面</h1></div>

<div style = "text-align: center"><form action = "login.php" method = "post">
    <p>帳號：<input type = "text" name = "uId"/></p>
    <p>密碼：<input type = "password" name = "uPwd"/></p>
    <p><input type = "submit" name = "" value = "登入"/><br/></p>
</form></div>

<div style = "text-align: center"><a href = "register.php">註冊</a></div>

<?php
ob_start();
session_start();

$link = @mysqli_connect(
    "localhost",
    "root",
    "RootsCanadaLtd.",
    "php");

if (isset($_POST["uId"])){
    $uId = $_POST["uId"];
    $uPwd = $_POST["uPwd"];
    if ($uId != NULL && $uPwd != NULL){

        $sql = "SELECT * FROM user WHERE uId = '$uId' AND uPwd = '$uPwd'";
        if ($result = mysqli_query($link, $sql)){
            while($row = mysqli_fetch_assoc($result)){
                $uRole = $row['uRole'];
            }
        }
        if (mysqli_num_rows($result) != 0){
            setcookie("credentials", $uId, time()+3600);
            if ($uRole == "admin"){
                $_SESSION ["admin_login"] = "Yes";
                header ("Location: /admin.php");
            }
            else{
                if($uRole == "user"){
                $_SESSION ["user_login"] = "Yes";
                header ("Location: /user.php");
                }
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
