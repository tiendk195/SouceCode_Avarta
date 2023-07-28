<?php
define('_IN_JOHNCMS', 1);
/*Mod auto xóa chatbox by SinhThành*/
$idbot=256;
if($rights>=8 or $datauser['id'] == 3333) {
if(preg_match('|#xoa|',$msg) || preg_match('|#haodz|',$msg) || preg_match("|#del|",$msg)) {
$bot = "@$login Dọn Dẹp Phòng Chat Vui247 :ha: ";
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
}
?>
