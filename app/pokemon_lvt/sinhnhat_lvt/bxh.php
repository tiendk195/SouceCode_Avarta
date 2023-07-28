<?php
define('_IN_JOHNCMS', 1);
$textl = 'Sự Kiện Sinh Nhật';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");
echo'
<div class="phdr">Top Làm Bánh Sinh Nhật</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `sobanhsinhnhat`=`sobanhsinhnhat` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `sobanhsinhnhat` DESC LIMIT 5");
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
  <div class="text">Thành tích: '.number_format($res['sobanhsinhnhat']).' bánh
  </div></td></tr></tbody></table></td></tr></tbody></table></div>';

}
echo'
<div class="phdr">Top Điểm sự kiện</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `diemsinhnhat`=`diemsinhnhat` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `diemsinhnhat` DESC LIMIT 5");
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
  <div class="text">Thành tích: '.number_format($res['diemsinhnhat']).' điểm
  </div></td></tr></tbody></table></td></tr></tbody></table></div>';

}
echo'
<div class="phdr">Top Cao thủ ném pháo sinh nhật Lượng</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `banphaohoaluong`=`banphaohoaluong` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `banphaohoaluong` DESC LIMIT 5");
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
  <div class="text">Thành tích: '.number_format($res['banphaohoaluong']).' điểm
  </div></td></tr></tbody></table></td></tr></tbody></table></div>';
}
echo'
<div class="phdr">Top Cao thủ ném pháo sinh nhật Xu</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `banphaohoaxu`=`banphaohoaxu` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `banphaohoaxu` DESC LIMIT 5");
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
  <div class="text">Thành tích: '.number_format($res['banphaohoaxu']).' điểm
  </div></td></tr></tbody></table></td></tr></tbody></table></div>';
}


require('../../incfiles/end.php');
?>