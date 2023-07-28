<?php
//require("firewall/dqh-firewall.php");
@session_start();

if(!isset($_SESSION['lang'])) {
$_SESSION['lang'] = 'vn';

    
    
}



include "vh/".$_SESSION['lang'].".php";












defined('_IN_JOHNCMS') or die('Error: restricted access');
date_default_timezone_set('Asia/Ho_Chi_Minh');
$times = date("H");  
$headmod = isset($headmod) ? mysql_real_escape_string($headmod) : '';
if (strlen($mota) < 5)
$mota = $set['meta_desc'];
$mota = html_entity_decode($mota, ENT_QUOTES, 'UTF-8');
$chuoi =$text;
$arr =  explode(" ",$chuoi);
$dem =count($arr);
for ($dem2=0; $dem2<$dem; $dem2++)
{
$key = html_entity_decode($key, ENT_QUOTES, 'UTF-8');
$key=''.$key.''.$arr[$dem2].', ';
}
$textl = isset($textl) ? $textl : $set['copyright'];
$statistic = new statistic($textl);
$textl=html_entity_decode($textl,ENT_QUOTES,'UTF-8');
$search_post = isset($_POST['search']) ? trim($_POST['search']) : false;
$search_get = isset($_GET['search']) ? rawurldecode(trim($_GET['search'])) : false;
$search2 = $search_post ? $search_post : $search_get;
$search = $search_post ? $search_post : $search_get;
$search = html_entity_decode(trim($search), ENT_QUOTES, 'UTF-8');
$search=str_replace(" ","+", $search);
header("Expires: " . date("r", time() + 60));
echo'<?xml version="1.0" encoding="utf-8"?>'.
"\n" . '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "https://www.wapforum.org/DTD/xhtml-mobile10.dtd">' .
"\n" . '<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="vn">' .
"\n" . '<head>' .
"\n" . '<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8"/>' .
"\n" . '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes">' .
"\n" . '<meta http-equiv="Content-Style-Type" content="text/css" />' .
"\n" . '<meta http-equiv="Content-Language" content="vi" />';

$a = mysql_query("SELECT * FROM `thongbao` WHERE `ok` = '1' and `user` = '" . $user_id . "'");
$c = mysql_num_rows($a);
$new_sys_mail = mysql_result(mysql_query("SELECT COUNT(*) FROM `thongbao` WHERE `ok` = '1' and `user` = '" . $user_id . "'"), 0);
	//echo'<div class="pmenu"><a href="' . $home . '/thongbao.html"><img src="/mail/images/thongbaomoi.gif"><b><font color="red"> Bạn có ' . $new_sys_mail . ' thông báo mới chưa xem!</font></b></a></div>';

echo'' .
"\n" . '<title>';
if($new_sys_mail >0 ) {
	if ($user_id) {


echo'[' . $new_sys_mail . ']';
	}
}
echo' ' . $textl . ' | MXH Werfamily</title>';

echo'' .
"\n" . '<meta name="description" content="' . $set['meta_desc'] . '" />' .
"\n" . '<meta name="keywords" content="' . $set['meta_key'] . '"/>' .
"\n" . '<meta name="author" content="Lethinh" />' .
"\n" . '<meta name="copyright" content="Copyright © Lethinh" />' .
"\n" . '<meta name="language" content="Vietnamese" />' .
"\n" . '<meta name="title" content="' . $textl . '" />' .
"\n" . '<meta name="Googlebot" content="all" />' .

"\n" . '<link rel="shortcut icon" href="' . $set['homeurl'] . '/favicon.ico" type="icon" />' .
"\n" . '<link rel="alternate" type="application/rss+xml" title="RSS | Bài viết mới" href="' . $set['homeurl'] . '/rss/rss.php" />' .
"\n" . '<link rel="stylesheet" href="/giaodien/modal.css" type="text/css">'.

"\n" . '<link rel="stylesheet" href="/giaodien/giaodien.css" type="text/css">'.
"\n" . '<link rel="stylesheet" href="/giaodien/font-awesome-4.7.0/css/font-awesome.min.css">'.

