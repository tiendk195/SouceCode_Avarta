<?php
//viet boi kill
// --vietnam4u.biz--
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
include_once('func.php');
$textl = 'NPC Lái Buôn';
require('../incfiles/head.php');

echo'<div class="maintxt"><div class="phdr">Sắc Màu - MXH Giải Trí Hay Nhất</div><table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
<tr><td width="50px;" class="blog-avatar">';
echo '<img src="icon/laibuon.gif"/>';
echo'</td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0"><tbody>
<tr><td class="current-blog" rowspan="2" style=""><div class="blog-bg-left">';
echo '<img src="http://hi4u.mobi/images/on.png" alt="online"/>';
echo '<font color="red"> <b> Lái Buôn</b></font>'; 
echo'<div class="text">';
switch($act) {
case 'bd':

echo '<div class="menu">Báo danh hằng ngày<br/>';
echo '<b>Sau 12h bạn có thể báo danh tiếp nhé</b></div>';
if(time() > $datauser['tgiannhanqua'] + 3600 * 12 ){
echo '<div class="omenu">';
if(isset($_POST['submit'])) {
echo '<img src="http://hi4u.mobi/images/bdanh.png" alt="báo danh "/>Bạn nhận được 1 điểm chuyên cần, 10 lượng và 1 lượt quay vòng quay may mắn, 100 Tác Dụng <b>Mắt Thần</b> Và 20 Lượt Đào <b>Cổ Vật Nghìn Năm</b>';
mysql_query("UPDATE `users` SET `diemtichluy`=`diemtichluy`+'1', 
`matthan` = `matthan`+'100',
`ldcvnn` = `ldcvnn`+'20',
diemtichluy = diemtichluy +1
`theqs`=`theqs`+'1',
`vinaxu`=`vinaxu`+'10', `tgiannhanqua` = '".time()."' WHERE `id`='{$user_id}'");
}
echo '<form method="post"><input type="submit" name="submit" value="Báo danh" /></form>
</div>';
////bot chat
$time = time();
$bot = ' [b][red]'.$login.' [/red][/b] Nhận Được
 [b]+ 1 Miễn Phí Vòng Quay May Mắn
+ 100 Tác Dụng Mắt Thần
+ 1 Điểm Chuyên Cần
+ 20 Lượt Đào Cổ Vật Nghìn Năm  [/b]Từ Báo Danh Nông Trại Hàng Ngày Tại Lái Buôn!';
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '2',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE8'
");
} else {
echo '<div class="menu"><b><font color="red">Lỗi </font> Bạn đã báo danh rồi!!.</b></div>';
}
echo '</div>';

break;
case 'loz':
echo 'hhh';
break;
case 'ttcc':
echo '<div class="menu"><b style="color:green">'.$datauser[diemtichluy].'</b> điểm chuyên cần!!</div>';
break;
case 'doiqua':
echo '<div style="text-align:center"><a href="?act=doivinaxu"><input type="button" value="Vào Khu Đổi Quà"/></a>';
echo '</div></div>';
break;
case 'doivinaxu':
echo'<div class="menu list-bottom"><span style="color:green">2 điểm</span> tích lũy bạn có thể đổi được <span style="color:green">1 Lượng</span></div>';
$kuxl = intval($_POST['kupit']);
$xutru = $kuxl*2;
if (isset($_POST['kupit']) && $xutru > $datauser[diemtichluy]) {
echo'<div class="menu list-bottom congdong"><b style="color:red">Bạn không đủ điểm tích lũy để đổi '.$kuxl.' Lượng nhé bạn cần phải có '.$xutru.' điểm tích lũy để đổi nhé !</b></div>';
}
echo '<form method="post">Đổi <input type="text" name="kupit" size="1" value=""/> Vinaxu<br/><input type="submit" name="save" value="Quy Đổi" /></form>';
if(isset($_POST['kupit']) && $datauser[diemtichluy]>=$xutru && $kuxl>0){
mysql_query("UPDATE `users` SET `diemtichluy` = `diemtichluy`- $xutru WHERE `id` = $user_id LIMIT 1");
mysql_query("UPDATE `users` SET `vinaxu` = `vinaxu` + '".$kuxl."' WHERE `id` = $user_id LIMIT 1");
echo'<div class="menu list-top congdong"><b style="color:green">Bạn đã đổi thành công '.$kuxl.' vinaxu '.$post['name'].' bạn mất '.$xutru.' điểm tích lũy</b></div>';
}



break;
}















echo'<div class="diendan9x-net"><a href="/halloween/keothuong.php">Đổi Kẹo Cà Chua</a></div>';
echo'<div class="diendan9x-net"><a href="/halloween/keotruta.php">Đổi Kẹo Trừ Tà</a></div>';
echo '<div class="diendan9x-net"><a href="/khuvuichoi/quayso"> Quay Số May Mắn </a></div>';
echo '<div class="diendan9x-net"><a href="?act=bd"> Báo danh hằng ngày</a></div>';
echo '<div class="diendan9x-net"><a href="/farm/laibuon.php?act=ttcc"> Thông tin chuyên cần</a></div>';
echo '<div class="diendan9x-net"><a href="/farm/laibuon.php?act=doiqua"> Đổi quà<a/></div>';

echo'</div></div></td></tr></tbody></table></td></tr></tbody></table>';


require("../incfiles/end.php");
?>