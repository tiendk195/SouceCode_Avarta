<?php
define('_IN_JOHNCMS', 1);
$headmod = 'mod';
$bhead = 2;

require('../incfiles/core.php');
require('../incfiles/head.php');
if(!$user_id){
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}

$reg_nd = isset($_POST['chuyenmuc']) ? functions::check(mb_substr(trim($_POST['chuyenmuc']), 0, 2)) : '';

echo'<div class="phdr"> Gửi hỗ trợ - Báo lỗi</div>';
switch($act) {

default:




break;
case 'xoa':
$id = (int)$_GET['id'];
$kt = mysql_num_rows(mysql_query("SELECT `id` FROM `hotro` WHERE `id`='".$id."'"));

if($kt==0) {
echo '<div class="omenu">Dữ liệu không tồn tại!</div>';
require('../incfiles/end.php');
exit;
}
/*
if($kt[duyet] <1) {
echo '<div class="rmenu">Chưa được duyệt!</div>';
require('../incfiles/end.php');
exit;
}
*/
if(isset($_POST['xoa'])) {
mysql_query("DELETE FROM `hotro` WHERE `id`='".$id."'");

echo '<div class="omenu"><font color="black">Bạn đã xóa thành công đơn hỗ trợ của bạn</b></font></div>';
} 

break;
}
switch($act) {
default:

break;
case 'xoaall':
$id = (int)$_GET['id'];
$kt = mysql_num_rows(mysql_query("SELECT `id` FROM `hotro` WHERE `user_id`='".$user_id."'"));

if($kt<=0) {
echo '<div class="omenu">Dữ liệu không tồn tại!</div>';
require('../incfiles/end.php');
exit;
}

mysql_query("DELETE FROM `hotro` WHERE `user_id`='".$user_id."'");

echo '<div class="omenu"><font color="black">Bạn đã xóa thành công </b></font></div>';



break;
case 'lichsu':
    echo'<div class="omenu"><a href="?act=xoaall">Xóa tất cả</a></div>';
$res=mysql_query("SELECT * FROM `hotro` WHERE  `user_id` ='".$user_id."'  ORDER BY `id` DESC LIMIT $start,$kmess");
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `hotro` WHERE  `user_id` ='".$user_id."' "), 0);

while ($post = mysql_fetch_array($res)){


	
echo'<div class="omenu">
<b>Loại hỗ trợ: </b><font color="red">';
if ($post[loai] ==1 ) {
		echo'Báo lỗi';
	} 
		if ($post[loai] ==2 ) {
		echo'Khiếu nại';
	} 
		if ($post[loai] ==3 ) {
		echo'Tố cáo';
	} 
		if ($post[loai] ==4 ) {
		echo'Góp ý';
	}
	echo'</font></br>
<b>Nội dung:</b> <font color="blue">'.$post['noidung'].' </font></br>';
if  ($post['traloi']!='') {
echo'<b><font color="red">Trả lời: '.$post['traloi'].'</b></font></br>';
}
	echo'<b>Thời gian: </b>'.functions::display_date($post['time']).'';

echo'</br><b>Trạng thái: </b><font color="green">';
 if ($post[duyet] ==0 ) {
		echo'Chưa được duyệt';
	} 
		if ($post[duyet] ==1 ) {
		echo'Đã được duyệt';

	} 
		if ($post[duyet] ==2 ) {
		echo'Đã bị từ chối';
	} 
	
echo'</font>';
		echo '<form action="?act=xoa&id='.$post['id'].'" method="post" style="float:right"><input type="submit" name="xoa" value="Xóa"/></form>';

echo'</div>';

}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `hotro` WHERE `id`!=0"), 0);
IF($total > $kmess){
Echo'<div class="phdr">'.functions::pages('?act=lichsu&page=', $start, $total, $kmess).'</div>';
}
echo'<div class="omenu"><a href="/hotro"><img src ="/images/vao.png"> Quay lại</a></img></div>';

require('../incfiles/end.php');
exit;


}
if(isset($_POST['submit'])) {
	$name=trim($_POST['noidung']);
$kt=mysql_query("SELECT * FROM `hotro` WHERE `duyet`='0' AND `user_id`='".$user_id."'");
$checkkt=mysql_num_rows($kt);
if ($checkkt>=2) {
	echo'<div class="omenu"><b>Đã đạt tối đa số lần gửi, vui lòng đợi duyệt để tiếp tục!</b></div>';

} else 
if (empty($name)) {
	echo'<div class="omenu"><b>Bạn chưa nhập</b></div>';
} else {
    
echo'<div class="omenu"><b> Đã gửi thành công</b></div>';
@mysql_query("INSERT INTO `hotro` SET
 `user_id`='".$user_id."',
`time`='".time()."',
 `loai`='$reg_nd',
   `duyet`='0',
 `noidung` ='".mysql_real_escape_string($name)."'");


}

}
echo'<div class="omenu"><b><form method="post">
<font color="red"> Chuyên mục:</b></font><br/>
<select name="chuyenmuc" ' . (isset($error['chuyenmuc']) ? ' style="background-color: #FFCCCC"' : '') . ' >
<option value="1"' . ($reg_nd == '1' ? ' selected="selected"' : '') . '>Báo lỗi</option>
<option value="2"' . ($reg_nd == '2' ? ' selected="selected"' : '') . '>Khiếu nại</option>
<option value="3"' . ($reg_nd == '3' ? ' selected="selected"' : '') . '>Tố cáo</option>
<option value="4"' . ($reg_nd == '4' ? ' selected="selected"' : '') . '>Góp ý</option>
</select><br/>
<br>';

echo'<b><font color="red"> Nội dung :</b></font><br/>
<textarea name="noidung"  placeholder="Nhập nội dung muốn hỗ trợ..."></textarea>
<br>';

 echo '<input type="submit" name="submit" value="Gửi" /></form> ';
echo'<img src="/images/vao.png"> <a href="?act=lichsu"> Xem các phiếu hỗ trợ đã gửi </a></div>';

require('../incfiles/end.php');

?>