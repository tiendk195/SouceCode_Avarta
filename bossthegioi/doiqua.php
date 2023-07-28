<?php
define('_IN_JOHNCMS', 1);
$textl = 'Đổi quà đặc biệt';
require('../incfiles/core.php');
require('../incfiles/head.php');
if (!$user_id) {
echo '<div class="omenu"><p><b>Lỗi!</b><br>Trang chỉ dành cho thành viên!</p></div>';
require('../incfiles/end.php');
exit;
}
if ($datauser['kichhoat']==0) {
echo '<div class="omenu"><p><b>Lỗi!</b><br>Trang chỉ dành cho thành viên đã kích hoạt!</p></div>';
require('../incfiles/end.php');
exit;
}


	$time = time();
	$hhbt=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='89'"));

Echo'<div class="phdr">Shop quà Boss Thế giới </div>';
echo'<div class="omenu"><font color="red"><b>Bạn đang có '.number_format($hhbt['soluong']).' Huy hiệu bóng tối</b></font></div>';
?>
<!--Edit by Lethinh-->
<?php
IF($datauser['rights'] >=9){

echo'<div class="omenu"><b><font color="red"><a href="?act=add">Thêm Đồ</b></a></font></div>';
}
IF($datauser['kichhoat'] == 0){
Echo'<div class="omenu"><center><b><font color="red">Vui lòng kích hoạt tài khoản</font></b></center></div>';
}Else IF($hhbt['soluong'] < 0){
Echo'<div class="omenu"><center><b><font color="red">Bạn cần ít nhất 1 huy hiệu bóng tối để vào đây</font></b></center></div>';
}Else{
switch($act){
case'mua':
$vp=intval($_GET['id']);
$p=mysql_fetch_array(mysql_query("SELECT * FROM `shopbosstg` WHERE `id`='".$vp."'"));
$r=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$p['vatpham']."'"));
IF($r['timesudung']){
$r['timesudung'] = $r['timesudung'] + time();
}
$n=mysql_num_rows(mysql_query("SELECT * FROM `shopbosstg` WHERE `id`='".$vp."'"));
IF($n<1){
Header('Location: /');
Exit;
} 
IF(Isset($_POST['mua'])){
$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else 
IF($hhbt['soluong'] >= $p['gia']){
	                              			   mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`- '".$p['gia']."' WHERE `user_id`='".$user_id."' AND `id_shop` = '89'");

mysql_query("INSERT INTO `khodo` SET `user_id`='".$user_id."', `id_shop`='".$r['id']."', `loai`='".$r['loai']."', `id_loai`='".$r['id_loai']."', `tenvatpham` = '".$r['tenvatpham']."', `timesudung`='".$r['timesudung']."'");
Echo'<div class="omenu"><center><b><font color="red">Bạn đã đổi thành công '.$r['tenvatpham'].'</font></b></center></div>';
require('../incfiles/end.php');
Exit;
}Else{
Echo'<div class="omenu"><center><b><font color="red">Giao dịch thất bại !!<br>Bạn không đủ '.$p['gia'].' huy hiệu bóng tối <img src="/images/vatpham/89.png"></font></b></center></div>';
}


require('../incfiles/end.php');
Exit;
}
Echo'<div class="omenu"><center><b><font color="red"><img src="/images/shop/'.$r['id'].'.png"><br>Bạn có chắc chắn đổi '.$r['tenvatpham'].' với '.number_format($p['gia']).' Huy hiệu bóng tối <img src="/images/vatpham/89.png"> không??</font></b><form method="post"><input type="submit" name="mua" value="Đổi"></center></div>';
break;
default:
$e=mysql_query("SELECT * FROM
`shopbosstg` WHERE `id`!=0 ORDER BY `id` DESC LIMIT $start, $kmess");
while($s=mysql_fetch_array($e)){
$res=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$s['vatpham']."'"));
$res2=mysql_fetch_array(mysql_query("SELECT * FROM `shopbosstg` WHERE `id`='".$s['id']."'"));
echo'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><img src="/images/shop/'.$res['id'].'.png">
</td>
<td class="right-info">
<b><font color="blue">'.$res['tenvatpham'].'</font></b><br>
Cần: <font color="red">'.number_format($res2['gia']).'</font> Huy hiệu bóng tối<br>
<a href="?act=mua&amp;id='.$s['id'].'"><input type="submit" name="submit" value="Đổi"></a>';
if ($datauser['rights'] >=9) {
	echo' <a href="?act=edit&amp;id='.$s['id'].'"><input type="submit" name="submit" value="Sửa"></a>';
echo' <a href="?act=del&amp;id='.$s['id'].'"><input type="submit" name="submit" value="Xóa"></a>';
}
echo'</td>
</tr></tbody></table>';


}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `shopbosstg` WHERE `id`!=0"), 0);
IF($total > $kmess){
Echo'<div class="phdr">'.functions::pages('?act=danhsach&loai='.$loai.'&page=', $start, $total, $kmess).'</div>';
}
break;
case'edit':
$vp=intval($_GET['id']);
$p=mysql_fetch_array(mysql_query("SELECT * FROM `shopbosstg` WHERE `id`='".$vp."'"));
$r=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$p['vatpham']."'"));
IF($r['timesudung']){
$r['timesudung'] = $r['timesudung'] + time();
}
$n=mysql_num_rows(mysql_query("SELECT * FROM `shopbosstg` WHERE `id`='".$vp."'"));
IF($n<1){
Header('Location: /');
Exit;
} 
IF(Isset($_POST['edit'])){
	$gia=trim($_POST['gia']);

IF($datauser['rights'] >= 9){
mysql_query("UPDATE `shopbosstg` SET `gia`= '".$gia."' WHERE `id`='".$vp."'");
Echo'<div class="omenu"><center><b><font color="red">Bạn đã sửa thành công giá '.$gia.'</font></b></center></div>';
require('../incfiles/end.php');
Exit;
}Else{
Echo'<div class="omenu"><center><b><font color="red">Giao dịch thất bại !!<br>Bạn không có quyền này</font></b></center></div>';
}


require('../incfiles/end.php');
Exit;
}
echo'<div class="omenu"><img src="/images/shop/'.$r['id'].'.png">'.$r['tenvatpham'].'</div>';
echo '<form method="post">
<table><tr><input type="number" name="gia" placeholder="Nhập giá muốn đổi..."> </tr><tr><input type="submit" value="Đổi" name="edit" class="nut"></tr></table>
</form>';
/*
break;
case'add':
IF($datauser['rights'] < 9){
Header('Location: /');
}
 
IF(Isset($_POST['add'])){
	$gia=trim($_POST['gia']);
	$idshop=trim($_POST['idshop']);

	if (empty($gia)) {
Echo'<div class="omenu"><center><b><font color="red">Thêm thất bại !!</font></b></center></div>';
	} else 	if (empty($idshop)) {
Echo'<div class="omenu"><center><b><font color="red">Thêm thất bại !!</font></b></center></div>';
	} else {
mysql_query("INSERT `shopbosstg` SET `gia`= '".$gia."',`vatpham`= '".$idshop."' ");
Echo'<div class="omenu"><center><b><font color="red">Bạn đã thêm thành công</font></b></center></div>';
require('../../incfiles/end.php');Exit;
}




echo'<div class="omenu"><font color="red"><b>Lưu ý: Xem ID shop ở <a href="/quanli/iteman.php">đây</a></br>
Giá cả hợp lý, item phù hợp!</font></b></div>';
echo '<form method="post">
<table><tr><input type="number" name="idshop" placeholder="Nhập ID Shop..."> </tr></br>
<input type="number" name="gia" placeholder="Nhập giá..."> </tr></br><tr><input type="submit" value="Thêm" name="add" class="nut"></tr></table>
</form>';
*/
break;

case'add':
IF($datauser['rights'] < 9){
Header('Location: /');
}
 
IF(Isset($_POST['add'])){
	$gia=trim($_POST['gia']);
	$idshop=trim($_POST['idshop']);

	if (empty($gia)) {
Echo'<div class="omenu"><center><b><font color="red">Thêm thất bại !!</font></b></center></div>';
	} else 	if (empty($idshop)) {
Echo'<div class="omenu"><center><b><font color="red">Thêm thất bại !!</font></b></center></div>';
	} else {
mysql_query("INSERT `shopbosstg` SET `gia`= '".$gia."',`vatpham`= '".$idshop."' ");
Echo'<div class="omenu"><center><b><font color="red">Bạn đã thêm thành công</font></b></center></div>';
require('../incfiles/end.php');
Exit;
}
}



echo'<div class="omenu"><font color="red"><b>Lưu ý: Xem ID shop ở <a href="/quanli/iteman.php">đây</a></br>
Giá cả hợp lý, item phù hợp!</font></b></div>';
echo '<form method="post">
<table><tr><input type="number" name="idshop" placeholder="Nhập ID Shop..."> </tr></br>
<input type="number" name="gia" placeholder="Nhập giá..."> </tr></br><tr><input type="submit" value="Thêm" name="add" class="nut"></tr></table>
</form>';

break;
case'del':
$vp=intval($_GET['id']);
$p=mysql_fetch_array(mysql_query("SELECT * FROM `shopbosstg` WHERE `id`='".$vp."'"));
$r=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$p['vatpham']."'"));
IF($r['timesudung']){
$r['timesudung'] = $r['timesudung'] + time();
}
$n=mysql_num_rows(mysql_query("SELECT * FROM `shopbosstg` WHERE `id`='".$vp."'"));
IF($n<1){
Header('Location: /');
Exit;
} 
IF(Isset($_POST['del'])){

IF($datauser['rights'] >= 9){
	mysql_query("DELETE FROM `shopbosstg` WHERE `id`='".$vp."'");

Echo'<div class="omenu"><center><b><font color="red">Bạn đã xóa thành công </font></b></center></div>';
require('../incfiles/end.php');
Exit;
}Else{
Echo'<div class="omenu"><center><b><font color="red">Giao dịch thất bại !!<br>Bạn không có quyền này</font></b></center></div>';
}


require('../incfiles/end.php');
Exit;
}
Echo'<div class="omenu"><center><b><font color="red"><img src="/images/shop/'.$r['id'].'.png"><br>Bạn có chắc chắn xóa '.$r['tenvatpham'].' không??</font></b><form method="post"><input type="submit" name="del" value="Xóa"></center></div>';


}
}
require('../incfiles/end.php');
?>