<?php
define('_IN_JOHNCMS', 1);
$textl = 'Cửa hàng nông trại';
require('../incfiles/core.php');
require('../incfiles/head.php');

if(!$user_id){
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}

echo '<div class=""><div class="phdr"><b>Cửa hàng nông trại &raquo;</b></div>';
echo'<div class="omenu"><img src="/icon/vao.png" alt="icon" /> <a href="shop.php"><b>Mua hạt giống</b></a></div>';
echo'<div class="omenu"><img src="/icon/vao.png" alt="icon" /> <a href="/farm/vatnuoi.php"><b>Mua vật nuôi</b></a></div>';
echo'<div class="omenu"><img src="/icon/vao.png" alt="icon" /> <a href="phanbon.php"><b>Mua phân bón</b></a></div>';
echo '<div class="rmenu">&raquo; <a href="index.php"><b>Nông trại</b></a> &raquo; <a href="/farm"><b>Trang trại</b></a></div>
</div>';
require('../incfiles/end.php');
?>
