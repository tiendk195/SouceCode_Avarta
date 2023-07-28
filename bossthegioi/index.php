<?php

define('_IN_JOHNCMS', 1);
$headmod = 'id_user';
$rootpath='../';
require_once ("../incfiles/core.php");
require_once ("../incfiles/head.php");
/*
if ($datauser['colenh'] ==0 ) {
    echo'<div class="phdr">Boss thế giới</div>';
echo'<div class ="omenu">Bạn chưa mua cổ lệnh để vào đây, <a href="/avatar/vatpham.php?act=danhsach&loai=dacbiet">nhấp vô đây để mua</a> hoặc sử dụng tại <a href="/avatar/vatpham.php?act=danhsach&loai=dacbiet">Rương </a></div>';
require_once ("../incfiles/end.php");
exit;
}
*/
	$hhbt=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='89'"));

	$namlinhchi=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='130'"));
 $checkbosstg=mysql_query("SELECT * FROM `tgdanhbosstg` WHERE `user_id`='".$user_id."' AND `colenh`='1'");
$checkboss=mysql_num_rows($checkbosstg);
if ($checkboss<1) {
 echo'<div class="phdr">Boss thế giới</div>';
echo'<div class ="omenu">Bạn chưa mua cổ lệnh để vào đây, <a href="shop.php">nhấp vô đây để mua</a></div>';
require_once ("../incfiles/end.php");
exit;
}
if ($datauser['kichhoat']==0) {
echo'<div class="omenu">Vui lòng kích hoạt tài khoản</div>';
require('../incfiles/end.php');
exit;
}
mysql_query("UPDATE `users` SET `vitri` = '2210' WHERE `id` = '".$user_id."'");
if ($datauser['namlinhchi']==1) {
	$sd='Có sử dụng';
} else if ($datauser['namlinhchi']==0) {
	$sd='Chưa sử dụng';
}
echo'<div class="phdr">Boss World</DIV>
<center><div class="news"><img src="/icon/hp.png"><font color="red"><b>Sức khỏe:</font></b> '.$datauser['suckhoe'].' • <img src="/icon/sm.png"> <font color="red"><b>SM:</font></b> '.number_format($datauser['sucmanh']).' • <img src="/images/vatpham/130.png"> <font color="red"><b>Nấm linh chi:</font></b> '.$sd.'
   
    </div></center>

<center><div class="bautroiboss" style="min-height: 100px;margin:0"></div>
<div class="hangrao"></div><div class="datboss" style="min-height: 150px;margin:0">';
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '2210'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '2210';");
$count = mysql_num_rows($q);
while ($arr = mysql_fetch_array($q)){
$trinhtrangvip = mysql_query("select `rights` from `users` where id='" . $arr['id'] . "'");
$trinhtrangviphonnua = mysql_fetch_array($trinhtrangvip);
if($arr['id'] != $datauser['id']){
$u_on[]='<a href="../users/' . $arr['id'] . '.html"><img src="/avatar/' . $arr['id'] . '.png"></a>';
}else{
	$u_on[]='<img src="/avatar/' . $arr['id'] . '.png">';
}
}
//Keet thuc topic
if ($online_u > 0){
echo implode(' ',$u_on).'';
}else{
	echo '<img src="/avatar/'.$user_id.'.png"/>';
}

echo'<center><span id="load">

<center><img src="https://i.imgur.com/QPfidwg.gif"></center> </span>
<form method="post"><input type="submit" name="danh" id ="danh" value="Đánh" /></form></center>';




$wboss = mysql_fetch_array(mysql_query("SELECT * FROM `bossthegioi_boss` WHERE `user_id`='".$user_id."'"));




?>
<style>
.datboss {
margin: 10px 0px;
background: url('/giaodien/images/datboss.png');
padding: 2px;
}
.hangrao {
background: url('/img/hangrao.png');
padding: 30px;
max-width: 100%;
margin: auto;
}
.bautroiboss{text-align:center;background:url(/giaodien/images/bautroiboss.png);margin:0px 0px;padding: 0px;}
.bautroi {
background: url('/giaodien/images/bautroiboss.png');
padding: 50px;
max-width: 100%;
margin: auto;
}
.phongcanh {
margin: 10px 0px;
background: url('img/phongcanh.png');
padding: 2px;
}
.lumcay {
margin: 10px 0px;
background: url('img/lumcay.png');
padding: 2px;
}
.nenda {
background: url('img/nenda.png'); 
margin: 10px 0px;
padding: 2px;
}
</style>
<?php
?> 



<?php
echo'</div>';
echo'<center>';
//Đánh Boss

if(isset($_POST['danh'])) {
$sucdanh = $datauser['sucmanh']*1;
    
  
    
    
    
$hpboss = $datauser['sucmanh'];
$rand = rand(1,3);
$xu = rand(100,900);
$da = rand(1,3);
$tgdanhboss= rand(2,7);
if ($checkboss<1) {
echo'<div class="omenu">Lỗi, cổ lệnh đã hết hiệu lực</div>';
} else 


if($datauser['suckhoe'] <= 0 ) {
echo'<div class="omenu"><center><font color="red">Lỗi!</font> Bạn cần 5 điểm sức khỏe để tấn công. <a href="hoiphuc.php">Hồi phục ngay(50.000 xu)</a></center></div>';
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
mysql_query("UPDATE `users` SET  `timedanhbosstg`= '".time()."' ,`tgdanhbosstg`=`tgdanhbosstg`+'1', `solandanhboss`=`solandanhboss` +'1' WHERE `id`='{$user_id}'");
mysql_query("UPDATE `bossthegioi_boss` SET `hp`=`hp`-'{$sucdanh}' WHERE `user_id`='".$user_id."'");
mysql_query("UPDATE `bossthegioi_boss` SET `hp`=`hp`+'{$ihp}' WHERE `user_id`='".$user_id."'");

}
echo'<center><img src="https://i.imgur.com/QPfidwg.gif"></center></<br> <font color="red"><b>HP: '.number_format($wboss['hp']).'</font></b></center>';

}


require_once ("../incfiles/end.php");
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#danh').click(function(){
		var url = "wboss-load.php";
		var data = {"danh": ""};
		$('#load').load(url, data);
		return false;
	});
});
</script>