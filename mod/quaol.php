<?PHP
Define('_IN_JOHNCMS', 1);
Require('../incfiles/core.php');
$headmod = 'Tiện ích';
$textl = 'Quà online';
Require('../incfiles/head.php');
IF(!$user_id){
Header("Location: /");
Exit;
}
$Time=$datauser['sestime'];
$i=intval((time()-$Time)/60+1);
Echo'<div class="phdr">BẠN ĐANG ONLINE ĐƯỢC <b>'.$i.'</b> PHÚT</div>';
if($i>=15){
$exp=2000;

$x=44444;
$l=5;
$q=10;
}
if($i>=30){
$exp=5000;

$x=111111;
$l=10;
$q=15;
}
if($i>=45){
$exp=7000;

$x=155555;
$l=15;
$q=20;
}
if($i>=60){
$exp=10000;

$x=222222;
$l=20;
$q=25;
}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `".($act=='guest' ? 'cms_guests':'users')."` WHERE `lastdate`>'".(time() - 300)."'"), 0);
$sl=1;
IF($total<$sl){
Echo'<div class="omenu"><center><b><font color="red">RẤT TIẾC HIỆN TẠI ĐANG CÓ '.$total.' NGƯỜI ĐANG TRỰC TUYẾN<br>ĐỦ '.$sl.' NGƯỜI HỢP SỨC MỚI CÓ THỂ MỞ HỘP QUÀ NÀY ĐƯỢC</font></b></center></div>'; 
}Else IF($i<15){
Echo'<div class="omenu"><center><b><font color="red">BẠN CHƯA ONLINE ĐỦ 15 PHÚT XIN VUI LÒNG QUAY LẠI SAU!<br>XIN CẢM ƠN</font></b></center></div>';
}Else IF($datauser['timequaonline']+900<=time()){
mysql_query("UPDATE `users` SET `exp` = `exp` + '".$exp."', `timequaonline` = '".time()."' WHERE `id` = '".$user_id."'");
mysql_query("UPDATE `users` SET `xu` = `xu` + '".$x."', `timequaonline` = '".time()."' WHERE `id` = '".$user_id."'");
mysql_query("UPDATE `users` SET `luong` = `luong` + '".$l."', `timequaonline` = '".time()."' WHERE `id` = '".$user_id."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$q."' WHERE `id_shop`='97' AND `user_id`='".$user_id."'");
mysql_query("UPDATE `users` SET `sestime` = '".time()."' WHERE `id` = '".$user_id."'");
$bot='[b][color=red]'.$login.' ĐÃ NHẬN ĐƯỢC '.$exp.' EXP, '.$x.' XU, '.$l.' LƯỢNG VÀ '.$q.' [img]'.$home.'/images/vatpham/97.png[/img] TẠI QUÀ TÍCH LŨY ONLINE[/color][/b]';
mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
Echo'<div class="omenu"><center><b><font color="red">BẠN ĐÃ NHẬN ĐƯỢC '.$exp.' kinh nghiệm, '.$x.' XU, '.$l.' LƯỢNG VÀ '.$q.' <img src="/images/vatpham/97.png"> TỪ QUÀ TÍCH LŨY ONLINE</font></b></center></div>';
}Else{
Echo'<div class="omenu"><center><b><font color="red">BẠN VUI LÒNG ĐỢI 15 PHÚT NỮA RỒI NHẬN TIẾP</font></b></center></div>';
}
Echo'<div class="phdr">TÍCH LŨY QUÀ ONLINE</div>';
Echo'<div class="omenu"><center><b><font color="red">TÍCH LŨY ONLINE 15 PHÚT NHẬN ĐƯỢC 2000 EXP, 44444 XU, 5 LƯỢNG VÀ 10 <img src="/images/vatpham/97.png"> </font></b></center></div>';
Echo'<div class="omenu"><center><b><font color="red">TÍCH LŨY ONLINE 30 PHÚT NHẬN ĐƯỢC  5000 EXP,  111111 XU, 10 LƯỢNG VÀ 15 <img src="/images/vatpham/97.png"></font></b></center></div>';
Echo'<div class="omenu"><center><b><font color="red">TÍCH LŨY ONLINE 45 PHÚT NHẬN ĐƯỢC  7000 EXP, 155555 XU, 15 LƯỢNG VÀ 20 <img src="/images/vatpham/97.png">  </font></b></center></div>';
Echo'<div class="omenu"><center><b><font color="red">TÍCH LŨY ONLINE 60 PHÚT NHẬN ĐƯỢC  10000 EXP, 222222 XU, 20 LƯỢNG VÀ 25 <img src="/images/vatpham/97.png">   </font></b></center></div>';
Require('../incfiles/end.php');