<?php
/*
Code Được Mod Bởi Lê Văn Thịnh
Code Mod By Lê Văn Thịnh
Vui Lòng Ghi Nguồn Nếu Có Sao Chép! 
*/
define('_IN_JOHNCMS',1);

$textl ='Giả kim thuật';

include'../incfiles/core.php';

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

echo'<div class="nenvip"> Giả kim thuật > Hoàng tử ba tư</div>';
echo'<div class="gd_"><table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="20%"><center><div style="border: 1px solid #EAF6FC;background-color: #EAF6FC;margin:0px 0;padding:5px;border-radius:5px;width:auto;height:auto;">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>Chào mừng ngươi đến SHOP của ta! Hãy nhấp vào vật phẩm ngươi muốn xem nhé!</b></font></div>
<br><img src="https://i.imgur.com/b7v6xnq.gif"></center></td><td width="80%"><div class="pmenu"><div style="overflow: auto;height:100px">';

echo'<div class="omenu"><a href="shop.php"><img src="/images/next.png"> Cửa hàng nguyên liệu</a></div>';
echo'<div class="omenu"><a href="index.php"><img src="/images/next.png"> Quay về</a></div>';




echo' </div></div></td></tr></tbody></table></div>';



include'../incfiles/end.php';

?>
