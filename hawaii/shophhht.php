<?php

/*
////////////////////////////////////////////////////////////////////////////////

//          Code được viết bởi pkoolvn.                                                             //
//                                                                   
//           không xóa  nếu bạn là người có học                                               //                                                    
//                                                                      
////////////////////////////////////////////////////////////////////////////////
*/

define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl = 'Shop Hawaii';

if (!$user_id) {
    require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
require('../incfiles/head.php');
echo'<div class="phdr">Huy Hiệu Huyền Thoại</div>';
echo'<div class="menu">Bạn đang có '.$datauser['hhht'].' <img src="/icon/mvht/hhht.png"/> Huy Hiệu Huyền Thoại</div>';
switch($act) {
default:
$tong =mysql_result(mysql_query("SELECT COUNT(*) FROM `hhht` "),0);
$req=mysql_query("SELECT * FROM `hhht` ORDER BY `id` DESC LIMIT $start,$kmess");
while($res=mysql_fetch_array($req)) {
echo '<div class="omenu">';
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$res[idshophhht]."'"));
echo '<img src="/images/'.$shop[loai].'/'.$shop['img'].'.png" class="avatar_vina">
<b><font color="blue">'.$shop[tenvatpham].'</font></b><br/>
<b>Cần: <font color="red"> '.number_format($res['hhht']).'</font> <img src="/icon/mvht/hhht.png"/> Huy Hiệu Huyền Thoại</b>';
echo'<form action="?act=mua&id='.$res[id].'" name="but" method="post"><input type="submit" name="submit" value="Đổi"/></form>';
echo '</div>';
}
echo '</td></tr></tbody></table></td></tr></tbody></table>';
if ($tong > $kmess){
echo '<div class="topmenu">' . functions::display_pagination('shop.php?page=', $start, $tong, $kmess) . '</div>';
}
break;
case 'add':
if ($datauser['id'] == 1) {
echo '<div class="phdr">Thêm đồ</div>';
if (isset($_POST[add])) {
$vatpham=(int)$_POST[vatpham];
$luong=(int)$_POST[luong];
$xu=(int)$_POST[xu];
$hsd=(int)$_POST[hsd];
if (empty($vatpham) or empty($xu) or empty($xu)) {
echo '<div class="news">Không được bỏ trống chỗ nào hết!</div>';
} else {
mysql_query("INSERT INTO `hhht` SET
`idshophhht`='".$vatpham."',
`hhht`='".$xu."'");
$tenvatpham=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$vatpham."'"));
$bot='[b]'.$login.' vừa thêm [red]'.$tenvatpham[tenvatpham].' [/red] vào shop Huy Hiệu![/b]';
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
echo '<div class="rmenu">Thêm thành công</div>';
}
}
echo '<form method="post">';
echo 'Vật phẩm: <select name="vatpham">';
$qs=mysql_query("SELECT * FROM `shopdo` WHERE `hienthi`='1'");
while ($show=mysql_fetch_array($qs)) {
echo '<option value="'.$show[id].'"> '.$show['id'].': '.$show[tenvatpham].'</option>';
}
echo '</select><br/>';
echo 'Cần Huy Hiệu: <input type="text" name="xu" size="5"><br/>';
echo '<input type="submit" name="add" value="Thêm">';
echo '</form>';
}
break;
case 'mua':
$id = (int)$_GET['id'];
$check=mysql_num_rows(mysql_query("SELECT * FROM `hhht` WHERE `id`='".$id."'"));
if ($check<1) {
header('Location: shop.php');
exit;
} else {
$item=mysql_fetch_array(mysql_query("SELECT * FROM `hhht` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item[idshophhht]."'"));
if($datauser['hhht'] < $item['hhht']){
echo'<div class="pmenu"> Lỗi! Bạn không đủ Huy Hiệu Huyền Thoại</div>';
} else  {
echo'<div class="rmenu"><b>Đổi thành công!</div>';
mysql_query("INSERT INTO `kho` SET
`idnick`='".$user_id."',
`loai`='".$shop[loai]."',
`ten`='".$shop[img]."',
`tenvp`='".$shop[tenvatpham]."',
`imgd`='/images/".$shop[loai]."/".$shop[img].".png',`nick`='{$login}',`timesudung`='0'
");
mysql_query("UPDATE `users` SET `hhht` = `hhht` - '".$item['hhht']."' WHERE `id` = '".$user_id."'");
}
}
break;
}
require('../incfiles/end.php');
?>