<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$textl='Chuyển Xu Lượng';
require('../incfiles/head.php');
if (!$user_id) {
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}

if($datauser['rights'] < 9){
echo functions::display_error($lng['access_guest_forbidden']);

require('../incfiles/end.php');
exit;
}
echo'<div class="phdr">Công cụ chuyển xu lượng</div>';
switch($act) {
default:
	echo'<div class="omenu"><a href="?act=lichsu">Xem lịch sử chuyển</a></div>';


if(isset($_POST['submit'])){
$id=intval($_POST['id']);
$sotien=intval($_POST['sotien']);
$loaitien=$_POST['loaitien'];
$lido=$_POST['lido'];

$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` where `id` = '".$id."' "), 0);

$p = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$id."'"));
if (empty($lido) ){
	echo'<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Vui lòng nhập lí do chuyển</div>';
} else
if ($loaitien !='xu' && $loaitien !='luong' && $loaitien !='luongkhoa' ){
	echo'<div class="omenu">Lỗi</div>';
} else
if ($check<1){
	echo'<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Thành viên không tồn tại</div>';
} else {
mysql_query("UPDATE `users` SET `$loaitien` = `$loaitien`+'".$sotien."' WHERE `id` = '".$id."'");
echo'<div class="omenu">Chuyển thành công cho '.nick($id).' với số tiền '.number_format($sotien).''.$loaitien.'</div>';
	$text='Bạn nhận được '.number_format($sotien).''.$loaitien.' từ Admin với lí do: <b>'.$lido.'</b> ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
//lịch sử chuyển
mysql_query("INSERT INTO `ls_chuyenxl` SET
`user_id`='".$user_id."',
`user_nhan`='".$id."',
`sotien`='".$sotien."',
`loaitien`='".$loaitien."',
`lido`='$lido',
`time`='".time()."'
");
}
}

echo'<div class="omenu"><center>
<b><font color="red">Lưu ý: Chỉ chuyển Xu, Lượng cho Member tham gia event</br>
Vui lòng nhập lí do chuyển!</br>
Trường hợp chuyển cho thành viên khác hoặc nick phụ sẽ bị <s>Band Vĩnh Viễn</s></b></font></br></br>
<form method="post">';
echo 'Chọn thành viên: <select name="id"  value="'.$_POST['id'].'">';
$qs=mysql_query("SELECT * FROM `users`");
while ($show=mysql_fetch_array($qs)) {
echo '<option value="'.$show[id].'">'.$show[id].': '.$show[name].'</option>';
}
echo '</select><br/>';
echo 'Loại tiền: <select name="loaitien">
<option value = "xu">Xu</option><option value = "luong">Lượng</option><option value = "luongkhoa">Lượng khóa</option></select><br>';

echo'Số tiền: <input type="text" name="sotien" value="'.$_POST['sotien'].'"></br>';
echo'Lí do chuyển: <input type="text" name="lido" value="'.$_POST['lido'].'"></br></br>

<input type="submit" name="submit" value="CHUYỂN"></form></div>';

echo'</center>';
break;
case 'lichsu':


$res=mysql_query("SELECT * FROM `ls_chuyenxl` WHERE `id`!='0' ORDER BY `id` DESC LIMIT $start,$kmess");



while ($post = mysql_fetch_array($res)){

    echo'<div class="omenu">';
echo'<b>Người gửi: </b><a href="/member/'.$post[user_id].'.html" >'.nick($post['user_id']).' </a></br>
<b>Người nhận: </b><a href="/member/'.$post[user_nhan].'.html" >'.nick($post['user_nhan']).' </a></br>
<b>Số tiền: </b>'.$post['sotien'].''.$post[loaitien].' </a></br>

<b>Lí do chuyển : '.$post['lido'].'</b></br>
<b>Thời gian:  '.date("d/m/Y - H:i", $post['time']).'</b></br></div>';
}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `ls_chuyenxl` WHERE `id`!=0"), 0);
IF($total > $kmess){
Echo'<div class="phdr">'.functions::pages('?act=lichsu&page=', $start, $total, $kmess).'</div>';
}
}

require('../incfiles/end.php');
?>