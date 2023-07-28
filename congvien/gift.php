<?php
define('_IN_JOHNCMS', 1);

$headmod = 'reee';
require('../incfiles/core.php');
$balans = rand(2000,40000);
$luong = rand(2,20);

$time = time(1);





//random ma gift
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


mysql_query("INSERT INTO `magift` SET `ma`='".$random."',
`time`='".time()."', `xu`='".$balans."', `luong`='".$luong."'");

$bot = 'Gift Code May Mắn Mỗi Khung Giờ: [b][red]'.$random.'[/b][/red]';
mysql_query("insert into `guest` set `user_id` = 2, `text` = '".$bot."', `time` = '".time()."'");
?>