<?php
require("DBconnect.php");

$sql = "SELECT * FROM photo";

echo "<div style = 'text-align: center'><h1>我的相簿</h1></div>";

if ($result = mysqli_query($link, $sql)){
    echo "<table border = '1' style = 'margin-left: auto; margin-right: auto;'>";
    while ($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>";
        echo "<a href = '".$row["ppath"]."'>";
        echo "<img src = '".$row["ppath"]."' width = '30%'>";
        echo "</a>";
        echo "<br/>";
        echo "<form action = 'photo_update.php' method = 'post' enctype = 'multipart/form-data'>";
        echo "<input type = 'hidden' name = 'pNo' value = ".$row["pNo"].">";
        echo "<input type = 'file' name = 'photo' accept = 'image/*' required/>";
        echo "<input type = 'submit' value = '更新'/>";
        echo "</form>";
        echo "<a href = 'photo_delete.php?pNo=".$row["pNo"]."'>刪除</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table><br/>";
    echo "<div style = 'text-align: center'>";
    echo "<form action = 'photo_upload.php' method = 'post' enctype = 'multipart/form-data'>";
    echo "<input type = 'file' name = 'photo' accept = 'image/*' required/>";
    echo "<input type = 'submit' value = '上傳'/>";
    echo "</form></div>";
}
?>