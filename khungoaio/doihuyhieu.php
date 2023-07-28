<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
require('../incfiles/head.php');
if (!$user_id) {
header('Location: /login.php');
exit;
}

$pin = rand(100000000,999999999);
$seri = rand(100000000,999999999);
$huyhieu=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='125'"));


$r = rand(1,50);
$da = rand(5,20);

echo'
<div class="nenvip">Đổi Huy hiệu 1STPay </div>';
if ($datauser['kichhoat']==0){
		echo'<div class="omenu"><b><font color="red">Lỗi!</font></b>Bạn cần kích hoạt tài khoản</div>';
require('../incfiles/end.php');
exit;
} 
echo'<div class="omenu"><form method="post"><center>Bạn có muốn đổi <font color="green"> 5 Huy hiệu 1STPay <img src="/images/vatpham/125.png"></font> để lấy 1 Thẻ <font color="red">1STPay 20,000 VND</font> không?<br>
<input class="submit" type="submit" name="submit" value="Đổi">

</center></form></div>';
if (isset($_POST['submit'])) {

	if ($huyhieu['soluong']<5) {

		echo'<div class="omenu"><b><font color="red">Lỗi!</font></b> Bạn cần <font color="green"> 5 Huy hiệu 1STPay <img src="/images/vatpham/125.png"></font> mới có thể đổi!</div>';
	} else {
	
echo'<div class="omenu">Chúc mừng bạn đã đổi thành công <font color="red">1STPay 20,000 VND</font>, thẻ đã được gửi vào Thông Báo!</div>';

  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'5' WHERE `user_id`='".$user_id."' AND `id_shop` = '125'");
$text = 'Chúc mừng '.$login.' đã đổi thành công [b]1STPay 20,000 VND[/b] tại Ngoại ô ';
$text2 = '<center><img src="http://i.imgur.com/UUNSdhi.png"><br><font color="green">Thẻ 1STPay Mệnh Giá 20.000 VND</font></br><font color="red">Mã Pin: '.$pin.' </font></center>';
$time = time()+10;
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '256',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($text) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");

mysql_query("INSERT INTO `1STPay` SET
`pin`='".$pin."',
`user_tao`= '".$user_id."',
`timetao` = '".time()."',
`menhgia`='20000'");
mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$user_id."',
                `user` = '".$user_id."',
                `text` = '$text2',
                `ok` = '1',
                `time` = '" . time() . "'
            ");



//echo'<div class="omenu"><center>Bạn đã quay được 1 triệu xu</center></div>';
}
}


require('../incfiles/end.php');
?>