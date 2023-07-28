<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');

require('../incfiles/head.php');
if(!$user_id){
header('location: /index.html');
}


echo '<div class="phdr">Sử Dụng Vật Phẩm</div>';
if (isset($_POST['cuongno'])) {
$ducnghia_dz=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='53'"));
if ($datauser['cn']!= 0) {
    echo'<div class="rmenu"> bạn không thể dùng vật phẩm này trong khi vấn còn '.thoigiantinh($datauser['time_cn']+10*60).' </div> !';
} else
if ($ducnghia_dz['soluong']<=0) {
echo '<div class="rmenu">Bạn đã hết cuồng nộ</div>';
} else {
$sm = $datauser['sucmanh']*2;
$time_tg=10*60+time();
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='53'");
mysql_query("UPDATE `users` SET `smthem` = '$sm',`cn`='1',`time_cn` = '$time_tg' WHERE `id` = '".$user_id."'");
echo '<div class="gmenu">sử dụng vật phẩm cuồng nộ thành công ! bạn nhận được  sức mạnh trong vòng 10 phút</b></div>';
}
} else
if (isset($_POST['bohuyet'])) {
$ducnghia_dz=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='54'"));
if ($datauser['bh']!= 0) {
    echo'<div class="rmenu"> bạn không thể dùng vật phẩm này trong khi vấn còn '.thoigiantinh($datauser['time_bh']+10*60).' </div> !';
} else
if ($ducnghia_dz['soluong']<=0) {
echo '<div class="rmenu">Bạn đã hết bổ huyết</div>';
} else {
$sm = $datauser['hpfull']*2;
$time_tg=10*60+time();
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='54'");
mysql_query("UPDATE `users` SET `hpthem` = '$sm',`bh`='1',`time_bh` = '$time_tg' WHERE `id` = '".$user_id."'");
echo '<div class="gmenu">sử dụng vật phẩm cuồng nộ thành công ! thời gian còn 10 phút</b></div>';
}
}
$cuongno=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='53'"));
$bohuyet=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='54'"));

$giapxen=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='55'"));


echo '<div class="pmenu">bạn muốn dùng vật phẩm gì ? thời gian tối đa là 10 phút nhé </div>';
echo'<div class="omenu"><form method="post">
<input type="submit" name="cuongno" value="Dùng Cuồng Nộ"></form><br> Tăng 100% tấn công gốc trong 10 phút <br> -----';

echo'<form method="post">
<input type="submit" name="bohuyet" value="Dùng Bổ Huyết"></form><br> Tăng 100% hp gốc trong 10 phút <br> -----';

echo'<form method="post">
<input type="submit" name="xxx" value="Dùng Giáp Xên"></form><br> Giảm 50% sát thương của quái,người trong 10 phút ';

echo'</div>';
require('../incfiles/end.php');
?>

