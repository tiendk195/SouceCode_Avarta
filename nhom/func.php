<?php
if(!$user_id) {
echo '<div class="omenu">Chỉ thành viên trong diễn đàn mới có thể sử dụng!</div>';
require('../incfiles/end.php');
exit;
}

$time= time();
//func time viet bai
function ngaygio($var) {
$time = time();
$jun = round(($time-$var)/60);
$shift = ($system_set['timeshift']+$user_set['timeshift'])*3600;
if (date('Y', $var) == date('Y', time())) {
if($jun < 1) {
$jun='Vừa xong';
}
if($jun >= 1 && $jun < 60){
$jun = "$jun phút trước";
}
if($jun >= 60 && $jun < 1440){
$jun = round($jun/60);
$jun = "$jun giờ trước";
}
if($jun >= 1440 && $jun < 2880){
$jun = "Hôm qua";
}
if($jun >= 2880 && $jun < 10080){
$day = round($jun/60/24);
$jun = "$day ngày trước";
}
}
if($jun > 10080){
$jun = date("d/m/Y - H:i", $var+$shift);
}
$xuat = '<span class="xam">'.$jun.'</span>';
return $xuat;
}
//func hien tên nick
function ten_nick($id,$set=0,$sid=0) {
$var = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$id."'"));
$vad = mysql_fetch_array(mysql_query("SELECT * FROM `nhom_user` WHERE `id`='".$sid."'AND `user_id`='".$id."'"));

$array = array(
1 => '<b><font color="008000">(Phó Bang)</font></b>',
2 => '<b><font color="ff0000">(Bang Chủ)</font></b>');

if($set==0) {
$xuat .= (time() > $var['lastdate'] + 300 ? ' <img style="vertical-align:middle;" title="' . $var['from'] . ' is offline" src="/images/off.png" alt="offline"/> ' : '<img style="vertical-align:middle;" title="' . $var['from'] . ' is online" src="/images/on.png" alt="online"/> ');
$xuat .= ' <a href="/users/profile.php?user='.$id.'"><span class="vmenu"><b>'.$var['name'].'</b></span></a>';
$xuat .='<span class="xam">'.$array[$vad['rights']].'</span>';
} else {
$xuat .= '<table cellpadding="0" cellspacing="0"><tr><td>';
$ur = @getimagesize('../avatar/'.$id.'.png');
if(is_array($ur))
$xuat .= '<img src="../avatar/' . $id . '.png" width="45" height="45" alt="" />&#160;';
else
$xuat .= '<img src="../avatar/' . $id . '.png" width="45" height="45" alt="" />&#160;';

$xuat .= '</td><td align="left">';
$xuat .= (time() > $var['lastdate']+300 ? '<span style="color:red;">&#8226;</span>' : '<span style="color:green;">&#8226;</span>');
$xuat .= '&#160<a href="/users/profile.php?user='.$id.'"><span class="vmenu"><b>'.$var['name'].'</b></span></a> ';
$xuat .='<span class="xam">'.$array[$vad['rights']].'</span>';
}
$xuat .= '</td></tr></table>';

return $xuat;
}
//func xuat thong tin tu user
function user_nick($id) {
$var = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$id."'"));
return $var;
}
//func hien head nhom
function head_nhom($id,$user_id) {
	global $datauser;
$nhom = mysql_fetch_array(mysql_query("SELECT * FROM `nhom` WHERE `id`='".$id."'"));
$chunhom = user_nick($nhom['user_id']);
$array = array(
0 => 'Nhóm công khai',
1 => 'Nhóm đóng',
2 => 'Nhóm kín');

$ktdem = mysql_result(mysql_query("SELECT COUNT(*) FROM `nhom_user` WHERE `user_id`='".$user_id."' AND `id`='".$id."'"), 0);
$kt = mysql_fetch_array(mysql_query("SELECT * FROM `nhom_user` WHERE `user_id`='".$user_id."' AND `id`='".$id."'"));
$t = $nhom['time'];
$tv =mysql_result(mysql_query("SELECT COUNT(*) FROM `nhom_user` WHERE `id`='".$id."' AND `duyet`='1'") ,0);

$xuat .= '<div class="phdr">Chức năng Clan</div>'.($ktdem == 0 ? '
<div class="omenu">
<a href="page.php?thamgia&id='.$id.'">→ Xin Vào Clan</div>':''.($kt['duyet'] == 0 ? '<div class="omenu"><a href="page.php?rutkhoi&id='.$id.'">→ Đang chờ duyệt</div>':''.($kt['duyet'] == 1 && $kt['rights'] != 2 ? '
<div class="omenu"><a href="page.php?rutkhoi&id='.$id.'">Rời clan</div>':'').'').'').'';

return $xuat;
}
function catchu($string,$start,$length){
$arrwords = explode(" ",$string);
$arrsubwords=array_slice($arrwords,$start,$length);
$result = implode(" ",$arrsubwords);
return $result;
}
//func lay info nhom theo id
function nhom($id) {
$var = mysql_fetch_array(mysql_query("SELECT * FROM `nhom` WHERE `id`='".$id."'"));
return $var;
}
//func chuc vu trong nhom
function quyen_nhom($id,$user) {
$var = mysql_fetch_array(mysql_query("SELECT `rights` FROM `nhom_user` WHERE `id`='".$id."' AND `user_id`='".$user."'"));
$mang = array(
0 => 'Thành viên', 1 => 'Phó Nhóm', 2 => 'Trưởng Nhóm');
return $mang[$var['rights']];
}
//func cat ngan
function thugon($text,$id,$luong=30) {
$tach = explode(' ',$text);
$dem = count($tach);
if($dem > $luong) {
$xuat =functions::checkout($text);
$xuat = functions::smileys(tags($xuat));
$xuat = ''.catchu(notags($xuat),0,$luong).' ... <a href="action.php?act=post&id='.$id.'">Đọc tiếp... >></a>';
} else {
$xuat =functions::checkout($text, 1, 1);
$xuat = functions::smileys(tags($xuat));
}
return $xuat;
}
//func lay bd theo id
function baidang($id) {
$var = mysql_fetch_array(mysql_query("SELECT * FROM `nhom_bd` WHERE `id`='".$id."'"));
return $var;
}
?>