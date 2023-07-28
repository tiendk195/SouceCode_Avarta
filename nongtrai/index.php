<?php
define('_IN_JOHNCMS', 1);
$textl = 'Nông trại/Trang trại';
require_once('../incfiles/core.php');
require('../incfiles/head.php');


if (!$user_id){
echo'<div class="menu">Chỉ dành cho thành viên diễn đàn! Hãy đăng ký để tham gia nhé</div>';
require('../incfiles/end.php');
exit;
}
include'xem.php';
$post3 = mysql_result(mysql_query("select count(*) from `fermer_gr` WHERE  `id_user` = '".$user_id."'  LIMIT 1"),0);
if($post3<1){
mysql_query("UPDATE `users` SET `farm`= '1' WHERE `id` = '".$user_id."' ");
mysql_query("INSERT INTO `fermer_gr` (`kol`,`semen`, `id_user`) VALUES  ( '0', '0', '".$user_id."') ");
}
$time = time();
$gio = date('H', time()+7*3600);
$id = intval($_GET['id']);

switch ($act) {
default:
echo '<div class="phdr"><b>Nông trại &raquo;</b></div>

<div class="cola" style="padding: 0;margin-bottom: 2px;margin-top: 3px;"><div class="">
 <a href="shop.php"><img src="icon/cuahang.png" alt="cua hang" style="vertical-align: -7px;"/></a>
 <a href="nhakho.php"><img src="icon/nhakho.png" alt="nha kho" style="vertical-align: -7px;"/></a>
 <a href="nhabep.php"><img src="icon/nhabep.png" alt="nhabep" style="vertical-align: -7px;"/></a>

 '.($time > $datauser['timethuhoachkhe']+3600 ? '<a href="khe.php"><img src="icon/caykhechin.png" alt="cay khe" style="vertical-align: -7px;"/></a>' : '<a href="khe.php"><img src="icon/caykhe.png" alt="cay khe" style="vertical-align: -7px;"/></a>').'';

$tongodat = mysql_result(mysql_query("SELECT COUNT(*) FROM `fermer_gr` WHERE `id_user` = '".$user_id."'"),0);
$res = mysql_query("select * from `fermer_gr` WHERE `id_user` = '".$user_id."' ORDER BY `id` ASC LIMIT 100"); 
echo'<div class="dat">';
$i = 0;
while ($post = mysql_fetch_array($res)){
$res1 = mysql_query("select * from `fermer_name` WHERE `id` = '".$post['semen']."' LIMIT 1");
$post1 = mysql_fetch_array($res1);
$tgsinhtruong = $post1['time'];
$tgtrong = $post['time'];
$tgcheck = $tgtrong+$tgsinhtruong;
$nuatg = $tgtrong+$tgsinhtruong/2;

if ($post['semen'] == 0) {
echo '<a href="index.php?act=ok&id='.$post['id'].'"><img src="icon/0.png" alt="dat" /></a> ';
}
else {
if ($time < $nuatg){
echo '<a href="index.php?act=ok&id='.$post['id'].'"><img style="background:url(icon/0.png); border: 0" src="icon/gieohat.png" alt="dat" /></a> ';
}
else {
if ($time < $tgcheck){
echo '<a href="index.php?act=ok&id='.$post['id'].'"><img style="background:url(icon/0.png); border: 0" src="icon/'.$post['semen'].'.png"></a> ';}
else {
echo '<a href="index.php?act=ok&id='.$post['id'].'"><img style="background:url(icon/0.png); border: 0" src="icon/'.$post['semen'].'-chin.png"></a> ';
}
}
}
++$i;
}

if ($tongodat < 100) {
echo'<a href="index.php?act=muadat"><img src="icon/muadat.png" alt="icon"/></a>';
}
echo'<br></br>';
echo '<div class="cola"><img src="'.$home.'/avatar/'.$user_id.'.png" alt="avatar" >
</div><br></div>';


 




echo '<div class="clear"></div></div></div>';



echo '<div class="phdr"><b>Auto nông trại &raquo;</b></div>
<div clas="omenu"><a>
</a><div class="box_list_con"><a><span> </span></a><a href="gieohat.php"><b>Gieo hạt</b></a></div>
<div class="box_list_con"><span><a href="thuhoach.php"><b>Thu hoạch</b></a> </span></div>
<div class="box_list_con"><span><a href="xoiodat.php"><b>Cuốc đất</b></a> </span></div>
<div class="box_list_con"><span><a href="/farm/?xem"><b>Thoát</b></a></span></div>
</div>
';
echo'</br></br>';
break;
////////////////////////////
case 'thuhoach':
$check = mysql_query("SELECT * FROM `fermer_gr` WHERE `id_user` = '".$user_id."' AND `id` = '".$id."'");
$check1 = mysql_num_rows($check);
$check2 = mysql_fetch_array($check);
if ($check1 == '0') {
echo '<div class="mainblok"><div class="menu">
Có lỗi xảy ra, đây không phải là ô đất của bạn
</div>
<div class="rmenu">&raquo; <a href="index.php"><b>Quay lại</b></a></br>&raquo; <a href="index.php"><b>Nông trại</b></a> &raquo; <a href="/farm"><b>Trang trại</b></a> &raquo; <a href="/nongtrai/shop.php"><b>Cửa hàng</b></a>
</div></div>';
}
else {
if ($check2['semen'] == '0') {
echo '<div class="mainblok"><div class="menu">
Ô đất đang trống, không thể thu hoạch
</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
$loaisp = $check2['semen'];
$res1 = mysql_query("select * from `fermer_name` WHERE `id` = '".$loaisp."' LIMIT 1");
$post1 = mysql_fetch_array($res1);
$tgsinhtruong = $post1['time'];
$tgtrong = $check2['time'];
$tgcheck = $tgtrong+$tgsinhtruong;
if ($check2['woter'] == '0') $sanluong = $post1['rand1'];
else $sanluong = $post1['rand2'];
if ($time < $tgcheck) {
echo '<div class="mainblok"><div class="menu">
Cây đang chưa trưởng thành, không thể thu hoạch
</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
if (!isset($_POST['submit'])) {

echo '<div class="mainblok"><div class="phdr"><b>Thu hoạch cây trồng &raquo;</b></div><div class="menu">
<form method="POST" action="index.php?act=thuhoach&id='.$id.'">';
echo '&nbsp;<img src="icon/'.$post1['id'].'-chin.png" alt="dat" />&nbsp;
<b>'.$post1['name'].'</b>
<br/>Có thể thu hoạch
<br/>Sản lượng: <b>'.$sanluong.'</b> '.($check2['woter'] == '0' ? '[Chăm sóc kém]' : '[Chăm sóc tốt]').'
<br/>Đơn giá: <b>'.$post1['cena'].'</b> xu/đơn vị
<br/>Tổng thu nhập: <b>'.($post1['cena']*$sanluong).'</b> xu';
echo '<br/><input type="submit" name="submit" value="Thu hoạch" /></form>';
echo '</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
echo '<div class="mainblok"><div class="menu">
Chúc mừng bạn đã thu hoạch thành công, nông sản đã được chuyển đến nhà kho của bạn
</div>
<div class="rmenu">&raquo; <a href="nhakho.php">Nhà kho</a><br/>&raquo; <a href="index.php">Quay lại</a>
</div></div>';

$khogiong = mysql_query("select * from `fermer_sclad` WHERE `semen` = '".$post1['id']."' AND `id_user` = '".$user_id."'");
$res = mysql_num_rows($khogiong);
if ($res != '0') {
mysql_query("UPDATE `fermer_sclad` SET `kol` = `kol`+'".$sanluong."' WHERE `semen` = '".$post1['id']."' AND `id_user` = '".$user_id."'");
} else {
mysql_query("INSERT INTO `fermer_sclad` (`kol`,`semen`, `id_user`) VALUES  ( '".$sanluong."', '".$post1['id']."', '".$user_id."') ");
}
mysql_query("UPDATE `fermer_gr` SET `semen` = '0', `kol` = '0', `woter` = '0', `time` = '0' WHERE `id` = '".$id."' AND `id_user` = '".$user_id."' LIMIT 1");

}
}
}
}
break;
////////////////////////////
case 'muadat':
$tongodat = mysql_result(mysql_query("SELECT COUNT(*) FROM `fermer_gr` WHERE `id_user` = '".$user_id."'"),0);
if ($tongodat >= '100') {
echo '<div class="mainblok"><div class="menu">
Số lượng ô đấ đã đạt tối đa, không thể mua tiếp
</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
 if($tongodat<5){
     $gia = $tongodat*1000;
 } else 
if($tongodat==5){
$gia=7050;
}else if($tongodat==6){
$gia=10800;
}else if($tongodat==7){
$gia=14700;
}else if($tongodat==8){
$gia=19200;
}else if($tongodat==9){
$gia=24300;
}else if($tongodat==10){
$gia=30000;
}else if($tongodat==11){
$gia=36300;
}else if($tongodat==12){
$gia=43200;
}else if($tongodat==13){
$gia=50700;
}else if($tongodat==14){
$gia=58800;
}else if($tongodat==15){
$gia=67500;
}else if($tongodat==16){
$gia=76800;
}else if($tongodat==17){
$gia=86700;
}else if($tongodat==18){
$gia=97200;
}else if($tongodat==19){
$gia=108300;
}else if($tongodat==20){
$gia=120000;
}else if($tongodat==21){
$gia=132300;
}else if($tongodat==22){
$gia=145200;
}else if($tongodat==23){
$gia=158700;
}else if($tongodat==24){
$gia=172800;
}else if($tongodat==25){
$gia=187500;
}else if($tongodat==26){
$gia=202800;
}else if($tongodat==27){
$gia=218700;
}else if($tongodat==28){
$gia=235200;
}else if($tongodat==29){
$gia=252300;
}else if($tongodat==30){
$gia=270000;
}else if($tongodat==31){
$gia=288300;
}else if($tongodat==32){
$gia=307200;
}else if($tongodat==33){
$gia=326700;

}else if($tongodat==34){
$gia=346800;
}else if($tongodat==35){
$gia=367500;
}else if($tongodat==36){
$gia=388800;
}else if($tongodat==37){
$gia=410700;
}else if($tongodat==38){
$gia=433200;
}else if($tongodat==39){
$gia=456300;
}else if($tongodat==40){
$gia=480000;
}else if($tongodat==41){
$gia=504300;
}else if($tongodat==42){
$gia=529200;
}else if($tongodat==43){
$gia=554700;
}else if($tongodat==44){
$gia=580800;
}else if($tongodat==45){
$gia=607500;
}else if($tongodat==46){
$gia=634800;
}else if($tongodat==47){
$gia=662700;

}else if($tongodat>=48){
$gia=$tongodat*19270;

}
echo '<div class="mainblok"><div class="phdr">Nông trại vui vẻ | <a href="cuahang.php">Cửa hàng Farm</a></div>';
echo'<div class="menu">Bạn đang sở hữu '.$tongodat.' ô đất. Bạn có muốn mua thêm ô đất thứ '.($tongodat+1).' với giá là '.number_format($gia).' xu không ?<br><br>
<center><form method="post"> <input type="submit" name="mua" value="Mua"></form></center></div>';

echo '</div>';

if (isset($_POST['mua'])) {
	if ($datauser['xu'] < $gia) {
echo'<div class="omenu">Bạn không đủ xu</div>';
	} else if ($tongodat >= '100') {
echo'<div class="omenu">Bạn đã đạt tối đa ô đất</div>';
	} else {

	echo'<div class="omenu">Mở ô đất thứ <b>'.($tongodat+1).'</b> thành công với giá <b> '.number_format($gia).' xu </b><a href="index.php">Trở về nông trại</a></div>';
mysql_query("UPDATE `users` SET `farm` = `farm` + '1' WHERE `id` = '".$user_id."'");
mysql_query("UPDATE `users` SET `xu` = `xu` - '".$gia."' WHERE `id` = '".$user_id."'");
mysql_query("INSERT INTO `fermer_gr` (`semen`, `woter`, `id_user`) VALUES  ( '0', '0', '".$user_id."') ");
	}
}
}
break;
////////////////////////////
case 'ok':

$check = mysql_query("SELECT * FROM `fermer_gr` WHERE `id_user` = '".$user_id."' AND `id` = '".$id."'");
$check1 = mysql_num_rows($check);
$check2 = mysql_fetch_array($check);
if ($check1 == '0') {
echo '<div class="mainblok"><div class="menu">
Có lỗi xảy ra, đây không phải là ô đất của bạn
</div>
<div class="rmenu">&raquo; <a href="index.php"><b>Quay lại</b></a></br>&raquo; <a href="index.php"><b>Nông trại</b></a> &raquo; <a href="/farm"><b>Trang trại</b></a> &raquo; <a href="/nongtrai/shop.php"><b>Cửa hàng</b></a>
</div></div>';
}
else {
if ($check2['semen'] == '0') {
echo '<div class="mainblok"><div class="phdr"><b>Thông tin ô đất &raquo;</b></div><div class="menu">
Ô đất trống đang chờ bạn gieo hạt!
<br/><a href="index.php?act=gieohat&id='.$id.'"><input type="button" value="Gieo hạt" /></a>
</div>
<div class="rmenu">&raquo; <a href="index.php"><b>Quay lại</b></a></br>&raquo; <a href="index.php"><b>Nông trại</b></a> &raquo; <a href="/farm"><b>Trang trại</b></a> &raquo; <a href="/nongtrai/shop.php"><b>Cửa hàng</b></a>
</div></div>';
}
else {
$loaisp = $check2['semen'];
$woter = $check2['woter'];
$res1 = mysql_query("select * from `fermer_name` WHERE `id` = '".$loaisp."' LIMIT 1");
$post1 = mysql_fetch_array($res1);
$tgsinhtruong = $post1['time'];
$tgtrong = $check2['time'];
$tgcheck = $tgtrong+$tgsinhtruong;
$gio = ceil(($tgtrong+$tgsinhtruong-$time)/60);
$nuatg = $tgtrong+$tgsinhtruong/2;

echo '<div class="mainblok"><div class="phdr"><b>Thông tin ô đất &raquo;</b></div><div class="menu">';
if ($time < $nuatg) {
echo '&nbsp;<img src="icon/gieohat.png" alt="dat" />&nbsp;
<b>'.$post1['name'].'</b>
<br/>Bạn phải chờ <b>'.$gio.'</b> phút nữa mới có thể thu hoạch';
}
else {

if ($time < $tgcheck){
echo '&nbsp;<img src="icon/'.$post1['id'].'.png" alt="dat" />&nbsp;
<b>'.$post1['name'].'</b>
'.($woter == '0' ? '<br/>Cây đang thiếu nước: <a href="index.php?act=tuoinuoc&id='.$id.'"><input type="button" value="Tưới nước" /></a>' : '').'

<br/>Bạn phải chờ <b>'.$gio.'</b> phút nữa mới có thể thu hoạch';
}
else {
echo '&nbsp;<img src="icon/'.$post1['id'].'-chin.png" alt="dat" />&nbsp;
<b>'.$post1['name'].'</b>
<br/>Cây đã trưởng thành
<br/><a href="index.php?act=thuhoach&id='.$id.'"><input type="button" value="Thu hoạch" /></a>';

}
}

echo '</div>
<div class="rmenu">&raquo; <a href="index.php"><b>Quay lại</b></a></br>&raquo; <a href="index.php"><b>Nông trại</b></a> &raquo; <a href="/farm"><b>Trang trại</b></a> &raquo; <a href="/nongtrai/shop.php"><b>Cửa hàng</b></a>
</div></div>';
}
}
break;
///////////////////////////
case 'tuoinuoc':
$check = mysql_query("SELECT * FROM `fermer_gr` WHERE `id_user` = '".$user_id."' AND `id` = '".$id."'");
$check1 = mysql_num_rows($check);
$check2 = mysql_fetch_array($check);
if ($check1 == '0') {
echo '<div class="mainblok"><div class="menu">
Có lỗi xảy ra, đây không phải là ô đất của bạn
</div>
<div class="rmenu">&raquo; <a href="index.php"><b>Quay lại</b></a></br>&raquo; <a href="index.php"><b>Nông trại</b></a> &raquo; <a href="/farm"><b>Trang trại</b></a> &raquo; <a href="/nongtrai/shop.php"><b>Cửa hàng</b></a>
</div></div>';
}
else {
if ($check2['semen'] == '0') {
echo '<div class="mainblok"><div class="menu">
Ô đất đang trống, không thể tưới nước
</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
$loaisp = $check2['semen'];
$res1 = mysql_query("select * from `fermer_name` WHERE `id` = '".$loaisp."' LIMIT 1");
$post1 = mysql_fetch_array($res1);
$tgsinhtruong = $post1['time'];
$tgtrong = $check2['time'];
$tgcheck = $tgtrong+$tgsinhtruong;
$nuatg = $tgtrong+$tgsinhtruong/2;
if ($time < $nuatg) {
echo '<div class="mainblok"><div class="menu">
Cây đang ở giai đoạn nảy mầm, không cần tưới nước
</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
if ($time > $tgcheck) {
echo '<div class="mainblok"><div class="menu">
Cây đã trưởng thành, không thể tưới nước
</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
if ($check2['woter'] != '0') {
echo '<div class="mainblok"><div class="menu">
Cây đang phát triển tốt, không cần tưới nước
</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
echo '<div class="mainblok"><div class="menu">
Cây trồng đã được tưới nước thành công!
</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
mysql_query("UPDATE `fermer_gr` SET `woter` = '1' WHERE `semen` != '0' AND `id_user` = '".$user_id."' AND `id` = '".$id."'");
}
}
}
}
}
break;
//////////////////////////
case 'bonphan':
$check = mysql_query("SELECT * FROM `fermer_gr` WHERE `id_user` = '".$user_id."' AND `id` = '".$id."'");
$check1 = mysql_num_rows($check);
$check2 = mysql_fetch_array($check);
if ($check1 == '0') {
echo '<div class="mainblok"><div class="menu">
Có lỗi xảy ra, đây không phải là ô đất của bạn
</div>
<div class="rmenu">&raquo; <a href="index.php"><b>Quay lại</b></a></br>&raquo; <a href="index.php"><b>Nông trại</b></a> &raquo; <a href="/farm"><b>Trang trại</b></a> &raquo; <a href="/nongtrai/shop.php"><b>Cửa hàng</b></a>
</div></div>';
}
else {
if ($check2['semen'] == '0') {
echo '<div class="mainblok"><div class="menu">
Ô đất đang trống, không thể bón phân
</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
$loaisp = $check2['semen'];
$res1 = mysql_query("select * from `fermer_name` WHERE `id` = '".$loaisp."' LIMIT 1");
$post1 = mysql_fetch_array($res1);
$tgsinhtruong = $post1['time'];
$tgtrong = $check2['time'];
$tgcheck = $tgtrong+$tgsinhtruong;
$nuatg = $tgtrong+$tgsinhtruong/2;
if ($time < $nuatg) {
echo '<div class="mainblok"><div class="menu">
Cây đang ở giai đoạn nảy mầm, không cần bón phân
</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
if ($time >= $tgcheck) {
echo '<div class="mainblok"><div class="menu">
Cây đã trưởng thành, không thể bón phân
</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
$kt = mysql_query("select * from `fermer_udobr` WHERE `id_user` = '".$user_id."' LIMIT 1");
$kt1 = mysql_num_rows($kt);
if ($kt1 == '0') {
echo '<div class="mainblok"><div class="menu">
Bạn chưa có phân bón, hãy vào cửa hàng để mua
</div>
<div class="rmenu">&raquo; <a href="phanbon.php">Mua phân bón</a><br/>&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
if (!isset($_POST['submit'])) {
echo '<div class="mainblok"><div class="phdr"><b>Bón phân &raquo;</b></div><div class="menu">
Hãy chọn loại phân bón cần sử dụng<form method="POST" action="index.php?act=bonphan&id='.$id.'">';
$phanbon = mysql_query("select * from `fermer_udobr` WHERE `id_user` = '".$user_id."' ORDER BY `id` ASC");
$i = 0;
while ($xuat = mysql_fetch_array($phanbon)) {
$loaisp = $xuat['udobr'];
$sl = $xuat['kol'];
$semen = mysql_fetch_array(mysql_query("select * from `fermer_udobr_name` WHERE  `id` = '".$loaisp."' LIMIT 1"));
$idsemen = $semen['id'];
$namesemen = $semen['name'];

echo '<input type="radio" name="radio" value="'.$loaisp.'"/> [<b>'.$namesemen.'</b>], số lượng: <b>'.$sl.'</b><br/>';
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
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
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

$khophan = mysql_query("select * from `fermer_udobr` WHERE `udobr` = '".$_POST['radio']."' AND `id_user` = '".$user_id."' ORDER BY `id` ASC");
$res = mysql_fetch_array($khophan);
if ($res['kol'] >= 2) {
mysql_query("UPDATE `fermer_udobr` SET `kol` = `kol`-'1' WHERE `udobr` = '".$_POST['radio']."' AND `id_user` = '".$user_id."' LIMIT 1");
} else {
mysql_query("DELETE FROM `fermer_udobr` WHERE `udobr` = '".$_POST['radio']."' AND `id_user` = '".$user_id."' LIMIT 1");
}
mysql_query("UPDATE `fermer_gr` SET `time` = `time` - '".$tggiam."' WHERE `id` = '".$id."' AND `id_user` = '".$user_id."' LIMIT 1");
}
}
}
}
}
}
}
break;
/////////////////////////
case 'gieohat':
$check = mysql_query("SELECT * FROM `fermer_gr` WHERE `id_user` = '".$user_id."' AND `id` = '".$id."'");
$check1 = mysql_num_rows($check);
$check2 = mysql_fetch_array($check);
if ($check1 == '0') {
echo '<div class="mainblok"><div class="menu">
Có lỗi xảy ra, đây không phải là ô đất của bạn
</div>
<div class="rmenu">&raquo; <a href="index.php"><b>Quay lại</b></a></br>&raquo; <a href="index.php"><b>Nông trại</b></a> &raquo; <a href="/farm"><b>Trang trại</b></a> &raquo; <a href="/nongtrai/shop.php"><b>Cửa hàng</b></a>
</div></div>';
}
else {
if ($check2['semen'] != '0') {
echo '<div class="mainblok"><div class="menu">
Ô đất đang có cây trồng, không thể gieo hạt
</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
$demhatgiong = mysql_result(mysql_query("SELECT COUNT(*) FROM `fermer_sclad` WHERE `id_user`='".$user_id."'"), 0); 

if ($demhatgiong > 0) {
if (!isset($_POST['submit'])) {
echo '<div class="mainblok"><div class="phdr"><b>Gieo hạt &raquo;</b></div><div class="menu">
Hãy chọn hạt giống, sau đó gieo hạt<form method="POST" action="index.php?act=gieohat&id='.$id.'">';
$hatgiong = mysql_query("select * from `fermer_sclad` WHERE `id_user` = '".$user_id."' ORDER BY `id` ASC");
$i = 0;
while ($xuat = mysql_fetch_array($hatgiong)) {
$loaisp = $xuat['semen'];
$sl = $xuat['kol'];
$semen = mysql_fetch_array(mysql_query("select * from `fermer_name` WHERE  `id` = '".$loaisp."' LIMIT 1"));
$namesemen = $semen['name'];

echo '<input type="radio" name="radio" value="'.$loaisp.'"/> [<b>'.$namesemen.'</b>], số lượng: <b>'.$sl.'</b><br/>';
++$i;
}
echo '<input type="submit" name="submit" value="Gieo hạt" /></form>';
echo '</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
if (!isset($_POST['radio'])) {
echo '<div class="mainblok"><div class="menu">
Lỗi! Bạn chưa chọn hạt giống cần gieo
</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
echo '<div class="mainblok"><div class="menu">
Gieo hạt thành công
</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
$khogiong = mysql_query("select * from `fermer_sclad` WHERE `semen` = '".$_POST['radio']."' AND `id_user` = '".$user_id."' ");
$res = mysql_fetch_array($khogiong);
if ($res['kol'] >= 2) {
mysql_query("UPDATE `fermer_sclad` SET `kol` = `kol`-'1' WHERE `semen` = '".$_POST['radio']."' AND `id_user` = '".$user_id."' LIMIT 1");
} else {
mysql_query("DELETE FROM `fermer_sclad` WHERE `semen` = '".$_POST['radio']."' AND `id_user` = '".$user_id."' LIMIT 1");
}
mysql_query("UPDATE `fermer_gr` SET `semen` = '".$_POST['radio']."', `woter` = '0', `time` = '".$time."' WHERE `id` = '".$id."' AND `id_user` = '".$user_id."' LIMIT 1");

}
}
}
else {
echo '<div class="mainblok"><div class="phdr"><b>Gieo hạt &raquo;</b></div><div class="menu">
Trong kho của bạn hiện chưa có hạt giống nào, hãy vào cửa hàng để mua nhé';
echo '</div>
<div class="rmenu">&raquo; <a href="shop.php">Cửa hàng</a><br/>&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
}
}
break;
///////////////////////////
}
require('../incfiles/end.php');

?>