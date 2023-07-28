<?php
define('_IN_JOHNCMS', 1);
$textl = 'Vi phạm của bạn';
$rootpath = '../';
$baned3 = 2;
require_once ("../incfiles/core.php");

?>
<style>
    .bg-content {
    background: #D8E4ED;
    margin-top: 1px;
    border-bottom: 3px solid #246896;
    padding-top: 3px;
}


</style>

<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd"><html><head><meta http-equiv="Content-Type" content="text/html;charset=UTF-8"><meta name="viewport" content="width=device-width,maximum-scale=1,user-scalable=no"><title>Thitran9x- Mạng xã hội cho điện thoại di động</title>
<link rel="apple-touch-icon" href="http://my.teamobi.com/logo256.png" />
<link rel="stylesheet" type="text/css" href="/giaodien/giaodien.css" /></head><body>
<div class="body_body">
    <div style=" font-size: 10px; padding:5px;">
<img src="http://ninjaschool.vn/12.png" width="12" style="vertical-align: middle;">
<span style="vertical-align: middle;">Trò chơi dành cho người chơi 12 tuổi trở lên. Chơi quá 180 phút mỗi ngày sẽ có hại cho sức khỏe</span></div><div class="left_top"></div><div class="bg_top"><div class="right_top"></div></div><div class="body-content"><div class="a" align="center"><a href="/"><img src="https://i.imgur.com/4k8LgmC.png" height="60"/></a></div><div id="top"><div class="link-more"><div class="h"><div class="bg_tree"></div><div class="bg_noel"></div><div class="bg-content">

                                <?php

$vipham = mysql_fetch_array(mysql_query("SELECT * FROM `cms_ban_users` WHERE `user_id`='" . $user_id. "' AND `ban_time` > '" . time() . "'"));
$ban = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_ban_users` WHERE `user_id` = '" . $user_id . "' AND `ban_time` > '" . time() . "'"), 0);

if($ban <= 0){
Header('location: /index.php');
}


$timesban = $vipham['ban_time'] - time();
echo'Đăng nhập không thành công. <br>
<ul>';
echo'<div class="menu">• Bạn bị khóa bởi: <b>'.$vipham['ban_who'].'</b><br/>• Thời gian còn: <b>' . functions::timecount($timesban).'s</b><br/>• Lý do: '.$vipham['ban_reason'].'</div></ul>';




?>
<a href="/exit.php">Quay lại trang đăng nhập </a><div class="clearfix"></div></div> <br></div></div><br></div></div><div class="left_b_bottom"><div class="right_b_bottom"><div class="footer"><div class="left_bottom"></div><div class="right_bottom"></div></div></div></div><div class="copyright"><b>Bản quyền 2020 Thitran9x.</b> <a style="color: #000;font-size:10px;" href="/mod/noiquy.php">Điều khoản sử dụng</a><center></div></div></body></html>
<?php
exit;
