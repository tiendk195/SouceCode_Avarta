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
echo'<div class="phdr">Thông tin '.$user['name'].' ';

echo'</div>';
if ($user['dayb'] == date('j', time()) && $user['monthb'] == date('n', time())) {
echo '<center><div class="gmenu">Hôm nay là sinh sinh nhật ' . $user['name'] . '!!!</center>';
}
echo'<div class="phdrbox">';
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

    include "hienthido.php";


//MOD AO By DUCNGHIA

?> 
 <center><table><tbody><tr><td>
   <div class=ducnghia_ngang><div class=ducnghia_item><?=$ao?><?=$thongtin_ao?>  </div></div><br>
  <div class=ducnghia_ngang><div class=ducnghia_item> <?=$quan?>  <?=$thongtin_quan?>  </div></div><br>
   <div class=ducnghia_ngang><div class=ducnghia_item> <?=$canh?> <?=$thongtin_canh?></div></div><br>
   <div class=ducnghia_ngang><div class=ducnghia_item> <?=$thucung?> <?=$thongtin_thucung ?> </div></div></td>
   
   <td><center><div class=ducnghia_><div class=ducnghia_item> <?=$haoquang?> <?=$thongtin_haoquang?> 

   </div></div>
   <div class=ducnghia_><div class=ducnghia_item> <?=$matna?> <?=$thongtin_matna?> </div></div>
 <br></br>
   <?php
   echo' <div style="width:150px;background-color:white;">';
   if($user[nguoiyeu] == 0){
echo'<div class="lethinh"><b><font color="red">Đang FA</font></b></div>  ';
} else if($user['nguoiyeu'] != 0){

echo'<div class="nenpro">';

    if($ktkh >= 1 AND $user['nhan'] == 0){
echo'<img src="https://i.imgur.com/HqKGFul.png" weigth="25" height="25">';
}
if($ktkh >= 1 AND $user['nhan'] == 1){
echo'<img src="https://i.imgur.com/oKZtXIA.png" weigth="25" height="25">';
}
if($ktkh >= 1 AND $user['nhan'] == 2){
echo'<img src="https://i.imgur.com/qSADbLt.png" weigth="25" height="25">';
}

if($ktkh >= 1 AND $user['nhan'] == 3){
echo'<font color="darkviolet"> Trăm năm hạnh phúc</font> ';
}

if($ktkh >= 1 AND $user['nhan'] >= 4){
echo'<img src="https://i.imgur.com/KRSQoxY.png" weigth="25" height="25">';
}
if($ktkh2 >= 1 AND $ny['nhan'] == 0){
echo'<img src="https://i.imgur.com/HqKGFul.png" weigth="25" height="25">';
}
if($ktkh2 >= 1 AND $ny['nhan'] == 1){
echo'<img src="https://i.imgur.com/oKZtXIA.png" weigth="25" height="25">';
}
if($ktkh2 >= 1 AND $ny['nhan'] == 2){
echo'<img src="https://i.imgur.com/qSADbLt.png" weigth="25" height="25">';
}

if($ktkh2 >= 1 AND $ny['nhan'] == 3){
echo'<font color="darkviolet"> Trăm năm hạnh phúc</font> ';
}

if($ktkh2 >= 1 AND $ny['nhan'] >= 4){
echo'<img src="https://i.imgur.com/KRSQoxY.png" weigth="25" height="25">';
}
echo'</div>  ';

}
//echo'<img src="https://i.imgur.com/qSADbLt.png" weigth="25" height="25">';
echo'  <div style="text-align: center;">Thông tin<br><small>'.$user[name].'</small><br> <br> </div>';
if($user['nguoiyeu'] == 0){

echo'<img  src="/avatar/'.$user[id].'.png" width="45" height="48"/> <br>';
echo'<b><font color="red">HP <span>'.number_format($user['hp']).'/'.number_format($user['hpfull']).'<font></font></span><font><br><font color="blue">SM <span>'.number_format($user['sucmanh']).'<br></span></font></font></font></b>';
echo'</div>';
} else
if($user['nguoiyeu'] != 0){
	//if ($user['nhan'] != 0) {
echo'
<label style="display: inline-block;text-align: center;"><b style="font-size: 9px;font-weight:bold;text-align: center;"><font color="red">'.$user[name].'</font></b><br><img  src="../avatar/'.$user['id'].'.png" width="45" height="48"/></label> &nbsp &nbsp';

if($ktkh >= 1){
echo' <img src="/icon/nhan/'.$user['nhan'].'.png" style="position: absolute;vertical-align: 0px;margin:35px 0 0 -10px">';
}
if($ktkh2 >= 1){
echo' <img src="/icon/nhan/'.$ny['nhan'].'.png" style="position: absolute;vertical-align: 0px;margin:35px 0 0 -10px">';
}
	
echo'<label style="display: inline-block;text-align: center;"><b style="font-size: 9px;color:red;font-weight:bold;text-align: center;">'.$ny[name].'</b><br>';
 

echo'<img src="/avatar/'.$user['nguoiyeu'].'.png" width="45" height="48" class="xavt" title="'.$ny[name].'"></label></br>';

echo'<b><font color="red">HP <span>'.number_format($user['hp']).'/'.number_format($user['hpfull']).'<font></font></span><font><br><font color="blue">SM <span>'.number_format($user['sucmanh']).'<br></span></font></font></font></b>';
echo'</div>';
	echo'</div> <br>';

echo'</div></div></br>';

	}


   ?>
   
   

   
