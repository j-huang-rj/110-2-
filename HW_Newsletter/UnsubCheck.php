<?php
require('DBconnect.php');

$email = $_POST["email"];
$sql = "SELECT * FROM email WHERE email = '$email'";
$sql2 = "DELETE FROM email WHERE email = '$email'";

if($result = mysqli_query($link, $sql)){
    if (mysqli_num_rows($result) != 0){
        if (mysqli_query($link, $sql2)){
            echo "<script type = 'text/javascript'>";
            echo "alert('取消訂閱成功！')";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content ='0; url=NewsletterSub.php'>";
        }
        else{
            echo "<script type='text/javascript'>";
            echo "alert ('取消訂閱失敗！');";
            echo "</script>";
            echo ('Location: Subscription.php?action=2');
        }
    }
    else{
        echo "<script type = 'text/javascript'>";
        echo "alert('此email尚未訂閱，取消訂閱失敗！')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content ='0; url=NewsletterSub.php'>";
    }
}
else{
    echo "<script type='text/javascript'>";
    echo "alert ('取消訂閱失敗！');";
    echo "</script>";
    echo ('Location: Subscription.php?action=2');
}
?>