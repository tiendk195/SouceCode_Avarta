<?php
define('_IN_JOHNCMS', 1);
$textl = 'Nhà kho';
require_once('../incfiles/core.php');
require('../incfiles/head.php');

if(!$user_id){
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
$id = intval($_GET['id']);

switch ($act) {
default:
echo '<div class=""><div class="phdr"><b>Kho nông sản &raquo;</b></div>';

$k = mysql_result(mysql_query("SELECT COUNT(*) FROM `fermer_sclad` WHERE `id_user` = '".$user_id."'"),0);
if ($k > 0) {
$res = mysql_query("SELECT * FROM `fermer_sclad` WHERE `id_user` = '".$user_id."' ORDER BY `semen` ASC LIMIT $start, $kmess");
$i = 0;
while ($post = mysql_fetch_array($res)) {
$loaisp = $post['semen'];
$res1 = mysql_query("SELECT * FROM `fermer_name` WHERE `id` = '".$loaisp."'");
$post1 = mysql_fetch_array($res1);
echo '<div class="menu list-top">
<table style="width:100%;cellpadding:0;cellspacing:0;">
<tr>
<td width="50">
<img src="img/product/'.$post['semen'].'.png" alt="hat giong" style="border:1px solid #5dbef7;"/>
</td>
<td width="auto" valign="top">
<b>'.$post1['name'].'</b>
<br/>Sản lượng: <b>'.$post['kol'].'</b>
<br/>[ <a href="nhakho.php?act=ban&id='.$post['semen'].'">Bán</a> ]
</td></tr></table></div>';
++$i;
}

if ($k > $kmess) {
echo '<div class="topmenu">' . functions::display_pagination('nhakho.php?', $start, $k, $kmess) . '</div>';
}
}
else {
echo '<div class="menu">Danh sách trống</div>';
}
echo '</div></br>';
///////////
/*
echo '<div class=""><div class="phdr"><b>Kho bếp &raquo;</b></div>' .
'<div class="omenu">&raquo; <a href="nhabep.php?act=kho">Vào kho bếp</a>
</div></div>';
*/


echo '<div class="rmenu">&raquo; <a href="cuahang.php">Cửa hàng</a> &raquo; <a href="/nongtrai">Nông Trại</a> &raquo; <a href="/farm">Trang trại</a>
</div>';
break;
////////////////////////
case 'ban':
    echo'<div class="phdr">Nhà kho</div>';
$count = mysql_result(mysql_query("SELECT COUNT(*) FROM `fermer_name`"), 0);
if ($id < 1 or $id > 21){
echo '<div class="menu">Lỗi!<br/>Đường dẫn không tồn tại</div>
<div class="rmenu">&raquo; <a href="nhakho.php">Quay lại</a></div>';
}
else {
$sql = mysql_query("SELECT * FROM `fermer_sclad` WHERE `semen`='".$id."' AND `id_user` = '".$user_id."' ");
$xuat = mysql_fetch_array($sql);
if (mysql_num_rows($sql) == 0) {
echo '<div class="menu">Lỗi!<br/>Bạn không có sản phẩm này</div>
<div class="rmenu">&raquo; <a href="nhakho.php">Quay lại</a></div>';
}
else {

$post = mysql_fetch_array(mysql_query("select * from `fermer_name` WHERE  `id` = '".$id."'  LIMIT 1"));
    $dohod = $xuat['kol']*$post['cena'];


echo '<div class="menu">
Tài sản của bạn: <span style="color:red"><b>'. number_format($datauser['xu']).'</b></span> xu<hr/>
<table style="width:100%;cellpadding:0;cellspacing:0;">
<tr>
<td width="50">
<img src="img/product/'.$post['id'].'.png" alt="hat giong" style="border:1px solid #5dbef7;"/>
</td>
<td width="auto" valign="top">
[ <b>'.$post['name'].'</b> ]
</td></tr></table>';
echo '<br/>Giá bán: <b>'.$post['cena'].'</b> Xu/Sản lượng';
echo '<br/>Sản lượng hiện có: <b>'.$xuat['kol'].'</b> cây';
echo'</br>Tổng thu:<b> '.number_format($dohod).'</b> xu';
echo'<form method="post" action="nhakho.php?act=ok&id='.$id.'">
<input type="number" name="soluong" placeholder="Nhập số lượng 1 - '.$xuat['kol'].'"/>
<br/><input type="submit" name="submit" value=" Bán " />
</form></div>';
echo '<div class="rmenu">&raquo; <a href="nhakho.php"><b>Quay lại</b></a><br/>&raquo; <a href="index.php"><b>Nông trại</b></a></div>';
}
}
break;
////////////////
case 'ok':
    echo'<div class="phdr">Nhà kho</div>';
if (!isset($_POST['submit'])) {
echo '<div class="menu">Lỗi!<br/>Đường dẫn không tồn tại</div>
<div class="rmenu">&raquo; <a href="nhakho.php">Quay lại</a></div>';
}
else {
$count = mysql_result(mysql_query("SELECT COUNT(*) FROM `fermer_name`"), 0);
if ($id < 1 or $id > 21){
echo '<div class="menu">Lỗi!<br/>Đường dẫn không tồn tại</div>
<div class="rmenu">&raquo; <a href="nhakho.php">Quay lại</a></div>';
}
else {
$post = mysql_fetch_array(mysql_query("select * from `fermer_name` WHERE  `id` = '".$id."'  LIMIT 1"));
$sql = mysql_query("SELECT * FROM `fermer_sclad` WHERE `semen`='".$id."' AND `id_user` = '".$user_id."' ");
$xuat = mysql_fetch_array($sql);
if (mysql_num_rows($sql) == 0) {
echo '<div class="menu">Lỗi!<br/>Bạn không có sản phẩm này</div>
<div class="rmenu">&raquo; <a href="nhakho.php">Quay lại</a></div>';
}
else {
if ($_POST['soluong'] < 1) {
echo '<div class="menu">Lỗi!<br/>Sản lượng nhập vào tối thiểu phải là 1</div>
<div class="rmenu">&raquo; <a href="nhakho.php">Quay lại</a></div>';
}
else {
if ($_POST['soluong'] > $xuat['kol']) {
echo '<div class="menu">Lỗi!<br/>Số bạn vừa nhập vào vượt quá sản lượng nông sản hiện có của bạn</div>
<div class="rmenu">&raquo; <a href="nhakho.php">Quay lại</a></div>';
}
else {
$tonggia = $_POST['soluong']*$post['cena'];
echo '<div class="menu">Chúc mừng bạn đã bán nông sản thành công!<br/>Bạn đã được cộng <b>'.number_format($tonggia).'</b> xu vào tài khoản</div>
<div class="omenu">&raquo; <a href="nhakho.php">Nhà kho</a> &raquo; <a href="/nongtrai">Nông Trại</a> &raquo; <a href="/farm">Trang trại</a>
</div>';

mysql_query("UPDATE `users` SET `xu` = `xu` + '".$tonggia."',`xuthuhoach`=`xuthuhoach` + '".$tonggia."' WHERE `id` = '".$user_id."' LIMIT 1");
if ($_POST['soluong'] < $xuat['kol']) {
mysql_query("UPDATE `fermer_sclad` SET `kol` = `kol`- '".$_POST['soluong']."' WHERE `id_user` = '".$user_id."' AND `semen` = '".$id."' LIMIT 1");
} else {
mysql_query("DELETE FROM `fermer_sclad` WHERE `id_user` = '".$user_id."' AND `semen` = '".$id."' ");
}
}}}}}
break;
}
require('../incfiles/end.php');
?>