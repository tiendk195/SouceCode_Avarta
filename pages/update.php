<?php


$timeup = time()+5000;
$time = time();
$time2 = date('Hi');
if($time2 == 600 or $time2 == 700 or $time2 == 800 or $time2 == 900 or $time2 == 1000 or $time2 == 1100 or $time2 == 1200 or $time2 == 1300 or $time2 == 1400 or $time2 == 1500 or $time2 == 1600 or $time2 == 1700 or $time2 == 1800 or $time2 == 1900 or $time2 == 2000 or $time2 == 2100 or $time2 == 2200 or $time2 == 2300){
mysql_query("UPDATE `users` SET `topboss` = '0' WHERE `topboss_time` < '".$time."'");
mysql_query("UPDATE `users` SET `topsm` = '0' WHERE `topsm_time` < '".$time."'");
mysql_query("UPDATE `users` SET `daigia` = '0' WHERE `daigia_time` < '".$time."'");
mysql_query("UPDATE `users` SET `topcauca` = '0' WHERE `topcauca_time` < '".$time."'");
mysql_query("UPDATE `users` SET `denhat` = '0' WHERE `denhat_time` < '".$time."'");
$req1 = mysql_query("SELECT * FROM `users`  WHERE `wboss` >= '1' and `rights` != '10' ORDER BY `wboss` DESC LIMIT 3");
$i = 1;
while ($res1=mysql_fetch_array($req1)) {
mysql_query("UPDATE `users` SET `topboss` = '1',`topboss_time`='".$timeup."' WHERE `id` = '".$res1['id']."'");
++$i;
}
$req2 = mysql_query("SELECT * FROM `users`  WHERE `bossclan` >= '1' and `rights` != '10' ORDER BY `bossclan` DESC LIMIT 3");
$i = 1;
while ($res2=mysql_fetch_array($req2)) {

mysql_query("UPDATE `users` SET `topboss` = '1',`topboss_time`='".$timeup."' WHERE `id` = '".$res2['id']."'");
++$i;
}

$req3 = mysql_query("SELECT * FROM `users`  WHERE `xu` >= '1' and `rights` != '10' ORDER BY `xu` DESC LIMIT 3");
$i = 1;
while ($res3=mysql_fetch_array($req3)) {
mysql_query("UPDATE `users` SET `daigia` = '1',`daigia_time`='".$timeup."' WHERE `id` = '".$res3['id']."'");
++$i;
}

$req4 = mysql_query("SELECT * FROM `users`  WHERE `sucmanh` >= '1' and `rights` !=  '10' and `id` != '1234' ORDER BY `sucmanh` DESC LIMIT 3");
$i = 1;
while ($res4=mysql_fetch_array($req4)) {

mysql_query("UPDATE `users` SET `topsm` = '1',`topsm_time`='".$timeup."' WHERE `id` = '".$res4['id']."'");
++$i;
}

$req5 = mysql_query("SELECT * FROM `users`  WHERE `luong` >= '1' and `rights` !=  '10' ORDER BY `luong` DESC LIMIT 3");
$i = 1;
while ($res5=mysql_fetch_array($req5)) {
mysql_query("UPDATE `users` SET `daigia` = '1',`daigia_time`='".$timeup."' WHERE `id` = '".$res5['id']."'");
++$i;
}

$req6 = mysql_query("SELECT * FROM `users`  WHERE `soca` >= '1' and `rights` !=  '10' ORDER BY `soca` DESC LIMIT 2");
$i = 1;
while ($res6=mysql_fetch_array($req6)) {
mysql_query("UPDATE `users` SET `topcauca` = '1',`topcauca_time`='".$timeup."' WHERE `id` = '".$res6['id']."'");
++$i;
}

$req7 = mysql_query("SELECT * FROM `users`  WHERE `bxhdhvt` >= '1' and `rights` !=  '10' ORDER BY `bxhdhvt` DESC LIMIT 1");
$i = 1;
while ($res7=mysql_fetch_array($req7)) {
mysql_query("UPDATE `users` SET `denhat` = '1',`denhat_time`='".$timeup."' WHERE `id` = '".$res7['id']."'");
++$i;
}



}

$time = time() + 21600;
if($datauser['timeraohang'] < time()){
mysql_query("UPDATE `users` SET `lanraohang`='10',`timeraohang`='{$time}' WHERE `id`='".$user_id."'");
}
if($datauser['hp'] < 0){
mysql_query("UPDATE `users` SET `hp`='0' WHERE `id` = '".$user_id."'");
}
?>