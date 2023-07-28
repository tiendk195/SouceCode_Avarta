<?php
define('_IN_JOHNCMS', 1);
$textl = 'Khu Boss Clan';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
$cl = mysql_fetch_array(mysql_query("SELECT * FROM `nhom_user` WHERE `user_id`='".$user_id."'"));
$clan = mysql_fetch_array(mysql_query("SELECT * FROM `nhom` WHERE `id`='".$cl['id']."'"));
$gio = date("Hi");

echo'<div class="phdr">Khu Boss Clan</div>';
if($clan < 1){
    
echo'<div class="omenu"><b>Vui lòng gia nhập Clan để sử dụng chức năng</b></div>';
} else if ($datauser['kichhoat']==0) {
    echo'<div class="omenu"><b>Vui lòng kích hoạt tài khoản để sử dụng chức năng</b></div>';
} else if ($datauser['postforum']<20) {
    echo'<div class="omenu"><b>Vui lòng đạt 20 bài viết để sử dụng chức năng</b></div>';
} else
/*
if($gio < 1900){
echo'<div class="omenu">Khu boss chỉ mở từ 19h => 22h hàng ngày! Vui lòng quay lại sau</div>';
} else if($gio > 2200){
echo'<div class="omenu">Khu boss chỉ mở từ 19h => 22h hàng ngày! Vui lòng quay lại sau</div>';
} else {
*/ 
{

echo'<div class="menu"><a href="/nhom/boss/map.php">→ Vào khu nhóm</a></div>';
echo'<div class="menu"><a href="/nhom/boss/thue-khu.php">→ Thuê khu nhóm</a></div>';
echo'<div class="menu"><a href="/nhom/boss/doiqua.php">→ Đổi quà hội nhóm</a></div>';
echo'<div class="menu"><a href="/nhom/boss/bxh.php">→ Bảng xếp hạng</a></div>';
}
require_once ("../../incfiles/end.php");
?>