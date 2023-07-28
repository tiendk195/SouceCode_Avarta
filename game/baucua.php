<?php

define('_IN_JOHNCMS', 1);
$textl = 'Bầu Cua';
require_once ("../incfiles/core.php");
require_once ("../incfiles/head.php");
$time = time();
$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `baucua` WHERE `key`='".$user_id."'"), 0);
function thoigian($from, $to = '') {
if (empty($to))
$to = time();
$diff = (int) abs($to - $from);
if ($diff <= 60) {
$since = sprintf('60s');
} elseif ($diff <= 3600) {
$mins = round($diff / 60);
if ($mins <= 1) {
$mins = 1;
}
/* translators: min=minute */
$since = sprintf('%s phút', $mins);
} else if (($diff <= 86400) && ($diff > 3600)) {
$hours = round($diff / 3600);
if ($hours <= 1) {
$hours = 1;
}
$since = sprintf('%s giờ', $hours);
} elseif ($diff >= 86400) {
$days = round($diff / 86400);
if ($days <= 1) {
$days = 1;
}
$since = sprintf('%s ngày', $days);
}
return $since;
}
//
@mysql_query("DELETE FROM `baucua` WHERE `time`<'".$time."'");
echo'<div class="phdr">Games >> Bầu Cua</div>';
if (!$user_id){
echo'<div class="rmenu">Bạn phải đăng nhập để chơi game này nhé !</div>';
echo'</div>';
require('../incfiles/end.php');
exit;
}

