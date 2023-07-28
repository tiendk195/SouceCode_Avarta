<?php
define ('_IN_JOHNCMS', 1);
require ('../incfiles/core.php');
$textl ='Khu Hawaii';
require ('../incfiles/head.php');
?>
<style>
.cathawai {
	background: url('https://i.imgur.com/iHgmaVn.png')repeat;
	height: 141px;
}
.nentroihawai {
	background: url('https://i.imgur.com/Xf3IjOS.png')repeat-x;
	margin: auto;
height: 38px
}
.nenbienhawai {
	background: url('https://i.imgur.com/SFhcEMr.png')repeat-x;
	margin: auto;
height: 65px
}
</style>
<?php


mysql_query("UPDATE `users` SET `vitri` = '2003' WHERE `id` = '".$user_id."'");

echo'<div class="phdr"><img src="/icon/iconnguoi1.png">  Hawaii</div><div class="nentroihawai">
<center><img src="/icon/ochawai.png" style="position: absolute;verticalalign: 0 px;margin:105px 0 0 0px;"><a href="npctienca.php"><img src="https://i.imgur.com/d3CFrCO.gif" alt="Tiên cá" style="position: absolute;verticalalign: 0 px;margin:35px 0 0 0px;"></a><a href="shop2.php"><img src="shopvip.gif" alt="Shop Cao Cấp" style="position: absolute;verticalalign: 0 px;margin:0px 0 0 70px;"></a></center></div>
<div class="nenbienhawai"></div>
<div class="cathawai">
<img src="https://i.imgur.com/IUDYAK6.png"> <img src="https://i.imgur.com/ez0iEK2.png"><br>

<a href="index.php"><img src="/images/vao.gif"></a>
<img src="/icon/ghehawai.png" alt="ghehawai" style=" float: right"> <img src="/icon/duhawai.png" alt="duhawai"  style=" float: right;verticalalign: 0 px;margin:-35px 0 0 0px;">
<img src="/icon/ghehawai.png" alt="ghehawai" style=" float: right"><br>';
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '2003'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '2003';");
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

echo'</div><div class="nenvip"><center>Copyright by Lethinh</center></div>';

require ('../incfiles/end.php');
?>