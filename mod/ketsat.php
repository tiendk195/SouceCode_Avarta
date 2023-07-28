<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
require('../incfiles/head.php');
if (!$user_id) {
echo '<div class="omenu"><p><b>Lỗi!</b><br>Trang chỉ dành cho thành viên!</p></div>';
require('../incfiles/end.php');
exit;
}
echo '<div class="phdr">Két sắt</div>';

if (empty($datauser['passketsat'])){
	if (isset($_POST[tao])) {
$passks=$_POST[passks];
if (empty($passks)) {
		echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập mật khẩu két sắt!</div>';


} else {
	echo '<div class="omenu">Tạo thành công. Mật khẩu của bạn là: '.$passks.' </div>';

mysql_query("UPDATE `users` SET `passketsat` =  '".$passks."' WHERE `id`= '".$user_id."'");


}
}
echo'<center><div class="omenu">Tạo mật khẩu két sắt';

		echo '<form method="post">';

echo'Nhập mật khẩu</br>';
echo'
<input type="text" name="passks"><br/>
<input type="submit" name="tao" value="Tạo" class="nut"></form></div></center>';
} else {
	$ketsat = mysql_fetch_array(mysql_query("SELECT * FROM `ketsat` WHERE `user_id` = '".$user_id."' "));

switch ($act){

	default:

	echo'<div class="omenu"><a href="?act=lichsu">Xem lịch sử</a></div>';


echo'<div class="omenu"><img src="/icon/next.png"><a href="?act=guixu"> Gửi xu 
</a></div>';
echo'<div class="omenu"><img src="/icon/next.png"><a href="?act=guiluong"> Gửi lượng 
</a></div>';
echo'<div class="omenu"><img src="/icon/next.png"><a href="?act=guiluongkhoa"> Gửi lượng khóa 
</a></div>';
echo'<div class="omenu"><img src="/icon/next.png"><a href="?act=doipass"> Đổi mật khẩu két sắt
</a></div>';
echo'<div class="phdr">Thông tin cá nhân</div>';
echo'<div class="omenu">Xu: '.number_format($ketsat['xu']).' ';
if ($ketsat['xu']>0 ){
echo'<a href="?act=rutxu"><font color="red">| Rút xu</a></font>';
}
echo'</br>
Lượng: '.number_format($ketsat['luong']).' ';
if ($ketsat['luong']>0 ){
echo'<a href="?act=rutluong"><font color="red">| Rút lượng</a></font>';
}
echo'</br>
Lượng khóa: '.number_format($ketsat['luongkhoa']).' ';
if ($ketsat['luongkhoa']>0 ){
echo'<a href="?act=rutluongkhoa"><font color="red">| Rút lượng khóa</a></font>';
}
echo'</br>';


echo'</div>';
break;
case 'doipass':
if (isset($_POST[doipass])) {
$passcu=$_POST[passcu];
$passmoi=$_POST[passmoi];
if (empty($passmoi) ) {
		echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập mật khẩu mới của két sắt!</div>';
} else 
if (empty($passcu) ) {
		echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập mật khẩu cũ của két sắt!</div>';


} else if ($passcu!=$datauser['passketsat']) {
			echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn nhập mật khẩu cũ chưa chính xác!</div>';
} else if ($passmoi==$datauser['passketsat']) {
				echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không được nhập trùng với mật khẩu cũ!</div>';

} else if ($datauser['luongkhoa']<100){
			echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ 100 lượng khóa để đổi!</div>';
} else {
	echo '<div class="omenu">Đổi thành công. Mật khẩu mới của bạn là: '.$passmoi.' </div>';

mysql_query("UPDATE `users` SET `passketsat` =  '".$passmoi."',`luongkhoa`=`luongkhoa`-'100' WHERE `id`= '".$user_id."'");


}
}
echo'<center><div class="omenu">Đổi mật khẩu két sắt với 100 lượng khóa';

		echo '<form method="post">';

echo'Nhập mật khẩu mới</br>';
echo'
<input type="text" name="passmoi"><br/>Nhập mật khẩu cũ</br><input type="text" name="passcu"></br>

<input type="submit" name="doipass" value="Đổi" class="nut"></form></div></center>';
break;

case 'rutxu':

if (isset($_POST[rut])) {
$xu=(int)$_POST[xu];
$pass=$_POST[pass];
if (empty($pass)) {
		echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập mật khẩu két sắt!</div>';
} else if ($pass!=$datauser['passketsat']){
		echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Mật khẩu két sắt không chính xác!</div>';
} else 
if (empty($xu)) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập xu!</div>';
} else 
	if ($xu<0) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập xu!</div>';
} else 

if ($ketsat['xu']< $xu) {
echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ xu để rút!</div>';

} else {
	echo '<div class="omenu">Rút thành công '.number_format($xu).' xu </div>';

mysql_query("UPDATE `users` SET `xu` = `xu` + '".$xu."' WHERE `id`= '".$user_id."'");

mysql_query("UPDATE `ketsat` SET `xu` = `xu` - '".$xu."' WHERE `user_id`= '".$user_id."'");

}
}
echo'<center><div class="omenu">Rút xu từ két sắt';

		echo '<form method="post">';

