<?php
require("DBconnect.php");

$pNo = $_POST['pNo'];
$pathpart = pathinfo($_FILES["photo"]["name"]);
$extname = $pathpart["extension"];

$finalphoto = "photo/Photo_".time().".".$extname;
$currenttime = time();

$sql = "SELECT * FROM photo WHERE pNo = '$pNo'";
$sql2 = "UPDATE photo SET ppath = '$finalphoto', pdate = '$currenttime' WHERE pNo = '$pNo'";

if ($result = mysqli_query($link, $sql)){
    $row = mysqli_fetch_assoc($result);
    if (copy($_FILES["photo"]["tmp_name"], $finalphoto)){
        if (mysqli_query($link, $sql2)){
            unlink($row["ppath"]);
            echo "<script type = 'text/javascript'>";
            echo "alert('更新成功')";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content ='0; url=photo_list.php'>";
        }
        else{
            echo "<script type='text/javascript'>";
            echo "alert ('更新失敗');";
            echo "</script>";
            echo ('Location: photo_list.php');
        }
    }
    else{
        echo "<script type='text/javascript'>";
        echo "alert ('更新失敗');";
        echo "</script>";
        echo ('Location: photo_list.php');
    }
}
else{
    echo "<script type='text/javascript'>";
    echo "alert ('更新失敗');";
    echo "</script>";
    echo ('Location: photo_list.php');
}
?>