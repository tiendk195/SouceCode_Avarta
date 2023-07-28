<?php
define('_IN_JOHNCMS', 1);
$textl = 'Sự Kiện Sinh Nhật';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");
echo'
<div class="nenvip">Top cao thủ Bắn pháo vui vẻ</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `banphaohoapokemon`=`banphaohoapokemon` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `banphaohoapokemon` DESC LIMIT 5");
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
  <div class="text">Thành tích: '.number_format($res['banphaohoapokemon']).' lần
  </div></td></tr></tbody></table></td></tr></tbody></table></div>';

}
echo'
<div class="nenvip">Top cao thủ điểm Pokemon</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `diempokemon`=`diempokemon` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `diempokemon` DESC LIMIT 5");
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
  <div class="text">Thành tích: '.number_format($res['diempokemon']).' điểm
  </div></td></tr></tbody></table></td></tr></tbody></table></div>';
}

require('../../incfiles/end.php');
?>