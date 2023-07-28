<?php
define('_IN_JOHNCMS', 1);
$textl = 'Sự Kiện 1/6';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");
echo'
<div class="phdr">TOP Sự Kiện</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `diemsk16`=`diemsk16` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `diemsk16` DESC LIMIT 3");
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
  <div class="text">Điểm sự kiện: '.number_format($res['diemsk16']).' điểm
  </div></td></tr></tbody></table></td></tr></tbody></table></div>';

}
echo'
<div class="phdr">TOP Bắn Pháo</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `banphaohoa`=`banphaohoa` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `banphaohoa` DESC LIMIT 3");
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
  <div class="text">Đã bắn: '.number_format($res['banphaohoa']).' phát
  </div></td></tr></tbody></table></td></tr></tbody></table></div>';
}



require('../../incfiles/end.php');
?>