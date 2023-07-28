<?
/**
* @link        http://johncms.com
* @copyright   Copyright (C) 2008-2011 JohnCMS Community
* @license     LICENSE.txt (see attached file)
* @version     VERSION.txt (see attached file)
* @author      http://johncms.com/about
*/
defined('_IN_JOHNCMS') or die('Error: restricted access');
$mp = new mainpage();
////////////Theme wap/////////////
////////////Hết Themes wap////////////
$thugon = mysql_fetch_array(mysql_query("SELECT * FROM `thugon` WHERE `id`='".$user_id."'"));
//////////bổ sung thông tin//////////
if ( $user_id && $datauser['dayb'] =='0' ||$user_id && $datauser['monthb'] =='0' ||$user_id && $datauser['yearofbirth']=='0' ||$user_id && $datauser['mail'] =='' ||$user_id && $datauser['about'] ==''
||$user_id && $datauser['jabber'] ==''
||$user_id && $datauser['live'] ==''
||$user_id && $datauser['mibile'] ==''){
echo '<div class="mainblok"><div class="dinhkem"> Cập nhật đầy đủ thông tin của bạn <a href="'.$home.'/users/profile.php?act=edit">[+]</a></div></div>';
}
////////////
$time = time();
$req = mysql_query("SELECT * FROM `forum` WHERE `type` = 't' AND `close`!='1' AND `thongbao` = '1' ORDER BY `time` DESC LIMIT 3");
echo '<div class="mainblok"><div class="phdr"><a href="/news">Thông báo</a></div>';
while ($res = mysql_fetch_assoc($req)) {
echo is_integer($i / 2) ? '<div class="list2">' : '<div class="list1">';
echo ' <a href="'.$home.'/forum/'.functions::nhanhnao($res["text"]).'_' . $res['id'] . '.html">' . functions::smileys(tags($res['text'])) . '</a>';
echo '</div>';
}
echo $mp->news;
echo '</div>';
////////////
////////////
/////////mod chat
if ($user_id) {
include'guestbook.php';
}
/////////////////////////////////////////
////mod chủ đề mới/////
echo '<div class="mainblok"><div class="phdr"><a href="/forum/index.php?act=new">Bài viết mới</a></div>';
$req = mysql_query("SELECT * FROM `forum` WHERE `type` = 't' and kedit='0' AND `close`!='1' ORDER BY `time` DESC LIMIT $start, $kmess");
$tong = mysql_result
( mysql_query ( "SELECT
COUNT(*) FROM `forum`
WHERE `type` = 't' and
kedit='0' AND `close`!='1'" ),
0 );
while ($arr = mysql_fetch_array($req)) {
$q3 = mysql_query("select `id`, `refid`, `text` from `forum` where type='r' and id='" . $arr['refid'] . "'");
$razd = mysql_fetch_array($q3);
$q4 = mysql_query("select `id`, `refid`, `text` from `forum` where type='f' and id='" . $razd['refid'] . "'");
$frm = mysql_fetch_array($q4);
$nikuser = mysql_query("SELECT `from`,`id`, `time`, `user_id` FROM `forum` WHERE `type` = 'm' AND `close` != '1' AND `refid` = '" . $arr['id'] . "'ORDER BY time DESC");
$colmes1 = mysql_num_rows($nikuser);
$cpg = ceil($colmes1 / $kmess);
$nam = mysql_fetch_array($nikuser);
$gettop = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum` WHERE `type` = 'r' and id = '".$arr['refid']."'"));
$topic = $gettop['text'];
$vinahit = mysql_query("select `rights` from `users` where id='" . $nam['user_id'] . "'");
$kingkem = mysql_fetch_array($vinahit);
echo is_integer($i / 2) ? '<div class="list2">' : '<div class="list1">';
echo '' . ($arr['edit'] == 1 ? '<img src="../theme/' . $set_user['skin'] . '/images/tz.gif" alt=""/>' : '<img src="../images/op.gif" alt="bài viết"/>') . ' ';
if ($arr['vip'] == 1)
echo '<img src="../theme/' . $set_user['skin'] . '/images/pt.gif" alt=""/>';
if ($arr['realid'] == 1)
echo '<img src="images/rate.gif" alt=""/>';
//like trai tim
$trang4 = mysql_query("SELECT * FROM `forum_thank` WHERE `topic` = '" . ($arr['id'] + 1) . "'");
$trang5 = mysql_num_rows($trang4);
//tien to
$mang = array("label-1","label-2","label-3","label-4","label-5");
$rado = rand(0,4);
$label= $mang[$rado];
$gettop = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum` WHERE`type` = 'r' and id = '".$arr['refid']."'"));
if ($arr['tiento'] ==1) {
echo'';
} elseif ($arr['tiento'] ==2) {
echo'<span class="'.$label.'">Thảo luận</span>';
} elseif ($arr['tiento'] ==3) {
echo'<span class="'.$label.'">Hướng dẫn</span>';
} elseif ($arr['tiento'] ==4) {
echo'<span class="'.$label.'">Share</span>';
} elseif ($arr['tiento'] ==6) {
echo'<img src="/images/vip2.gif">';
} elseif ($arr['tiento'] ==7) {
echo'<span class="'.$label.'">Hỏi</span>';
} elseif ($arr['tiento'] ==8) {
echo'<span class="'.$label.'">Xin</span>';
} elseif ($arr['tiento'] ==9) {
echo'<span class="'.$label.'">Giúp</span>';
}
else {
echo ' <span class="'.$label.'">'.$gettop['text'].'</span> ';
}
if ($cpg > 1) {
echo ' <a href="'.$home.'/forum/'.functions::nhanhnao($arr["text"]).'_' . $arr['id'] . (!$set_forum['upfp'] && $set_forum['postclip'] ? '_clip_' : '') . ($set_forum['upfp'] ? '' : '_p' . $cpg) . '.html#'.$nam['id'].'">';
echo '' . functions::smileys($arr['text']) . '</a> [' . $colmes1 . ']';
if($trang5)
echo' <span style="color:red;">[♥'.$trang5.']</span>';
} else {
echo ' <a href="'.$home.'/forum/'.functions::nhanhnao($arr["text"]).'_' . $arr['id'] . ($cpg > 1 && $set_forum['upfp'] && $set_forum['postclip'] ? '_clip_' : '') . ($set_forum['upfp'] && $cpg > 1 ? '_p' . $cpg : '.html') . '#'.$nam['id'].'">';
echo '' . functions::smileys($arr['text']) . '</a> [' . $colmes1 . ']';
if($trang5)
echo' <span style="color:red;">[♥'.$trang5.']</span>';
}
if ($kingkem['rights'] == 0 ) {
$colornick['colornick'] = '000000';
}
if ($kingkem['rights'] == 1 ) {
$colornick['colornick'] = 'FF66FF';
}
if ($kingkem['rights'] == 2 ) {
$colornick['colornick'] = '8b008b';
}
if ($kingkem['rights'] == 3 ) {
$colornick['colornick'] = 'green';
}
if ($kingkem['rights'] == 4 ) {
$colornick['colornick'] = '770000';
}
if ($kingkem['rights'] == 5 ) {
$colornick['colornick'] = '000000';
}
if ($kingkem['rights'] == 6 ) {
$colornick['colornick'] = '0000FF';
}
if ($kingkem['rights'] == 7 ) {
$colornick['colornick'] = '000000';
}
if ($kingkem['rights'] == 9 ) {
$colornick['colornick'] = '000000';
}
if ($kingkem['rights'] == 10 ) {
$colornick['colornick'] = 'ff0000';
}
if (!empty ($nam['from'])) {
if ($kingkem['rights'] < 8 ) {
echo '&nbsp;<a href="/users/' . $nam['user_id'] . '-'.functions::nhanhnao($nam['from']).'.html"><span style="color:#'.$colornick['colornick'].'">'.$nam['from'].'</span></a>';
} else {
echo '&nbsp;<a href="/users/' . $nam['user_id'] . '-'.functions::nhanhnao($nam['from']).'.html"><font color="black">'.$nam['from'].'</font></a>';
}
if(600 > (time()-$arr['time']))
echo ' <img src="/images/new.gif" alt="bài viết mới"/> ';
}
echo '</div></div>';
$i ++;
}
if ($tong > $kmess){echo '<div class="dinhkem">' . functions::display_pagination('index.php?', $start, $tong, $kmess) . '</div>';}
/////////////////
if ($user_id){
echo '<div class="mainblok"><div class="phdr">Chuyên mục</div>';
if($thugon['td'] == 0) {
$tong = mysql_result(mysql_query("SELECT
COUNT(*) FROM `forum` WHERE `type`
= 't' and kedit='0' AND `close`!='1'"),
0);
$req = mysql_query("SELECT * FROM
`forum` WHERE `type` = 'f' ORDER
BY `realid` ASC");
$i = 0;
while ($res = mysql_fetch_assoc($req))
{
echo $i % 2 ? '<div class="list2">
' : '<div class="list1">';
echo '•&nbsp;<a href="'.$home.'/forum/'.functions::nhanhnao($res["text"]).'_'
. $res['id'] . '.html">' . $res['text']
. '</a>';
echo '</div>';
++$i;
}
} else {
echo '<div class="rmenu">Chuyên Mục Đã Ẩn</div>';
}
//////////het chuyen muc////////////////
echo '</div>';
}else{
echo '<div class="mainblok"><div class="phdr">Chuyên mục</div>';
if($thugon['td'] == 0) {
$tong = mysql_result(mysql_query("SELECT
COUNT(*) FROM `forum` WHERE `type`
= 't' and kedit='0' AND `close`!='1'"),
0);
$req = mysql_query("SELECT * FROM
`forum` WHERE `type` = 'f' ORDER
BY `realid` ASC");
$i = 0;
while ($res = mysql_fetch_assoc($req))
{
echo $i % 2 ? '<div class="list2">
' : '<div class="list1">';
echo '•&nbsp;<a href="'.$home.'/forum/'.functions::nhanhnao($res["text"]).'_'
. $res['id'] . '.html">' . $res['text']
. '</a>';
echo '</div>';
++$i;
}
///////////////////////
echo '</div>';
/*** Từ khóa ***/
//////////////////////
} else {
echo '<div class="rmenu">Chuyên Mục Đã Ẩn</div>';
}
}
////////dam may tu khoa/////////
////////dam may tu khoa/////////
$users = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > '" . (time() - 600) . "'"), 0);
$guests = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_sessions` WHERE `lastdate` > '" . (time() - 600) . "'"), 0);
$total = $users+$guests;
include 'bot.php';
echo '<div class="mainblok"><div class="phdr">Trực tuyến</div>';
function show_online($user = array(), $status = 0, $ip = 0, $str = '', $text = '', $sub = '') { global $set_user, $realtime, $user_id, $admp, $home;
$out = false;
if ($user['rights'] == 0 ) $colornick['colornick'] = '000000';
if ($user['rights'] == 1 )
$colornick['colornick']
= 'FF66FF';
if ($user['rights'] == 2 )
$colornick['colornick']
= '8A0886';
if ($user['rights'] == 3 ) $colornick['colornick'] = 'green';
if ($user['rights'] == 4 ) $colornick['colornick'] = '770000';
if ($user['rights'] == 5 ) $colornick['colornick'] = '000000';
if ($user['rights'] == 6 ) $colornick['colornick'] = '0000FF';
if ($user['rights'] == 7 ) $colornick['colornick'] = '000000';
if ($user['rights'] == 9 ) $colornick['colornick'] = '000000';
if ($user_id){
if($user['rights'] < 8) {
$out .= '<a href="/users/' . $user['id'] . '-'.functions::nhanhnao($user['name']).'.html"><span style="color:#' . $colornick['colornick'] . '">' . $user['name'] . '</span></a>';
} else {
$out .= '<a href="/users/' . $user['id'] . '-'.functions::nhanhnao($user['name']).'.html"><font color="black">' . $user['name'] . '</font></a>';
}
} else {
$out .= '<span style="color:#' . $colornick['colornick'] . '">' . $user['name'] . '</span>';
}
return $out;
}
function timecount($var) {
if ($var < 0)
$var = 0;
$day = ceil($var / 86400);
if ($var > 345600) {
$str = $day . ' Giờ';
} elseif ($var >= 172800) {
$str = $day . ' Рhút';
} elseif ($var >= 86400) {
$str = '1 Giây';
} else {
$str = gmdate('G:i:s', $var);
}
return $str;
}
$on = $_GET['on'];
switch($on) {
default:
echo '<div class="menu"><font color="green">•</font> Có <a href="/users/index.php?act=online">'.$total.' người trực tuyến, </a> '.$users.' thành viên, '.($guests - $coccoc - $gbot - $bing - $msn - $facebook - $yandex - $mj - $baidu).' khách viếng thăm và '.($coccoc + $gbot + $bing + $msn + $facebook + $yandex + $mj + $baidu).' spider.</div>';
$total = mysql_result(mysql_query("SELECT COUNT(*) FROM `" . ($act == 'guest' ? 'cms_guests' : 'users') . "` WHERE `lastdate` > '" . (time() - 600) . "'"), 0);
if ($total > 0) {
echo '<div class="list1">';
$req = mysql_query("SELECT * FROM `" . ($act == 'guest' ? 'cms_guests' : 'users') . "` WHERE `preg`='1' and `lastdate` > '" . (time() - 300) . "' ORDER BY " . ($act == 'guest' ? "`movings` DESC" : "`name` ASC") . " LIMIT 50");
while ($res = mysql_fetch_assoc($req)) {
echo show_online($res, 0, ($act == 'guest' || ($rights >= 1 && $rights >= $res['rights']) ? ($rights >= 6 ? 2 : 1) : 0), ' (' . $res['movings'] . ' - ' . timecount($realtime - $res['sestime']) . ') ' . $place);
echo ', ';
++$l;
}
include 'online.php';
echo'</div></div>';
}
else {
echo '<div class="menu"><p>Không thành viên nào online!</p></div>';
}
break;
case '24h':
echo '<div class="topmenu"><a href="/">Đang online</a> | <b>24h</b></div>';
$total = mysql_result(mysql_query("SELECT COUNT(*) FROM `" . ($act == 'guest' ? 'cms_guests' : 'users') . "` WHERE `lastdate` > '" . (time() - 96000) . "'"), 0);
if ($total > 0) {
echo '<div class="menu"><p>';
$req = mysql_query("SELECT * FROM `" . ($act == 'guest' ? 'cms_guests' : 'users') . "` WHERE `preg`='1' and `lastdate` > '" . (time() - 96000) . "' ORDER BY " . ($act == 'guest' ? "`movings` DESC" : "`name` ASC") . " LIMIT 1000");
while ($res = mysql_fetch_assoc($req)) {
echo show_online($res, 0, ($act == 'guest' || ($rights >= 1 && $rights >= $res['rights']) ? ($rights >= 6 ? 2 : 1) : 0), ' (' . $res['movings'] . ' - ' . timecount($realtime - $res['sestime']) . ') ' . $place);
echo ', ';
++$l;
}
echo'</p></div>';
}
else {
echo '<div class="menu"><p>Không thành viên nào online!</p></div>';
}
break;
}
////////////////////////////
////////////////////////////
?>