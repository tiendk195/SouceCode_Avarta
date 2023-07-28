<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$textl = 'Cửa hàng';
if($datauser['vip'] == 1){
$giamgia = 1.1;
}else if($datauser['vip'] == 2){
$giamgia = 1.2;
}else if($datauser['vip'] == 3){
$giamgia = 1.3;
}else if($datauser['vip'] == 4){
$giamgia = 1.4;
}else if($datauser['vip'] == 5){
$giamgia = 1.5;
}else if($datauser['vip'] == 6){
$giamgia = 2;
}else{
$giamgia = 1;
}
require('../incfiles/head.php');
if(!$user_id){
header('location: /dangnhap.html');
exit;
}
switch($act){
case'mua':
echo '<div class="homeforum"><br/><div class="icon-home"><div class="home">Khu Mua Sắm</div></div></div><div class="phdr">Mua item</div>';
if($id){
$shop = mysql_fetch_assoc(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$id."'"));
if($shop['hienthi'] == 1){
header('location: shop.html');
}
$shop['gia'] = round($shop['gia'] / $giamgia);
echo'<div class="omenu"><center> <img src="/images/shop/'.$shop['id'].'.png"> <br>Bạn có muốn mua item này với giá <b>'.$shop['gia'].' '.($shop['loaitien'] == 'xu' ? 'xu' : 'lượng').' </b>? <br><form method="post"> <input type="submit" value="Xác Nhận" name="submit"></form></center></div>';
if(isset($_POST['submit'])){
if($shop['timesudung']){
$shop['timesudung'] = $shop['timesudung'] + time();
}
if($shop['loaitien'] == 'xu'){
if($datauser['xu'] > $shop['gia'] - 1){
mysql_query("UPDATE `users` SET `xu`=`xu`-'".$shop['gia']."' WHERE `id`='".$user_id."'");
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$shop['loai']."',
`id_loai`='".$shop['id_loai']."',
`tenvatpham`='".$shop['tenvatpham']."',
`id_shop`='".$shop['id']."',
`timesudung`='".$shop['timesudung']."'
");
echo'<div class="omenu">Bạn đã mua thành công: <b><font color="red"> '.$shop['tenvatpham'].'</font></b></div>';
}else{
echo'<div class="omenu">Giao dịch không thành công !!</div>';
}
}
if($shop['loaitien'] == 'vnd'){
if($datauser['vnd'] > $shop['gia'] - 1){
mysql_query("UPDATE `users` SET `vnd`=`vnd`-'".$shop['gia']."' WHERE `id`='".$user_id."'");
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$shop['loai']."',
`id_loai`='".$shop['id_loai']."',
`tenvatpham`='".$shop['tenvatpham']."',
`id_shop`='".$shop['id']."',
`timesudung`='".$shop['timesudung']."'
");
echo'<div class="omenu">Bạn đã mua thành công: <b><font color="red"> '.$shop['tenvatpham'].'</font></b></div>';
}else{
echo'<div class="omenu">Giao dịch không thành công !!</div>';
}
}
}
}
break;
case'tang':
echo '<div class="homeforum"><br/><div class="icon-home"><div class="home">Khu Mua Sắm</div></div></div><div class="phdr">Tặng item</div>';
if($id){
$shop = mysql_fetch_assoc(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$id."'"));
if($shop['hienthi'] == 1){
header('location: shop.html');
}
$shop['gia'] = round($shop['gia'] / $giamgia);
echo'<div class="omenu"><center> <img src="/images/shop/'.$shop['id'].'.png"> <br>Bạn có muốn tặng item này với giá <b>'.$shop['gia'].' '.($shop['loaitien'] == 'xu' ? 'xu' : 'lượng').' </b>? <br><form method="post"> <input type="number" placeholder="Nhập ID người nhận" name="nguoinhan"> <input type="submit" value="Xác Nhận" name="submit"></form></center></div>';
if(isset($_POST['submit'])){
if($shop['timesudung']){
$shop['timesudung'] = $shop['timesudung'] + time();
}
$nguoinhan = $_POST['nguoinhan'];
$check = mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE `id`='".$nguoinhan."'"));
if($check < 1){
echo'<div class="omenu">Người dùng không tồn tại.</div>';
require('../incfiles/end.php');
exit;
}
if($shop['loaitien'] == 'xu'){
if($datauser['xu'] > $shop['gia'] - 1){
mysql_query("UPDATE `users` SET `xu`=`xu`-'".$shop['gia']."' WHERE `id`='".$user_id."'");
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$nguoinhan."',
`loai`='".$shop['loai']."',
`id_loai`='".$shop['id_loai']."',
`tenvatpham`='".$shop['tenvatpham']."',
`id_shop`='".$shop['id']."',
`timesudung`='".$shop['timesudung']."'
");
$text='<b><font color="003366">'.$login.'</font></b><font color="000000"> vừa tặng<img src="/images/shop/'.$shop['id'].'.png"> ['.$shop['tenvatpham'].'] cho bạn</font>';
mysql_query("INSERT INTO `thongbao` SET
`id`='".$user_id."',
`user`='".$nguoinhan."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
echo'<div class="omenu">Bạn đã tặng thành công: <b><font color="red"> '.$shop['tenvatpham'].'</font></b> cho '.nick($nguoinhan).'</div>';
}else{
echo'<div class="omenu">Giao dịch không thành công !!</div>';
}
}
if($shop['loaitien'] == 'vnd'){
if($datauser['vnd'] > $shop['gia'] - 1){
mysql_query("UPDATE `users` SET `vnd`=`vnd`-'".$shop['gia']."' WHERE `id`='".$user_id."'");
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$nguoinhan."',
`loai`='".$shop['loai']."',
`id_loai`='".$shop['id_loai']."',
`tenvatpham`='".$shop['tenvatpham']."',
`id_shop`='".$shop['id']."',
`timesudung`='".$shop['timesudung']."'
");
$text='<b><font color="003366">'.$login.'</font></b><font color="000000"> vừa tặng<img src="/images/shop/'.$shop['id'].'.png"> ['.$shop['tenvatpham'].'] cho bạn</font>';
mysql_query("INSERT INTO `thongbao` SET
`id`='".$user_id."',
`user`='".$nguoinhan."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
echo'<div class="omenu">Bạn đã tặng thành công: <b><font color="red"> '.$shop['tenvatpham'].'</font></b> cho '.nick($nguoinhan).'</div>';
}else{
echo'<div class="omenu">Giao dịch không thành công !!</div>';
}
}
}
}
break;
default:
echo '<div class="homeforum"><br/><div class="icon-home"><div class="home">Khu Mua Sắm</div></div></div><div class="phdr">Cửa hàng</div>';
$req = mysql_query("SELECT `id`, `gia`, `tenvatpham`, `loaitien` FROM `shopdo` WHERE `shopcaocap`=1 ORDER BY `id` DESC LIMIT $start,$kmess");
while($res = mysql_fetch_assoc($req)){
$res['gia'] = round($res['gia'] / $giamgia);
echo'<div class="omenu" style="padding: 0px"><table width="100%" border="0" cellspacing="0" class="profile-info"><tbody><tr><td class="left-info" width="25%"><img src="/images/shop/'.$res['id'].'.png"></td><td class="right-info" width="75%">Tên: <b>'.$res['tenvatpham'].'</b> <br>Giá: <b>'.number_format($res['gia']).'</b> '.($res['loaitien'] == xu ? 'xu' : 'lượng').' </div><div class="menu"><a href="?act=mua&id='.$res['id'].'"><button> Mua </button></a> <a href="?act=tang&id='.$res['id'].'"><button> Tặng </button></a> ' .($rights > 8 ? ' <br/> <a href="/avatar/edit.html?id='.$res['id'].'"><button> Sửa </button></a> <a href="/avatar/del.html?id='.$res['id'].'"><button> Xóa </button></a> ' : '').'</td></tr></tbody></table></div>';
}
$total = mysql_result(mysql_query("SELECT COUNT(*) FROM `shopdo` WHERE `loai`='".$loai."' AND `premium`=1"), 0);
if($total > $kmess){
echo'<div class="topmenu">'.functions::pages('?act=danhsach&loai='.$loai.'&page=', $start, $total, $kmess).'</div>';
}
break;
}
require('../incfiles/end.php');