<?php
require ("DBconnect.php");

$uId = $_POST["uId"];
$uPwd = $_POST["uPwd"];
$uRole = $_POST["uRole"];

$sql = "INSERT INTO user (uId, uPwd, uRole) VALUES ('$uId', '$uPwd', '$uRole')";
if (mysqli_query($link, $sql)){
    echo "<script type = 'text/javascript'>";
    echo "alert('註冊成功')";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content ='0; url=list.php'>";
}
else{
    echo "<script type='text/javascript'>";
    echo "alert ('註冊失敗');";
    echo "</script>";
    echo ('Location: register.php');
}