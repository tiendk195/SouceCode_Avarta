<?php
///*Coppy thì ghi nguồn ko thì khỏi ghi cũng đừng để tên mình xong coppy ra đi hỏi*////
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$textl='Chuyển Xu Lượng';
require('../incfiles/head.php');
if (!$user_id) {
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
echo' ';
if($datauser['vip'] < 1){
	echo'<div class="phdr">Dịch Vụ Chuyển Xu Lượng</div>';

echo'<div class="omenu"><center><b>Chức năng chỉ áp dụng cho VIP';
echo'</b></div>';
require('../incfiles/end.php');
exit;
}
echo'<div class="phdr">Dịch Vụ Chuyển Xu Lượng</div>';
if(isset($_POST['submit'])){
$id=intval($_POST['id']);
$xu=intval($_POST['xu']);
$luong=intval($_POST['luong']);
$diemnapthe=intval($_POST['diemnapthe']);
$p = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$id."'"));
if($datauser['xu'] > 1 || $datauser['xu'] < 100000000000){
mysql_query("UPDATE `users` SET `xu` = `xu`+'".$xu."',`luong` = `luong`+'".$luong."' WHERE `id` = '".$id."' LIMIT 2");
mysql_query("UPDATE `users` SET `xu` = `xu`-'".$xu."',`luong` = `luong`-'".$luong."',`diemnapthe` = `diemnapthe`- 10000 WHERE `id` = '".$user_id."' LIMIT 2");
echo'<div class="rmenu">Chuyển thành công</div>';
}
}
echo'<div class="omenu">
<form method="post">ID thành viên: <input type="text" name="id" value="'.$_POST['id'].'"></br>Xu: <input type="text" name="xu" value="'.$_POST['xu'].'"></br>
Lượng: <input type="text" name="luong" value="'.$_POST['luong'].'">
<input type="submit" name="submit" value="CHUYỂN"></form></div>';


require('../incfiles/end.php');
?>