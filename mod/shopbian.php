<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl = 'Shop bí ẩn';
if (!$user_id )
{
	header('Location: /login.php');
	exit;
}
require('../incfiles/head.php');

	//header('Location: /');


echo'<div class="phdr">Shop Bí Ẩn </div>';
switch($act){
case'mua':
$vp=intval($_GET['id']);
$p=mysql_fetch_array(mysql_query("SELECT * FROM `shopbian_user` WHERE `id`='".$vp."' AND `user_id`='".$user_id."'"));
$r=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$p['idshop']."'"));

$n=mysql_num_rows(mysql_query("SELECT * FROM `shopbian_user` WHERE `id`='".$vp."' AND `user_id`='".$user_id."'"));
IF($n<1){
Header('Location: /');
Exit;
} 
IF(Isset($_POST['mua'])){
		$giakm=ceil($p['gia']*(100-$datauser['giamgiabian'])/100);

$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else 
IF($datauser['luong'] >=$giakm ){
mysql_query("UPDATE `users` SET `luong`=`luong`-'".$giakm."' WHERE `id`='".$user_id."'");
mysql_query("INSERT INTO `khodo` SET `user_id`='".$user_id."', `id_shop`='".$r['id']."', `loai`='".$r['loai']."', `id_loai`='".$r['id_loai']."', `tenvatpham` = '".$r['tenvatpham']."', `timesudung`='0'");
Echo'<div class="omenu"><center><b><font color="red">Bạn đã mua thành công '.$r['tenvatpham'].'. <a href="shopbian.html">Quay lại</a></font></b></center></div>';
mysql_query("DELETE FROM `shopbian_user` WHERE `id`='".$vp."'");

require('../incfiles/end.php');Exit;
}Else{
Echo'<div class="omenu"><center><b><font color="red">Giao dịch thất bại !!<br>Bạn không đủ '.$giakm.' lượng</font></b></center></div>';
}


require('../incfiles/end.php');Exit;
}
		$giakm=ceil($p['gia']*(100-$datauser['giamgiabian'])/100);

Echo'<div class="omenu"><center><b><font color="red"><img src="/images/shop/'.$r['id'].'.png"><br>Bạn có chắc chắn mua '.$r['tenvatpham'].' với '.$giakm.' lượng không??</font></b><form method="post"><input type="submit" name="mua" value="Mua"></center></div>';
break;
case'khoitao':
if ($datauser['shopbian']==1) {
        echo'<div class="omenu"><b><font color="red">Lỗi!!</b></font> Bạn đã mở shop bí ẩn rồi !!</div>';
    } else  {
		$randmayman=rand(10,70);
				$randgia=rand(2000,3000);
				$randgia2=rand(2000,3000);
				$randgia3=rand(2000,3000);
				$randgia4=rand(2000,3000);
				$randgia5=rand(2000,3000);
				$randgia6=rand(2000,3000);
				$randgia7=rand(2000,3000);

	echo'<div class="omenu">Khởi tạo thành công - <a href="shopbian.html">Tải lại trang</a></div>';
		mysql_query("UPDATE `users` SET `shopbian`='1',`giamgiabian`='".$randmayman."' WHERE `id`='".$user_id."'");

		
		$all=mysql_fetch_array(mysql_query("SELECT max(id) FROM `shopdo` WHERE `hienthi`='1' "));  
$rando=rand(2000,$all['max(id)']);
$rando2=rand(2000,$all['max(id)']);
$rando3=rand(2000,$all['max(id)']);
$rando4=rand(2000,$all['max(id)']);
$rando5=rand(2000,$all['max(id)']);
$rando6=rand(2000,$all['max(id)']);
$rando7=rand(2000,$all['max(id)']);
$checkrand=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando."' "));

$cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando."' "));
$checkrand2=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando2."' "));

$cross2=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando2."' "));$checkrand3=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando2."' "));

$cross3=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando3."' "));$checkrand4=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando3."' "));

$cross4=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando4."' "));
$checkrand5=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando5."' "));

$cross5=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando5."' "));
$checkrand6=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando6."' "));

$cross6=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando6."' "));
$checkrand7=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando7."' "));

$cross7=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando7."' "));
if ($checkrand>=1){
	
			mysql_query("INSERT INTO `shopbian_user` SET `user_id`='".$user_id."', `idshop`='".$cross['id']."',`gia` ='".$randgia."'");

} 
if ($checkrand2>=1){
	
			mysql_query("INSERT INTO `shopbian_user` SET `user_id`='".$user_id."', `idshop`='".$cross2['id']."',`gia` ='".$randgia2."'");

} 
if ($checkrand3>=1){
	
			mysql_query("INSERT INTO `shopbian_user` SET `user_id`='".$user_id."', `idshop`='".$cross3['id']."',`gia` ='".$randgia3."'");
} if ($checkrand4>=1){
	
			mysql_query("INSERT INTO `shopbian_user` SET `user_id`='".$user_id."', `idshop`='".$cross4['id']."',`gia` ='".$randgia4."'");
}
 if ($checkrand5>=1){
	
			mysql_query("INSERT INTO `shopbian_user` SET `user_id`='".$user_id."', `idshop`='".$cross5['id']."',`gia` ='".$randgia5."'");
}
 if ($checkrand6>=1){
	
			mysql_query("INSERT INTO `shopbian_user` SET `user_id`='".$user_id."', `idshop`='".$cross6['id']."',`gia` ='".$randgia6."'");
}
 if ($checkrand7>=1){
	
			mysql_query("INSERT INTO `shopbian_user` SET `user_id`='".$user_id."', `idshop`='".$cross7['id']."',`gia` ='".$randgia7."'");
}


    }
	break;

default:
if ($datauser['shopbian']==0){

	
	echo'<div class="omenu">Bạn chưa khởi tạo Shop Bí Ẩn - <a href="?act=khoitao">Khởi tạo ngay</a></br>
Khi khởi tạo, bạn sẽ có cơ hội được mua các món đồ chưa từng xuất hiện trong shop và kèm theo giảm giá 10% -> 70%</div>';
} else {
echo'<div class="omenu">Giảm giá của bạn là<font color="red"> '.$datauser['giamgiabian'].'%</font></div>';
$e=mysql_query("SELECT * FROM
`shopbian_user` WHERE `idshop`!=0 AND `user_id` ='".$user_id."' ORDER BY `id` DESC LIMIT $start, $kmess");
while($s=mysql_fetch_array($e)){
		$giakm=ceil($s['gia']*(100-$datauser['giamgiabian'])/100);

$res=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$s['idshop']."'"));
$res2=mysql_fetch_array(mysql_query("SELECT * FROM `shopbian_user` WHERE `idshop`='".$s['id']."'"));
echo'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info"><tbody><tr><td class="left-info"><img src="/images/shop/'.$res['id'].'.png"></td><td class="right-info"><span>
<font color="ff007f">Vật phẩm:</font>
         '.$res['tenvatpham'].'  <br>
          <font color="ff007f">Giá:</font><s> '.$s['gia'].' lượng</s></font><br>
		            <font color="ff007f">Giá khuyến mãi:</font> '.$giakm.' lượng</font><br>

<a href="?act=mua&id='.$s['id'].'"><input type="submit" name="submit" value="Mua"></a>';

echo'
          </span></td></tr></tbody></table>';

}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `shopbian_user` WHERE `idshop`!=0 AND `user_id`='".$user_id."'"), 0);
IF($total > $kmess){
Echo'<div class="phdr">'.functions::pages('?page=', $start, $total, $kmess).'</div>';
}
}
}


	 

require('../incfiles/end.php');
?>