<?php
define('_IN_JOHNCMS', 1);
$textl = 'Khu Boss Clan';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
echo '<div class="phdr">Bảng Xếp Hạng Giết Boss Clan</div>';

$req=mysql_query("SELECT * FROM `users` WHERE `bossclan`>=0 AND `rights`<=15 ORDER BY `bossclan` DESC LIMIT 10");
$i = 1;
while ($res = mysql_fetch_array($req)) {
echo '<div class="menu"><img src="'.$home.'/avatar/'.$res['id'].'.png" alt="'. $user['name'] . '" class="avatar_vina"/>
<a href="/member/'.$res['id'].'.html"><b>'.nick($res['id']).'</b></a>';
if($i == 1){
echo'<b> - <font color="red"> [TOP 1]</b></font>';
}
if($i == 2){
echo'<b> - <font color="red"> [TOP 2]</b></font>';
}
if($i == 3){
echo'<b> - <font color="red"> [TOP 3]</b></font>';
}
echo'<br/>
Đã Giết: '.number_format($res['bossclan']).' Con<br/></div>';
++$i;
}
require_once ("../../incfiles/end.php");
?>