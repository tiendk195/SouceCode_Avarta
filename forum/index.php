<?php

/**
Q* @package     JohnCMS
* @link        http://vietnam4u.Top
* @copyright   Copyright (C) 2014 kill
* @license     LICENSE.txt (see attached file)
* @version     VERSION.txt (see attached file)
* @author      http://vietnam4u.Top
*/

define('_IN_JOHNCMS', 1);

require('../incfiles/core.php');
$lng_forum = core::load_lng('forum');
if (isset($_SESSION['ref']))
unset($_SESSION['ref']);
/*
-----------------------------------------------------------------
Kill - Vina4u
-----------------------------------------------------------------
*/
$set_forum = $user_id && !empty($datauser['set_forum']) ? unserialize($datauser['set_forum']) : array(
'farea' => 0,
'upfp' => 0,
'preview' => 1,
'postclip' => 1,
'postcut' => 2
);

/*
-----------------------------------------------------------------
Hoàng Anh
-----------------------------------------------------------------
*/
// Kill - Vina4u
$ext_arch = array(
'zip',
'rar',
'7z',
'tar',
'nth',
'apk',
'sql.gz',
'sql',
'gz'
);
// Kill - Vina4u
$ext_audio = array(
'mp3',
'wav',
'amr'
);
// kill - Vina4u
$ext_doc = array(
'txt',
'pdf',
'doc',
'rtf',
'djvu',
'xls'
);
// kill - Vina4u
$ext_java = array(
'jar',
'_jar',
'jad'
);
// kill - Vina4u
$ext_pic = array(
'jpg',
'JPG',
'gif',
'png',
'PNG',
'psd',
'bmp'
);
// kill - Vina4u
$ext_sis = array(
'sis',
'sisx'
);
// kill - Vina4u
$ext_video = array(
'3gp',
'avi',
'flv',
'mpeg',
'mp4'
);
// Kill - Vina4u
$ext_win = array(
'exe',
'msi'
);

// kill - Vina4u
$ext_other = array('wmf');

/*
-----------------------------------------------------------------
Kill - Vina4u
-----------------------------------------------------------------
*/
$error = '';
if (!$set['mod_forum'] && $rights < 7)
$error = $lng_forum['forum_closed'];
elseif ($set['mod_forum'] == 1 && !$user_id)
$error = $lng['access_guest_forbidden'];
if ($error) {
require('../incfiles/head.php');
echo '<div class="rmenu"><p>' . $error . '</p></div>';
require('../incfiles/end.php');
exit;
}

