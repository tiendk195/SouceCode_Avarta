<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$textl ='Thông báo';
require('../incfiles/head.php');
if (!$user_id) {
echo '<div class="omenu"><p><b>Lỗi!</b><br>Trang chỉ dành cho thành viên!</p></div>';
require('../incfiles/end.php');
exit;
}
if ($datauser['rights'] < 9) {
echo'<div class="omenu">Lỗi!</div>';
require('../incfiles/end.php');
exit;
}
echo '<div class="phdr">Thông báo</div>';
{
if (isset($_POST['submit'])) {
$text = functions::check($_POST['msg']);
if(strlen($text) > 3000) {
echo '<div class="omenu">Nội dung của bạn đã quá 3000 kí tự. Vui lòng sửa lại!</div>';
} else if (empty($text)) {
echo '<div class="omenu">Bạn chưa nhập nội dung</div>';
} else {
	mysql_query("UPDATE `users` SET `viewthongbao` = '0' where `id`>'1'");

mysql_query("INSERT INTO `chatthongbao` SET
`user` = '".$user_id."',
`time` = '".time()."',
`text` = '".$text."'
");

echo '<div class="omenu">Bạn đã thông báo thành công!</div>';
}
}
echo '<form action ="/pages/thongbao.php" method ="post"><textarea cols="15" rows="2" name="msg"></textarea><br>
<input type ="submit" name = "submit" value ="Thông báo"></form>';
if (isset($_GET['xoa'])) {
if ($rights>=9) {
mysql_query("DELETE FROM `chatthongbao`");
} else {
echo '<div class="omenu">Không đủ quyền nha bạn!</div>';
}
}
echo '<div class="phdr">Lịch sử thông báo '.($rights >=9 ? ' | <a href="?xoa">[x]</a>' : '').'</div>';
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `chatthongbao` "), 0);
if ($tong) {
$req = mysql_query("SELECT * FROM `chatthongbao` ORDER BY `id` DESC LIMIT $start, $kmess ");
while ($res = mysql_fetch_array($req)) {
echo '<div class="list1"><a href="/users/profile.php?user='.$res['user'].'"><b>'.nick($res['user']).'</b></a>: ' . bbcode::tags(functions::smileys($res['text'])) . '</div>';
}
if ($tong > $kmess){
echo '<div class="topmenu">' . functions::display_pagination('thongbao.php?', $start, $tong, $kmess) . '</div>';
}
} else {
echo '<div class="omenu">Không có dữ liệu</div>';
}

}
require('../incfiles/end.php');
?>