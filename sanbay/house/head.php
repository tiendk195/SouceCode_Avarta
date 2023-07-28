

<?php
///MOD Chống Viewsource Viết BY DucNghia
//include "ducnghia/viewsource.php";
//include "ducnghia/viewsource.php";
//include "ducnghia/viewsource.php";

//Kết thúc mod

session_start();

defined('_IN_JOHNCMS') or die('Error: restricted access');
$_SESSION['ducnghia_name'] = $datauser['name_lat'];
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
"\n" . '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">' .
"\n" . '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vn">' .
"\n" . '<head>' .
"\n" . '<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8"/>' .
"\n" . '<meta http-equiv="Content-Style-Type" content="text/css" />' .
"\n" . '<meta http-equiv="Content-Language" content="vi" />';

$a = mysql_query("SELECT * FROM `thongbao` WHERE `ok` = '1' and `user` = '" . $user_id . "'");
$c = mysql_num_rows($a);
if($c >=1 AND $user_id){
echo'' .
"\n" . '<title>['.$c.'] ' . $textl . '</title>';
}else{
echo'' .
"\n" . '<title>' . $textl . '</title>';
}
echo'' .
"\n" . '<meta name="description" content="'.mb_substr($mota, 0, 120).'" />' .
"\n" . '<meta name="keywords" content="mxh avatar, avatar cuibapv2, mteen.me, cuibapv2, mxh cuibapv2, game avatar online, avatar online, chơi avatar online, choi avatar online, diễn đàn avatar, avatar lậu, avatar lau, mxh avatar lậu, web game avatar, avatar trực tiếp, ducnghia, mạng xã hội avatar, wap avatar, avatar 2d, avatar mien phi, nang cap avatar, nâng cấp avatar, avatar up xu, avatar vip, avatar pro, avatar quay so, avatar quay số, avatar thu thuat, avatar thủ thuật"/>' .
"\n" . '
<meta name="author" content="DucNghia" />' .
"\n" . '<meta name="application-name" content="Mteen.Me" />' .
"\n" . '
<meta property="og:title" content="' . $textl . '" />' .
"\n" . '
<meta property="og:type" content="article" />' .
"\n" . '
<meta property="og:image" content="/ANHFB"/>' .
"\n" . '
<meta property="og:url" content="Mteen.Me" />' .
"\n" . '
<meta property="og:description" content="Web chơi game avatar trực tiếp không cần cài đặt tham gia ngay" />' .
"\n" . '<meta name="copyright" content="Copyright © 07/2018 DucNghiaVH" />' .
"\n" . '<meta name="language" content="Vietnamese" />' .
"\n" . '<meta name="title" content="' . $textl . '" />' .
"\n" . '<meta name="Googlebot" content="all" />' .
"\n" . '<link rel="canonical" href="http://' . $_SERVER['HTTP_HOST'] . ''.$_SERVER['REQUEST_URI'].'" />' .
"\n" . '
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>


';
if($datauser['giaodien']){
echo'<link rel="stylesheet" href="/giaodien/ducnghiaz.css" type="text/css" />
';
echo'<link rel="stylesheet" href="/giaodien/hien.css" type="text/css" />
';


} else {echo'<link rel="stylesheet" href="/giaodien/ducnghiaz.css" type="text/css" />
';
}
if($datauser['hieu_ung_css']){
echo'<script type="text/javascript" src="/js/tuyetroi.js"></script>';
}
echo'<link rel="shortcut icon" href="' . $set['homeurl'] . '/ducnghia.ico" type="icon" />' .
"\n" . '<link rel="alternate" type="application/rss+xml" title="RSS | Bài viết mới" href="' . $set['homeurl'] . '/rss/rss.php" />' .

"\n" . '</head>' . core::display_core_errors();
//--- Mod Chatbox v3 ---//
echo "


