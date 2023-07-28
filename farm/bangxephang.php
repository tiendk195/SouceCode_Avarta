<?php
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
include_once('func.php');
$textl = 'Bảng xếp hạng Nông trại';
require('../incfiles/head.php');
if ($_SERVER['REQUEST_URI'] == '/farm/bangxephang.php') {header('Location: '.$home.'/farm/bangxephang.php/');}
if ($_SERVER['REQUEST_URI'] == '/farm/bangxephang') {header('Location: '.$home.'/farm/bangxephang.php/');}
echo'<div class="main-xmenu">';
echo'<div class="phdr">Bảng xếp hạng Nông trại</div>';
if($user_id){
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `fermer_oput`"), 0);
$req = mysql_query("SELECT * FROM `users` WHERE `fermer_oput`>'0' ORDER BY `fermer_oput` DESC LIMIT $start, $kmess");
while ($danhsach = mysql_fetch_assoc($req)){
echo'<div class="menu list-bottom">';
echo'<table cellpadding="0" cellspacing="0"><tr class="menu_top_baiviet"><td style="vertical-align: top;">';
echo'<img src="'.$home.'/avatar/'.$danhsach[id].'.png" alt="'. $user['name']. '"/>';
echo'&#160;</td><td>';
echo'<a href="/account/'.$danhsach[id].'"><b>'.nick($danhsach[id]).'</b></a><br/>';
//echo'Level: '.$danhsach['fermer_level'].'<br>';
echo'Xu: '.number_format($danhsach[xu]).'<br/>';
/*if ($danhsach[id] == $user_id) {
} else {
echo'<a href="/farm/account.php?id='.$danhsach[id].'">Ăn trộm</div>';
}*/
echo'</td></tr></table></div>';
}

}else{
header('Location: '.$home.'');
}
if ($tong > $kmess){
echo '<div class="topmenu">' . functions::phan_trang('/farm/bangxephang/', $start, $tong, $kmess) . '</div>';
}
echo '<div class="rmenu">&raquo; <a href="/nongtrai/cuahang.php"><b>Cửa hàng</b></a> &raquo; <a href="/nongtrai/index.php"><b>Nông trại</b></a> &raquo; <a href="/farm"><b>Trang trại</b></a>';
echo'</div></div>';
require('../incfiles/end.php');
?>