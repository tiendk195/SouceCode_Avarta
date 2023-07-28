<?php
/////---Mod by pkoolvn---/////
////------không xóa---------////
error_reporting(0);
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
$textl = 'Thông Ass';
require('../incfiles/head.php');
if (!$user_id) {
Header('location: /dangnhap.html');
exit;
} 
;

$id = (int)$_GET['id'];
$check = mysql_result(mysql_query("select count(*) from users where id = '".$id."'"),0);
$tk = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE `id`='".$id."'"));
echo'<div class="phdr">Thông Ass <b>'.$tk['name'].'</b></div>';
if($check < 0){
echo'<div class="rmenu">Lỗi...i</div>';
require('../incfiles/end.php');
}
if($datauser['dauan'] < 1){
    echo'<div class="rmenu">Lỗi bạn không có dầu ăn.</div>';
}
if($id == $user_id){
    echo'<div class="rmenu">Lỗi không thể thủ dâm</div>';
}
if (time() > $datauser['timets'] + 3600*24 and $datauser['dauan'] >= 1 or $datauser['id'] == 3){
$rand=rand(1,10);
if($rand==1) $pkoolvn=' nhập viện vì trĩ :v';if($rand==2) $pkoolvn=' phụt cứt tứ tung :yao:';if($rand==3) $pkoolvn=' bục bím :v';if($rand==4) $pkoolvn=' bị viêm âm đạo siêu cấp :troll:';
if($rand>=5) $pkoolvn='bị HIV';
$text = '<b><a href="/member/'.$user_id.'.html"/>'.nick($user_id).'</a> </b> đã thông bạn khiến bạn <b>'.$pkoolvn.'</b> <a href="/panel/thongass.php?id='.$user_id.'"/><b>Thông Lại</b></a>';
mysql_query("INSERT INTO `thongbao` SET
                id = '".$id."',
                user = '".$id."',
                text = '$text',
                ok = '1',
                time = '"  .time(). "'
            ");
$bot='[b][blue]'.$login.'[/blue] vừa dùng dầu ăn để thông [blue] '.$tk['name'].'[/blue] khiến [blue] '.$tk['name'].'[/blue] [red]'.$pkoolvn.' [/red][/b]';
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
mysql_query("UPDATE `users` SET `dauan`= `dauan`-1 WHERE `id` = '".$user_id."'");
mysql_query("UPDATE `users` SET `timets` = " .time(). " WHERE `id` = '".$user_id."'");
    echo'<div class="rmenu"><b>Thông thành công</div>';

} else {
	echo '<div class="rmenu">Lỗi,bạn đã thông hôm nay rồi.</div>';
}
require('../incfiles/end.php');
?>