"\n" . '<script type="text/javascript" src="/giaodien/jquery/jquery-3.3.1.js"></script>'.
"\n" . '<script type="text/javascript" src="/giaodien/jquery/jquery-3.1.1.min.js"></script>'.
"\n" . '<script type="text/javascript" src="/giaodien/jquery/jquery.validate.min.js"></script>'.
"\n" . '<script type="text/javascript" src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>'.
"\n" . '</head>' . core::display_core_errors();


if ($user_id) {
?>
<script type="text/javascript"> eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('e 0=d;2 9(){0=b.c(\'a\');0.1.f=\'m\';0.1.3=\'8\';0.1.4=\'8\'}2 l(){0.1.3=5(0.1.3)+6+\'7\'}2 k(){0.1.3=5(0.1.3)-6+\'7\'}2 g(){0.1.4=5(0.1.4)-6+\'7\'}2 j(){0.1.4=5(0.1.4)+6+\'7\'}h.i=9;',23,23,'imgObj|style|function|left|top|parseInt|10|px|0px|init|myImage|document|getElementById|null|var|position|Len|window|onload|Xuong|Trai|Phai|relative'.split('|'),0,{}))
</script>
<?php
if (isset($_GET['page'])) {
$ids = (int)$_GET['page'];

echo "
<script>
var loadcontent ='<b><font style=font-size: 8pt color=#f22 face=Verdana>Đang tải dữ liệu…</font></b>';
$(document).ready(function(){
$('#datachat').html(loadcontent);
$('#datachat').load('chemgio.php?page=".$ids."');
var refreshId=setInterval(function(){
$('#datachat').load('chemgio.php?page=".$ids."');
$('#datachat').slideDown('slow');
},7000);
$('#shoutbox').validate({
debug:false,
submitHandler:function(form){
$.post('chemgio.php',
$('#shoutbox').serialize(),
function(chatoutput){
$('#datachat').html(chatoutput);
});
$('#msg').val('');
}
});
});
</script>";

} else {
	echo "
<script>
var loadcontent ='<b><font style=font-size: 8pt color=#f22 face=Verdana>Đang tải dữ liệu…</font></b>';
$(document).ready(function(){
$('#datachat').html(loadcontent);
$('#datachat').load('chemgio.php');
var refreshId=setInterval(function(){
$('#datachat').load('chemgio.php');
$('#datachat').slideDown('slow');
},7000);
$('#shoutbox').validate({
debug:false,
submitHandler:function(form){
$.post('chemgio.php',
$('#shoutbox').serialize(),
function(chatoutput){
$('#datachat').html(chatoutput);
});
$('#msg').val('');
}
});
});
</script>";
}
}
$cms_ads = array();
if (!isset($_GET['err']) && $act != '404' && $headmod != 'admin') {
$view = $user_id ? 2 : 1;
$layout = ($headmod == 'mainpage' && !$act) ? 1 : 2;
$req = mysql_query("SELECT * FROM `cms_ads` WHERE `to` = '0' AND (`layout` = '$layout' or `layout` = '0') AND (`view` = '$view' or `view` = '0') ORDER BY  `mesto` ASC");
if (mysql_num_rows($req)) {
while (($res = mysql_fetch_assoc($req)) !== FALSE) {
$name = explode("|", $res['name']);
$name = htmlentities($name[mt_rand(0, (count($name) - 1))], ENT_QUOTES, 'UTF-8');
if (!empty($res['color'])) $name = '<span style="color:#' . $res['color'] . '">' . $name . '</span>';
$font = $res['bold'] ? 'font-weight: bold;' : FALSE;
$font .= $res['italic'] ? ' font-style:italic;' : FALSE;
$font .= $res['underline'] ? ' text-decoration:underline;' : FALSE;
if ($font) $name = '<span style="' . $font . '">' . $name . '</span>';
@$cms_ads[$res['type']] .= '<a href="' . ($res['show'] ? functions::checkout($res['link']) : $set['homeurl'] . '/go.php?id=' . $res['id']) . '">' . $name . '</a><br/>';
if (($res['day'] != 0 && time() >= ($res['time'] + $res['day'] * 3600 * 24)) || ($res['count_link'] != 0 && $res['count'] >= $res['count_link']))
mysql_query("UPDATE `cms_ads` SET `to` = '1'  WHERE `id` = '" . $res['id'] . "'");
}
}
}


if (isset($cms_ads[0])) echo $cms_ads[0];
echo'<div class="lethinhdz"><div class="body_body">';

