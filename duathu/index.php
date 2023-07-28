<?php
define('_IN_JOHNCMS', 1);
$noionline = 'khumayman';
require('../incfiles/core.php');
$textl = 'Khu Đua Thú';
require('../incfiles/head.php');
echo'<div class="phdr">Trường đua thú </div>';
date_default_timezone_set('Asia/Ho_Chi_Minh');
if (!$user_id){
echo'<div class="omenu">Bạn phải đăng nhập để chơi game này nhé !</div>';
echo'</div>';
require('../incfiles/end.php');
exit;
}
echo'
<style>.omenu
{background:none repeat scroll 0 0 #FFF;line-height:24px;border-left:1px solid #e9e9e9;border-right:1px solid #e9e9e9;border-bottom:1px solid #EBEBEB;padding:5px 7px;}</style>';
if(!isset($_POST['ketqua']))
{
echo'<div class="omenu"><font color="red"><b>Đặt 1 x3!!</b></font></div>';
echo'<div class="omenu"><form action="?Mastic" method="post">
<table cellpadding="0" cellspacing="0" width="100%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tbody><tr><td style="vertical-align: top;width:45px;"><img src="/duathu/1.gif" height="60" width="60" alt="*"></td><td><h3 style="font-size:12px"><input type="radio" name="thu" value="1"> Thánh nhím</h3><br>
<span class="post_mota">Bạn có biết tml Rammus trong LOL không? Con nó đây này <img width="20px" src="/images/smileys/user/Troll/troll.png" alt=""></span></td></tr></tbody></table></div>';
echo'<div class="omenu">
<table cellpadding="0" cellspacing="0" width="100%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tbody><tr><td style="vertical-align: top;width:45px;"><img src="/duathu/2.gif" height="60" width="60" alt="*"></td><td><h3 style="font-size:12px"><input type="radio" name="thu" value="2"> Rồng huyền thoại</h3><br>
<span class="post_mota">Sải cánh rất rộng, một sinh vật huyền thoại, ừ thì huyền thoại nhưng liệu bạn có tin được không <img width="20px" src="/images/smileys/user/Depdoc/yao.png" alt=""></span></td></tr></tbody></table></div>';
echo'<div class="omenu">
<table cellpadding="0" cellspacing="0" width="100%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tbody><tr><td style="vertical-align: top;width:45px;"><img src="/duathu/3.gif" height="60" width="60" alt="*"></td><td><h3 style="font-size:12px"><input type="radio" name="thu" value="3"> Rắn thợ săn</h3><br>
<span class="post_mota">WTF?! Nó đã ở đây... Sinh vật không chân duy nhất tham gia cuộc đua, hãy tin tưởng nó theo cách của bạn <img width="20px" src="/images/smileys/user/Depdoc/yao1.gif" alt=""></span></td></tr></tbody></table></div>';
echo'<div class="omenu">
<table cellpadding="0" cellspacing="0" width="100%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tbody><tr><td style="vertical-align: top;width:45px;"><img src="/duathu/4.gif" height="60" width="60" alt="*"></td><td><h3 style="font-size:12px"><input type="radio" name="thu" value="4"> Mini Totoro</h3><br>
<span class="post_mota">Các thím đã xem phim này rồi chứ <img src="/images/smileys/user/emotions/haha.gif" alt="">, nó chạy rất nhanh phải không nào? Nhưng totoro bé thế này thì không biết có làm nên trò trống gì không đây <img src="/images/smileys/user/emotions/lol.gif" alt=""></span></td></tr></tbody></table></div>';
echo'<div class="omenu">
<table cellpadding="0" cellspacing="0" width="100%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tbody><tr><td style="vertical-align: top;width:45px;"><img src="/duathu/5.gif" height="60" width="60" alt="*"></td><td><h3 style="font-size:12px"><input type="radio" name="thu" value="5"> Con bướm xinh</h3><br>
<span class="post_mota">Dành cho những người yêu thích "BƯỚM" <img src="/images/smileys/user/Troll/troll.png" width="20px" alt=""></span></td></tr></tbody></table></div>';
echo'<div class="omenu">
<table cellpadding="0" cellspacing="0" width="100%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tbody><tr><td style="vertical-align: top;width:45px;"><img src="/duathu/6.gif" height="60" width="60" alt="*"></td><td><h3 style="font-size:12px"><input type="radio" name="thu" value="6"> Người ngoài hành tinh</h3><br>
<span class="post_mota">Nhanh hay chậm? Hỏi nó mới biết <img src="/images/smileys/user/Depdoc/yao.png" width="20px" alt="">, người ta gọi đây là từ trên trời rơi xuống đây mà <img src="/images/smileys/simply/)).gif" alt=""></span></td></tr></tbody></table></div>';
echo'<div class="omenu">
<table cellpadding="0" cellspacing="0" width="100%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tbody><tr><td style="vertical-align: top;width:45px;"><img src="/duathu/7.gif" height="60" width="60" alt="*"></td><td><h3 style="font-size:12px"><input type="radio" name="thu" value="7"> Khủng long phun nửa</h3><br>
<span class="post_mota">Tùy vào liều lượng chén ớt của nó để đi tìm nguồn nước uống phù hợp <img src="/images/smileys/user/sports/best.gif" alt=""> <img src="/images/smileys/simply/)).gif" alt=""></span></td></tr></tbody></table></div>';
echo'<div class="phdr">Đặt cược</div><div class="omenu">Số tiền được đặt cược từ 100k - 50tr xu

<br/>
Số tiền đặt:<br/>
<input type="number" name="tien"><br/>
<input type="submit" name="ketqua" value="Đặt" class="nut">
</div></form>';
}
if(isset($_POST['ketqua']))
{
$tien = htmlspecialchars($_POST['tien']);
$thu = $_POST['thu'];
if($tien < 100000)
{
echo'<div class="omenu">Lỗi! số tiền bạn đặt không hợp lệ</div>';
require('../incfiles/end.php');
exit;
}
elseif($thu < 1 OR $thu > 7)
{
echo'<div class="omenu">Lỗi! Thú bạn đặt không phù hợp</div>';
}
if($tien > 100000000)
{
echo'<div class="omenu">Lỗi! số tiền bạn đặt quá cao</div>';
}
elseif($tien > $datauser['xu'])
{
echo'<div class="omenu">Bạn không đủ tiền để đặt cược</div>';
}
else
{
echo'
<style>
.kg {
    background: url("/duathu/kg.png");
    repeat-x;
    height: 120px;
}
.dd {
    background: url("/duathu/dd.png");
}
.buico {
background: url("/duathu/buico.png") repeat-x;
height: 24px;
}
</style><div class="kg"></div><div class="buico"></div><div class="dd">';
mysql_query("UPDATE `users` SET `xu` = `xu` - $tien ,`sonho`=`sonho`+$tien WHERE `id` = '$user_id'");
$rand = rand(1,7);
$nl = rand(1,5);
$dem = 0;
for( $i = 1 ; $i <= 7 ; $i++ )
{
$dem = $dem+1;
if($thu == $rand)
{
$money = $tien*3;
$at = 1;
if($dem == 1)
mysql_query("UPDATE `users` SET `xu` = `xu` + '".$money."' ,`sohen` =`sohen`+$tien WHERE `id` = '".$user_id."'");
$ii = mysql_fetch_array(mysql_query("SELECT * FROM `nhiemvu` WHERE `user_id`='".$user_id."'"));
if($ii['capdo2'] == 3){
mysql_query("UPDATE `nhiemvu` SET `nv04`=`nv04`+1 WHERE `user_id` = '".$user_id."'");
}



if($i == $thu)
$rand1 = 10;
else
$rand1 = rand(1,30);
}
elseif($thu != $rand)
{
if($i == $thu)
$rand1 = 2;
else
$rand1 = rand(1,10000);
}
echo'<marquee behavior="slide" direction="right" scrollamount="'.$rand1.'"><img src="'.$i.'.gif"/></marquee>';
}
echo'</div><div class="buico"></div>';
	$name2=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$user_id."'"));

if($at == 1) {
$loichuc = 'Xin chúc mừng! thú của bạn đã chiến thắng, bạn nhận được '.number_format($tien*3).'Xu';
$text4 = 'Chúc mừng bạn: @'.($name2['id']).' đã thắng cược đua thú, nhận được [b]'.number_format($tien*3).' Xu [/b] ';
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($text4) . "', `time`='".time()."'");
} else {
$loichuc = 'Xin chia buồn! Thú của bạn không thể chiến thắng trò chơi này!';
$text4 = 'Chia buồn bạn: @'.($name2['id']).' đã thua cược đua thú, thiệt hại [b]'.number_format($tien).' Xu [/b] ';
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($text4) . "', `time`='".time()."'");
}
echo'<div class="omenu"><font color="red">'.$loichuc.'</font><br/><a href="index.php"><font color="blue">Tiếp tục</font></a></div>';
}
}



require('../incfiles/end.php');
?>