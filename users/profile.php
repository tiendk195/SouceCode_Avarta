<?php


define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$lng_profile = core::load_lng('profile');

if (!$user_id) {
require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}

$user = functions::get_user($user);
if (!$user) {
require('../incfiles/head.php');
echo functions::display_error($lng['user_does_not_exist']);
require('../incfiles/end.php');
exit;
}


/*
-----------------------------------------------------------------
Thông tin nick
-----------------------------------------------------------------
*/
$array = array(
'activity'  => 'includes/profile',
'xu'        => 'includes/profile',
'Luong'     => 'includes/profile',
'yourtopic' => 'includes/profile',
'chuki'     => 'includes/profile',
'ban'       => 'includes/profile',
'edit'      => 'includes/profile',
'images'    => 'includes/profile',
'info'      => 'includes/profile',
'ip'        => 'includes/profile',
'office'    => 'includes/profile',
'matkhau'   => 'includes/profile',
'matkhau2'   => 'includes/profile',
'reset'     => 'includes/profile',
'settings'  => 'includes/profile',
'baocao'    => 'includes/profile',
'stat'      => 'includes/profile',
'friends'   => 'includes/profile'
);
$path = !empty($array[$act]) ? $array[$act] . '/' : '';
if (array_key_exists($act, $array) && file_exists($path . $act . '.php')) {
require_once($path . $act . '.php');
} else {

$headmod = 'profile,' . $user['id'];
$textl = 'Thông tin ' . htmlspecialchars($user['name']). '';
require('../incfiles/head.php');



$menu = array();
if ($user['id'] != $user_id && $rights >= 7 && $rights > $user['rights']) {
$menu[] = '<a href="' . $set['homeurl'] . '/' . $set['admp'] . '/index.php?act=usr_del&amp;id=' . $user['id'] . '">' . $lng['delete'] . '</a>';
}
if ($user['id'] != $user_id && $rights > $user['rights']) {
$menu[] = '<a href="profile.php?act=ban&amp;mod=do&amp;user=' . $user['id'] . '">' . $lng['ban_do'] . '</a>';
}

$arg = array(
'lastvisit' => 1,
'iphist'    => 1,
'header'    => ''
);
if ($user_id['id'] == 1 ) { 
    
    echo'<div class="phdr">Hello</div><div class="omenu">Con vô xem quần sịp ta làm gì zậy </div>';
    exit;
}
$ktkh = mysql_result(mysql_query("select count(*) from `kethon` where `user_id` = '".$user['id']."' and `dongy`='1'"),0);
$ktkh2 = mysql_result(mysql_query("select count(*) from `kethon` where `nguoi_ay` = '".$user['id']."' and `dongy`='1'"),0);
$kh = mysql_fetch_array(mysql_query("SELECT * FROM `kethon` WHERE `user_id`='".$user['id']."' and `dongy`='1'"));
$kh2 = mysql_fetch_array(mysql_query("SELECT * FROM `kethon` WHERE `nguoi_ay`='".$user['id']."' and `dongy`='1'"));
$ny = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$user['nguoiyeu']."'"));
if ($user['id'] != core::$user_id) {
$arg['footer'] = '<span class="gray">' . core::$lng['where'] . ':</span> ' . functions::display_place($user['id'], $user['place']);
}
echo'<table width="100%" border="0" cellspacing="0">
<tbody><tr class="menu">

<td width="25%" class="mautab"><b>'.$user['name'].'</b></td>
<td width="25%" class="mautab"><a href="/users/profile.php?act=blog&amp;do=list&amp;id='.$user['id'].'">Blog</a></td>
<td id="selected" width="25%" class="mautab"> Thông tin</td>
<td width="25%"><a href="/users/profile.php?act=friends"> Bạn bè</a></td></tr></tbody></table>';