<div class=ducnghia_><div class=ducnghia_item> <?=$kinh?>  <?=$thongtin_kinh?> </div></div>
<div class=ducnghia_><div class=ducnghia_item> <?=$khuonmat?> <?=$thongtin_khuonmat?> </div> </div></center></td>





<td><div class=ducnghia_trai><div class=ducnghia_item> <?=$toc?>  <?=$thongtin_toc?> </div> </div><br>
<div class=ducnghia_trai><div class=ducnghia_item> <?=$mat?>  <?=$thongtin_mat?> </div> </div><br>
<div class=ducnghia_trai><div class=ducnghia_item> <?=$non?>  <?=$thongtin_non?>   </div> </div> <br>
<div class=ducnghia_trai><div class=ducnghia_item> <?=$docamtay?> <?=$thongtin_docamtay?>    </div></div></div></td></tr>





</tbody>


</table>


<?php

echo'</label>';
/*
if($user['nguoiyeu'] != 0){
if($ktkh >= 1){
echo'<img src="/icon/nhan/'.$kh['nhan'].'.png">';
}
if($ktkh2 >= 1){
echo'<img src="/icon/nhan/'.$kh2['nhan'].'.png">';
}
echo'<label style="display: inline-block;text-align: center;"><b style="font-size: 7px;font-weight:bold;text-align: center;"><font color="red">'.$ny[name].'</font></b><br>';
 if($ny['gif'] AND $ny['hieuung'] == 1) {
echo'<i class="fmod"><img class="xavt" src="../avatar/gif/' . $ny['gif'] . '.png" width="55" height="55" title="' . $ny['name'] . '"/></i></label>';
} else if($ny['hieuung'] == 1){
	echo'<i class="fmod"><img src="/avatar/'.$user['nguoiyeu'].'.png" width="55" height="55" class="xavt" title="'.$ny[name].'"></label></i>';
} else if($ny['danhnhau'] > time()){
echo'<img src="/icon/danhnhau.gif" width="55" height="55" class="xavt" title="'.$ny[name].'"></label>';
} else  if($ny['gif']) {
echo'<img class="xavt" src="../avatar/gif/' . $ny['gif'] . '.png" width="55" height="55" title="' . $ny['name'] . '"/></label>';
} else {
echo'<img src="/avatar/'.$user['nguoiyeu'].'.png" width="55" height="55" class="xavt" title="'.$ny[name].'"></label>';
}
}
echo'<br>';
if($user['nguoiyeu'] != 0){
if($ktkh >= 1 AND $kh['nhan'] == 1){
echo'<center><font color="red"><b>♥ Cặp ♥ Đôi ♥ Mới ♥ Cưới ♥</center></b><br>';
}
if($ktkh >= 1 AND $kh['nhan'] == 2){
echo'<center><font color="red"><b>♥ Cặp ♥ Đôi ♥ Hạnh ♥ Phúc ♥</center></b><br>';
}

if($ktkh >= 1 AND $kh['nhan'] == 3){
echo'<center><font color="red"><b>♥ Trăm ♥ Năm ♥ Hạnh ♥ Phúc ♥</center></b><br>';
}

if($ktkh >= 1 AND $kh['nhan'] >= 4){
echo'<center><font color="red"><b>♥ Tình ♥ Yêu ♥ Vĩnh ♥ Cửu ♥</center></b><br>';
}
if($ktkh2 >= 1 AND $kh2['nhan'] == 1){
echo'<center><font color="red"><b>♥ Cặp ♥ Đôi ♥ Mới ♥ Cưới ♥</center></b><br>';
}
if($ktkh2 >= 1 AND $kh2['nhan'] == 2){
echo'<center><font color="red"><b>♥ Cặp ♥ Đôi ♥ Hạnh ♥ Phúc ♥</center></b><br>';
}

if($ktkh2 >= 1 AND $kh2['nhan'] == 3){
echo'<center><font color="red"><b>♥ Trăm ♥ Năm ♥ Hạnh ♥ Phúc ♥</center></b><br>';
}

if($ktkh2 >= 1 AND $kh2['nhan'] >= 4){
echo'<center><font color="red"><b>♥ Tình  ♥ Yêu ♥ Vĩnh ♥ Cửu ♥</center></b><br>';
}
echo'</font>';
}
*/
echo'</div>';
echo'</div>';
echo '<center>';
if($datauser['id'] != $user['id']) {

echo'<a id="click"><img src="/icon/hot/giaodich.png" title="Giao dịch"></a><div id="show" style="display: none;"><a href="/mod/giaodich.php?act=danh&id=' . $user['id'] . '" style="font-weight:bold;"><img src="/icon/hot/danh.png" style="" title="Đánh"></a><a href="/game/ott/
?moi&id=' . $user['id'] . '" style="font-weight:bold;">  
<img src="/icon/hot/oantuti.png" style="" title="Oẳn tù tì"></a><a href="/mod/giaodich.php?act=hon&id='.$user[id].'">
 <img src="/icon/hot/tim.png" style="" title="Hôn"></a> <a href="/farm/account.php?id=' . $user['id'] . '">
 <img src="/icon/hot/home.png" style="" title="Nông trại"></a><a href="/mail/mail.php?id='.$user[id].'"> <img src="/icon/hot/sms.png" style="" title="Tin nhắn"></a>';
echo'</div>';
}
echo'<a id="vao"><img src="/icon/hot/thongtin.png" style="margin-left:10px" title="Thông tin"></a><div id="ra" style="display: none;"><br>';

