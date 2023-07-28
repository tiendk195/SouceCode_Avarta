<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl = 'Bãi Đất Trống';
require('../incfiles/head.php');

echo "<script>
var loadcontent = '<div class=menu>Đang tải map <img src=https://i.imgur.com/VKAdQvl.gif></div>';
$(document).ready(function(){
$('#datamap').html(loadcontent);
$('#datamap').load('baidatrong-load.php');
var refreshId=setInterval(function(){
$('#datamap').load('baidatrong-load.php');
$('#datamap').slideDown('slow');
},7000);
$('#shoutbox').validate({
debug:false,
submitHandler:function(form){
$.post('baidatrong-load.php',
$('#shoutbox').serialize(),
function(chatoutput){
$('#datamap').html(chatoutput);
});
$('#msg').val('');
}
});
});
</script>";
echo'<div class="main-xmenu">';
echo'<div class="phdr"><center>Khu Bãi Đất Trống</center></div>';
date_default_timezone_set('Asia/Ho_Chi_Minh');
if (!$user_id){
echo'<div class="menu">Bạn phải đăng nhập để chơi game này nhé !</div>';
echo'</div>';
require('../incfiles/end.php');
exit;
}
if ($datauser['kichhoat'] == 0){
echo'<div class="menu">Bạn phải kích hoạt để chơi game này nhé !</div>';
echo'</div>';
require('../incfiles/end.php');
exit;
}

mysql_query("UPDATE `users` SET `vitri`='559' WHERE `id`='{$user_id}'");

if (isset($_GET['hoiphuc'])) {
if($datauser['luong'] < 50){
echo"<script>alert('Bạn không đủ 100 lượng');</script>";
} else {
echo"<script>alert('Hồi HP thành công!');</script>";
mysql_query("UPDATE `users` SET `luong`=`luong`-50,`hp`=`hpfull`+0,`tgonline` = '".time()."'  WHERE `id` = '$user_id' LIMIT 1");
}
}

if (isset($_GET['danh'])) {
$id = isset($_GET['user']) ? (string)(int)$_GET['user'] : false;
$n = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$id."'"));
$dame = CEIL($datauser[sucmanh]/16);
if($n == 0 || $n['id'] == $user_id || $n['vitri'] != 559){
Header('location: ?');
exit;
}
if($datauser['xu'] <= 0){
echo"<script>alert('Đối thủ đã hết xu');</script>";
exit;
}

if($datauser['hp'] <= 0){
echo"<script>alert('Bạn đã hết máu mà đòi đánh :v');</script>";
} else if($n['hp'] <= 0){
echo"<script>alert('".$n['name']." đã hết máu');</script>";

} else if($dame > $n['hp']){

if($n['xu'] > 10000000){
$xu = rand(1000000,10000000);
}
if($n['xu'] > 100000000){
$xu = rand(5000000,100000000);
}

if($n['xu'] > 1000000000){
$xu = rand(10000000,500000000);
}

if($n['xu'] < 10000000){
$xu = 0;
}
$time = time()+120;
echo"<script>alert('Bạn đã giết chết ".$n['name']." và nhận được ".number_format($xu)."xu');</script>";

mysql_query("UPDATE `users` SET `xu`=`xu`+'{$xu}' WHERE `id`='".$user_id."'");

$text = ''.$datauser['name'].' vừa giết chết '.$n['name'].' và nhận được '.number_format($xu).'xu';


mysql_query("UPDATE `tb_dt` SET `text`='{$text}',`time`='".$time."' WHERE `id`='1'");
mysql_query("UPDATE `users` SET `xu`=`xu`-'{$xu}',`timepem`='".$time."',`user_pem`='".$user_id."',`hp`=`hp`-'".$dame."',`mat`='100' WHERE `id`='".$n['id']."'");
$text = '<b><a href="/member/'.$user_id.'.html"/>'.nick($user_id).'</a> </b> vừa đánh chết bạn tại khu đất trống khiến bạn mất '.number_format($xu).' xu';
mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$n['id']."',
                `user` = '".$n['id']."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
$text = ''.$login.' vừa đánh chết '.$n['name'].' tại bãi đất trống và nhận được '.$xu.'xu';
mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");

$ii = mysql_fetch_array(mysql_query("SELECT * FROM `nhiemvu` WHERE `user_id`='".$user_id."'"));
if($ii['capdo'] == 10){
mysql_query("UPDATE `nhiemvu` SET `nv11`=`nv11`+1 WHERE `user_id` = '".$user_id."'");
}

} else {
echo'<div class="rmenu"><center><b>'.nick($n['id']).'<font color="red">-'.number_format($dame).'hp</font></b></center></div>';

mysql_query("UPDATE `users` SET `timepem`='".$time."',`user_pem`='".$user_id."',`hp`=`hp`-'".$dame."',`mat`='100'  WHERE `id`='".$n['id']."'");
$text = '<b><a href="/member/'.$user_id.'.html"/>'.nick($user_id).'</a> </b> vừa đánh bạn tại khu đất trống khiến bạn mất '.number_format($dame).' hp';
mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$n['id']."',
                `user` = '".$n['id']."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
}
}


echo'<span id="datamap"></span>';
echo'</div>';

require('../incfiles/end.php');
?>
<style type="text/css"> 
.nencay{background:url(https://i.imgur.com/s9WE9wX.png) repeat-x;height:96px;width:100%;max-width:900px;width:100%}
.buico{background:url(/giaodien/images/buico.png) repeat-x;margin-bottom:4px;height:24px}
</style>