<?php
define('_IN_JOHNCMS', 1);
$textl = 'Xới ô đất';
require_once('../incfiles/core.php');
require('../incfiles/head.php');

if (!$user_id){
echo'<div class="menu">Chỉ dành cho thành viên diễn đàn! Hãy đăng ký để tham gia nhé</div>';
require('../incfiles/end.php');
exit;
}
$time = time();

$user = mysql_query("SELECT * FROM `users` WHERE `id` = '" .$user_id. "'");
$tv = mysql_fetch_array($user);


$check = mysql_query("SELECT * FROM `fermer_gr` WHERE `id_user` = '".$user_id."' AND `semen` != '0' ");
$check1 = mysql_num_rows($check);
if ($check1 == '0') {
echo '<div class="mainblok"><div class="phdr"><b>Xới ô đất &raquo;</b></div>
<div class="menu">Tất cả các ô đất trong nông trại của bạn đều đang trống, không cần xới lại</div>
<div class="rmenu">&raquo; <a href="gieohat.php">Gieo hạt</a><br/>&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
if (!isset($_POST['submit'])) {
echo '<div class="mainblok"><div class="phdr"><b>Xới ô đất &raquo;</b></div><div class="menu">
Bạn có chắc chắn muốn làm mới toàn bộ ô đất nông trại không? Điều này này có thể xóa bỏ tất cả các cây trồng hiện đang có, hãy cân nhắc cho kỹ!
<form method="POST" action="xoiodat.php"><input type="submit" name="submit" value="Đồng ý" /></form><br/><a href="index.php"><input type="button" value="Hủy bỏ" /></a>';
echo '</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {
    echo'<div class="phdr">Xới ô đất</div>';
echo '<div class="mainblok"><div class="menu">
Thao tác thành công, tất cả các ô đất đã được làm mới, bạn có thể tiến hành gieo hạt
</div>
<div class="rmenu">&raquo; <a href="gieohat.php">Gieo hạt</a><br/>&raquo; <a href="index.php">Quay lại</a>
</div></div>';

mysql_query("UPDATE `fermer_gr` SET `semen` = '0', `woter` = '0', `time` = '0' WHERE `id_user` = '".$user_id."' ");

}
}


require('../incfiles/end.php');

?>