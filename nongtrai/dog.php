<?php
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
include_once('func.php');
$textl = 'Mua chó!';
require('../incfiles/head.php');
if($user_id){
if($level>=5){
$cena = '5000';
if(isset($_GET['add_dog']) && $datauser['tienxu']>$cena){
$t=$time+60*60*24*30;
mysql_query("UPDATE `users` SET `tienxu` = `tienxu` - '5000' WHERE `id` = $user_id LIMIT 1");
mysql_query("UPDATE `fermer_dog` SET `time` = $t WHERE `id_user` = $user_id LIMIT 1");
msg('Mua chó!');
}
if(isset($_GET['add_dog']) && $user['fermer_money']<$cena)
msg('Không đủ tiền!');
 # Hien thi man hinh
echo '<div class="header" align="center"><img src="img/dog.jpg" alt="*" /></div>';
echo '<div class="vuongdaik"><b>Mua chó</b></div><div class="menu"><center>Con chó sẽ bảo vệ trang trại của bạn chống bị ăn cắp một tháng! <br/> bạn sẽ phải trả chi 
phí là 5.000 tienxu</div>';
echo '<div class="menu">';
echo "<form method='post' action='?add_dog'>\n";
echo "<input type='submit' name='save' value='Mua' />";
echo "</form>\n";
echo '</div>';
}else{ msg('<div class="menu"><font color="red">Cấp độ của bạn không đủ để mua một 
con chó! Bạn cần đạt cấp độ 5 trở lên !</font></div>');}
echo "<div class='menu'>";
echo "&raquo; <a href='my.php'>Trang trại</a>";
echo "</div>";
}else{
msg('Xin vui lòng đăng nhập');
}
require('../incfiles/end.php');
?>