<?php
define('_IN_JOHNCMS', 1);
$textl = 'Khu Ngoại Ô';
$headmod = 'id_user';
$rootpath='../';
require_once ("../incfiles/core.php");
require_once ("../incfiles/head.php");
echo'<div class="phdr">Khu Ngoại Ô</div>';
mysql_query("UPDATE `users` SET `vitri` = '38' WHERE `id` = '".$user_id."'");
//-- Tìm kiếm users ---//
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `vitri` = '38'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '38';");
$count = mysql_num_rows($q);
while ($arr = mysql_fetch_array($q)){
$trinhtrangvip = mysql_query("select `rights` from `users` where id='" . $arr['id'] . "'");
$trinhtrangviphonnua = mysql_fetch_array($trinhtrangvip);
if($arr['id'] != $datauser['id']){
$u_on[]='<a href="/member/' . $arr['id'] . '.html"><img src="/avatar/' . $arr['id'] . '.png"></a>';
}else{
	$u_on[]='<img src="/avatar/' . $arr['id'] . '.png">';
}
}
//Keet thuc tim kiem\
?>
.map img:hover {
    -moz-transform: rotate(360deg);
    -moz-transition: all 3s ease;
    -webkit-transform: rotate(360deg);
    -webkit-transition: all 3s ease;
    position: relative;
    transform: rotate(360deg);
    transition: all 1s ease;
}
<?php
echo'<style type="text/css"> 
.ngoaio{background:url("http://i.imgur.com/3Ai56v9.gif") no-repeat; background-size: 900px 256px;} 
</style>';
echo '<div class="ngoaio" style="min-height:256px"><marquee behavior="scroll" direction="left" scrollamount="1" style="margin-top: 5px"><img src="/icon/iconxoan/dammaynho.png"></marquee><marquee behavior="scroll" direction="left" scrollamount="2" style="margin-top: 10px"><img src="/icon/iconxoan/dammaylon.png"></marquee></div><div class="cola" style="min-height: 100px;margin:0"><div class="buico"></div><a href="nhatu.php"><img src="/icon/giamthi.gif"></a><a href="nhatu.php"><img src="/icon/nhatu.png"></a><img src="/icon/cay.png" style="float:right"><center>';
echo'</br></br></br></br><a href="pet/npcduathu.php"><img src="/icon/duathu.gif" style="margin-top: -120px;"></a><a href="pet/duathu.php"><img src="/icon/duathu.png" style="margin-top: -120px;"></a>'; 
echo'<br/>';
echo '</div>';
echo'<div class="map"><img src="/congvien/images/bauvat.gif"></div>';
echo'<div class="da">';
if ($online_u > 0){
echo implode(' ',$u_on).'';
}
echo'<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
echo'</center><div class="buico"></div>';
echo'</div>';




require('../incfiles/end.php');