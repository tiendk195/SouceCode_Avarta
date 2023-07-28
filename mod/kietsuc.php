<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');

if (!$user_id) {
header('Location: /login.php');
exit;
}


if (isset($_POST['hoisinh'])) {

mysql_query("UPDATE `users` SET `hp`=`hpfull` WHERE `id`='".$user_id."'");
header('Location: /index.php');

}	
?>
<style>
.bg-content {
    background: #D8E4ED;
    margin-top: 1px;
    border-bottom: 3px solid #246896;
    padding-top: 3px;
}
</style>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd"><html><head><meta http-equiv="Content-Type" content="text/html;charset=UTF-8"><meta name="viewport" content="width=device-width,maximum-scale=1,user-scalable=no"><title> Mạng xã hội cho điện thoại di động </title>
<link rel="apple-touch-icon" href="http://my.teamobi.com/logo256.png" />

<link rel="stylesheet" type="text/css" href="/giaodien/ducnghiait.css" />
<link rel="stylesheet" type="text/css" href="/giaodien/teamobi/template.css" /><link type="text/css" rel="stylesheet" href="/giaodien/teamobi/emoji.css" /></head><body>
<div class="body_body"><div class="left_top"></div><div class="bg_top"><div class="right_top"></div></div><div class="body-content"><div class="a" align="center"><a href="/"><img src="https://lethinh2003.xyz/logo-4.png" /></a></div><div id="top"><div class="link-more"><div class="h"><div class="bg_tree"></div><div class="bg_noel"></div><div class="bg-content"><center><img src="/kietsuc.png"></center><div class="menu">Bạn vừa bị <font color="red">Boss</font> hoặc 1 <font color="green">Nhẫn giả</font> nào đó vừa đánh bạn kiệt sức !!</div>
<div class="menu" align="center">
<form method="post"><input type="submit" name="hoisinh" value="Hồi sinh tại chỗ"/></form>
</div><div class="clearfix"></div></div> <br></div></div><br></div></div><div class="left_b_bottom"><div class="right_b_bottom"><div class="footer"><div class="left_bottom"></div><div class="right_bottom"></div></div></div></div><div class="copyright"><b>Bản quyền 2020 Mxh.</b> <a style="color: #000;font-size:10px;" href="/mod/noiquy.php">Điều khoản sử dụng</a><center></div></div></body></html>