<?php
$idx = $_GET['id'];

define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$headmod = 'Cửa hàng';
$textl = 'Cửa hàng';
if ($datauser['naptichluy']>=10000 and $datauser['naptichluy']<20000  ) {
$giamgia = 1.1;
} else if ($datauser['naptichluy']>=20000 and $datauser['naptichluy']<50000  ) {
$giamgia = 1.2;
		} else if ($datauser['naptichluy']>=50000 and $datauser['naptichluy']<70000  ) {
$giamgia = 1.3;
				} else if ($datauser['naptichluy']>=70000 and $datauser['naptichluy']<100000  ) {
$giamgia = 1.4;
					} else if ($datauser['naptichluy']>=100000 and $datauser['naptichluy']<150000  ) {
$giamgia = 1.5;
					} else if ($datauser['naptichluy']>=150000 and $datauser['naptichluy']<200000  ) {
$giamgia = 1.6;
					} else if ($datauser['naptichluy']>=200000 and $datauser['naptichluy']<250000  ) {
$giamgia = 1.7;
			} else if ($datauser['naptichluy']>=250000 and $datauser['naptichluy']<350000  ) {
$giamgia = 1.8;
			} else if ($datauser['naptichluy']>=350000 and $datauser['naptichluy']<500000  ) {
$giamgia = 1.9;
			} else if ($datauser['naptichluy']>=500000  and $datauser['naptichluy']<1000000  ) {
$giamgia = 2;
				} else if ($datauser['naptichluy']>=1000000  ) {
$giamgia = 2.5;
} else if ($datauser['naptichluy']<10000) {
   $giamgia = 1;
} 

require('../incfiles/head.php');
if(!$user_id){
header('location: /dangnhap.html');
exit;
}

switch($act){

case'tang':
echo '<div class="phdr">Tặng item</div>';
if($id){
$xyz=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}
$shop = mysql_fetch_assoc(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$id."'"));
if($shop['hienthi'] == 1){
Header('Location: /');
Exit;
}
$shop['gia'] = round($shop['gia'] / $giamgia);
echo'<div class="omenu"><center> <img src="/images/shop/'.$shop['id'].'.png"> <br>Bạn có muốn tặng item này với giá <b>'.number_format($shop['gia']).' '.($shop['loaitien'] == 'xu' ? 'xu' : 'lượng').' </b>? <br><form method="post"> <input type="number" placeholder="Nhập ID người nhận" name="nguoinhan"></br> <input type="submit" value="Xác Nhận" name="submit"></form></center></div>';
if(isset($_POST['submit'])){
if ($datauser['naptichluy']<10000) {
echo'<div class="omenu">Bạn phải đạt VIP1 mới có thể tặng quà</div>';
require('../incfiles/end.php');
exit;
}
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
	$nguoinhan1=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$nguoinhan."'"));
$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$nguoinhan."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$nguoinhan1['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của người ta đã đầy !!</div>';
} else {
	    			$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='".$shop['id']."' AND `user_id`='".$nguoinhan."'");
$checkdo=mysql_num_rows($query);
if ($checkdo>=1) {
    echo'<div class="omenu">Giao dịch không thành công, Người ta đã sở hữu  <b>'.$shop['tenvatpham'].'</b> !!</div>';
} else 
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
}
if($shop['loaitien'] == 'vnd'){
		$nguoinhan1=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$nguoinhan."'"));
$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$nguoinhan."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$nguoinhan1['tongruong']) {

    echo'<div class="omenu">Giao dịch không thành công, rương của người ta đã đầy !!</div>';
} else {
		    			$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='".$shop['id']."' AND `user_id`='".$nguoinhan."'");
$checkdo=mysql_num_rows($query);
if ($checkdo>=1) {
    echo'<div class="omenu">Giao dịch không thành công, Người ta đã sở hữu  <b>'.$shop['tenvatpham'].'</b> !!</div>';
} else 
if($datauser['luong'] > $shop['gia'] - 1){
mysql_query("UPDATE `users` SET `luong`=`luong`-'".$shop['gia']."' WHERE `id`='".$user_id."'");
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
}

}
require('../incfiles/end.php');
?>
