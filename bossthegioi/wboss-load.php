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
date_default_timezone_set('Asia/Ho_Chi_Minh');
 $checkbosstg=mysql_query("SELECT * FROM `tgdanhbosstg` WHERE `user_id`='".$user_id."' AND `colenh`='1'");
$checkboss=mysql_num_rows($checkbosstg);

$wboss = mysql_fetch_array(mysql_query("SELECT * FROM `bossthegioi_boss` WHERE `user_id`='".$user_id."'"));

if(isset($_POST['danh'])) {
$sucdanh = $datauser['sucmanh']*1;
    
  
    
    
    
$hpboss = $datauser['sucmanh'];
$rand = rand(1,3);
$xu = rand(100,900);
$da = rand(1,3);
$tgdanhboss= rand(2,7);
	$wait=$datauser[timedanhbosstg]-time();

if ($checkboss<1) {
echo'<div class="omenu">Lỗi, cổ lệnh đã hết hiệu lực</div>';
} else 



if($datauser['suckhoe'] <= 0 ) {
echo'<div class="omenu"><center><font color="red">Lỗi!</font> Bạn cần 5 điểm sức khỏe để tấn công.</br><input type="submit" name="hoiphuc" id ="hoiphuc" value="Hồi phục bằng 50.000 xu" /></center></div>';
} else if($datauser['sucmanh'] <= 0 ) {
echo'<div class="omenu"><center><font color="red">Lỗi!</font> Bạn cần có sức mạnh để tấn công.</center></div>';

} else if($wboss['hp'] <= 0){
echo'<div class="omenu"><center>Các Ngươi Đợi Đấy,nhất định tao sẽ trở lại</center></div>';
} else if($wboss['hp'] <= $datauser['sucmanh']){

if ($sucdanh >= $wboss['hp']) {
echo'<center><div class="omenu"><font color="red">Bạn Giết Được Boss! Nhận Được '.$da.' Đá nâng cấp và '.$xu.' Xu, '.$da.' Công thức chế tác, '.$da.' Huy hiệu bóng tối!</font></center>';
	                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'$da' WHERE `user_id`='".$user_id."' AND `id_shop` = '129'");
                              			   mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'$da' WHERE `user_id`='".$user_id."' AND `id_shop` = '89'");

			   mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'$da' WHERE `user_id`='".$user_id."' AND `id_shop` = '60'");
if ($datauser['namlinhchi']==0){
	mysql_query("UPDATE `users` SET `suckhoe`=`suckhoe`-'5'  WHERE `id`='{$user_id}'");
}
mysql_query("UPDATE `users` SET `timedanhbosstg`= '".time()."' , `xu`=`xu`+'$xu',`huyhieubongtoi`=`huyhieubongtoi` +'$da', `wboss`=`wboss`+1 WHERE `id`='{$user_id}'");

mysql_query("UPDATE `bossthegioi_boss` SET  `hp`='0',`die`='1' WHERE `user_id`='".$user_id."'");


$text = ''.$login.' vừa giết được Boss World mọi người đều ngưỡng mộ.';
mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");
}


} else if ($rand==1) {
	
echo'<div class="omenu"><center><font color="red">Gru gru... </font>bạn đã bị Boss phản dame và bị mất 25 sức khỏe</div></center>';
if ($datauser['namlinhchi']==0){
	mysql_query("UPDATE `users` SET `suckhoe`=`suckhoe`-'25'  WHERE `id`='{$user_id}'");
}
mysql_query("UPDATE `users` SET `solandanhboss`=`solandanhboss` +'1' WHERE `id`='{$user_id}'");

} else {
echo'<div class="omenu"><center>Bạn đã tấn công Boss Thế Giới, Boss bị trừ -'.number_format($sucdanh).'HP</div></center>';
if ($datauser['namlinhchi']==1){
$rand2 = rand(1,20);
} else {

$rand2 = rand(1,50);
}
$da2 = rand(1,3);
$luong = rand(1,20);
/*
if ($rand2== 5) {
	echo'<div class="omenu"><center>Bạn đã nhận được 1 <img src="/images/vatpham/105.png"> Hộp quà 1-5</div></center>';
	                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '105'");

}
*/
if ($rand2== 4) {
	echo'<div class="omenu"><center>Bạn đã nhận được '.$da2.' Đá nâng cấp</div></center>';
	                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'$da2' WHERE `user_id`='".$user_id."' AND `id_shop` = '60'");

}
if ($rand2== 6) {
	echo'<div class="omenu"><center>Bạn đã nhận được '.$da2.' Công thức chế tác</div></center>';
	                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'$da2' WHERE `user_id`='".$user_id."' AND `id_shop` = '129'");

}
if ($rand2 == 3 ) {
$da23=rand(2,3);
	echo'<div class="omenu"><center>Bạn đã nhận được '.$da23.' Đá ngũ sắc</div></center>';
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$da23."' WHERE `user_id`='".$user_id."' AND `id_shop`='123'");

}
if ($rand2 >=1 and $rand2 <=2) {
	echo'<div class="omenu"><center>Bạn đã nhận được '.$luong.' Lượng</div></center>';
	                mysql_query("UPDATE `users` SET `luong`=`luong`+'$luong' WHERE `id`='".$user_id."'");

}
if ($datauser['namlinhchi']==0){
	mysql_query("UPDATE `users` SET `suckhoe`=`suckhoe`-'5'  WHERE `id`='{$user_id}'");
}
	$checknv=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='7'"));
if ($checknv>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='7'");
}
$checknv2=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='8'"));
if ($checknv2>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='8'");
}
mysql_query("UPDATE `users` SET  `exp`=`exp`+'10000',`timedanhbosstg`= '".time()."'+'3' ,`tgdanhbosstg`=`tgdanhbosstg`+'1', `solandanhboss`=`solandanhboss` +'1' WHERE `id`='{$user_id}'");
mysql_query("UPDATE `bossthegioi_boss` SET `hp`=`hp`-'{$sucdanh}' WHERE `user_id`='".$user_id."'");
mysql_query("UPDATE `bossthegioi_boss` SET `hp`=`hp`+'{$ihp}' WHERE `user_id`='".$user_id."'");

}
echo'<center><img src="https://i.imgur.com/QPfidwg.gif"></center></<br> <font color="red"><b>HP: '.number_format($wboss['hp']).'</font></b></center>';
}

?>