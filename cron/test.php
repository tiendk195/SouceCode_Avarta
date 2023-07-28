<?php
define('HOST', 'localhost');
define('USER', '');
define('PASS', '');
define('DB', '');
$conn = mysqli_connect(HOST, USER, PASS, DB) or die(mysqli_connect_error());
mysqli_set_charset($conn, "utf8");

date_default_timezone_set('Asia/Ho_Chi_Minh');
$hour = date("H", time());
$minute = date("i", time());

$get = mysqli_query($conn, 'SELECT id FROM users');
while($x = mysqli_fetch_assoc($get)){
    

    $user_id = $x['id'];
    $time = $x['time'];


    if ($hour == 0 && $minute == 00  or
    $hour == 6 && $minute == 00 or $hour == 12 && $minute == 00 or $hour == 18 && $minute == 00) {
mysqli_query($conn, "UPDATE `users` SET `viewthongbao`='0'   WHERE id = '".$user_id."'");
         


        
        echo 'Thành công';
    } else {
        echo 'Hiện tại là '.$hour.' giờ. Chưa tới giờ reset.';
        exit;
    }
}
?>
