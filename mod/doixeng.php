<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
require('../incfiles/head.php');
if (!$user_id) {
echo '<div class="omenu"><p><b>Lỗi!</b><br>Trang chỉ dành cho thành viên!</p></div>';
require('../incfiles/end.php');
exit;
}
echo '<div class="phdr">Đổi xu sang xèng</div>';

switch ($act){
	default:
	if ($datauser['id']==1){
	echo'<div class="omenu"><a href="?act=lichsu">Xem lịch sử</a></div>';

}
if (isset($_POST[doi])) {
$xu=(int)$_POST[xu];
$xeng = $xu-($xu*1.8/100);
if (empty($xu)) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập xu!</div>';
} else 
	if ($xu<0) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập xu!</div>';
} else 

if ($datauser['xu']< $xu) {
echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ xu để đổi!</div>';

} else {
	echo '<div class="omenu">Đổi thành công '.number_format($xu).' xu - bạn nhận được '.number_format($xeng).' xèng</div>';
mysql_query("INSERT INTO `ls_doixeng` SET
`user_id`='".$user_id."',
`xu`='".$xu."',
`xeng`='".$xeng."',
`time`='".time()."'
");
mysql_query("UPDATE `users` SET `xu` = `xu` - '".$xu."',`xeng`=`xeng`+'".$xeng."' WHERE `id`= '".$user_id."'");

}
}
echo'<center><div class="omenu">Đổi xu sang xèng với phí 1,8%';

		echo '<form method="post">';

echo'Nhập số xu muốn đổi</br>';
echo'<input type="number" name="xu"><br/>
<input type="submit" name="doi" value="Đổi" class="nut"></form></div></center>';
break;

case 'xoa':
if ($datauser['id']!=1 ) {
header('Location: /index.php');
}
mysql_query("DELETE FROM `ls_doixeng`");

break;

case 'lichsu':
if ($datauser['id']!=1 ) {
header('Location: /index.php');
}


$res=mysql_query("SELECT * FROM `ls_doixeng` WHERE `id`!='0' ORDER BY `id` DESC LIMIT $start,$kmess");
echo'<div class="omenu"><a href="?act=xoa">Xóa lịch sử</a></div>';


while ($post = mysql_fetch_array($res)){

    echo'<div class="omenu">';
echo'<b>Người đổi: </b><a href="/member/'.$post[user_id].'.html" >'.nick($post['user_id']).' </a></br>
<b>Số tiền đổi : '.number_format($post['xu']).' xu</b></br>
<b>Số tiền nhận : '.number_format($post['xeng']).' xèng</b></br>

<b>Thời gian:  '.date("d/m/Y - H:i", $post['time']).'</b></br></div>';
}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `ls_doixeng` WHERE `id`!=0"), 0);
IF($total > $kmess){
Echo'<div class="phdr">'.functions::pages('?act=lichsu&page=', $start, $total, $kmess).'</div>';
}
break;

}


require('../incfiles/end.php');
?>