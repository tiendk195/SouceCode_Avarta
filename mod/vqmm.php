<?PHP
Define('_IN_JOHNCMS', 1);
Require('../incfiles/core.php');
$headmod = 'Games';
$textl = 'Vòng xoay may mắn';
Require('../incfiles/head.php');
IF(!$user_id){
Header('Location: /');
Exit;
}
Echo'<div class="phdr">Vòng xoay may mắn</div>';
$i=mysql_fetch_assoc(mysql_query("SELECT `time` FROM `vxmm` WHERE `stt`='1'"));
$t=$i['time'];
IF(Empty($t)){
$tg=time()+300;
}Else{
$tg=$t;
}
$timevxmm=$tg-time();
$n=mysql_num_rows(mysql_query("SELECT * FROM `vxmm`"));
$stt=$n+1;
$cuoc=200000;
$allcuoc=(mysql_num_rows(mysql_query("SELECT * FROM `vxmm` WHERE `cuoc` = '".$cuoc."'"))*$cuoc);
IF(mysql_num_rows(mysql_query("SELECT * FROM `vxmm` WHERE `time`<'".time()."'")) > 0){
$o=mysql_num_rows(mysql_query("SELECT * FROM `vxmm`"));
$idvx=rand(1,$o);
$m=mysql_fetch_assoc(mysql_query("SELECT `user_id` FROM `vxmm` WHERE `stt`='".$idvx."'"));
$n=$m[user_id];
$idvxmm=$n;
mysql_query("UPDATE `users` SET `xu`=`xu`+'".$allcuoc."' WHERE `id`='".$idvxmm."'");
$z=mysql_fetch_assoc(mysql_query("SELECT `name` FROM `users` WHERE `id`='".$idvxmm."'"));
$bot='[b][red][blue]'.$z[name].'[/blue] vừa tham gia Vòng xoay may mắn và thắng [blue]'.$allcuoc.'[/blue] xu ![/red][/b]';
mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
mysql_query("INSERT INTO `wnew` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
//mysql_query("DELETE FROM `vxmm`");
}
IF(mysql_num_rows(mysql_query("SELECT * FROM `vxmm` WHERE `user_id` = '".$user_id."'")) < 1){
IF(Isset($_POST['submit'])){
IF($datauser['xu'] < $cuoc){
Echo'<div class="omenu"><b><font color="red">Lỗi!!</b></font> Bạn không đủ tiền để đặt cược</div>';
}Else{
	$bot='@'.$user_id.' vừa tham gia Vòng xoay may mắn, tham gia ngay [url='.$home.'/mod/vongquaymayman.html]tại đây[/url]';
mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
mysql_query("UPDATE `users` SET `xu`=`xu`-'".$cuoc."' WHERE `id`='".$user_id."'");
mysql_query("INSERT INTO `vxmm` SET `user_id` = '".$user_id."', `cuoc` = '".$cuoc."', `stt` = '".$stt."', `time`='".$tg."'");
Header('Location: ?done');
}
}
Echo'<div class="omenu"><font color="red"><b><center>Tham gia bạn sẽ mất '.number_format($cuoc).' xu.</font></b><br><b><font color="green">Thắng sẽ nhận được toàn bộ số tiền của Vòng xoay may mắn</b></font><br><form method="post"><input type="submit" name="submit" value="Tham gia ngay"></form></center></div>';
}Else{
Echo'<div class="omenu"><font color="red"><b><center>Hiện tại Vòng xoay may mắn đang có tất cả '.number_format($allcuoc).' xu.</font></b><br><b><font color="green">Bạn đã đặt '.number_format($cuoc).' xu. Vui lòng chờ '.$timevxmm.' giây nữa !</b></font><br><form method="post"><input type="submit" name="submit" value="Tải lại trang"></form></center></div>';
}


Require('../incfiles/end.php');
?>