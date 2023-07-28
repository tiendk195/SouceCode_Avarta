<?php
define('_IN_JOHNCMS', 1);
$textl = 'Cửa hàng hạt giống';
require_once('../incfiles/core.php');
require('../incfiles/head.php');

if(!$user_id){
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}

$int = intval($_GET['id']);
switch ($act) {
default:
echo '<div class="phdr"><b>Cửa hàng hạt giống &raquo;</b></div>';

$k = mysql_result(mysql_query("SELECT COUNT(*) FROM `fermer_name`"),0);
if ($k > 0) {
$res = mysql_query("SELECT * FROM `fermer_name` ORDER BY `id` ASC LIMIT 16");
$i = 0;
while ($post = mysql_fetch_array($res)) {
    $dohod = $post['rand2']*$post['cena'];
$tgian = $post['time'];
$gio = $tgian/3600;
    echo'<div class="omenu"><b><font color="ff3399">Cây '.$post['name'].'</font></b> <img src="img/product/'.$post['id'].'.png"></center>
	</br>Sản lượng:<b> '.$post['rand2'].' Trái</b> | Tổng thu hoạch:<b> '.number_format($dohod).' xu</b>
	<br> Thời gian sinh trưởng:<b> '.$gio.'h</b> <br> Giá bán: <b>'.number_format($post['cena']).' xu / 1 hạt giống</b>
	<center><a href="?act=mua&id='.$post['id'].'"><font color="red"><b>[ Mua ]</b></font></a></center></div>';
    /*
echo '<div class="menu list-top">
<table style="width:100%;cellpadding:0;cellspacing:0;">
<tr>
<td width="50">
<img src="img/product/'.$post['id'].'.png" alt="hat giong" style="border:1px solid #5dbef7;"/>
</td>
<td width="auto" valign="top">
[ <a href="shop.php?act=mua&id='.$post['id'].'"><b>'.$post['name'].'</b></a> ]
<br/>Giá: <b>'.$post['cena'].'</b> xu/Cây
</td></tr></table></div>';
*/
++$i;
}
}
else {
echo '<div class="menu">Danh sách trống</div>';
}
//echo '<div class="phdr">Tổng số: <b>'.$k.'</b></div>';
echo '<div class="omenu">&raquo; <a href="cuahang.php"><b>Cửa hàng</b></a>  &raquo; <a href="index.php"><b>Nông trại</b></a>  &raquo; <a href="/farm"><b>Trang trại</b></a></div>';
break;
////////////////////////
case 'mua':
$count = mysql_result(mysql_query("SELECT COUNT(*) FROM `fermer_name` WHERE `id`<'19'"), 0);
if ($int < 1 || $int > $count){
echo '<div class="menu">Lỗi!<br/>Đường dẫn không tồn tại</div>
<div class="rmenu">&raquo; <a href="shop.php">Quay lại</a></div>';
}
else {
$sql = mysql_query("SELECT `id` FROM `fermer_name` WHERE `id`='$int' AND `id`<'19'");
if (mysql_num_rows($sql) == 0) {
echo '<div class="menu">Lỗi!<br/>Đường dẫn không tồn tại</div>
<div class="rmenu">&raquo; <a href="shop.php">Quay lại</a></div>';
}
else {

$post = mysql_fetch_array(mysql_query("select * from `fermer_name` WHERE  `id` = '$int'  LIMIT 1"));
echo '<div class="mainblok"><div class="phdr"><b>Cửa hàng hạt giống &raquo;</b></div>';
echo'<div class="omenu">Tài sản của bạn: <span style="color:red"><b>'. number_format($datauser['xu']).'</b></span> xu</div>';
echo'<div class="omenu">1 hạt giống <img src="img/product/'.$post['id'].'.png"> <b>Cây '.$post['name'].'</b> = '.number_format($post['cena']).' xu<br><form method="post" action="shop.php?act=ok&id='.$int.'">
<input type="number" name="soluong" maxlength="2"  placeholder="Nhập số lượng 0 - 99"/>
<br/><input type="submit" name="submit" value=" Mua " />
</form></div>';
/*
echo '<div class="menu">
Tài sản của bạn: <span style="color:red"><b>'. number_format($datauser['xu']).'</b></span> xu<hr/>
<table style="width:100%;cellpadding:0;cellspacing:0;">
<tr>
<td width="50">
<img src="img/product/'.$post['id'].'.png" alt="hat giong" style="border:1px solid #5dbef7;"/>
</td>
<td width="auto" valign="top">
[ <b>'.$post['name'].'</b> ]
<br/>Giá: <b>'.$post['cena'].'</b> xu/Cây
</td></tr></table>';
$tgian = $post['time'];
$gio = $tgian/3600;
echo '<br/>Thời gian sinh truởng: <b>'.$gio.'</b> giờ
<br/>Sản lượng thu hoạch: <b>'.$post['rand2'].'</b> cây';
$dohod = $post['rand2']*$post['cena'];
echo '<br/>Tổng thu nhập: <b>'.$dohod.'</b> xu';
echo '<br/><b>Nhập số lượng cần mua:</b>
<form method="post" action="shop.php?act=ok&id='.$int.'">
<input type="text" name="soluong" maxlength="2"/>
<br/>Tối thiểu là 1, tối đa là 99
<br/><input type="submit" name="submit" value=" Mua " />
</form></div>';
*/
echo '<div class="rmenu">&raquo; <a href="shop.php"><b>Quay lại</b></a></br> &raquo; <a href="cuahang.php"><b>Cửa hàng</b></a> &raquo; <a href="index.php"><b>Nông trại</b></a>  &raquo; <a href="/farm"><b>Trang trại</b></a></div></div>';
}
}
break;
////////////////
case 'ok':
    echo'<div class="phdr">Nông trại</div>';
if (!isset($_POST['submit'])) {
echo '<div class="menu">Lỗi!<br/>Đường dẫn không tồn tại</div>
<div class="rmenu">&raquo; <a href="shop.php">Quay lại</a></div>';
}
else {
$count = mysql_result(mysql_query("SELECT COUNT(*) FROM `fermer_name`"), 0);
if ($int < 1 || $int > $count){
echo '<div class="menu">Lỗi!<br/>Đường dẫn không tồn tại</div>
<div class="rmenu">&raquo; <a href="shop.php">Quay lại</a></div>';
}
else {
$sql = mysql_query("SELECT `id` FROM `fermer_name` WHERE `id`='$int' ");
if (mysql_num_rows($sql) == 0) {
echo '<div class="menu">Lỗi!<br/>Đường dẫn không tồn tại</div>
<div class="rmenu">&raquo; <a href="shop.php">Quay lại</a></div>';
}
else {
if ($_POST['soluong'] < 1 || $_POST['soluong'] > 99) {
echo '<div class="menu">Lỗi!<br/>Số lượng mua tối thiểu là 1, tối đa là 99</div>
<div class="rmenu">&raquo; <a href="shop.php">Quay lại</a></div>';
}
else {
$post = mysql_fetch_array(mysql_query("select * from `fermer_name` WHERE  `id` = '$int'  LIMIT 1"));
$tonggia = $_POST['soluong']*$post['cena'];
if ($tonggia > $datauser['xu']) {
echo '<div class="menu">Lỗi!<br/>Bạn không có đủ tiền</div>
<div class="rmenu">&raquo; <a href="shop.php">Quay lại</a></div>';
}
else {
echo '<div class="menu">Chúc mừng bạn đã mua vật phẩm thành công!<br/>Bạn đã bị trừ <b>'.number_format($tonggia).'</b> xu vào tài khoản</div>
&raquo; <a href="shop.php">Quay lại</a>';
mysql_query("UPDATE `users` SET `xu` = `xu`- '".$tonggia."' WHERE `id` = '".$user_id."' LIMIT 1");
$remils = mysql_result(mysql_query("SELECT COUNT(*) FROM `fermer_hatgiong` WHERE `id_user` = '".$user_id."' AND `semen` = '".$int."'"),0);
if ($remils > 0) {
mysql_query("UPDATE `fermer_hatgiong` SET `kol` = `kol`+ '".$_POST['soluong']."' WHERE `id_user` = '".$user_id."' AND `semen` = '".$int."' LIMIT 1");
} else {
mysql_query("INSERT INTO `fermer_hatgiong` (`kol` , `semen`, `id_user`) VALUES  ('".$_POST['soluong']."', '".$int."', '".$user_id."') ");
}
}}}}}
break;
}
require('../incfiles/end.php');
?>