<?php

define('_IN_JOHNCMS',1);
require_once('../incfiles/core.php');
$textl='Trang cá nhân';
require_once('../incfiles/head.php');
echo '<div class="phdr">Cài đặt tài khoản</div>';
if(!$user_id){
echo 'Chức năng chỉ dành cho thành viên đăng kí';
require_once('../incfiles/end.php');
exit;
}
switch($act) {
default:
    if ($datauser['antttiente']==0){
        echo'
<div class="omenu"><img src="/icon/vao.png"> <a href="?act=antt"> Ẩn thông tin tiền tệ</a></div>';
} else if ($datauser['antttiente']==1){

echo'
<div class="omenu"><img src="/icon/vao.png"> <a href="?act=antt"> Hủy ẩn thông tin tiền tệ </a></div>';
}

if ($datauser['nguoiyeu']!=0){
if ($datauser['btkethon']==0){

echo'
<div class="omenu"><img src="/icon/vao.png"> <a href="?act=btkh"> Tắt hiển thị icon kết hôn</a></div>';
} else if ($datauser['btkethon']==1){

echo'
<div class="omenu"><img src="/icon/vao.png"> <a href="?act=btkh"> Bật hiển thị icon kết hôn</a></div>';
}
}

if ($datauser['naptichluy']>=10000){
if ($datauser['hienthivip']==1){
echo'
<div class="omenu"><img src="/icon/vao.png"> <a href="/vip/btvip.php?act=tatvip">Tắt hiển thị VIP</a></div>';
}
else if ($datauser['hienthivip']==0){
echo'
<div class="omenu"><img src="/icon/vao.png"> <a href="/vip/btvip.php?act=batvip">Bật hiển thị VIP</a></div>';
}
}
if ($datauser['chantuongtac']==1){

echo'<div class="omenu"><a href="?act=chantt"><img src="/icon/vao.png"> Bỏ chặn tương tác </a></div>';
} else  {
	echo'<div class="omenu"><a href="?act=chantt"><img src="/icon/vao.png"> Chặn tương tác </a></div>';
}
break;
case 'btkh':
if ($datauser['nguoiyeu']==0){
	echo'<div class="omenu">Lỗi, bạn chưa có người yêu!</div>';
} else if ($datauser['btkethon']==0) {


	echo'<div class="omenu">Tắt thành công,<a href="/index.html">Tiếp tục</a></div>';
	mysql_query("UPDATE `users` SET `btkethon` = '1' WHERE `id` = '".$user_id."'");
} 
else if ($datauser['btkethon']==1) {


	echo'<div class="omenu">Bật thành công,<a href="/index.html">Tiếp tục</a></div>';
	mysql_query("UPDATE `users` SET `btkethon` = '0' WHERE `id` = '".$user_id."'");
} 
break;
case 'chantt':
if ($datauser['chantuongtac']==1){
	echo'<div class="omenu">Bỏ chặn tương tác thành công,<a href="/index.html">Tiếp tục</a></div>';
	mysql_query("UPDATE `users` SET `chantuongtac` = '0' WHERE `id` = '".$user_id."'");

} else {
echo'<div class="omenu">Chặn tương tác thành công, người khác không thể hôn hoặc đánh bạn <a href="/index.html">Tiếp tục</a></div>';
	mysql_query("UPDATE `users` SET `chantuongtac` = '1' WHERE `id` = '".$user_id."'");

}
break;
case 'antt':
if ($datauser['antttiente']==0){
	echo'<div class="omenu">Ẩn thông tin tiền tệ thành công<a href="/index.html">Tiếp tục</a></div>';
	mysql_query("UPDATE `users` SET `antttiente` = '1' WHERE `id` = '".$user_id."'");

} else {
echo'<div class="omenu">Bỏ ấn thông tin tiền tệ thành công <a href="/index.html">Tiếp tục</a></div>';
	mysql_query("UPDATE `users` SET `antttiente` = '0' WHERE `id` = '".$user_id."'");

}
}
require_once('../incfiles/end.php');
?>