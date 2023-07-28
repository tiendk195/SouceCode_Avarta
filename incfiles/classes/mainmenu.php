<?
defined('_IN_JOHNCMS') or die('Error: restricted access');
$mp = new mainpage();
//Tin tuc
echo $mp->news;
echo'<div class="phdr">Có gì mới hôm nay ?';
if ($rights == 9) {
echo' - <a href="https://www.google.com/webmasters/tools/submit-url?hl=vi">Gooole</a>';
}
echo'</div>';
echo '<div class="phdrbox">';
$req = mysql_query("SELECT * FROM `forum` WHERE `type` = 't' and kedit='0' AND `close`!='1' ORDER BY `time` DESC LIMIT $start, 10");
$view = mysql_query("UPDATE forum SET view = view + 1 WHERE id = $id");
$total = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum` WHERE `type` = 't' and kedit='0' AND `close`!='1'"), 0);
while ($arr = mysql_fetch_array($req)) {
$q3 = mysql_query("select `id`, `refid`, `text` from `forum` where type='r' and id='" . $arr['refid'] . "'");
$razd = mysql_fetch_array($q3);
$q4 = mysql_query("select `id`, `refid`, `text` from `forum` where type='f' and id='" . $razd['refid'] . "'");
$frm = mysql_fetch_array($q4);
$nikuser = mysql_query("SELECT `from`,`id`, `time` FROM `forum` WHERE `type` = 'm' AND `close` != '1' AND `refid` = '" . $arr['id'] . "'ORDER BY time DESC");
$colmes1 = mysql_num_rows($nikuser);
$nam = mysql_fetch_array($nikuser);
$laynoidung = mysql_fetch_array(mysql_query("SELECT `text` FROM `forum` WHERE `type`='m' AND `refid`='" . $arr['id'] . "'"));
$gettop = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum` WHERE `type` = 'r' and id = '".$arr['refid']."'"));
$chuyenmuc = $gettop['text'];
$laynoidung = mysql_fetch_array(mysql_query("SELECT `text` FROM `forum` WHERE `type`='m' AND `refid`='" . $arr['id'] . "'"));
$chude = $arr['text'];
$chude = html_entity_decode($chude, ENT_QUOTES,'UTF-8');
$chude = functions::checkout(mb_substr($chude, ($pos - 100), 50), 1);
echo is_integer ( $i / 2 ) ? '<div class="list1">' : '<div class="list2">' ;
echo'» <a href="'.$home.'/forum/' . $arr['id'] . '.html" title="' . $chude . '">' .$chude. '</a>';
if (mb_strlen($arr['text']) > 50)
echo'...';
echo' <span style="font-size:11px;color:#777;">(' . $colmes1 . ')';
if (!empty ($nam['from']))
{
echo ' ' . $nam['from']. '</span>';
}
echo '</div>';
++$i;
}

if ($total > $kmess) {
echo '<div class="menu">' . functions::display_pagination('p', $start, $total, $kmess) . '</div>';
}
echo'</div>';
echo'<div class="phdr">Chatbox</div>';
echo'<div class="phdrbox">';
include 'shout.php';
echo'</div>';
?>