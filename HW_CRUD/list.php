<?php
require ("DBconnect.php");

$sql = "SELECT * FROM user";

echo "<div style = 'text-align: center'><h1>使用者列表</h1></div>";

if ($result = mysqli_query($link, $sql)){
    echo "<table border = '1' style = 'margin-left: auto; margin-right: auto;'>";
    while ($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$row["uNo"]."</td>
        <td>".$row["uId"]."</td>
        <td>".$row["uPwd"]."</td>
        <td>".$row["uRole"]."</td>
        <td><a href = 'delete.php?uNo=".$row['uNo']."'>"."刪除"."</a></td>
        <td><a href = 'update.php?uNo=".$row['uNo']."'>"."修改"."</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>