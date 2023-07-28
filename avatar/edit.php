<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$headmod='Sửa item';
$textl='Sửa item';
require('../incfiles/head.php');
if ($rights<9) {
header('Location: /404.php');
exit;
}
$id=$_GET[id];
  $xyz=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}
$res=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$_GET[id]."'"));
$timesd1=(int)$_POST[timesudung];
if ($timesd1 !=0)
{
$timesd= $timesd1*24*3600+time();
}
echo '<div class="phdr"><b>'.$res[tenvatpham].'</b></div>';
if (isset($_POST[submit])) {
@mysql_query("UPDATE `shopdo` SET
`tenvatpham`='".$_POST[vatpham]."',
`loaitien`='".$_POST[loaitien]."',
`gia`='".$_POST[gia]."',
`timesudung`='".$timesd."',
`premium`='".$_POST[premium]."',

`gioitinh`='".$_POST[gioitinh]."',
`hienthi`='".$_POST[hienthi]."'
WHERE `id`='".$id."'
");
echo '<div class="omenu">Edit thành công! </div>';
}
echo '<img src="/images/shop/'.$id.'.png">';
echo '<form method="post">';
echo 'Tên vật phẩm: <input type="text" name="vatpham" value="'.$res[tenvatpham].'"><br/>';
echo 'Thời hạn(nhập ngày): <input type="text" name="timesudung" value="'.$res[timesudung].'"><br/>';
echo 'Loại tiền: <select name="loaitien">
<option value="xu" '.($res[loaitien]==xu?'selected="selected"':'').'> Xu</option>
<option value="vnd" '.($res[loaitien]==vnd?'selected="selected"':'').'> Lượng</option>
</select><br/>';
echo 'Giá: <input type="text" name="gia" size="3" value="'.$res[gia].'"><br/>';
echo 'Giới tính: <select name="gioitinh">
<option value="" '.($res[gioitinh]==''?'selected="selected"':'').'> Dùng chung</option>
<option value="nam" '.($res[gioitinh]==nam?'selected="selected"':'').'> Nam</option>
<option value="nu" '.($res[gioitinh]==nu?'selected="selected"':'').'> Nữ</option>
</select><br/>';
echo 'Shop cao cấp: <select name="premium">
<option value="" '.($res[premium]==''?'selected="selected"':'').'> Không cho vào</option>
<option value="1" '.($res[premium]==1?'selected="selected"':'').'> Cho vào </option>

</select><br/>';
echo 'Hiển thị: <select name="hienthi">
<option value="0" '.($res[hienthi]==0?'selected="selected"':'').'> Hiển thị</option>
<option value="1" '.($res[hienthi]==1?'selected="selected"':'').'> Ẩn</option>
</select><br/>';
echo '<input type="submit" name="submit" value="Lưu">';
echo '</form>';
require('../incfiles/end.php');
?>