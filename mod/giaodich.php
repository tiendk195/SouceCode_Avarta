<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl = 'Giao dịch';
if (!$user_id )
{
	header('Location: /login.php');
	exit;
}
require('../incfiles/head.php');
$i=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."'"));
switch($act) {
default:




	break;
case 'hon':
$id = (int)$_GET['id'];
$check  = mysql_num_rows(mysql_query("SELECT * FROM users WHERE id = '$id'"));
$row = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id = '$id'"));
if ($check < 1)
{
	header('Location: /index.php');
	exit;
}
    echo'<div class="phdr">MOD &gt; Giao dịch &gt; '.$row['name'].' &gt; Hôn</div>';
	$rand=rand(1,10000);
	
	if ($datauser['chantuongtac']==1){
		echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Vui lòng gỡ bỏ chặn tương tác mới có thể giao dịch với người khác</div>';
		require('../incfiles/end.php');
		exit;

	} 
		if ($row['chantuongtac']==1){
		echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Người này đã chặn tương tác</div>';
		require('../incfiles/end.php');
		exit;

	} 
	if ($datauser['sex']==$row['sex']){
				echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Không thể hôn người đồng giới</div>';
		require('../incfiles/end.php');
		exit;

	} 
	if (time() > $row['lastdate'] + 300 ) {
					echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Đối phương không online</div>';
		require('../incfiles/end.php');
		exit;

	}
		if ($datauser['id']==$row['id']){
					echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Không thể hôn chính mình</div>';
		require('../incfiles/end.php');
		exit;

	}
   if (time()<$datauser['timehon']+10) {
$wait=$datauser[timehon]-time()+10;
				echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn hôn quá nhanh! Đợi '.$wait.'s nữa để hôn tiếp</div>';
		require('../incfiles/end.php');
		exit;

	}

	echo'<div class="omenu">Giao dịch hôn thành công</div>';
$text = ' '.$login.' vừa hôn bạn, hôn lại ngay!! ';


	$checknv=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='6'"));
if ($checknv>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='6'");
}




mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$user_id."',
                `user` = '".$row['id']."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");

		if ($datauser['gayroi']!=0){

	mysql_query("UPDATE users SET  `gayroi`=`gayroi`- '5' WHERE id = '".$user_id."'");
		}
$time=60+time();
      mysql_query("UPDATE `users` SET `timehon`='" . time() . "' ,`solanhon`=`solanhon`+'1' WHERE `id` = '".$user_id."'");

mysql_query("UPDATE `users` SET `mat`='12' WHERE `id`='".$user_id."' ");
mysql_query("UPDATE `users` SET `mat`='12' WHERE `id`='".$row['id']."' ");


	 if ($rand==9999){
	 $all=mysql_fetch_array(mysql_query("SELECT max(id) FROM `shopvatpham`"));  
$rando=rand(1,$all['max(id)']);
$checkrand=mysql_num_rows(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$rando."'"));

$cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$rando."'"));
if ($checkrand>=1){
	 	    echo'<div class="omenu"><b>Bạn nhận được 1 '.$cross['tenvatpham'].' <img src="/images/vatpham/'.$cross['id'].'.png"></b>  </div>';
			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '".$cross['id']."'");
}
 }
 break;
case 'danh':

$id = (int)$_GET['id'];
$check  = mysql_num_rows(mysql_query("SELECT * FROM users WHERE id = '$id'"));
$row = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id = '$id'"));
if ($check < 1)
{
	header('Location: /index.php');
	exit;
}
    echo'<div class="phdr">MOD &gt; Giao dịch &gt; '.$row['name'].' &gt; Đánh</div>';
	$rand=rand(1,10000);
	
	if ($datauser['chantuongtac']==1){
		echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Vui lòng gỡ bỏ chặn tương tác mới có thể giao dịch với người khác</div>';
		require('../incfiles/end.php');
		exit;

	} 
		if ($row['chantuongtac']==1){
		echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Người này đã chặn tương tác</div>';
		require('../incfiles/end.php');
		exit;

	} 

	if (time() > $row['lastdate'] + 300 ) {
					echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Đối phương không online</div>';
		require('../incfiles/end.php');
		exit;

	}
		if ($datauser['id']==$row['id']){
					echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Không thể đánh chính mình</div>';
		require('../incfiles/end.php');
		exit;

	}
	if ($datauser['suckhoe']<=0){
		echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn đã hết sức khỏe, hồi phục tại tiệm Bánh Mì ở nông trại !</div>';
		require('../incfiles/end.php');
		exit;

	} 
		if ($datauser['gayroi']>=100){
		echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn đã đầy điểm gây rối</div>';
		require('../incfiles/end.php');
		exit;

	} 
   if (time()<$datauser['timedanh']+10) {
		$wait=$datauser[timedanh]-time()+10;
				echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn đánh quá nhanh! Đợi '.$wait.'s nữa để đánh tiếp</div>';
		require('../incfiles/end.php');
		exit;

	}
	$checknv=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='5'"));
if ($checknv>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='5'");
}
$checknv2=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='10'"));
if ($checknv2>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='10'");
}
$checknv3=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='11'"));
if ($checknv3>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='11'");
}

	echo'<div class="omenu">Giao dịch đánh thành công</div>';
$text = ' '.$login.' vừa đánh bạn, đánh lại ngay!! ';




mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$user_id."',
                `user` = '".$row['id']."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
	mysql_query("UPDATE users SET  `gayroi`=`gayroi`+ '5',`suckhoe`=`suckhoe`-'5' WHERE id = '".$user_id."'");
		
      mysql_query("UPDATE `users` SET `timedanh`='" . time() . "'  WHERE `id` = '".$user_id."'");

mysql_query("UPDATE `users` SET `mat`='26' WHERE `id`='".$user_id."' ");
mysql_query("UPDATE `users` SET `mat`='26' WHERE `id`='".$row['id']."' ");


	 if ($rand==9999){
	 $all=mysql_fetch_array(mysql_query("SELECT max(id) FROM `shopvatpham`"));  
$rando=rand(1,$all['max(id)']);
$checkrand=mysql_num_rows(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$rando."'"));

$cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$rando."'"));
if ($checkrand>=1){
	 	    echo'<div class="omenu"><b>Bạn nhận được 1 '.$cross['tenvatpham'].' <img src="/images/vatpham/'.$cross['id'].'.png"></b>  </div>';
			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '".$cross['id']."'");
}
 }
 
	

break;

}
require('../incfiles/end.php');
?>