echo'Nhập số xu muốn rút</br>';
echo'<input type="number" name="xu"><br/>Nhập mật khẩu két sắt</br>
<input type="text" name="pass"><br/>
<input type="submit" name="rut" value="Rút" class="nut"></form></div></center>';
break;
case 'rutluong':
if (isset($_POST[rut])) {
$luong=(int)$_POST[luong];
$pass=$_POST[pass];
if (empty($pass)) {
		echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập mật khẩu két sắt!</div>';
} else if ($pass!=$datauser['passketsat']){
		echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Mật khẩu két sắt không chính xác!</div>';
} else 
if (empty($luong)) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập luong!</div>';
} else 
	if ($luong<0) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập luong!</div>';
} else 

if ($ketsat['luong']< $luong) {
echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ luong để rút!</div>';

} else {
	echo '<div class="omenu">Rút thành công '.number_format($luong).' luong </div>';

mysql_query("UPDATE `users` SET `luong` = `luong` + '".$luong."' WHERE `id`= '".$user_id."'");

mysql_query("UPDATE `ketsat` SET `luong` = `luong` - '".$luong."' WHERE `user_id`= '".$user_id."'");

}
}
echo'<center><div class="omenu">Rút luong từ két sắt';

		echo '<form method="post">';

echo'Nhập số luong muốn rút</br>';
echo'<input type="number" name="luong"><br/>Nhập mật khẩu két sắt</br>
<input type="text" name="pass"><br/>
<input type="submit" name="rut" value="Rút" class="nut"></form></div></center>';

break;
case 'rutluongkhoa':
if (isset($_POST[rut])) {
$luongkhoa=(int)$_POST[luongkhoa];
$pass=$_POST[pass];
if (empty($pass)) {
		echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập mật khẩu két sắt!</div>';
} else if ($pass!=$datauser['passketsat']){
		echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Mật khẩu két sắt không chính xác!</div>';
} else 
if (empty($luongkhoa)) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập luongkhoa!</div>';
} else 
	if ($luongkhoa<0) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập luongkhoa!</div>';
} else 

if ($ketsat['luongkhoa']< $luongkhoa) {
echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ luongkhoa để rút!</div>';

} else {
	echo '<div class="omenu">Rút thành công '.number_format($luongkhoa).' luongkhoa </div>';

mysql_query("UPDATE `users` SET `luongkhoa` = `luongkhoa` + '".$luongkhoa."' WHERE `id`= '".$user_id."'");

mysql_query("UPDATE `ketsat` SET `luongkhoa` = `luongkhoa` - '".$luongkhoa."' WHERE `user_id`= '".$user_id."'");

}
}
echo'<center><div class="omenu">Rút luongkhoa từ két sắt';

		echo '<form method="post">';

echo'Nhập số luongkhoa muốn rút</br>';
echo'<input type="number" name="luongkhoa"><br/>Nhập mật khẩu két sắt</br>
<input type="text" name="pass"><br/>
<input type="submit" name="rut" value="Rút" class="nut"></form></div></center>';

break;
case 'xoa':

mysql_query("DELETE FROM `ls_ketsat` WHERE `user_id`='".$user_id."'");

break;
case 'guixu':
if (isset($_POST[gui])) {
$xu=(int)$_POST[xu];
if (empty($xu)) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập xu!</div>';
} else 
	if ($xu<0) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập xu!</div>';
} else 

