<?php
if($act == 'thao'){
$vatpham = $id;
if(empty($vatpham)){
header('location: /ruong');
}
$check = mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `id`='".$vatpham."' AND `user_id`='".$user_id."'"));
if ($datauser['cn'] != 0 or $datauser['bh'] != 0) {
header('location: /ruong');

    
} else
if($check < 1){
echo'<div class="news">Bạn không có Vật Phẩm này!</div>';
}else{
$info = mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `id`='".$vatpham."'"));
$dangmac = mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `id_ruong`='".$info['id']."'"));
if($dangmac < 1){
echo'<div class="news">Chưa mặc mà đòi cởi à!</div>';
}else{
mysql_query("UPDATE `users` SET `{$info['loai']}`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `id_ruong`='', `id_loai` = ''  WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
}
}
}




if($act == 'thaoall'){

mysql_query("UPDATE `users` SET `toc`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `id_ruong`='', `id_loai` = ''  WHERE `user_id`='".$user_id."' AND `loai`='toc'");

mysql_query("UPDATE `users` SET `ao`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `id_ruong`='', `id_loai` = ''  WHERE `user_id`='".$user_id."' AND `loai`='ao'");

mysql_query("UPDATE `users` SET `quan`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `id_ruong`='', `id_loai` = ''  WHERE `user_id`='".$user_id."' AND `loai`='quan'");


mysql_query("UPDATE `users` SET `non`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `id_ruong`='', `id_loai` = ''  WHERE `user_id`='".$user_id."' AND `loai`='non'");

mysql_query("UPDATE `users` SET `mat`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `id_ruong`='', `id_loai` = ''  WHERE `user_id`='".$user_id."' AND `loai`='mat'");


mysql_query("UPDATE `users` SET `kinh`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `id_ruong`='', `id_loai` = ''  WHERE `user_id`='".$user_id."' AND `loai`='kinh'");


mysql_query("UPDATE `users` SET `matna`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `id_ruong`='', `id_loai` = ''  WHERE `user_id`='".$user_id."' AND `loai`='matna'");

mysql_query("UPDATE `users` SET `canh`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `id_ruong`='', `id_loai` = ''  WHERE `user_id`='".$user_id."' AND `loai`='canh'");


mysql_query("UPDATE `users` SET `thucung`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `id_ruong`='', `id_loai` = ''  WHERE `user_id`='".$user_id."' AND `loai`='thucung'");

mysql_query("UPDATE `users` SET `docamtay`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `id_ruong`='', `id_loai` = ''  WHERE `user_id`='".$user_id."' AND `loai`='docamtay'");


mysql_query("UPDATE `users` SET `khuonmat`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `id_ruong`='', `id_loai` = ''  WHERE `user_id`='".$user_id."' AND `loai`='khuonmat'");



mysql_query("UPDATE `users` SET `haoquang`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `id_ruong`='', `id_loai` = ''  WHERE `user_id`='".$user_id."' AND `loai`='haoquang'");




}



