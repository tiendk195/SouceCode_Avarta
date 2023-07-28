<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
require('../incfiles/head.php');
if (!$user_id) {
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
if($datauser['id'] != 1 ){
echo'<div class="news"><center><b>Lỗi</center>';
echo'</b></div>';
require('../incfiles/end.php');
exit;
}
echo'<div class="phdr">Lịch sử</div>';

$res=mysql_query("SELECT * FROM `ls_chuyenxl` WHERE `id1`!='0' ORDER BY `id1` DESC LIMIT $start,$kmess");



while ($post = mysql_fetch_array($res)){
    	$t2= mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` where  `id`= '" . $post[id_shop] . "'"));

    echo'<div class="omenu">';
echo'<b>Người chỉnh: </b><a href="/member/'.$post[id].'.html" >'.nick($post['id']).' </a></br>
<b>Đối tượng: </b><a href="/member/'.$post[user].'.html" >'.nick($post['user']).' </a></br>
<b>Xu : '.number_format($post['xu']).'</b></br>
<b>Lượng : '.number_format($post['luong']).'</b></br>

<b>Thời gian: '.functions::thoigiantinh($post['time']).' trước</b></br></div>';
}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `ls_chuyenxl` WHERE `id1`!=0"), 0);
IF($total > $kmess){
Echo'<div class="phdr">'.functions::pages('?page=', $start, $total, $kmess).'</div>';
}

require('../incfiles/end.php');
?>