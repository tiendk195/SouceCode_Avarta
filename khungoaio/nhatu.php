<?php
define('_IN_JOHNCMS', 1);
require ('../incfiles/core.php');
if (!$user_id) {
header('Location: /login.php');
exit;
}
$textl = 'Nhà Tù';
require ('../incfiles/head.php');

echo'<div class="main-xmenu">';
if ($ban)
{
echo'<div class="danhmuc">Vi phạm của bạn</div>';
$vipham = mysql_fetch_array(mysql_query("SELECT * FROM `cms_ban_users` WHERE `user_id`='" . $user_id. "' ORDER BY `ban_while` DESC LIMIT 1"));
echo'<div class="list1">Đăng nhập không thành công !<br/>• Bạn bị khóa bởi : <b>'.$vipham['ban_who'].'</b><br/>• Lý do bị khóa : '.$vipham['ban_reason'].'<br/>• Thời gian : '.thoigiantinh($vipham['ban_time']).'<br/>• Liên hệ Admin để biết thêm chi tiết<br/><center><a href="/exit.php">Trở lại đăng nhập</a></center></div>';
}
echo '<div class="danhmuc">Nhà tù</div>';
echo'<div class="viengame">';
echo'<div class="tuongnhatu"><div class="cuasonhatu"></div></div>';
echo '<div class="nennhatu" style="text-align: center;">';
mysql_query("UPDATE `vitri` SET `online`='nhatu' WHERE `user_id`='".$user_id."'");
$req=mysql_query("SELECT * FROM `cms_ban_users` WHERE `ban_time`>'".time()."' ORDER BY RAND() LIMIT 15");
while ($res = mysql_fetch_array($req)) {
$name=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$res[user_id]."'"));
 echo '<a href="/member/'.$res['user_id'].'.html"><label style="display: inline-block;text-align: center;"><s><b style="font-size: 9px;color:black;font-weight:bold;text-align: center;">'.$name[name].'</b></s><br><img src="/avatar/'.$res[user_id].'.png"></label></a>';
}
echo'</div>';
echo'</div>';
echo'</div>';

require ('../incfiles/end.php');
?>