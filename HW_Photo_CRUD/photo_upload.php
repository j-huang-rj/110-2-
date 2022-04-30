<?php
require("DBconnect.php");

//取得附檔名
$pathpart = pathinfo($_FILES["photo"]["name"]);
$extname = $pathpart["extension"];

//產生新檔案名稱
$finalphoto = "photo/Photo_".time().".".$extname;
$currenttime = time();
$sql = "INSERT INTO photo (ppath, pdate) VALUES ('$finalphoto', '$currenttime')";


//複製檔案 (把上傳的檔案從temp抓出來)
//copy(tmp檔案名稱, 新檔案名稱)
if (copy($_FILES["photo"]["tmp_name"], $finalphoto)){
    if (mysqli_query($link, $sql)){
        echo "<script type = 'text/javascript'>";
        echo "alert('照片上傳成功')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content ='0; url=photo_list.php'>";
    }
    else{
        echo "<script type='text/javascript'>";
        echo "alert ('照片上傳失敗');";
        echo "</script>";
        echo ('Location: photo.php');
    }
}
else{
    echo "<script type='text/javascript'>";
    echo "alert ('照片上傳失敗');";
    echo "</script>";
    echo ('Location: photo.php');
}

?>