<?php
define('_IN_JOHNCMS', 1);
require '../incfiles/core.php';
$textl = 'Đấu giá';
require '../incfiles/head.php';
if(!$user_id){
Header("Location: $home");
exit;
}
echo '<div class="phdr">Đấu giá</div> ';
echo'<div class="omenu"><center><b><font color="red"> Đấu Giá</font></b><br>
<img src="npc.gif"></center></div>
<div class="omenu"><a href="?act=creat"><img src="/images/vao2.png"> Đấu giá</a></div>
<div class="omenu">
<a href="?act=hdsd"><img src="/images/vao2.png"> Hướng dẫn</a></div>';
switch($act){
default:

$total = mysql_result(mysql_query("SELECT COUNT(*) FROM `daugia` WHERE `site` = 1"),0);
$csdl = mysql_query('SELECT * FROM `daugia` WHERE `site` = 1');
if($total < 1){
echo '<div class="omenu"><font color="red"> Hiện tại chưa có vật phẩm đấu giá nhé bạn.
</div></font>';
}
if($total){
echo '<div class="omenu"><font color="red"> Có <b>'.$total.'</b> sản phẩm đang được đấu giá, hàng nhập khẩu, chưa có trong shop</div></font>';
$csdlz = mysql_query("SELECT * FROM `daugia` WHERE `site` = 1 ORDER BY `id` DESC LIMIT $start, $kmess");
while ($res = mysql_fetch_array($csdlz)){
$time = ($res['timeend']-time());
$get = mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id` = '".$res['idvp']."'"),0);
echo '<div class="omenu"><img class="avatar_vina" src="/images/shop/'.$res['idvp'].'.png">'.$get['tenvatpham'].''.($rights >=9 ? '<a href="?act=edit&id='.$res['id'].'"> [Sửa]</a><a href="?act=del&id='.$res['id'].'"> [Xóa]</a>' : '').'<br>Khởi điểm: <b>'.($res['xu'] ? $res['xu'].' xu' : $res['vnd'].' lượng').'</b><br>'.($time >0 ? '<a href="?act=mua&id='.$res['id'].'"><input type="submit" name="submit" value="Đấu giá"></a><br/>Kết thúc sau: <b>'.$time.'</b> giây' : '<font color=red>Đã kết thúc</font>').'</div>';

}
if($total > $kmess)
echo '<div class="trang">'.functions::display_pagination('?',$start,$total,$kmess).'</div>';
} else {

}
break;
case 'hdsd':
echo'<div class="phdr"> Hướng dẫn chức năng đấu giá</div>
<div class="list1">- Tùy vào lịch đấu giá mà BQT thông báo. Các item được đấu giá sẽ tùy thuộc vào các khung giờ khác nhau và mức giá 1 lần cược cũng đều khác nhau, có thể là xu hoặc lượng. Ví dụ item đó có giá cược 1 lần là 5.000 xu và bạn chọn số lần cược là 5 nếu như có người chơi khác đặt số lần cược lớn nhất sẽ dành chiến thắng trong phiên đấu giá.</div>';
break;
case 'creat':
if($rights >= 9){
if(isset($_POST['submit'])){
@mysql_query("INSERT INTO `daugia` SET `user_id` = '".$user_id."', `idvp` = '".intval($_POST[idvp])."', `xu` = '".intval($_POST[xu])."', `vnd` = '".intval($_POST[vnd])."', `site` = '1', `timeend` = '".(time() + 259200)."'") or die(mysql_error());
@mysql_query("INSERT INTO `guest` SET `time` = '".time()."', `text` = 'Vừa có 1 phiên đấu giá mới. Vào công viên để biết thêm chi tiết...', `user_id` = 2");
header('Location: daugia.php');
exit;
}
echo '<div class="menu"><form method="post"><input type="number" name="idvp" placeholder="ID VP"><br><input type="number" name="xu" placeholder="Nhập xu ..."><br><input type="number" name="vnd" placeholder="Nhập lượng ..."><br><div class="clearfix"></div><input type="submit" name="submit" class="inputsubmit" value="Tạo phiên"></div>';
}
break;
case 'edit':
$total = mysql_result(mysql_query("SELECT COUNT(*) FROM `daugia` WHERE `id` = '".intval($_GET['id'])."'"),0);
if($rights >=9 && $total){
if(isset($_POST['submit'])){
@mysql_query("UPDATE `daugia` SET `user_id` = $user_id, `idvp` = '".intval($_POST['idvp'])."' WHERE `id` = '".intval($_GET['id'])."'");
header('Location: daugia.php');
exit;
}
echo '<div class="menu">
<form method="post"><input type="number" name="idvp" placeholder="ID VP">
<div class="clearfix"></div>
<input type="submit" class="inputsubmit" name="submit" value="Sửa"></div>';
}
break;
case 'del':
$total = mysql_result(mysql_query("SELECT COUNT(*) FROM `daugia` WHERE `id` = '".intval($_GET['id'])."'"),0);
if($rights >=9 && $total){
if(isset($_POST['submit'])){
@mysql_query("DELETE FROM `daugia_act` WHERE `iddg` = $id");
@mysql_query("DELETE FROM `daugia` WHERE `id` = $id");
header('Location: daugia.php');
exit;
}
echo '<div class="menu"><form method="post"><input type="submit" name="submit" value="Xác nhận xóa" class="inputback"></form></div>';
}
break;
case 'mua':
$total = mysql_result(mysql_query("SELECT COUNT(*) FROM `daugia` WHERE `id` = '".intval($_GET['id'])."'"),0);
if(!$total){echo '<div class="rmenu">Vật phẩm không có trong danh sách đấu giá!</div>';}
else {
$res = mysql_fetch_array(mysql_query("SELECT * FROM `daugia` WHERE `id` = '".intval($_GET['id'])."'"),0);
if(($res['timeend'] - time()) <0){
Header("Location: $home/congvien/daugia.php");
exit;
}
$get = mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id` = '".$res['idvp']."'"),0);
echo '<div class="omenu"><img class="avatar_vina" src="/images/shop/'.$res['idvp'].'.png">'.$get['tenvatpham'].''.($rights >=9 ? '<a href="/congvien/daugia.php?act=edit&id='.$res['id'].'"> [Sửa]</a><a href="/congvien/daugia.php?act=del&id='.$res['id'].'"> [Xóa]</a>' : '').'<br>Khởi điểm: <b>'.($res['xu'] ? $res['xu'].' xu' : $res['vnd'].' lượng').'</b><br>Kết thúc sau: <b>'.(-time() + $res['timeend']).'</b> giây<br/><br/></div>';
if(isset($_POST['submit'])){
$xuz = intval(abs($_POST['cost']));
if($res['xu']){$xu = 'xu'; $xl = 'xu';} else {$xu = 'vnd'; $xl = 'vnd';}
if($datauser[$xu] > $res[$xl] AND $xuz > $res[$xl]){
$got = mysql_fetch_array(mysql_query("SELECT `xu` FROM `daugia_act` WHERE `iddg` = $id ORDER BY `xu` DESC LIMIT 1"),0);
if($got['xu'] < $xuz && $xuz > $res[$xl]){
mysql_query("UPDATE users SET $xu = $xu -$xuz WHERE id = $user_id");
mysql_query("INSERT INTO `daugia_act` SET `cost` = $xuz, `user_id` = $user_id, `iddg` = $id");
echo '<div class="news">Tham gia tranh giá thành công!</div>';
} else {
echo '<div class="news">Bạn đã đưa ra giá thấp hơn hoặc ngang bằng với giá đấu cao nhất hiện tại!</div>';
}
} else {
echo '<div class="news">Bạn không thể đấu giá với mức này!</div>';
}
}
echo '<div class="menu">Nhập số tiền đấu giá:<form method="post"><input type="number" name="cost" placeholder="Nhập số tiền"> <button name="submit">Tranh giá</button></form></div>';
$good = mysql_query("SELECT * FROM `daugia_act` WHERE `iddg` = $id ORDER BY `cost` DESC");
echo '<div class="phdr">Lượt đấu giá ('.mysql_num_rows($good).')</div>';
if(mysql_num_rows($good)){
while($well = mysql_fetch_array($good)){
echo '<div class="news">'.nick($well['user_id']).' <span class="right"><b>'.$well['cost'].'</b> '.($res['xu'] ? 'xu' : 'lượng').'</span></div>';
}
} else{
echo '<div class="menu">Hãy là người đầu tiên!</div>';
}
}
break;
}
require '../incfiles/end.php';