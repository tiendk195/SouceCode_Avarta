<?php
function show_online($user = array(), $status = 0, $ip = 0, $str = '', $text = '', $sub = '') { global $set_user, $realtime, $user_id, $admp, $home; 


$out = false;  
//$out = '<a href="/member/' . $user['id'] . '.html"><font color="#FF6600"> ' . nick($user['id']) . '</font></a>'; 
$out = '<a href="/member/' . $user['id'] . '.html"><font color="#2C517B"> ' . $user['name'] . '</font></a>'; 
return $out;
} 

function timecount($var) { 
if ($var < 0) 
$var = 0; 
$day = ceil($var / 86400); 
if ($var > 345600) { 
$str = $day . ' Giờ'; 
} elseif ($var >= 172800) { 
$str = $day . ' Рhút'; 
} elseif ($var >= 86400) { 
$str = '1 Giây'; 
} else { 
$str = gmdate('G:i:s', $var); 
} 
return $str; 
}  
$on = $_GET['on']; 
switch($on) { 
default:  
$total = mysql_result(mysql_query("SELECT COUNT(*) FROM `" . ($act == 'guest' ? 'cms_guests' : 'users') . "` WHERE `lastdate` > '" . (time() - 600) . "'"), 0);
if ($total > 0) { 
$req = mysql_query("SELECT * FROM `" . ($act == 'guest' ? 'cms_guests' : 'users') . "` WHERE `preg`='1' and `lastdate` > '" . (time() - 600) . "' ORDER BY " . ($act == 'guest' ? "`movings` DESC" : "`name` ASC") . " LIMIT 1000"); 
while ($res = mysql_fetch_assoc($req)) { 
echo show_online($res, 0, ($act == 'guest' || ($rights >= 1 && $rights >= $res['rights']) ? ($rights >= 6 ? 2 : 1) : 0), ' (' . $res['movings'] . ' - ' . timecount($realtime - $res['sestime']) . ') ' . $place); 


echo '<b> ♥</b> '; 
++$l; 
} 
//--- Mod thống kê diễn đàn ---//

if (($gbot + $msn + $baidu + $bing + $mj + $coccoc + $facebook + $yandex)) {
if ($gbot) echo '<font color="red"><b>['.$gbot.']Google</b></font>, ';
if ($msn) echo '<font color="blue"><b>['.$msn.']MSN</b></font>, ';
if ($baidu) echo '<font color="green"><b>['.$baidu.']Baidu</b></font>, ';
if ($bing) echo '<font color="red"><b>['.$bing.']Bing</b></font>, ';
if ($mj) echo '<font color="green"><b>['.$mj.']MJ12</b></font>, ';
if ($coccoc) echo '<font color="blue"><b>['.$coccoc.']CốcCốc</b></font>, ';
if ($facebook) echo '<font color="blue"><b>['.$facebook.']Facebook</b></font>, ';
if ($yandex) echo '<font color="red"><b>['.$yandex.']Yandex</b></font>, ';
}
} 
else { 
echo '<div class="rmenu"><p>Không thành viên nào online!</p></div>'; 
} 
break; 
}
?>