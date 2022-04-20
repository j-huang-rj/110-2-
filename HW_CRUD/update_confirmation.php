<?php

require("DBconnect.php");

$uNo = $_POST["uNo"];
$uId = $_POST["uId"];
$uPwd = $_POST["uPwd"];
$uRole = $_POST["uRole"];

$sql = "UPDATE user SET uId = '$uId', uPwd = '$uPwd', uRole = '$uRole' WHERE uNo = '$uNo'";

if (mysqli_query($link, $sql)){
    echo "<script type = 'text/javascript'>";
    echo "alert('更新成功')";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content ='0; url=list.php'>";
}
else{
    echo "<script type='text/javascript'>";
    echo "alert ('更新失敗');";
    echo "</script>";
    echo ('Location: list.php');
}

?>