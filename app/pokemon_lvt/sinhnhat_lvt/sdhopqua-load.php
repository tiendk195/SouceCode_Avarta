<?php

define('_IN_JOHNCMS', 1);
$rootpath='../../';

require_once ("../../incfiles/core.php");

if(isset($_POST['submit'])) {
		echo'<div id="load">';

	$r = rand(1,200);
	$randqua = rand(1,2);
	$xu = rand(5000,10000);

$timedo=30*24*3600+time();
$time =time();
$hopqua=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='164'"));
$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else 
if ($hopqua['soluong']<=0 ){
echo'<br><b><font color="red">Lỗi</b></font> Bạn không có hộp quà sinh nhật để mở';
} else {
	if($r == 1){
	
	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2653'"));

		echo'<br><font color="green">Chúc mừng bạn nhận được '.$do['tenvatpham'].' (30 ngày)</font>';

 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='".$timedo."'
");
	}
		if($r == 2){
	
	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2627'"));

		echo'<br><font color="green">Chúc mừng bạn nhận được '.$do['tenvatpham'].' (30 ngày)</font>';

 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='".$timedo."'
");

	}
		if($r == 3){
	
	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2628'"));

		echo'<br><font color="green">Chúc mừng bạn nhận được '.$do['tenvatpham'].' (30 ngày)</font>';

 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='".$timedo."'
");

	}
 		if($r == 4){
	
	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2629'"));

		echo'<br><font color="green">Chúc mừng bạn nhận được '.$do['tenvatpham'].' (30 ngày)</font>';

 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='".$timedo."'
");

	}
			if($r == 5){
	
	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2631'"));

		echo'<br><font color="green">Chúc mừng bạn nhận được '.$do['tenvatpham'].' (30 ngày)</font>';

 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='".$timedo."'
");

	}
			if($r == 6){
	
	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2637'"));

		echo'<br><font color="green">Chúc mừng bạn nhận được '.$do['tenvatpham'].' (30 ngày)</font>';

 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='".$timedo."'
");

	}
		if($r == 7){
	
	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2635'"));

		echo'<br><font color="green">Chúc mừng bạn nhận được '.$do['tenvatpham'].' (30 ngày)</font>';

 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='".$timedo."'
");

	}
		if($r == 8){
	
			echo'<br><font color="green">Chúc mừng bạn nhận được '.$randqua.' Hộp quà mảnh ghép</font>';

	
		  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$randqua."' WHERE `user_id`='".$user_id."' AND `id_shop` = '97'");
		} 
			if($r == 9){
	
			echo'<br><font color="green">Chúc mừng bạn nhận được '.$randqua.' Bột mì</font>';

	
		  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$randqua."' WHERE `user_id`='".$user_id."' AND `id_shop` = '160'");
		} 
				if($r == 10){
	
			echo'<br><font color="green">Chúc mừng bạn nhận được '.$randqua.' Công thức</font>';

	
		  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$randqua."' WHERE `user_id`='".$user_id."' AND `id_shop` = '161'");
		} 
					if($r == 11){
	
			echo'<br><font color="green">Chúc mừng bạn nhận được '.$randqua.' Đường cát</font>';

	
		  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$randqua."' WHERE `user_id`='".$user_id."' AND `id_shop` = '162'");
		} 
					if($r == 12){
	
			echo'<br><font color="green">Chúc mừng bạn nhận được '.$randqua.' Lượng khóa</font>';

	
mysql_query("UPDATE `users` SET `luongkhoa`=`luongkhoa`+'".$randqua."' WHERE `id` = '{$user_id}'");
		}
		
					if($r == 13){
	
	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2637'"));
		$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='2637' AND `timesudung`='0' AND `user_id`='".$user_id."'");
$check=mysql_num_rows($query);
if ($check<1) {
		echo'<br><font color="green">Chúc mừng bạn nhận được '.$do['tenvatpham'].' (Vĩnh viễn)</font>';

 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='0'
");
 $bot = ' @'.$login.' Vừa mở hộp quà sinh nhật nhận được '.$do['tenvatpham'].' xin chúc mừng :O';
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '2',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");
	} else {
				echo'<br><font color="green">Chúc mừng bạn nhận được '.$xu.' Xu</font>';

	
mysql_query("UPDATE `users` SET `xu`=`xu`+'".$xu."' WHERE `id` = '{$user_id}'");

	}
	}
		
	if($r == 15){
	
	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2635'"));
		$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='2635' AND `timesudung`='0' AND `user_id`='".$user_id."'");
$check=mysql_num_rows($query);
if ($check<1) {
		echo'<br><font color="green">Chúc mừng bạn nhận được '.$do['tenvatpham'].' (Vĩnh viễn)</font>';

 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='0'
");
 $bot = ' @'.$login.' Vừa mở hộp quà sinh nhật nhận được '.$do['tenvatpham'].' xin chúc mừng :O';
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '2',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");
	} else {
				echo'<br><font color="green">Chúc mừng bạn nhận được '.$xu.' Xu</font>';

	
mysql_query("UPDATE `users` SET `xu`=`xu`+'".$xu."' WHERE `id` = '{$user_id}'");

	}
	}			
	if($r == 14){
	
	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2631'"));
			$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='2631' AND `timesudung`='0' AND `user_id`='".$user_id."'");
$check=mysql_num_rows($query);
if ($check<1) {
		echo'<br><font color="green">Chúc mừng bạn nhận được '.$do['tenvatpham'].' (Vĩnh viễn)</font>';


 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='0'
");
 $bot = ' @'.$login.' Vừa mở hộp quà sinh nhật nhận được '.$do['tenvatpham'].' xin chúc mừng :O';
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '2',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");
	
		} else {
				echo'<br><font color="green">Chúc mừng bạn nhận được '.$xu.' Xu</font>';

	
mysql_query("UPDATE `users` SET `xu`=`xu`+'".$xu."' WHERE `id` = '{$user_id}'");

	}
	}
		
	if($r >= 15){
			echo'<br><font color="green">Chúc mừng bạn nhận được '.$xu.' Xu</font>';

	
mysql_query("UPDATE `users` SET `xu`=`xu`+'".$xu."' WHERE `id` = '{$user_id}'");

	}
	
		
		
	
    
 mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '164'");
}
		echo'</div>';


	}




	

					

?>