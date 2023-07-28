<?php
define('_IN_JOHNCMS', 1);
$textl = 'Ai Cập';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");
?>
<style>
.bt {
    height: 110px;
    background: url(https://i.imgur.com/foF58F2.png);
    background-repeat: repeat;
}
.cat {
    background: url(https://i.imgur.com/hMWYI1u.png);
    height: 325px;
    width: 100%;
}

</style>
<?php
//Keet thuc topic
mysql_query("UPDATE `users` SET `vitri`='666' WHERE `id`='{$user_id}'");
echo'<div class="phdr"> Ai Cập</div>';
echo'<div class="bt"><marquee behavior="scroll" direction="left" scrollamount="1" style="margin-top: 5px"><img src="/icon/iconxoan/dammaynho.png"></marquee><marquee behavior="scroll" direction="left" scrollamount="2" style="margin-top: 10px"><img src="/icon/iconxoan/dammaylon.png"></marquee></div>';
echo'<div class="cat"><center><a href="map.php"><img src="https://i.imgur.com/ym4BOZG.gif"></a><br>
<a href="npc.php"><img src="https://i.imgur.com/mCO5iVN.gif"></a></center>
<a href="cuahang.php"><img src="https://i.imgur.com/Gy2ClhT.gif"></a>
<center>';
//-- Online Topic ---//
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '666'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '666';");
$count = mysql_num_rows($q);
while ($arr = mysql_fetch_array($q)){
$trinhtrangvip = mysql_query("select `rights` from `users` where id='" . $arr['id'] . "'");
$trinhtrangviphonnua = mysql_fetch_array($trinhtrangvip);
if($arr['id'] != $datauser['id']){
	
$u_on[]='<a href="/member/' . $arr['id'] . '.html"><img src="/avatar/' . $arr['id'] . '.png"></a>';
}else{
}
}
//Keet thuc topic
if ($online_u > 0){
echo implode(' ',$u_on).'';
}else{
	echo '<label style="display: inline-block;text-align: center;"><b style="font-size: 9px;color:red;font-weight:bold;text-align: center;">'.$datauser['name'].'</b><br><img src="/avatar/' . $datauser['id'] . '.png"></label>';
}
echo'<a href="/member/' . $datauser['id'] . '.html"><img src="/avatar/'.$user_id.'.png"></a>';
echo'</center><div class="nencat"><center><a href="/"><img src="/images/vao.gif"></a></center></br></br></div></div>';







require('../../incfiles/end.php');