<?php
error_reporting(0);
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
$textl = 'Hộp Quà May Mắn';
require('../incfiles/head.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');
$query5=mysql_query("SELECT * FROM `vatpham` WHERE `id_shop`='105' AND `user_id`='".$user_id."'");
$check5=mysql_num_rows($query5);
if ($check5<1) {
  mysql_query("INSERT INTO `vatpham` SET `soluong`='0',`user_id`='".$user_id."',`id_shop` = '105'");
}

if($times == 18){
@mysql_query("UPDATE users SET `qua` = '0'");
}

if ($datauser['qua'] >= 1) {
echo '<div class="dz">Bạn đã mở quà</div>';
require('../incfiles/end.php');
exit;
}

if (!$user_id) {
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}else{
$ktip = mysql_result(mysql_query("SELECT COUNT(`ip`) FROM `users` WHERE `ip`='" . core::$ip . "' and `lastdate` >'".(time()-300)."'"), 0);
echo '<div class="thinhdz"><div class="phdr"><b>Nhận Quà</b></div><div class="menu">';
$times = date("H");
if($times < 21){
echo '<center>Chưa đến giờ mở quà !<center>';
}elseif($times == 21){
if($datauser['qua'] >= 1){
echo '<center>Bạn đã mở quà !<center>';

} else
if($datauser['qua'] == 0){
$thuong = rand(300000,500000);
$thinh = rand(1,30);
$da= rand(1,2);
$hopqua15= rand(1,2);

///ngoc rong
   
    $randnr1=rand(1,3);
        $randnr2=rand(1,7);

    if ($randnr1==1){
       echo'<script>alert("Bạn nhận được ngọc rồng 6 sao");</script>';
     mysql_query("UPDATE `vatpham` SET `soluong`=`soluong` +'1' WHERE `user_id`='{$user_id}' AND `id_shop`='274'");
}
    if ($randnr2==1){
       echo'<script>alert("Bạn nhận được ngọc rồng 5 sao");</script>';
     mysql_query("UPDATE `vatpham` SET `soluong`=`soluong` +'1' WHERE `user_id`='{$user_id}' AND `id_shop`='273'");
}
//ngoc rong

  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$da."' WHERE `user_id`='".$user_id."' AND `id_shop` = '112'");
  //mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$hopqua15."' WHERE `user_id`='".$user_id."' AND `id_shop` = '105'");
@mysql_query("UPDATE users SET `dahongngoc`=`dahongngoc`+'".$da."',`xu` = `xu`+'".$thuong."' ,`luong` = `luong`+'".$thinh."', `nhanhhoavang`=`nhanhhoavang`+'10', `qua` = '1' WHERE `id` = '{$user_id}'");
$time = time();
$bot = ' @'.$user_id.' vừa mở hộp quà được thưởng '.$da.' đá hồng ngọc,  '.$da.'[img]'.$home.'/images/vatpham/112.png[/img] đá tinh anh,  10 [img]https://i.imgur.com/ifXCsww.png[/img] ,'.$thuong.'  xu và '.$thinh.'  lượng  xin chúc mừng :O';
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '2',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");
echo '<center>Bạn đã mở quà !<br>Chúc mừng bạn nhận được '.$da.' Đá hồng ngọc, '.$da.'<img src="/images/vatpham/112.png"> Đá tinh anh, 10 <img src="https://i.imgur.com/ifXCsww.png">, '.$thuong.' Xu và '.$thinh.' lượng. <center>';
} }

else{
echo '<center>Đã hết giờ mở quà !<center>';
}
echo '</div></div>';
}

require('../incfiles/end.php');
?>