<script>
var loadad = '<audio id=audioplayer autoplay=true><source src=/mail/ping.mp3 type=audio/mpeg></audio>';
var loadcontent = '<div class=menu>Đang tải dữ liệu chat <img src=https://i.imgur.com/VKAdQvl.gif></div>';
var loadsubmit = ' <img src=https://i.imgur.com/VKAdQvl.gif>';
$(document).ready(function(){
$(\"textarea\").on(\"keydown\", function(event) {
    if (event.keyCode == 13)
        if (!event.shiftKey) $(\"#shoutbox\").submit();
});
$(\"#datachat\").html(loadcontent);
$(\"#datachat\").load(\"/chemgio.php\");
var refreshId = setInterval(function() {
$(\"#datachat\").load('/chemgio.php');
$(\"#datachat\").slideDown(\"slow\");
}, 3000);
$(\"#shoutbox\").validate({
debug: false,
submitHandler: function(form) {
$('#loader').fadeIn(400).html(loadsubmit);
$('#audio').fadeIn(400).html(loadad);
$.post('/chemgio.php', $(\"#shoutbox\").serialize(),function(chatoutput) { 
$(\"#datachat\").html(chatoutput);
$('#loader').hide();
});
$(\"#msg\").val(\"\");
}
});
});




</script>";
?> 
<style>

</style>
<?php
if (isset($_COOKIE['the']))
{
$the = $_COOKIE['the'];
}
elseif (!$is_mobile)
{
$the = 'web';
} else {
$the = 'wap';
}
if ($the == 'web')
{
echo'
<style>
body {
  background: #f3f3f3 url(/ducnghia/ducnghia.png) repeat;
  margin: 0;
  padding: 0;
} </style>';
}
if ($the == 'wap')
{
echo'<body>';
}
?>
<!----CODE VIẾT BY DUCNGHIA - SN 2004---->
  <?php
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
echo'<div class="body_body">';
echo'<div class="left_top"></div><div class="bg_top"><div class="right_top"></div></div>';
echo'<div class="body-content">';
echo'<div class="a" align="center">';
echo'<br><a href="/index.php"><img src="/ducnghia.png" width="190" height="49"/></a>';
echo'</div>';
echo'<div class="link-more">';
echo'<div class="h">';
if ($user_id) {
echo'<table width="100%" border="0" cellspacing="0"><tr class="menu">';
echo'</td><td width="25%">';
echo'<a href="' . $set['homeurl'] .'/mod">Chức Năng</a>';
echo'</td>
<td width="25%">';
$a = mysql_query("SELECT * FROM `thongbao` WHERE `ok` = '1' and `user` = '" . $user_id . "'");
$c = mysql_num_rows($a);
echo'<a href="' . $set['homeurl'] . '/thongbao.html">Thông Báo';
if($c >=1){
echo ' <span class="label label-success">'.$c.'</span>';
}
echo'</a>';
echo'</td><td width="25%"">';
$new_mail = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_mail` LEFT JOIN `cms_contact` ON `cms_mail`.`user_id`=`cms_contact`.`from_id` AND `cms_contact`.`user_id`='$user_id' WHERE `cms_mail`.`from_id`='$user_id' AND `cms_mail`.`sys`='0' AND `cms_mail`.`read`<='1' AND `cms_mail`.`delete`!='$user_id' AND `cms_contact`.`ban`!='1' AND `cms_mail`.`spam`='0'"), 0);
echo'<a href="' . $set['homeurl'] . '/mail/new.html">Hộp Thư';
if ($new_mail) $list[] = ' <span class="label label-success">' . $new_mail . ' </span>';
if (!empty($list)) echo '' . functions::display_menu($list, ', ') . '';
echo'</a>';
echo'</td></tr></table>';
echo'<div class="body">';
}
/////
include "ducnghia_.php";



if ($user_id) {
echo'<div id="box_login_ads">';


if($datauser['viewthongbao'] <= 5){
mysql_query("UPDATE `users` SET  `viewthongbao`=`viewthongbao` +1 WHERE `id`='".$user_id."'");
$mp = new mainpage();
if ($mp->news){
echo $mp->news;
}
}
$olabytom = mysql_fetch_array(mysql_query("SELECT * FROM `wnew` ORDER BY `id` DESC LIMIT 1"));
$tinhtimeht = time() - $olabytom['time'];
if($tinhtimeht <= 200){
$idchat = $olabytom['user'];
$nick = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$idchat."'"));
echo '<div class="tmn">';
echo'<marquee behavior="scroll" scrollamount="9"><font>Tin nhắn từ <b>'.$nick['name'].'</b>: ' . bbcode::tags(functions::smileys($olabytom['text'])) . '</font></marquee></div>';
}

?>




















<div class="tmn"><table cellpadding="0" cellspacing="0" width="100%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tbody><tr><td align="center" width="125"> <center><a href="/member/<?=$user_id?>.html"><label style="display: inline-block;text-align: center;"><b style="font-size: 9px;font-weight:bold;text-align: center;">   <font  color="#110000"><?=$datauser['name']?></a></font>  </span></b><br><a id="ducnghia_chucnang"><span id="ducnghia_nhanvat"></span></a></label></center></td>
 <td style="color:brown;font-size:11px;" class="data-user-left">
<div style="margin:3px;">
<span id="ducnghia_thongtin"></span></div>
</td>


<td style="color:brown;font-size:11px;" valign="top">
    
<div style="margin:3px;"><font color="#006666"><i class="fa fa-archive" style="font-size:11px"></i> </font><div class="ducnghia_trai"><a href="/ruong"> <font color="#393698">Rương</font></a><span class="ducnghia_trai_hien">Nơi chứa những món đồ của bạn</span></div></div><div style="margin:3px;"><font color="#336600"><i class="fa fa-user" style="font-size:12px"></i> </font> <a href="/users/profile.php"> <font color="#393698">Cá nhân</font> </a></div>
<div style="margin:3px;"><font color="#336600">
    <i class="glyphicon glyphicon-home" style="font-size:11px"></i> </font> <a href="/sanbay/dancu/house.php"> <font color="#393698">Nhà</font> </a></div>
<div style="margin:3px;"><font color="#006600"><i class="fa fa-sign-out" style="font-size:12px"></i> </font> <a href="/exit.php"><font color="#006600"> Thoát</font> </a></div></td></tr></tbody></table></div> 
<!--PHẦN NÀY VIẾT CHỨC NĂNG BY ĐỨC NGHĨA - SINH NĂM 2004-->

 <div id="ducnghia_chucnang_hienthi" style="display: none;">
<center> <?php
   if ($datauser['hopthe'] <= 0 AND $datauser['detu'] != 0) { ?>
    <div class="ducnghia_hopthe">	
<input class="nut" type="submit" name="hopthe" id="ducnghiadz_hopthe" value="Hợp  Thể"></div>
<div class="ducnghia_bongtai">	
<input class="nut" type="submit" name="bongtai" id="ducnghiadz_bongtai" value="Bông Tai"></div> <?php } ?>
  <?php if ($datauser['hopthe'] == 2or$datauser['hopthe'] == 4) { ?>
  <div class="ducnghia_tach">	
<input class="nut" type="submit" name="tach" id="ducnghiadz_tach" value="Tách Hợp Thể"></div> <?php } $ducnghia_soluong = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='{$user_id}' AND `id_shop` = '53'"));
$ducnghia_bohuyet = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='{$user_id}' AND `id_shop` = '54'"));
$sl = $ducnghia_soluong ; ?>

<?php if ($sl !=0 AND $datauser['cn'] <= 0) {
echo'<div class="ducnghia_cuongno">	
<input class="nut" type="submit" name="cuongno" id="ducnghiadz_cuongno" value="Cuồng NỘ"></div>';

} ?>

<?php if ($ducnghia_bohuyet['soluong'] !=0 AND $datauser['bh'] <= 0) {
echo'<div class="ducnghia_bohuyet">	
<input class="nut" type="submit" name="bohuyet" id="ducnghiadz_bohuyet" value="Bổ Huyết"></div>';

} 
?> </center>


</div> 

<div id="ducnghia_hopthe"></div>
<div id="ducnghia_item"></div>
<?php
include "tt.php";
include "ducnghia/ducnghia.php";

$ktdg = mysql_result(mysql_query("SELECT COUNT(*) FROM `daugia` WHERE `ok` = '1'"),0);
if($ktdg){
echo'<div class="pmenu"><center><b><a href="/shop/daugia">Đang có <font color="red">'.$ktdg.'</font> vật phẩm đấu giá tham gia ngay</a></b></div>';
}
if ($datauser['kichhoat'] != 1) {
	echo '<div class="pmenu"><center><b> Tài Khoản của bạn chưa kích hoạt nên sẽ bị hạn chế nhiều chức năng ! ấn vào > <a href="/users/checkpoint.php">Đây</a> < để kích hoạt<br/>( Không Mất Phí)</b></div>';
}
if (time()>$datauser['timehopqua']+3600*24) {
echo '<div class="pmenu"><center><img src="/images/qua.png" alt="Nhận quà"> <a href="/index.php?hopqua"><b>Bạn nhận được hộp quà tự hệ thống</b></a>';
if (isset($_GET['hopqua'])) {
$randxu = rand(1000,5000);
$luong = rand(1,5);
$exp = rand(100,500);
mysql_query("UPDATE `users` SET `xu` = `xu` + '".$randxu."', `sucmanh` = `sucmanh` + '".$sm."',`hpfull` = `hpfull` + '".$hp."',`luong`=`luong`+{$luong},`online`=`online`+'".$exp."',`timehopqua` = '".time()."' WHERE `id` = '".$user_id."'");
echo '<br/><b>Bạn nhận được <font color="red">'.$randxu.' xu, '.$luong.' lượng, '.$exp.' exp</font> từ hộp quà</b>';
}
echo '</center></div>';
}
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
if(isset($_POST)&&$textl!='PKoolVN'){
foreach($_POST as $index => $value){
if(is_string($_POST[$index]))
$_POST[$index]=functions::checkout($_POST[$index]);
}
}


$count=mysql_num_rows(mysql_query("SELECT * FROM `shopvatpham`"));
$i=1;
while ($i<=60) {
$check=mysql_num_rows(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='".$i."'"));
if ($check<1) {
mysql_query("INSERT INTO `vatpham` SET `user_id`='".$user_id."', `id_shop`='".$i."'");
}
$i++;
}
?>

<script type="application/javascript">
   	var ducnghiaVH = null;
	    function init(){
               ducnghiaVH = document.getElementById('ducnghia_my');
               ducnghiaVH.style.position= 'relative'; 
               ducnghiaVH.style.left = '3px'; 
			   ducnghiaVH.style.top = '0px';				
            } function ducnghia_trai(){
               ducnghiaVH.style.left =  parseInt(ducnghiaVH.style.left) - 10 + 'px';
               
               
                
            }
               
		  function ducnghia_phai(){
               ducnghiaVH.style.left = parseInt(ducnghiaVH.style.left) + 10 + 'px'; } 
		  function ducnghia_len(){
               ducnghiaVH.style.top = parseInt(ducnghiaVH.style.top) - 10 + 'px';
            }
		  function ducnghia_xuong(){
               ducnghiaVH.style.top = parseInt(ducnghiaVH.style.top) + 10 + 'px';
            }
            
            
            
            
	 
		
           
            
	   window.onload =init;
	   
	 
	   
	   
	   </script>
	   
	   
	    <style>.ducnghia_DZ {font-size: 12px;background-color: #3688c7;border: #e5e5e5 1px solid;color: #red;width: auto;height: 25px;}</style>

<style>
               
                 
                 .ducnghia_vc {font-size: 12px;background-color: #3688c7;border: #e5e5e5 1px solid;color: #red;width: auto;height: 25px;}</style>