echo'<div style=" font-size: 10px; padding:5px;">
<img src="/12.png" width="12" style="vertical-align: middle;">
<span style="vertical-align: middle;">Các trò chơi dành cho người chơi 12 tuổi trở lên. Chơi quá 180 phút mỗi ngày sẽ có hại cho sức khỏe</span></div><div class="left_top"></div><div class="right_top"></div>';
echo'<div class="left_top"></div><div class="bg_top"><div class="right_top"></div></div>';
echo'<div class="body-content">';

echo'<div class="a" align="center">';
echo'<a href="/index.php"><img src="https://i.imgur.com/aNFXvZb.png" width="180"></a></br>



';

 




echo'</div>';
if (!$user_id)
{
    echo'<div class="nenshop" align="center">
<marquee behavior="scroll" direction="left" scrollamount="5" style="margin-top: 5px"><img src="/icon/iconxoan/dammaynho.png"></marquee> <marquee behavior="scroll" direction="left" scrollamount="7" style="margin-top: 10px"><img src="/icon/iconxoan/dammaylon.png"></marquee>
</div>
<table width="100%" border="0" cellspacing="0"><tr class="menu">
<td  '.$active5.' width="25%"><a href="/dangki.html"><i class="fa fa-user-plus"></i> Đăng ký</a></td>
<td  '.$active6.' width="25%"> <a href="/dangnhap.html"><i class="fa fa-sign-in"></i> Đăng nhập</a></td>
<td  '.$active7.' width="25%"><a href="/pass.html"><i class="fa fa-question"></i> Quên mật khẩu</a></td>
</tr></table>';
}
if ($user_id) {
 $tr=mysql_query("SELECT * FROM `leduong`");
$checktr=mysql_num_rows($tr);
if ($checktr>=1) {
if ($datauser['viewleduong']==0){
    Header('location: '.$home.'/game/kethon/wedding.php');
;
}
}
if ($datauser['viewthongbao']==1){
    Header('location: '.$home.'/thongbao.html');
    mysql_query("UPDATE `users` SET `viewthongbao` = '0' where `id` = '" . $user_id . "'");

}
}




echo'<div class="link-more">';
echo'<div class="h">';
$a = mysql_query("SELECT * FROM `thongbao` WHERE `ok` = '1' and `user` = '" . $user_id . "'");
$c = mysql_num_rows($a);
$new_mail = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_mail` LEFT JOIN `cms_contact` ON `cms_mail`.`user_id`=`cms_contact`.`from_id` AND `cms_contact`.`user_id`='$user_id' WHERE `cms_mail`.`from_id`='$user_id' AND `cms_mail`.`sys`='0' AND `cms_mail`.`read`='0' AND `cms_mail`.`delete`!='$user_id' AND `cms_contact`.`ban`!='1' AND `cms_mail`.`spam`='0'"), 0);

if ($user_id) {
echo'<table width="100%" border="0" cellspacing="0">
<tbody><tr class="menu"><td '.$active1.' width="25%">';
echo'<a onclick="hoanganhopenclick()"><img src="/images/danhmuc.png" alt="" style="border-radius:1px;margin-left:-15px;margin-bottom:-2px;" width="12" height="12"/></a>
<a href="/mod">Tiện ích</a>';
echo'</td><td '.$active2.' width="25%" class="mautab">';
echo'<a href="' . $set['homeurl'] . '/nhom"><i class="fa fa-group"></i> Hội Nhóm</a>';
if ($c>0) {
    echo'</td><td id="selected" '.$active3.' width="25%" class="mautab">';

echo'<a href="' . $set['homeurl'] . '/thongbao.html"><i class="fa fa-bell"></i> Thông báo';
echo' <span style="border-radius:2px;background-color:#ff1234;color:#fff;"> ['.$c.']</span></a>';
}
else {
    echo'</td><td  '.$active3.' width="25%" class="mautab">';

 echo'<a href="' . $set['homeurl'] . '/thongbao.html"><i class="fa fa-bell"></i> Thông báo';
   
}
echo'</td><td '.$active4.' width="25%">';
echo'<a href="/mail/new.html"><i class="fa fa-envelope"></i> Tin nhắn riêng';
if ($new_mail>0){
echo'<span style="border-radius:2px;background-color:#ff1234;color:#fff;"> [' . $new_mail . ']</a></span>';
}
echo'</tbody></td></tr></table>';

echo'<div class="body" style="background: #edf7ff">';
/*
echo'<div class="text_hide">Xin chào, <a href="/member/'.$datauser['id'].'.html"><font color="white"><b>'.$login.'</b></font></a>
<span class="thoat"><a href="/exit.php"><font color="white">Đăng xuất</font></a></span></div></br></br>';
*/
}
if (!$user_id) {
	echo'<div id="box_login_ads" style="background: #cae4ff">';



}


if ($user_id) {
include "lethinh_.php";



	echo'<div id="box_login_ads" style="background: #edf7ff">';
//echo'<div id="box_login_ads">';

$a = mysql_query("SELECT * FROM `thongbao` WHERE `ok` = '1' and `user` = '" . $user_id . "'");
$c = mysql_num_rows($a);
$new_mail = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_mail` LEFT JOIN `cms_contact` ON `cms_mail`.`user_id`=`cms_contact`.`from_id` AND `cms_contact`.`user_id`='$user_id' WHERE `cms_mail`.`from_id`='$user_id' AND `cms_mail`.`sys`='0' AND `cms_mail`.`read`='0' AND `cms_mail`.`delete`!='$user_id' AND `cms_contact`.`ban`!='1' AND `cms_mail`.`spam`='0'"), 0);

