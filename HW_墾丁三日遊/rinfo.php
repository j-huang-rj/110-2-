<?php
$user = $_POST["user"];
$passwd = $_POST["passwd"];
$email = $_POST["email"];
$telnum = $_POST["telnum"];

echo "<body bgcolor = '#ECE7C3'></body>";
echo "<h1 align = 'center'>註冊成功！</h1>";
echo "<h2>註冊資訊</h2>";
echo "帳號：".$user."</br>";
echo "密碼：".$passwd."</br>";
echo "email：".$email."</br>";
echo "手機：".$telnum."</br>";
?>