$headmod = $id ? 'forum,' . $id : 'forum';
$postres = mysql_fetch_assoc(mysql_query("SELECT `forum`.* FROM `forum` LEFT JOIN `users` ON `forum`.`user_id` = `users`.`id` WHERE `forum`.`type` = 'm' AND `forum`.`refid` = '$id' ORDER BY `forum`.`id` ASC LIMIT 1"));
$tukhoa = $text;
$mota = bbcode::notags($postres['text']);
$page = ($_GET['trang']);
if ( $page >1 ){
$vina4u = 'Trang '.$page.' | ';
}
$page1 = ($_GET['page']);
if ( $page1 >1 ){
$vina4u1 = 'Trang '.$page1.' | ';
}
/*
-----------------------------------------------------------------
Kill - Vina4u
-----------------------------------------------------------------
*/
if (empty($id)) {
$textl = '' . $lng['forum'] . '';
} else {
$req = mysql_query("SELECT `text`,`refid` FROM `forum` WHERE `id`= '" . $id . "'");
$res = mysql_fetch_assoc($req);
$gettop = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum` WHERE `type` = 'r' and id = '".$res['refid']."'"));
$textl = $res['text'].' | '.$vina4u1.''.$vina4u.' Mạng Xã Hội ';
}
$top = $res['text'];
$top = html_entity_decode($top, ENT_QUOTES,'UTF-8');
if($res['type']=='t') {
$id_post = mysql_result(mysql_query("SELECT MIN(`id`) FROM `forum` WHERE `type`= 'm' AND `refid`='$id';"), 0);
$q = mysql_fetch_assoc(mysql_query("SELECT `text` FROM `forum` WHERE `id`= '" . $id_post . "' LIMIT 1;"));
functions::create_keywords($q['text'], ', ', 20);
}
/*
-----------------------------------------------------------------

-----------------------------------------------------------------
*/
$mods = array(
'addfile',
'import',
'nhapfile',
'xoafile',
'tag',
'tags',
'addvote',
'close',
'deltema',
'delvote',
'editpost',
'editvote',
'file',
'files',
'filter',
'loadtem',
'massdel',
'new',
'nt',
'per',
'post',
'ren',
'restore',
'say',
'tema',
'users',
'vip',
'indam',
'unindam',
'vote',
'who',
'topicvip',
'unvip',
'topnew',
'unnew',
'curators',
'report'
);
if ($act && ($key = array_search($act, $mods)) !== false && file_exists('includes/' . $mods[$key] . '.php')) {
require('includes/' . $mods[$key] . '.php');
} else {
require('../incfiles/head.php');

/*
-----------------------------------------------------------------

-----------------------------------------------------------------
*/
if (!$set['mod_forum']) echo '<div class="alarm">' . $lng_forum['forum_closed'] . '</div>';elseif ($set['mod_forum'] == 3) echo '<div class="rmenu">' . $lng['read_only'] . '</div>';
if (!$user_id) {
if (isset($_GET['newup']))
$_SESSION['uppost'] = 1;
if (isset($_GET['newdown']))
$_SESSION['uppost'] = 0;
}
if ($id) {
/*
-----------------------------------------------------------------

-----------------------------------------------------------------
*/
$type = mysql_query("SELECT * FROM `forum` WHERE `id`= '$id'");
if (!mysql_num_rows($type)) {

echo functions::display_error($lng_forum['error_topic_deleted'], '<a href="' . $set['homeurl'] . '/forum/index.php">' . $lng['to_forum'] . '</a>');
require('../incfiles/end.php');
exit;
}
$type1 = mysql_fetch_assoc($type);

/*
-----------------------------------------------------------------
/*
-----------------------------------------------------------------

-----------------------------------------------------------------
*/
$res = TRUE;
$allow = 0;
$parent = $type1['refid'];
while ($parent != '0' && $res != FALSE) {
$req = mysql_query("SELECT * FROM `forum` WHERE `id` = '$parent' LIMIT 1");
$res = mysql_fetch_assoc($req);
if ($res['type'] == 'r') {
$tree[] = '' . $res['text'] . '';
if ($res['type'] == 'r' && !empty($res['edit'])) {
if (!empty($res['soft']))
echo '<br/><span class="gray">' . $res['soft'] . '</span>';
$allow = intval($res['edit']);
}
}
$parent = $res['refid'];
}

if ($type1['type'] != 't' && $type1['type'] != 'm')
$tree[] = '<b>' . $type1['text'] . '</b>';


/*


-----------------------------------------------------------------

-----------------------------------------------------------------
*/
$sql = ($rights == 9) ? "" : " AND `del` != '1'";
if ($type1['type'] == 'f') {
$count = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_forum_files` WHERE `cat` = '$id'" . $sql), 0);
if ($count > 0)
$filelink = '<a href="' . $set['homeurl'] . '/forum/index.php?act=files&amp;c=' . $id . '">' . $lng_forum['files_category'] . '</a>';
} elseif ($type1['type'] == 'r') {
@$count = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_forum_files` WHERE `subcat` = '$id'" . $sql), 0);
if ($count > 0)
$filelink = '<a href="' . $set['homeurl'] . '/forum/index.php?act=files&amp;s=' . $id . '">' . $lng_forum['files_section'] . '</a>';
} elseif ($type1['type'] == 't') {
@$count = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_forum_files` WHERE `topic` = '$id'" . $sql), 0);
if ($count > 0)
$filelink = '<a href="' . $set['homeurl'] . '/forum/index.php?act=files&amp;t=' . $id . '">' . $lng_forum['files_topic'] . '</a>';
}
$filelink = isset($filelink) ? $filelink . '&#160;<span class="red">(' . $count . ')</span>' : false;
switch ($type1['type']) {
case 'f':
/*
-----------------------------------------------------------------

-----------------------------------------------------------------
*/
echo '<div class="homeforum"><div class="icon-home"><div class="home">Diễn Đàn</a></div></div></div>';
echo '<div class="phdr">' . functions::display_menu($tree) . '</div>';
$req = mysql_query("SELECT `id`, `text`, `soft` FROM `forum` WHERE `type`='r' AND `refid`='$id' ORDER BY `realid`");
$total = mysql_num_rows($req);
if ($total) {
$i = 0;
while (($res = mysql_fetch_assoc($req)) !== false) {
echo $i % 2 ? '<div class="list1">' : '<div class="list1">';
$coltem = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum` WHERE `type` = 't' AND `refid` = '" . $res['id'] . "'"), 0);
echo '<a href="/forums/' . $res['id'] . '.html">' . $res['text'] . ' </a>';
if (!empty($res['soft']))
echo '<br/><span class="gray">' . $res['soft'] . '</span>';
echo '</div>';
++$i;
}
unset($_SESSION['fsort_id']);
unset($_SESSION['fsort_users']);
} else {
echo '<div class="menu"><p>' . $lng_forum['section_list_empty'] . '</p></div>';
}

break;

case 'r':
/*
-----------------------------------------------------------------

-----------------------------------------------------------------
*/
echo '<div class="homeforum"><div class="icon-home"><div class="home">Diễn đàn</div></div></div>';
echo'<div class="box_list_parent_index">';
$total = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum` WHERE `type`='t' AND `refid`='$id'" . ($rights >= 7 ? '' : " AND `close`!='1'")), 0);
if (($user_id && !isset($ban['1']) && !isset($ban['11']) && $set['mod_forum'] != 3) || core::$user_rights) {
//
if($id ==2 & $rights < 3 ) {
echo '<div id="khung" class="topmenu"><font color="red">Bạn không có quyền đăng bài viết tại chuyên mục này</font></div>';
}else{
echo '<div class="topmenu"><form action="/forums/dang-bai-' . $id . '.html" method="post"><input type="submit" value="Viết Bài Mới" /></form></div>';
}
}
echo '<div class="phdr">Chuyên mục : ' . functions::display_menu($tree) . '</div>';
////////chu y aevui.me/////////

$reqa = mysql_query("SELECT * FROM `forum` WHERE `type`='t' AND `close`!='1' AND `refid`='$id' ORDER BY `time` DESC LIMIT 10");


$totala = mysql_num_rows($reqa);

if($totala)

{
$i = 0;
while ($res = mysql_fetch_assoc($reqa)) {
if ($res['close'])
if ($res['vip'] == 1)
echo'';
else
$view = mysql_query("UPDATE forum SET view = view + 1 WHERE id = $id");
$nikuser = mysql_query("SELECT `from` FROM `forum` WHERE `type` = 'm' AND `close` != '1' AND `refid` = '" . $res['id'] . "' ORDER BY `time` DESC LIMIT 1");
$nam = mysql_fetch_assoc($nikuser);
$trang4 = mysql_query("SELECT * FROM `forum_thank` WHERE `topic` = '" . ($res['id'] + 1) . "'");
$trang5 = mysql_num_rows($trang4);
$trang6 = mysql_query("SELECT * FROM `forum_thank1` WHERE `topic` = '" . ($res['id'] + 1) . "'");
$trang7 = mysql_num_rows($trang6);
$trang8 = mysql_query("SELECT * FROM `forum_thank2` WHERE `topic` = '" . ($res['id'] + 1) . "'");
$trang9 = mysql_num_rows($trang8);
$trang10 = mysql_query("SELECT * FROM `forum_thank3` WHERE `topic` = '" . ($res['id'] + 1) . "'");
$trang11 = mysql_num_rows($trang10);
$colmes = mysql_query("SELECT COUNT(*) FROM `forum` WHERE `type`='m' AND `refid`='" . $res['id'] . "' AND `close` != '1'");
$colmes1 = mysql_result($colmes, 0);
$cpg = ceil($colmes1 / $kmess);

$chude = $res['text'];
$chude = html_entity_decode($chude, ENT_QUOTES,'UTF-8');
$chude = functions::checkout(mb_substr($chude, ($pos - 100), 50), 1);
if ($res['vip'] == 1) {
$icons = array(

($res['vip'] ? '<img src="../theme/' . $set_user['skin'] . '/images/pt.gif" alt=""/>' : ''),
($res['realid'] ? '<img src="../theme/' . $set_user['skin'] . '/images/rate.gif" alt=""/>' : ''),
);
}
if ($res['vip'] == 1)
echo is_integer ( $i / 2 ) ? '<div class="forumlist">' : '<div class="forumlist">' ;

if ($res['vip'] == 1)
if ($res['indam'] == 1)
echo '<b>';
if ($res['vip'] == 1)
echo 'Chú ý: ' . ($res['edit'] == 1 ? '<img src="../images/khoatopic.gif" alt=""/>' : '') . ' <a href="/forum/' . $res['id'] . '.html">' . bbcode::tags(functions::smileys($res['text'])) . '</a> <span style="font-size:11px;color:#777;">';
if ($res['indam'] == 1)
echo '</b>';
if ($res['vip'] == 1)
echo '<img src="../images/smileys/simply/hot_.gif"/>';
if ($cpg > 1) {
if ($res['vip'] == 1)
echo '<a href="' . $set['homeurl'] . '/forum/' . $res['id'] . '-p' . $cpg . '"></a>';
}

if (!empty ($nam['from']))
{
}


if ($res['vip'] == 1) {

echo'<br/>';
echo'<span style="font-size:11px;color:#000000;">Bởi </span><a href="'.$home.'/member/'.$res['user_id'].'.html" title="' . $chude . '"><span style="font-size:11px;color:#003366;">' . $res['from'] . '</span></a>';
echo'<span style="font-size:11px;color:#666;"><i> Trả lời : ' . $colmes1 . ' - Xem : '.$res['view'].'</i>';
if ($trang5 !== 0) echo '<font color="red"> [<img src="/images/like.gif" width="18" height="18">' . $trang5. ']</font>';
if ($trang7 !== 0) echo '<font color="red"> [<img src="/images/tim.gif" width="18" height="18">' . $trang7. ']</font>';
if ($trang9 !== 0) echo '<font color="red"> [<img src="/images/haha.gif" width="18" height="18">' . $trang9. ']</font>';
if ($trang11 !== 0) echo '<font color="red"> [<img src="/images/angry.gif" width="18" height="18">' . $trang11. ']</font>';
echo '</span>';
}

if ($res['vip'] == 1)
echo '</div>';

++$i;
}
}
echo'<div class="phancach"></div>';

if ($total) {
$req = mysql_query("SELECT * FROM `forum` WHERE `type`='t'" . ($rights >= 7 ? '' : " AND `close`!='1'") . " AND `refid`='$id' ORDER BY `time` DESC LIMIT $start, $kmess");
$i = 0;
while (($res = mysql_fetch_assoc($req)) !== false) {
if ($res['close'])
if ($res['vip'] == 0)
echo '';
else
$view = mysql_query("UPDATE forum SET view = view + 1 WHERE id = $id");
$nikuser = mysql_query("SELECT `from` FROM `forum` WHERE `type` = 'm' AND `close` != '1' AND `refid` = '" . $res['id'] . "' ORDER BY `time` DESC LIMIT 1");
$nam = mysql_fetch_assoc($nikuser);
$trang4 = mysql_query("SELECT * FROM `forum_thank` WHERE `topic` = '" . ($res['id'] + 1) . "'");
$trang5 = mysql_num_rows($trang4);
$trang6 = mysql_query("SELECT * FROM `forum_thank1` WHERE `topic` = '" . ($res['id'] + 1) . "'");
$trang7 = mysql_num_rows($trang6);
$trang8 = mysql_query("SELECT * FROM `forum_thank2` WHERE `topic` = '" . ($res['id'] + 1) . "'");
$trang9 = mysql_num_rows($trang8);
$trang10 = mysql_query("SELECT * FROM `forum_thank3` WHERE `topic` = '" . ($res['id'] + 1) . "'");
$trang11 = mysql_num_rows($trang10);
$colmes = mysql_query("SELECT COUNT(*) FROM `forum` WHERE `type`='m' AND `refid`='" . $res['id'] . "'" . ($rights >= 7 ? '' : " AND `close` != '1'"));
$colmes1 = mysql_result($colmes, 0);
$cpg = ceil($colmes1 / $kmess);
$chude = $res['text'];
$chude = html_entity_decode($chude, ENT_QUOTES,'UTF-8');
$chude = functions::checkout(mb_substr($chude, ($pos - 100), 50), 1);

if ($res['vip'] == 0) {
$icons = array(

($res['vip'] ? '<img src="../theme/' . $set_user['skin'] . '/images/pt.gif" alt=""/>' : ''),
($res['realid'] ? '<img src="../theme/' . $set_user['skin'] . '/images/rate.gif" alt=""/>' : ''),
);
}
if ($res['vip'] == 0)
echo is_integer ( $i / 1 ) ? '<div class="list1">' : '<div class="list1">' ;

if ($res['vip'] == 0)

if ($res['indam'] == 1)
echo '<b>';
if ($res['vip'] == 0)
echo '' . ($res['edit'] == 1 ? '<img src="../images/khoatopic.gif" alt=""/>' : '') . ' <a href="/forum/' . $res['id'] . '.html">' . $res['text'] . '</a> <span style="font-size:11px;color:#777;">';
if ($res['indam'] == 1)
echo '</b>';
if ($res['vip'] == 0)


if ($cpg > 1) {
if ($res['vip'] == 0)
echo '<a href="' . $set['homeurl'] . '/forum/' . $res['id'] . '-p' . $cpg . '"></a>';
}

if (!empty ($nam['from']))
{
}

if ($res['vip'] == 0) {

echo'<br/>';
echo'<span style="font-size:11px;color:#000000;">Bởi </span><a href="'.$home.'/member/'.$res['user_id'].'.html" title="' . $chude . '"><span style="font-size:11px;color:#003366;">' . $res['from'] . '</span></a>';
echo'<span style="font-size:11px;color:#666;"><i> Trả lời : ' . $colmes1 . ' - Xem : '.$res['view'].'</i>';
if ($trang5 !== 0) echo '<font color="red"> [<img src="/images/like.gif" width="18" height="18">' . $trang5. ']</font>';
if ($trang7 !== 0) echo '<font color="red"> [<img src="/images/tim.gif" width="18" height="18">' . $trang7. ']</font>';
if ($trang9 !== 0) echo '<font color="red"> [<img src="/images/haha.gif" width="18" height="18">' . $trang9. ']</font>';
if ($trang11 !== 0) echo '<font color="red"> [<img src="/images/angry.gif" width="18" height="18">' . $trang11. ']</font>';
echo '</span>';
}

if ($res['vip'] == 0)
echo '</div>';

++$i;
}

unset($_SESSION['fsort_id']);
unset($_SESSION['fsort_users']);
} else {
echo '<div class="menu"><p>' . $lng_forum['topic_list_empty'] . '</p></div>';
}
if ($total > $kmess) {
echo '<div class="phantrang">';
echo'' . functions::display_pagination('' . $set['homeurl'] . '/forum/?id=' . $id . '&', $start, $total, $kmess) . '';
echo'</div>';
}
echo '</div>';
break;

case 't':
/*
-----------------------------------------------------------------

-----------------------------------------------------------------
*/
$filter = isset($_SESSION['fsort_id']) && $_SESSION['fsort_id'] == $id ? 1 : 0;
$sql = '';
if ($filter && !empty($_SESSION['fsort_users'])) {

$sw = 0;
$sql = ' AND (';
$fsort_users = unserialize($_SESSION['fsort_users']);
foreach ($fsort_users as $val) {
if ($sw)
$sql .= ' OR ';
$sortid = intval($val);
$sql .= "`forum`.`user_id` = '$sortid'";
$sw = 1;
}
$sql .= ')';
}


if ($rights < 6 && $type1['close'] == 1) {
echo '<div class="menu"><p>' . $lng_forum['topic_deleted'] . '<br/><a href="?id=' . $type1['refid'] . '">' . $lng_forum['to_section'] . '</a></p></div>';
require('../incfiles/end.php');
exit;
}
##############Nút cảm ơn
$checkthankdau = mysql_query('SELECT COUNT(*) FROM `forum_thank` WHERE `userthank` = "' . $user_id . '" and `topic` = "' . $_GET['thanks'] . '" and `user` = "' . $_GET['user'] . '"');
if ($user_id && $user_id != $_GET['user'] && (mysql_result($checkthankdau, 0) < 1)) {
if ((isset ($_GET['thank']))&&(isset ($_GET['user']))&&(isset ($_GET['thanks']))) {


///////////mod thong bao 
$thong=functions::check($_GET['bao']);

$bai = functions::checkout($_GET["id"]);
$us = nick($user_id);
$ten1 = mysql_query("SELECT * FROM `forum` WHERE `id` = '".$bai."'");
$ten2 = mysql_fetch_assoc($ten1);
$ten = $ten2['text'];
$text = '<b><font color="003366">'.$us.'</font></b><font color="000000"> vừa thích<img src="/images/like.gif"></img> bài viết của bạn tại chủ đề </font><a href="/forum/'.$bai.'.html"><font color="003366">'.$ten.'</font></a>';
mysql_query("INSERT INTO `thongbao` SET
`id` = '".$user_id."',
`user` = '".functions::checkout($_GET['user'])."',
`text` = '$text',
`ok` = '1',
`time` = '" . time() . "'
");
//////////////////
mysql_query("INSERT INTO `forum_thank` SET
`user` = '".functions::checkout($_GET['user'])."',
`topic` = '".functions::checkout($_GET['thanks'])."' ,
`time` = '$realtime',
`userthank` = '$user_id',
`chude` = '".$_GET["id"]."'
");
$congcamon=mysql_fetch_array(mysql_query('SELECT * FROM `users` WHERE `id` = "' . functions::checkout($_GET['user']) . '"'));
mysql_query("UPDATE `users` SET `thank_duoc`='" . ($congcamon['thank_duoc'] + 1) . "' WHERE `id` = '" . functions::checkout($_GET['user']) . "'");
mysql_query("UPDATE `users` SET `thank_di`='" . ($datauser['thank_di'] + 1) . "' WHERE `id` = '" . $user_id . "'");
}
}
##########Hết cảm ơn
##############Nút tim

$checkthankdau1 = mysql_query('SELECT COUNT(*) FROM `forum_thank1` WHERE `userthank` = "' . $user_id . '" and `topic` = "' . $_GET['thanks1'] . '" and `user` = "' . $_GET['user'] . '"');
if ($user_id && $user_id != $_GET['user'] && (mysql_result($checkthankdau1, 0) < 1)) {
if ((isset ($_GET['thank1']))&&(isset ($_GET['user']))&&(isset ($_GET['thanks1']))) {


///////////mod thong bao 
$thong=functions::check($_GET['bao']);

$bai = functions::checkout($_GET["id"]);
$us = nick($user_id);
$ten1 = mysql_query("SELECT * FROM `forum` WHERE `id` = '".$bai."'");
$ten2 = mysql_fetch_assoc($ten1);
$ten = $ten2['text'];
$text = '<b><font color="003366">'.$us.'</font></b><font color="000000"> vừa thả <img src="/images/tim.gif"></img> bài viết của bạn tại chủ đề </font><a href="/forum/'.$bai.'.html"><font color="003366">'.$ten.'</font></a>';
mysql_query("INSERT INTO `thongbao` SET
`id` = '".$user_id."',
`user` = '".functions::checkout($_GET['user'])."',
`text` = '$text',
`ok` = '1',
`time` = '" . time() . "'
");

//////////////////
mysql_query("INSERT INTO `forum_thank1` SET
`user` = '".functions::checkout($_GET['user'])."',
`topic` = '".functions::checkout($_GET['thanks1'])."' ,
`time` = '$realtime',
`userthank` = '$user_id',
`chude` = '".$_GET["id"]."'
");

}
}
##########Hết tim
##############Nút haha
$checkthankdau2 = mysql_query('SELECT COUNT(*) FROM `forum_thank2` WHERE `userthank` = "' . $user_id . '" and `topic` = "' . $_GET['thanks2'] . '" and `user` = "' . $_GET['user'] . '"');
if ($user_id && $user_id != $_GET['user'] && (mysql_result($checkthankdau2, 0) < 1)) {
if ((isset ($_GET['thank2']))&&(isset ($_GET['user']))&&(isset ($_GET['thanks2']))) {


///////////mod thong bao 
$thong=functions::check($_GET['bao']);

$bai = functions::checkout($_GET["id"]);
$us = nick($user_id);
$ten1 = mysql_query("SELECT * FROM `forum` WHERE `id` = '".$bai."'");
$ten2 = mysql_fetch_assoc($ten1);
$ten = $ten2['text'];
$text = '<b><font color="003366">'.$us.'</font></b><font color="000000"> vừa thả Haha<img src="/images/haha.gif"></img> bài viết của bạn tại chủ đề </font><a href="/forum/'.$bai.'.html"><font color="003366">'.$ten.'</font></a>';
mysql_query("INSERT INTO `thongbao` SET
`id` = '".$user_id."',
`user` = '".functions::checkout($_GET['user'])."',
`text` = '$text',
`ok` = '1',
`time` = '" . time() . "'
");
//////////////////
mysql_query("INSERT INTO `forum_thank2` SET
`user` = '".functions::checkout($_GET['user'])."',
`topic` = '".functions::checkout($_GET['thanks2'])."' ,
`time` = '$realtime',
`userthank` = '$user_id',
`chude` = '".$_GET["id"]."'
");

}
}
##########Hết haha
##############Nút phẫn nộ
$checkthankdau3 = mysql_query('SELECT COUNT(*) FROM `forum_thank3` WHERE `userthank` = "' . $user_id . '" and `topic` = "' . $_GET['thanks3'] . '" and `user` = "' . $_GET['user'] . '"');
if ($user_id && $user_id != $_GET['user'] && (mysql_result($checkthankdau3, 0) < 1)) {
if ((isset ($_GET['thank3']))&&(isset ($_GET['user']))&&(isset ($_GET['thanks3']))) {


///////////mod thong bao 
$thong=functions::check($_GET['bao']);

$bai = functions::checkout($_GET["id"]);
$us = nick($user_id);
$ten1 = mysql_query("SELECT * FROM `forum` WHERE `id` = '".$bai."'");
$ten2 = mysql_fetch_assoc($ten1);
$ten = $ten2['text'];
$text = '<b><font color="003366">'.$us.'</font></b><font color="000000"> vừa Phẫn nộ<img src="/images/angry.gif"></img> bài viết của bạn tại chủ đề </font><a href="/forum/'.$bai.'.html"><font color="003366">'.$ten.'</font></a>';
mysql_query("INSERT INTO `thongbao` SET
`id` = '".$user_id."',
`user` = '".functions::checkout($_GET['user'])."',
`text` = '$text',
`ok` = '1',
`time` = '" . time() . "'
");
//////////////////
mysql_query("INSERT INTO `forum_thank3` SET
`user` = '".functions::checkout($_GET['user'])."',
`topic` = '".functions::checkout($_GET['thanks3'])."' ,
`time` = '$realtime',
`userthank` = '$user_id',
`chude` = '".$_GET["id"]."'
");

}
}
##########Hết angry

$colmes = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum` WHERE `type`='m'$sql AND `refid`='$id'" . ($rights >= 7 ? '' : " AND `close` != '1'")), 0);
if ($start >= $colmes) {

$start = max(0, $colmes - (($colmes % $kmess) == 0 ? $kmess : ($colmes % $kmess)));
}



echo '<div class="homeforum"><div class="icon-home"><div class="home">' . functions::display_menu($tree) . '</div></div></div>';
/*
-----------------------------------------------------------------

-----------------------------------------------------------------
*/
if ($type1['realid']) {
$clip_forum = isset($_GET['clip']) ? '&amp;clip' : '';
$vote_user = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_forum_vote_users` WHERE `user`='$user_id' AND `topic`='$id'"), 0);
$topic_vote = mysql_fetch_assoc(mysql_query("SELECT `name`, `time`, `count` FROM `cms_forum_vote` WHERE `type`='1' AND `topic`='$id' LIMIT 1"));
echo '<div  class="phdr">Bình Chọn ' . functions::checkout($topic_vote['name']) . '</div><div class="menu">';
$vote_result = mysql_query("SELECT `id`, `name`, `count` FROM `cms_forum_vote` WHERE `type`='2' AND `topic`='" . $id . "' ORDER BY `id` ASC");
if (!$type1['edit'] && !isset($_GET['vote_result']) && $user_id && $vote_user == 0) {

echo '<form action="' . $set['homeurl'] . '/forum/index.php?act=vote&amp;id=' . $id . '" method="post">';
while (($vote = mysql_fetch_assoc($vote_result)) !== false) {
echo '<input type="radio" value="' . $vote['id'] . '" name="vote"/> ' . functions::checkout($vote['name'], 0, 1) . '<br />';
}
echo '<p><input type="submit" name="submit" value="' . $lng['vote'] . '"/></p></form></div>';
} else {

echo '';
while (($vote = mysql_fetch_assoc($vote_result)) !== false) {
$count_vote = $topic_vote['count'] ? round(100 / $topic_vote['count'] * $vote['count']) : 0;
echo functions::checkout($vote['name'], 0, 1) . ' <font color="006699">(' . $vote['count'] . ' Phiếu/' . $topic_vote['count'] . ' phiếu)</font><br />';
echo '<img src="vote_img.php?img=' . $count_vote . '" alt="' . $lng_forum['rating'] . ': ' . $count_vote . '%" /><br/>';
}
echo'</div>';
}
}
$curators = !empty($type1['curators']) ? unserialize($type1['curators']) : array();
$curator = false;
if ($rights < 6 && $rights != 3 && $user_id) {
if (array_key_exists($user_id, $curators)) $curator = true;
}
echo'<div class="pageforum">';
if ($colmes > $kmess) {
echo '<span style="float:left;"><a href="/index.php"><font color="f8f8ff">Quay lại</font></a></span>' . functions::display_pagination('' . $set['homeurl'] . '/forum/?id=' . $id . '&', $start, $colmes, $kmess) . '';
} else {
echo '<span style="float:left;"><a href="/index.php"><font color="f8f8ff">Quay lại</font></a></span>' . functions::display_pagination('' . $set['homeurl'] . '/forum/?id=' . $id . '&', $start, $colmes, $kmess) . '';
}
echo'</div>';
echo'<div class="box_list_parent">';
// Hoàng Anh


// Hoàng Anh


/*
-----------------------------------------------------------------
Hoàng Anh
-----------------------------------------------------------------
*/
if (($set_forum['postclip'] == 2 && ($set_forum['upfp'] ? $start < (ceil($colmes - $kmess)) : $start > 0)) || isset($_GET['clip'])) {
$postreq = mysql_query("SELECT `forum`.*, `users`.`sex`, `users`.`rights`, `users`.`thank_duoc`, `users`.`lastdate`, `users`.`status`, `users`.`datereg`, `users`.`chuki`, `users`.`name`
FROM `forum` LEFT JOIN `users` ON `forum`.`user_id` = `users`.`id`
WHERE `forum`.`type` = 'm' AND `forum`.`refid` = '$id'" . ($rights >= 7 ? "" : " AND `forum`.`close` != '1'") . "
ORDER BY `forum`.`id` LIMIT 1");
$postres = mysql_fetch_assoc($postreq);
echo '<div class="topmenu"><p>';
if ($postres['sex'])
if ($postres['sex'])
echo '<img src="../theme/' . $set_user['skin'] . '/images/' . ($postres['sex'] == 'm' ? 'm' : 'w') . ($postres['datereg'] > time() - 86400 ? '_new.png" width="14"' : '.png" width="10"') . ' height="10"/>&#160;';
else
echo '<img src="../images/del.png" width="10" height="10" alt=""/>&#160;';
if ($user_id && $user_id != $postres['user_id']) {
echo '<a href="../users/profile.php?user=' . $postres['user_id'] . '&amp;fid=' . $postres['id'] . '"><b>' . $postres['from'] . '</b></a> ' .
'<a href="' . $set['homeurl'] . '/forum/index.php?act=say&amp;id=' . $postres['id'] . '&amp;start=' . $start . '"> ' . $lng_forum['reply_btn'] . '</a> ' .
'<a href="' . $set['homeurl'] . '/forum/index.php?act=say&amp;id=' . $postres['id'] . '&amp;start=' . $start . '&amp;cyt"> ' . $lng_forum['cytate_btn'] . '</a> ';
} else {
echo '<b>' . $postres['from'] . '</b> ';
}

echo @$user_rights[$postres['rights']];
echo ' <span class="gray">(' . functions::display_date($postres['time']) . ')</span><br/>';
if ($postres['close']) {
echo '<span class="red">' . $lng_forum['post_deleted'] . '</span><br/>';
}
echo functions::checkout(mb_substr($postres['text'], 0, 500), 0, 2);
if (mb_strlen($postres['text']) > 500)
echo '...<a href="' . $set['homeurl'] . '/forum/index.php?act=post&amp;id=' . $postres['id'] . '">' . $lng_forum['read_all'] . '</a>';
echo '</p></div>';
}
if ($filter)
echo '<div class="rmenu">' . $lng_forum['filter_on'] . '</div>';
// Hoàng Anh
if ($user_id)
$order = $set_forum['upfp'] ? 'DESC' : 'ASC';
else
$order = ((empty($_SESSION['uppost'])) || ($_SESSION['uppost'] == 0)) ? 'ASC' : 'DESC';
// Hoàng Anh
$req = mysql_query("SELECT `forum`.*, `users`.`sex`, `users`.`rights`, `users`.`lastdate`, `users`.`status`, `users`.`postforum`, `users`.`name`
FROM `forum` LEFT JOIN `users` ON `forum`.`user_id` = `users`.`id`
WHERE `forum`.`type` = 'm' AND `forum`.`refid` = '$id'"
. ($rights >= 7 ? "" : " AND `forum`.`close` != '1'") . "$sql ORDER BY `forum`.`id` $order LIMIT $start, $kmess");
// Hoàng Anh
if (($user_id && !$type1['edit'] && $set_forum['upfp'] && $set['mod_forum'] != 3) || ($rights >= 7 && $set_forum['upfp'])) {
echo '<div class="gmenu"><form name="form1" action="' . $set['homeurl'] . '/forum/' . $id . '-binhluan.html" method="post">';
if ($set_forum['farea']) {
$token = mt_rand(1000, 100000);
$_SESSION['token'] = $token;
echo'<p>' .
(!$is_mobile ? bbcode::auto_bb('form1', 'msg') : '') .
'<textarea rows="' . $set_user['field_h'] . '" name="msg"></textarea></p>' .
'<p><input type="checkbox" name="addfiles" value="1" /> ' . $lng_forum['add_file'] .
($set_user['translit'] ? '<br /><input type="checkbox" name="msgtrans" value="1" /> ' . $lng['translit'] : '') .
'</p><p><input type="submit" name="submit" value="' . $lng['write'] . '" style="width: 107px; cursor: pointer;"/> ' .
($set_forum['preview'] ? '<input type="submit" value="' . $lng['preview'] . '" style="width: 107px; cursor: pointer;"/>' : '') .
'<input type="hidden" name="token" value="' . $token . '"/>' .
'</p></form></div>';
} else {
echo '<p><input type="submit" name="submit" value="' . $lng['write'] . '"/></p></form></div>';
}
}
if ($rights == 3 || $rights >= 6)
echo '<form action="' . $set['homeurl'] . '/forum/index.php?act=massdel" method="post">';
$i = 1;
while (($res = mysql_fetch_assoc($req)) !== false) {
echo'<div class="forumtext">';
echo'<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
<tr><td width="45px;" class="blog-avatar">';
$user_u = $res['user_id'];$req_u = mysql_query("SELECT * FROM `users` WHERE `id` = '$user_u' LIMIT 1");$res_u = mysql_fetch_array($req_u);
$user_u = $res['user_id'];
$req_u = mysql_query("SELECT * FROM `users` WHERE `id` = '$user_u' LIMIT 1");
$res_u = mysql_fetch_array($req_u);
if ($set_user['avatar']) {
  echo '<img class="avatar_b" src="/avatar/'.$res_u['id'].'.png">';





}

if ($res['postforum'] != 0) {
$arank = $res['postforum'];
if ($arank <= 1)
$arank = '<img src="/images/sao/1.png" alt=""/>';
elseif ($arank <= 20)
$arank = '<img src="/images/sao/2.png" alt=""/>';
elseif ($arank <= 40)
$arank = '<img src="/images/sao/3.png" alt=""/>';
elseif ($arank <= 70)
$arank = '<img src="/images/sao/4.png" alt=""/>';
elseif ($arank <= 100)
$arank = '<img src="/images/sao/5.png" alt=""/>';
elseif ($arank <= 300)
$arank = '<img src="/images/sao/6.png" alt=""/>';
elseif ($arank <= 450)
$arank = '<img src="/images/sao/7.png" alt="""/>';
elseif ($arank <= 600)
$arank = '<img src="/images/sao/8.png" alt=""/>';
elseif ($arank <= 700)
$arank = '<img src="/images/sao/9.png" alt=""/>';
elseif ($arank <= 900)
$arank = '<img src="/images/sao/10.png" alt=""/>';
elseif ($arank <= 1000)
$arank = '<img src="/images/sao/11.png" alt=""/>';
elseif ($arank <= 1300)
$arank = '<img src="/images/sao/12.png" alt=""/>';
elseif ($arank <= 1500)
$arank = '<img src="/images/sao/13.png" alt=""/>';
elseif ($arank <= 1700)
$arank = '<img src="/images/sao/14.png" alt=""/>';
elseif ($arank <= 2000)
$arank = '<img src="/images/sao/15.png" alt=""/>';
elseif ($arank <= 3000)
$arank = '<img src="/images/sao/16.png" alt=""/>';
elseif ($arank <= 4000)
$arank = '<img src="/images/sao/17.png" alt=""/>';
elseif ($arank <= 4500)
$arank = '<img src="/images/sao/18.png" alt=""/>';
elseif ($arank <= 5000)
$arank = '<img src="/images/sao/19.png" alt=""/>';
elseif ($arank <= 5500)
$arank = '<img src="/images/sao/20.png" alt=""/>';
elseif ($arank <= 6000)
$arank = '<img src="/images/sao/21.png" alt=""/>';
elseif ($arank <= 7000)
$arank = '<img src="/images/sao/22.png" alt=""/>';
elseif ($arank <= 8000)
$arank = '<img src="/images/sao/23.png" alt=""/>';
elseif ($arank <= 9000)
$arank = '<img src="/images/sao/24.png" alt=""/>';
elseif ($arank <= 10000)
$arank = '<img src="/images/sao/25.png" alt=""/>';
elseif ($arank <= 13000)
$arank = '<img src="/images/sao/26.png" alt=""/>';
elseif ($arank <= 16000)
$arank = '<img src="/images/sao/27.png" alt="""/>';
elseif ($arank <= 19000)
$arank = '<img src="/images/sao/28.png" alt=""/>';
elseif ($arank <= 22000)
$arank = '<img src="/images/sao/29.png" alt=""/>';
elseif ($arank <= 26000)
$arank = '<img src="/images/sao/30.png" alt=""/>';
elseif ($arank <= 30000)
$arank = '<img src="/images/sao/31.png" alt=""/>';
elseif ($arank <= 35000)
$arank = '<img src="/images/sao/32.png" alt=""/>';
elseif ($arank <= 40000)
$arank = '<img src="/images/sao/33.png" alt=""/>';
elseif ($arank <= 50000)
$arank = '<img src="/images/sao/34.png" alt=""/>';
elseif ($arank <= 56000)
$arank = '<img src="/images/sao/35.png" alt=""/>';
elseif ($arank <= 62000000)
$arank = '<img src="/images/sao/36.png" alt=""/>';
}
echo'<div class="box_bai_gui"><center><small>Bài:' .$res_u['postforum'] .'</small></br></br>';

echo'<div style="text- align:center ;height:8px;vertical-align: top;margin:
-6px 0px 3px 0px;">'.$arank.'</div></center>';
echo'</td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0"><tbody>
<tr>';
$dema=(isset($dema))? $dema: $start;
echo''.(($dema+$i) != 1 ? '<td class="current-blog" rowspan="2" style="">':'<td class="current-blog2" rowspan="2" style="">').'';
echo'<div class="blog-bg-left">';
echo'<img src="/giaodien/images/left-blog.png"></div>';
echo (time() > $res['lastdate'] + 300 ? '<img style="vertical-align:middle;" title="' . $res['from'] . ' is offline" src="/images/off.png" alt="offline"/> ' : '<img style="vertical-align:middle;" title="' . $res['from'] . ' is online" src="/images/on.png" alt="online"/> ');


$count = $start+$i;
if ($user_id && $user_id != $res['user_id']) {
echo '<a href="/member/' . $res['user_id'] . '.html"><b><font color="006699">' . nick($res['user_id']) . '</b></font>';
} else {
echo '<a href="/member/' . $res['user_id'] . '.html"><span style="color:#' . $colornick['colornick'] . '"><b>' . nick($res['user_id']) . '</a></b></span> ';
if($user_id){
}
}

$dema=(isset($dema))? $dema: $start;
echo'<span id="'.$res['id'].'" style="color:#' .$colornick['colornick'] . '"><b>'.$user_rights[$res['rights']].'</b></a><b><span style="float:right;padding-right: 3px;color:#013481;">'.(($dema+$i) != 1 ? '# <b>'.(($dema+$i)-1).'</b>':'<font color="red">TOP</font>').'</span></b></span>';

/////////------TIM LIKE------/////
$like = $res_u['thank_duoc']*1;
if ($like >= 0 && $like <= 3)
{
$thank = '♥';
}
if ($like >= 4 && $like <= 10)
{
$thank = '♥♥';
}
if ($like >= 11 && $like <= 15)
{
$thank = '♥♥♥';
}
if ($like >= 16 && $like <= 20)
{
$thank = '♥♥♥♥';
}
if ($like >= 150 && $like <= 300)
{
$thank = '♥♥♥♥♥';
}
if ($like >= 400 && $like <= 100)
{
$thank = '♥♥♥♥♥♥';
}
if ($like >= 1000 && $like <= 2000)
{
$thank = '♥♥♥♥♥♥♥';
}
if ($like >= 2000 && $like <= 5000)
{
$thank = '♥♥♥♥♥♥♥♥♥';
}
if ($like >= 5000 && $like <= 100000000)
{
$thank = '<b>[♥ Thánh ♥ Like ♥]</b>';
}



///// Mod bởi Hoàng Anh /////
$t=functions::checkout($_GET['id']);
$dv = mysql_fetch_array(mysql_query("SELECT * FROM `theodoi` WHERE `topic`='{$t}' AND `user_id`='{$datauser['id']}'"));
$input =mysql_fetch_array(mysql_query("select * from `forum` where `id`='{$t}' and `type`='t'"));

///// kết Mod bởi Hoàng Anh Cứ bỏ nguồn ra không xin phép ddos/////
echo'<div style="width:auto;"><div class="text">';
if ($i == 1) {
echo'<div class="tieudeforum">';
echo'<b><font color="#005fbf">'.$top.'</font></b>';echo'</br></br></div>';
}


$trang = functions::checkout($_GET['trang']);
if(empty($trang)) $trang=1;
$show = '7000';
$tx = $res['text'];
$strrpos = mb_strrpos($tx, " ");
$total = 1;
if(isset($trang)){
$trang = abs(intval($trang));
if($trang == 0)
//$trang = 1;
$start = $trang-1;
}else{
$trang = $start+1; }
$ta = 0;
if($strrpos){
while($ta < $strrpos){
$string = mb_substr($tx, $ta, $show);
$tb = mb_strrpos($string, " ");
$m_sim = $tb;
$strings[$total] = $string;
$ta = $tb + $ta;
if($trang == $total){
$nd = $strings[$total]; }
if($strings[$total] == ""){
$ta = $strrpos++;
}else{
$total++; } }
if($trang >= $total){
$trang = $total-1;
$nd = $strings[$trang]; }
$total = $total-1;
if($trang != $total){
$prb = mb_strrpos($nd, " ");
$nd = mb_substr($nd, 0, $prb); } }
else{
$nd = $tx; }
$text = $nd;
$text = functions::checkout($text, 1, 1);
if ($set_user['smileys'])
$text = functions::smileys($text, $res['rights'] ? 1 : 0);
$band = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_ban_users` WHERE `user_id` = '" . $res['user_id'] . "' AND `ban_time` > '" . time() . "'"), 0);
if($band > 0){
echo'<b>Người dùng đã bị khóa!</b>';
} else {
echo ''.$text.'';
}
if(empty($trang)) $trang=1;
if($total > 1){
if($trang != 1) $pervpage = ' <a class="pagenav" href= "/forum/' . $id . '-xem'.($trang-1).'.html" title="' . $top . '"><span style="color:#003366">« Trở về trang trước</span></a> ';
if($trang != $total) $nextpage = ' <a class="pagenav" href="/forum/' . $id . '-xem'.($trang+1).'.html" title="' . $top . '"><span style="color:#003366">Sang trang tiếp theo »</span></a>';
if($total > 1) $xemngay = '<div class="trang" title="' . $top . '">'.$pervpage.$first.$trang2left.$trang1left.''.$trang1right.$trang2right.$last.$nextpage.'</div>';
echo ''.$xemngay.'';
echo'<div class="menu">Tổng số có '.$total.' trang</div>';
}
$freq = mysql_query("SELECT * FROM `cms_forum_files` WHERE `post` = '" . $res['id'] . "'");
if (mysql_num_rows($freq) > 0) {
while ( $fres = mysql_fetch_assoc($freq)) {
$fls = round(@filesize('../files/forum/tailen/' . $fres['filename']) / 1024, 2);
$att_ext = strtolower(functions::format('./files/forum/tailen/' . $fres['filename']));
$pic_ext = array(
'gif',
'jpg',
'jpeg',
'png'
);
$jar_ext = array(
'jar'
);
if (in_array($att_ext, $pic_ext)) {
echo '<p><a href="' . $set['homeurl'] . '/files/forum/tailen/' . $fres['filename'] . '">';
echo '<img src="' . $set['homeurl'] . '/files/forum/tailen/' . $fres['filename'] . '" alt="' . $type1['text'] . '" style="width:200px; word-wrap : break-word;padding: 1px; margin: 4px 4px 0 0; border: 1px solid #d5d5d5;"/></a></p>';
if ($rights >= 7 || $rights >= 9) {
echo'<a href="/forum/index.php?act=xoafile&id=' . $fres['id'] . '"><font color="003366">[ Xóa ảnh ]</font></a></b>';
}

} else {
echo'<div class="files">Tên tập tin: <b>' . $fres['filename'] . '</b>';
if ($rights == 3 || $rights >= 4 || $rights >= 7 || $rights >= 9) {
echo' <a href="/forum/index.php?act=xoafile&id=' . $fres['id'] . '">[xóa tập tin]</a></b>';
}
echo'<br/>';
echo'<a href="/forum/' . $fres['id'] . '-download.html"><span style="color:#ff1234"><b>Tải về máy</b></span></a>';
echo'<br/>Dung lượng: <b>' . $fls . ' kb</b><br/>Số người tải: <b>' . $fres['dlcount'] . '</b> Lần</div>';
if (in_array($att_ext, $jar_ext))
echo'';
}
++$i;
}

}

echo'<br /></div>';
echo'</br><div class="menuforum">';
//Nút thank
$checkthank = mysql_query('SELECT COUNT(*) FROM `forum_thank` WHERE `userthank` = "' . $user_id . '" and `topic` = "' . $res['id'] . '" and `user` = "' . $res['user_id'] . '"');
$checkthank1 = mysql_query('SELECT COUNT(*) FROM `forum_thank1` WHERE `userthank` = "' . $user_id . '" and `topic` = "' . $res['id'] . '" and `user` = "' . $res['user_id'] . '"');

$checkthank2 = mysql_query('SELECT COUNT(*) FROM `forum_thank2` WHERE `userthank` = "' . $user_id . '" and `topic` = "' . $res['id'] . '" and `user` = "' . $res['user_id'] . '"');

$checkthank3 = mysql_query('SELECT COUNT(*) FROM `forum_thank3` WHERE `userthank` = "' . $user_id . '" and `topic` = "' . $res['id'] . '" and `user` = "' . $res['user_id'] . '"');


if ($user_id && $user_id != $res['user_id'] && (mysql_result($checkthank, 0) < 1)) {
if ($user_id && $user_id != $res['user_id'] && (mysql_result($checkthank1, 0) < 1)) {

if ($user_id && $user_id != $res['user_id'] && (mysql_result($checkthank2, 0) < 1)) {
if ($user_id && $user_id != $res['user_id'] && (mysql_result($checkthank3, 0) < 1)) {
echo'<a href="' . $set['homeurl'] . '/forum/index.php?id=' . $id . '&thanks=' . $res['id'] . '&user=' . $res['user_id'] . '&start=0&thank#thanksyou"><img src="/images/like.gif" alt="Like" title="Like"/></a>&#160;';
}
}
}
}
//Nút tim
if ($user_id && $user_id != $res['user_id'] && (mysql_result($checkthank, 0) < 1)) {
if ($user_id && $user_id != $res['user_id'] && (mysql_result($checkthank1, 0) < 1)) {

if ($user_id && $user_id != $res['user_id'] && (mysql_result($checkthank2, 0) < 1)) {
if ($user_id && $user_id != $res['user_id'] && (mysql_result($checkthank3, 0) < 1)) {

echo'<a href="' . $set['homeurl'] . '/forum/index.php?id=' . $id . '&thanks1=' . $res['id'] . '&user=' . $res['user_id'] . '&start=0&thank1#thanksyou"><img src="/images/tim.gif" alt="Tim" title="Tim"/></a>&#160;';
}
}
}
}
//Nút haha
if ($user_id && $user_id != $res['user_id'] && (mysql_result($checkthank, 0) < 1)) {
if ($user_id && $user_id != $res['user_id'] && (mysql_result($checkthank1, 0) < 1)) {

if ($user_id && $user_id != $res['user_id'] && (mysql_result($checkthank2, 0) < 1)) {
if ($user_id && $user_id != $res['user_id'] && (mysql_result($checkthank3, 0) < 1)) {
echo'<a href="' . $set['homeurl'] . '/forum/index.php?id=' . $id . '&thanks2=' . $res['id'] . '&user=' . $res['user_id'] . '&start=0&thank2#thanksyou"><img src="/images/haha.gif" alt="Tim" title="Haha"/></a>&#160;';
}
}
}
}
//Nút phẫn nộ
if ($user_id && $user_id != $res['user_id'] && (mysql_result($checkthank, 0) < 1)) {
if ($user_id && $user_id != $res['user_id'] && (mysql_result($checkthank1, 0) < 1)) {

if ($user_id && $user_id != $res['user_id'] && (mysql_result($checkthank2, 0) < 1)) {
if ($user_id && $user_id != $res['user_id'] && (mysql_result($checkthank3, 0) < 1)) {
echo'<a href="' . $set['homeurl'] . '/forum/index.php?id=' . $id . '&thanks3=' . $res['id'] . '&user=' . $res['user_id'] . '&start=0&thank3#thanksyou"><img src="/images/angry.gif" alt="Tim" title="Phẫn Nộ"/></a>&#160;';
}
}
}
}
//if(empty($res['chuki'])){


if ($user_id && $user_id != $res['user_id']) {
    if ($type1['edit']) {
    } else {

echo'<a href="' . $set['homeurl'] . '/forum/' . $res['id'] . '-trich.html"><img src="/images/quotes.png" title="Quote" width="30" height="30"></a><br>';
$checkbaocao = mysql_result(mysql_query("SELECT COUNT(*) FROM `baocao` WHERE `forum`='".$res['id']."' AND kiemtra='1'"),0);

}
}
echo'</div>';

if ((($rights == 3 || $rights >= 6 || $curator) && $rights >= $res['rights']) || ($res['user_id'] == $user_id && !$set_forum['upfp'] && ($start + $i) == $colmes && $res['time'] > time() - 300) || ($res['user_id'] == $user_id && $set_forum['upfp'] && $start == 0 && $i == 1 && $res['time'] > time() - 300)) {
// Hoàng Anh
$menu = array(
'<a class="gray" href="' . $set['homeurl'] . '/forum/' . $res['id'] . '-edit.html">Chỉnh Sửa |</a> - ',
($rights >= 7 && $res['close'] == 1 ? '<a href="' . $set['homeurl'] . '/forum/index.php?act=editpost&do=restore&id=' . $res['id'] . '">' . $lng_forum['restore'] . '</a>' : ''),
($res['close'] == 1 ? '' : '<a class="gray" href="' . $set['homeurl'] . '/forum/' . $res['id'] . '-del.html"> Xóa</a>')
);
echo '<div class="edit-forum">';
if ($rights == 3 || $rights >= 6)
echo'<a id="bus" href="' . $set['homeurl'] . '/forum/' . $res['id'] . '-edit.html">Chỉnh Sửa |</a> <a id="bus" href="' . $set['homeurl'] . '/forum/' . $res['id'] . '-del.html"> Xóa</a>';
if ($rights == 3 || $rights >= 6) {
echo'</div>';
}
}
++$i;
$req_u = mysql_query("SELECT * FROM `users` WHERE `id` = '$user_u' LIMIT 1");
$res_u = mysql_fetch_array($req_u);
if(empty($res_u['chuki'])){
} else {
echo'</br><center><i><font color="green">'.$res_u['chuki'].'</font></i></center>';
}
echo '</div>';
echo'<br/><span style="font-size:10px;color:#777;">Cách đây ' . functions::thoigian($res['time']) . '';

echo'</span></br></br>';
//thống kê người cảm ơn
$thongkethank = mysql_query("SELECT COUNT(*) from `forum_thank` where `topic`='" . $res["id"] . "'");
$thongkethanks = mysql_result($thongkethank, 0);
// $thongkethanks=mysql_result(mysql_query('SELECT COUNT(*) FROM `forum_thank` WHERE `topic` = "' . $res['id'] . '"')), 0);
$thongkea= @mysql_query("select * from `forum_thank` where `topic` = '" . $res['id'] . "'");
$thongke=mysql_fetch_array($thongkea);
$idthongke=functions::checkout($_GET['idthongke']);
if($thongkethanks>0&&(empty($_GET['idthongke'])))
{
echo'<div class="danhsachlike">';
echo'<small>';

echo'<img src="/images/like.gif" width="18" height="18"> Bạn ';
$thongkeaa= @mysql_query("select * from `forum_thank` where `topic` = '" . $res['id'] . "'");while ($thongkea = mysql_fetch_array($thongkeaa))
{
{
$dentv=mysql_fetch_array(mysql_query('SELECT * FROM `users` WHERE `id` = "'.$thongkea['userthank'].'"'));
//màu nick người like
if ($dentv['rights'] == 0 ) {
$colornick['colornick'] = '000000';
$colornickk['colornick'] = '000000';
}
if ($dentv['rights'] == 3 ) {
$colornick['colornick'] = '008000';
$colornickk['colornick'] = '008000';
}
if ($dentv['rights'] == 4 ) {
$colornick['colornick'] = '1d7ca8';
$colornickk['colornick'] = '1d7ca8';
}
if ($dentv['rights'] == 6 ) {
$colornick['colornick'] = '0000ff';
$colornickk['colornick'] = '0000ff';
}
if ($dentv['rights'] == 7 ) {
$colornick['colornick'] = 'ff00ff';
$colornickk['colornick'] = 'ff00ff';
}
if ($dentv['rights'] == 9 ) {
$colornick['colornick'] = 'ff1234';
$colornickk['colornick'] = 'ff1234';
}
echo '<a href="/member/'.$thongkea['userthank'].'.html"><span style="color:#003366">'.$dentv['name'].',</span></a> ';
}
++$f;
}
echo' thích bài viết này';
echo'</small>';

echo'</div>';
}
/// hết thống kê ///
//thống kê người tim
$thongkethank1 = mysql_query("SELECT COUNT(*) from `forum_thank1` where `topic`='" . $res["id"] . "'");
$thongkethanks1 = mysql_result($thongkethank1, 0);
// $thongkethanks=mysql_result(mysql_query('SELECT COUNT(*) FROM `forum_thank` WHERE `topic` = "' . $res['id'] . '"')), 0);
$thongkea1= @mysql_query("select * from `forum_thank1` where `topic` = '" . $res['id'] . "'");
$thongke1=mysql_fetch_array($thongkea1);
$idthongke1=functions::checkout($_GET['idthongke']);
if($thongkethanks1>0&&(empty($_GET['idthongke'])))
{
echo'<div class="danhsachlike">';
echo'<small>';
echo'<img src="/images/tim.gif" width="18" height="18"> Bạn ';
$thongkeaa1= @mysql_query("select * from `forum_thank1` where `topic` = '" . $res['id'] . "'");while ($thongkea1 = mysql_fetch_array($thongkeaa1))
{
{
$dentv1=mysql_fetch_array(mysql_query('SELECT * FROM `users` WHERE `id` = "'.$thongkea1['userthank'].'"'));
//màu nick người like
if ($dentv1['rights'] == 0 ) {
$colornick['colornick'] = '000000';
$colornickk['colornick'] = '000000';
}
if ($dentv1['rights'] == 3 ) {
$colornick['colornick'] = '008000';
$colornickk['colornick'] = '008000';
}
if ($dentv1['rights'] == 4 ) {
$colornick['colornick'] = '1d7ca8';
$colornickk['colornick'] = '1d7ca8';
}
if ($dentv1['rights'] == 6 ) {
$colornick['colornick'] = '0000ff';
$colornickk['colornick'] = '0000ff';
}
if ($dentv1['rights'] == 7 ) {
$colornick['colornick'] = 'ff00ff';
$colornickk['colornick'] = 'ff00ff';
}
if ($dentv1['rights'] == 9 ) {
$colornick['colornick'] = 'ff1234';
$colornickk['colornick'] = 'ff1234';
}
echo '<a href="/member/'.$thongkea1['userthank'].'.html"><span style="color:#003366">'.$dentv1['name'].',</span></a> ';
}
++$f;
}
echo' thả tim bài viết này';
echo'</small></div>';
}
/// hết thống kê ///
//thống kê người haha
$thongkethank2 = mysql_query("SELECT COUNT(*) from `forum_thank2` where `topic`='" . $res["id"] . "'");
$thongkethanks2 = mysql_result($thongkethank2, 0);
// $thongkethanks=mysql_result(mysql_query('SELECT COUNT(*) FROM `forum_thank` WHERE `topic` = "' . $res['id'] . '"')), 0);
$thongkea2= @mysql_query("select * from `forum_thank2` where `topic` = '" . $res['id'] . "'");
$thongke2=mysql_fetch_array($thongkea2);
$idthongke2=functions::checkout($_GET['idthongke']);
if($thongkethanks2>0&&(empty($_GET['idthongke'])))
{
echo'<div class="danhsachlike">';
echo'<small>';

echo'<img src="/images/haha.gif" width="18" height="18"> Bạn ';
$thongkeaa2= @mysql_query("select * from `forum_thank2` where `topic` = '" . $res['id'] . "'");while ($thongkea2 = mysql_fetch_array($thongkeaa2))
{
{
$dentv2=mysql_fetch_array(mysql_query('SELECT * FROM `users` WHERE `id` = "'.$thongkea2['userthank'].'"'));
//màu nick người like
if ($dentv2['rights'] == 0 ) {
$colornick['colornick'] = '000000';
$colornickk['colornick'] = '000000';
}
if ($dentv2['rights'] == 3 ) {
$colornick['colornick'] = '008000';
$colornickk['colornick'] = '008000';
}
if ($dentv2['rights'] == 4 ) {
$colornick['colornick'] = '1d7ca8';
$colornickk['colornick'] = '1d7ca8';
}
if ($dentv2['rights'] == 6 ) {
$colornick['colornick'] = '0000ff';
$colornickk['colornick'] = '0000ff';
}
if ($dentv2['rights'] == 7 ) {
$colornick['colornick'] = 'ff00ff';
$colornickk['colornick'] = 'ff00ff';
}
if ($dentv2['rights'] == 9 ) {
$colornick['colornick'] = 'ff1234';
$colornickk['colornick'] = 'ff1234';
}
echo '<a href="/member/'.$thongkea2['userthank'].'.html"><span style="color:#003366">'.$dentv2['name'].',</span></a> ';
}
++$f;
}
echo' thả Haha bài viết này';
echo'</small>';

echo'</div>';
}
/// hết thống kê ///
//thống kê người tim
$thongkethank3 = mysql_query("SELECT COUNT(*) from `forum_thank3` where `topic`='" . $res["id"] . "'");
$thongkethanks3 = mysql_result($thongkethank3, 0);
// $thongkethanks=mysql_result(mysql_query('SELECT COUNT(*) FROM `forum_thank` WHERE `topic` = "' . $res['id'] . '"')), 0);
$thongkea3= @mysql_query("select * from `forum_thank3` where `topic` = '" . $res['id'] . "'");
$thongke3=mysql_fetch_array($thongkea3);
$idthongke3=functions::checkout($_GET['idthongke']);
if($thongkethanks3>0&&(empty($_GET['idthongke'])))
{
echo'<div class="danhsachlike">';
echo'<small>';

echo'<img src="/images/angry.gif" width="18" height="18"> Bạn ';
$thongkeaa3= @mysql_query("select * from `forum_thank3` where `topic` = '" . $res['id'] . "'");while ($thongkea3 = mysql_fetch_array($thongkeaa3))
{
{
$dentv3=mysql_fetch_array(mysql_query('SELECT * FROM `users` WHERE `id` = "'.$thongkea3['userthank'].'"'));
//màu nick người like
if ($dentv3['rights'] == 0 ) {
$colornick['colornick'] = '000000';
$colornickk['colornick'] = '000000';
}
if ($dentv3['rights'] == 3 ) {
$colornick['colornick'] = '008000';
$colornickk['colornick'] = '008000';
}
if ($dentv3['rights'] == 4 ) {
$colornick['colornick'] = '1d7ca8';
$colornickk['colornick'] = '1d7ca8';
}
if ($dentv3['rights'] == 6 ) {
$colornick['colornick'] = '0000ff';
$colornickk['colornick'] = '0000ff';
}
if ($dentv3['rights'] == 7 ) {
$colornick['colornick'] = 'ff00ff';
$colornickk['colornick'] = 'ff00ff';
}
if ($dentv3['rights'] == 9 ) {
$colornick['colornick'] = 'ff1234';
$colornickk['colornick'] = 'ff1234';
}
echo '<a href="/member/'.$thongkea3['userthank'].'.html"><span style="color:#003366">'.$dentv3['name'].',</span></a> ';
}
++$f;
}
echo' thả phẫn nộ bài viết này';
echo'</small>';

echo'</div>';
}
/// hết thống kê ///



echo'</div></div></td>
</tr></tbody></table></td></tr></tbody></table></div>';
}
if ($rights == 3 || $rights >= 6) {
echo '</form>';
}
// Hoàng Anh

echo'<div class="pageforum">';
if ($colmes > $kmess) {
echo '' . functions::display_pagination('' . $set['homeurl'] . '/forum/?id=' . $id . '&', $start, $colmes, $kmess) . '';
} else {
echo '' . functions::display_pagination('' . $set['homeurl'] . '/forum/?id=' . $id . '&', $start, $colmes, $kmess) . '';
}
echo'</div>';

echo'</div>';
if($user_id){
if ($type1['edit']) {
echo '<div class="omenu"><center><b><font color="red"></br>Chủ đề này đã bị khóa!</font></b></center></div>';
} else {
if($user_id){
	
echo '<div class="forumtext"><form name="form2" action="' . $set['homeurl'] . '/forum/' . $id . '-binhluan.html" method="post">';
echo'<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
<tr><td width="45px;" class="blog-avatar">';



    echo '<img class="avatar_b" src="/avatar/'.$datauser['id'].'.png">';



$token = mt_rand(1000, 100000);
$_SESSION['token'] = $token;

echo'</td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0">
<tbody><tr><td class="current-blog" rowspan="2" style="">
<div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div>';

echo '<textarea rows="' . $set_user['field_h'] . '" name="msg" size="98%">';
echo'</textarea>';


if($datauser['kichhoat'] == 0){
echo'<font color="red">(Bạn chưa kích hoạt tài khoản nên không thể bình luận)</br></font>';
} else {
echo'<table width="100%" cellpacing="20" style="margin-left:-1.5px;"><tbody><tr><td width="1%">
<input name="submit" value="Bình Luận" type="submit" class="nut"/>' .
'<input type="hidden" name="token" value="' . $token . '"/>
</td></tr></tbody></table>';
 
}
}
echo'</form>';
echo'</td></tr></tbody></table></td></tr></tbody></table>';
echo'</div>';



if ($type1['edit']) {
echo '</div>';
}
}
}
$req = mysql_query("SELECT * FROM `forum` WHERE `type`='t' AND `refid`='$type1' AND `id`!='$id' ORDER BY `vip` DESC, `time` DESC LIMIT 3");
$total = mysql_num_rows($req);
while ($res = mysql_fetch_assoc($req)) {
echo ($i % 2) ? '<div class="l"><div class="vevent">' : '<div class="l"><div class="vevent">';
echo '+ <a class="url summary" href="'.$home.'/forum/index.php?id=' . $res . '">' . $res . '</a><span class="dtstart">
<span class="value-title" title="';
echo date("d-m-Y", $res);
echo 'T19:00+07:00"></span>
</span></div>';

echo '</div>';
++$i;}

/*
-----------------------------------------------------------------
Hoàng Anh
-----------------------------------------------------------------
*/
if ($curators) {
$array = array();
foreach ($curators as $key => $value)
$array[] = '<a href="../users/profile.php?user=' . $key . '">' . $value . '</a>';
echo '<div class="mainmenu">' . $lng_forum['curators'] . ': ' . implode(', ', $array) . '</div>';
}
if ($user_id){
$input =mysql_fetch_array(mysql_query("select * from `forum` where `id`='{$id}' and `type`='t'"));
/*
echo'<div class="phdr">CHIA SẺ BÀI VIẾT</div>';
echo'<div class="omenu"><textarea wrap="virtual" name="message" rows="3" tabindex="1">Chào bạn! Tôi muốn chia sẻ với bạn bài viết: [url=' . $set['homeurl'] . '/forum/' . $id . '.html] '.$input['text'].' [/url] mong rằng nó sẽ có ích cho bạn. Thanks!</textarea><br></div>';
*/
}
if ($rights == 3 || $rights >= 6) {
echo '<div class="phdr">Công Cụ Diễn Đàn</div>';
echo'<div class="phdrbox"></div>';
if ($rights >= 5)

echo isset($topic_vote) && $topic_vote > 0
? '<div class="omenu"><a href="' . $set['homeurl'] . '/forum/index.php?act=editvote&amp;id=' . $id . '">' . $lng_forum['edit_vote'] . '</a></div><div class="omenu"><a href="index.php?act=delvote&amp;id=' . $id . '">' . $lng_forum['delete_vote'] . '</a></div>'
: '<div class="omenu"><a href="' . $set['homeurl'] . '/forum/index.php?act=addvote&amp;id=' . $id . '">' . $lng_forum['add_vote'] . '</a></div>';
echo '<div class="omenu"><a href="' . $set['homeurl'] . '/forum/' . $id . '-rename.html">' . $lng_forum['topic_rename'] . '</a></div>';
// Закрыть - открыть тему
if ($type1['edit'] == 1)
echo '<div class="omenu"><a href="' . $set['homeurl'] . '/forum/index.php?act=close&amp;id=' . $id . '">Mở khóa chủ đề</a></div>';
else
echo '<div class="omenu"><a href="' . $set['homeurl'] . '/forum/index.php?act=close&amp;id=' . $id . '&amp;closed">Khóa bình luận</a></div>';
// Удалить - восстановить тему
if ($type1['close'] == 1)
echo '<div class="omenu"><a href="' . $set['homeurl'] . '/forum/index.php?act=restore&amp;id=' . $id . '">' . $lng_forum['topic_restore'] . '</a></div>';
if ($rights >= 6){
echo '<div class="omenu"><a href="' . $set['homeurl'] . '/forum/' . $id . '-delete.html">' . $lng_forum['topic_delete'] . '</a></div>';
}
if ($rights >= 9){
if ($type1['vip'] == 1)
echo '<div class="omenu"><a href="' . $set['homeurl'] . '/forum/' . $id . '-nogim.html">Hủy bỏ chú ý</a></div>';
else
echo '<div class="omenu"><a href="' . $set['homeurl'] . '/forum/' . $id . '-gim.html">Đưa lên chú ý</a></div>';

if ($type1['indam'] == 1)
echo '<div class="omenu"><a href="' . $set['homeurl'] . '/forum/index.php?act=unindam&amp;id=' . $id . '">Hủy bỏ in đậm</a></div>';
else
echo '<div class="omenu"><a href="' . $set['homeurl'] . '/forum/index.php?act=indam&amp;id=' . $id . '&amp;indam">Làm topic in đậm</a></div>';

}
echo '<div class="omenu"><a href="' . $set['homeurl'] . '/forum/index.php?act=per&amp;id=' . $id . '">Chuyển chuyên mục</a></div>';
}

break;

default:
/*
-----------------------------------------------------------------
Hoàng Anh
-----------------------------------------------------------------
*/
echo functions::display_error($lng['error_wrong_data']);
break;
}
} else {
/*
-----------------------------------------------------------------
Hoàng Anh
-----------------------------------------------------------------
*/
echo '<div class="phdr">Chuyên mục</div>';
echo'<div class="phdrbox">';
$req = mysql_query("SELECT `id`, `text`, `soft` FROM `forum` WHERE `type`='f' ORDER BY `realid`");
$i = 0;
while (($res = mysql_fetch_array($req)) !== false) {
echo $i % 2 ? '<div class="omenu">' : '<div class="omenu">';
$count = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum` WHERE `type`='r' and `refid`='" . $res['id'] . "'"), 0);
echo '<a href="'.$home.'/forums/' . $res['id'] . '.html">' . $res['text'] . '</a>';
if (!empty($res['soft']))
echo '<br/><span class="gray">' . $res['soft'] . '</span>';
echo '</div>';
++$i;
}
echo'</div>';

}

// Hoàng Anh

}

/////////////////Đếm lượt //////////////
mysql_query("UPDATE forum SET view = view + 1 WHERE id = $id");
require_once('../incfiles/end.php');
?>
<script type="text/javascript"> 
$('#ok').click(function() {  
$('#oke').toggle('fast','linear');  
}); 
$('#fuck').click(function() {  
$('#fucke').toggle('fast','linear');  
}); 
$('#test').click(function() {  
$('#tests').toggle('fast','linear');  
}); 
$('#testx').click(function() {  
$('#testxx').toggle('fast','linear');  
}); 
$('#stick').click(function() {  
$('#sticks').toggle('fast','linear');  
}); 
</script>