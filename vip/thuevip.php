<?php
define('_IN_JOHNCMS', 1);
$headmod = 'mod';
$bhead = 2;
require('../incfiles/core.php');
//Keet thuc topic
if(!$user_id){
require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
$textl = 'Khu VIP';
require('../incfiles/head.php');
	$time = time();
echo'<div class="nenvip">Thuê VIP</div>';
	if ($datauser['timevip'] >=time() ) {
echo'<div class="omenu"><b><font color="red">Lỗi!</font></b> VIP của bạn còn <b><i> '.($datauser['timevip'] ? thoigiantinh(floor($datauser['timevip'])).'' : '0 ngày').'</i></b> </div>';
	} else if ($datauser['kichhoat'] ==0) {

echo'<div class="omenu"><b>Bạn cần kích hoạt để sử dụng chức năng này </b></a></div>';
	} else {


echo '<form method ="post">';

if (isset($_POST['submit'])) {
	$time = time();

	if ($datauser['luong'] <2000) {
		echo'<div class="omenu">Bạn không đủ lượng</div>';
	}  else 	if ($datauser['timevip'] >=time() ) {
		echo'<div class="omenu">Lỗi</div>';
	} else {
	echo'<div class="omenu">Thuê thành công VIP 30 ngày</div>';
$bot = "Chúc mừng @$user_id đã thuê thành công VIP ";
	$bot=html_entity_decode($bot,ENT_QUOTES,'UTF-8');
$time = time()+10;
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '256',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");
	
			mysql_query("UPDATE `users` SET `kichhoatvip` = '1',`luong`=`luong`-'2000' ,`timevip`= " .time(). " + '2592000' WHERE `id` = '{$user_id}'");
	}
}
echo'<div class="omenu">Bạn có muốn thuê VIP <b> 30 ngày </b>với giá<b> 2000 Lượng</b> không? Sẽ có rất nhiều ưu đãi sau khi thuê VIP</br>';

echo'<center><input type ="submit" name = "submit" value ="Thuê ngay"></center></form></div>';
}
require('../incfiles/end.php');
?>