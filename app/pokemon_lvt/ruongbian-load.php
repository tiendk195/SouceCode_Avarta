<?php

define('_IN_JOHNCMS', 1);
$rootpath='../../';

require_once ("../../incfiles/core.php");

if(isset($_POST['submit'])) {
		echo'<div id="load">';

	$r = rand(1,20);
	$randqua = rand(1,2);
	$xu = rand(1000000,5000000);
		$luong = rand(100,1000);
		$luongkhoa = rand(1,100);

	$randmanh = rand(1,5);
	$randbong = rand(5,10);

$timedo=30*24*3600+time();
$time =time();
$hopqua=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='255'"));
$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else 
if ($hopqua['soluong']<=0 ){
echo'<br><b><font color="red">Lỗi</b></font> Bạn không có rương bí ẩn để mở';
} else {
	if($r == 1){
	

		echo'<br><font color="green">Chúc mừng bạn nhận được '.$randmanh.' Mảnh ghép Cánh Nguyệt Tiên</font>';

		  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$randmanh."' WHERE `user_id`='".$user_id."' AND `id_shop` = '252'");
		  $text='Bạn đã nhận được '.$randmanh.' Mảnh ghép Cánh Nguyệt Tiên từ Rương Bí Ẩn ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");

	}
		if($r == 2){
	
	
			echo'<br><font color="green">Chúc mừng bạn nhận được '.$randqua.' Hộp quà mảnh ghép</font>';

	
		  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$randqua."' WHERE `user_id`='".$user_id."' AND `id_shop` = '97'");
		  $text='Bạn đã nhận được '.$randqua.' Hộp quà mảnh ghép từ Rương Bí Ẩn ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
	}
		if($r == 3){
	
		echo'<br><font color="green">Chúc mừng bạn nhận được '.$randqua.' Huy hiệu Hoàng Gia</font>';

	
		  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$randqua."' WHERE `user_id`='".$user_id."' AND `id_shop` = '167'");
		  $text='Bạn đã nhận được '.$randqua.' Huy hiệu Hoàng Gia từ Rương Bí Ẩn ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
	}
 		if($r == 4){
				echo'<br><font color="green">Chúc mừng bạn nhận được '.$luongkhoa.' Lượng khóa</font>';

	
mysql_query("UPDATE `users` SET `luongkhoa`=`luongkhoa`+'".$luongkhoa."' WHERE `id` = '{$user_id}'");
			  $text='Bạn đã nhận được '.$luongkhoa.' Lượng khóa từ Rương Bí Ẩn ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");

	}
			if($r == 5){
	
	echo'<br><font color="green">Chúc mừng bạn nhận được '.$xu.' Xu</font>';

	
mysql_query("UPDATE `users` SET `xu`=`xu`+'".$xu."' WHERE `id` = '{$user_id}'");
		  $text='Bạn đã nhận được '.$xu.' Xu từ Rương Bí Ẩn ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
	}
			if($r == 6){
	
	echo'<br><font color="green">Chúc mừng bạn nhận được '.$luong.' Lượng</font>';

	
mysql_query("UPDATE `users` SET `luong`=`luong`+'".$luong."' WHERE `id` = '{$user_id}'");
		  $text='Bạn đã nhận được '.$luong.' Lượng từ Rương Bí Ẩn ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");

	}
		if($r == 7){
	
		echo'<br><font color="green">Chúc mừng bạn nhận được '.$randbong.' Bóng thần kỳ</font>';

	
		  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$randbong."' WHERE `user_id`='".$user_id."' AND `id_shop` = '245'");
		  		  $text='Bạn đã nhận được '.$randbong.' Bóng thần kỳ từ Rương Bí Ẩn ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");

	}
		if($r == 8){
	
		echo'<br><font color="green">Chúc mừng bạn nhận được 1 Huy hiệu 1STPay</font>';

	
		  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '125'");
		  		  $text='Bạn đã nhận được 1 Huy hiệu 1STPay từ Rương Bí Ẩn ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		} 
		if($r >= 9){
	
		echo'<br><font color="green">Chúc mừng bạn nhận được '.$randbong.' Bóng thần kỳ</font>';

	
		  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$randbong."' WHERE `user_id`='".$user_id."' AND `id_shop` = '245'");
		  		  $text='Bạn đã nhận được '.$randbong.' Bóng thần kỳ từ Rương Bí Ẩn ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		} 
	
		
		
	
    
 mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '255'");
}
		echo'</div>';


	}




	

					

?>