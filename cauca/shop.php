<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
if (!$user_id) {
header('Location: /login.php');
exit;
}
$headmod = 'Khu sinh thái';
$textl='Shop sinh thái';
require('../incfiles/head.php');
echo '<link rel="stylesheet" type="text/css" href="/khumuasam/stylexoan.css">';
echo '<div class="phdr"> Giải trí &gt; Câu cá &gt; Cửa hàng</div>';
$cc2=300;
$cc3=500;

$time=0;
if (isset($_POST[buy_cc])) {
$cancau=(int)$_POST[cancau];
if (empty($_POST[cancau])) {
echo '<div class="omenu">Chọn 1 loại và mua!</div>';
} else if($cancau!=2&&$cancau!=3) {
echo '<div class="omenu">Ko bug đc đâu</div>';
} else {
	$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else 

 

if ($cancau==2) {
if ($datauser[luong]<$cc2) {
echo '<div class="omenu">Không đủ tiền!</div>';
} else {
mysql_query("UPDATE `users` SET `luong`=`luong`-'".$cc2."' WHERE `id`='".$user_id."'");
mysql_query("INSERT INTO `khodo` SET
 `id_shop`='760',
 `user_id`='".$user_id."',
 `id_loai`='2',
 `tenvatpham` ='Cần câu sắt',
 `timesudung` ='".$time."',
 `loai`='cancau'");
echo'<div class="omenu">Giao dịch thành công! Bạn đã mua Cần Câu Sắt <a href="index.php">Quay lại</a></div>';

}
}
if ($cancau==3) {
if ($datauser[luong]<$cc3) {
echo '<div class="omenu">Không đủ tiền!</div>';
} else {
mysql_query("UPDATE `users` SET `luong`=`luong`-'".$cc3."' WHERE `id`='".$user_id."'");
mysql_query("INSERT INTO `khodo` SET
 `id_shop`='761',
 `user_id`='".$user_id."',
 `id_loai`='3',
 `tenvatpham` ='Cần câu VIP',
  `timesudung` ='".$time."',
 `loai`='cancau'");
echo'<div class="omenu">Giao dịch thành công! Bạn đã mua Cần Câu VIP <a href="index.php">Quay lại</a></div>';


}
}
}
}
echo'<form action="?act=mua" method="post"> <table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><div class="ducnghia_item"><img src="cancau/2.png"></div></td>
<td class="right-info"><input type="radio" name="cancau" value="2"> <font color="green"><b>Cần câu sắt</b></font><br>
Giá bán: <font color="red">300 lượng</font>
</td>
</tr></tbody></table>
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><div class="ducnghia_item"><img src="cancau/3.png"></div></td>
<td class="right-info"><input type="radio" name="cancau" value="3"> <font color="green"><b>Cần câu VIP</b></font><br>
Giá bán: <font color="red">500 lượng</font>
</td>
</tr></tbody></table>
<div class="pmenu"><center><input type="submit" name="buy_cc" value="Mua"></center></div></form>';

echo '<div class="phdr">Mua mồi câu</div>';

$moi3=30000;
if (isset($_POST[buy_moi])) {
$moicau=(int)$_POST[moicau];
if (empty($_POST[moicau])) {
echo '<div class="omenu">Chọn 1 loại và mua!</div>';
} else if($moicau!=3) {
echo '<div class="omenu">Ko bug đc đâu</div>';
} else {

if ($moicau==3) {
if ($datauser[xu]<$moi3) {
echo '<div class="omenu">Không đủ tiền!</div>';
} else {
mysql_query("UPDATE `users` SET `xu`=`xu`-'".$moi3."' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'100' WHERE `user_id`='".$user_id."' AND `id_shop`='7'");
echo'<div class="omenu">Giao dịch thành công! Bạn đã mua 100 Mồi trứng kiến <a href="index.php">Quay lại</a></div>';

}
}
}
}
echo'<form action="?act=muamoicau" method="post"> <table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><div class="ducnghia_item"><img src="/images/moicau/3.png"></div></td>
<td class="right-info"><input type="radio" name="moicau" value="3"> <font color="green"><b>X100 Trứng kiến</b></font><br>
Giá bán: <font color="red">30000 Xu</font>
</td>
</tr></tbody></table>
<div class="pmenu"><center><input type="submit" name="buy_moi" value="Mua"></center></div></form>';



echo '<div class="phdr">Mua vé câu</div>';
$vecc=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='121'"));

$cc1=$vecc['gia'];

$time=0;
if (isset($_POST[buy_vc])) {
	$timesd=time()+(48*60*60);
$vecau=(int)$_POST[vecau];
if (empty($_POST[vecau])) {
echo '<div class="omenu">Chọn 1 loại và mua!</div>';
} else if($vecau!=1) {
echo '<div class="omenu">Ko bug đc đâu</div>';
} else {
if ($vecau==1) {
if ($datauser[luongkhoa]<20) {
echo '<div class="omenu">Không đủ tiền!</div>';
} else {
mysql_query("UPDATE `users` SET `luongkhoa`=`luongkhoa`-'20' WHERE `id`='".$user_id."'");

mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1',`timesudung`= '".$timesd."' WHERE `user_id`='".$user_id."' AND `id_shop`='98'");
echo '<div class="omenu">Mua thành công!</div><div class="login"><a href="/cauca/index.php">Trở lại khu câu cá</a></div>';

}
}

}
}
echo '<form method="post">';
$qcc=mysql_query("SELECT * FROM `shopvatpham` WHERE `loai`='vecauca'");
echo'<form action="?act=muavecau" method="post"> 
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><div class="ducnghia_item"><img src="/images/vatpham/98.png"></div></td>
<td class="right-info"><input type="radio" name="vecau" value="1"> <font color="green"><b> Vé câu cá mập (2 ngày)</b></font><br>
Giá bán: <font color="red">20 Lượng khóa</font>
</td>
</tr></tbody></table>
<div class="pmenu"><center><input type="submit" name="buy_vc" value="Mua"></center></div></form>';



require('../incfiles/end.php');
?>