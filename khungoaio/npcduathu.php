<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl='Đua Pet';
require('../incfiles/head.php');
if (!$user_id) {
header('Location: /login.php');
exit;
}
echo '<div class="phdr">'.$textl.'</div>';
switch($act) {
default:
echo'
<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tbody><tr><td width="50px;" class="blog-avatar"><img src="https://i.imgur.com/fCsB4Ye.gif"></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0"><tbody><tr><td class="current-blog" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div><img src="/images/on.png" alt="online"><font color="red"> <b> NPC Đua Pet </b></font><div class="text"><div class="omenu">
<a href="duathu.php"><b><font color="003366"><img src="/icon/next.png"> Vào Đấu Trường </font></b></a></div>
<div class="omenu"><a href="?act=huongdan"><b><font color="003366"><img src="/icon/next.png"> Hướng Dẫn Đua Thú</font></b></a></div>
<div class="omenu"><a href="bxh.php"><b><font color="003366"><img src="/icon/next.png"> Bảng Xếp Hạng <img src="/images/hot.gif"></font></b></a></div>

</div></td></tr></tbody></table></td></tr></tbody></table>';


break;
case 'huongdan';
echo'<div class="omenu"><b>Bước 1 :</b> Đặt cược vào con pet mà bạn muốn , và tối thiểu đặt cược là 2.000.000xu , thắng sẽ được x3 tiền đặt cược </div>';
echo'<div class="omenu"> <b>Bước 2 : </b> Chờ đợi kết quả </div>';
break;
}
require('../incfiles/end.php');
?>