<?php
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
$headmod = 'Khu mua sắm';
$textl = 'Khu mua sắm'; 
require_once('../incfiles/head.php');
mysql_query("UPDATE `users` SET `vitri` = '221104' WHERE `id` = '".$user_id."'");

echo'<div class="phdr">Shop Premium</div>';
echo'<div class="gach"><center>';
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '221104'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '221104';");
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
//Keet thuc topic
if ($online_u > 0){
echo implode(' ',$u_on).'';
}else{
	echo '<img src="/avatar/'.$user_id.'.png"/>';
}
echo'<br><br><a href="shopxeng.php">
<img src="https://i.imgur.com/kiniXlB.gif"></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;                                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;<a href="thuongnhan.php"><img src="https://i.imgur.com/NEyXKg9.gif"></a><br></center></div>';


require('../incfiles/end.php');

?>
<style>
.gach {
    background: url(https://i.imgur.com/7kK4wQN.png);
}
</style>