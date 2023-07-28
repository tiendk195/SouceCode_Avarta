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
?>
<style>
.map img:hover {
    -moz-transform: rotate(360deg);
    -moz-transition: all 3s ease;
    -webkit-transform: rotate(360deg);
    -webkit-transition: all 3s ease;
    position: relative;
    transform: rotate(360deg);
    transition: all 1s ease;
}
</style>
<?php
switch($act) {
default:
$r = rand(1,50);
$da = rand(5,20);

echo'
<div class="mainblok"><div class="phdr">Quay Báu Vật Từ BOSS</div>';
if (isset($_POST['submit'])) {
	echo'<center>';
	if ($datauser['dahongngoc'] <=0) {
		echo'<div class="omenu">Bạn không có đá hồng ngọc để quay</div>';
	} else {
	if($r < 7){
echo'<div class="omenu">Chúc mừng bạn quay được <font color="red">'.$da.' Đá Nâng Cấp</font> <img src="/icon/da/6.png"/></div>';
    mysql_query("UPDATE `users` SET `dahongngoc`=`dahongngoc`-'1' WHERE `id`='".$user_id."'");

  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'$da' WHERE `user_id`='".$user_id."' AND `id_shop` = '60'");
$text = 'Chúc mừng '.$login.' đã quay được '.$da.' đá nâng cấp tại Vòng quay báu vật.';
mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");


}
if($r ==17){
echo'<div class="omenu">Chúc mừng bạn quay được <font color="red">100 Lượng</font> </div>';
  mysql_query("UPDATE `users` SET `dahongngoc`=`dahongngoc`-'1' WHERE `id`='".$user_id."'");

mysql_query("UPDATE `users` SET `luong`=`luong`+'100' WHERE `id` = '".$user_id."'");
$text = 'Chúc mừng '.$login.' đã quay được 100 lượng tại Vòng quay báu vật.';
mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");


}
if($r == 7 or $r == 8){
echo'<div class="omenu">Chúc mừng bạn quay được <font color="red">200 Lượng</font> </div>';
  mysql_query("UPDATE `users` SET `dahongngoc`=`dahongngoc`-'1' WHERE `id`='".$user_id."'");

mysql_query("UPDATE `users` SET `luong`=`luong`+'200' WHERE `id` = '".$user_id."'");
$text = 'Chúc mừng '.$login.' đã quay được 200 lượng tại Vòng quay báu vật.';
mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");
}
if($r == 9 or $r == 10){
echo'<div class="omenu">Chúc mừng bạn quay được <font color="red">500 Lượng</font> </div>';
  mysql_query("UPDATE `users` SET `dahongngoc`=`dahongngoc`-'1' WHERE `id`='".$user_id."'");

mysql_query("UPDATE `users` SET `luong`=`luong`+'500' WHERE `id` = '".$user_id."'");
$text = 'Chúc mừng '.$login.' đã quay được 500 lượng tại Vòng quay báu vật.';
mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");
}
if($r == 11 or $r == 12){
echo'<div class="omenu">Chúc mừng bạn quay được <font color="red">1.000 Lượng</font> </div>';

  mysql_query("UPDATE `users` SET `dahongngoc`=`dahongngoc`-'1' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `users` SET `luong`=`luong`+'1000' WHERE `id` = '".$user_id."'");
$text = 'Chúc mừng '.$login.' đã quay được 1.000 lượng tại Vòng quay báu vật.';
mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");
}
if($r == 13){
echo'<div class="omenu">Chúc mừng bạn quay được <font color="red">5 Triệu Xu</font> </div>';
    mysql_query("UPDATE `users` SET `dahongngoc`=`dahongngoc`-'1' WHERE `id`='".$user_id."'");

  mysql_query("UPDATE `users` SET `xu`=`xu`+'5000000' WHERE `id`='".$user_id."'");
  $text = 'Chúc mừng '.$login.' đã quay được 5.000.000 xu tại Vòng quay báu vật.';
mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");
}
if($r == 14){
echo'<div class="omenu">Chúc mừng bạn quay được <font color="red">5 Triệu Xu</font> </div>';
    mysql_query("UPDATE `users` SET `dahongngoc`=`dahongngoc`-'1' WHERE `id`='".$user_id."'");

  mysql_query("UPDATE `users` SET `xu`=`xu`+'5000000' WHERE `id`='".$user_id."'");
  $text = 'Chúc mừng '.$login.' đã quay được 5.000.000 xu tại Vòng quay báu vật.';
mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");
}
if($r == 15){
echo'<div class="omenu">Chúc mừng bạn quay được <font color="red">Siêu xe đỏ mạnh mẽ</font> </div>';
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='1743', 
 `loai`='docamtay',
 `id_loai`='2039',
 `tenvatpham` = 'Siêu xe đỏ mạnh mẽ', 
 `hp`='9999',
 `sucmanh`='9999',
 `timesudung`='0'");
  mysql_query("UPDATE `users` SET `dahongngoc`=`dahongngoc`-'1' WHERE `id`='".$user_id."'");
  $text = 'Chúc mừng '.$login.' đã quay được Siêu xe đỏ mạnh mẽ tại Vòng quay báu vật.';
mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");
}
if ($r==16) {
echo'<div class="omenu">Chúc mừng bạn quay được <font color="red">1STPay 10.000Đ, Thẻ đã được gửi vào Thông báo</font> </div>';
$text1 = '<center><img src="http://i.imgur.com/UUNSdhi.png"><br><font color="green">Thẻ 1STPay Mệnh Giá 10.000 VND</font></br><font color="red">Pin: '.$pin.' </font></center>';
  $text = 'Chúc mừng '.$login.' đã quay được Thẻ 1STPay 10.000Đ tại Vòng quay báu vật.';

mysql_query("UPDATE `users` SET `dahongngoc` = `dahongngoc`-'1' WHERE `id` = '".$user_id."'");
mysql_query("INSERT INTO `1STPay` SET
`pin`='".$pin."',
`user_tao`='".$user_id."',
`timetao` = '".time()."',

`menhgia`='10000'");
mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$user_id."',
                `user` = '".$user_id."',
                `text` = '$text1',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");
}

if($r > 17){
echo'<div class="omenu">Chúc mừng bạn quay được <font color="red">1 Triệu Xu</font> </div>';
    mysql_query("UPDATE `users` SET `dahongngoc`=`dahongngoc`-'1' WHERE `id`='".$user_id."'");

  mysql_query("UPDATE `users` SET `xu`=`xu`+'1000000' WHERE `id`='".$user_id."'");
  $text = 'Chúc mừng '.$login.' đã quay được 1.000.000 xu tại Vòng quay báu vật.';
mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");
}
	}
echo'</center>';
//echo'<div class="omenu"><center>Bạn đã quay được 1 triệu xu</center></div>';
}
echo'<center><div class="omenu"><b> Vòng Quay Báu Vật</b><br>
<b><font color="red">Nhận Món Đồ Cực Độc Từ Vòng Quay Báu Vật</font></b><br>
<font color="red"><a href="?act=tile">Xem Tỉ Lệ </a></font></br>
<br><br><div class="map"><img src="/congvien/bauvat.gif"></div><b> <br> Bạn có '.number_format($datauser['dahongngoc']).' Hồng Ngọc<br><form action="bauvat.php" method="post"><input type="submit" name="submit" value="Quay Ngay"></form></b></div></center></div>';


break;
case 'tile';
echo'<div class="phdr">Tỉ lệ quay ra</div>';
echo'<div class="menu"><table cellpadding="0" cellspacing="0" width="100%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tbody><tr><td align="center" width="100" style="border:1px solid #333">
Đá nâng cấp: 40%<br>
1.000.0000 Xu: 60%<br>
5.000.000 Xu: 5%<br>
100 lượng: 60%<br>
200 lượng: 40%</br>
500 lượng: 20%</br>
1.000 lượng: 5%</br>
Thẻ 1STPay 10k 1%</br>
Siêu xe đỏ mạnh mẽ<img src="/images/shop/1743.png">: 15%
</td>
</tr></tbody></table></div>';
echo'<div class="omenu"><a href="bauvat.php">---> Quay lại </a></div>';


break;
}
require('../incfiles/end.php');
?>