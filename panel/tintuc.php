<?php


define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl = 'Edit Tin Tức';

if (!$user_id) {
    require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
require('../incfiles/head.php');
echo'<div class="phdr">Edit Tin Tức</div>';
if($datauser['id'] == 1 || $datauser['id'] == 2 ){
switch($act) {
default:
$newz = mysql_fetch_array(mysql_query("SELECT * FROM `tintuc` WHERE `id` = '1' "));
echo'<div class="pmenu"><b>Nhập Tin Tức:</b><br><form action ="?act=ok" method="post"><input name="title" value="'.$newz['title'].'" /><br><b>Nhập Nội Dung<br><input name="text" value="" /><br><input type="submit" value="Lưu"></input></form><br><font color="red">Chú Ý: Nếu không biết  thì đừng sửa lung tung tránh bị lỗi
</br>P/s: Ô 2 dùng bbcode đc nha</font></div>';
require('../incfiles/end.php');
break;
case 'ok':
$title = $_POST['title'];
$text = $_POST['text'];

Header('location: /index.php');
mysql_query("UPDATE `tintuc` SET `title` = '".$title."', `text`='".$text."',`time`='120000000000' WHERE `id`='1'
"); 
}
break;
}
require('../incfiles/end.php');
?>