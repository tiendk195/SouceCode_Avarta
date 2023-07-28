<?php 
define('_IN_JOHNCMS', 1); 
$textl = 'Nhạc'; 
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
Switch($act){
Case 'bat':
echo'<META HTTP-EQUIV="refresh" CONTENT="0; URL=/">';
mysql_query("UPDATE `users` SET `pkoolvn`='1' WHERE `id` = '$user_id' LIMIT 1");
Break;
Case 'tat':
Echo'<META HTTP-EQUIV="refresh" CONTENT="0; URL=/">';
mysql_query("UPDATE `users` SET `pkoolvn`='0' WHERE `id` = '$user_id' LIMIT 1");
Break;
Case '1':
mysql_query("UPDATE `users` SET `css`='1' WHERE `id` = '$user_id' LIMIT 1");
Break;
Case '2':
mysql_query("UPDATE `users` SET `css`='2' WHERE `id` = '$user_id' LIMIT 1");
Break;
}
require_once ("../incfiles/end.php"); 
?>