<?php
$action = $_GET["action"];
$header = "訂閱電子報";
$form = "SubCheck.php";
if ($action == 2){
    $header = "取消".$header;
    $form = "UnsubCheck.php";
}

echo "<div style = 'text-align: center; font-size: 36px; font-weight: bold'>".$header."<br/><br/><br/></div>";
echo "<div style = 'text-align: center; font-size: 20px'>";
echo "<form action = '".$form."' method = 'post'>";
echo "請輸入您的email：<input type = 'email' name = 'email' required/>";
echo "<input type = 'submit' value = '送出'/>";
echo "</form></div>";
?>