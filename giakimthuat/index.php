<?php
/*
Code Được Mod Bởi Lê Văn Thịnh
Code Mod By Lê Văn Thịnh
Vui Lòng Ghi Nguồn Nếu Có Sao Chép! 
*/
define('_IN_JOHNCMS',1);
include'../incfiles/core.php';
$textl ='Giả kim thuật';
include'../incfiles/head.php';
if(!$user_id){
header('location: /login.php');
include'../incfiles/end.php';
exit;
}
if ($datauser['kichhoat']==0){
    Header('location: '.$home.'/users/checkpoint.php');
    exit;
}
echo'<link rel="stylesheet" href="/giakimthuat/giaodien.css" type="text/css">';

echo'<div class="nenvip"> Giả kim thuật</div>';
echo'<div class="bautroi"><marquee behavior="scroll" direction="left" scrollamount="2" style="margin-top: 5px"><img src="https://i.imgur.com/B3dJFLI.png"></marquee>
<marquee behavior="scroll" direction="left" scrollamount="3" style="margin-top: 10px"><img src="https://i.imgur.com/B3dJFLI.png"></marquee></div>';
echo'<div class="nuida"></div>';
echo'<div class="nennui"></div>';
echo'<div class="vienda"></div>';
echo'<div class="nenco"></div>';
echo'<div class="dat">

<a href="map1.php"><img src="/images/vao.gif" style=" float: right"></a>
<center><a href="luyenda.php?act=index"><img src="https://i.imgur.com/CKv7hnR.png"></a>
<a href="hoangtubatu.php"><img src="https://i.imgur.com/b7v6xnq.gif" style="margin:-80px 0 0 0px;"></a>
<img src="https://i.imgur.com/CWCg7Yu.png">
<img src="https://i.imgur.com/d4P3o8n.png">
</center>
</div>';
echo'<div class="nenco">';
mysql_query("UPDATE `users` SET `vitri` = '660' WHERE `id` = '".$user_id."'");

$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '660'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '660';");
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
echo'</div>';
echo'<div class="honuoc1"></div>';

include'../incfiles/end.php';
?>
