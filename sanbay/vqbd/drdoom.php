<?php
define('_IN_JOHNCMS',1);
$rootpath='../../';

require('../../incfiles/core.php');
$textl='Dr.Doom';
require('../../incfiles/head.php');
if (!$user_id) {
header('Location: /login.php');
exit;
}
switch($act) {
default:
echo '<div class="phdr">'.$textl.'</div>';
echo'<center><b><font color="red"> Dr. Doom</font><br><img src="img/drdoom.gif"><br> Bí mật không thể bật mí !!</b></center>';
echo'<div class="omenu"><img src="/icon/next.png"><a href="?act=doiqua"> Đổi quà đặc biệt</a></div>';
echo'<div class="omenu"><a href="?act=doiqua"><img src="/icon/next.png"></a><a href="?act=mdmt"> Mua đá mặt trăng <img src="/images/vatpham/33.png"></a></div>
<div class="omenu"><img src="/icon/next.png"><a href="?act=dnlb"> Đổi Ngọc lục bảo <img src="/images/vatpham/32.png"></a></div>
<div class="omenu"><a href="?act=dnlb"><img src="/icon/next.png"></a><a href="?act=ddmt"> Đổi Đá mặt trăng <img src="/images/vatpham/33.png"></a></div>
<div class="omenu"><a href="?act=ddmt"><img src="/icon/next.png"></a><a href="?act=ddsh"> Đổi Đá sao hỏa <img src="/images/vatpham/34.png"></a></div>
<div class="omenu"><a href="?act=ddsh"><img src="/icon/next.png"></a><a href="?act=dkcvt"> Đổi Kim cương vũ trụ <img src="/images/vatpham/35.png"></a></div>';


break;
case 'dnlb':
echo '<div class="phdr">Đổi ngọc lục bảo </div>';

echo '<div class="omenu">Điểm chuyên cần '.$datauser[chuyencan].' điểm</div>';
echo'<div class="omenu"><center> Bạn có muốn đổi 1 Ngọc lục bảo = <font color="red">300 điểm chuyên cần</font> không ?<form method="post">
<input type="number" name="soluong" value="1" placeholder="Nhập số lượng"><br>
<input type="submit" name="submit" value="Đổi">
</form><center></center></center></div>';

if (isset($_POST[submit])) {
	$soluong=(int)$_POST[soluong];
$sl = $soluong*300;
 if ($soluong<1){
	echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn chưa nhập số lượng</div>';
} else if ($datauser[chuyencan] < $sl) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn cần <font color="green">'.$sl.' điểm chuyên cần</font> mới có thể đổi!</div>';
} else {
	
mysql_query("UPDATE `users` SET `chuyencan`=`chuyencan`-'$sl' WHERE `id`='".$user_id."' ");
mysql_query("UPDATE `vatpham`SET `soluong`=`soluong`+'$soluong' WHERE `id_shop`='32' AND `user_id`='".$user_id."'");
echo '<div class="omenu">Đổi thành công '.$soluong.' Ngọc lục bảo, bạn bị - '.$sl.' điểm chuyên cần</div>';
}
}

break;
case 'mdmt':
echo '<div class="phdr">Mua đá mặt trăng </div>';

echo'<div class="omenu"><center> Bạn có muốn mua 1 Đá mặt trăng = <font color="red">1.000.000 Xu</font> không ?<form method="post">
<input type="number" name="soluong" value="1" placeholder="Nhập số lượng"><br>
<input type="submit" name="submit" value="Mua">
</form><center></center></center></div>';

if (isset($_POST[submit])) {
	$soluong=(int)$_POST[soluong];
$sl = $soluong*1000000;
 if ($soluong<1){
	echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn chưa nhập số lượng</div>';
} else if ($datauser[xu] < $sl) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn cần <font color="green">'.$sl.' xu</font> mới có thể đổi!</div>';
} else {
	
mysql_query("UPDATE `users` SET `xu`=`xu`-'$sl' WHERE `id`='".$user_id."' ");
mysql_query("UPDATE `vatpham`SET `soluong`=`soluong`+'$soluong' WHERE `id_shop`='33' AND `user_id`='".$user_id."'");
echo '<div class="omenu">Đổi thành công '.$soluong.' Đá mặt trăng, bạn bị - '.$sl.' xu</div>';
}
}

break;
case 'ddmt':
$dmt=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='33'"));
$nlb=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='32'"));

echo '<div class="phdr">Đổi đá mặt trăng </div>';

