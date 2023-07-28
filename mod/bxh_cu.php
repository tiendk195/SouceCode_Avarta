<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl='Bảng Xếp Hạng';
require('../incfiles/head.php');
/*
echo'<div class="phdr">Đua Top Cao Thủ Nhận Danh Hiệu</div>';
echo'<div class="omenu"><center><b><a href="/member/1.html"><img src="/avatar/1.png"></br><font color="red">Admin</font></a></b></br>
Đua top nhận danh hiệu <b style="color:red"> [VIP]</b> <b style="color:blue"> [PRO]</b> <b style="color:green"> [TOP]</b> <b style="color:#ff5159"> [LOVE ♥]</b> <b style="color:#ff3399"> [FISH VIP]</b> <b style="color:#FF6633"> [BOSS VIP]</b> <b style="color:#0088FF"> [Chém gió]</b> <b style="color:#FF3399"> [SVIP]</b></center></div>';
*/
switch ($act){
	default:
if ($datauser['rights']>=9){
echo'<div class="phdr">Quản lí</div>';
echo'<div class="omenu"><a href="?act=reset">Reset BXH</a></div>';
}
echo'
<div class="phdr">TOP Quảng Cáo</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `gioithieu`=`gioithieu` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `gioithieu` DESC LIMIT 3");
$i=1;
while
($res=mysql_fetch_array($vnviet)) {
	echo'<div class="forumtext"><table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
	<tbody><tr><td width="45px;" class="blog-avatar"><a href="/member/'.$res['id'].'.html">
	<img src="/avatar/'.$res['id'].'.png" width="45" height="48" alt="'.$res['name'].'"></a></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0">
	<tbody><tr><td class="current-blog2" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div>';
	echo (time() > $res['lastdate'] + 300 ? ' <img style="vertical-align:middle;" title="' . $res['from'] . ' is offline" src="/images/off.png" alt="offline"/> ' : '<img style="vertical-align:middle;" title="' . $res['from'] . ' is online" src="/images/on.png" alt="online"/> ');
	echo'
	 <a href="/member/'.$res['id'].'.html"><b>'.nick($res['id']).'</b></a>
  <div class="text">Giới thiệu: '.number_format($res['gioithieu']).' người
  </div></td></tr></tbody></table></td></tr></tbody></table></div>';

}
echo'
<div class="phdr">TOP Level</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `level`=`level` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `level` DESC LIMIT 3");
$i=1;
while
($res=mysql_fetch_array($vnviet)) {
	echo'<div class="forumtext"><table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
	<tbody><tr><td width="45px;" class="blog-avatar"><a href="/member/'.$res['id'].'.html">
	<img src="/avatar/'.$res['id'].'.png" width="45" height="48" alt="'.$res['name'].'"></a></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0">
	<tbody><tr><td class="current-blog2" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div>';
	echo (time() > $res['lastdate'] + 300 ? ' <img style="vertical-align:middle;" title="' . $res['from'] . ' is offline" src="/images/off.png" alt="offline"/> ' : '<img style="vertical-align:middle;" title="' . $res['from'] . ' is online" src="/images/on.png" alt="online"/> ');
	echo'
	 <a href="/member/'.$res['id'].'.html"><b>'.nick($res['id']).'</b></a>
  <div class="text">Level: '.number_format($res['level']).' +'.number_format($res['chisolevel']).'% 
  </div></td></tr></tbody></table></td></tr></tbody></table></div>';

}

echo'
<div class="phdr">TOP Giết Boss</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `wboss`=`wboss` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `wboss` DESC LIMIT 3");
$i=1;
while
($res=mysql_fetch_array($vnviet)) {
	echo'<div class="forumtext"><table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
	<tbody><tr><td width="45px;" class="blog-avatar"><a href="/member/'.$res['id'].'.html">
	<img src="/avatar/'.$res['id'].'.png" width="45" height="48" alt="'.$res['name'].'"></a></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0">
	<tbody><tr><td class="current-blog2" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div>';
	echo (time() > $res['lastdate'] + 300 ? ' <img style="vertical-align:middle;" title="' . $res['from'] . ' is offline" src="/images/off.png" alt="offline"/> ' : '<img style="vertical-align:middle;" title="' . $res['from'] . ' is online" src="/images/on.png" alt="online"/> ');
	echo'
	 <a href="/member/'.$res['id'].'.html"><b>'.nick($res['id']).'</b></a>
  <div class="text">Boss: '.number_format($res['wboss']).' con
  </div></td></tr></tbody></table></td></tr></tbody></table></div>';

}
echo'
<div class="phdr">TOP Thu Hoạch Nhà Bếp</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `nhabepthuhoach`=`nhabepthuhoach` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `nhabepthuhoach` DESC LIMIT 3");
$i=1;
while
($res=mysql_fetch_array($vnviet)) {
echo'<div class="forumtext"><table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
	<tbody><tr><td width="45px;" class="blog-avatar"><a href="/member/'.$res['id'].'.html">
	<img src="/avatar/'.$res['id'].'.png" width="45" height="48" alt="'.$res['name'].'"></a></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0">
	<tbody><tr><td class="current-blog2" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div>';
	echo (time() > $res['lastdate'] + 300 ? ' <img style="vertical-align:middle;" title="' . $res['from'] . ' is offline" src="/images/off.png" alt="offline"/> ' : '<img style="vertical-align:middle;" title="' . $res['from'] . ' is online" src="/images/on.png" alt="online"/> ');
	echo'
	 <a href="/member/'.$res['id'].'.html"><b>'.nick($res['id']).'</b></a>
  <div class="text">Thu hoạch được: '.number_format($res['nhabepthuhoach']).' xu
  </div></td></tr></tbody></table></td></tr></tbody></table></div>';
}
echo'
<div class="phdr">TOP Thu Hoạch Nông Trại</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `xuthuhoach`=`xuthuhoach` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `xuthuhoach` DESC LIMIT 3");
$i=1;
while
($res=mysql_fetch_array($vnviet)) {
echo'<div class="forumtext"><table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
	<tbody><tr><td width="45px;" class="blog-avatar"><a href="/member/'.$res['id'].'.html">
	<img src="/avatar/'.$res['id'].'.png" width="45" height="48" alt="'.$res['name'].'"></a></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0">
	<tbody><tr><td class="current-blog2" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div>';
	echo (time() > $res['lastdate'] + 300 ? ' <img style="vertical-align:middle;" title="' . $res['from'] . ' is offline" src="/images/off.png" alt="offline"/> ' : '<img style="vertical-align:middle;" title="' . $res['from'] . ' is online" src="/images/on.png" alt="online"/> ');
	echo'
	 <a href="/member/'.$res['id'].'.html"><b>'.nick($res['id']).'</b></a>
  <div class="text">Thu hoạch được: '.number_format($res['xuthuhoach']).' xu
  </div></td></tr></tbody></table></td></tr></tbody></table></div>';
}
echo'
<div class="phdr">TOP Thả Thính</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `solanhon`=`solanhon` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `solanhon` DESC LIMIT 3");
$i=1;
while
($res=mysql_fetch_array($vnviet)) {
echo'<div class="forumtext"><table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
	<tbody><tr><td width="45px;" class="blog-avatar"><a href="/member/'.$res['id'].'.html">
	<img src="/avatar/'.$res['id'].'.png" width="45" height="48" alt="'.$res['name'].'"></a></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0">
	<tbody><tr><td class="current-blog2" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div>';
	echo (time() > $res['lastdate'] + 300 ? ' <img style="vertical-align:middle;" title="' . $res['from'] . ' is offline" src="/images/off.png" alt="offline"/> ' : '<img style="vertical-align:middle;" title="' . $res['from'] . ' is online" src="/images/on.png" alt="online"/> ');
	echo'
	 <a href="/member/'.$res['id'].'.html"><b>'.nick($res['id']).'</b></a>
  <div class="text">Đã hôn: '.number_format($res['solanhon']).' lần
  </div></td></tr></tbody></table></td></tr></tbody></table></div>';
}


echo'
<div class="phdr">TOP Chém Gió</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `diemchemgiotuan`=`diemchemgiotuan` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `diemchemgiotuan` DESC LIMIT 3");
$i=1;
while
($res=mysql_fetch_array($vnviet)) {
echo'<div class="forumtext"><table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
	<tbody><tr><td width="45px;" class="blog-avatar"><a href="/member/'.$res['id'].'.html">
	<img src="/avatar/'.$res['id'].'.png" width="45" height="48" alt="'.$res['name'].'"></a></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0">
	<tbody><tr><td class="current-blog2" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div>';
	echo (time() > $res['lastdate'] + 300 ? ' <img style="vertical-align:middle;" title="' . $res['from'] . ' is offline" src="/images/off.png" alt="offline"/> ' : '<img style="vertical-align:middle;" title="' . $res['from'] . ' is online" src="/images/on.png" alt="online"/> ');
	echo'
	 <a href="/member/'.$res['id'].'.html"><b>'.nick($res['id']).'</b></a>
  <div class="text">Chém gió: '.number_format($res['diemchemgiotuan']).' lần
  </div></td></tr></tbody></table></td></tr></tbody></table></div>';
}
echo'
<div class="phdr">TOP Câu Cá</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `soca`=`soca` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `soca` DESC LIMIT 3");
$i=1;
while
($res=mysql_fetch_array($vnviet)) {
echo'<div class="forumtext"><table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
	<tbody><tr><td width="45px;" class="blog-avatar"><a href="/member/'.$res['id'].'.html">
	<img src="/avatar/'.$res['id'].'.png" width="45" height="48" alt="'.$res['name'].'"></a></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0">
	<tbody><tr><td class="current-blog2" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div>';
	echo (time() > $res['lastdate'] + 300 ? ' <img style="vertical-align:middle;" title="' . $res['from'] . ' is offline" src="/images/off.png" alt="offline"/> ' : '<img style="vertical-align:middle;" title="' . $res['from'] . ' is online" src="/images/on.png" alt="online"/> ');
	echo'
	 <a href="/member/'.$res['id'].'.html"><b>'.nick($res['id']).'</b></a>
  <div class="text">Đã câu: '.number_format($res['soca']).' con
  </div></td></tr></tbody></table></td></tr></tbody></table></div>';
}
echo'
<div class="phdr">Top Nạp Thẻ Tuần</div>';
//$vnviet= mysql_query("SELECT * FROM users WHERE `xu`=`xu` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `xu`  DESC LIMIT 5");
$vnviet= mysql_query("SELECT * FROM users WHERE `naptuan`=`naptuan` >= 0  AND `rights` < 9  AND `id`!=2  AND `id`!=1 AND `id`!=256   ORDER BY `naptuan`  DESC LIMIT 3");

$i=1;
while
($res=mysql_fetch_array($vnviet)) {
echo'<div class="forumtext"><table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
	<tbody><tr><td width="45px;" class="blog-avatar"><a href="/member/'.$res['id'].'.html">
	<img src="/avatar/'.$res['id'].'.png" width="45" height="48" alt="'.$res['name'].'"></a></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0">
	<tbody><tr><td class="current-blog2" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div>';
	echo (time() > $res['lastdate'] + 300 ? ' <img style="vertical-align:middle;" title="' . $res['from'] . ' is offline" src="/images/off.png" alt="offline"/> ' : '<img style="vertical-align:middle;" title="' . $res['from'] . ' is online" src="/images/on.png" alt="online"/> ');
	echo'
	 <a href="/member/'.$res['id'].'.html"><b>'.nick($res['id']).'</b></a>
  <div class="text">Đã nạp: '.number_format($res['naptuan']).' VNĐ
  </div></td></tr></tbody></table></td></tr></tbody></table></div>';
}


echo'
<div class="phdr">Top Xu</div>';
//$vnviet= mysql_query("SELECT * FROM users WHERE `xu`=`xu` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `xu`  DESC LIMIT 5");
$vnviet= mysql_query("SELECT * FROM users WHERE `xu`=`xu` >= 0 AND `rights` < 9    AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `xu`  DESC LIMIT 3");

$i=1;
while
($res=mysql_fetch_array($vnviet)) {
echo'<div class="forumtext"><table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
	<tbody><tr><td width="45px;" class="blog-avatar"><a href="/member/'.$res['id'].'.html">
	<img src="/avatar/'.$res['id'].'.png" width="45" height="48" alt="'.$res['name'].'"></a></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0">
	<tbody><tr><td class="current-blog2" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div>';
	echo (time() > $res['lastdate'] + 300 ? ' <img style="vertical-align:middle;" title="' . $res['from'] . ' is offline" src="/images/off.png" alt="offline"/> ' : '<img style="vertical-align:middle;" title="' . $res['from'] . ' is online" src="/images/on.png" alt="online"/> ');
	echo'
	 <a href="/member/'.$res['id'].'.html"><b>'.nick($res['id']).'</b></a>
  <div class="text">Xu: '.number_format($res['xu']).'
  </div></td></tr></tbody></table></td></tr></tbody></table></div>';
}
echo'
<div class="phdr">Top Lượng</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `luong`=`luong` >= 0 AND `id`!=2 AND `id`!=1 AND `id`!=256  AND `rights` < 9 ORDER BY `luong` DESC LIMIT 3");
$i=1;
while
($res=mysql_fetch_array($vnviet)) {
echo'<div class="forumtext"><table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
	<tbody><tr><td width="45px;" class="blog-avatar"><a href="/member/'.$res['id'].'.html">
	<img src="/avatar/'.$res['id'].'.png" width="45" height="48" alt="'.$res['name'].'"></a></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0">
	<tbody><tr><td class="current-blog2" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div>';
	echo (time() > $res['lastdate'] + 300 ? ' <img style="vertical-align:middle;" title="' . $res['from'] . ' is offline" src="/images/off.png" alt="offline"/> ' : '<img style="vertical-align:middle;" title="' . $res['from'] . ' is online" src="/images/on.png" alt="online"/> ');
	echo'
	 <a href="/member/'.$res['id'].'.html"><b>'.nick($res['id']).'</b></a>
  <div class="text">Lượng: '.number_format($res['luong']).' 
  </div></td></tr></tbody></table></td></tr></tbody></table></div>';
}

echo'
<div class="phdr">Top HP</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `hpfull`=`hpfull` >= 0 AND `id`!=2 AND `id`!=1 AND `id`!=256  AND `rights` < 9 ORDER BY `hpfull` DESC LIMIT 3");
$i=1;
while
($res=mysql_fetch_array($vnviet)) {
echo'<div class="forumtext"><table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
	<tbody><tr><td width="45px;" class="blog-avatar"><a href="/member/'.$res['id'].'.html">
	<img src="/avatar/'.$res['id'].'.png" width="45" height="48" alt="'.$res['name'].'"></a></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0">
	<tbody><tr><td class="current-blog2" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div>';
	echo (time() > $res['lastdate'] + 300 ? ' <img style="vertical-align:middle;" title="' . $res['from'] . ' is offline" src="/images/off.png" alt="offline"/> ' : '<img style="vertical-align:middle;" title="' . $res['from'] . ' is online" src="/images/on.png" alt="online"/> ');
	echo'
	 <a href="/member/'.$res['id'].'.html"><b>'.nick($res['id']).'</b></a>
  <div class="text">HP: '.number_format($res['hp']).'/'.number_format($res['hpfull']).' 
  </div></td></tr></tbody></table></td></tr></tbody></table></div>';
}
echo'
<div class="phdr">Top SM</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `sucmanh`=`sucmanh` >= 0 AND `id`!=2 AND `id`!=1 AND `id`!=256  AND `rights` < 9 ORDER BY `sucmanh` DESC LIMIT 3");
$i=1;
while
($res=mysql_fetch_array($vnviet)) {
echo'<div class="forumtext"><table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
	<tbody><tr><td width="45px;" class="blog-avatar"><a href="/member/'.$res['id'].'.html">
	<img src="/avatar/'.$res['id'].'.png" width="45" height="48" alt="'.$res['name'].'"></a></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0">
	<tbody><tr><td class="current-blog2" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div>';
	echo (time() > $res['lastdate'] + 300 ? ' <img style="vertical-align:middle;" title="' . $res['from'] . ' is offline" src="/images/off.png" alt="offline"/> ' : '<img style="vertical-align:middle;" title="' . $res['from'] . ' is online" src="/images/on.png" alt="online"/> ');
	echo'
	 <a href="/member/'.$res['id'].'.html"><b>'.nick($res['id']).'</b></a>
  <div class="text">SM: '.number_format($res['sucmanh']).'
  </div></td></tr></tbody></table></td></tr></tbody></table></div>';
}

break;

case 'reset':
if ($datauser['rights']<9 ) {
header('Location: /index.php');
}
echo'<div class="phdr">Reset BXH</div>';


if (isset($_POST[rs])) {
	$text = ' '.$login.' vừa reset BXH!! ';

	mysql_query("INSERT INTO `thongbao` SET
                `id` = '1',
                `user` = '1',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
			
	echo'<div class="omenu">Thành công</div>';
	mysql_query("UPDATE `users` SET `soca` = '0' ");
	mysql_query("UPDATE `users` SET `nhabepthuhoach` = '0' ");

	mysql_query("UPDATE `users` SET `diemchemgiotuan` = '0' ");
		mysql_query("UPDATE `users` SET `solanhon` = '0' ");
			mysql_query("UPDATE `users` SET `xuthuhoach` = '0' ");
	mysql_query("UPDATE `users` SET `wboss` = '0' ");
		mysql_query("UPDATE `users` SET `naptuan` = '0' ");

}
echo'<div class="omenu">';

		echo '<form method="post">';

echo'Đồng ý reset</br>';
echo'
<input type="submit" name="rs" value="Ok" class="nut"></form></div></center>';
break;

}

require('../incfiles/end.php');
?>