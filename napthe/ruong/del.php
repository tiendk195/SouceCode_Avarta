<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$headmod='Rương đồ';
if (!$user_id)
{
	header('Location: /dangnhap.php');
	exit;
}
$textl = 'Xóa vật phẩm';
require('../incfiles/head.php');
switch($act){
case'hsd':
$query2=mysql_query("SELECT * FROM `khodo` WHERE `timesudung`>'0' AND `user_id`='".$user_id."'");
$check2=mysql_num_rows($query2);
if ($check2<1) {
 	header('Location: /');
	exit;
}


Echo'<div class="box_forums"><br/><div class="homeforum"><div class="icon-home"><div class="home">Rương đồ</div></div></div></div><div class="phdr">Hạn sử dụng</div>';
if(isset($_POST['hsd'])){
mysql_query("DELETE FROM `khodo` WHERE `user_id` = '$user_id' AND `timesudung` != '0'");
echo'<div class="omenu">Bạn đã xóa thành công !! <a href="/ruong">Trở về rương đồ</a></div>';
}
echo'<center><div class="omenu">Bạn có chắc chắn xóa hết đồ có hạn sử dụng không!!<br><form method="post"><input type="submit" name="hsd" value="Xóa" /></form></div></center>';
break;
default:
echo '<div class="phdr">'.$textl.'</div>';

$result = mysql_query("SELECT * FROM `khodo` WHERE `id` = '$id' AND `user_id` = '$user_id'");
$tongruong=mysql_query("SELECT * FROM `thungrac` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);

if (mysql_num_rows($result) < 1)
{
 	header('Location: /ruong');
}
else
{

	$row = mysql_fetch_array($result);
$t= mysql_query("SELECT * FROM `timethungrac` WHERE `user_id` = '$user_id'");
	$t2= mysql_fetch_array($t);
		if (isset($_POST['submit']))
		{
			
		mysql_query("DELETE FROM `khodo` WHERE `id` = '{$row['id']}'");
		  //Thùng rác
$check=mysql_num_rows(mysql_query("SELECT * FROM `timethungrac` WHERE  `user_id`= '".$user_id."'"));
if ($t2['time']==0){
     mysql_query("UPDATE `timethungrac` SET `time`='".time()."' 	 WHERE `user_id` = '".$user_id."'");
}
if ($row['timesudung']==0){
   mysql_query("INSERT INTO `thungrac` SET `time`='".time()."',
 `user_id`='".$user_id."',`id_loai`='{$row['id_loai']}',`timesudung`= '{$row['timesudung']}',`loai`= '{$row['loai']}',`tenvatpham`='{$row['tenvatpham']}',`id_shop` =  '{$row['id_shop']}' ");
}

		header('Location: /ruong/?loai='.$row['loai'].'');
		
	

}
echo '<center><div class="menu">
	<form method="post">Bạn có chắc chắn bỏ vật phẩm này, có thể khôi phục lại tại thùng rác?<br/><center><img src="/images/shop/'.$row['id_shop'].'.png"></center><br/><input type="submit" value="Xóa" name="submit"> <a href="/ruong"><input type="button" value="Quay lại"></a></form>
	</div></center>';
}
mysql_free_result($result);
break;


case'thaoall':
mysql_query("UPDATE `users` SET `toc`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `id_ruong`='', `id_loai` = ''  WHERE `user_id`='".$user_id."' AND `loai`='toc'");

mysql_query("UPDATE `users` SET `nensau`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `id_ruong`='', `id_loai` = ''  WHERE `user_id`='".$user_id."' AND `loai`='nensau'");

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


break;

}


require('../incfiles/end.php');
?>