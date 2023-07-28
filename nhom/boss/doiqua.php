<?php



define('_IN_JOHNCMS', 1);
$rootpath='../../';

require('../../incfiles/core.php');
$textl = 'Đổi Quà Hội Nhóm';

require('../../incfiles/head.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');
$dangusac=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='123'"));

$cl = mysql_fetch_array(mysql_query("SELECT * FROM `nhom_user` WHERE `user_id`='".$user_id."'"));
$clan = mysql_fetch_array(mysql_query("SELECT * FROM `nhom` WHERE `id`='".$cl['id']."'"));
$gio = date("Hi");
echo'<div class="phdr">Đổi Quà Hội Nhóm</div>';
if($clan < 1){
    
echo'<div class="omenu"><b>Vui lòng gia nhập Clan để sử dụng chức năng</b></div>';
} else if ($datauser['kichhoat']==0) {
    echo'<div class="omenu"><b>Vui lòng kích hoạt tài khoản để sử dụng chức năng</b></div>';
} else if ($datauser['postforum']<20) {
    echo'<div class="omenu"><b>Vui lòng đạt 20 bài viết để sử dụng chức năng</b></div>';
} else 
if( $dangusac['soluong']<=0){
echo'<div class="rmenu"><b>Bạn không có <img src="dns.png"> đá ngũ sắc để đổi quà! Hãy đánh boss clan để nhận đá ngũ sắc nhé!</b></div>';
} else {
echo'<div class="menu">Bạn đang có <b>'.number_format($dangusac['soluong']).'</b> <img src="dns.png"> đá ngũ sắc</div>';

switch($act) {
default:
$tong =mysql_result(mysql_query("SELECT COUNT(*) FROM `quahoinhom` "),0);
$req=mysql_query("SELECT * FROM `quahoinhom` ORDER BY `id` DESC LIMIT 50");
while($res=mysql_fetch_array($req)) {
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$res[idshop]."'"));
echo '<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
</tr>
<tr>
<td class="left-info"><img src="/images/shop/'.$shop['id'].'.png">
</td>
<td class="right-info"><span><b> Tên: '.$shop[tenvatpham].'<br>
Cần: '.number_format($res['dns']).' <img src="dns.png"> để đổi</b><br><a href="?act=ok&id='.$res[id].'"><font color="green"><b> Đổi vật phẩm</b></font></a></span></td>
</tr></table>';
}
echo '</td></tr></tbody></table></td></tr></tbody></table>';

break;
case 'add':
if ($datauser['rights'] >= 9) {
echo '<div class="phdr">Thêm đồ</div>';
if (isset($_POST[add])) {
$vatpham=(int)$_POST[vatpham];
$diem=(int)$_POST[diem];

if (empty($vatpham)) {
echo '<div class="news">Không được bỏ trống chỗ nào hết!</div>';
} else {
mysql_query("INSERT INTO `quahoinhom` SET
`idshop`='".$vatpham."',
`dns`='".$diem."'");
$tenvatpham=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$vatpham."'"));
$bot='[b]'.$login.' vừa thêm [red]'.$tenvatpham[tenvatpham].' [/red] vào quà boss clan ![/b]';
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

echo 'Cần đns: <input type="text" name="diem" size="5"><br/>';

echo '<input type="submit" name="add" value="Thêm">';
echo '</form>';
}
break;
case 'ok':
$id = (int)$_GET['id'];
$check=mysql_num_rows(mysql_query("SELECT * FROM `quahoinhom` WHERE `id`='".$id."'"));
if ($check<1) {
header('Location: doiqua.php');
exit;
} else {
$item=mysql_fetch_array(mysql_query("SELECT * FROM `quahoinhom` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item[idshop]."'"));
if( $dangusac['soluong']<$item['dns']){
echo'<div class="rmenu"> Lỗi! Bạn không đủ <img src="dns.png"></div>';
} else  {

echo'<div class="rmenu"><b>Đổi thành công!</div>';
mysql_query("INSERT INTO `khodo` SET `user_id`='".$user_id."', `id_shop`='".$shop['id']."', `loai`='".$shop['loai']."', `id_loai`='".$shop['id_loai']."', `tenvatpham` = '".$shop['tenvatpham']."', `timesudung`='".$shop['timesudung']."'");


mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$item['dns']."' WHERE `user_id`='".$user_id."' AND `id_shop`='123'");
}
}
break;
}
}
require('../../incfiles/end.php');
?>