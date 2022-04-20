<?php
require("DBconnect.php");
$uNo = $_GET["uNo"];
$sql = "SELECT * FROM user WHERE uNo = '$uNo'";
if ($result = mysqli_query($link, $sql)){
    while($row = mysqli_fetch_assoc($result)){
        $uId = $row['uId'];
        $uPwd = $row['uPwd'];
        $uRole = $row['uRole'];
    }   
}
?>
<div style = "text-align: center">
<h1>使用者更新</h1>
<form action = "update_confirmation.php" method = "post">
<input type = "hidden" name = "uNo" value = "<?php echo $uNo;?>"/>
<p>請輸入新帳號：<input type = "text" name = "uId"/></p>
    <p>請輸入新密碼：<input type = "text" name = "uPwd"/></p>
    <p>請選擇新使用者：<input type = "radio" name = "uRole" value = "admin"/>admin
    <input type = "radio" name = "uRole" value = "user"/>user</p>
    <p><input type = "submit" name = "" value = "更新"/><br/></p>
</form>
</div>