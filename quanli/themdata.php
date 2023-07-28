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

if($datauser['rights'] < 9){
echo'<div class="news"><center><b>Lỗi</center>';
echo'</b></div>';
require('../incfiles/end.php');
exit;
}

echo'<div class="phdr">Thêm data</div>';
if(isset($_POST['submit'])){

$data=$_POST['data'];
$p = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `$data`='".$data."'"));
if ($data >0) {
echo'<div class="omenu">Lỗi</div>';
} else {
mysql_query("ALTER TABLE `users` ADD `$data` int(11) NOT NULL ")or die(mysql_error());

echo'<div class="omenu">Thêm thành công '.$data.'  </div>';
}
}
echo'<div class="omenu">

<form method="post">Nhập tên cột data: <input type="text" name="data" value="'.$_POST['data'].'"></br>
<input type="submit" name="submit" value="Thêm"></form></div>';


require('../incfiles/end.php');
?>

