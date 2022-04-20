<?php
$link = @mysqli_connect(
            "localhost", //主機名稱
            "root", //使用者名稱
            "RootsCanadaLtd.", //密碼
            "php"); //資料庫名稱

// if (mysqli_select_db($link, "mysql")){
//     echo "資料庫開啟成功!";
// }
// else{
//     die("無法開啟資料庫!<br/>");
// }
// 以上這條可以用來更改資料庫的選擇，也就是改動$link的資料庫名稱


// $sql = "SELECT * FROM user";

// if ($result = mysqli_query($link, $sql)){
//     echo "<table border = '1'>";
//     while($row = mysqli_fetch_assoc($result)){
//         echo "<tr>";
//         echo "<td>".$row['uNo']."</td>"."<td>".$row['uId']."</td>"."<td>".$row['uPwd']."</td>"."<td>".$row['uRole']."</td>"."</tr>";
//     }
//     echo "</table>";
// }




// ?>