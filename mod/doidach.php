<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
require('../incfiles/head.php');
if (!$user_id) {
echo '<div class="omenu"><p><b>Lỗi!</b><br>Trang chỉ dành cho thành viên!</p></div>';
require('../incfiles/end.php');
exit;
}
echo '<div class="phdr">Đổi đá cường hóa sang đá nâng cấp</div>';
echo'<center><div class="omenu">Bạn đang có '.$datauser['dacuonghoa'].' đá cường hóa</div>';

if (isset($_POST[doi])) {
$sl=(int)$_POST[sl];
if ($datauser['dacuonghoa']< 1) {
echo '<div class="omenu">Bạn cần cón 1 đá cường hóa để đổi!</div>';
} else if($sl > 100) {
echo '<div class="omenu">Không vượt quá 100 đá </div>';
} else if (empty($sl)) {
echo '<div class="omenu">Bạn chưa nhập số lượng</div>';
} else {
	echo '<div class="omenu">Đổi thành công '.$sl.' đá nâng cấp</div>';

mysql_query("UPDATE `users` SET `dacuonghoa` = `dacuonghoa` - '".$sl."' WHERE `id`= '".$user_id."'");
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop` = '60'");

}
}
		echo '<form method="post">';

echo'<div class="omenu">Nhập số lượng muốn đổi</br>';
echo'<input type="number" name="sl"><br/>
<input type="submit" name="doi" value="Đổi" class="nut"></form></div></center>';



require('../incfiles/end.php');
?>