<?php 

define('_IN_JOHNCMS', 1); 
$textl = 'Tạ 30KG'; 
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


if($user['xu'] < 5000) {echo 'Bạn không đủ 5000 xu để đẩy tạ 30KG';} 
else if($datauser['sucmanh'] > 799 ) 
{
echo 'Bạn đã đẩy mức tạ này rồi';
} 
else if($datauser['sucmanh'] < 599) 
{
echo 'Bạn chưa đẩy tạ trước đó đi đẩy đi ham vler';
} 
else { 

echo'<div class="phdr">Kết Quả</div> ';
$qua= rand(1,10);


if ($qua == 1) {
                        echo'<div class="menu">Rất tiếc bạn bạn đẩy tạ thất bại rồi, thử lại nào !</div> ';
mysql_query("UPDATE `users` SET `xu`=`xu`-5000 WHERE `id` = '$user_id' LIMIT 1");
}
if ($qua == 2) {
                        echo'<div class="menu">Xin chúc mừng bạn đã <b>Đẩy tạ 30kg</b> thành công!</div> ';
$time = time();

$bot = ' @'.$login.' Vừa [b]Đẩy tạ 30kg[/b] thành công xin chúc nừng :p';
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '256',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");
                mysql_query("UPDATE `users` SET `sucmanh`=`sucmanh`+ 200 WHERE `id` = '$user_id' LIMIT 1");

mysql_query("UPDATE `users` SET `xu`=`xu`-5000 WHERE `id` = '$user_id' LIMIT 1");
}


if ($qua == 3) {
                        echo'<div class="menu">Xin chúc mừng bạn đã <b>Đẩy tạ 30kg</b> thành công!</div> ';
$time = time();

$bot = ' @'.$login.' Vừa [b]Đẩy tạ 30kg[/b] thành công xin chúc nừng :p';
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '256',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");
                mysql_query("UPDATE `users` SET `sucmanh`=`sucmanh`+ 200 WHERE `id` = '$user_id' LIMIT 1");

mysql_query("UPDATE `users` SET `xu`=`xu`-5000 WHERE `id` = '$user_id' LIMIT 1");
}

if ($qua == 4) {
                        echo'<div class="menu">Xin chúc mừng bạn đã <b>Đẩy tạ 30kg</b> thành công!</div> ';
$time = time();

$bot = ' @'.$login.' Vừa [b]Đẩy tạ 30kg[/b] thành công xin chúc nừng :p';
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '256',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");
                mysql_query("UPDATE `users` SET `sucmanh`=`sucmanh`+ 200 WHERE `id` = '$user_id' LIMIT 1");

mysql_query("UPDATE `users` SET `xu`=`xu`-5000 WHERE `id` = '$user_id' LIMIT 1");
}


if ($qua == 5) {
                        echo'<div class="menu">Xin chúc mừng bạn đã <b>Đẩy tạ 30kg</b> thành công!</div> ';
$time = time();

$bot = ' @'.$login.' Vừa [b]Đẩy tạ 30kg[/b] thành công xin chúc nừng :p';
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '256',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");
                mysql_query("UPDATE `users` SET `sucmanh`=`sucmanh`+ 200 WHERE `id` = '$user_id' LIMIT 1");

mysql_query("UPDATE `users` SET `xu`=`xu`-5000 WHERE `id` = '$user_id' LIMIT 1");
}


if ($qua == 6) {
                        echo'<div class="menu">Xin chúc mừng bạn đã <b>Đẩy tạ 30kg</b> thành công!</div> ';
$time = time();

$bot = ' @'.$login.' Vừa [b]Đẩy tạ 30kg[/b] thành công xin chúc nừng :p';
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '256',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");
                mysql_query("UPDATE `users` SET `sucmanh`=`sucmanh`+ 200 WHERE `id` = '$user_id' LIMIT 1");

mysql_query("UPDATE `users` SET `xu`=`xu`-5000 WHERE `id` = '$user_id' LIMIT 1");
}


if ($qua == 7) {
                        echo'<div class="menu">Xin chúc mừng bạn đã <b>Đẩy tạ 30kg</b> thành công!</div> ';
$time = time();

$bot = ' @'.$login.' Vừa [b]Đẩy tạ 30kg[/b] thành công xin chúc nừng :p';
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '256',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");
                mysql_query("UPDATE `users` SET `sucmanh`=`sucmanh`+ 200 WHERE `id` = '$user_id' LIMIT 1");

mysql_query("UPDATE `users` SET `xu`=`xu`-5000 WHERE `id` = '$user_id' LIMIT 1");
}


if ($qua == 8) {
                        echo'<div class="menu">Xin chúc mừng bạn đã <b>Đẩy tạ 30kg</b> thành công!</div> ';
$time = time();

$bot = ' @'.$login.' Vừa [b]Đẩy tạ 30kg[/b] thành công xin chúc nừng :p';
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '256',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");
                mysql_query("UPDATE `users` SET `sucmanh`=`sucmanh`+ 200 WHERE `id` = '$user_id' LIMIT 1");

mysql_query("UPDATE `users` SET `xu`=`xu`-5000 WHERE `id` = '$user_id' LIMIT 1");
}

if ($qua == 9) {
                        echo'<div class="menu">Xin chúc mừng bạn đã <b>Đẩy tạ 30kg</b> thành công!</div> ';
$time = time();

$bot = ' @'.$login.' Vừa [b]Đẩy tạ 30kg[/b] thành công xin chúc nừng :p';
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '256',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");
                mysql_query("UPDATE `users` SET `sucmanh`=`sucmanh`+ 200 WHERE `id` = '$user_id' LIMIT 1");

mysql_query("UPDATE `users` SET `xu`=`xu`-5000 WHERE `id` = '$user_id' LIMIT 1");
}
if ($qua == 10) {
                        echo'<div class="menu">Xin chúc mừng bạn đã <b>Đẩy tạ 30kg</b> thành công!</div> ';
$time = time();

$bot = ' @'.$login.' Vừa [b]Đẩy tạ 30kg[/b] thành công xin chúc nừng :p';
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '256',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");
                mysql_query("UPDATE `users` SET `sucmanh`=`sucmanh`+ 200 WHERE `id` = '$user_id' LIMIT 1");

mysql_query("UPDATE `users` SET `xu`=`xu`-5000 WHERE `id` = '$user_id' LIMIT 1");
}


} 
break; 
default: 


echo '<div class="main"><div class="phdr"><b>Đẩy Tạ 30KG</b> - [<a href="/avatar/bag.php"><b>Rương Đồ</b></a>]</div>';
echo '<div class="menu"><b>Trị Số Thể Lực ' . $datauser['sucmanh'] . ' Sức Mạnh và ' . $datauser['hp'] . ' HP</b></div>';
echo '<div class="menu">';
echo'<img src="'.$home.'/avatar/' . $datauser['id'] . '.png" alt="'. $datauser['name'] . '" />';
echo'</div>';
echo '<form action="lv3.php?act=ok" name="but" method="post">';
echo'<div class="phdr">Tạ Đang Đẩy</div><div class="menu"><b><font color="0000ff">30KG tỉ lệ 90%</font></b><br>Giá mỗi lần nâng là 5000 Xu<br/><input type="submit" name="submit" value="Lên Là lên"/></form></form>';

echo'</div>';

echo'</div>';


break; 
} 

require_once ("../incfiles/end.php"); 
?>