$time = time();

if($user['vip'] == 0){
$vip = '0';
}
if($user['vip'] == 1){
$vip = '<font color="white" style="text-shadow: 0 0 0.2em #666666, 0 0 0.2em #666666,  0 0 0.2em #666666"><b>[<img src="/icon/vip/vip1.gif">VIP1]</b></font>';
}
if($user['vip'] == 2){
$vip = '<font color="white" style="text-shadow: 0 0 0.2em #ff33ff, 0 0 0.2em #ff33ff, 0 0 0.2em #ff33ff"><b>[<img src="/icon/vip/vip2.gif">VIP2]</b></font>';
}
if($user['vip'] == 3){
$vip = '<font color="white" style="text-shadow: 0 0 0.2em #ff6633, 0 0 0.2em #ff6633,  0 0 0.2em #ff6633"><b>[<img src="/icon/vip/vip3.gif">VIP3]</b></font>';
}
if($user['vip'] == 4){
$vip = '<font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff"><b>[<img src="/icon/vip/vip4.gif">VIP4]</b></font>';
}
if($user['vip'] == 5){
$vip = '<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b>[<img src="/icon/vip/vip5.gif">VIP5]</b></font>';
}
if($user['vip'] == 6){
$vip = '<font color="white" style="text-shadow: 0 0 0.2em #ff3399, 0 0 0.2em #ff3399,  0 0 0.2em #ff3399"><b>[<img src="/icon/vip/vip6.gif">VIP6]</b></font>';
}
if($user['vip'] == 7){
$vip = '<font color="white" style="text-shadow: 0 0 0.2em #009900, 0 0 0.2em #009900,  0 0 0.2em #009900"><b>[<img src="/icon/vip/vip7.gif">VIP7]</b></font>';
}
if($user['vip'] == 8){
$vip = '<font color="white" style="text-shadow: 0 0 0.2em #009900, 0 0 0.2em #009900,  0 0 0.2em #009900"><b>[<img src="/icon/vip/vip7.gif">VIP7]</b></font>';
}
if($user['vip'] == 9){
$vip = '<font color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>[<img src="/icon/vip/vip9.gif">VIP9]</b></font>';
}
if($user['vip'] == 10){
$vip = '<font color="white" style="text-shadow: 0 0 0.2em #F08080, 0 0 0.2em #F08080,  0 0 0.2em #F08080"><b>[<img src="/icon/vip/vip10.gif">VIP10]</b></font>';
}
if($user['vip'] == 11){
$vip = '<b><font color="ff9900" style="text-shadow: 3px 3px 11px #ff9900;"> [S</font><font color="red" style="text-shadow: 3px 3px 11px #ff0000;">V</font><font color="green" style="text-shadow: 3px 3px 11px #009900;">I</font><font color="0099ff" style="text-shadow: 3px 3px 11px #0099ff;">P</font><font color="9932CC" style="text-shadow: 3px 3px 11px #9932CC;">★] </font></b>';
}
if($user['vip'] == 12){
$vip = '<i class="fmod"><b><font color="ff9900" style="text-shadow: 3px 3px 11px #ff9900;"> [S</font><font color="red" style="text-shadow: 3px 3px 11px #ff0000;">V</font><font color="green" style="text-shadow: 3px 3px 11px #009900;">I</font><font color="0099ff" style="text-shadow: 3px 3px 11px #0099ff;">P</font><font color="9932CC" style="text-shadow: 3px 3px 11px #9932CC;">★] </font></b></i>';
}




