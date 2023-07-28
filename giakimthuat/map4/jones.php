<?php
/*
Code Được Mod Bởi Lê Văn Thịnh
Code Mod By Lê Văn Thịnh
Vui Lòng Ghi Nguồn Nếu Có Sao Chép! 
*/
define('_IN_JOHNCMS',1);

$textl ='Giả kim thuật';
$rootpath='../../';

require_once ("../../incfiles/core.php");

require_once ("../../incfiles/head.php");
if(!$user_id){
header('location: /login.php');
require_once ("../../incfiles/end.php");
exit;
}
if ($datauser['kichhoat']==0){
    Header('location: '.$home.'/users/checkpoint.php');
    exit;
}

echo'<link rel="stylesheet" href="/giakimthuat/giaodien.css" type="text/css">';

echo'<div class="nenvip"> Giả kim thuật > Jones</div>';
echo'<div class="gd_"><table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="20%"><center><div style="border: 1px solid #EAF6FC;background-color: #EAF6FC;margin:0px 0;padding:5px;border-radius:5px;width:auto;height:auto;">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>Chào mừng ngươi đến SHOP của ta! Hãy nhấp vào vật phẩm ngươi muốn mua nhé!</b></font></div>
<br><img src="https://imgur.com/R3WfazX.gif"></center></td><td width="80%"><div class="pmenu"><div style="overflow: auto;height:100px">';

echo'<div class="omenu"><a href="shop.php"><img src="/images/next.png"> Cửa hàng Sa mạc</a></div>';
echo'<div class="omenu"><a href="doiqua.php"><img src="/images/next.png"> Đổi quà</a></div>';




echo' </div></div></td></tr></tbody></table></div>';



require_once ("../../incfiles/end.php");

?>
