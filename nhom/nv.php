<?php
define('_IN_JOHNCMS',1);	
include('../incfiles/core.php');
$textl='NV Bang hội';
include('../incfiles/head.php');
$id= intval(abs($_GET['id']));
$sql=mysql_query("select * from `nhom` where `user_id`='".$user_id."' limit 1")or die( mysql_error());
$tv =mysql_result(mysql_query("SELECT COUNT(*) FROM `nhom_user` WHERE `id`='".$id."' AND `duyet`='1'"),0);
$nhom = mysql_fetch_array(mysql_query("SELECT * FROM `nhom` WHERE `id`='".$id."'"));
echo'<div class="phdr">Nhiệm Vụ</div>';
if(!mysql_num_rows($sql)){
	echo functions::display_error('Bạn không phải là bang chủ của bất cứ bang nào');
	include('../incfiles/end.php');
	exit;
}

if($nhom['user_id'] != $user_id) {
echo '<br/><div class="tb">Bạn không đủ quyền!</div>';
require('../incfiles/end.php');
exit;
}
Switch($act){
Case 'thuong1':
if($datauser['nvclan'] >= 1) {
echo '<div class="list1" style="padding:6px;">Nhận r còn nhận ji nửa!</div>';
require('../incfiles/end.php');
exit;
}

if($tv < 2){
echo '<div class="list1" style="padding:6px;">Đã hoàn thành đâu mà đòi nhận</div>';
require('../incfiles/end.php');
exit;
}
echo'Nhận thưởng thành công';
mysql_query("update `nhom` set `lv`=`lv`+'20' where `id`='{$id}' limit 1")or die( mysql_error());
mysql_query("UPDATE `users` SET `nvclan`='1' WHERE `id`='{$user_id}'");
require('../incfiles/end.php');
exit;
Break;
Case 'thuong2':
if($datauser['nvclan'] >= 2) {
echo '<div class="list1" style="padding:6px;">Nhận r còn nhận ji nửa!</div>';
require('../incfiles/end.php');
exit;
}

if($tv < 5){
echo '<div class="list1" style="padding:6px;">Đã hoàn thành đâu mà đòi nhận</div>';
require('../incfiles/end.php');
exit;
}
echo'Nhận thưởng thành công';
mysql_query("update `nhom` set `lv`=`lv`+'20' where `id`='{$id}' limit 1")or die( mysql_error());
mysql_query("UPDATE `users` SET `nvclan`='2' WHERE `id`='{$user_id}'");
require('../incfiles/end.php');
exit;
Break;
Case 'thuong3':
if($datauser['nvclan'] >= 3) {
echo '<div class="list1" style="padding:6px;">Nhận r còn nhận ji nửa!</div>';
require('../incfiles/end.php');
exit;
}

if($tv < 10){
echo '<div class="list1" style="padding:6px;">Đã hoàn thành đâu mà đòi nhận</div>';
require('../incfiles/end.php');
exit;
}
echo'Nhận thưởng thành công';
mysql_query("update `nhom` set `lv`=`lv`+'30' where `id`='{$id}' limit 1")or die( mysql_error());
mysql_query("UPDATE `users` SET `nvclan`='3' WHERE `id`='{$user_id}'");
require('../incfiles/end.php');
exit;
Break;
Case 'thuong4':
if($datauser['nvclan'] >= 4) {
echo '<div class="list1" style="padding:6px;">Nhận rồi mà nhận gì nữa</div>';
require('../incfiles/end.php');
exit;
}

if($tv < 20){
echo '<div class="list1" style="padding:6px;">Đã hoàn thành đâu mà đòi nhận</div>';
require('../incfiles/end.php');
exit;
}
echo'Nhận thưởng thành công';
mysql_query("update `nhom` set `lv`=`lv`+'40' where `id`='{$id}' limit 1")or die( mysql_error());
mysql_query("UPDATE `users` SET `nvclan`='4' WHERE `id`='{$user_id}'");
require('../incfiles/end.php');
exit;
Break;
Case 'thuong5':
if($datauser['nvclan'] >= 5) {
echo '<div class="list1" style="padding:6px;">Nhận rồi mà nhận gì nữa</div>';
require('../incfiles/end.php');
exit;
}

if($nhom['phoban'] < 60){
echo '<div class="list1" style="padding:6px;">Đã hoàn thành đâu mà đòi nhận</div>';
require('../incfiles/end.php');
exit;
}
echo'Nhận thưởng thành công';
	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2927'"));

 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='0'
");
mysql_query("UPDATE `users` SET `nvclan`='5' WHERE `id`='{$user_id}'");

require('../incfiles/end.php');
exit;
Break;

}
echo '<div class="omenu"><b>Nhiệm vụ 1:</b> Clan đạt 2 thành viên. Phần thưởng nhận được là +20 level! ';
if($tv >= 2){
echo'<span style="color:red; font-weight:bold;"><a href="?id='.$id.'&act=thuong1">√ Nhận Thưởng!</span></a>';
}
echo'</div>';
echo'<div class="omenu"><b>Nhiệm vụ 2:</b> Clan đạt 5 thành viên. Phần thưởng nhận được là +20 level! ';
if($tv >= 5){
echo'<span style="color:red; font-weight:bold;"><a href="?id='.$id.'&act=thuong2">√ Nhận Thưởng!</span></a>';
}
echo'</div>';
echo'<div class="omenu"><b>Nhiệm vụ 3:</b> Clan đạt 10 thành viên. Phần thưởng nhận được là +30 level! ';
if($tv >= 10){
echo'<span style="color:red; font-weight:bold;"><a href="?id='.$id.'&act=thuong3">√ Nhận Thưởng!</span></a>';
}
echo'</div>';
echo'<div class="omenu"><b>Nhiệm vụ 4:</b> Clan đạt 20 thành viên. Phần thưởng nhận được là +40 level! ';
if($tv >= 20){
echo'<span style="color:red; font-weight:bold;"><a href="?id='.$id.'&act=thuong4">√ Nhận Thưởng!</span></a>';
}
echo'</div>';
echo'<div class="omenu"><b>Nhiệm vụ 5:</b> Clan win phó bán 60 lần. Phần thưởng nhận được là Cánh thiên điểu ! ';
if($nhom['phoban'] >= 60){
echo'<span style="color:red; font-weight:bold;"><a href="?id='.$id.'&act=thuong5">√ Nhận Thưởng!</span></a>';
}
echo'</div>';


include('../incfiles/end.php');
exit;
?>