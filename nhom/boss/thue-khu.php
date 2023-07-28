<?php
define('_IN_JOHNCMS', 1);
$textl = 'Khu Boss Clan';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time = time();
@mysql_query("DELETE FROM `nhom_boss` WHERE `time_open`<'".$time."'");
$cl = mysql_fetch_array(mysql_query("SELECT * FROM `nhom_user` WHERE `user_id`='".$user_id."'"));
$clan = mysql_fetch_array(mysql_query("SELECT * FROM `nhom` WHERE `id`='".$cl['id']."'"));
echo'<div class="phdr">Khu Boss Clan</div>';
$cl = mysql_fetch_array(mysql_query("SELECT * FROM `nhom_user` WHERE `user_id`='".$user_id."'"));
$kt = mysql_result(mysql_query("SELECT COUNT(*) FROM `nhom_boss` WHERE `nhom`='".$cl['id']."'"),0);
if($kt >= 1){
header('location: map.php');
exit;
}

$gio = date("Hi");
if($clan < 1){
    
echo'<div class="omenu"><b>Vui lòng gia nhập Clan để sử dụng chức năng</b></div>';
} else if ($datauser['kichhoat']==0) {
    echo'<div class="omenu"><b>Vui lòng kích hoạt tài khoản để sử dụng chức năng</b></div>';
} else if ($datauser['postforum']<20) {
    echo'<div class="omenu"><b>Vui lòng đạt 20 bài viết để sử dụng chức năng</b></div>';
} else
if($gio < 1900){
echo'<div class="omenu">Khu boss chỉ mở từ 19h => 22h hàng ngày! Vui lòng quay lại sau</div>';
} else if($gio > 2200){
echo'<div class="omenu">Khu boss chỉ mở từ 19h => 22h hàng ngày! Vui lòng quay lại sau</div>';
} else

 {
if (isset($_POST['ok'])) {
if($cl['rights'] <= 0){
echo'<div class="omenu">Lỗi phải là PC hoặc PPC clan mới được phép thuê khu</div>';
} else if($clan['xu'] < 5000000 || $clan['luong'] < 200){
echo'<div class="rmenu">Lỗi clan của bạn không đủ xu, lượng</div>';
} else {
$time = time()+600;
$hp = 500000 * 7;
mysql_query("INSERT INTO `nhom_boss` SET `nhom`='".$clan['id']."', `time_open`='{$time}',`hp`='".$hp."',`hpfull`='".$hp."'");
$text = '[b][blue]Clan '.$clan['name'].' vừa thuê khu boss thành công ai men clan thì vào đánh boss nhé[/b][/blue]';
mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($text) . "', `time`='".time()."'");

mysql_query("UPDATE `nhom` SET `xu`=`xu`-'5000000' WHERE `id`='".$clan['id']."'");
mysql_query("UPDATE `nhom` SET `luong`=`luong`-'200' WHERE `id`='".$clan['id']."'");

header('location: map.php');
}
}
echo'<div class="menu">Giá 1 lần thuê khu là 5 triệu xu + 200 lượng (sẽ trừ vào quỹ nhóm) mỗi lần thuê khu sẽ duy trì trong 10phút sau 10 phút sẽ xóa khu bạn có muốn thuê không?<br><form method="post"><input type="submit" name="ok" value="Có"></form></div>';
}
require_once ("../../incfiles/end.php");
?>