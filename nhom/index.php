<?php

define('_IN_JOHNCMS', 1);
$headmod = 'clan';
$active2 = 'id="selected"';

require('../incfiles/core.php');
$textl = 'Clan - Hội Nhóm';
require('../incfiles/head.php');
include_once('func.php');

$dv = mysql_fetch_array(mysql_query("SELECT * FROM `nhom_user` WHERE `user_id`='$user_id' OR `id`='$id'"));
if($dv['id'] > 0) {
} else {
echo '<center><form id="form" action="tao.php" method="GET"><button class="chat"/>Tạo Clan 1500 lượng</button></center></form>';
}



if($dv['id'] >= 1) {
echo '<div class="phdr"><b>Clan tham gia</b></div>';
$dem = mysql_result(mysql_query("SELECT COUNT(*) FROM `nhom_user` WHERE `user_id`='$user_id' AND `duyet`='1'"),0);
if($dem) {
$req = mysql_query("SELECT * FROM `nhom_user` WHERE `user_id`='$user_id' AND `duyet`='1' ORDER BY `time` DESC LIMIT 5");
while($res=mysql_fetch_array($req)) {
$nhom = nhom($res['id']);
echo '<div class="omenu"><img class="avatar_aev" src="/avatar/'.$nhom['user_id'].'.png" alt="" /><a href="page.php?id='.$res['id'].'"><b><font color="2c5170">'.$nhom['name'].'</font><img src="'.$home.'/images/clan/'.$nhom['icon'].'.png"></b></a><br/>'.catchu($nhom['gt'],0,10).'</div>';
}
if($dem > 10)
echo '<div class="omenu" align="center"><a href="more.php">Xem thêm</a></div>';
} else {
echo '<div class="menu" align="center">Chưa tham gia Clan nào!</div>';
}
}
echo '<div class="phdr"><b>Clans Ngẫu Nhiên</b></div>';

$dem = mysql_result(mysql_query("SELECT COUNT(*) FROM `nhom`"),0);
if($dem) {
$req = mysql_query("SELECT * FROM `nhom` WHERE `user_id`!='$user_id' ORDER BY `id` DESC LIMIT 5");
while($res=mysql_fetch_array($req)) {
$nhom = nhom($res['id']);
$chunhom = user_nick($nhom['user_id']);
echo '<div class="omenu"><a href="page.php?id='.$res['id'].'"><b>Tên Clan: <font color="2c5170">'.$nhom['name'].' </font><img src="'.$home.'/images/clan/'.$nhom['icon'].'.png"></b></a><br>PC: <font color="red">'.$chunhom['name'].'</font></div>';
}
if($dem > 10)
echo '<div class="omenu" align="center"><a href="more.php?act=nhom">Xem thêm</a></div>';

echo '<div class="phdr">TOP Clan Giàu Nhất</div>';
$req = mysql_query("SELECT * FROM `nhom`  WHERE `xu` >= '1' ORDER BY `xu` DESC LIMIT 10");
$i = 1;

while ($res=mysql_fetch_array($req)) {
//mau nick
if ($res['rights'] < 9 ) {
if ($res['rights'] == 0 ) {
$colornick['colornick'] = '000000';
}
if ($res['rights'] == 2 ) {
$colornick['colornick'] = '8b008b';
}
if ($res['rights'] == 3 ) {
$colornick['colornick'] = '0000ff';
}
if ($res['rights'] == 4 ) {
$colornick['colornick'] = '770000';
}
if ($res['rights'] == 6 ) {
$colornick['colornick'] = 'gold';
}
if ($res['rights'] == 7 ) {
$colornick['colornick'] = '008000';
}
if ($res['rights'] == 9 ) {
$colornick['colornick'] = 'FF0000';
}
$chunhom2 = user_nick($res['user_id']);
//het mau nick
echo '<div class="omenu">';
echo '<b>'.$i.'. <a href="page.php?id='.$res['id'].'">
<font color="#'.$colornick['colornick'].'">'.$res['name'].'</font></a> <img src="'.$home.'/images/clan/'.$res['icon'].'.png"></b> <br>PC: <a href="/member/'.$chunhom2['id'].'.html"><font color="red">'.$chunhom2['name'].'</font></a><br>- ' .number_format($res['xu']).' xu ' .number_format($res['luong']).' lượng';
echo '</div>';
++$i;
}}

echo '<div class="phdr">TOP Level Clans</div>';
$req = mysql_query("SELECT * FROM `nhom`  WHERE `lv` >= '1' ORDER BY `lv` DESC LIMIT 10");
$i = 1;

while ($res=mysql_fetch_array($req)) {
//mau nick
if ($res['rights'] < 9 ) {
if ($res['rights'] == 0 ) {
$colornick['colornick'] = '000000';
}
if ($res['rights'] == 2 ) {
$colornick['colornick'] = '8b008b';
}
if ($res['rights'] == 3 ) {
$colornick['colornick'] = '0000ff';
}
if ($res['rights'] == 4 ) {
$colornick['colornick'] = '770000';
}
if ($res['rights'] == 6 ) {
$colornick['colornick'] = 'gold';
}
if ($res['rights'] == 7 ) {
$colornick['colornick'] = '008000';
}
if ($res['rights'] == 9 ) {
$colornick['colornick'] = 'FF0000';
}
$chunhom2 = user_nick($res['user_id']);
//het mau nick
echo '<div class="omenu">';
echo '<b>'.$i.'. <a href="page.php?id='.$res['id'].'">
<font color="#'.$colornick['colornick'].'">'.$res['name'].'</font></a> <img src="'.$home.'/images/clan/'.$res['icon'].'.png"></b> <br>PC:  <a href="/member/'.$chunhom2['id'].'.html"><font color="red">'.$chunhom2['name'].'</font></a><br>- Level: '.$res['lv'].'';
echo '</div>';
++$i;
}}
} else {
echo '<div class="omenu" align="center">Chưa có clan nào!</div>';
}
echo '</i>';

require('../incfiles/end.php');
?>