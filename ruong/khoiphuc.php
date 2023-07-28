<?php
if($act == 'khoiphuc'){
$vatpham = $id;
if(empty($vatpham)){
header('location: /ruong');
}
$check = mysql_num_rows(mysql_query("SELECT * FROM `thungrac` WHERE `id`='".$vatpham."' AND `user_id`='".$user_id."'"));
if ($datauser['cn'] != 0 or $datauser['bh'] != 0) {
header('location: /ruong');

    
} else
if($check < 1){
echo'<div class="news">Bạn không có Vật Phẩm này!</div>';
}else{

		mysql_query("DELETE FROM `thungrac` where `id`='{$res['id']}' ");

	@mysql_query("INSERT INTO `khodo` SET
 `id_shop`='".$res['id_shop']."',
 `user_id`='".$user_id."',
 `id_loai`='".$res['id_loai']."',
 `tenvatpham` ='".$res['tenvatpham']."',
  `timesudung` ='".$res['timesudung']."',
 `loai`='".$res['loai']."'");
}
}