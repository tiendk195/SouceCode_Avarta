<?php
define('_IN_JOHNCMS', 1);
$textl = 'Tưới nước';
require_once('../incfiles/core.php');
require('../incfiles/head.php');

if (!$user_id){
echo'<div class="menu">Chỉ dành cho thành viên diễn đàn! Hãy đăng ký để tham gia nhé</div>';
require('../incfiles/end.php');
exit;
}

$user = mysql_query("SELECT * FROM `users` WHERE `id` = '" .$user_id. "'");
$tv = mysql_fetch_array($user);


echo '<div class="mainblok"><div class="phdr"><b>Tưới nước hàng loạt &raquo;</b></div>
<div class="menu">Tưới nước cho cây trồng thành công</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
mysql_query("UPDATE `fermer_gr` SET `woter` = '1' WHERE `semen` != '0' AND `id_user` = '".$user_id."' ");





require('../incfiles/end.php');

?>