if (isset($_GET['go'])) {
$id = (int)$_GET['id'];
$kt = mysql_result(mysql_query("SELECT COUNT(*) FROM `baucua` WHERE `id`='".$id."'"), 0);
$p = mysql_fetch_array(mysql_query("SELECT * FROM `baucua` WHERE `id`='".$id."'"));
$key = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$p['key']."'"));
if($kt == 0){
echo'<div class="rmenu">Lỗi phòng bạn yêu cầu không tồn tại hoặc đã bị xóa do hết thời gian <a href="/game/baucua.php"><b>[Nhấn Để Quay Lại]</b></a></div>';

} else if($p['key'] == $user_id){
if (isset($_GET['giahan'])) {
if($datauser['luong'] < 3){
echo'<div class="rmenu">Lỗi bạn không đủ 3 lượng để gia hạn</div>';
} else {
echo'<div class="rmenu">Gia hạn thành công +15 phút</div>';
mysql_query("UPDATE `baucua` SET `time`=`time`+'900' WHERE `key`='".$user_id."'");
mysql_query("UPDATE `users` SET `luong`=`luong`-'3' WHERE `id`='".$user_id."'");
}
}
if (isset($_GET['xoa'])) {
echo'<div class="rmenu">Xóa phòng thành công</div>';
@mysql_query("DELETE FROM `baucua` WHERE `id`='".$id."'");
}
echo'<div class="omenu">
'.($datauser[hopthe]=='0'?'
<img class="avatar_b" src="../avatar/'.$datauser['id'].'.png" width="45" height="48"/>':'<img class="avatar_b" src="../detu/ducnghia/'.$datauser['hopthe'].'.gif" width="45" height="48""/>').'<br><b><font color="green">Phòng số: '.$id.'<br></font><font color="blue">Mức cược: '.number_format($p['cuoc']).' xu<br></font><font color="red">Còn '.thoigian($p['time']).' nữa hệ thống sẽ xóa phòng</font></div><div class="menu"><a href="/game/baucua.php/?go&id='.$id.'&giahan"> ▶Gia Hạn Thêm Thời Gian◀</a></div><div class="menu"><a href="/game/baucua.php/?go&id='.$id.'&xoa"> ▶Xóa Phòng◀</a></b></div>';
echo'<div class="phdr">Lịch sử phòng</div>';

$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `baucua_ls` WHERE `phong`='".$id."'"), 0);
$req=mysql_query("SELECT * FROM `baucua_ls` WHERE `phong`='".$id."' ORDER BY `time` DESC LIMIT $start,$kmess");
while($res=mysql_fetch_array($req)) {
      $xxxx=mysql_query("SELECT * FROM `users` WHERE `id` ='".$res['danh']."' ");

    $ducnghia_user =  mysql_fetch_array($xxxx);
echo '<div class="menu">';
echo '
'.($ducnghia_user[hopthe]=='0'?'
<img class="avatar_b" src="../avatar/'.$ducnghia_user['id'].'.png" width="45" height="48"/>':'<img class="avatar_b" src="../detu/ducnghia/'.$ducnghia_user['hopthe'].'.gif" width="45" height="48""/>').'



<b><a href="/member/'.$res['danh'].'">'.nick($res['danh']).'</a> đã';
if($res['win'] == $user_id){
echo' thua bạn nhận được '.number_format($res['xu']).' xu';
} else {
echo' thắng bạn bị trừ '.number_format($res['xu']).' xu';
}
echo '<br><i style="font-size:9px;color:#777;float:right"> (' . functions::thoigian($res['time']) . ')</i><br></div>';
}
if ($tong > $kmess){
echo '<div class="topmenu">' . functions::display_pagination('?page=', $start, $tong, $kmess) . '</div>';
}
if($tong == 0){
echo'<div class="menu">Chưa có ai tham gia phòng</div>';
}
} else {
    $xxxx=mysql_query("SELECT * FROM `users` WHERE `id` ='".$p['key']."' ");

    $ducnghia_user =  mysql_fetch_array($xxxx);
echo '<div class="menu">';

echo'<div class="omenu"><center><label style="display: inline-block;text-align: center;">


'.($ducnghia_user[hopthe]=='0'?'
<img class="avatar_b" src="../avatar/'.$ducnghia_user['id'].'.png" width="45" height="48"/>':'<img class="avatar_b" src="../detu/ducnghia/'.$ducnghia_user['hopthe'].'.gif" width="45" height="48""/>').'


</label>';
echo'<font color="red"><b> VS </b></font>';
echo'<label style="display: inline-block;text-align: center;">

'.($datauser[hopthe]=='0'?'
<img class="xavt" src="../avatar/'.$datauser['id'].'.png" width="45" height="48"/>':'<img class="xavt"  src="../detu/ducnghia/'.$datauser['hopthe'].'.gif" width="45" height="48""/>').'



</label>';
echo'<center><font color="green"><b>Phòng số: '.$id.'</font><br><font color="blue">Mức cược: '.number_format($p['cuoc']).' xu </font><br>Chủ phòng: '.nick($p['key']).'</b>';
echo'</div>';

if (isset($_POST['ok'])) {
$con = intval($_POST['pkoolvn']);
$xx = rand(3,5);
$xu = $p['cuoc']*$xx;

if($datauser['xu'] < $xu){
echo'<div class="rmenu">Lỗi bạn phải có ít nhất '.number_format($xu).' xu để cược</div>';
} else if($key['xu'] < $xu){
echo'<div class="rmenu">Lỗi chủ phòng đã hết xu</div>';
} else if(empty($con)){
echo'<div class="rmenu">Vui lòng chọn 1 trong sáu con</div>';
} else {
$rand = rand(1,2);
$rand1 = rand(1,6);
$rand2 = rand(1,6);
$rand3 = rand(1,6);
echo '<div class="menu">';
echo '<table bgcolor="lightyellow" width="100%" border="1"><tr>';

                        echo '<td width="33%" align="center"><img src="/game/img/baucua/'.$rand1.'.png" alt=""/></td>';
echo '<td width="33%" align="center"><img src="/game/img/baucua/'.$rand2.'.png" alt=""/></td>';
echo '<td width="33%" align="center"><img src="/game/img/baucua/'.$rand3.'.png" alt=""/></td>';
echo '</tr></table>';

if ($con == $rand1 || $con == $rand2 || $con == $rand3) {
echo'<div class="rmenu"><font color="red">Bạn đã thắng và nhận được '.number_format($xu).' xu</font></div>';
mysql_query("INSERT INTO `baucua_ls` SET
	`danh` = '$user_id',
	`xu` = '$xu',
	`win` = '$user_id',`phong` = '$id',`time` = '".time()."'
	");
mysql_query("UPDATE `users` SET `xu`=`xu`+'{$xu}' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `users` SET `xu`=`xu`-'{$xu}' WHERE `id`='".$p['key']."'");
$text = '<b><a href="/member/'.$user_id.'.html"/>'.nick($user_id).'</a> </b> vừa thắng bầu cua bạn bị trừ '.number_format($xu).' xu';
mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$p['key']."',
                `user` = '".$p['key']."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
} else {
echo'<div class="rmenu"><font color="red">Bạn đã thua và bị trừ '.number_format($xu).' xu. Chúc bạn may mắn lần sau</font></div>';
mysql_query("INSERT INTO `baucua_ls` SET `danh` = '$user_id',`xu` = '$xu',`win` = '{$p[key]}',`phong`='$id',`time`='".time()."'");
mysql_query("UPDATE `users` SET `xu`=`xu`-'{$xu}' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `users` SET `xu`=`xu`+'{$xu}' WHERE `id`='".$p['key']."'");
$text = '<b><a href="/member/'.$user_id.'.html"/>'.nick($user_id).'</a> </b> vừa thua bầu cua bạn nhận được '.number_format($xu).' xu';
mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$p['key']."',
                `user` = '".$p['key']."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
}

echo'</div>';



}
}


echo '<div class="pmenu"><form method="post"><table bgcolor="lightyellow" width="100%"><tr><td width="33%" align="center"><img src="/game/img/baucua/1.png" alt=""/><br/><input type="radio" name="pkoolvn" value="1"></td><td width="33%" align="center"><img src="/game/img/baucua/2.png" alt=""/><br/><input type="radio" name="pkoolvn" value="2"></td><td width="34%" align="center"><img src="/game/img/baucua/3.png" alt=""/><br/><input type="radio" name="pkoolvn" value="3"></td></tr><tr><td width="33%" align="center"><img src="/game/img/baucua/4.png" alt=""/><br/><input type="radio" name="pkoolvn" value="4"></td><td width="33%" align="center"><img src="/game/img/baucua/5.png" alt=""/><br/><input type="radio" name="pkoolvn" value="5"></td><td width="34%" align="center"><img src="/game/img/baucua/6.png" alt=""/><br/><input type="radio" name="pkoolvn" value="6"></a></td></tr></table></div>
<div class="menu"><center><input type="submit" name="ok" value="Đặt Cược"></center></form></div>';





echo'<div class="phdr">Lịch sử phòng</div>';
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `baucua_ls` WHERE `phong`='".$id."'"), 0);
$req=mysql_query("SELECT * FROM `baucua_ls` WHERE `phong`='".$id."' ORDER BY `time` DESC LIMIT $start,$kmess");
while($res=mysql_fetch_array($req)) {
echo '<div class="menu">';
echo '<img src="'.$home.'/avatar/'.$res['danh'].'.png" class="avatar_vina"/> <b><a href="/member/'.$res['danh'].'.html">'.nick($res['danh']).'</a> đã';

if($res['win'] == $p['key']){
echo' thua '.nick($p['key']).' và bị trừ '.number_format($res['xu']).' xu';
} else {
echo' thắng '.nick($p['key']).' và nhận được '.number_format($res['xu']).' xu';
}
echo '<br><i style="font-size:9px;color:#777;float:right"> (' . functions::thoigian($res['time']) . ')</i><br></div>';
}
if ($tong > $kmess){
echo '<div class="topmenu">' . functions::display_pagination('?page=', $start, $tong, $kmess) . '</div>';
}
if($tong == 0){
echo'<div class="menu">Chưa có ai tham gia phòng</div>';
}


echo'</div>';
}
require('../incfiles/end.php');
exit;
}