echo'<div class="box_welcome_team">';
echo'<div class="gd_">';
$chat = mysql_fetch_array(mysql_query("SELECT * FROM `chatthongbao` ORDER BY `id` DESC LIMIT 1"));
$quanli=mysql_fetch_array(mysql_query("SELECT * FROM `1STPay_quanli` WHERE `id`='1'"));
$quanap=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$quanli['idshop']."'"));
    $date = getdate();

if ($chat>0){

echo'<div class="pmenu">
<marquee><b><font color="red"><i class="fa fa-bullhorn"></i> Thông báo: </font></b>
' . bbcode::tags(functions::smileys($chat['text'])) . '
</marquee></div>';
}
if ($quanli['khuyenmai']>=1){
echo'<div class="pmenu">
<marquee><b><font color="red"><i class="fa fa-bullhorn"></i> Khuyến mãi: </font></b> Từ ngày
 '.$quanli['ngaybd'].' -> '.$quanli['ngaykt'].'/'.$date['mon'].'/'.$date['year'].' khuyến mãi '.$quanli['khuyenmai'].'% nạp thẻ';
 if ($quanli['quanap']>0 && $quanli['idshop']>0){
	Echo' • Nạp trên '.number_format($quanli['quanap']).'VNĐ nhận ngay '.$quanap[tenvatpham].' ';
}
 echo'
</marquee></div>';
}
/*
$lv = lv($user_id);
echo'<center>
<div class="lethinh">
<div style="text-align:right"><table width="100%" border="0" cellspacing="0"><tr class="">';
if ($rights>=2) {

echo'<a href="/quanli"><img src="/images/set.png"> Quản lí hệ thống - </a>';
}
echo'<a href="/users/setting.php"><img src="/images/set.png"> Cài đặt cá nhân</a>  -  <a href="/users/canhan.php">Thiết lập</a> - <a href="/ruong"><img src="/images/ruongdo.png"> Rương đồ</a> - <a href="/thongbao.html"><img src="/images/thongbao.png"> Thông báo ('.$c.')</a> - <a href="/mail/new.html"><img src="/images/tinnhan.png"> Tin nhắn (' . $new_mail . ')</a><br>

<center></br> ';

echo'<img src="/avatar/'.$datauser['id'].'.png">';


echo' <br>
<a href="/app/doitim.php"><font color="red"> [ Đổi tim <img src="https://i.imgur.com/ZL9ehAx.gif">  ] </font></a></center><br>';
echo'<font color="green"><img src="/icon/vnd.png"> '.number_format($datauser['luongkhoa']).' Lượng khóa | <img src="/icon/vnd.png"> '.number_format($datauser['luong']).' Lượng | <img src="/icon/xu.png"> '.number_format($datauser['xu']).' Xu | <img src="/icon/sao.png"> '.number_format($datauser['level']).' +'.number_format($datauser['chisolevel']).'% </font>';

 echo'</td></tr></table></br>'; 

echo'</div>';
*/
echo'<div id="loadnhanvat">';
echo'
<table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<td width="30%"> <div class="gd_new"><div style="overflow: auto;height:100px">
<center>
<div class="gd_con">
<font size="1" color="red"><b>'.$login.'</b></font><br>';
echo'
<div class="gd_khung_'.$datauser['khung'].'">';

