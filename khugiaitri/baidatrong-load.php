<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
echo'<script type="text/javascript" src="http://webquangnam.com/jsShare/tuyetroi.js"></script>';
if($datauser['hp'] <= 0){
echo'<div class="menu"><center><a href="?hoiphuc"><b>[Hồi Phục Máu]</b></a></center></div>';
}
$tb = mysql_fetch_array(mysql_query("SELECT * FROM `tb_dt` WHERE `id` = '1'"));
if($datauser['timepem'] < time()){
mysql_query("UPDATE `users` SET `user_pem`='0' WHERE `id`='{$user_id}'");
}
if($datauser['user_pem']){
echo '<div class="rmenu"><b><font color="brown"><marquee behavior="alternate" scrollamount="5" position: absolute; width: 500px;" onmouseover="this.stop();" onmouseout="this.start();"><b>'.nick($datauser['user_pem']).'</b> vừa đánh bạn</marquee></font></b></div>';
}
if($tb['time'] > time()){
echo '<div class="rmenu"><b><font color="brown"><marquee><b>'.$tb['text'].'</marquee></font></b></div>';
}
echo '<div class="menu"><div class="nencay" style="min-height:140px"><marquee behavior="scroll" direction="left" scrollamount="9" style="margin-top: 5px"><img src="/img/may1.png"></marquee><marquee behavior="scroll" direction="left" scrollamount="10" style="margin-top: 10px"><img src="/img/may2.png"></marquee></div><div class="cola" style="min-height: 100px;margin:0"><div class="buico"></div>';

echo'<br/><div class="dat">';


//-- Online Topic ---//
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `vitri` = '559'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '559';");
$count = mysql_num_rows($q);
while ($arr = mysql_fetch_array($q)){
$trinhtrangvip = mysql_query("select `rights` from `users` where id='" . $arr['id'] . "'");
$trinhtrangviphonnua = mysql_fetch_array($trinhtrangvip);

if($arr['hp'] <= 0){
$u_on[]='<a href="../member/' . $arr['id'] . '.html"><img src="/amthitong/bidanh.png"></a>';
} else if($arr['id'] != $datauser['id']){
$u_on[]='<a href="?danh&user='.$arr['id'].'"><img src="/avatar/' . $arr['id'] . '.png"></a>';
}else{
	$u_on[]='<img src="/avatar/' . $arr['id'] . '.png">';
}
}
//Keet thuc topic
if ($online_u > 0){
echo implode(' ',$u_on).'';
}

echo'</div></div><div class="buico"></div></div>';
?>