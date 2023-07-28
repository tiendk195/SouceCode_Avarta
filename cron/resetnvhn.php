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
$get = mysqli_query($conn, 'SELECT user_id, time FROM timenhiemvuhn');
while($x = mysqli_fetch_assoc($get)){

    $user_id = $x['user_id'];
    $time = $x['time'];

    if ($hour == 0 && $minute == 00) {
                mysqli_query($conn, "UPDATE `timenhiemvuhnninja` SET `time`='0'");
                       mysqli_query($conn, "DELETE FROM `nhiemvuninja_user` WHERE `loai`='hangngay'");
                       
                        mysqli_query($conn, "UPDATE `timenhiemvuhnkpah` SET `time`='0'");
                       mysqli_query($conn, "DELETE FROM `nhiemvukpah_user` WHERE `loai`='hangngay'");

                mysqli_query($conn, "UPDATE `timenhiemvuhn` SET `time`='0'");
                       mysqli_query($conn, "DELETE FROM `nhiemvu_user` WHERE `loai`='hangngay'");


        echo 'Thành công';
    } else {
        echo 'Hiện tại là '.$hour.' giờ. Chưa tới giờ reset.';
        exit;
    }
}
?>
