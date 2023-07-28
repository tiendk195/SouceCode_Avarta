<?php

define('_IN_JOHNCMS',1);
require_once('../incfiles/core.php');
$textl='Trang cá nhân';
require_once('../incfiles/head.php');
echo '<div class="phdr">Công cụ</div>';
if(!$user_id){
echo 'chức năng chỉ dành cho thành viên đăng kí';
require_once('../incfiles/end.php');
exit;
}
if ($datauser['naptichluy']<10000) {
echo'<div class="omenu"><font color="red"><b>Bạn không thực hiện được chức năng này!</br><a href="/vip">Trở thành VIP ngay</a></b></font></div>';
} else {
switch($act) {

case 'batvip':
 if($datauser['hienthivip'] == 1){

echo'<div class="omenu"><font color="red"><b>Bạn đã bật hiển thị VIP rồi mà?</b></font></div>';
} else {
	
echo'<div class="omenu"><font color="red"><b>Bạn đã bật hiển thị VIP thành công</b></font></div>';
 mysql_query("UPDATE `users` SET `hienthivip`= '1'  WHERE `id`='{$user_id}'"); 
header('location: btvip.php');


}
break;
case 'tatvip':
if($datauser['naptichluy'] < 1){
echo'<div class="omenu"><font color="red"><b>Bạn không thực hiện được chức năng này!</br><a href="/vip">Trở thành VIP ngay</a></b></font></div>';
} else if($datauser['hienthivip'] == 0){

echo'<div class="omenu"><font color="red"><b>Bạn đã tắt hiển thị VIP rồi mà?</b></font></div>';
} else {
	
echo'<div class="omenu"><font color="red"><b>Bạn đã tắt hiển thị VIP thành công</b></font></div>';
 mysql_query("UPDATE `users` SET `hienthivip`= '0'  WHERE `id`='{$user_id}'"); 
header('location: btvip.php');

}
break;
}
if($datauser['hienthivip'] == 0){
echo'<div class="omenu"><img src="/icon/vao.png"><a href="?act=batvip" style="color :#6a6a6a;"> Bật hiển thị VIP</a>

</div>';
} else if($datauser['hienthivip'] == 1){

echo'<div class="omenu"><img src="/icon/vao.png"><a href="?act=tatvip" style="color :#6a6a6a;"> Tắt hiển thị VIP</a>

</div>';
}
}

require_once('../incfiles/end.php');
?>