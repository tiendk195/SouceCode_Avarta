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
echo'<div class="nenvip">Khu VIP</div>';
switch($act) {
default:
	$time = time();

if ($datauser['kichhoatvip']==0 || $datauser['timevip'] < $time) {
	echo'<div class="omenu"><font color="red">Lỗi!</font> Bạn cần VIP hoặc VIP của bạn đã hết hạn! <a href="thuevip.php"><img src="/images/vao.png"> Thuê VIP</a></div>';
} else
if ($datauser['kichhoat'] ==0) {

echo'<div class="omenu">Bạn cần kích hoạt để sử dụng chức năng này </a></div>';
	} else {
	

echo'<div class="omenu"><img src="/icon/vao.png"><a href="shoptinhtuy.php"> Shop điểm tinh túy</font></a></div>';
echo'<div class="omenu"><img src="/icon/vao.png"><a href="?act=baodanh"> Báo danh VIP hằng ngày</font></a></div>';

echo'<div class="omenu"><img src="/icon/vao.png"><a href="shadow.php"> Mua hiệu ứng nick</font></a></div>';
echo'<div class="omenu"><img src="/icon/vao.png"><a href="icon.php"> Mua icon nick</font></a></div>';

}
break;
case 'baodanh':
   if (time()>$datauser['timenhanquavip']+60*60*24) {
	   

echo'<div class="omenu"><b><center><font color="red"> Admin : </font>Ở mỗi ngày báo danh, bạn sẽ nhận ngẫu nhiên 1 đến 10 Đá ngũ sắc</center></b></div>';
echo'<div class="omenu"><center><form method="post"><input type="submit" name="submit" value="Báo danh"></form></center></div>';
if (isset($_POST[submit])) {
	$rand=rand(1,10);

	  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$rand."' WHERE `user_id`='".$user_id."' AND `id_shop` = '123'");
mysql_query("UPDATE `users` SET `timenhanquavip` = '".time()."' WHERE `id` = '".$user_id."'");

echo'<div class="omenu"><font color="green"><b>Chúc mừng bạn nhận được <b>'.$rand.'</b> Đá ngũ sắc <img src="/images/vatpham/123.png"> </b></font></div>';
}
   } else {
	   echo'<div class="omenu"><b><font color="red"> Lỗi! </font></b>Bạn đã báo danh hôm nay rồi nhé, vui lòng quay lại vào ngày hôm sau</div>';
   }

}

require('../incfiles/end.php');
?>