if($check == 0){
if (isset($_GET['tao'])) {
if (isset($_POST['tao'])) {
$cuoc = (int)$_POST['xu'];
$cap = (int)$_POST['cap'];
$xu = array(
1 => '5000',
2 => '15000',
3 => '20000',
);
$xu = $xu[$cap];
$vip = array(
1 => '0',
2 => '0',
3 => '5',
);
$vip = $vip[$cap];


if($cuoc > $xu){
echo'<div class="rmenu">Lỗi bạn chỉ được phép đặt cược < '.number_format($xu).' xu hãy chọn phòng cao cấp hơn để đặt cược nhiều hơn</div>';
} else if($datauser['vip'] < $vip){
echo'<div class="rmenu">Lỗi phòng này yêu cầu <b>[VIP'.$vip.'] </b> trở lên mới có thể tạo</div>';
} else if($datauser['xu'] < $cuoc || $cuoc < 1){
echo'<div class="rmenu">Lỗi bạn phải có ít nhất '.number_format($cuoc).' xu để chơi</div>';
} else {
if($cap == 3){
if($datauser['timevip'] < time()){
echo'<div class="rmenu">Lỗi vip của bạn đã hết hạn không thể tạo phòng</div>';
require_once ("../incfiles/end.php");
exit;
}
}
if($cap == 1){
if($datauser['xu'] < 5000){
echo'<div class="rmenu">Lỗi bạn không đủ 5.000 xu</div>';
require_once ("../incfiles/end.php");
exit;
} else {
mysql_query("UPDATE `users` SET `xu`=`xu`-'5000' WHERE `id`='".$user_id."'");
}
}
if($cap == 2){
if($datauser['xu'] < 15000){
echo'<div class="rmenu">Lỗi bạn không đủ 15.000 xu</div>';
require_once ("../incfiles/end.php");
exit;
} else {
mysql_query("UPDATE `users` SET `xu`=`xu`-'15000' WHERE `id`='".$user_id."'");
}
}
if($cap == 3){
if($datauser['luong'] < 20){
echo'<div class="rmenu">Lỗi bạn không đủ 20 lượng</div>';
require_once ("../incfiles/end.php");
exit;
} else {
mysql_query("UPDATE `users` SET `luong`=`luong`-'20' WHERE `id`='".$user_id."'");
}
}

$timet = time()+900;
	mysql_query("INSERT INTO `baucua` SET
	`key` = '$user_id',
	`cap` = '$cap',
	`cuoc` = '$cuoc',
	`time` = '".$timet."'
	");
	$kiemphong = mysql_fetch_array(mysql_query("SELECT * FROM `baucua` WHERE `key` = '$user_id'"));
$avatar = '@'.$login.' vừa tạo phòng bầu cua [url='.$home.'/game/baucua.php?go&id='.$kiemphong['id'].'][b]Bấm Vào Đây[/b][/url] để tham gia';
        $time = time();
        mysql_query("INSERT INTO `guest` SET
            `adm` = '0',
            `time` = '$time',
            `user_id` = '256',
            `name` = 'BOT',
            `text` = '" . mysql_real_escape_string($avatar) . "',
            `ip` = '0000',
            `browser` = 'IPHONE'
        ");

Header('location: /game/baucua.php?go&id='.$kiemphong['id'].'');
}
}
echo'<div class="pmenu">Mức cược (xu):<br><form method="post">
<input type="text" name="xu" value="" size="15"><br>
Cấp phòng: <br><select name="cap">
<option value = "1">Sơ Cấp</option><option value = "2">Cao Cấp</option><option value = "3">VIP</option></select><br>

	<input class="nut" type="submit" name="tao" value="Tạo"> </form></div>';
echo'<div class="menu"><b>Phí tạo phòng:</b><br>- Sơ cấp: 5.000 xu<br>- Cao cấp: 15.000 xu<br>- [VIP]: 20 lượng</div>';
require_once ("../incfiles/end.php");
exit;
}
echo'<div class="menu"><center><a href="?tao"><b>▶Tạo Phòng◀</b></a></center></div>';
} else {
$kiemphong = mysql_fetch_array(mysql_query("SELECT * FROM `baucua` WHERE `key` = '$user_id'"));
Header('location: /game/baucua.php?go&id='.$kiemphong['id'].'');
}

$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `baucua` "), 0);
$req=mysql_query("SELECT * FROM `baucua` WHERE `id` > '0' ORDER BY `cap` DESC LIMIT $start,$kmess");

while($res=mysql_fetch_array($req)) {
    $xxxx=mysql_query("SELECT * FROM `users` WHERE `id` ='".$res['key']."' ");

    $ducnghia_user =  mysql_fetch_array($xxxx);
echo '<div class="menu">';
if($res['cap'] == 3){
echo'
'.($ducnghia_user[hopthe]=='0'?'
<img class="avatar_b" src="../avatar/'.$ducnghia_user['id'].'.png" width="45" height="48"/>':'<img class="avatar_b" src="../detu/ducnghia/'.$ducnghia_user['hopthe'].'.gif" width="45" height="48""/>').'



<a href="?go&id='.$res['id'].'"><b><font color="red">▶Phòng số '.$res['id'].' [VIP]</font>
</a></b>  <b><font color="blue"> - '.number_format($res['cuoc']).' xu</font> <br>Chủ phòng: '.nick($res['key']).'</b>';
} else {
echo ''.($ducnghia_user[hopthe]=='0'?'
<img class="avatar_b" src="../avatar/'.$ducnghia_user['id'].'.png" width="45" height="48"/>':'<img class="avatar_b" src="../detu/ducnghia/'.$ducnghia_user['hopthe'].'.gif" width="45" height="48""/>').'<a href="?go&id='.$res['id'].'"><b>▶Phòng số '.$res['id'].'
</a></b>  <b><font color="blue"> - '.number_format($res['cuoc']).' xu</font> <br>Chủ phòng: '.nick($res['key']).'</b>';
}

echo '</div>';
if ($tong > $kmess){
echo '<div class="topmenu">' . functions::display_pagination('?page=', $start, $tong, $kmess) . '</div>';
}
}
if($tong == 0){
echo'<div class="menu">Hiện tại không có phòng nào hãy tạo phòng</div>';
}


require_once ("../incfiles/end.php");
?>