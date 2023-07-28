<?php
/// Code by Min 
// Fix by Shiro
// Không xóa nếu bạn là người có học !

define('_IN_JOHNCMS', 1);
include '../incfiles/core.php';
$times = date("H"); 
if ($times == 0 and $times == 1 and $times == 2 and $times == 3 and $times == 4 and $times == 5 and $times == 6 and $times == 7 and $times == 8 and $times == 9 and $times == 10 and $times == 11 and $times == 12 and $times == 13 and $times == 14 and $times == 15 and $times == 16 and $times == 17 and $times == 18 and $times == 19 and $times == 20 and $times == 21 and $times == 22 and $times == 23 and $times == 24) {
/// Random mã gift
function rand_string($length) {
$chars ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$size = strlen($char);
for($i = 0; $i<$length; $i++) {
$str .= $chars[rand(0, $size -1)];
$str=substr(str_shuffle($chars), 0, $length);
}
return $str;
}
$random = rand_string(8);
////
$ktm = mysql_result(mysql_query("SELECT COUNT(`ma`) FROM `giftcode` WHERE `ma`='".$random."'"), 0);//kiểm tra xem tồn tại mã gift chưa
$xu = rand(500,15000);//số xu nhận đc
$lg = rand(5,20);//số lượng nhận đc
if($ktm != 0) {
$bot = 'error :-F hệ thống gặp trục trặc. Nên không thể phát mã gift định kỳ, 1H nữa sẽ phát tiếp ;-D';

} else {
mysql_query("INSERT INTO `giftcode` SET `user`='1',`ma`='".$random."',`time`='".time()."',`xu`='".$xu."',`luong`='".$lg."'");
        $bot = 'Hệ thống phát mã gift định kỳ. Mã lần này là [b]'.$random.'[/b] trị giá '.$xu.' xu và '.$lg.' lượng, 1 giờ nữa BOT phát tiếp nha :handclap';
	}
	$gio= time();
        mysql_query("INSERT INTO `guest` SET
             `adm` = '0',
             `time` = '$gio',
             `user_id` = '256',
             `name` = 'BOT',                                 
             `text` = '" . mysql_real_escape_string($bot) . "',
             `ip` = '0000',
             `browser` = 'IPHONE'
         ");
}
?>