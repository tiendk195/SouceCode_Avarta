<?php 

define('_IN_JOHNCMS', 1); 
$textl = 'Vua Sư Tử'; 
$headmod = 'nick'; 
require_once ("../incfiles/core.php"); 
require_once ("../incfiles/head.php"); 
if ($id && $id != $user_id) { 
$req = mysql_query("SELECT * FROM `users` WHERE `id` = '$id' LIMIT 1"); 
if (mysql_num_rows($req)) { 
$user = mysql_fetch_assoc($req); 
} 
else { 
} 
} 
else { 
$id = false; 
$user = $datauser; 
} 
if (!$user_id) { 
require_once ('../incfiles/head.php'); 
echo functions::display_error($lng['access_guest_forbidden']); 
require_once ('../incfiles/end.php'); 
exit; 
} 

switch($act){ 
case 'ok' : 


if($datauser['xu'] < 500000000) {echo ' <div class="rmenu">Bạn không đủ xu để kích hoạt tiềm năng</div>';} 
else if($datauser['sucmanh'] > 1000000000000 ) 
{
echo '<div class="rmenu">Xin lỗi ta bất tài chỉ có thể làm thế thôi, hi vọng ngươi sau này có thể gặp được cao nhân</div>';
} 
else if($datauser['sucmanh'] < 900000000000) 
{
echo '<div class="rmenu">Yêu cầu sức mạnh đạt 900.000.000.000 ta mới có thể kích hoạt cho ngươi!!!</div>';
} 
else { 

echo'<div class="phdr">Kết Quả</div> ';
$qua= rand(1,40);


if ($qua <= 39) {
                        echo'<div class="menu">Kích hoạt thất bại rồi chúng ta thử lại nhé!</div> ';
mysql_query("UPDATE `users` SET `xu`=`xu`-500000000 WHERE `id` = '$user_id' LIMIT 1");
}

if ($qua == 40) {
                        echo'<div class="menu">Haha kích hoạt thành công <b>Tiềm năng</b> ta đã không nhìn lầm ngươi!</div> ';
$time = time();

$bot = 'Haha [b]kích hoạt tiềm năng[/b]  thành công rồi @'.$login.' ơi ta đã không nhìn lầm ngươi! :D';
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '256',
`name` = 'Vua Sư Tử',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");
                mysql_query("UPDATE `users` SET `sucmanh`=`sucmanh`+100000000000 WHERE `id` = '$user_id' LIMIT 1");

mysql_query("UPDATE `users` SET `xu`=`xu`-500000000 WHERE `id` = '$user_id' LIMIT 1");
}


} 
break; 
default: 


echo '<div class="main"><div class="phdr"><b>Vua Sư Tử</b> - [<a href="/avatar/bag.php"><b>Rương Đồ</b></a>]</div>';
echo '<div class="menu"><b>Trị Số Thể Lực ' . $datauser['sucmanh'] . ' Sức Mạnh</b></div>';
echo '<div class="menu">';
echo '<font color="blue">Ta thấy ngươi có 1 lực lượng thần bí trong người chưa kích hoạt ngươi có muốn thử vận may không ???</font>';
echo'<img src="/avatar/1109.gif"><img src="'.$home.'/avatar/' . $datauser['id'] . '.png" alt="'. $datauser['name'] . '" />';
echo'</div>';
echo '<form action="kichhoat.php?act=ok" name="but" method="post">';
echo'<div class="phdr">Vua Sư Tử</div><div class="menu"><b><font color="0000ff">Kích hoạt tiềm năng tỉ tỉ lệ 2.5%</font></b><br>Giá mỗi lần nâng là 500M Xu<br/><input type="submit" name="submit" value="Thử phát"/></form></form>';

echo'</div>';

echo'</div>';


break; 
} 

require_once ("../incfiles/end.php"); 
?>