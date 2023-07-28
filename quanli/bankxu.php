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

if($datauser['id'] != 1){
echo'<div class="news"><center><b>Lỗi</center>';
echo'</b></div>';
require('../incfiles/end.php');
exit;
}
echo'<div class="phdr">Dịch Vụ Chuyển Lượng Khóa</div>';
if(isset($_POST['submit'])){
$id=intval($_POST['id']);
$luongkhoa=intval($_POST['luongkhoa']);
$p = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$id."'"));
if ($luongkhoa <=0) {
echo'<div class="omenu">Lỗi</div>';
} else {
mysql_query("UPDATE `users` SET `xu` = `xu`+'".$luongkhoa."' WHERE `id` = '".$id."' LIMIT 2");
//mysql_query("UPDATE `users` SET `xu` = `xu`-'".$xu."',`luong` = `luong`-'".$luong."',`diemnapthe` = `diemnapthe`- 10000 WHERE `id` = '".$user_id."' LIMIT 2");
echo'<div class="omenu">Chuyển thành công</div>';
	$text='Bạn nhận được '.$luongkhoa.' xu từ Admin ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
}
}
echo'<div class="omenu">
<b><font color="red">Lưu ý: Chỉ chuyển Xu, Lượng cho Member tham gia event</br>
Admin có thể chuyển cho mình!</br>
Trường hợp chuyển cho thành viên khác hoặc nick phụ sẽ bị <s>Band Vĩnh Viễn</s></b></font>
<form method="post">ID thành viên: <input type="number" name="id" value="'.$_POST['id'].'"></br>Lượng khóa: <input type="number" name="luongkhoa" value="'.$_POST['luongkhoa'].'"></br>
<input type="submit" name="submit" value="CHUYỂN"></form></div>';


require('../incfiles/end.php');
?>