echo'
<img src="/avatar/'.$datauser['id'].'.png" style="position: absolute;verticalalign: 0 px;margin:13px 0 0 -23px;"></div></div>
</center></div></div></td><td width="35%"><div class="gd_new"><div style="overflow: auto;height:100px">
<div class="gd_con"><a href="/ruong"><font color="red" size="1"><b><i class="fa fa-briefcase"></i> Rương đồ</b></font></a></div>';
echo'<div class="gd_con"><a href="/app/doitim.php"><font color="red" size="1"><b><i class="fa fa-heart"></i> Đổi tim</b></font></a></div>';
if ($rights>=2) {

echo'<div class="gd_con"><a href="/quanli"><font color="red" size="1"><b><i class="fa fa-archive"></i> Quản lí hệ thống </b></font> </a></div>';
}

echo'<div class="gd_con"><a href="/member/'.$datauser['id'].'.html"><font color="red" size="1"><b><i class="fa fa-user"></i> Thông tin cá nhân</b></font></a></div>
<div class="gd_con"><a href="/users/setting.php"><font color="red" size="1"><b><i class="fa fa-lock"></i> Cài đặt cá nhân</b></font></a></div>
<div class="gd_con"><a href="/users/'.$datauser['id'].'.html"><font color="red" size="1"><b><i class="fa fa-cogs"></i> Thiết lập</b></font> </a> </div>
<div class="gd_con"><a href="/exit.php"><font color="red" size="1"><b><i class="fa fa-sign-out"></i> Đăng xuất</b></font> </a> </div>';


echo'
</div></div></td><td width="35%"> <div class="gd_new"><div style="overflow: auto;height:100px">
<div class="gd_con"><font color="green" size="1"><b><i class="fa fa-money"></i> '.number_format($datauser['xu']).' Xu</b></font></div>
<div class="gd_con"><font color="green" size="1"><b><i class="fa fa-money"></i> '.number_format($datauser['luongkhoa']).' Lượng khóa</b></font></div>
<div class="gd_con"><font color="green" size="1"><b><i class="fa fa-money"></i> '.number_format($datauser['xeng']).' Xèng</b></font></div>
<div class="gd_con"><font color="green" size="1"><b><i class="fa fa-money"></i> '.number_format($datauser['luong']).' Lượng</b></font></div>
<div class="gd_con"><font color="green" size="1"><b><i class="fa fa-star"></i>  '.number_format($datauser['level']).' +'.number_format($datauser['chisolevel']).'%</b></font>
</div></div></div></td></tr></tbody></table>';
echo'</div>'; /*<!-- Hết load -->*/


include "kethon.php";


///

if (time()>$datauser['timehopqua']+60*60) {

echo'<div class="lethinh_quaonline">
<div class="pmenu" name="quaonline" id="lethinh_online"> Bạn nhận được quà tặng online từ hệ thống <img src="/images/qua.png"></div></div>';



}

if ($rights>=6) {
$donhang=mysql_num_rows(mysql_query("SELECT * FROM `chotroi` WHERE `duyet`='0'"));
if ($donhang) {
echo'<center><div class="pmenu"><a href="/avatar/chotroi.php?act=duyet"><font color="red">Bạn có '.$donhang.' đơn hàng cần được phê duyệt</font></a></div></center>';
}
}
if ($rights>=9) {
$hotro=mysql_num_rows(mysql_query("SELECT * FROM `hotro` WHERE `duyet`='0'"));
if ($hotro) {
	echo'<div class="pmenu"><a href="' . $home . '/hotro/admin.php"><img src="/images/smileys/simply/new.gif"><b><font color="red"> Bạn có ' . $hotro . ' thư Hỗ trợ mới chưa xem!!</font></b></a></div>';
}



}

