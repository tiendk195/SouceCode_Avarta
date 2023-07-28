<?php
define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");
require_once ("../incfiles/head.php");


    
if($act == 'mac'){
$vatpham = $id;
if(empty($vatpham)){
header('location: /ruong');
}

$check = mysql_num_rows(mysql_query("SELECT * FROM `khokhung` WHERE `id`='".$vatpham."' AND `user_id`='".$user_id."'"));

if($check < 1){
header('location: /ruong');
}else{
$info = mysql_fetch_array(mysql_query("SELECT * FROM `khokhung` WHERE `user_id`='".$user_id."' AND `id`='".$vatpham."'"));

mysql_query("UPDATE `users` SET `khung`='".$info['id_shop']."' WHERE `id`='".$user_id."'");
header('location: /ruong');


}
}
if($act == 'thao'){
$vatpham = $id;
if(empty($vatpham)){
header('location: /ruong');
}

$check = mysql_num_rows(mysql_query("SELECT * FROM `khokhung` WHERE `id`='".$vatpham."' AND `user_id`='".$user_id."'"));

if($check < 1){
header('location: /ruong');
}else{
$info = mysql_fetch_array(mysql_query("SELECT * FROM `khokhung` WHERE `user_id`='".$user_id."' AND `id`='".$vatpham."'"));

mysql_query("UPDATE `users` SET `khung`='1' WHERE `id`='".$user_id."'");
header('location: /ruong');


}
}