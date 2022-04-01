<?php
session_start();
if (isset($_SESSION["admin_login"])){
    if ($_SESSION["admin_login"] == "Yes"){
        echo "Welcome to admin control page.<br/>";
        echo "<a href = 'logout.php'>登出</a>";
    }
    else{
        echo "非法進入系統<br/>";
        echo "<a href = 'login.php'>回登入頁</a>";
        exit();
    }
}
else{
    echo "非法進入系統<br/>";
    echo "<a href = 'login.php'>回登入頁</a>";
    exit();
}
?>