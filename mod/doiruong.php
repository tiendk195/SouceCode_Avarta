<?PHP
Define('_IN_JOHNCMS', 1);
Require('../incfiles/core.php');
$headmod = 'Shop Thần Tài';
$textl = 'Shop Thần Tài';
Require('../incfiles/head.php');
IF(!$user_id){
Header("Location: /");
Exit;
}
	$time = time();

Echo'<div class="phdr">Shop Thần Tài</div>';
IF($datauser['rights'] >=9){

echo'<div class="omenu"><b><font color="red"><a href="?act=add">Thêm Đồ Thần Tài</b></a></font></div>';
}

switch($act){
case'mua':
$vp=intval($_GET['id']);
$p=mysql_fetch_array(mysql_query("SELECT * FROM `shopthantai` WHERE `id`='".$vp."'"));
$r=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$p['vatpham']."'"));
IF($r['timesudung']){
$r['timesudung'] = $r['timesudung'] + time();
}
$n=mysql_num_rows(mysql_query("SELECT * FROM `shopthantai` WHERE `id`='".$vp."'"));
IF($n<1){
Header('Location: /');
Exit;
} 
IF(Isset($_POST['mua'])){
IF($datauser['ruongthantai'] >= $p['gia']){
mysql_query("UPDATE `users` SET `ruongthantai`=`ruongthantai`-'".$p['gia']."' WHERE `id`='".$user_id."'");
mysql_query("INSERT INTO `khodo` SET `user_id`='".$user_id."', `id_shop`='".$r['id']."', `loai`='".$r['loai']."', `id_loai`='".$r['id_loai']."', `tenvatpham` = '".$r['tenvatpham']."', `timesudung`='".$r['timesudung']."'");
Echo'<div class="omenu"><center><b><font color="red">Bạn đã đổi thành công '.$r['tenvatpham'].'</font></b></center></div>';
Require('../incfiles/end.php');
Exit;
}Else{
Echo'<div class="omenu"><center><b><font color="red">Giao dịch thất bại !!<br>Bạn không đủ '.$p['gia'].' Rương thần tài</font></b></center></div>';
}


Require('../incfiles/end.php');
Exit;
}
Echo'<div class="omenu"><center><b><font color="red"><img src="/images/shop/'.$r['id'].'.png"><br>Bạn có chắc chắn đổi '.$r['tenvatpham'].' với '.number_format($p['gia']).' rương thần tài không??</font></b><form method="post"><input type="submit" name="mua" value="Đổi"></center></div>';
break;
default:
$e=mysql_query("SELECT * FROM
`shopthantai` WHERE `id`!=0 ORDER BY `id` DESC LIMIT $start, $kmess");
while($s=mysql_fetch_array($e)){
$res=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$s['vatpham']."'"));
$res2=mysql_fetch_array(mysql_query("SELECT * FROM `shopthantai` WHERE `id`='".$s['id']."'"));
echo'<center><div class="omenu"><a href="?act=mua&id='.$s['id'].'">'.number_format($res2['gia']).' <img src="https://i.imgur.com/gh0mMAp.png"> = 1 <img src="/images/shop/'.$res['id'].'.png"></a></br>';
if ($datauser['rights'] >=9) {
	echo'<a href="?act=edit&id='.$s['id'].'">
<button> Sửa </button></a>'; 
	echo'<a href="?act=del&id='.$s['id'].'">
<button> Xóa </button></a>'; 
}
echo'</div></center>';

}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `shopthantai` WHERE `id`!=0"), 0);
IF($total > $kmess){
Echo'<div class="phdr">'.functions::pages('?act=danhsach&loai='.$loai.'&page=', $start, $total, $kmess).'</div>';
}
break;
case'edit':
$vp=intval($_GET['id']);
$p=mysql_fetch_array(mysql_query("SELECT * FROM `shopthantai` WHERE `id`='".$vp."'"));
$r=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$p['vatpham']."'"));
IF($r['timesudung']){
$r['timesudung'] = $r['timesudung'] + time();
}
$n=mysql_num_rows(mysql_query("SELECT * FROM `shopthantai` WHERE `id`='".$vp."'"));
IF($n<1){
Header('Location: /');
Exit;
} 
IF(Isset($_POST['edit'])){
	$gia=trim($_POST['gia']);

IF($datauser['rights'] >= 9){
mysql_query("UPDATE `shopthantai` SET `gia`= '".$gia."' WHERE `id`='".$vp."'");
Echo'<div class="omenu"><center><b><font color="red">Bạn đã sửa thành công giá '.$gia.'</font></b></center></div>';
Require('../incfiles/end.php');
Exit;
}Else{
Echo'<div class="omenu"><center><b><font color="red">Giao dịch thất bại !!<br>Bạn không có quyền này</font></b></center></div>';
}


Require('../incfiles/end.php');
Exit;
}
echo'<div class="omenu"><img src="/images/shop/'.$r['id'].'.png">'.$r['tenvatpham'].'</div>';
echo '<form method="post">
<table><tr><input type="number" name="gia" placeholder="Nhập giá muốn sửa..."> </tr><tr><input type="submit" value="Sửa" name="edit" class="nut"></tr></table>
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
mysql_query("INSERT `shopthantai` SET `gia`= '".$gia."',`vatpham`= '".$idshop."' ");
Echo'<div class="omenu"><center><b><font color="red">Bạn đã thêm thành công</font></b></center></div>';
Require('../incfiles/end.php');
Exit;
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
mysql_query("INSERT `shopthantai` SET `gia`= '".$gia."',`vatpham`= '".$idshop."' ");
Echo'<div class="omenu"><center><b><font color="red">Bạn đã thêm thành công</font></b></center></div>';
Require('../incfiles/end.php');
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
$p=mysql_fetch_array(mysql_query("SELECT * FROM `shopthantai` WHERE `id`='".$vp."'"));
$r=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$p['vatpham']."'"));
IF($r['timesudung']){
$r['timesudung'] = $r['timesudung'] + time();
}
$n=mysql_num_rows(mysql_query("SELECT * FROM `shopthantai` WHERE `id`='".$vp."'"));
IF($n<1){
Header('Location: /');
Exit;
} 
IF(Isset($_POST['del'])){

IF($datauser['rights'] >= 9){
	mysql_query("DELETE FROM `shopthantai` WHERE `id`='".$vp."'");

Echo'<div class="omenu"><center><b><font color="red">Bạn đã xóa thành công </font></b></center></div>';
Require('../incfiles/end.php');
Exit;
}Else{
Echo'<div class="omenu"><center><b><font color="red">Giao dịch thất bại !!<br>Bạn không có quyền này</font></b></center></div>';
}


Require('../incfiles/end.php');
Exit;
}
Echo'<div class="omenu"><center><b><font color="red"><img src="/images/shop/'.$r['id'].'.png"><br>Bạn có chắc chắn xóa '.$r['tenvatpham'].' không??</font></b><form method="post"><input type="submit" name="del" value="Xóa"></center></div>';



}
Require('../incfiles/end.php');
?>