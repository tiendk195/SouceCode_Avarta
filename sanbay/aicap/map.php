<?php
define('_IN_JOHNCMS', 1);
$textl = 'Ai Cập';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");


echo'<style>body{min-width: 700px}</style>';

?>
<style>
.bt {
    height: 110px;
    background: url(https://i.imgur.com/foF58F2.png);
    background-repeat: repeat;
}
.cat {
    background: url(https://i.imgur.com/hMWYI1u.png);
    height: 166px;
    width: 100%;
}

</style>
<?php
//Keet thuc topic
mysql_query("UPDATE `users` SET `vitri`='664' WHERE `id`='{$user_id}'");
echo'<div class="phdr"> Ai Cập</div>';
echo'<div class="bt"><marquee behavior="scroll" direction="left" scrollamount="1" style="margin-top: 5px"><img src="/icon/iconxoan/dammaynho.png"></marquee><marquee behavior="scroll" direction="left" scrollamount="2" style="margin-top: 10px"><img src="/icon/iconxoan/dammaylon.png"></marquee></br></div>';
echo'<div class="cat">
<center>';
//-- Online Topic ---//
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '664'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '664';");
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


echo'</center></br></br><div class="nencat">';
if ($online_u > 0){
echo implode(' ',$u_on).'';
}else{
	echo '<label style="display: inline-block;text-align: center;"><b style="font-size: 9px;color:red;font-weight:bold;text-align: center;">'.$datauser['name'].'</b><br><img src="/avatar/' . $datauser['id'] . '.png"></label>';
}
echo'<a href="/member/' . $datauser['id'] . '.html"><img src="/avatar/'.$user_id.'.png"></a>';


echo'<img src="https://i.imgur.com/5xbAlFc.png" style="float:right"></br>
<a href="cua1.php"><img src="/images/vao.gif" style="position:absolute;margin: -41px 0 0 280px;"></a>';
echo'<img src="https://i.imgur.com/domnaCn.png" style="position:absolute;margin: -77px 0 0 -118px;">';

echo'<img src="https://i.imgur.com/ysGyAug.png" style="position:absolute;margin: -47px 0 0 -138px;">';
echo'<img src="https://i.imgur.com/domnaCn.png" style="position:absolute;margin: 6px 0 0 110px;">';
echo'<img src="https://i.imgur.com/ysGyAug.png" style="position:absolute;margin: -10px 0 0 155px;">';
echo'<img src="https://i.imgur.com/fn8mYae.png" style="position:absolute;margin: 32px 0 0 85px;">';
echo'<img src="https://i.imgur.com/ZZCAler.png" style="float:right">';
/*
} else if($the == 'wap'){
  echo'<img src="https://i.imgur.com/5xbAlFc.png" style="float:right"></br>
<a href="cua1.php"><img src="/images/vao.gif" style="position:absolute;margin: -41px 0 0 198px;"></a>';
echo'<img src="https://i.imgur.com/domnaCn.png" style="position:absolute;margin: -77px 0 0 -88px;">';

echo'<img src="https://i.imgur.com/ysGyAug.png" style="position:absolute;margin: -47px 0 0 -118px;">';
echo'<img src="https://i.imgur.com/domnaCn.png" style="position:absolute;margin: 6px 0 0 80px;">';
echo'<img src="https://i.imgur.com/ysGyAug.png" style="position:absolute;margin: -10px 0 0 155px;">';
echo'<img src="https://i.imgur.com/fn8mYae.png" style="position:absolute;margin: 32px 0 0 55px;">';
echo'<img src="https://i.imgur.com/ZZCAler.png" style="float:right">';  
}
*/
echo'</div>';

echo'<center><a href="index.php"><img src="/images/vao.gif"></a></center></div>';







require('../../incfiles/end.php');