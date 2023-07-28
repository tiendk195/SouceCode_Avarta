<?php
define('_IN_JOHNCMS', 1);
$textl = 'Gieo hạt';
require_once('../incfiles/core.php');
require('../incfiles/head.php');

if (!$user_id){
echo'<div class="menu">Chỉ dành cho thành viên diễn đàn! Hãy đăng ký để tham gia nhé</div>';
require('../incfiles/end.php');
exit;
}
$time = time();

$user = mysql_query("SELECT * FROM `users` WHERE `id` = '" .$user_id. "'");
$tv = mysql_fetch_array($user);


$check = mysql_query("SELECT * FROM `fermer_gr` WHERE `id_user` = '".$user_id."' AND `semen` != '0' ");
$check1 = mysql_num_rows($check);


if ($check1 != '0') {
echo '<div class=""><div class="phdr"><b>Gieo hạt hàng loạt &raquo;</b></div>
<div class="menu">Không thể tiến hành thao tác này vì hiện đang có cây trồng trên ô đất của bạn
<br/>Điều kiện để có thể gieo hạt hàng loạt là tất cả các ô đất của bạn đều phải trống</br>
<a href="xoiodat.php"><img src="/icon/vao.png"> Xới ô đất</a>
</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
$demhatgiong = mysql_result(mysql_query("SELECT COUNT(*) FROM `fermer_hatgiong` WHERE `id_user`='".$user_id."'"), 0);

if ($demhatgiong == '0') {
echo '<div class=""><div class="phdr"><b>Gieo hạt hàng loạt &raquo;</b></div><div class="menu">
Trong kho của bạn hiện chưa có hạt giống nào, hãy vào cửa hàng để mua nhé';
echo '</div>
<div class="rmenu">&raquo; <a href="shop.php">Cửa hàng</a><br/>&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
$demodat = mysql_result(mysql_query("SELECT COUNT(*) FROM `fermer_gr` WHERE `id_user`='".$user_id."'"), 0);
$demhatgiong1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `fermer_hatgiong` WHERE `id_user`='".$user_id."' AND `kol` >= '".$demodat."' "), 0);
if ($demhatgiong1 == '0') {
echo '<div class=""><div class="phdr"><b>Gieo hạt hàng loạt &raquo;</b></div><div class="menu">
Nông trại của bạn hiện đang có <b>'.$demodat.'</b> ô đất, để có thể gieo hạt hàng loạt, yêu cầu trong kho bạn phải có một loại cây giống với số lượng là <b>'.$demodat.'</b>, hãy mua thêm hạt giống';
echo '</div>
<div class="rmenu">&raquo; <a href="shop.php">Cửa hàng</a><br/>&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
if (!isset($_POST['submit'])) {
echo '<div class=""><div class="phdr"><b>Gieo hạt hàng loạt &raquo;</b></div><div class="menu">
Hãy chọn hạt giống, sau đó gieo hạt<form method="POST" action="gieohat.php">';
$hatgiong = mysql_query("select * from `fermer_hatgiong` WHERE `id_user` = '".$user_id."' AND `kol` >= '".$demodat."' ORDER BY `id` ASC");
$i = 0;
while ($xuat = mysql_fetch_array($hatgiong)) {
$loaisp = $xuat['semen'];
$sl = $xuat['kol'];
$semen = mysql_fetch_array(mysql_query("select * from `fermer_name` WHERE  `id` = '".$loaisp."' LIMIT 1"));
$idsemen = $semen['id'];
$namesemen = $semen['name'];

echo '<input type="radio" name="radio" value="'.$loaisp.'"/><img src="img/product/'.$idsemen.'.png" alt="hat giong" style="border:1px solid #5dbef7;"/> [<b>'.$namesemen.'</b>], số lượng: <b>'.$sl.'</b><br/>';
++$i;
}
echo '<input type="submit" name="submit" value="Gieo hạt" /></form>';
echo '</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
if (!isset($_POST['radio'])) {
echo '<div class=""><div class="menu">
Lỗi! Bạn chưa chọn hạt giống cần gieo
</div>
<div class="rmenu">&raquo; <a href="gieohat.php">Quay lại</a>
</div></div>';
}
else {
    echo'<div class="phdr">Gieo hạt</div>';
echo '<div class=""><div class="menu">
Gieo hạt thành công
</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';

$khogiong = mysql_query("select * from `fermer_hatgiong` WHERE `semen` = '".$_POST['radio']."' AND `id_user` = '".$user_id."' ");
$res = mysql_fetch_array($khogiong);
if ($res['kol'] > $demodat) {
mysql_query("UPDATE `fermer_hatgiong` SET `kol` = `kol`-'".$demodat."' WHERE `semen` = '".$_POST['radio']."' AND `id_user` = '".$user_id."' LIMIT 1");
} else {
mysql_query("DELETE FROM `fermer_hatgiong` WHERE `semen` = '".$_POST['radio']."' AND `id_user` = '".$user_id."' LIMIT 1");
}
mysql_query("UPDATE `fermer_gr` SET `semen` = '".$_POST['radio']."', `woter` = '0', `time` = '".$time."' WHERE `id_user` = '".$user_id."' ");

}
}
}
}
}


require('../incfiles/end.php');

?>