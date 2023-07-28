<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
require('../incfiles/head.php');
if (!$user_id) {
header('Location: /login.php');
exit;
}
echo '<div class="phdr">NPC Lê Thịnh</div>';
switch($act) {
default:

echo'
<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
<tbody><tr><td width="75px;" class="blog-avatar"><img src="/icon/lethinh.gif"></td><td style="" vertical-align:="" bottom;"=""><table cellpadding="" cellspacing=""><tbody>
<tr><td class="current-blog" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div><img src="/images/on.png" alt="online"><font color="red"> <b> NPC Lethinh </b></font><div class="text">';
if ($datauser['kichhoat'] ==0 ){ 
echo'<div class="omenu">Vui lòng kích hoạt để sử dụng chức năng</div>';


} else {
echo'<div class="omenu"><a href="doihuyhieu.php"><img src="https://i.imgur.com/NcUsZit.gif"> Đổi Thẻ 1STPay <img src="/images/hot.gif"> </a></div> <div class="omenu"><a href="shopnangdong.php"><img src="https://i.imgur.com/NcUsZit.gif"> Shop Năng Động </a></div> <div class="omenu"><a href="thebai.php"><img src="https://i.imgur.com/NcUsZit.gif"> Rút Thẻ Bài </a></div><div class="omenu"><a href="ghepmanh.php"><img src="https://i.imgur.com/NcUsZit.gif"> Ghép mảnh </a></div><div class="omenu"><a href="sieuxe.php"><img src="https://i.imgur.com/NcUsZit.gif"> Biến đổi siêu xe </a></div></div>
<div class="omenu"><a href="bauvat.php"><img src="https://i.imgur.com/NcUsZit.gif"> Quay báu vật </a></div>';
}
echo'</div></div></td></tr></tbody></table></td></tr></tbody></table>';

break;
case 'huongdan';
echo'<div class="omenu"><b>Bước 1 :</b> Đặt cược vào con pet mà bạn muốn , và tối thiểu đặt cược là 2.000.000xu , thắng sẽ được x3 tiền đặt cược </div>';
echo'<div class="omenu"> <b>Bước 2 : </b> Chờ đợi kết quả </div>';
break;
}
require('../incfiles/end.php');
?>