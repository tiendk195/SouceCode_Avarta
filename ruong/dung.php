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

$id=(int)$_GET[id];
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
$random = 0;
if (!empty($pro['query1']))
{
$random = 1;
}
if (!empty($pro['query2']))
{
$random = 2;
}
if (!empty($pro['query3']))
{
$random = 3;
}
if (!empty($pro['query4']))
{
$random = 4;
}
for ($i = 1; $i <= $sl; $i++) {
$rand = rand(0, $random);
$strtext = array('text', 'text1', 'text2', 'text3', 'text4');
$strquery = array('query', 'query1', 'query2', 'query3', 'query4');
$query=$pro[$strquery[$rand]];
$query = str_replace('$user_id', $user_id, $query);
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `id`='".$id."'");
if ($fuck['id_shop'] =='127'){
	mysql_query("UPDATE `tgdanhbosstg` SET `time`='".$time."' WHERE `user_id`='$user_id'");
}

if ($fuck['id_shop'] =='130'){
	mysql_query("UPDATE `users` SET `timenamlinhchi`='".$time."' WHERE `id`='$user_id'");
}
mysql_query($query);
echo '<div class="omenu"><center>'.$pro[$strtext[$rand]].'</center></div>';
}
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
/*
$query=$pro[query];
$query = str_replace('$user_id', $user_id, $query);
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `id`='".$id."'");
mysql_query($query);
*/
} else {
header('Location: index.php');
}
require('../incfiles/end.php');
?>