<?php
define('_IN_JOHNCMS', 1);
$textl = 'Cửa hàng phân bbi';
require_once('../incfiles/core.php');
require('../incfiles/head.php');

if(!$user_id){
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
echo'<div class="phdr">Phân bón</div>';
echo '<div class="omenu">Phân bón tạm thời ngừng bán</div>';
/*
$int = intval($_GET['id']);
switch ($act) {
default:
echo '<div class="mainblok"><div class="phdr"><b>Cửa hàng phân bón &raquo;</b></div>';

echo '<div class="menu">Lưu ý: Bạn chỉ có thể bón phân khi cây trông sinh trưởng được một nửa thời gian</div>';
$k = mysql_result(mysql_query("SELECT COUNT(*) FROM `fermer_udobr_name`"),0);
if ($k > 0) {
$res = mysql_query("SELECT * FROM `fermer_udobr_name` ORDER BY `id` ASC LIMIT $start, $kmess");
$i = 0;
while ($post = mysql_fetch_array($res)) {
echo '<div class="menu list-top">
<table style="width:100%;cellpadding:0;cellspacing:0;">
<tr>
<td width="50">
<img src="img/udobr/'.$post['id'].'.png" alt="phan bon" style="border:1px solid #5dbef7;"/>
</td>
<td width="auto" valign="top">
[ <a href="phanbon.php?act=mua&id='.$post['id'].'"><b>'.$post['name'].'</b></a> ]
<br/>Giá: <b>'.$post['cena'].'</b> xu
</td></tr></table></div>';
++$i;
}

if ($k > $kmess) {
echo '<div class="topmenu">' . functions::display_pagination('phanbon.php?', $start, $k, $kmess) . '</div>';
}
}
else {
echo '<div class="menu">Danh sách trống</div>';
}
echo '<div class="phdr">Tổng số: <b>'.$k.'</b></div>';
echo '<div class="rmenu">&raquo; <a href="cuahang.php"><b>Cửa hàng</b></a> &raquo; <a href="index.php"><b>Nông trại</b></a> &raquo; <a href="/farm"><b>Trang trại</b></a></div></div>';
break;
////////////////////////
case 'mua':
$count = mysql_result(mysql_query("SELECT COUNT(*) FROM `fermer_udobr_name`"), 0);
if ($int < 1 || $int > $count){
echo '<div class="menu">Lỗi!<br/>Đường dẫn không tồn tại</div>
<div class="rmenu">&raquo; <a href="phanbon.php">Quay lại</a></div>';
}
else {
$sql = mysql_query("SELECT `id` FROM `fermer_udobr_name` WHERE `id`='$int' ");
if (mysql_num_rows($sql) == 0) {
echo '<div class="menu">Lỗi!<br/>Đường dẫn không tồn tại</div>
<div class="rmenu">&raquo; <a href="phanbon.php">Quay lại</a></div>';
}
else {

$post = mysql_fetch_array(mysql_query("select * from `fermer_udobr_name` WHERE  `id` = '$int'  LIMIT 1"));
echo '<div class="mainblok"><div class="phdr"><b>Cửa hàng phân bón &raquo;</b></div>';
echo '<div class="menu">
Tài sản của bạn: <span style="color:red"><b>'. $datauser['xu'].'</b></span> xu<hr/>
<table style="width:100%;cellpadding:0;cellspacing:0;">
<tr>
<td width="50">
<img src="img/udobr/'.$post['id'].'.png" alt="phan bon" style="border:1px solid #5dbef7;"/>
</td>
<td width="auto" valign="top">
[ <b>'.$post['name'].'</b> ]
<br/>Giá: <b>'.$post['cena'].'</b> xu
</td></tr></table>';
echo '<br/><b>Nhập số lượng cần mua:</b>
<form method="post" action="phanbon.php?act=ok&id='.$int.'">
<input type="text" name="soluong" maxlength="2"/>
<br/>Tối thiểu là 1, tối đa là 99
<br/><input type="submit" name="submit" value=" Mua " />
</form></div>';
echo '<div class="rmenu">&raquo; <a href="phanbon.php"><b>Quay lại</b></a></br> &raquo; <a href="cuahang.php"><b>Cửa hàng</b></a> &raquo; <a href="index.php"><b>Nông trại</b></a>  &raquo; <a href="/farm"><b>Trang trại</b></a></div></div>';
}
}
break;
////////////////
case 'ok':
if (!isset($_POST['submit'])) {
echo '<div class="menu">Lỗi!<br/>Đường dẫn không tồn tại</div>
<div class="rmenu">&raquo; <a href="phanbon.php">Quay lại</a></div>';
}
else {
$count = mysql_result(mysql_query("SELECT COUNT(*) FROM `fermer_udobr_name`"), 0);
if ($int < 1 || $int > $count){
echo '<div class="menu">Lỗi!<br/>Đường dẫn không tồn tại</div>
<div class="rmenu">&raquo; <a href="phanbon.php">Quay lại</a></div>';
}
else {
$sql = mysql_query("SELECT `id` FROM `fermer_udobr_name` WHERE `id`='$int' ");
if (mysql_num_rows($sql) == 0) {
echo '<div class="menu">Lỗi!<br/>Đường dẫn không tồn tại</div>
<div class="rmenu">&raquo; <a href="phanbon.php">Quay lại</a></div>';
}
else {
if ($_POST['soluong'] < 1 || $_POST['soluong'] > 99) {
echo '<div class="menu">Lỗi!<br/>Số lượng mua tối thiểu là 1, tối đa là 99</div>
<div class="rmenu">&raquo; <a href="phanbon.php">Quay lại</a></div>';
}
else {
$post = mysql_fetch_array(mysql_query("select * from `fermer_udobr_name` WHERE  `id` = '$int'  LIMIT 1"));
$tonggia = $_POST['soluong']*$post['cena'];
if ($tonggia > $datauser['xu']) {
echo '<div class="menu">Lỗi!<br/>Bạn không có đủ tiền</div>
<div class="rmenu">&raquo; <a href="phanbon.php">Quay lại</a></div>';
}
else {
echo '<div class="menu">Chúc mừng bạn đã mua vật phẩm thành công!<br/>Bạn đã bị trừ <b>'.$tonggia.'</b> xu vào tài khoản</div>
<div class="rmenu">&raquo; <a href="phanbon.php">Quay lại</a></div>';
mysql_query("UPDATE `users` SET `xu` = `xu`- '".$tonggia."' WHERE `id` = '".$user_id."' LIMIT 1");
$remils = mysql_result(mysql_query("SELECT COUNT(*) FROM `fermer_udobr` WHERE `id_user` = '".$user_id."' AND `udobr` = '".$int."'"),0);
if ($remils > 0) {
mysql_query("UPDATE `fermer_udobr` SET `kol` = `kol`+ '".$_POST['soluong']."' WHERE `id_user` = $user_id AND `udobr` = '$int' LIMIT 1");
} else {
mysql_query("INSERT INTO `fermer_udobr` (`kol` , `udobr`, `id_user`) VALUES  ('".$_POST['soluong']."', '".$int."', '".$user_id."') ");
}
}}}}}
break;
}
*/
require('../incfiles/end.php');
?>