if ($datauser['xu']< $xu) {
echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ xu để gửi!</div>';

} else {
	echo '<div class="omenu">Gửi thành công '.number_format($xu).' xu  vào két sắt</div>';
mysql_query("INSERT INTO `ls_ketsat` SET
`user_id`='".$user_id."',
`xu`='".$xu."',
`time`='".time()."'
");
mysql_query("UPDATE `users` SET `xu` = `xu` - '".$xu."' WHERE `id`= '".$user_id."'");

mysql_query("UPDATE `ketsat` SET `xu` = `xu` + '".$xu."' WHERE `user_id`= '".$user_id."'");

}
}
echo'<center><div class="omenu">Gửi xu vào két sắt';

		echo '<form method="post">';

echo'Nhập số xu muốn gửi</br>';
echo'<input type="number" name="xu"><br/>
<input type="submit" name="gui" value="Gửi" class="nut"></form></div></center>';
break;
case 'guiluong':
if (isset($_POST[gui])) {
$luong=(int)$_POST[luong];
if (empty($luong)) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập lượng!</div>';
} else 
	if ($luong<0) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập lượng!</div>';
} else 

if ($datauser['luong']< $luong) {
echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ lượng để gửi!</div>';

} else {
	echo '<div class="omenu">Gửi thành công '.number_format($luong).' lượng  vào két sắt</div>';
mysql_query("INSERT INTO `ls_ketsat` SET
`user_id`='".$user_id."',
`luong`='".$luong."',
`time`='".time()."'
");
mysql_query("UPDATE `ketsat` SET `luong` = `luong` + '".$luong."' WHERE `user_id`= '".$user_id."'");
mysql_query("UPDATE `users` SET `luong` = `luong` - '".$luong."' WHERE `id`= '".$user_id."'");

}
}
echo'<center><div class="omenu">Gửi lượng vào két sắt';

		echo '<form method="post">';

echo'Nhập số lượng muốn gửi</br>';
echo'<input type="number" name="luong"><br/>
<input type="submit" name="gui" value="Gửi" class="nut"></form></div></center>';
break;
case 'guiluongkhoa':
if (isset($_POST[gui])) {
$luongkhoa=(int)$_POST[luongkhoa];
if (empty($luongkhoa)) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập lượng khóa!</div>';
} else 
	if ($luongkhoa<0) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập lượng khóa!</div>';
} else 

if ($datauser['luongkhoa']< $luongkhoa) {
echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ lượng khóa để gửi!</div>';

} else {
	echo '<div class="omenu">Gửi thành công '.number_format($luongkhoa).' lượng khóa  vào két sắt</div>';
mysql_query("INSERT INTO `ls_ketsat` SET
`user_id`='".$user_id."',
`luongkhoa`='".$luongkhoa."',
`time`='".time()."'
");
mysql_query("UPDATE `ketsat` SET `luongkhoa` = `luongkhoa` + '".$luongkhoa."' WHERE `user_id`= '".$user_id."'");
mysql_query("UPDATE `users` SET `luongkhoa` = `luongkhoa` - '".$luongkhoa."' WHERE `id`= '".$user_id."'");

}
}
echo'<center><div class="omenu">Gửi lượng khóa vào két sắt';

		echo '<form method="post">';

echo'Nhập số lượng muốn gửi</br>';
echo'<input type="number" name="luongkhoa"><br/>
<input type="submit" name="gui" value="Gửi" class="nut"></form></div></center>';
break;
case 'lichsu':



$res=mysql_query("SELECT * FROM `ls_ketsat` WHERE `id`!='0' AND `user_id`='".$user_id."' ORDER BY `id` DESC LIMIT $start,$kmess");
echo'<div class="omenu"><a href="?act=xoa">Xóa lịch sử</a></div>';


while ($post = mysql_fetch_array($res)){

    echo'<div class="omenu">';
	if ($post['xu']>0) {
		$loaitien='xu';
		
	} else if ($post['luong']>0) {
		$loaitien='luong';
	} else if ($post['luongkhoa']>0) {
		$loaitien='luongkhoa';
	} 
echo'

<b>Gửi: '.number_format($post[$loaitien]).' '.$loaitien.'</b></br>

<b>Thời gian:  '.date("d/m/Y - H:i", $post['time']).'</b></br></div>';
}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `ls_ketsat` WHERE `id`!=0  AND `user_id`='".$user_id."'"), 0);
IF($total > $kmess){
Echo'<div class="phdr">'.functions::pages('?act=lichsu&page=', $start, $total, $kmess).'</div>';
}
break;

}
}

require('../incfiles/end.php');
?>