<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$textl ='Loa thế giới';
require('../incfiles/head.php');
if (!$user_id) {
echo '<div class="rmenu"><p><b>Lỗi!</b><br>Trang chỉ dành cho thành viên!</p></div>';
require('../incfiles/end.php');
exit;
}
echo '<div class="mainblok">';
echo '<div class="phdr">Loa thế giới 500 lượng/lần chat !!</div>';
if(empty($datauser['kichhoat'])){
echo ' <font color=red>Vui lòng kích hoạt tài khoản để sử dụng chức năng này</b></font>';
}
else {
if (isset($_POST['submit'])) {
$text = functions::check($_POST['msg']);
if ($datauser['luong'] < 500) {
echo '<div class="rmenu">Cần 500 lượng để nhắn 1 tin lên loa thế giới!</div>';
} else if(strlen($text) > 300) {
echo '<div class="rmenu">Nội dung của bạn đã quá 300 kí tự. Vui lòng sửa lại!</div>';
} else if (empty($text)) {
echo '<div class="rmenu">Bạn chưa nhập nội dung</div>';
} else {
mysql_query("UPDATE `users` SET `luong` = `luong`-500 WHERE `id`= '".$user_id."'");
mysql_query("INSERT INTO `wnew` SET
`user` = '".$user_id."',
`time` = '".time()."',
`text` = '".$text."'
");
echo '<div class="rmenu">Bạn đã nhắn tin thành công!</div>';
}
}
echo '<form action ="wnew.php" method ="post"><textarea cols="15" rows="2" name="msg"></textarea><br>
<input type ="submit" name = "submit" value ="Gửi"></form>';
if (isset($_GET['xoa'])) {
if ($rights >= 10) {
mysql_query("DELETE FROM `wnew`");
} else {
echo '<div class="rmenu">Không đủ quyền nha bạn!</div>';
}
}
echo '<div class="phdr">Tin nhắn thế giới '.($rights >= 10 ? ' | <a href="?xoa">[x]</a>' : '').'</div>';
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `wnew` "), 0);
if ($tong) {
$req = mysql_query("SELECT * FROM `wnew` ORDER BY `id` DESC LIMIT $start, $kmess ");
while ($res = mysql_fetch_array($req)) {
echo '<div class="menu"><a href="/users/profile.php?user='.$res['user'].'"><b>'.nick($res['user']).'</b></a>: ' . bbcode::tags(functions::smileys($res['text'])) . '</div>';
}
if ($tong > $kmess){
echo '<div class="topmenu">' . functions::display_pagination('wnew.php?page=', $start, $tong, $kmess) . '</div>';
}
} else {
echo '<div class="rmenu">Không có dữ liệu</div>';
}

}
echo '</div>';
require('../incfiles/end.php');
?>