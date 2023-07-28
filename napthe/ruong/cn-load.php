<?php
define('_IN_JOHNCMS',1);
header('Content-Type: text/html; charset=utf-8');
require('../incfiles/core.php');


$dch=mysql_num_rows(mysql_query("SELECT * FROM `vatpham` WHERE (`id_shop`='53' OR `id_shop`='54' OR `id_shop`='55') AND `soluong`>'0' AND `user_id`='".$user_id."'"));
echo '<div class="phdr">Sử Dụng Vật Phẩm</div>';
if (isset($_POST['submit'])) {
$da=(int)$_POST['dacuonghoa'];
$bug=mysql_num_rows(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id`='".$da."'"));
$pro=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id`='".$da."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$pro['id_shop']."'"));
if ($bug=0) {
echo '<div class="rmenu">ERROR!!!</div>';
} else if ($pro['id_shop']!=53||$pro['id_shop']!=54||$pro['id_shop']!=55) {
echo '<div class="rmenu">bug cc '.$da.'</div>';
} else if ($pro['soluong']<=0) {
echo '<div class="rmenu">Không có item này</div>';
} else {
if ($pro['id_shop']==53) {
$sm_them_nek = $datauser['sucmanh']*2;
$time_tg=10*60+time();

mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='".$pro['id_shop']."'");
mysql_query("UPDATE `users` SET `smthem` = '$ducnghia_them_nek',`cn`='1' WHERE `id` = '".$user_id."'");
echo '<div class="gmenu">sử dụng vật phẩm cuồng nộ thành công ! bạn nhận được '.$sm_them_nek.' sức mạnh trong vòng 10 phút</b></div>';

} 
}
}

echo '<div class="pmenu">bạn muốn dùng vật phẩm gì ? thời gian tối đa là 10 phút nhé </div>';
if ($dch<1) {
echo '<select disabled="disabled">
<option selected="selected">Không có đá cường hóa!</option>
</select><br/>';
echo '<input type="button" value="Cường hóa">';
} else {
$lay=mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `soluong`>'0' AND (`id_shop`='53' OR `id_shop`='54' OR `id_shop`='55')");
echo '<select name="dacuonghoa">';
while ($in=mysql_fetch_array($lay)) {
$n=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$in[id_shop]."'"));
echo '
<option value="x"> CHỌN VẬT PHẨM</option>
<option value="'.$in[id].'" '.($da==$in[id]?'selected="selected"':'').'"> '.$n[tenvatpham].' x['.$in[soluong].']</option>';
}
echo '</select><br/>';
echo '<input type="submit" name="submit" id="cuonghoa" value="dùng">';
}
echo '</form>';
