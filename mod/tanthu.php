<?php
error_reporting(0);
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
$textl = 'Nhận quà tân thủ';
require('../incfiles/head.php');






if (!$user_id) {
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
echo '<div class="phdr"><b>Nhận quà tân thủ</b></div><div class="omenu">';
if ($datauser['quatanthu'] >= 1) {
echo 'Bạn đã nhận rồi</div>';
require('../incfiles/end.php');
exit;
}




@mysql_query("UPDATE users SET `xu` = `xu`+'5000000' ,`luong` = `luong`+'100',`quatanthu` = '1' WHERE `id` = '{$user_id}'");
 //echo'<script>alert("Bạn nhận được Khung năm học mới ");</script>';

			 // mysql_query("UPDATE `khokhung` SET `soluong`='1' WHERE `user_id`='".$user_id."' AND `id_shop` = '2'");

echo '<center>Bạn đã mở quà tân thủ !<br>Chúc mừng bạn nhận được 5.000.000 xu và 100 lượng. Chúc bạn chơi game vui vẻ!<center></div>';




require('../incfiles/end.php');
?>