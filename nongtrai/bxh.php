<?php
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
include_once('funfarm.php');
$textl = 'Bảng xếp hạng';
require('../incfiles/head.php');
if ($_SERVER['REQUEST_URI'] == '/farm/bangxephang.php') {header('Location: '.$home.'/farm/bangxephang/');}
if ($_SERVER['REQUEST_URI'] == '/farm/bangxephang') {header('Location: '.$home.'/farm/bangxephang/');}
echo'<div class="main-xmenu">';
echo'<div class="phdr">Bảng xếp hạng nông trại</div>';
if($user_id){
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `fermer_level`"), 0);
$req = mysql_query("SELECT * FROM `users`  WHERE `fermer_level` >= '1' ORDER BY `fermer_level` DESC LIMIT 100");
$i = 1;
while ($danhsach = mysql_fetch_assoc($req)){
echo'<div class="omenu">';
echo'<table cellpadding="0" cellspacing="0"><tr class="menu_top_baiviet"><td style="vertical-align: top;">';
echo'<img src="'.$home.'/avatar/'.$danhsach[id].'.png" alt="'. $user['name']. '"/>';
echo'&#160;</td><td>';
echo'<b> </b><a href="/member/'.$danhsach[id].'.html"><b>'.nick($danhsach[id]).'</b></a>';
echo'<br/>';
echo' Level: '.$danhsach['fermer_level'].'<br>';
echo'Xu: '.number_format($danhsach[xu]).'<br/>';
if ($danhsach[id] == $user_id) {
} else {
echo'<a href="/farm/account.php?id='.$danhsach[id].'">Ăn trộm</div>';
}
echo'</td></tr></table></div>';
}

}else{
header('Location: '.$home.'');
}

echo'</div>';
require('../incfiles/end.php');
?>