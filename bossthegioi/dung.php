<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$headmod='Rương đồ';
$textl='Sử dụng vật phẩm';
require('../incfiles/head.php');
if (!$user_id) {
header('Location: /login.php');
exit;
}
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time = time();

$id='127';
$fuck=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `id`='".$id."'"));
$pro=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$fuck['id_shop']."'"));
$hack=mysql_num_rows(mysql_query("SELECT * FROM `vatpham` WHERE `id`='".$id."' AND `user_id`='".$user_id."' AND `soluong`>'0'"));
echo '<div class="phdr">'.$textl.'</div>';
if ($hack>0&&$pro['query']!=null){
if (isset($_POST['dung'])) {
$sl=(int)$_POST['soluong'];
if ($sl>$fuck['soluong']) {
echo '<div class="omenu">Bạn không đủ vật phẩm để sử dụng!</div>';
} else if ($sl <= 0) {
echo '<div class="omenu">Số lượng không hợp lệ!</div>';
} else {

mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `id`='".$id."'");
mysql_query("UPDATE `tgdanhbosstg` SET `time`='".$time."', `colenh`='1' WHERE `user_id`='$user_id'");
echo '<div class="omenu"><center>Dùng thành công</center></div>';
}
}

echo '<form method="post"><center>';
echo '<div class="omenu"><table>
<tr>
<td><img src="/images/vatpham/'.$fuck['id_shop'].'.png"></td>
<td><b><font color="green">'.$pro['tenvatpham'].'</font></b><br/>Số lượng: <b>'.$fuck['soluong'].'</b> item</td>
</tr>
</table>';
echo'Số lượng:<input type="number" name="soluong" size="1" value="1"></br>';
echo'<input type="submit" name="dung" value="Dùng"></div></center>';
echo'</form>';

} 
require('../incfiles/end.php');
?>