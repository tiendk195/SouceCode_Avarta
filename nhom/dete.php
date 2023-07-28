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

echo'<div class="phdr">Thống kê diễn đàn</div>';
echo'<div class="list1">Thành viên : <b><font color="0000ff">' .number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `users`"), 0)) . '</font> - </b>Đề tài : <b><font color="0000FF">' .number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `forum` WHERE `type` = 't' AND `close` != '1'"), 0)) . '</font> - </b>Bài gửi : <b><font color="0000FF">105,505</font></b>';
echo'</div>
';
require_once ("../incfiles/end.php");
?>