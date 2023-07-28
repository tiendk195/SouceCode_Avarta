<?php
if($act == 'duphong'){
$vatpham = $id;
if(empty($vatpham)){
header('location: /ruong');
}
$query=mysql_query("SELECT * FROM `ruongduphong` WHERE `loai`= 'nensau' AND `user_id`='".$user_id."'");
$checkdo=mysql_num_rows($query);
if ($checkdo<1) {
  mysql_query("INSERT INTO `ruongduphong` SET `loai`='nensau',`user_id`='".$user_id."' ");
}
$check = mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `id`='".$vatpham."' AND `user_id`='".$user_id."'"));
if ($datauser['cn'] != 0 or $datauser['bh'] != 0) {
header('location: /ruong');

    
} else
if($check < 1){
echo'<div class="news">Bạn không có Vật Phẩm này!</div>';
}else{
$info = mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `id`='".$vatpham."'"));
$ruongduphong = mysql_num_rows(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'"));
if($info['loai'] == 'cancau') {
mysql_query("UPDATE `users` SET `savecancau`='".$info['id_loai']."' WHERE `id`='".$user_id."'");
}


mysql_query("UPDATE `ruongduphong` SET `id_ruong`='".$info['id']."', `id_loai` = '".$info['id_loai']."',`timesudung`='".$info['timesudung']."'  WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");

}
}
if($act == 'duphongthao'){

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
$ruongduphong = mysql_num_rows(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='".$user_id."' AND `id_ruong`='".$info['id']."'"));
if($ruongduphong < 1){
echo'<div class="news">Chưa mặc mà đòi tháo à!</div>';
}else{

mysql_query("UPDATE `ruongduphong` SET `id_ruong`='', `id_loai` = ''  WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
}
}
}




