<?php
define('_IN_JOHNCMS',1);
include('../incfiles/core.php');
$textl='Quỹ bang hội';
include('../incfiles/head.php');
$check=mysql_query("select `id` from `nhom_user` where `user_id`='$user_id' and `duyet`='1' limit 1")or die(mysql_error());
if(!mysql_num_rows($check)){
	echo functions::display_error('Bạn chưa có bang hội');
	include('../incfiles/end.php');
	exit;
}
$c=mysql_fetch_array($check);
$clan=mysql_fetch_array(mysql_query("select * from `nhom` where `id`='".$c['id']."' limit 1"));
echo'<div class="phdr"> Đóng góp quỹ bang</div>';
if( isset($_POST['sub'])){
	$xu=intval($_POST['xu']);
	$luong=intval($_POST['luong']);
	if(($xu>$datauser['xu'])or ($luong>$datauser['luong'])){
		echo functions::display_error('Bạn không có đủ xu hoặc lượng');
		include('../incfiles/end.php');
		exit;
	}
if(($xu < 0) or ($luong < 0)){
echo'pkoolvn: Tính bug à cu. Next đi nhé';
		include('../incfiles/end.php');
		exit;
	}
        $xu2 = $xu;
        $luong2 = $luong;
	$quyxu=$clan['xu']+$xu;
	$quyluong=$clan['luong']+$luong;
	mysql_query("update `nhom` set `xu`='".$quyxu."',`luong`='".$quyluong."' where `id`='".$c['id']."' limit 1")or die( mysql_error());
	$xu=$datauser['xu']-$xu;
	$luong=$datauser['luong']-$luong;
	mysql_query("update `users` set `xu`='".$xu."' , `luong`='".$luong."' where `id`='".$user_id."' limit 1")or die( mysql_error());
mysql_query("UPDATE `nhom_user` SET `xugop`=`xugop`+'{$xu2}' WHERE `user_id`='{$user_id}'");
mysql_query("UPDATE `nhom_user` SET `luonggop`=`luonggop`+'{$luong2}' WHERE `user_id`='{$user_id}'");
	echo'<div class="label-success">bạn đã đóng góp thành công</div>';
}
echo'<div class="menu"><form method="post"><p>Nhập số xu bạn muốn đóng góp cho bang hội:</p>';
echo'<p><input type="number" name="xu" value="1"></p>';
echo'<p>Nhập số lượng bạn muốn đóng góp cho bang hội:</p>';
echo'<p><input type="number" name="luong" value="1"></p>';
echo'<p align="center"><input type="submit" name="sub" value="Đóng góp"></p></form></div>';
require('../incfiles/end.php');
?>