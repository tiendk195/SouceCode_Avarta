<?php
define ('_IN_JOHNCMS', 1);
require ('../incfiles/core.php');
$textl ='Khu Hawaii';
require ('../incfiles/head.php');
?>
<style>
.cathawai {
	background: url('https://i.imgur.com/MWacg7s.png')repeat;
	height: 40px;
}
.nentroihawai {
	background: url('https://i.imgur.com/RCejTCF.png')repeat;
	margin: auto;
height: 55px
}
.nenbienhawai {
	background: url('https://i.imgur.com/GS5DKgq.png')repeat-x;
	margin: auto;
height: 53px
}
</style>
<?php


mysql_query("UPDATE `users` SET `vitri` = '30' WHERE `id` = '".$user_id."'");
echo'
<div class="phdr"><img src="/icon/iconnguoi1.png">  Hawaii</div><div class="nentroihawai">
<marquee behavior="scroll" direction="left" scrollamount="6" style="margin-top: 6px"><img src="/icon/iconxoan/dammaylon.png" width="20"></marquee>
<marquee behavior="scroll" direction="left" scrollamount="4" style="margin-top: -10px"><img src="/icon/iconxoan/dammaynho.png" width="15"></marquee></div>
<div class="nenbienhawai">
<center>
<img src="/icon/caydua.png" alt="caydua">
<img src="https://i.imgur.com/w1sK6Uv.png" alt="congchao" >
<img src="/icon/caydua.png" alt="caydua">
</center>
</div><div class="cathawai"></div><div class="da" style="min-height: 85px;margin:0">
<a href="cuahang.php"><img src="https://i.imgur.com/JAy6abu.png" style=" float: left;verticalalign: 0 px;margin:-105px 0 0 0px;" alt="cuahang"></a>
<img src="https://i.imgur.com/Fboxfqm.png" style=" float: right;verticalalign: 0 px;margin:-32px 0 0 0px;">
<a href="map.php"><img src="/images/vao.gif" style=" float: right"></a>';
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '30'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '30';");
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
echo'<center><img src="/icon/caydua.png" alt="caydua"><a href="muada.php">
<img src="/images/vao.gif" alt="vao"></a><img src="/icon/caydua.png" alt="caydua"></center></div>';

require ('../incfiles/end.php');
?>