if ($user['dayb'] == date('j', time()) && $user['monthb'] == date('n', time())) {
echo '<center><div class="gmenu">Hôm nay là sinh sinh nhật ' . $user['name'] . '!!!</center>';
}
echo'<div class="phdrbox">';
echo'<div class="gd_"><center>';
echo'<div class="profile">';
echo'<div class="k">';
if($datauser['id'] == $user['id']) {
echo'<a href="/users/profile.php?act=edit&user=' . $user['id'] . '"><input type="submit" value="Thiết Lập" class="nut"></a></br>';
}
if($rights >= 9)  {
if($datauser['id'] != $user['id']) {

echo'<a href="/users/profile.php?act=edit&amp;user=' . $user['id'] . '"><input type="submit" value="Chỉnh Sửa" class="nut"></a></br>';
echo'<a href="/panel/capnhatpass.php?id=' . $user['id'] . '"><input type="submit" value="Chỉnh Sửa Pass" class="nut"></a></br>';
}
}
if($rights >= 3)  {
if ($rights >= $user['rights']) {
if($datauser['id'] != $user['id']) {
if ($user['chanchat'] == 0)
{
echo '<a href="/users/chanchat.php?id=' . $user['id'] . '"><input type="submit" value="Chặn chat" class="nut"></a> ';
}
else
{
echo '<a href="/users/chanchat.php?id=' . $user['id'] . '"><input type="submit" value="Bỏ chặn chat" class="nut"></a> ';
}
}
}
}


