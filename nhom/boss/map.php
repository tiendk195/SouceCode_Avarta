<?php
define('_IN_JOHNCMS', 1);
$textl = 'Khu Boss Clan';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time = time();
@mysql_query("DELETE FROM `nhom_boss` WHERE `time_open`<'".$time."'");
echo "<script>
var loadcontent = '<div class=menu>Đang tải map <img src=https://i.imgur.com/VKAdQvl.gif></div>';
$(document).ready(function(){
$('#datamap').html(loadcontent);
$('#datamap').load('map-load.php');
var refreshId=setInterval(function(){
$('#datamap').load('map-load.php');
$('#datamap').slideDown('slow');
},5000);
$('#post2').validate({
debug:false,
submitHandler:function(form){
$.post('map-load.php',
$('#post2').serialize(),
function(chatoutput){
$('#datamap').html(chatoutput);
});
$('#post').val('');
}
});
});
</script>";


echo'<div class="phdr">Khu Boss Clan</div>';

$gio = date("Hi");
$cl = mysql_fetch_array(mysql_query("SELECT * FROM `nhom_user` WHERE `user_id`='".$user_id."'"));
$kt = mysql_result(mysql_query("SELECT COUNT(*) FROM `nhom_boss` WHERE `nhom`='".$cl['id']."'"),0);

if($gio < 1900){
echo'<div class="omenu">Khu boss chỉ mở từ 19h => 22h hàng ngày! Vui lòng quay lại sau</div>';
} else if($gio > 2200){
echo'<div class="omenu">Khu boss chỉ mở từ 19h => 22h hàng ngày! Vui lòng quay lại sau</div>';
} 

if($kt <= 0){
echo'<div class="omenu">Clan của bạn chưa thuê khu nhé! Vui lòng đợi PC or PPC clan thuê khu</div>';
} else {
mysql_query("UPDATE `users` SET `vitri`='569' WHERE `id`='{$user_id}'");
echo'<span id="datamap"></span>';

echo'<center><div class="menu"><form name="post2" id="post2" method="post"><input type="submit" name="post" value="Đánh"></center>';


}


/*
echo'<marquee direction="up" scrollamount="8" loop="1">-5555555</marquee>';
*/


require_once ("../../incfiles/end.php");
?>


<style type="text/css"> 
.nencay{background:url(https://i.imgur.com/s9WE9wX.png) repeat-x;height:96px;width:100%;max-width:900px;width:100%}
.buico{background:url(/giaodien/images/buico.png) repeat-x;margin-bottom:4px;height:24px}
</style>