echo'<div class="omenu">Cấp độ:  '.number_format($user['level']).' +'.number_format($user['chisolevel']).'% </div>';
if($user['vip'] >0){

if($user['hienthivip'] ==1){

echo'<div class="omenu">Cấp VIP: '.$vip.'</i></div>';
} else if($user['hienthivip'] ==0){

	echo'<div class="omenu">Cấp VIP: Đã Ẩn</i></div>';
}
}
if($user['suckhoe'] >= 0 and $user['suckhoe'] < 50){
$sk='<img src="/images/chiso/0.png">';
}
if($user['suckhoe'] >= 50 and $user['suckhoe'] < 80){
$sk='<img src="/images/chiso/50.png">';
}
if($user['suckhoe'] >= 80 and $user['suckhoe'] <= 100){
$sk='<img src="/images/chiso/100.png">';
}
if($user['gayroi'] >= 0 and $user['gayroi'] < 50){
$gr='<img src="/images/chiso/0.png">';
}
if($user['gayroi'] >= 50 and $user['gayroi'] < 80){
$gr='<img src="/images/chiso/50.png">';
}
if($user['gayroi'] >= 80 and $user['gayroi'] <= 100){
$gr='<img src="/images/chiso/100.png">';
}

echo'
<div class="omenu">Sức khỏe: '.$sk.' '.$user['suckhoe'].'</div>
<div class="omenu">Gây rối: '.$gr.' '.$user['gayroi'].'</div>';
if ($datauser['rights'] >=9 ) {
	echo'
<tr>
<td class="left-info">ID Users</td>
<td class="right-info"><span>' . $user['id'] . '</span></td>
</tr>';
echo'</br><tr><td class="left-info">Chức vụ</td>
<td class="right-info"><span>';
if($user['rights'] == 0){
echo'<b>Member</b>';
}
if($user['rights'] == 1){
echo'<b>Không rõ</b>';
}
if($user['rights'] == 2){
echo'<b><font color="bule">Trial Mod</b></font>';
}
if($user['rights'] == 3){
echo'<b><font color="bule">Mod</b></font>';
}
if($user['rights'] == 4){
echo'<b><font color="bule">MC</b></font>';
}
if($user['rights'] == 5){
echo'<b><font color="red">Box Art</b></font>';
}
if($user['rights'] == 6){
echo'<b><font color="gold">Game Master</b></font>';
}

if($user['rights'] == 7){
echo'<b><font color="green">SMod</b></font>';
}
if($user['rights'] == 9){
echo'<b><font color="red">Admin</b></font>';
}
if($user['rights'] == 10){
echo'<b><font color="red">SLV</b></font>';
}
if($user['rights'] >= 11){
echo'<b>Member</b>';
}
if($user['id'] == 1){
echo'<b><font color="red"> (Boss)</b></font>';
}
if($user['id'] == 2){
echo'<b><font color="red"> (Thay Trời Hành Đạo)</b></font>';
}
if($user['id'] == 10){
echo'<b><font color="red"> (BOX ART)</b></font>';
}
if($user['id'] == 5){
echo'<b><font color="red"> (Phán Là Trúng)</b></font>';
}
if($user['id'] == 3){
echo'<b><font color="red"> (Shiro)</b></font>';
}
if($user['id'] == 4100){
echo'<b><font color="red"> (Xinh Gái Nhất Web)</b></font>';
}
if($user['id'] == 4073){
echo'<b><font color="red"> (Thần Tiên Tỷ Tỷ)</b></font>';
}
if($user['kichhoat'] == 0){
echo'</br><tr>
<td class="left-info">Tình trạng</td>
<td class="right-info"><span>Chưa Kích Hoạt</span></td>
</tr>';
}
if($user['kichhoat'] == 1){
echo'</br><tr>
<td class="left-info">Tình Trạng</td>
<td class="right-info"><span><font color="green">√ Đã Kích Hoạt</font></span></td>
</tr>';
}
echo'</span></td>';

echo'
</br></tr>
<tr>
<td class="left-info">Tên Thật</td>
<td class="right-info"><span>' . $user['imname'] . '</span></td>
</tr>
</br><tr>
<td class="left-info">Ngày Sinh</td>
<td class="right-info"><span>Ngày ' . $user['dayb'] . ' Tháng ' . $user['monthb'] . ' Năm ' . $user['yearofbirth'] . '</span></td>
</tr>
</br><tr>
<td class="left-info">Giới Tính</td>
<td class="right-info">
<span>
' . ($user['sex'] == 'm' ? $lng_profile['registered_m'] : $lng_profile['registered_w']) . '</span>
</td>
</tr></br><tr>
<td class="left-info">SM</td>
<td class="right-info"><span>' . number_format($user['sucmanh']) . '</span></td>
</tr></br>
<tr>
<td class="left-info">HP</td>
<td class="right-info"><span>' . number_format($user['hp']) . '/' . number_format($user['hpfull']) . '</span></td>
</tr>
<tr></br>
<tr>
<td class="left-info">Xu</td>
<td class="right-info"><span>' . number_format($user['xu']) . ' xu</span></td>
</tr></br>
<tr>
<td class="left-info">Lượng</td>
<td class="right-info"><span>' . number_format($user['luong']) . ' lượng</span></td>
</tr></br>
<tr>
<td class="left-info">Lượng khóa</td>
<td class="right-info"><span>' . number_format($user['luongkhoa']) . ' lượng</span></td>
</tr></br>
<tr>
<td class="left-info">Level</td>
<td class="right-info"><span>' . lv($user['id']) . '</span></td>
</tr>

</tr>';


echo'</td>

</tr>
</table>';
}

