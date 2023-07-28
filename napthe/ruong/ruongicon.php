<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$user=(int)$_GET['user'];
$checku=mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE `id`='".$user."'"));
if ($checku>0) {
$ru=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$user."'"));
}
if ($checku<1) {
$headmod='Rương đồ';
$textl='Rương đồ';
} else {
$textl='Rương đồ của '.$ru['name'].'';
}
$map ='hoimau';
require('../incfiles/head.php');
if(!$user_id){
header('location: /index.html');
}
if ($checku>0) {
$user_id=$ru['id'];
}
echo'<div class="phdr">Rương Icon</div>';
switch($act){
case'thaoicon':
$kt = mysql_fetch_array(mysql_query("SELECT * FROM `ruongicon` WHERE `user_id` = '".$user_id."'"));
if($kt>0){
    if ($datauser['icon_nick']==0) {
echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn chưa có mặc icon nào</div>';
} else {
echo'<div class="omenu">Tháo thành công</div>';
mysql_query("UPDATE `users` SET `icon_nick`='0' WHERE `id` = '".$user_id."'");
}
}
 else { 
    echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn chưa có icon nào</div>';
}
require_once ("../incfiles/end.php");
exit;
    break;

    case'ruongicon':
        if (isset($_GET['mac'])) {
$id = (int)$_GET['id'];
$kt = mysql_fetch_array(mysql_query("SELECT * FROM `ruongicon` WHERE `id` = '".$id."'"));
$size = 0;
$sizs2 = 0;
if($kt['icon'] == 3 || $kt['icon'] == 8 || $kt['icon'] == 11){
$size = 20;
$size2 = 20;
}
if($kt['icon'] == 9004){
$size = 25;
$size2 = 25;
} 


if($kt['user_id'] == $user_id){

mysql_query("UPDATE `users` SET `icon_nick`='".$kt['icon']."' WHERE `id` = '".$user_id."'");
	header('location: ruongicon.php?act=ruongicon');

echo'<div class="omenu">Mặc thành công</div>';

} else {
echo'<div class="omenu"/>Bạn làm gì có icon này mà đòi mặc?</div>';
}

}


if (isset($_GET['thao'])) {
$id = (int)$_GET['id'];
$kt = mysql_fetch_array(mysql_query("SELECT * FROM `ruongicon` WHERE `id` = '".$id."'"));
if($kt['user_id'] == $user_id){
    if ($datauser['icon_nick']==0) {
        echo'<div class="omenu">Chưa mặc mà đòi tháo??</div>';
} else {

echo'<div class="omenu">Tháo thành công</div>';
mysql_query("UPDATE `users` SET `icon_nick`='0' WHERE `id` = '".$user_id."'");
	header('location: ruongicon.php?act=ruongicon');

}
}else {
echo'<div class="omenu"/>Bạn làm gì có icon này mà đòi tháo?</div>';
}

}

if (isset($_GET['xoa'])) {
$id = (int)$_GET['id'];
$kt = mysql_fetch_array(mysql_query("SELECT * FROM `ruongicon` WHERE `id` = '".$id."'"));
if($kt['user_id'] == $user_id){
echo'<div class="omenu">Xóa thành công</div>';
mysql_query("UPDATE `users` SET `icon_nick`='0' WHERE `id` = '".$id."'");
		mysql_query("DELETE FROM `ruongicon` WHERE `id` = '".$id."'");
	header('location: ruongicon.php?act=ruongicon');


} else {
echo'<div class="omenu"/>Bạn làm gì có icon này mà đòi xóa?</div>';
}

}

$dem = mysql_result(mysql_query("SELECT COUNT(*) FROM `ruongicon` WHERE `user_id`='{$user_id}'"),0);
if($dem) {
$req = mysql_query("SELECT * FROM `ruongicon` WHERE `user_id`='{$user_id}' ORDER BY `id`");
while($res=mysql_fetch_array($req)) {
if($res['size'] || $res['size2']){
echo '<div class="omenu"><img src="/icon/nick/'.$res['icon'].'.gif" width="'.$res['size'].'" height="'.$res['size2'].'" border="0"/>';
} else {
echo '<div class="omenu"><img src="/icon/nick/'.$res['icon'].'.gif" width="15px"/>';
}

if($datauser['icon_nick'] == $res['icon']){
echo'<a href="?thao&id='.$res['id'].'"><b><font color="blue"> [ Tháo ]</font></b></a>';
} else {
echo'<a href="?mac&id='.$res['id'].'"><b><font color="red"> [ Mặc ]</font></b></a>';
}
echo'<a href="?xoa&id='.$res['id'].'"><b><font color="green"> [ Xóa ]</font></b></a>';
echo'</div>';
}
}
if($dem < 1){
echo '<div class="omenu" align="center">Rương trống!</div>';
}
require_once ("../incfiles/end.php");
exit;
    break;
}

    
echo'
<div class="omenu"><a href="?act=thaoicon"><img src="/images/vao.png"> Tháo icon</a></div>
<div class="omenu"><a href="?act=ruongicon"><img src="/images/vao.png"> Rương icon của tôi </a></div>';

