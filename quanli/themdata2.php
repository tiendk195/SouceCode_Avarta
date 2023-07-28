<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$textl='Thêm data';
require('../incfiles/head.php');
if (!$user_id) {
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}

if($datauser['id'] != 1){
echo'<div class="news"><center><b>Lỗi</center>';
echo'</b></div>';
require('../incfiles/end.php');
exit;
}

echo'<div class="phdr">Thêm data</div>';




if(isset($_POST['submit'])){

	$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `nguoiup`>'0'"));
		mysql_query("UPDATE `khodo` SET `loaido`='vip' WHERE `id_shop`='".$shop[id]."'");
echo'<div class="omenu">Thanh cong</div>';
}
echo'<div class="omenu">

<form method="post">
<input type="submit" name="submit" value="Thêm"></form></div>';


require('../incfiles/end.php');
?>