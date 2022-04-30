<?php
require ("DBconnect.php");

$pNo = $_GET['pNo'];
$sql = "SELECT * FROM photo WHERE pNo = '$pNo'";
$sql2 = "DELETE FROM photo WHERE pNo = '$pNo'";
if ($result = mysqli_query($link, $sql)){
    $row = mysqli_fetch_assoc($result);
    if (mysqli_query($link, $sql2)){
        unlink($row["ppath"]);
        echo "<script type = 'text/javascript'>";
        echo "alert('刪除成功')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content ='0; url=photo_list.php'>";
    }
    else{
        echo "<script type='text/javascript'>";
        echo "alert ('刪除失敗');";
        echo "</script>";
        echo ('Location: photo_list.php');
    }
}
else{
    echo "<script type='text/javascript'>";
    echo "alert ('刪除失敗');";
    echo "</script>";
    echo ('Location: photo_list.php');
}
?>