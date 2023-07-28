<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$textl='Shop Premium';
$textl='Shop Premium';
require('../incfiles/head.php');
if (!$user_id) {
header('Location: /dangnhap.php');
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
case'danhsach':

echo '<div class="phdr">'.$textl.' </div>';
?>
<?php
if ($_GET[loai]=='all'||empty($_GET[loai])) {
$req=mysql_query("SELECT * FROM `shopvatpham` WHERE `hienthi`='0'");
} else {
$req=mysql_query("SELECT * FROM `shopvatpham` WHERE `hienthi`='0' AND `loai` !='danhboss' AND `loai`='" . mysql_real_escape_string(htmlspecialchars($_GET[loai])) . "'");
}
while($res=mysql_fetch_array($req)) {
    
    if($datauser['giamgia'] >1) {
    $giamgia = $res['gia'] - $res['gia']/100*$datauser['giamgia'];
} else {
    $giamgia = $res['gia'];
}
    
echo'<div class="omenu"><div class=""><img src="/images/vatpham/'.$res[id].'.png"></div> '.$res[tenvatpham].' </br>Thông tin:  '.$res[thongtin].'</font><br/>Giá: <b>

'.($datauser[giamgia]>='2'?' Gốc :<s>'.$res[gia].'</s> '.($res[loaitien]=='xu'?'Xu':'lượng').' <br>  Khuyến Mãi : '.$giamgia.' ':''.$res[gia].'').'
</b> '.($res[loaitien]=='xu'?'Xu':'lượng').'/1 item



<br/><a href="?act=mua&id='.$res[id].'"><button> Mua </button></a></button></div>';
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
if (isset($_POST[mua])) {
$soluong=(int)$_POST[soluong];
$tien=$soluong*$info[gia] - $info['gia']/100*$datauser['giamgia'] ;
if ($soluong<1) {
echo '<div class="omenu">Vui lòng xem lại số lượng!</div>';
} else {
if ($info[loaitien]==xu) {
if ($datauser[xu]<$tien) {
echo '<div class="omenu">Bạn cần có đủ <b>'.$tien.' xu</b> để mua <b>'.$soluong.' '.$info[tenvatpham].'</b></div>';
} else {
mysql_query("UPDATE `users` SET `xu`=`xu`-'".$tien."',`giamgia` = '0' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$soluong."' WHERE `user_id`='".$user_id."' AND `id_shop`='".$id."'");
echo '<div class="omenu">Mua thành công <b>'.$soluong.' '.$info[tenvatpham].'</b>, tài khoản của bạn bị trừ <b>'.$tien.' xu</b></div>';
}
} else {
if ($datauser[luong]<$tien) {
echo '<div class="omenu">Bạn cần có đủ <b>'.$tien.' lượng</b> để mua <b>'.$soluong.' '.$info[tenvatpham].'</b></div>';
} else {
mysql_query("UPDATE `users` SET `luong`=`luong`-'".$tien."',`giamgia` = '0' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$soluong."' WHERE `user_id`='".$user_id."' AND `id_shop`='".$id."'");
echo '<div class="omenu">Mua thành công <b>'.$soluong.' '.$info[tenvatpham].'</b>, tài khoản của bạn bị trừ <b>'.$tien.' lượng</b></div>';
}
}
}
}


echo '<form method="post">';
echo '<div class="omenu"><table>
<tr>
<td><div class=""><img src="/images/vatpham/'.$info[id].'.png"></div></td>
<td>'.$info[tenvatpham].'</font><br/>Giá: <b>

'.($datauser[giamgia]>='2'?' Gốc :<s>'.$info[gia].'</s> '.($info[loaitien]=='xu'?'Xu':'lượng').' <br>  Khuyến Mãi : '.$giamgia.' ':''.$info[gia].'').'
</b> '.($info[loaitien]=='xu'?'Xu':'lượng').'/1 item</td>
</tr>
</table>';
echo'Số lượng:<input type="number" name="soluong"></br>';
echo'<input type="submit" name="mua" value="Mua">';
echo'</form></div>';
}
break;
default:

echo'<div class="phdr">Shop Vật Phẩm</div>';
echo'<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tr><td width="50px;" class="blog-avatar"><img src="premium.gif"/></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0"><tbody><tr><td class="current-blog" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div><img src="/images/on.png" alt="online"/><font color="red"> <b> NPC Premium </b></font><div class="text">';
if ($datauser['kichhoat'] ==0 ){ 
echo'<div class="omenu">Vui lòng kích hoạt để sử dụng chức năng</div>';
} else {
echo'<div class="omenu"><img src="/icon/vao.png"><a href="?act=danhsach&loai=nangcap"> Nâng cấp </a></div><div style="display:none"><div class="omenu"><img src="/icon/vao.png"><a href="?act=danhsach&loai=cuonghoa"> Cường hóa </a></div></div><div class="omenu"><img src="/icon/vao.png"><a href="?act=danhsach&loai=cauca"> Câu cá </a></div><div class="omenu"><img src="/icon/vao.png"><a href="?act=danhsach&loai=dacbiet"> Shop Đặc Biệt </a></div>';
}
echo'</div></div></td></tr></tbody></table></td></tr></tbody></table>';
break;
}

require('../incfiles/end.php');
?>