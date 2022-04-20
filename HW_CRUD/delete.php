<?php
require ("DBconnect.php");

$uNo = $_GET['uNo'];
$sql = "DELETE FROM user WHERE uNo = '$uNo'";

if (mysqli_query($link, $sql)){
    echo "<script type = 'text/javascript'>";
    echo "alert('刪除成功')";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content ='0; url=list.php'>";
}
else{
    echo "<script type='text/javascript'>";
    echo "alert ('刪除失敗');";
    echo "</script>";
    echo ('Location: register.php');
}


?>