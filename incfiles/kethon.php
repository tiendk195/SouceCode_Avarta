<?php
$kh=mysql_query("SELECT * FROM `kethon` WHERE `nguoi_ay`='".$user_id."' AND `dongy`='0' ORDER BY `time` LIMIT 1");
while($kethon=mysql_fetch_array($kh)) {
$cc=mysql_fetch_array(mysql_query("SELECT * FROM  `users` WHERE `id`='".$kethon[user_id]."'"));
if (isset($_POST['dongy'])) {
if ($datauser['nguoiyeu']!=0) {
echo '<div class="pmenu">Bạn đã có người yêu!</div>';
} else if ($cc['nguoiyeu']!=0) {
echo '<div class="pmenu">Bạn đã đến chậm 1 bước... người ấy đã trờ thành hoa đã có chậu</div>';
} else {
if ($kethon['dongy']==0) {
}



//--end--//
$time = time();
mysql_query("UPDATE `kethon` SET `dongy`='1',`nhan`='1',`time`='{$time}' WHERE `id`='".$kethon[id]."'");
mysql_query("UPDATE `users` SET `nguoiyeu`='".$kethon[user_id]."' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `users` SET `nguoiyeu`='".$user_id."' WHERE `id`='".$kethon[user_id]."'");
$name = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$kethon['user_id']."'"));
$sm='[b]@'.$datauser['id'].' đã đồng ý kết hôn với  @'.($name['id']).' , chúc 2 bạn hạnh phúc[/b]';
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
echo '<div class="lt"><center><b><form method="post"><img src="/icon/icontraitim.png"> Bạn <a href="/member/'.$kethon['user_id'].'.html">'.$name['name'].'</a> đã gửi đến bạn 1 lời cầu hôn...Bạn có đồng ý không?<br/><input type="submit" name="dongy" value="Đồng ý" > <input type="submit" name="tuchoi" value="Từ chối" ></form></b></center></div>';
}
}
$xyz=mysql_query("SELECT * FROM `kethon` WHERE `user_id`='".$user_id."' AND `dongy`!='0' AND `view`='0' ORDER BY `time` DESC LIMIT 1");
while($zzz=mysql_fetch_array($xyz)) {
$name = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$zzz['nguoi_ay']."'"));
mysql_query("UPDATE `kethon` SET `view`='1' WHERE `id`='".$zzz[id]."'");
if ($zzz['dongy']==1) {
echo '<div class="pmenu"><img src="/icon/icontraitim.png"> Bạn <a href="/member/'.$zzz['nguoi_ay'].'.html">'.$name['name'].'</a> đã đồng ý làm người yêu của bạn. Xin chúc mừng</div>';
}
if ($zzz['dongy']==2) {
echo '<div class="pmenu"><img src="/icon/icontraitim.png"> Đừng buồn nữa, nỗi buồn gì rồi cũng sẽ phai... Tin buồn đến với bạn: <a href="/member/'.$zzz['nguoi_ay'].'.html">'.$name['name'].'</a> đã khướt từ lời kết hôn của bạn</div>';
}
}
?>