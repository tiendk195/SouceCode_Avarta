<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#hoiphuc').click(function(){
		var url = "hoiphuc-load.php";
		var data = {"hoiphuc": ""};
		$('#load').load(url, data);
		return false;
	});
});
</script>
<?php
$wboss = mysql_fetch_array(mysql_query("SELECT * FROM `wboss` WHERE `id` = '11'"));
/*
if ($datauser['rights']<9) {
    echo'<div class="phdr">Bảo trì</div>';
    require_once ("../incfiles/end.php");
exit;
}
*/
if(isset($_POST['danh'])) {
    
  
    
    $rand=rand(1,10);
    
$hpboss = $datauser['sucmanh'];
if ($datauser[sucmanh]>=50000) {

$ihp = rand($datauser['sucmanh']/5,$datauser['sucmanh']/5+1000);$rand = rand(1,8);

} else if ($datauser[sucmanh]<50000) {
$ihp = rand($datauser['sucmanh']/10,$datauser['sucmanh']/10+100);$rand = rand(1,6);
}
$xu = rand(1,1111111);
$da = rand(1,100);
$wait=$datauser[timedanhboss]-time();
$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else 
if ($datauser[timedanhboss]>time()) {
		    echo"<script>
if(confirm('Bạn đánh quá nhanh! Vui lòng đợi {$wait}s để tiếp tục?')){
}else{
		window.location.href = '';
		}
	</script>";
} else
if($datauser['hp'] <= 0 ) {
echo'<div class="omenu"><center><b>Bạn đã hết HP </br><input type="submit" name="hoiphuc" id ="hoiphuc" value="Hồi phục bằng 50.000 xu" /></div></b></center>';
} else if($wboss['hp'] <= 0){
echo'<div class="omenu"><center><b>Các Ngươi Đợi Đấy,nhất định ta sẽ trở lại</div></b></center>';
} else 
if($wboss['hp'] <= $datauser['sucmanh']){
	if ($rand==1){
			$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='3737' AND `user_id`='".$user_id."'");
			$check=mysql_num_rows($query);
				$cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='3737'"));


if ($check<1) {
	echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Bạn nhận được '.$cross['tenvatpham'].' <img src="/images/shop/'.$cross['id'].'.png"></b></font></center>';
mysql_query("INSERT INTO `khodo` SET `user_id`='".$user_id."', `id_shop`='".$cross['id']."', `loai`='".$cross['loai']."', `id_loai`='".$cross['id_loai']."', `tenvatpham` = '".$cross['tenvatpham']."', `timesudung`='0'");
$tb='Bạn nhận được '.$cross['tenvatpham'].' <img src="/images/shop/'.$cross['id'].'.png"> từ Boss Super Broly ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$tb',
`ok`='1',
`time`='".time()."'
");
}

	}
	if ($rand==2){
			$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='3738' AND `user_id`='".$user_id."'");
			$check=mysql_num_rows($query);
				$cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='3738'"));


if ($check<1) {
	echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Bạn nhận được '.$cross['tenvatpham'].' <img src="/images/shop/'.$cross['id'].'.png"></b></font></center>';
mysql_query("INSERT INTO `khodo` SET `user_id`='".$user_id."', `id_shop`='".$cross['id']."', `loai`='".$cross['loai']."', `id_loai`='".$cross['id_loai']."', `tenvatpham` = '".$cross['tenvatpham']."', `timesudung`='0'");
$tb='Bạn nhận được '.$cross['tenvatpham'].' <img src="/images/shop/'.$cross['id'].'.png"> từ Boss Super Broly ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$tb',
`ok`='1',
`time`='".time()."'
");
}

	}
	if ($rand==3){
			$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='3739' AND `user_id`='".$user_id."'");
			$check=mysql_num_rows($query);
				$cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='3739'"));


if ($check<1) {
	echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Bạn nhận được '.$cross['tenvatpham'].' <img src="/images/shop/'.$cross['id'].'.png"></b></font></center>';
mysql_query("INSERT INTO `khodo` SET `user_id`='".$user_id."', `id_shop`='".$cross['id']."', `loai`='".$cross['loai']."', `id_loai`='".$cross['id_loai']."', `tenvatpham` = '".$cross['tenvatpham']."', `timesudung`='0'");
$tb='Bạn nhận được '.$cross['tenvatpham'].' <img src="/images/shop/'.$cross['id'].'.png"> từ Boss Super Broly ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$tb',
`ok`='1',
`time`='".time()."'
");
}

	}
	if ($rand==4){
			$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='3740' AND `user_id`='".$user_id."'");
			$check=mysql_num_rows($query);
				$cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='3740'"));


if ($check<1) {
	echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Bạn nhận được '.$cross['tenvatpham'].' <img src="/images/shop/'.$cross['id'].'.png"></b></font></center>';
mysql_query("INSERT INTO `khodo` SET `user_id`='".$user_id."', `id_shop`='".$cross['id']."', `loai`='".$cross['loai']."', `id_loai`='".$cross['id_loai']."', `tenvatpham` = '".$cross['tenvatpham']."', `timesudung`='0'");
$tb='Bạn nhận được '.$cross['tenvatpham'].' <img src="/images/shop/'.$cross['id'].'.png"> từ Boss Super Broly ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$tb',
`ok`='1',
`time`='".time()."'
");
}

	}
	
	
	
/*
	$all=mysql_fetch_array(mysql_query("SELECT max(id) FROM `shopdo` WHERE `hienthi`='1' "));  
$rando=rand($all['min(id)'],$all['max(id)']);
$checkrand=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando."' "));
$cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando."' "));
if ($checkrand>=1){
echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Bạn nhận được '.$cross['tenvatpham'].' <img src="/images/shop/'.$cross['id'].'.png"></b></font></center>';
mysql_query("INSERT INTO `khodo` SET `user_id`='".$user_id."', `id_shop`='".$cross['id']."', `loai`='".$cross['loai']."', `id_loai`='".$cross['id_loai']."', `tenvatpham` = '".$cross['tenvatpham']."', `timesudung`='0'");
$tb='Bạn nhận được '.$cross['tenvatpham'].' <img src="/images/shop/'.$cross['id'].'.png"> từ Boss Super Broly ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$tb',
`ok`='1',
`time`='".time()."'
");
}	
*/
echo'<div class="omenu"><center><b><font color="red">Bạn Giết Được Super Broly ! Nhận Được '.$da.'  đá nâng cấp và '.$xu.' xu</b></font></center></div>';
                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'$da' WHERE `user_id`='".$user_id."' AND `id_shop` = '60'");
$tb='Bạn nhận được 1.000.000 EXP, '.$da.' Đá nâng cấp, '.$xu.' Xu từ Boss Super Broly ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$tb',
`ok`='1',
`time`='".time()."'
");
mysql_query("UPDATE `users` SET `hp`=`hp`-'{$ihp}',`xu`=`xu`+'$xu',`wboss`=`wboss`+1 ,`exp`=`exp`+'1000000' WHERE `id`='{$user_id}'");
$boss_mau = rand(1000000,4000000);

mysql_query("UPDATE `wboss` SET `hp`='$boss_mau' WHERE `id`='11'");


$text = ''.$login.' vừa giết được Super Broly mọi người đều ngưỡng mộ.';
mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");




} else {
echo'<div class="omenu"><center><b><font color="blue">Boss -'.number_format($datauser['sucmanh']).'HP<br>Tôi -'.number_format($ihp).'HP</b></font></center></div>';

mysql_query("UPDATE `users` SET `timedanhboss`='".time()."'+'3' WHERE `id`='".$user_id."'");

mysql_query("UPDATE `users` SET `hp`=`hp`-'{$ihp}', `exp`=`exp`+'10000' WHERE `id`='{$user_id}'");
mysql_query("UPDATE `wboss` SET `hp`=`hp`-'".$datauser['sucmanh']."' WHERE `id`='11'");

}
echo'<center></center></<br> <font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b>Bản thân: '.number_format($datauser['hp']).'/ '.number_format($datauser['hpfull']).'</br> HP: '.number_format($wboss['hp']).'</font></b></center>';
}
?>