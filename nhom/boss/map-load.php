<?php
$gio = date("Hi");
define('_IN_JOHNCMS', 1);
$rootpath='../../';
require('../../incfiles/core.php');

$time = time();
@mysql_query("DELETE FROM `nhom_boss` WHERE `time_open`<'".$time."'");
$cl = mysql_fetch_array(mysql_query("SELECT * FROM `nhom_user` WHERE `user_id`='".$user_id."'"));
$clan = mysql_fetch_array(mysql_query("SELECT * FROM `nhom` WHERE `id`='".$cl['id']."'"));
$p = mysql_fetch_array(mysql_query("SELECT * FROM `nhom_boss` WHERE `nhom`='".$cl['id']."'"));
$kt = mysql_result(mysql_query("SELECT COUNT(*) FROM `nhom_boss` WHERE `nhom`='".$cl['id']."'"),0);


mysql_query("UPDATE `users` SET `vitri`='569' WHERE `id`='".$user_id."'");
$chp = 5000000*7;
$dame = $datauser['sucmanh']/3;
$hp = $p['hpfull']/100;
$hp = $p['hp']/$hp;
$hp = CEIL($hp);


if($kt == 0){
echo'<div class="rmenu">Khu đã bị đóng do hết thời gian</div>';
} else {
////Auto Update Boss by pkoolvn////
$timem = time()+30;
if($p['die'] == 0){
if($p['time'] < time()){

mysql_query("UPDATE `nhom_boss` SET `hp`=`hp`+'".$chp."',`time`='".$timem."' WHERE `id`='".$p['id']."'");
}
}
echo '<div class="menu"><div class="nencay" style="min-height:140px"><marquee behavior="scroll" direction="left" scrollamount="9" style="margin-top: 5px"><img src="/img/may1.png"></marquee><marquee behavior="scroll" direction="left" scrollamount="10" style="margin-top: 10px"><img src="/img/may2.png"></marquee></div><div class="cola" style="min-height: 100px;margin:0"><div class="buico"></div>';
if($p['hp'] >= 1){
if($p['timechat'] < time()){
$timec = time()+55555;
$rand = rand(1,3);
mysql_query("UPDATE `nhom_boss` SET `timechat`='".$timec."' WHERE `id`='".$p['id']."'");
if($rand == 1){
echo'<div class="pmenu"><center><font color="red"><b>Boss: Nhào zo mấy con lợn ta chấp hết</font></center></b></center></div>';
} else if($rand == 2){
echo'<div class="pmenu"><center><font color="red"><b>Boss: Háhá ngươi tuổi gì về bú sữa mẹ đi</font></center></b></center></div>';
} else {
echo'<div class="pmenu"><center><font color="red"><b>Boss: Pem chán thế! Lại đây ta dạy cho vài chiêu nè</font></center></b></center></div>';
}
}
} else{
echo'<div class="pmenu"><center><font color="blue"><b>Boss: Cắc ngươi đợi đó ta sẽ trả thù >< </font></center></b></center></div>';
}
if (isset($_POST['post'])) {
if($datauser['hp'] <= 0){
echo'<div class="rmenu"><center>Bạn đã hết hp rồi mà đòi đánh cái gì trời</center></div>';
} else if($p['hp'] <= 0 || $p['die'] == 1){
echo'<div class="rmenu"><center>Boss đã die rồi tha cho nó đi bạn :v</center></div>';
} else if($dame >= $p['hp']){
$dns = rand(15,25);

mysql_query("UPDATE `nhom_boss` SET `hp`='0',`die`='1' WHERE `id` ='".$p['id']."'");

echo'<div class="rmenu"><center><font color="red"><b>Chúc mừng bạn đã giết chết boss và nhận được '.$dns.'</b></font> <img src="dns.png"></center></div>';
mysql_query("UPDATE `users` SET `bossclan`=`bossclan`+'1' WHERE `id`='".$user_id."'");
	                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'$dns' WHERE `user_id`='".$user_id."' AND `id_shop` = '123'");


$text = ''.$login.' vừa đánh chết boss clan và nhận được '.$dns.' đá ngũ sắc';
mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");

} else {

echo'<div class="omenu"><marquee direction="up" scrollamount="7" loop="1" style="text-align: center"><b><font color="red">-'.number_format($dame).'</font></b></marquee></div>';
mysql_query("UPDATE `nhom_boss` SET `hp`=`hp`-'".$dame."' WHERE `id` ='".$p['id']."'");

}
}

echo'<center><img src="1.gif"/>';
if($hp <= 0){
echo'<br><img src="/game/img/0.png">';
} else if($hp <= 15){
echo'<br><img src="/game/img/15.png">';
} else if($hp <= 45){
echo'<br><img src="/game/img/45.png">';
} else if($hp <= 60){
echo'<br><img src="/game/img/60.png">';
} else if($hp <= 80){
echo'<br><img src="/game/img/75.png">';
} else if($hp <= 100){
echo'<br><img src="/game/img/100.png">';
}else if($hp >= 101){
echo'<br><img src="/game/img/100.png">';
}
echo'</center>';
//-- Online Topic ---//
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `vitri` = '569' and `icon`='".$clan['icon']."'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '569' AND `icon`='".$clan['icon']."'");
$count = mysql_num_rows($q);
while ($arr = mysql_fetch_array($q)){
$trinhtrangvip = mysql_query("select `rights` from `users` where id='" . $arr['id'] . "'");
$trinhtrangviphonnua = mysql_fetch_array($trinhtrangvip);

if($arr['hp'] <= 0){
$u_on[]='<a href="../member/' . $arr['id'] . '.html"><img src="/pk/mod/kietsuc.png"></a>';
} else if($arr['id'] != $datauser['id']){
$u_on[]='<a href="/member/'.$arr['id'].'.html"><img src="/avatar/' . $arr['id'] . '.png"></a>';
}else{
	$u_on[]='<img src="/avatar/' . $arr['id'] . '.png">';
}
}
//Keet thuc topic
if ($online_u > 0){
echo implode(' ',$u_on).'';
}



echo'</div><div class="buico"></div></div>';


}



?>