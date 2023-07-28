<?php
$kh=mysql_query("SELECT * FROM `kethon` WHERE `nguoi_ay`='".$user_id."' AND `dongy`='0' ORDER BY `time` LIMIT 1");
while($kethon=mysql_fetch_array($kh)) {
$cc=mysql_fetch_array(mysql_query("SELECT * FROM  `users` WHERE `id`='".$kethon[user_id]."'"));
if (isset($_POST['dongy'])) {
if ($datauser['nguoiyeu']!=0) {
echo '<div class="rmenu">Bạn đã có người yêu!</div>';
} else if ($cc['nguoiyeu']!=0) {
echo '<div class="rmenu">Bạn đã đến chậm 1 bước... người ấy đã trờ thành hoa đã có chậu</div>';
} else {
if ($kethon['dongy']==0) {
}
//--set do by pkoolvn--//
$time = time() + 10 * 24 * 3600;
mysql_query("INSERT INTO `kho` SET
`idnick`='".$user_id."',
`loai`='ao',
`ten`='5003',
`imgd`='/images/ao/5003.png',`nick`='{$login}',`timesudung`='{$time}'");

mysql_query("INSERT INTO `kho` SET
`idnick`='".$user_id."',
`loai`='quan',
`ten`='5004',
`imgd`='/images/quan/5004.png',`nick`='{$login}',`timesudung`='{$time}'");

mysql_query("INSERT INTO `kho` SET
`idnick`='".$user_id."',
`loai`='non',
`ten`='54',
`imgd`='/images/non/54.png',`nick`='{$login}',`timesudung`='{$time}'");

mysql_query("INSERT INTO `kho` SET
`idnick`='".$user_id."',
`loai`='mat',
`ten`='8',
`imgd`='/images/mat/8.png',`nick`='{$login}',`timesudung`='{$time}'");

mysql_query("INSERT INTO `kho` SET
`idnick`='".$user_id."',
`loai`='docamtay',
`ten`='hoacuoi',
`imgd`='/images/docamtay/hoacuoi.png',`nick`='{$login}',`timesudung`='{$time}'");
mysql_query("UPDATE `users` SET `ao`='5003' WHERE `id`='".$user_id."'");

mysql_query("INSERT INTO `kho` SET
`idnick`='".$cc['id']."',
`loai`='quan',
`ten`='5002',
`imgd`='/images/quan/5002.png',`nick`='{$cc['name']}',`timesudung`='{$time}'");

mysql_query("INSERT INTO `kho` SET
`idnick`='".$cc['id']."',
`loai`='ao',
`ten`='15001',
`imgd`='/images/ao/15001.png',`nick`='{$cc['name']}',`timesudung`='{$time}'");

mysql_query("INSERT INTO `kho` SET
`idnick`='".$cc['id']."',
`loai`='mat',
`ten`='8',
`imgd`='/images/mat/8.png',`nick`='{$cc['name']}',`timesudung`='{$time}'");


mysql_query("UPDATE `users` SET `quan`='5004' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `users` SET `non`='52' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `users` SET `mat`='8' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `users` SET `docamtay`='hoacuoi' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `users` SET `mat`='8' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `users` SET `quan`='5002' WHERE `id`='".$cc['id']."'");
mysql_query("UPDATE `users` SET `ao`='15001' WHERE `id`='".$cc['id']."'");
mysql_query("UPDATE `users` SET `mat`='8' WHERE `id`='".$cc['id']."'");
//--end--//
$time = time();
mysql_query("UPDATE `kethon` SET `dongy`='1',`nhan`='1',`time`='{$time}' WHERE `id`='".$kethon[id]."'");
mysql_query("UPDATE `users` SET `nguoiyeu`='".$kethon[user_id]."' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `users` SET `nguoiyeu`='".$user_id."' WHERE `id`='".$kethon[user_id]."'");
$name = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$kethon['user_id']."'"));
$sm='@[red]'.($login).'[/red] [green]đã đồng ý kết hôn với[/green] [red]'.($name['name']).' [/red] [blue]chúc 2 bạn hạnh phích :D[/blue]';
mysql_query("insert into `guest` set `user_id`='256',`name`='Cha xứ',`text`='$sm',`time`='".time()."'");
}
}
if (isset($_POST['tuchoi'])) {
$name = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$kethon['user_id']."'"));
mysql_query("UPDATE `kethon` SET `dongy`='2' WHERE `id`='".$kethon[id]."'");
$sm='ha ha. Tin hot. '.($name['name']).' cầu hôn '.($login).' nhưng bị '.($login).' đá đít. Quê chưa. Hê hê';
mysql_query("insert into `guest` set `user_id`='256',`name`='Cha xứ',`text`='$sm',`time`='".time()."'");
}
if (!isset($_POST['dongy'])&&!isset($_POST['tuchoi'])) {
$name = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$kethon['user_id']."'"));
echo '<div class="gmenu"><center><b><form method="post"><img src="/icon/icontraitim.png"> Bạn <a href="/member/'.$kethon['user_id'].'.html">'.$name['name'].'</a> đã gửi đến bạn 1 lời cầu hôn...Bạn có đồng ý không?<br/><button name="dongy"  style="margin:10px"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Đồng ý</button><button name="tuchoi"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> Từ chối</button></form></b></center></div>';
}
}
$xyz=mysql_query("SELECT * FROM `kethon` WHERE `user_id`='".$user_id."' AND `dongy`!='0' AND `view`='0' ORDER BY `time` DESC LIMIT 1");
while($zzz=mysql_fetch_array($xyz)) {
$name = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$zzz['nguoi_ay']."'"));
mysql_query("UPDATE `kethon` SET `view`='1' WHERE `id`='".$zzz[id]."'");
if ($zzz['dongy']==1) {
echo '<div class="gmenu"><img src="/icon/icontraitim.png"> Bạn <a href="/member/'.$zzz['nguoi_ay'].'.html">'.$name['name'].'</a> đã đồng ý làm người yêu của bạn. Xin chúc mừng</div>';
}
if ($zzz['dongy']==2) {
echo '<div class="gmenu"><img src="/icon/icontraitim.png"> đừng buồn nữa, nỗi buồn gì rồi cũng sẽ phai... Tin buồn đến với bạn: <a href="/member/'.$zzz['nguoi_ay'].'.html">'.$name['name'].'</a> đã khướt từ lời kết hôn của bạn</div>';
}
}
?>
                            
                            