<?php
define('_IN_JOHNCMS',1);
$rootpath='../../../';

require('../../../incfiles/core.php');
$textl='VQBD';
$headmod='hawaii';
require('../../../incfiles/head.php');
if (!$user_id) {
header('Location: /login.php');
exit;
}

echo '<div class="phdr"> Phù thủy bóng đêm</div>';
echo'<center><b><font color="red"> Phu.Thuy.Bong.Dem</font><br><img src="/sanbay/vqbd/img/zombie.png"><br> Ta cần 1 loại đá để trở về vương quốc. Nếu ngươi có ta sẽ trao đổi bằng các item đặc biệt !!</b></center>';
echo'<div class="omenu"><img src="/icon/next.png"><a href="item.php"> Đổi item</a></div>';

require('../../../incfiles/end.php');
?>