$hotro_duyet = mysql_result(mysql_query("SELECT COUNT(*) FROM `hotro` WHERE `user_id`='$user_id' AND `duyet`='1';"), 0);
$hotro_tuchoi = mysql_result(mysql_query("SELECT COUNT(*) FROM `hotro` WHERE `user_id`='$user_id' AND `duyet`='2';"), 0);

if ($hotro_duyet) {
	echo'<div class="pmenu"><a href="' . $home . '/hotro/?act=lichsu"><img src="/images/smileys/simply/new.gif"><b><font color="red"> Bạn có ' . $hotro_duyet . ' thư Hỗ trợ đã được duyệt !!</font></b></a></div>';
}
if ($hotro_tuchoi) {
	echo'<div class="pmenu"><a href="' . $home . '/hotro/?act=lichsu"><img src="/images/smileys/simply/new.gif"><b><font color="red"> Bạn có ' . $hotro_tuchoi . ' thư Hỗ trợ đã bị từ chối !!</font></b></a></div>';
}

if($datauser['kichhoat'] == 0){
    echo'<div class="pmenu"> <a href="/users/checkpoint.php"></a><center><a href="/users/checkpoint.php"><img src="https://i.imgur.com/YBUPzKX.png"><br> <font color="red">Bạn chưa hoàn tất kích hoạt Tài khoản. Do đó, tài khoản của bạn sẽ bị khóa 1 số chức năng!
Nhấp vào đây để Kích hoạt</font></a></center></div>
    
    
    
    ';
}
///



echo '</center></div>';
echo'</div>';

$chat = mysql_fetch_array(mysql_query("SELECT * FROM `chatthongbao` ORDER BY `id` DESC LIMIT 1"));
$quanli=mysql_fetch_array(mysql_query("SELECT * FROM `1STPay_quanli` WHERE `id`='1'"));
$quanap=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$quanli['idshop']."'"));
include "lethinh/lethinh.php";

include "lethinh.php";
//echo'<span id="loadweb"></span>';


 }








echo'<div id="box_forums">';

