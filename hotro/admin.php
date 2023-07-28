<?php
define('_IN_JOHNCMS', 1);
$headmod = 'mod';
$bhead = 2;
require('../incfiles/core.php');
require('../incfiles/head.php');

if(!$user_id){
require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
if ($rights<9) {
	require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}


$reg_nd = isset($_POST['chuyenmuc']) ? functions::check(mb_substr(trim($_POST['chuyenmuc']), 0, 2)) : '';

echo'<div class="phdr"> Trung tâm Hỗ Trợ</div>';


$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `hotro` WHERE  `duyet` ='0' "), 0);
$res = mysql_query("SELECT * FROM `hotro` WHERE  `duyet` ='0'  LIMIT $start, $kmess");


while ($post = mysql_fetch_array($res)){
	$t2= mysql_fetch_array(mysql_query("SELECT * FROM `users` where  `id`= '" . $post[user_id] . "'"));

	switch($act) {
default:
break;

case'duyet':
	$id = (int)$_GET['id'];

$kt = mysql_num_rows(mysql_query("SELECT `id` FROM `hotro` WHERE `id`='".$id."'"));
	$t3= mysql_fetch_array(mysql_query("SELECT * FROM `users` where  `user_id`= '" . $kt[user_id] . "'"));

if($kt==0) {
echo '<div class="rmenu">Dữ liệu không tồn tại!</div>';
require('../incfiles/end.php');
exit;
}
if(isset($_POST['submit'])) {
    		$name=trim($_POST['noidung']);

@mysql_query("UPDATE`hotro` SET
   `duyet`='1',`traloi`='".mysql_real_escape_string($name)."' WHERE `id`='".$id."'");

    header("Location: ?index.php");

} 
break;
case'khongduyet':

	$id = (int)$_GET['id'];
$kt = mysql_num_rows(mysql_query("SELECT `id` FROM `hotro` WHERE `id`='".$id."'"));
if($kt==0) {
echo '<div class="rmenu">Dữ liệu không tồn tại!</div>';
require('../incfiles/end.php');
exit;
}

if(isset($_POST['unsubmit'])) {
        		$name=trim($_POST['noidung']);

@mysql_query("UPDATE`hotro` SET
   `duyet`='2',`traloi`='".mysql_real_escape_string($name)."'   WHERE `id`='".$id."'");
echo '<div class="omenu"><font color="black">Bạn đã từ chối đơn hỗ trợ của<b> '.$t2['name'].'  </b></font></div>';
} 
break;

}


//while ($post2 = mysql_fetch_array($t)){

echo'<div class="omenu">
<b>Người gửi: </b><a href="/member/'.$post[user_id].'.html" >'.$t2['name'].' </a></br>
<b>Thời gian: </b>'.date("d/m/Y - H:i", $post['time']).'</br>
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
<b>Nội dung:</b> <font color="blue">'.$post['noidung'].' </font></br>
<b>Trạng thái: </b><font color="green">';
 if ($post[duyet] ==0 ) {
		echo'Chưa được duyệt</br>';
 }
		if ($post[duyet] ==1 ) {
		echo'Đã được duyệt';
	} 
echo'</font>';


echo '<form action="?act=duyet&id='.$post['id'].'" method="post">';
echo'<b><font color="red"> Nội dung trả lời :</b></font><br/>
<textarea name="noidung"  placeholder="Nhập nội dung muốn trả lời..."></textarea>
<br>';

echo'<input type="submit" name="submit" value="Trả lời"/></form>';



echo'</div>';

}
echo '<div class="phdr">Tổng: '.$tong.'</div>';

echo'<div class="omenu"><a href="/hotro"><img src ="/images/vao.png"> Quay lại</a></ img><form method="post">';

/*
if(isset($_POST['submit'])) {

	
@mysql_query("UPDATE`hotro` SET
   `duyet`='1'");


}
*/
echo'</div>';

 //echo '<input type="submit" name="submit" value="Duyệt" /></form></div> ';

require('../incfiles/end.php');

?>