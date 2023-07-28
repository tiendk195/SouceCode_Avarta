<?PHP
Define('_IN_JOHNCMS', 1);
Require('../incfiles/core.php');
$headmod = 'Shop VIP';
$textl = 'Shop VIP';
Require('../incfiles/head.php');
IF(!$user_id){
Header("Location: /");
Exit;
}
	$time = time();

Echo'<div class="phdr">Shop VIP</div>';
echo'<div class="omenu"><b><font color="red">Bạn đang có '.number_format($datauser['diemnapthe']).' điểm nạp thẻ(VNĐ)</b></font></div>';

IF($datauser['rights'] >=9){

echo'<div class="omenu"><b><font color="red"><a href="?act=add">Thêm Đồ VIP</b></a></font></div>';
}
IF($datauser['naptichluy'] < 10000){
Echo'<div class="omenu"><center><b><font color="red">BẠN KHÔNG PHẢI LÀ VIP</font></b></center></div>';
}Else IF($datauser['kichhoat'] ==0){
Echo'<div class="omenu"><center><b><font color="red">Vui lòng kích hoạt tài khoản</font></b></center></div>';
}Else
 {
switch($act){
case'mua':
$vp=intval($_GET['id']);
$p=mysql_fetch_array(mysql_query("SELECT * FROM `shopvip` WHERE `id`='".$vp."'"));
$r=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$p['vatpham']."'"));
IF($r['timesudung']){
$r['timesudung'] = $r['timesudung'] + time();
}
$n=mysql_num_rows(mysql_query("SELECT * FROM `shopvip` WHERE `id`='".$vp."'"));
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
	        			$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='".$r['id']."' AND `user_id`='".$user_id."'");
$checkdo=mysql_num_rows($query);
if ($checkdo>=1) {
    echo'<div class="omenu">Giao dịch không thành công, Bạn đã sở hữu  <b>'.$r['tenvatpham'].'</b> !!</div>';
} else 
IF($datauser['diemnapthe'] >= $p['gia']){
mysql_query("UPDATE `users` SET `diemnapthe`=`diemnapthe`-'".$p['gia']."' WHERE `id`='".$user_id."'");
mysql_query("INSERT INTO `khodo` SET `user_id`='".$user_id."', `id_shop`='".$r['id']."', `loai`='".$r['loai']."', `id_loai`='".$r['id_loai']."', `tenvatpham` = '".$r['tenvatpham']."', `timesudung`='".$r['timesudung']."'");
Echo'<div class="omenu"><center><b><font color="red">Bạn đã mua thành công '.$r['tenvatpham'].'</font></b></center></div>';
Require('../incfiles/end.php');
Exit;
}Else{
Echo'<div class="omenu"><center><b><font color="red">Giao dịch thất bại !!<br>Bạn không đủ '.$p['gia'].' Điểm Nạp Thẻ</font></b></center></div>';
}


Require('../incfiles/end.php');
Exit;
}
Echo'<div class="omenu"><center><b><font color="red"><img src="/images/shop/'.$r['id'].'.png"><br>Bạn có chắc chắn mua '.$r['tenvatpham'].' với '.number_format($p['gia']).' Điểm nạp thẻ không??</font></b><form method="post"><input type="submit" name="mua" value="MUA"></center></div>';
break;
default:
$e=mysql_query("SELECT * FROM
`shopvip` WHERE `id`!=0 ORDER BY `id` DESC LIMIT $start, $kmess");
while($s=mysql_fetch_array($e)){
$res=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$s['vatpham']."'"));
$res2=mysql_fetch_array(mysql_query("SELECT * FROM `shopvip` WHERE `id`='".$s['id']."'"));
 echo'  <table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info"><tbody><tr><td class="left-info"><img src="/images/shop/'.$res['id'].'.png"></td><td class="right-info"><span>
<font color="ff007f">Vật phẩm:</font>   '.$res[tenvatpham].'  </font> ('.($res['timesudung'] ? thoigiantinh(floor($res['timesudung'])).'' : 'Vĩnh viễn').')</br>
          <font color="ff007f">Giá bán:</font> '.number_format($res2['gia']).' VNĐ </font><br>
<a href="?act=mua&id='.$s[id].'"><input type="submit" name="submit" value="Mua"></a> 
          </span>';
              if ($datauser['rights'] >= 9) {
    echo' <a href="?act=dell&id='.$s['id'].'"><input type="submit" name="submit" value="Xóa"></a>';
        echo' <a href="?act=edit&id='.$s['id'].'"><input type="submit" name="submit" value="Sửa"></a>';
    } 
   

          echo'</td></tr></tbody></table>';



}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `shopvip` WHERE `id`!=0"), 0);
IF($total > $kmess){
Echo'<div class="phdr">'.functions::pages('?act=danhsach&loai='.$loai.'&page=', $start, $total, $kmess).'</div>';
}
break;
case'edit':
$vp=intval($_GET['id']);
$p=mysql_fetch_array(mysql_query("SELECT * FROM `shopvip` WHERE `id`='".$vp."'"));
$r=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$p['vatpham']."'"));
IF($r['timesudung']){
$r['timesudung'] = $r['timesudung'] + time();
}
$n=mysql_num_rows(mysql_query("SELECT * FROM `shopvip` WHERE `id`='".$vp."'"));
IF($n<1){
Header('Location: /');
Exit;
} 
IF(Isset($_POST['edit'])){
	$gia=trim($_POST['gia']);

IF($datauser['rights'] >= 9){
mysql_query("UPDATE `shopvip` SET `gia`= '".$gia."' WHERE `id`='".$vp."'");
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
mysql_query("INSERT `shopvip` SET `gia`= '".$gia."',`vatpham`= '".$idshop."' ");
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
mysql_query("INSERT `shopvip` SET `gia`= '".$gia."',`vatpham`= '".$idshop."' ");
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
$p=mysql_fetch_array(mysql_query("SELECT * FROM `shopvip` WHERE `id`='".$vp."'"));
$r=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$p['vatpham']."'"));
IF($r['timesudung']){
$r['timesudung'] = $r['timesudung'] + time();
}
$n=mysql_num_rows(mysql_query("SELECT * FROM `shopvip` WHERE `id`='".$vp."'"));
IF($n<1){
Header('Location: /');
Exit;
} 
IF(Isset($_POST['del'])){

IF($datauser['rights'] >= 9){
	mysql_query("DELETE FROM `shopvip` WHERE `id`='".$vp."'");

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
}
Require('../incfiles/end.php');
?>