<?php 

define('_IN_JOHNCMS', 1); 
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


if($user['xu'] < 20000) {echo 'Bạn không đủ 20.000 xu để hồi máu';} 
else  { 

echo'<div class="phdr">Kết Quả</div> ';
$qua= rand(1,1);
$kiemtrachuphong = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `chuphong` = '$user_id'"), 0);
$kt1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `nguoichoi1` = '$user_id'"), 0);
$kt2 = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `nguoichoi2` = '$user_id'"), 0);
$kt3 = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `nguoichoi3` = '$user_id'"), 0);


if ($qua == 1) {
                        echo'<div class="omenu">Hồi phục thành công!</div> ';
mysql_query("UPDATE `users` SET `xu`=`xu`-20000,`hp`=`hpfull`+0,`tgonline` = '".time()."'  WHERE `id` = '$user_id' LIMIT 1");
}


} 
break; 
default: 


echo '<div class="main"><div class="phdr"><b>Bệnh Viện</b> - [<a href="/avatar/bag.php"><b>Rương Đồ</b></a>]</div>';
echo '<div class="omenu"><b>Trị Số Thể Lực ' . $datauser['sucmanh'] . ' Sức Mạnh và ' . $datauser['hp'] . '/' . $datauser['hpfull'] . ' HP</b></div>';
echo '<div class="omenu">';
echo'<img src="/congvien/ya.gif"><img src="'.$home.'/avatar/' . $datauser['id'] . '.png" alt="'. $datauser['name'] . '" />';
echo'</div>';
echo '<form action="hoiphuc.php?act=ok" name="but" method="post">';
echo'<div class="phdr">Y Tá Thảo</div><div class="omenu"><br><font color="red">Phục hồi máu! 20.000 xu/lần!</font><br/><input type="submit" name="submit" value="Hồi phục"/></form></form>';

echo'</div>';

echo'</div>';


break; 
} 

require_once ("../incfiles/end.php"); 
?>