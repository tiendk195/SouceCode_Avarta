<?php


define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl = 'Edit Nhạc';

if (!$user_id) {
    require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
require('../incfiles/head.php');
echo'<div class="phdr">Edit Nhạc</div>';
if($datauser['rights'] >= 5 || $datauser['id'] == 4100 || $datauser['id'] == 4054){
switch($act) {
default:
$n = mysql_fetch_array(mysql_query("SELECT * FROM `nhac` WHERE `id` = '1' "));
echo'<div class="pmenu"><b>Nhập link nhạc .mp3 nhé:</b><br><form action ="?act=ok" method="post"><input name="link" value="'.$n['link'].'" /><br><b>Nhập tên bài hát<br><input name="text" value="" /><br><input type="submit" value="Lưu"></input></form><br><font color="red">Chú Ý: Nếu không biết lấy link nhạc .mp3 thì đừng sửa lung tung tránh bị lỗi</font></div>';
break;
case 'ok':
$link = htmlspecialchars($_POST['link']);
$text = htmlspecialchars($_POST['text']);
if(strlen($text) > 100){
echo'<div class="rmenu">Tên gì mà dài vậy má</div>';
} else if(strlen($text) < 5){
echo'<div class="rmenu">Nhập tên bài hát vào nhé</div>';
} else if (preg_match("/\b.mp3\b/i", $link, $match)){
Header('location: /index.php');
mysql_query("UPDATE `nhac` SET `link` = '".$link."', `text`='".$text."', `users`= '".$user_id."' WHERE `id`='1'
");
$msg = '[b]'.$login.'[/b] vừa đổi bài hát [red]'.$text.'[/red] cùng load lại trang nge nhạc nào :-showlove';
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($msg) . "', `time`='".time()."'");

} else{
echo'<div class="rmenu">Lỗi link nhạc phải có đuôi .mp3 nhé</div>';
}
break;
}
}
require('../incfiles/end.php');
?>