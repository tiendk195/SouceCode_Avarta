<?php



define('_IN_JOHNCMS', 1);

require('../incfiles/core.php');
$textl = 'Nhận quà tri ân VIP';

require('../incfiles/head.php');
echo'<div class="phdr"> Nhận quà tri ân VIP</div>';
echo'<form method="post">
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><img src="https://i.imgur.com/r7wUiGU.gif">
</td>
<td class="right-info"><b> <font color="blue">Sử dụng danh hiệu từ VIP5 trở lên để nhận </font></b><br>
<b>Vật phẩm : <font color="red">Set Ant Man vĩnh viễn</font></b><br>
<input type="submit" value="Nhận" name="submit"></td>
</tr></tbody></table></form>';


if (isset($_POST[submit])) {

$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} 

else 
if($datauser['naptichluy'] < 100000){
echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn cần Danh hiệu VIP5 trở lên mới có thể nhận quà !!</div>';
} else if ($datauser['nhanviptrian'] >=1){
	echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn đã nhận quà vip tri ân rồi !!</div>';
} else {


echo'<div class="omenu"><b>Nhận thành công!</div>';
mysql_query("UPDATE `users` SET `nhanviptrian`= `nhanviptrian` +'1' WHERE `id`='".$user_id."'");

	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2859'"));
	$do2=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2860'"));
	$do3=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2861'"));



 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='0'
");
 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do2[loai]."',
`id_loai`='".$do2[id_loai]."',
`tenvatpham`='".$do2[tenvatpham]."',
`id_shop`='".$do2[id]."',
`timesudung`='0'
");
 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do3[loai]."',
`id_loai`='".$do3[id_loai]."',
`tenvatpham`='".$do3[tenvatpham]."',
`id_shop`='".$do3[id]."',
`timesudung`='0'
");

}
}

require('../incfiles/end.php');
?>