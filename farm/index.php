<?php
define('_IN_JOHNCMS', 1);
$noionline = 'Nông trại';
require_once('../incfiles/core.php');
$lng_forum = core::load_lng('forum');
//include_once('func.php');
$textl = 'Nông trại/Trang trại';
require('../incfiles/head.php');
if (!$user_id){
echo'<div class="menu">Bạn phải đăng nhập để chơi game này nhé !</div>';
echo'</div>';
require('../incfiles/end.php');
exit;
}
include'sys/xem.php';
echo'<style>body{min-width: 600px}</style>';
//include'autofarm.php';
include'sys/tienhoa.php';
echo '<div class="dat" style="padding: 0;margin-bottom: 2px;margin-top: 3px;"><div class="mainblok"><div class="phdr"><b>Trang trại &raquo;</b></div>
';
if ($demvn1 > 0 || $demvn2 > 0 || $demvn3 > 0 || $demvn4 > 0 || $demvn5 > 0) {
if ($timevn1[tinhtrang] == 1 || $timevn2[tinhtrang] == 1 || $timevn3[tinhtrang] == 1 || $timevn4[tinhtrang] == 1 || $timevn5[tinhtrang] == 1) {
echo '<div class="menu list-bottom congdong">';
if ($demvn2 > 0 || $demvn3 > 0 || $demvn4 > 0) {
if ($timevn2[tinhtrang] == 1 || $timevn3[tinhtrang] == 1 || $timevn4[tinhtrang] == 1) {
echo'<a href="/farm/?choheocuuboan"><input type="button" value="Cho Heo, Cừu, Bò ăn"/></a>';

}
}
if ($demvn1 > 0) {
if ($timevn1[tinhtrang] == 1) {
echo'<a href="/farm/?chogaan"><input type="button" value="Cho Gà ăn"/></a>';
}
}
if ($demvn5 > 0) {
if ($timevn5[tinhtrang] == 1) {
echo'<a href="/farm/?chocaan"><input type="button" value="Cho Cá ăn"/></a>';
}
}
echo'</div>';
}
}
include'sys/thuhoachsanluong.php';
include'sys/sanluong.php';
include'sys/thoigiansong.php';
echo'<a href="vatnuoi.php"><img src="icon/cuahangfarm.png" style="vertical-align: -8px;"></a>
 <a href="/nongtrai/nhakho.php"><img src="icon/nhakho.png" alt="icon" style="vertical-align: -5px;"/></a>';
 if($user_id) {
echo'<label style="display: inline-block;text-align: center;">';







echo'</div>';
include'sys/nuoigiasuc.php';
include'sys/choan.php';
echo'</div>';
//include'sys/muadat.php';

}
echo'<div class="phdr">Trang trại</div>';
echo'<div class="menu"><a href="/nongtrai"><b>Về Nông trại</b></a> | <a href="/"><b>Thoát</b></a></div>';
echo'<a name="menu" id="menu"></a>';
require('../incfiles/end.php');
?>