echo'<div class="omenu"><center> Bạn có muốn đổi <font color="red">4 viên Ngọc lục bảo</font> để lấy <font color="green">1 Đá mặt trăng</font> không ?<form method="post">
<input type="number" name="soluong" value="1" placeholder="Nhập số lượng"><br>
<input type="submit" name="submit" value="Đổi">
</form><center></center></center></div>';

if (isset($_POST[submit])) {
	$soluong=(int)$_POST[soluong];
$sl = $soluong*4;
 if ($soluong<1){
	echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn chưa nhập số lượng</div>';
} else if ($nlb[soluong] < $sl) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn cần <font color="green">'.$sl.' ngọc lục bảo</font> mới có thể đổi!</div>';
} else {
	mysql_query("UPDATE `vatpham`SET `soluong`=`soluong`-'$sl' WHERE `id_shop`='32' AND `user_id`='".$user_id."'");

mysql_query("UPDATE `vatpham`SET `soluong`=`soluong`+'$soluong' WHERE `id_shop`='33' AND `user_id`='".$user_id."'");
echo '<div class="omenu">Đổi thành công '.$soluong.' Đá mặt trăng, bạn bị - '.$sl.' ngọc lục bảo</div>';
}
}

break;
case 'ddsh':
$dmt=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='33'"));

echo '<div class="phdr">Đổi đá sao hỏa </div>';

echo'<div class="omenu"><center>  Bạn có muốn đổi <font color="red">5 viên Đá mặt trăng</font> để lấy <font color="green">1 Đá sao hỏa</font> không ?<form method="post">
<input type="number" name="soluong" value="1" placeholder="Nhập số lượng"><br>
<input type="submit" name="submit" value="Đổi">
</form><center></center></center></div>';

if (isset($_POST[submit])) {
	$soluong=(int)$_POST[soluong];
$sl = $soluong*5;
 if ($soluong<1){
	echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn chưa nhập số lượng</div>';
} else if ($dmt[soluong] < $sl) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn cần <font color="green">'.$sl.' đá mặt trăng</font> mới có thể đổi!</div>';
} else {
	mysql_query("UPDATE `vatpham`SET `soluong`=`soluong`-'$sl' WHERE `id_shop`='33' AND `user_id`='".$user_id."'");

mysql_query("UPDATE `vatpham`SET `soluong`=`soluong`+'$soluong' WHERE `id_shop`='34' AND `user_id`='".$user_id."'");
echo '<div class="omenu">Đổi thành công '.$soluong.' Đá sao hỏa, bạn bị - '.$sl.' Đá mặt trăng</div>';
}
}
break;
case 'dkcvt':
$dsh=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='34'"));

echo '<div class="phdr">Đổi kim cương vũ trụ </div>';

echo'<div class="omenu"><center>Bạn có muốn đổi <font color="red">5 Đá sao hỏa</font> để lấy <font color="green">1 Kim cương vũ trụ</font> không ?<form method="post">
<input type="number" name="soluong" value="1" placeholder="Nhập số lượng"><br>
<input type="submit" name="submit" value="Đổi">
</form><center></center></center></div>';

if (isset($_POST[submit])) {
	$soluong=(int)$_POST[soluong];
$sl = $soluong*5;
 if ($soluong<1){
	echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn chưa nhập số lượng</div>';
} else if ($dsh[soluong] < $sl) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn cần <font color="green">'.$sl.' đá sao hỏa</font> mới có thể đổi!</div>';
} else {
	mysql_query("UPDATE `vatpham`SET `soluong`=`soluong`-'$sl' WHERE `id_shop`='34' AND `user_id`='".$user_id."'");

mysql_query("UPDATE `vatpham`SET `soluong`=`soluong`+'$soluong' WHERE `id_shop`='35' AND `user_id`='".$user_id."'");
echo '<div class="omenu">Đổi thành công '.$soluong.' kim cương vũ trụ, bạn bị - '.$sl.' Đá sao hỏa</div>';
}
}

break;
case 'doiqua':
echo'<div class="phdr"> Dr.Doom</div>';
echo'<div class="omenu"><img src="/icon/next.png"><a href="ghepitem.php"> Đổi Vòng phép màu </a></div>
<div class="omenu"><img src="/icon/next.png"><a href="doiqua.php"> Đổi quà bằng Huy hiệu huyền thoại </a></div>
<div class="omenu"><img src="/icon/next.png"><a href="doiqua1.php"> Đổi quà Huy hiệu hoàng gia </a></div>';


break;
}
require('../../incfiles/end.php');
?>