if($rights >= 3)  {

$ban = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_ban_users` WHERE `user_id` = '" . $user['id'] . "' AND `ban_time` > '" . time() . "'"), 0);
if($datauser['id'] != $user['id']) {

if($ban <= 0){


echo '<a href="/users/profile.php?act=ban&mod=do&user=' . $user['id'] . '"><input type="submit" value="Khóa Nick" class="nut"></a> ';
} 
if($ban > 0){

echo '<a href="/users/profile.php?act=ban&mod=delhist&user=' . $user['id'] . '"><input type="submit" value="Mở Khóa" class="nut"></a> ';
}
}
}
echo '</br>';

    



echo'</div>';
echo'</div>';
$time = time();
if($user['hienthivip'] == 1){
if ($user['naptichluy']<10000) {
	$loaivip='0';
} else if ($user['naptichluy']>=10000 and $user['naptichluy']<20000  ) {
		$loaivip='1';
} else if ($user['naptichluy']>=20000 and $user['naptichluy']<50000  ) {
		$loaivip='2';
		} else if ($user['naptichluy']>=50000 and $user['naptichluy']<70000  ) {
		$loaivip='3';
				} else if ($user['naptichluy']>=70000 and $user['naptichluy']<100000  ) {
		$loaivip='4';
					} else if ($user['naptichluy']>=100000 and $user['naptichluy']<150000  ) {
		$loaivip='5';
					} else if ($user['naptichluy']>=150000 and $user['naptichluy']<200000  ) {
		$loaivip='6';
					} else if ($user['naptichluy']>=200000 and $user['naptichluy']<250000  ) {
		$loaivip='7';
			} else if ($user['naptichluy']>=250000 and $user['naptichluy']<350000  ) {
		$loaivip='8';
			} else if ($user['naptichluy']>=350000 and $user['naptichluy']<500000  ) {
		$loaivip='9';
			} else if ($user['naptichluy']>=500000  and $user['naptichluy']<1000000  ) {
		$loaivip='10';
				} else if ($user['naptichluy']>=1000000  ) {
		$loaivip='11';
			}
if($loaivip == 0){
	$vip = '<font color="black" style="text-shadow: 3px 3px 11px #black;"><b>[VIP0]</b></font>';
}

if($loaivip == 1){
$vip = '<font color="05b9f0" style="text-shadow: 3px 3px 11px #05b9f0;"><b>[VIP1]</b></font>';
}
if($loaivip == 2){
$vip = '<font color="0f02f7" style="text-shadow: 3px 3px 11px #0f02f7;"><b>[VIP2]</b></font>';
}
if($loaivip == 3){
$vip = '<font color="9932CC" style="text-shadow: 3px 3px 11px #9932CC;"><b>[VIP3]</b></font>';
}
if($loaivip == 4){
$vip = '<font color="FF9900" style="text-shadow: 3px 3px 11px #FF9900";><b>[VIP4]</b></font>';
}
if($loaivip == 5){
$vip = '<font color="red" style="text-shadow: 3px 3px 11px #ff0000;"><b>[VIP5]</b></font>';
}
if($loaivip == 6){
$vip = '<font color="EE1289" style="text-shadow: 3px 3px 11px #cc0000;"><b>[VIP6]</b></font>';
}
if($loaivip == 7){
$vip = '<font color="009900" style="text-shadow: 3px 3px 11px #009900";><b>[VIP7]</b></font>';
}
if($loaivip == 8){
$vip = '<font color="0000ff" style="text-shadow: 3px 3px 11px #0000ff";><b>[VIP8]</b></font>';

}
if($loaivip == 9){
$vip = '<font color="ff03ab" style="text-shadow: 3px 3px 11px #ff03ab";><b>[VIP9]</b></font>';

}
if($loaivip == 10){
$vip = '<font color="F08080" style="text-shadow: 3px 3px 11px #F08080";><b>[VIP10]</b></font>';

}
if($loaivip == 11){
$vip = '<b><font color="ff9900" style="text-shadow: 3px 3px 11px #ff9900;"> [S</font><font color="red" style="text-shadow: 3px 3px 11px #ff0000;">V</font><font color="green" style="text-shadow: 3px 3px 11px #009900;">I</font><font color="0099ff" style="text-shadow: 3px 3px 11px #0099ff;">P</font><font color="9932CC" style="text-shadow: 3px 3px 11px #9932CC;">★] </font></b>';
}
if($loaivip == 12){
$vip = '<span class="fmod"><b><font color="ff9900" style="text-shadow: 3px 3px 11px #ff9900;"> [S</font><font color="red" style="text-shadow: 3px 3px 11px #ff0000;">V</font><font color="green" style="text-shadow: 3px 3px 11px #009900;">I</font><font color="0099ff" style="text-shadow: 3px 3px 11px #0099ff;">P</font><font color="9932CC" style="text-shadow: 3px 3px 11px #9932CC;">★] </font></b></span>';
}
} else {
	$vip = 'Đã ẩn';
}

echo '<center>';

if($user['antttiente'] == 0){
$xu='' . number_format($user['xu']) . ' Xu';
$luong='' . number_format($user['luong']) . ' Lượng';
$luongkhoa='' . number_format($user['luongkhoa']) . ' Lượng';

} else {
	$xu='Người dùng đã ẩn thông tin';
$luong='Người dùng đã ẩn thông tin';
$luongkhoa='Người dùng đã ẩn thông tin';
}


echo'<table width="100%" border="0" cellspacing="0"><tbody><tr class="">';
if($user[nguoiyeu] == 0){
echo'
<td width="50%"><div class="pmenu_gd"><br>
<center><font size="1" color="red"><b>'.$user[name].'</b></font><br>
<div class="gd_khung_'.$user[khung].'">
<img src="/avatar/' . $user['id'] . '.png" style="position: absolute;verticalalign: 0 px;margin:13px 0 0 -23px;"></div></center>
<center></center></div>
</td>';
}
else {
echo'
<td width="50%"><div class="pmenu_gd"><br>

<table cellpadding="0" cellspacing="0" width="100%"><tbody><tr>

<td width="40"><center><font size="1" color="red"><b>'.$user[name].'</b></font><br><div class="gd_khung_'.$user[khung].'">
<img src="/avatar/' . $user['id'] . '.png" style="position: absolute;verticalalign: 0 px;margin:13px 0 0 -23px;"></div></center></td>

<td width="20"><center><img src="/icon/nhan/'.$user['nhan'].'.png"></center></td>

<td width="40"><center><font size="1" color="red"><b>'.$ny[name].'</b></font><br><div class="gd_khung_'.$ny[khung].'">
<img src="/avatar/'.$user['nguoiyeu'].'.png" style="position: absolute;verticalalign: 0 px;margin:13px 0 0 -23px;" class="xavt"></div></center></td>

</tr></tbody></table>

<center></center></div>
</td>';	
}
$ssm = mysql_fetch_array(mysql_query("SELECT * FROM `ssm_user` WHERE `user_id`='".$user['id']."'"));

echo'<td width="50%">
<div style="overflow: auto;height:130px">

<div class="pmenu2"><table cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td width="50">
<img src="https://i.imgur.com/oYY24vu.gif" height="50"></td><td width="auto" valign="center">
Level '.$ssm['level'].'

</td></tr></tbody></table></div>


<div class="pmenu2"><table cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td width="50">
<img src="/mod/icon/chimuc/4.png" ></td><td width="auto" valign="center">
<font size="1"><i>'.$xu.'</i></font></td></tr></tbody></table></div>';


echo'<div class="pmenu2"><table cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td width="50">
<img src="/mod/icon/chimuc/2.png" ></td><td width="auto" valign="center">
<font size="1"><i>'.$luong.'</i></font></td></tr></tbody></table></div>';

echo'<div class="pmenu2"><table cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td width="50">
<img src="/mod/icon/chimuc/3.png"></td><td width="auto" valign="center">
<font size="1"><i>'.$luongkhoa.'</i></font></td></tr></tbody></table></div>';

echo'<div class="pmenu2"><table cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td width="50">
<img src="/mod/icon/chimuc/1.png" ></td><td width="auto" valign="center">
'.number_format($user['level']).' +'.number_format($user['chisolevel']).'% ('.number_format($user['exp']).' Exp)</td></tr></tbody></table></div>';

echo'<div class="pmenu2"><table cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td width="50">
<img src="/mod/icon/chimuc/6.png" ></td><td width="auto" valign="center">'.$vip.'</td></tr></tbody></table></div>';

echo'</div></td>
</tr></tbody></table>';
echo'</center></div>';

echo'</br><center>';
if($datauser['id'] != $user['id']) {

echo'<a id="click"><img src="/icon/hot/giaodich.png" title="Giao dịch"></a><div id="show" style="display: none;"><a href="/mod/giaodich.php?act=danh&id=' . $user['id'] . '" style="font-weight:bold;"><img src="/icon/hot/danh.png" style="" title="Đánh"></a><a href="/game/ott/
?moi&id=' . $user['id'] . '" style="font-weight:bold;">  
<img src="/icon/hot/oantuti.png" style="" title="Oẳn tù tì"></a><a href="/mod/giaodich.php?act=hon&id='.$user[id].'">
 <img src="/icon/hot/tim.png" style="" title="Hôn"></a> <a href="/farm/account.php?id=' . $user['id'] . '">
 <img src="/icon/hot/home.png" style="" title="Nông trại"></a><a href="/mail/mail.php?id='.$user[id].'"> <img src="/icon/hot/sms.png" style="" title="Tin nhắn"></a>';
echo'</div>';
}
}

echo '</div>';




require_once('../incfiles/end.php');
?>

<script type="text/javascript"> 
$('#c1').click(function() {  
$('#s1').toggle('fast','linear');  
}); 
$('#c2').click(function() {  
$('#s2').toggle('fast','linear');  
}); 
$('#c3').click(function() {  
$('#s3').toggle('fast','linear');  
}); 
$('#c4').click(function() {  
$('#s4').toggle('fast','linear');  
}); 
$('#c5').click(function() {  
$('#s5').toggle('fast','linear');  
}); 

$('#click').click(function() {  
$('#show').toggle('fast','linear');  
}); 
$('#vao').click(function() {  
$('#ra').toggle('fast','linear');  
}); 
$('#cpoke').click(function() {  
$('#showpoke').toggle('fast','linear');  
}); 

</script>
<script>
<!--
document.write(unescape("%3Cstyle%3E.ducnghia_item%20%7B%0Abackground%3Aurl%28/lethinh/item.png%29%3B%0A%20width%3A48px%3B%20height%3A48px%3B%20display%3A%20inline-block%3B%20text-align%3Acenter%3B%20position%3Arelative%3B%20z-index%3A%2050%3B%0A%20background-repeat%3A%20no-repeat%3B%0A%7D%3C/style%3E"));
//-->
</script>
