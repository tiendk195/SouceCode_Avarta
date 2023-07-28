<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$textl='Shop Boss';
require('../incfiles/head.php');
if (!$user_id) {
header('Location: /dangnhap.php');
exit;
}
if ($datauser['kichhoat']==0){
	header('Location: /index.php');
exit;
}
switch ($act) {
case 'add':
if ($rights==10) {
echo '<div class="phdr">Thêm vật phẩm</div>';
if (isset($_POST[submit])) {
mysql_query("INSERT INTO `shopvatpham` SET
`loaitien`='".$_POST[loaitien]."',
`gia`='".$_POST[gia]."',
`loai`='".$_POST[loai]."',

`thongtin`='".$_POST[thongtin]."',
`hienthi`='".$_POST[hienthi]."',
`tenvatpham`='".$_POST[tenvp]."'");
}
echo '<form method="post">';
echo 'Tên: <input type="text" name="tenvp"><br/>';
echo 'loại: <input type="text" name="loai"><br/>';

echo 'Loại: <select name="loaitien">
<option value="xu"> Xu</option>
<option value="vnd"> lượng</option>
</select><br/>';
echo 'Giá: <input type="text" name="gia"><br/>';
echo 'Info: <textarea name="thongtin"></textarea><br/>';
echo 'Ko hiển thị:<input type="checkbox" name="hienthi" value="1"><br/>';
echo '<input type="submit" name="submit" value="Add">';
echo '</form>';
}

break;
case 'mua':
$id=(int)$_GET[id];
$query=mysql_query("SELECT * FROM `shopvatpham` WHERE `hienthi`='0' AND `id`='".$id."'");
$check=mysql_num_rows($query);
if ($check<1) {
header('Location: vatpham.php');
} else {
$info=mysql_fetch_array($query);
if($datauser['giamgia'] >1) {
    $giamgia = $info['gia'] - $info['gia']/100*$datauser['giamgia'];
} else {
    $giamgia = $info['gia'];
}



echo '<div class="phdr">Mua '.$info[tenvatpham].'</div>';

if ($info['loaitien']=='xu'){
	$loaitien='Xu';
} else 
if ($info['loaitien']=='vnd'){
	$loaitien='Lượng';
} else
if ($info['loaitien']=='vndkhoa'){
	$loaitien='Lượng khóa';
}
echo'<form method="post"><div class="omenu"><center><img src="/images/vatpham/'.$info[id].'.png">
<br>Xác nhận mua vật phẩm <font color="green">'.$info[tenvatpham].'</font> bằng <font color="red">'.$info[gia].' '.$loaitien.' </font> ?
<br>
<input type="number" name="soluong" value="1"><br>
	<input class="nut" type="submit" name="mua" value="Mua"> </center>
</div></form>';

if (isset($_POST[mua])) {
$soluong=(int)$_POST[soluong];
$tien=$soluong*$info[gia] - $info['gia']/100*$datauser['giamgia'] ;
if ($soluong<1) {
echo '<div class="omenu">Vui lòng xem lại số lượng!</div>';
} else {
if ($info[loaitien]==xu) {
if ($datauser[xu]<$tien) {
echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Giao dịch không thành công <a href="/"> Quay về </a></div>';
} else {
mysql_query("UPDATE `users` SET `xu`=`xu`-'".$tien."',`giamgia` = '0' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$soluong."' WHERE `user_id`='".$user_id."' AND `id_shop`='".$id."'");
echo '<div class="omenu">Mua thành công <b>'.$soluong.' '.$info[tenvatpham].'</b>, tài khoản của bạn bị trừ <b>'.$tien.' xu</b></div>';
}

} else if ($info[loaitien]==vnd) {
if ($datauser[luong]<$tien) {
echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Giao dịch không thành công <a href="/"> Quay về </a></div>';
} else {
mysql_query("UPDATE `users` SET `luong`=`luong`-'".$tien."',`giamgia` = '0' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$soluong."' WHERE `user_id`='".$user_id."' AND `id_shop`='".$id."'");
echo '<div class="omenu">Mua thành công <b>'.$soluong.' '.$info[tenvatpham].'</b>, tài khoản của bạn bị trừ <b>'.$tien.' lượng</b></div>';
}
}
 else if ($info[loaitien]==vndkhoa) {
if ($datauser[luongkhoa]<$tien) {
echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Giao dịch không thành công <a href="/"> Quay về </a></div>';
} else {
mysql_query("UPDATE `users` SET `luongkhoa`=`luongkhoa`-'".$tien."',`giamgia` = '0' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$soluong."' WHERE `user_id`='".$user_id."' AND `id_shop`='".$id."'");
echo '<div class="omenu">Mua thành công <b>'.$soluong.' '.$info[tenvatpham].'</b>, tài khoản của bạn bị trừ <b>'.$tien.' lượng khóa</b></div>';
}
}
}
}
}
break;
default:
echo'<div class="phdr">Shop Boss</div>';
$req=mysql_query("SELECT * FROM `shopvatpham` WHERE `hienthi`='0' AND `loai`='danhboss'");

while($res=mysql_fetch_array($req)) {
    
    if($datauser['giamgia'] >1) {
    $giamgia = $res['gia'] - $res['gia']/100*$datauser['giamgia'];
} else {
    $giamgia = $res['gia'];
}
    echo'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><center><img src="/images/vatpham/'.$res[id].'.png"></center>
</td>
<td class="right-info">
<b><font color="blue">'.$res[tenvatpham].'</font></b><br>
Giá bán: <font color="red">'.$res[gia].' ';
if ($res['loaitien']=='xu'){
	$loaitien='Xu';
} else 
if ($res['loaitien']=='vnd'){
	$loaitien='Lượng';
} else
if ($res['loaitien']=='vndkhoa'){
	$loaitien='Lượng khóa';
}
echo''.$loaitien.'</font> <br>
Công dụng:  '.$res[thongtin].'<br>
<center><a href="?act=mua&amp;id='.$res[id].'"><input class="nut" type="submit" name="ok" value="Mua"></a></center></td>
</tr></tbody></table>';

}
break;
}

require('../incfiles/end.php');
?>