$sql = '';
$set_karma = unserialize($set['karma']);
if ($user_id) {



if (!$datauser['karma_off'] && $set_karma['on'] && $datauser['karma_time'] <= (time() - 86400)) {
$sql .= " `karma_time` = '" . time() . "', ";
}
$movings = $datauser['movings'];
if ($datauser['lastdate'] < (time() - 300)) {
$movings = 0;
$sql .= " `sestime` = '" . time() . "', ";
}
if ($datauser['place'] != $headmod) {
++$movings;
$sql .= " `place` = '" . mysql_real_escape_string($headmod) . "', ";
}
if ($datauser['browser'] != $agn)
$sql .= " `browser` = '" . mysql_real_escape_string($agn) . "', ";
$totalonsite = $datauser['total_on_site'];
if ($datauser['lastdate'] > (time() - 300))
$totalonsite = $totalonsite + time() - $datauser['lastdate'];
mysql_query("UPDATE `users` SET $sql
`movings` = '$movings',
`total_on_site` = '$totalonsite',
`lastdate` = '" . time() . "'
WHERE `id` = '$user_id'
");
} else {

$movings = 0;
$session = md5(core::$ip . core::$ip_via_proxy . core::$user_agent);
$req = mysql_query("SELECT * FROM `cms_sessions` WHERE `session_id` = '$session' LIMIT 1");
if (mysql_num_rows($req)) {

$res = mysql_fetch_assoc($req);
$movings = ++$res['movings'];
if ($res['sestime'] < (time() - 300)) {
$movings = 1;
$sql .= " `sestime` = '" . time() . "', ";
}
if ($res['place'] != $headmod) {
$sql .= " `place` = '" . mysql_real_escape_string($headmod) . "', ";
}
mysql_query("UPDATE `cms_sessions` SET $sql
`movings` = '$movings',
`lastdate` = '" . time() . "'
WHERE `session_id` = '$session'
");
} else {

mysql_query("INSERT INTO `cms_sessions` SET
`session_id` = '" . $session . "',
`ip` = '" . core::$ip . "',
`ip_via_proxy` = '" . core::$ip_via_proxy . "',
`browser` = '" . mysql_real_escape_string($agn) . "',
`lastdate` = '" . time() . "',
`sestime` = '" . time() . "',
`place` = '" . mysql_real_escape_string($headmod) . "'
");
}
}
if (!empty($ban)){
$baned = 1;
$baned2 = 2;
if ($baned < $baned2-$baned3){
header('Location: '.$home.'/baned/');
}
}

if(empty($datauser[timethuhoachkhe])) {
mysql_query("UPDATE `users` SET `timethuhoachkhe` = '".$time."' where `id` = '" . $user_id . "'");
}
?>
<div class="hoanganh_giaodien"><div id="hoanganhclick" class="hoanganh_menuclick">
<div class="hoanganh_danhmuc_menu" style="text-align:center;font-size:13px;color:#3883CC;">Mạng Xã Hội<br/>Werfamily</div>
<div class="hoanganh_danhmuc_menu"><a id="hoanganh_cuahang" style="color:#6e6e6e;">➮Cửa hàng</a></div>
<div id="hoanganh_cuahangan" style="display: none;">
<div class="hoanganh_danhmuc_menu2">
<a href="/avatar/list.php?act=danhsach&loai=nensau" style="color:#6e6e6e;">➢Cửa hàng nền sau</a><br/>

<a href="/avatar/list.php?act=danhsach&loai=ao" style="color:#6e6e6e;">➢Cửa hàng áo</a><br/>
<a href="/avatar/list.php?act=danhsach&loai=quan"style="color:#6e6e6e;">➢Cửa hàng quần</a><br/>
<a href="/avatar/list.php?act=danhsach&loai=toc" style="color:#6e6e6e;">➢Cửa hàng tóc</a><br/>
<a href="/avatar/list.php?act=danhsach&loai=non" style="color:#6e6e6e;">➢Cửa hàng nón</a><br/>
<a href="/avatar/list.php?act=danhsach&loai=canh" style="color:#6e6e6e;">➢Cửa hàng cánh</a><br/>
<a href="/avatar/list.php?act=danhsach&loai=khuonmat" style="color:#6e6e6e;">➢Cửa hàng khuôn mặt</a><br/>
<a href="/avatar/list.php?act=danhsach&loai=haoquang" style="color:#6e6e6e;">➢Cửa hàng hào quang</a><br/>
<a href="/avatar/list.php?act=danhsach&loai=kinh" style="color:#6e6e6e;">➢Cửa hàng kính</a><br/>
<a href="/avatar/list.php?act=danhsach&loai=mat" style="color:#6e6e6e;">➢Cửa hàng mắt</a><br/>
<a href="/avatar/list.php?act=danhsach&loai=matna" style="color:#6e6e6e;">➢Cửa hàng mặt nạ</a><br/>
<a href="/avatar/list.php?act=danhsach&loai=docamtay" style="color:#6e6e6e;">➢Cửa hàng phụ kiện</a><br/>
<a href="/avatar/list.php?act=danhsach&loai=thucung" style="color:#6e6e6e;">➢Cửa hàng thú cưng</a><br/>
</div>
</div>
<div class="hoanganh_danhmuc_menu"><a id="hoanganh_ruongdo" style="color:#6e6e6e;">➮Rương đồ</a></div>
<div id="hoanganh_ruongdoan" style="display: none;">
<div class="hoanganh_danhmuc_menu2">
<a href="/ruong" style="color:#6e6e6e;">➢Rương đồ</a>
</div>
</div>
<div class="hoanganh_danhmuc_menu"><a href="/napthe" style="color:#6e6e6e;">➮Nạp thẻ 1STPay</a></div>

<div class="hoanganh_danhmuc_menu"><a href="/avatar/chotroi.php?act=danhsach" style="color:#6e6e6e;">➢Chợ trời</a></div>


<div class="hoanganh_danhmuc_menu"><a id="hoanganh_kvc" style="color:#6e6e6e;">➮Khu vui chơi</a></div>
<div id="hoanganh_kvcan" style="display: none;">
<div class="hoanganh_danhmuc_menu2">
<a href="/shop/quayso.php" style="color:#6e6e6e;">➢Quay số</a><br/>
<a href="/avatar/nangcap.php?act=index" style="color:#6e6e6e;">➢Nâng cấp </a><br/>

<a href="/congvien/code.php" style="color:#6e6e6e;">➢Mã quà tặng</a>
</div>
</div>
<div class="hoanganh_danhmuc_menu"><a href="/khusinhthai" style="color:#6e6e6e;">➮Khu sinh thái</a></div>
<div class="hoanganh_danhmuc_menu"><a href="/farm/?xem" style="color:#6e6e6e;">➮Nông trại</a></div>
<div class="hoanganh_danhmuc_menu"><a href="/mod/bxh.php" style="color:#6e6e6e;">➮Bảng xếp hạng</a></div>
<div class="hoanganh_danhmuc_menu"><a href="/congvien/khucogiao/tienganh.php" style="color:#6e6e6e;">➮Khu tiếng anh</a></div>
<div class="hoanganh_danhmuc_menu"><a href="/upanh/" style="color:#6e6e6e;">➮Tải ảnh</a></div>

<?php
$new_sys_mail = mysql_result(mysql_query("SELECT COUNT(*) FROM `thongbao` WHERE `ok` = '1' and `user` = '" . $user_id . "'"), 0);

echo'<div class="hoanganh_danhmuc_menu"><a href="/mail" style="color:#6e6e6e;">➮Tin nhắn</a> <span style="border-radius:2px;background-color:#ff1234;color:#fff;">' . $new_mail . ' </span></div>';
echo'<div class="hoanganh_danhmuc_menu"><a href="/thongbao.html" style="color:#6e6e6e;">➮Thông báo</a> <span style="border-radius:2px;background-color:#ff1234;color:#fff;">' . $new_sys_mail . '</span></div>';

?>
<div class="hoanganh_danhmuc_menu"><a href="javascript:void(0)" onclick="hoanganhtatclick()" style="color:#3883CC;">➢Quay lại!</a></div></div></div>

<script>
function hoanganhopenclick() { document.getElementById("hoanganhclick").style.display = "block";
}
function hoanganhtatclick(){  document.getElementById("hoanganhclick").style.display = "none";
}
</script>
<script type="text/javascript"> 
$('#hoanganh_ruongdo').click(function() {  
$('#hoanganh_ruongdoan').toggle('fast','linear');  
}); 
$('#hoanganh_chotroi').click(function() {  
$('#hoanganh_chotroian').toggle('fast','linear');  
}); 
$('#hoanganh_cuahang').click(function() {  
$('#hoanganh_cuahangan').toggle('fast','linear');  
}); 
$('#hoanganh_kvc').click(function() {  
$('#hoanganh_kvcan').toggle('fast','linear');  
}); 
</script>
<?php

$vatpham=mysql_num_rows(mysql_query("SELECT * FROM `shopvatpham`"));
$all=mysql_fetch_array(mysql_query("SELECT max(id) FROM `shopvatpham`"));  

$ix=1;
while ($ix<=$all['max(id)']) {
$vatpham_check_x=mysql_num_rows(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='".$ix."'"));
if ($vatpham_check_x<1) {
mysql_query("INSERT INTO `vatpham` SET `user_id`='".$user_id."', `id_shop`='".$ix."'");
}
$ix++;
}


$vatpham=mysql_num_rows(mysql_query("SELECT * FROM `shopkhung`"));
$all=mysql_fetch_array(mysql_query("SELECT max(id) FROM `shopkhung`"));  

$ix=1;
while ($ix<=$all['max(id)']) {
$vatpham_check_x=mysql_num_rows(mysql_query("SELECT * FROM `khokhung` WHERE `user_id`='".$user_id."' AND `id_shop`='".$ix."'"));
if ($vatpham_check_x<1) {
    
mysql_query("INSERT INTO `khokhung` SET `user_id`='".$user_id."', `id_shop`='".$ix."'");
mysql_query("UPDATE `khokhung` SET `soluong`='1' WHERE `user_id`='".$user_id."' AND `id_shop`='1'");
}
$ix++;
}




	?>




<script>
<!--
document.write(unescape("%3Cstyle%3E.ducnghia_item%20%7B%0Abackground%3Aurl%28/lethinh/item.png%29%3B%0A%20width%3A48px%3B%20height%3A48px%3B%20display%3A%20inline-block%3B%20text-align%3Acenter%3B%20position%3Arelative%3B%20z-index%3A%2050%3B%0A%20background-repeat%3A%20no-repeat%3B%0A%7D%3C/style%3E"));
//-->
</script>