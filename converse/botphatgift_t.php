<?php
/*
///////Mod: Bot auto phát mã gift theo giờ
///////Mod by Min
///////Hỗ trợ tại http://TeenVina.Net
*/
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
//random ma gift
function rand_string($length) {
$chars ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$size = strlen($char);
for($i = 0; $i<$length; $i  ) {
$str .= $chars[rand(0, $size -1)];
$str=substr(str_shuffle($chars), 0, $length);
}
return$str;
}
$random = rand_string(8);
////
$ktm = mysql_result(mysql_query("SELECT COUNT(`ma`) FROM `magift` WHERE `ma`='".$random."'"), 0);//kiểm tra xem tồn tại mã gift chưa
$balans = rand(500000,150000000);//số xu nhận được từ 1000 đến 50000
$vnd = rand(5000,20000);//số lượng nhận đc từ 10 đến 50
if($ktm != 0) {
$bot='Hệ thống mã gift bảo trì , sẽ phát lại vào 1 giờ nữa';} else {
mysql_query("INSERT INTO `magift` SET `user`='1', `ma`='".$random."',
`time`='".time()."', `xu`='".$balans."', `luong`='".$vnd."'");
        $bot = 'BOT phát mã gift tự động đây. Mã lần này là [b]'.$random.'[/b] trị giá '.$balans.' xu và '.$vnd.' lượng, 1 giờ nữa BOT phát tiếp nha :D:';
}
$gio=time();
        mysql_query("INSERT INTO `guest` SET
             `adm` = '0',
             `time` = '$gio',
             `user_id` = '256',
             `name` = 'BOT',                                 `text` = '" . mysql_real_escape_string($bot) . "',
             `ip` = '0000',
             `browser` = 'IPHONE'
         ");
?>