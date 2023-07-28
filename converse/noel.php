<?php
##Mod by pkoolvn##
##Không xóa,sửa nếu bạn là người có học##

define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
$textl = 'Cửa Hàng'; 
require_once('../incfiles/head.php');
$idbot = 21585;
//mod nhan qua by pkoolvn//
if(preg_match('|happy|',$msg) || preg_match('|happy|',$msg) || preg_match("|happy",$msg)) {
$timeset = time() + 48 * 3600;
if($pkoolvn['timenhanqua'] < time()){
$bot = "Chúc mừng @$login nhận được 1 hộp quà happy vào vật phẩm để mở hộp quà";
mysql_query("UPDATE `users` SET `timenhanqua` = '{$timeset}', `hopqua`=`hopqua`+1 WHERE `id` = '{$pkoolvn['id']}'");
} else {
$bot = "@$login bạn đã nhận quà 48h sau khi nhận mới nhận được tiếp";
}
$bot=html_entity_decode($bot,ENT_QUOTES,'UTF-8');
$time = time()+10;
mysql_query("DELETE FROM `guest`");
mysql_query("INSERT INTO `guest` SET
`adm` = '$admset',
`time` = '$time',
`user_id` = '$idbot',
`name` = 'Puaru',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '60543201',
`browser` = 'Iphone 4'
");
mysql_query("UPDATE `users` SET `total_on_site` = '$totalonsite', `lastdate` = " . time() . " WHERE `id` = '$idbot'");
}
require('../incfiles/end.php');
?>
