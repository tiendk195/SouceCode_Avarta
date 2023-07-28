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
$noidung = functions::check($_POST['msg']);
$tieude = functions::check($_POST['tieude']);

 if (empty($text) || empty($tieude)) {
echo '<div class="omenu">Bạn chưa nhập nội dung</div>';
} else {

$text = '<b><center><font size=4" color="red">'.$tieude.'</b></center></font>
'.$noidung.'';

$e=mysql_query("SELECT * FROM `users` ORDER BY `id`");

while($s=mysql_fetch_array($e)) {
mysql_query("INSERT INTO `thongbao` SET
                `id` = '1',
                `user` = '".$s['id']."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
            mysql_query("UPDATE `users` SET `viewthongbao` = '1' WHERE `id` = '" . $s['id'] . "'");

            
}

echo '<div class="omenu">Bạn đã gửi thông báo thành công!</div>';
}
}
echo '<form action ="guithongbao.php" method ="post">Nhập tiêu đề: <textarea cols="15" rows="2" name="tieude"></textarea><br>
Nhập nội dung:<textarea cols="15" rows="2" name="msg"></textarea>
<input type ="submit" name = "submit" value ="Thông báo"></form>';
if (isset($_GET['xoa'])) {
if ($rights>=9) {
mysql_query("DELETE FROM `chatthongbao`");
} else {
echo '<div class="omenu">Không đủ quyền nha bạn!</div>';
}
}


}
require('../incfiles/end.php');
?>