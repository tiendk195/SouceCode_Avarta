<?php
define('_IN_JOHNCMS',1);
$rootpath='../../../';

require('../../../incfiles/core.php');
$textl='VQBD';
require('../../../incfiles/head.php');
if (!$user_id) {
header('Location: /login.php');
exit;
}
echo '<div class="mainblok">';
switch($act) {
case 'add':
if ($rights>=9) {
echo '<div class="phdr">Thêm đồ</div>';
if (isset($_POST[add])) {
$vatpham=(int)$_POST[vatpham];
$dsh=(int)$_POST[dsh];
$nlb=(int)$_POST[nlb];
$kcvt=(int)$_POST[kcvt];
$dmt=(int)$_POST[dmt];
if (empty($vatpham)) {
echo '<div class="news">Không được bỏ trống</div>';
} else {
mysql_query("INSERT INTO `shop_hawaii` SET
`id_shop`='".$vatpham."',
`nlb`='".$nlb."',
`dmt`='".$dmt."',
`kcvt`='".$kcvt."',
`dsh`='".$dsh."'");
$bot='[b]'.$login.' vừa thêm [red]item  [/red] vào VQBD ![/b]';
//mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
echo '<div class="rmenu">Thêm thành công</div>';
}
}
echo '<form method="post">';
echo 'Vật phẩm: <select name="vatpham">';
$nc=mysql_query("SELECT * FROM `shopdo` WHERE `hienthi`='1'");
while ($show=mysql_fetch_array($nc)) {
echo '<option value="'.$show['id'].'"> '.$show['id'].'  '.$show['tenvatpham'].'</option>';
}
echo '</select><br/>';

echo 'Ngọc lục bảo: <input type="text" name="nlb" size="1"> viên<br/>';
echo 'Đá mặt trăng: <input type="text" name="dmt" size="1"> viên<br/>';
echo 'Đá sao hỏa: <input type="text" name="dsh" size="1"> viên<br/>';
echo 'Kim cương vũ trụ: <input type="text" name="kcvt" size="1"> viên<br/>';
echo '<input type="submit" name="add" value="Thêm">';
echo '</form>';
}
break;
case 'edit':
if ($rights>=9) {


$id=$_GET[id];
$item=mysql_fetch_array(mysql_query("SELECT * FROM `shop_hawaii` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item[id_shop]."'"));
  $xyz=mysql_num_rows(mysql_query("SELECT * FROM `shop_hawaii` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}


echo '<div class="phdr"><b>'.$shop[tenvatpham].'</b></div>';
if (isset($_POST[submit])) {
    $timesd=(int)$_POST[timesudung];

  
@mysql_query("UPDATE `shop_hawaii` SET
`nlb`='".$_POST[nlb]."',
`dmt`='".$_POST[dmt]."',
`kcvt`='".$_POST[kcvt]."',
`dsh`='".$_POST[dsh]."'



WHERE `id`='".$id."'
");

echo '<div class="omenu">Edit thành công! </div>';
}
echo '<img src="/images/shop/'.$shop['id'].'.png">';
echo '<form method="post">';


echo 'Nhập ngọc lục bảo: <input type="number" name="nlb" value="'.$item[nlb].'"><br/>';
echo 'Nhập đá mặt trăng: <input type="number" name="dmt" value="'.$item[dmt].'"><br/>';
echo 'Nhập kim cương vũ trụ: <input type="number" name="kcvt" value="'.$item[kcvt].'"><br/>';
echo 'Nhập đá sao hỏa: <input type="number" name="dsh" value="'.$item[dsh].'"><br/>';

echo '<input type="submit" name="submit" value="Lưu">';
echo '</form>';
}
break;
case 'xoa':
if ($datauser['rights'] >= 9) {
$id = $_GET['id'];
if (isset($_POST['delit'])) {
mysql_query("DELETE FROM `shop_hawaii` WHERE `id`='".$id."'");
    header ('Location : item.php ');

}
$checkit = mysql_result(mysql_query("select count(*) from `shop_hawaii` where `id` = '".$id."'"),0);
if ($checkit == 0) {
	echo '<div class="omenu">Không có Item này !</div>';
} else {
echo '<div class="phdr"> Xóa Item </div>';
echo '<center><div class="omenu">Bạn có chắc muốn xóa item này khỏi shop ?<br/>
<form method="post"><input type="submit" name="delit" value="Xóa"></form></div>';
}
}

break;
default:
$vp32=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='32'"));
$vp33=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='33'"));
$vp34=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='34'"));
$vp35=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='35'"));
echo '<div class="phdr">Đổi quà</div>';
if ($rights>=9) {
echo '<div class="omenu"><a href="?act=add">Thêm đồ</a></div>';
}
if (isset($_POST[doi])) {
$vp=intval($_POST[vatpham]);
$check=mysql_num_rows(mysql_query("SELECT * FROM `shop_hawaii` WHERE `id`='".$vp."'"));
$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else 
if (!$check) {
echo '<div class="omenu"><font color="red"><b>Lỗi!!</font></b> Chưa chọn vật phẩm hoặc vật phẩm không tồn tại</div>';
} else {
$kotex=mysql_fetch_array(mysql_query("SELECT * FROM `shop_hawaii` WHERE `id`='".$vp."'"));
if ($vp32[soluong]<$kotex[nlb]||$vp33[soluong]<$kotex[dmt]||$vp34[soluong]<$kotex[dsh]||$vp35[soluong]<$kotex[kcvt]) {
echo '<div class="omenu"><font color="red"><b>Lỗi!!</font></b> Không đủ đá để đổi</div>';
} else {
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$kotex[id_shop]."'"));
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$kotex[nlb]."' WHERE `id_shop`='32' AND `user_id`='".$user_id."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$kotex[dmt]."' WHERE `id_shop`='33' AND `user_id`='".$user_id."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$kotex[dsh]."' WHERE `id_shop`='34' AND `user_id`='".$user_id."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$kotex[kcvt]."' WHERE `id_shop`='35' AND `user_id`='".$user_id."'");
mysql_query("
INSERT INTO `khodo` SET
`id_shop`='".$kotex[id_shop]."',
`user_id`='".$user_id."',
`tenvatpham`='".$shop[tenvatpham]."',
`id_loai`='".$shop[id_loai]."',
`loai`='".$shop[loai]."'
");
echo '<div class="omenu">Đổi vật phẩm <b>'.$shop[tenvatpham].'</b> thành công</div>';
}
}
}
echo '<form method="post">';
echo '<table>';
$q=mysql_query("SELECT * FROM `shop_hawaii` ORDER BY `id` DESC LIMIT $start,$kmess");
$tong=mysql_num_rows(mysql_query("SELECT * FROM `shop_hawaii`"));
while($qua=mysql_fetch_array($q)) {
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$qua[id_shop]."'"));
echo '<tr>';
echo '<td><img src="/images/shop/'.$shop[id].'.png"></td>';
echo '<td>
<input type="radio" name="vatpham" value="'.$qua[id].'"> <b><font color="blue">'.$shop[tenvatpham].'</font></b>';
if ($datauser['rights']>=9){
	echo' <a href="?act=xoa&id='.$qua[id].'">Xóa</a> - <a href="?act=edit&id='.$qua[id].'">Sửa</a>';
}
echo'
'.($qua[nlb]>0?'<br/><img src="/images/vatpham/32.png"> <b>'.$vp32[soluong].'/'.$qua[nlb].'</b> '.($vp32[soluong]>=$qua[nlb]?'<font color="green">(Đã đủ)':'<font color="red">(Chưa đủ)</font>').'':'').'
'.($qua[dmt]>0?'<br/><img src="/images/vatpham/33.png"> <b>'.$vp33[soluong].'/'.$qua[dmt].'</b> '.($vp33[soluong]>=$qua[dmt]?'<font color="green">(Đã đủ)':'<font color="red">(Chưa đủ)</font>').'':'').'
'.($qua[dsh]>0?'<br/><img src="/images/vatpham/34.png"> <b>'.$vp34[soluong].'/'.$qua[dsh].'</b> '.($vp34[soluong]>=$qua[dsh]?'<font color="green">(Đã đủ)':'<font color="red">(Chưa đủ)</font>').'':'').'
'.($qua[kcvt]>0?'<br/><img src="/images/vatpham/35.png"> <b>'.$vp35[soluong].'/'.$qua[kcvt].'</b> '.($vp35[soluong]>=$qua[kcvt]?'<font color="green">(Đã đủ)':'<font color="red">(Chưa đủ)</font>').'':'').'
</td>';
echo '</tr>';
}
echo '</table>';
echo '<center><input type="submit" name="doi" class="nut" value="Đổi"></center>';
echo '</form>';
if ($tong>$kmess) {
echo '<div class="phantrang">'.functions::display_pagination('/sanbay/vqbd/phuthuybongdem/item.php?',$start,$tong,$kmess).'</div>';
}
break;
}
echo '</div>';

require('../../../incfiles/end.php');
?>