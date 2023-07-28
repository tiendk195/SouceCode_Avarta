<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
require('../incfiles/head.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');

if (!$user_id) {
header('Location: /index.php');
}
if ($datauser['rights']<9) {
header('Location: /index.php');
}
switch($act) {
default:
echo'<div class="phdr">Gửi vật phẩm</div>';
echo'<div class="omenu"><font color="red"><b>Vui lòng không chuyển cho thành viên khác vì mục đích cá nhân</br>Toàn bộ hành động đều được ghi lại, phát hiện có hành vi gian lận xin phép Band <s>VV</s></b></font></div>';
if ($datauser['rights']>=9) {
    echo'<div class="omenu"><a href="?act=lichsu">Xem lịch sử</a></div>';

}
if (isset($_POST[add])) {
$vatpham=(int)$_POST[vatpham];
$soluong=(int)$_POST[soluong];
$id=(int)$_POST[id];
$check = mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE `id`='".$id."'"));
if($check < 1){
echo'<div class="omenu">Người dùng không tồn tại.</div>';
require('../incfiles/end.php');
exit;
} 
$query=mysql_query("SELECT * FROM `vatpham` WHERE `id_shop`= '".$vatpham."' AND `user_id`='".$user_id."'");
$checkdo=mysql_num_rows($query);
if ($checkdo<1) {
  mysql_query("INSERT INTO `vatpham` SET `soluong`='0',`user_id`='".$user_id."',`id_shop` =  '".$vatpham."' ");
}
if (empty($vatpham) or empty($soluong) or empty($id)) {
echo '<div class="news">Không được bỏ trống chỗ nào hết!</div>';
} else if ($soluong>999999 or $soluong <0) {
    echo '<div class="omenu">Số lượng không vượt quá 999!</div>';
} else {
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$soluong."' WHERE `user_id`='".$id."' AND `id_shop` = '".$vatpham."'");
  //Lịch sử chuyển
   mysql_query("INSERT INTO `ls_chuyenvp` SET `time`='".time()."',
 `nguoigui`='".$user_id."',`soluong`='".$soluong."',`user_id`='".$id."',`id_shop` =  '".$vatpham."' ");

echo '<div class="omenu"> Gửi thành công cho '.nick($id).' </br></div>';
	$t2= mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` where  `id`= '" . $vatpham . "'"));
$text='<b><font color="003366">'.$login.'</font></b><font color="000000"> vừa gửi <img src="/images/vatpham/'.$t2['id'].'.png"> ['.$t2['tenvatpham'].' x'.$soluong.'] cho bạn</font>';
mysql_query("INSERT INTO `thongbao` SET
`id`='".$user_id."',
`user`='".$id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
}
}
echo '<form method="post">';
echo 'Vật phẩm: <select name="vatpham">';
$qs=mysql_query("SELECT * FROM `shopvatpham`");
while ($show=mysql_fetch_array($qs)) {
echo '<option value="'.$show[id].'"> '.$show[id].':  '.$show[tenvatpham].' </option>';
}
echo '</select><br/>';
echo 'Nhập số lượng: <input type="number" name="soluong" size="9"> <br/>';
echo 'Nhập ID người nhận: <input type="number" name="id" size="3"><br/>';
echo '<input type="submit" name="add" value="Gửi">';
echo '</form>';
break;
case 'lichsu':
if ($datauser['rights']<9 ) {
header('Location: /index.php');
}
echo'<div class="phdr">Lịch sử</div>';
    echo'<div class="omenu"><a href="?act=xoalichsu">Xóa lịch sử</a></div>';

$res=mysql_query("SELECT * FROM `ls_chuyenvp` WHERE `id`!='0' ORDER BY `id` DESC LIMIT $start,$kmess");



while ($post = mysql_fetch_array($res)){
    	$t2= mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` where  `id`= '" . $post[id_shop] . "'"));

    echo'<div class="omenu">
<b>Người gửi: </b><a href="/member/'.$post[nguoigui].'.html" >'.nick($post['nguoigui']).' </a></br>
<b>Người nhận: </b><a href="/member/'.$post[user_id].'.html" >'.nick($post['user_id']).' </a></br>
<b>Tên vật phẩm:</b> '.$t2['tenvatpham'].' <img src="/images/vatpham/'.$t2['id'].'.png"><font color="red">['.number_format($post[soluong]).']</font></br>
<b>Thời gian:  </b> '.date("d/m/Y - H:i", $post['time']).'

</div>';
}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `ls_chuyenvp` WHERE `id`!=0"), 0);
IF($total > $kmess){
Echo'<div class="phdr">'.functions::pages('?act=lichsu&page=', $start, $total, $kmess).'</div>';
}
break;
case 'xoalichsu':
if ($datauser['id']!=1 ) {
header('Location: /index.php');
}
@mysql_query("DELETE FROM `ls_chuyenvp` WHERE `id`>'0' ");

}
require('../incfiles/end.php');
?>