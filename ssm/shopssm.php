<?php
define('_IN_JOHNCMS', 1);
$textl = 'Đổi sao vinh dự';
$headmod = 'id_user';
require_once ("../incfiles/core.php");
require_once ("../incfiles/head.php");


if ($datauser['kichhoat']==0){
    Header('location: '.$home.'/users/checkpoint.php');
    exit;
}
$checkssm=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_user` WHERE `user_id`='".$user_id."'"));

	$time = time();
$svd=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='265'"));

Echo'<div class="nenvip">Sổ sứ mệnh > Đổi Sao vinh dự </div>';
IF($datauser['rights'] >=9){

echo'<div class="pmenu"><b><font color="red"><a href="?act=add">Thêm Đồ</b></a></font></div>';
}
switch($act){
    
default:
echo'<div class="gd_">
<div class="pmenu"><center><img style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;" src="/images/vatpham/265.png"><br>
Bạn đang có <font color="red">'.$svd['soluong'].' Sao vinh dự </font></center></div><div class="pmenu">';
$e=mysql_query("SELECT * FROM `ssm_shop` WHERE `id`!=0 ORDER BY `id` DESC LIMIT $start, $kmess");
while($s=mysql_fetch_array($e)){
$res=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$s['vatpham']."'"));
$res2=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_shop` WHERE `id`='".$s['id']."'"));

echo'<div class="gd_"><table cellpadding="0" cellspacing="0" width="100%">
<tbody><tr><td width="50">
<img src="/images/shop/'.$res['id'].'.png"></td><td width="auto" valign="top">
<font color="green">'.$res['tenvatpham'].' </font><br>
Cần: <font color="red">'.$res2['gia'].' Sao vinh dự </font><br>
<a href="?act=doi&amp;id='.$res2['id'].'"><input type="submit" name="submit" value="Đổi"></a> 
</td></tr></tbody></table>
</div>';
}

echo'</div></div>';
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `ssm_shop` WHERE `id`!=0"), 0);
IF($total > $kmess){
Echo'<div class="phdr">'.functions::pages('?page=', $start, $total, $kmess).'</div>';
}




break;

case'doi':

$vp=intval($_GET['id']);
$p=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_shop` WHERE `id`='".$vp."'"));
$r=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$p['vatpham']."'"));
$svd=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='265'"));

IF($r['timesudung']){
$r['timesudung'] = $r['timesudung'] + time();
}
$n=mysql_num_rows(mysql_query("SELECT * FROM `ssm_shop` WHERE `id`='".$vp."'"));
IF($n<1){
Header('Location: /');
Exit;
} 
IF(Isset($_POST['mua'])){
$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="pmenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else if ($checkssm['kichhoat']==0){
        echo'<div class="pmenu">Giao dịch không thành công, vui lòng mở SSM VIP !!</div>';

} else {
IF($svd['soluong'] >= $p['gia']){
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$p['gia']."' WHERE   `user_id`='".$user_id."' AND `id_shop`='265'");
mysql_query("INSERT INTO `khodo` SET `user_id`='".$user_id."', `id_shop`='".$r['id']."', `loai`='".$r['loai']."', `id_loai`='".$r['id_loai']."', `tenvatpham` = '".$r['tenvatpham']."', `timesudung`='".$r['timesudung']."'");
Echo'<div class="pmenu"><center><b><font color="red">Bạn đã đổi thành công '.$r['tenvatpham'].'</font></b></center></div>';
require('../incfiles/end.php');Exit;
}Else{
Echo'<div class="pmenu"><center><b><font color="red">Giao dịch thất bại !!<br>Bạn không đủ '.$p['gia'].' Sao vinh dự</font></b></center></div>';
}


require('../incfiles/end.php');Exit;
}
}
echo'<div class="gd_"><form method="post"><div class="pmenu"><center><img style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;" src="/images/shop/'.$r['id'].'.png">
<br>Xác nhận đổi vật phẩm <font color="green">'.$r['tenvatpham'].' </font> bằng <font color="red">'.number_format($p['gia']).' Sao vinh dự </font> không ?
<br>
	<input class="submit" type="submit" name="mua" value="Đổi"> </center>
</div></form></div>';


break;
case'edit':
$vp=intval($_GET['id']);
$p=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_shop` WHERE `id`='".$vp."'"));
$r=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$p['vatpham']."'"));
IF($r['timesudung']){
$r['timesudung'] = $r['timesudung'] + time();
}
$n=mysql_num_rows(mysql_query("SELECT * FROM `ssm_shop` WHERE `id`='".$vp."'"));
IF($n<1){
Header('Location: /');
Exit;
} 
IF(Isset($_POST['edit'])){
	$gia=trim($_POST['gia']);

IF($datauser['rights'] >= 9){
mysql_query("UPDATE `ssm_shop` SET `gia`= '".$gia."' WHERE `id`='".$vp."'");
Echo'<div class="pmenu"><center><b><font color="red">Bạn đã sửa thành công giá '.$gia.'</font></b></center></div>';
require('../incfiles/end.php');Exit;
}Else{
Echo'<div class="pmenu"><center><b><font color="red">Giao dịch thất bại !!<br>Bạn không có quyền này</font></b></center></div>';
}


require('../incfiles/end.php');Exit;
}
echo'<div class="pmenu"><img src="/images/shop/'.$r['id'].'.png">'.$r['tenvatpham'].'</div>';
echo '<form method="post">
<table><tr><input type="number" name="gia" placeholder="Nhập giá muốn đổi..."> </tr><tr><input type="submit" value="Đổi" name="edit" class="nut"></tr></table>
</form>';