if ($rights >= 7 && !$user['preg'] && empty($user['regadm'])) {
echo '<div class="rmenu">' . $lng_profile['awaiting_registration'] . '</div>';
}

$total_friends = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_contact` WHERE `user_id`='{$user['id']}' AND `type`='2' AND `friends`='1'"), 0);


echo'</div>';
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
<script type="text/JavaScript">
var message="NoRightClicking"; function defeatIE() {if (document.all) {(message);return false;}} function defeatNS(e) {if (document.layers||(document.getElementById&&!document.all)) { if (e.which==2||e.which==3) {(message);return false;}}} if (document.layers) {document.captureEvents(Event.MOUSEDOWN);document.onmousedown=defeatNS;} else{document.onmouseup=defeatNS;document.oncontextmenu=defeatIE;} document.oncontextmenu=new Function("return false")
</script>
<script type='text/javascript'>
//<![CDATA[
//Ctrl+U
shortcut={all_shortcuts:{},add:function(a,b,c){var d={type:"keydown",propagate:!1,disable_in_input:!1,target:document,keycode:!1};if(c)for(var e in d)"undefined"==typeof c[e]&&(c[e]=d[e]);else c=d;d=c.target,"string"==typeof c.target&&(d=document.getElementById(c.target)),a=a.toLowerCase(),e=function(d){d=d||window.event;if(c.disable_in_input){var e;d.target?e=d.target:d.srcElement&&(e=d.srcElement),3==e.nodeType&&(e=e.parentNode);if("INPUT"==e.tagName||"TEXTAREA"==e.tagName)return}d.keyCode?code=d.keyCode:d.which&&(code=d.which),e=String.fromCharCode(code).toLowerCase(),188==code&&(e=","),190==code&&(e=".");var f=a.split("+"),g=0,h={"`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":":","'":'"',",":"<",".":">","/":"?","\\":"|"},i={esc:27,escape:27,tab:9,space:32,"return":13,enter:13,backspace:8,scrolllock:145,scroll_lock:145,scroll:145,capslock:20,caps_lock:20,caps:20,numlock:144,num_lock:144,num:144,pause:19,"break":19,insert:45,home:36,"delete":46,end:35,pageup:33,page_up:33,pu:33,pagedown:34,page_down:34,pd:34,left:37,up:38,right:39,down:40,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,f8:119,f9:120,f10:121,f11:122,f12:123},j=!1,l=!1,m=!1,n=!1,o=!1,p=!1,q=!1,r=!1;d.ctrlKey&&(n=!0),d.shiftKey&&(l=!0),d.altKey&&(p=!0),d.metaKey&&(r=!0);for(var s=0;k=f[s],s<f.length;s++)"ctrl"==k||"control"==k?(g++,m=!0):"shift"==k?(g++,j=!0):"alt"==k?(g++,o=!0):"meta"==k?(g++,q=!0):1<k.length?i[k]==code&&g++:c.keycode?c.keycode==code&&g++:e==k?g++:h[e]&&d.shiftKey&&(e=h[e],e==k&&g++);if(g==f.length&&n==m&&l==j&&p==o&&r==q&&(b(d),!c.propagate))return d.cancelBubble=!0,d.returnValue=!1,d.stopPropagation&&(d.stopPropagation(),d.preventDefault()),!1},this.all_shortcuts[a]={callback:e,target:d,event:c.type},d.addEventListener?d.addEventListener(c.type,e,!1):d.attachEvent?d.attachEvent("on"+c.type,e):d["on"+c.type]=e},remove:function(a){var a=a.toLowerCase(),b=this.all_shortcuts[a];delete this.all_shortcuts[a];if(b){var a=b.event,c=b.target,b=b.callback;c.detachEvent?c.detachEvent("on"+a,b):c.removeEventListener?c.removeEventListener(a,b,!1):c["on"+a]=!1}}},shortcut.add("Ctrl+U",function(){top.location.href="/"});
//]]>
</script>
