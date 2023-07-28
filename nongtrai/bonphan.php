<?php
define('_IN_JOHNCMS', 1);
$textl = 'Bón phân';
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


$demphanbon = mysql_result(mysql_query("SELECT COUNT(*) FROM `fermer_udobr` WHERE `id_user`='".$user_id."'"), 0);

if ($demphanbon == '0') {
echo '<div class="mainblok"><div class="phdr"><b>Bón phân hàng loạt &raquo;</b></div><div class="menu">
Trong kho của bạn hiện chưa có phân bón, hãy vào cửa hàng để mua nhé';
echo '</div>
<div class="rmenu">&raquo; <a href="phanbon.php">Cửa hàng</a><br/>&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
$demodat = mysql_result(mysql_query("SELECT COUNT(*) FROM `fermer_gr` WHERE `semen` != '0' AND `id_user`='".$user_id."'"), 0);
$demhatgiong1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `fermer_udobr` WHERE `id_user`='".$user_id."' AND `kol` >= '".$demodat."' "), 0);
if ($demhatgiong1 == '0') {
echo '<div class="mainblok"><div class="phdr"><b>Gieo hạt hàng loạt &raquo;</b></div><div class="menu">
Nông trại của bạn hiện có <b>'.$demodat.'</b> ô đất đang có cây trồng, số lượng phân bón không đủ, hãy mua thêm';
echo '</div>
<div class="rmenu">&raquo; <a href="phanbon.php">Cửa hàng</a><br/>&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
if (!isset($_POST['submit'])) {
echo '<div class="mainblok"><div class="phdr"><b>Bón phân hàng loạt &raquo;</b></div><div class="menu">
Hãy chọn loại phân bón cần sử dụng<form method="POST" action="bonphan.php">';
$phanbon = mysql_query("select * from `fermer_udobr` WHERE `id_user` = '".$user_id."' AND `kol` >= '".$demodat."' ORDER BY `id` ASC");
$i = 0;
while ($xuat = mysql_fetch_array($phanbon)) {
$loaisp = $xuat['udobr'];
$sl = $xuat['kol'];
$semen = mysql_fetch_array(mysql_query("select * from `fermer_udobr_name` WHERE  `id` = '".$loaisp."' LIMIT 1"));
$idsemen = $semen['id'];
$namesemen = $semen['name'];

echo '<input type="radio" name="radio" value="'.$loaisp.'"/><img src="img/udobr/'.$idsemen.'.png" alt="phan bon" style="border:1px solid #5dbef7;"/>  [<b>'.$namesemen.'</b>], số lượng: <b>'.$sl.'</b><br/>';
++$i;
}
echo '<input type="submit" name="submit" value="Bón phân" /></form>';
echo '</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
if (!isset($_POST['radio'])) {
echo '<div class="mainblok"><div class="menu">
Lỗi! Bạn chưa chọn loại phân cần bón
</div>
<div class="rmenu">&raquo; <a href="bonphan.php">Quay lại</a>
</div></div>';
}
else {
$semen2 = mysql_fetch_array(mysql_query("select * from `fermer_udobr_name` WHERE  `id` = '".$_POST['radio']."' LIMIT 1"));
$tggiam = $semen2['time'];
echo '<div class="mainblok"><div class="menu">
Bón phân thành công, thời gian sinh trưởng của cây trồng đã được giảm đi <b>'.($tggiam/60).'</b> phút
</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';

$khophan = mysql_query("select * from `fermer_udobr` WHERE `udobr` = '".$_POST['radio']."' AND `id_user` = '".$user_id."'");
$res = mysql_fetch_array($khophan);
if ($res['kol'] > $demodat) {
mysql_query("UPDATE `fermer_udobr` SET `kol` = `kol`-'".$demodat."' WHERE `udobr` = '".$_POST['radio']."' AND `id_user` = '".$user_id."' LIMIT 1");
} else {
mysql_query("DELETE FROM `fermer_udobr` WHERE `udobr` = '".$_POST['radio']."' AND `id_user` = '".$user_id."' LIMIT 1");
}
mysql_query("UPDATE `fermer_gr` SET `time` = `time` - '".$tggiam."' WHERE `semen` != '0' AND `id_user` = '".$user_id."'");
}
}
}
}




require('../incfiles/end.php');

?>