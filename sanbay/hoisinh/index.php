<?php
define('_IN_JOHNCMS', 1);
$rootpath='../../';
require_once('../../incfiles/core.php');
$textl = 'Nhà tôi';
$map = 'hoimau';
require('../../incfiles/head.php');

if(!$user_id){
echo '<div class="mainblok">
<div class="danhmuc"><b>Lỗi Truy Cập</b></div>';
echo '<div class="menu list-top">Vui lòng đăng nhập để sử dụng tính năng này!</div>';
echo '</div>';
require('../../incfiles/end.php');
exit;
}
mysql_query("UPDATE `users` SET `hp`=`hpfull` WHERE `id`='{$user_id}'");

echo'<link rel="stylesheet" href="game.css" type="text/css">';
echo '<div class="homeforum"><div class="icon-home"><div class="home">Nhà Kame</div></div></div><div class="phdr">Khu hồi sinh</div>';
echo '<div class="canhngocrong2" style="height:78px"><marquee behavior="scroll" direction="left" scrollamount="1" style="margin-top: 5px"><img src="/icon/iconxoan/dammaynho.png"></marquee><marquee behavior="scroll" direction="left" scrollamount="2" style="margin-top: 10px"><img src="/icon/iconxoan/dammaylon.png"></marquee></div>';
echo '<div class="canhngocrong3" style="height:78px;margin:-58px 0 0 0px"></div>';
echo '<div class="canhngocrong" style="height:100px;margin:-69px 0 0 0px"></div>';
echo '<div class="canhngocrong1" style="height:100px;margin:-27px 0 0 0px"><center><a href="/ruong"><img src="/icon/iconxoan/ruong.png" style="position:absolute;margin:90px 0 0 -80px"></a><a href="#"><img src="/icon/iconxoan/dauthan.png"></a><img src="/icon/iconxoan/darong.png"><a href="#"><img src="/icon/iconxoan/ruakame.png"></a></center></div>';
echo'<div class="canhngocrong5" style="height:27px"></div>';
echo'<div class="canhngocrong4" style="height:78px"></div>';
//--code này copy để hiện avatar by cRoSsOver--//
//update nơi đang online và tọa độ
mysql_query("UPDATE `vitri` SET `time`='".time()."',`online`='".$textl."',`toado`='".$toado."' WHERE `user_id`='".$user_id."'");
$time=time()-300;
//bắt đầu cho hiện avatar
$req=mysql_query("SELECT * FROM `vitri` WHERE `online`='".$textl."' AND `time`>'".$time."'");
$i=1;
echo '<div style="position:absolute;margin:-143px 0 0 0px">';
while($pr = mysql_fetch_array($req))
    {
$name=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$pr[user_id]."'"));
$flip=rand(1,2);
        echo '<a href="/member/'.$pr['user_id'].'.html"><label style="display: inline-block;text-align: center;"><img src="/avatar/'.$pr[user_id].'.png"></label></a>';
        $i++;
    }
    echo '</div>';
require('../../incfiles/end.php');
?>