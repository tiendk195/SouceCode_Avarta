<?

if (($user_id || $set['mod_guest'] == 2) && !isset($ban['1']) && !isset($ban['13'])) {
$token = mt_rand(1000, 100000);
$_SESSION['token'] = $token;
echo '<div class="omenu"><form name="form" action="/converse/index.php?act=say" method="post">';
if (!$user_id)
echo $lng['name'] . ' (max 25):<br/><input type="text" name="name" maxlength="25"/><br/>';
echo '<textarea rows="' . $set_user['field_h'] . '" name="msg"></textarea><br/>';
if ($set_user['translit'])
echo '<input type="checkbox" name="msgtrans" value="1" />&nbsp;' . $lng['translit'] . '<br/>';
if (!$user_id) {
// CAPTCHA для гостей
echo '<img src="../captcha.php?r=' . rand(1000, 9999) . '" alt="' . $lng['captcha'] . '"/><br />' .
'<input type="text" size="5" maxlength="5"  name="code"/forum/shout.php>&#160;' . $lng['captcha'] . '<br />';
}
echo '<input type="hidden" name="token" value="' . $token . '"/>' .
'<input name="submit" value="Gửi" type="submit">';
echo'</div>';
}
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `guest`"), 0);
if($tong) {
$req = mysql_query("SELECT * FROM `phonghop` ORDER BY `time` DESC LIMIT $start, $kmess");
$req = mysql_query("SELECT `guest`.*, `guest`.`id` AS `gid`, `users`.`lastdate`, `users`.`id`, `users`.`rights`, `users`.`name`
FROM `guest` LEFT JOIN `users` ON `guest`.`user_id` = `users`.`id`
WHERE `guest`.`adm`='0' ORDER BY `time` DESC LIMIT $start, 6");
while ($gres = mysql_fetch_assoc($req)) {
$post = $gres['text'];
if(strlen($post) > 160) {
$post = substr($post, 0, 160).'....';
}
$post = functions::checkout($gres['text'], 1, 1);
if ($set_user['smileys'])
$post = functions::smileys($post, $gres['rights'] ? 1 : 0);
echo'<div class="forumtext">';
echo'<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
<tr><td width="45px;" class="blog-avatar">';
if (file_exists(($rootpath.'avatar/'.$gres['id'].'.png'))) {
echo '<img class="avatarforum" src="../avatar/'.$gres['id'].'.png" width="45" height="48" alt="'.$gres['name'].'"/>';
}
else
{
echo '<img class="avatarforum" src="../avatar/'.$gres['id'].'.png" width="45" height="48" alt="'.$gres['name'].'"/>';
}
echo'</td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0"><tbody>
<tr><td class="current-blog" rowspan="2" style=""><div class="blog-bg-left">';
echo'<img src="/giaodien/images/left-blog.png"></div>';
echo (time() > $gres['lastdate'] + 300 ? ' <img style="vertical-align:middle;" title="' . $res['from'] . ' is offline" src="/images/off.png" alt="offline"/> ' : '<img style="vertical-align:middle;" title="' . $res['from'] . ' is online" src="/images/on.png" alt="online"/> ');

echo'<a href="/member/'.$gres['id'].'.html"><b>'.nick($gres['id']).'</b> </a></span>';
echo'<div class="text">';
echo''.$post.'<br/></br><span style="font-size:11px;color:#777;"> ' . functions::thoigian($gres['time']) . '</span><span style="float:right;"><br/>';
echo'</div></div></td></tr></tbody></table></td></tr></tbody></table>';
echo'</div>';
++$i;
}
} else {
echo '<div class="menu"><p>' . $lng['guestbook_empty'] . '</p></div>';
}
if ($tong > $kmess){
echo '<div class="phantrang" style="margin-top: 5px;">' . functions::display_pagination('?', $start, $tong, $kmess) . '</div>';
}

?>