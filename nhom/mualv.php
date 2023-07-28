<?php
define('_IN_JOHNCMS',1);	
include('../incfiles/core.php');
$textl='NV Bang hội';
include('../incfiles/head.php');
$id= intval(abs($_GET['id']));
$sql=mysql_query("select * from `nhom` where `user_id`='".$user_id."' limit 1")or die( mysql_error());
$tv =mysql_result(mysql_query("SELECT COUNT(*) FROM `nhom_user` WHERE `id`='".$id."' AND `duyet`='1'"),0);
$nhom = mysql_fetch_array(mysql_query("SELECT * FROM `nhom` WHERE `id`='".$id."'"));
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
switch($_GET['act'])
{
default:
echo'<div class="phdr">Mua Level</div>';
if($nhom['xu'] > 10000000){
echo'<form action ="mualv.php?id='.$id.'&act=taook" method="post">';
echo'<div class="menu">Giá: 1 level / 10.000.000 Xu Clans</div>';
echo '<div class="list1">Bạn Muốn Mua Bao Nhiêu?:<br/><input name="sorada" value="" /><br/></div>';
echo'<input type="submit" value="Mua"></input></form>';
}else{echo'<div class="phdr">Có Tiền Mua Không Má</div>';}
break;
case 'taook':
$sorada= functions::checkout($_POST['sorada']);
$thanhtien= $sorada * 10000000;
if($sorada > 0 && $nhom['xu'] >= $thanhtien){
mysql_query("UPDATE `nhom` SET `xu`=`xu`-'$thanhtien'  WHERE `id` = '$id' LIMIT 1");
mysql_query("UPDATE `nhom` SET `lv`=`lv`+ '$sorada'  WHERE `id`= '$id' LIMIT 1");
echo'<div class="phdr">Thành Công</div><br>';
echo'<div class="menu">Mua Thành Công Rồi ...</div><br>';} else { 
echo'<div class="phdr">Đéo Thành Công</div><br>';
echo'<div class="menu">Không đủ xu</div><br>';}
break;

}
require_once ("../incfiles/end.php");
?>