break;

case'add':
IF($datauser['rights'] < 9){
Header('Location: /');
}
 
IF(Isset($_POST['add'])){
	$gia=trim($_POST['gia']);
	$idshop=trim($_POST['idshop']);

	if (empty($gia)) {
Echo'<div class="pmenu"><center><b><font color="red">Thêm thất bại !!</font></b></center></div>';
	} else 	if (empty($idshop)) {
Echo'<div class="pmenu"><center><b><font color="red">Thêm thất bại !!</font></b></center></div>';
	} else {
mysql_query("INSERT `ssm_shop` SET `gia`= '".$gia."',`vatpham`= '".$idshop."' ");
Echo'<div class="pmenu"><center><b><font color="red">Bạn đã thêm thành công</font></b></center></div>';
require('../incfiles/end.php');Exit;
}
}



echo'<div class="pmenu"><font color="red"><b>Lưu ý: Xem ID shop ở <a href="/quanli/iteman.php">đây</a></br>
Giá cả hợp lý, item phù hợp!</font></b></div>';
echo '<form method="post">
<table><tr><input type="number" name="idshop" placeholder="Nhập ID Shop..."> </tr></br>
<input type="number" name="gia" placeholder="Nhập giá..."> </tr></br><tr><input type="submit" value="Thêm" name="add" class="nut"></tr></table>
</form>';

break;
case'del':
$vp=intval($_GET['id']);
$p=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_shop` WHERE `id`='".$vp."'"));
$r=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$p['vatpham']."'"));
IF($r['timesudung']){
$r['timesudung'] = $r['timesudung'] + time();
}
$n=mysql_num_rows(mysql_query("SELECT * FROM `ssm_shop` WHERE `id`='".$vp."'"));
IF($n<1){
Header('Location: /');
Exit;
} 
IF(Isset($_POST['del'])){

IF($datauser['rights'] >= 9){
	mysql_query("DELETE FROM `ssm_shop` WHERE `id`='".$vp."'");

Echo'<div class="pmenu"><center><b><font color="red">Bạn đã xóa thành công </font></b></center></div>';
require('../incfiles/end.php');Exit;
}Else{
Echo'<div class="pmenu"><center><b><font color="red">Giao dịch thất bại !!<br>Bạn không có quyền này</font></b></center></div>';
}


require('../incfiles/end.php');Exit;
}
Echo'<div class="pmenu"><center><b><font color="red"><img src="/images/shop/'.$r['id'].'.png"><br>Bạn có chắc chắn xóa '.$r['tenvatpham'].' không??</font></b><form method="post"><input type="submit" name="del" value="Xóa"></center></div>';



}
require('../incfiles/end.php');
?>