if (isset($_GET['mac'])) {
$id = (int)$_GET['id'];
$kt = mysql_fetch_array(mysql_query("SELECT * FROM `ruongicon` WHERE `id` = '".$id."'"));
$size = 0;
$sizs2 = 0;
if($kt['icon'] == 3 || $kt['icon'] == 8 || $kt['icon'] == 11){
$size = 20;
$size2 = 20;
}
if($kt['icon'] == 9004){
$size = 25;
$size2 = 25;
} 


if($kt['user_id'] == $user_id){

echo'<div class="omenu">Mặc thành công</div>';
mysql_query("UPDATE `users` SET `icon_nick`='".$kt['icon']."' WHERE `id` = '".$user_id."'");
	header('location: ruongicon.php?act=ruongicon');

} else {
echo'<div class="omenu"/>Bạn làm gì có icon này mà đòi mặc?</div>';
}

}


if (isset($_GET['thao'])) {
$id = (int)$_GET['id'];
$kt = mysql_fetch_array(mysql_query("SELECT * FROM `ruongicon` WHERE `id` = '".$id."'"));
if($kt['user_id'] == $user_id){
    if ($datauser['icon_nick']==0) {
        echo'<div class="omenu">Chưa mặc mà đòi tháo??</div>';
} else {
echo'<div class="omenu">Tháo thành công</div>';
mysql_query("UPDATE `users` SET `icon_nick`='0' WHERE `id` = '".$user_id."'");
	header('location: ruongicon.php?act=ruongicon');

}
}else {
echo'<div class="omenu"/>Bạn làm gì có icon này mà đòi tháo?</div>';
}

}

if (isset($_GET['xoa'])) {
$id = (int)$_GET['id'];
$kt = mysql_fetch_array(mysql_query("SELECT * FROM `ruongicon` WHERE `id` = '".$id."'"));
if($kt['user_id'] == $user_id){
echo'<div class="omenu">Xóa thành công</div>';
mysql_query("UPDATE `users` SET `icon_nick`='0' WHERE `id` = '".$id."'");
		mysql_query("DELETE FROM `ruongicon` WHERE `id` = '".$id."'");
	header('location: ruongicon.php?act=ruongicon');

} else {
echo'<div class="omenu"/>Bạn làm gì có icon này mà đòi xóa?</div>';
}

}
/*
$dem = mysql_result(mysql_query("SELECT COUNT(*) FROM `ruongicon` WHERE `user_id`='{$user_id}'"),0);
if($dem) {
$req = mysql_query("SELECT * FROM `ruongicon` WHERE `user_id`='{$user_id}' ORDER BY `id`");
while($res=mysql_fetch_array($req)) {
if($res['size'] || $res['size2']){
echo '<div class="omenu"><img src="/icon/nick/'.$res['icon'].'.gif" width="'.$res['size'].'" height="'.$res['size2'].'" border="0"/>';
} else {
echo '<div class="omenu"><img src="/icon/nick/'.$res['icon'].'.gif"/>';
}

if($datauser['icon_nick'] == $res['icon']){
echo'<a href="?thao&id='.$res['id'].'"><b><font color="blue"> [ Tháo ]</font></b></a>';
} else {
echo'<a href="?mac&id='.$res['id'].'"><b><font color="red"> [ Mặc ]</font></b></a>';
}
echo'<a href="?xoa&id='.$res['id'].'"><b><font color="green"> [ Xóa ]</font></b></a>';
echo'</div>';
}
}
*/
if($dem < 1){
echo '<div class="omenu" align="center">Rương trống!</div>';
}
require('../incfiles/end.php');