<?php

define('_IN_JOHNCMS', 1);
$rootpath='../../';

require_once ("../../incfiles/core.php");

if(isset($_POST['moruong'])) {
	$r = rand(1,1000);
	$dans = rand(1,3);
	$xu = rand(10000,30000);
	$luong = rand(10,50);

$time = time();
$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else 
if ($datauser['ruongsk15']<=0) {
    echo'<div class="lethinh"><b><font color="red">Vui lòng có ít nhất 1 rương để mở</b></font></div>';
} else {



	
if($r == 1){
echo'<div class="lethinh"><b><font color="red">Bạn mở được '.$dans.' đá ngũ sắc <img src="/nhom/boss/dns.png"></b></font></div>';
 mysql_query("UPDATE `users` SET `dangusac`=`dangusac`+'".$dans."' WHERE `id`='{$user_id}'");
 mysql_query("UPDATE `users` SET `ruongsk15`=`ruongsk15`-'1' WHERE `id`='{$user_id}'");

}
if($r == 2){
echo'<div class="lethinh"><b><font color="red">Bạn mở được '.$xu.' xu</b></font></div>';
 mysql_query("UPDATE `users` SET `xu`=`xu`+'".$xu."' WHERE `id`='{$user_id}'");
 mysql_query("UPDATE `users` SET `ruongsk15`=`ruongsk15`-'1' WHERE `id`='{$user_id}'");

}
if($r == 3){
echo'<div class="lethinh"><b><font color="red">Bạn mở được '.$luong.' lượng</b></font></div>';
 mysql_query("UPDATE `users` SET `luong`=`luong`+'".$luong."' WHERE `id`='{$user_id}'");
 mysql_query("UPDATE `users` SET `ruongsk15`=`ruongsk15`-'1' WHERE `id`='{$user_id}'");

}
if($r == 4){
echo'<div class="lethinh"><b><font color="red">Bạn mở được '.$dans.' đá nâng cấp</b></font></div>';
	                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$dans."' WHERE `user_id`='".$user_id."' AND `id_shop` = '60'");
 mysql_query("UPDATE `users` SET `ruongsk15`=`ruongsk15`-'1' WHERE `id`='{$user_id}'");

}
if($r == 5){
	if ($datauser['sex'] =='zh') {
		$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='1708' AND `user_id`='".$user_id."'");
$check=mysql_num_rows($query);
if ($check<1) {
	
echo'<div class="lethinh"><b><font color="red">Xin chức mừng, bạn mở được Tóc Nezuko</b></font></div>';
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='1708', 
 `loai`='toc',
 `id_loai`='2003',
 `tenvatpham` = 'Tóc Nezuko', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
 mysql_query("UPDATE `users` SET `ruongsk15`=`ruongsk15`-'1' WHERE `id`='{$user_id}'");
 $bot = ' @'.$login.' Vừa mở rương trang phục nhận được Tóc Nezuko xin chúc mừng :O';
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
		echo'<div class="lethinh"><b><font color="red">Chúc bạn may mắn lần sau</b></font></div>';
		 mysql_query("UPDATE `users` SET `ruongsk15`=`ruongsk15`-'1' WHERE `id`='{$user_id}'");

}
}
	if ($datauser['sex'] =='m') {
	
			$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='1716' AND `user_id`='".$user_id."'");
$check=mysql_num_rows($query);
if ($check<1) {
echo'<div class="lethinh"><b><font color="red">Xin chức mừng, bạn mở được Tóc Tanjiro</b></font></div>';
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='1716', 
 `loai`='toc',
 `id_loai`='2011',
 `tenvatpham` = 'Tóc Tanjiro', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
 mysql_query("UPDATE `users` SET `ruongsk15`=`ruongsk15`-'1' WHERE `id`='{$user_id}'");
 $bot = ' @'.$login.' Vừa mở rương trang phục nhận được Tóc Tanjiro xin chúc mừng :O';
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
		echo'<div class="lethinh"><b><font color="red">Chúc bạn may mắn lần sau</b></font></div>';
		 mysql_query("UPDATE `users` SET `ruongsk15`=`ruongsk15`-'1' WHERE `id`='{$user_id}'");

}
}
}
if($r == 6){
	if ($datauser['sex'] =='zh') {
	$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='1709' AND `user_id`='".$user_id."'");
$check=mysql_num_rows($query);
if ($check<1) {
echo'<div class="lethinh"><b><font color="red">Xin chức mừng, bạn mở được Áo Nezuko</b></font></div>';
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='1709', 
 `loai`='ao',
 `id_loai`='2004',
 `tenvatpham` = 'Áo Nezuko', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
 mysql_query("UPDATE `users` SET `ruongsk15`=`ruongsk15`-'1' WHERE `id`='{$user_id}'");
 $bot = ' @'.$login.' Vừa mở rương trang phục nhận được Áo Nezuko xin chúc mừng :O';
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
		echo'<div class="lethinh"><b><font color="red">Chúc bạn may mắn lần sau</b></font></div>';
		 mysql_query("UPDATE `users` SET `ruongsk15`=`ruongsk15`-'1' WHERE `id`='{$user_id}'");

}
}
	if ($datauser['sex'] =='m') {
	$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='1717' AND `user_id`='".$user_id."'");
$check=mysql_num_rows($query);
if ($check<1) {
echo'<div class="lethinh"><b><font color="red">Xin chức mừng, bạn mở được Áo Tanjiro</b></font></div>';
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='1717', 
 `loai`='ao',
 `id_loai`='2012',
 `tenvatpham` = 'Áo Tanjiro', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
 mysql_query("UPDATE `users` SET `ruongsk15`=`ruongsk15`-'1' WHERE `id`='{$user_id}'");
 $bot = ' @'.$login.' Vừa mở rương trang phục nhận được Áo Tanjiro xin chúc mừng :O';
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
		echo'<div class="lethinh"><b><font color="red">Chúc bạn may mắn lần sau</b></font></div>';
		 mysql_query("UPDATE `users` SET `ruongsk15`=`ruongsk15`-'1' WHERE `id`='{$user_id}'");

}
}
}
if($r == 7){
	if ($datauser['sex'] =='zh') {
	$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='1710' AND `user_id`='".$user_id."'");
$check=mysql_num_rows($query);
if ($check<1) {
echo'<div class="lethinh"><b><font color="red">Xin chức mừng, bạn mở được Quần Nezuko</b></font></div>';
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='1710', 
 `loai`='quan',
 `id_loai`='2005',
 `tenvatpham` = 'Quần Nezuko', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
 mysql_query("UPDATE `users` SET `ruongsk15`=`ruongsk15`-'1' WHERE `id`='{$user_id}'");
 $bot = ' @'.$login.' Vừa mở rương trang phục nhận được Quần Nezuko xin chúc mừng :O';
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
		echo'<div class="lethinh"><b><font color="red">Chúc bạn may mắn lần sau</b></font></div>';
		 mysql_query("UPDATE `users` SET `ruongsk15`=`ruongsk15`-'1' WHERE `id`='{$user_id}'");

}
}
	if ($datauser['sex'] =='m') {
	$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='1718' AND `user_id`='".$user_id."'");
$check=mysql_num_rows($query);
if ($check<1) {
echo'<div class="lethinh"><b><font color="red">Xin chức mừng, bạn mở được Quần Tanjiro</b></font></div>';
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='1718', 
 `loai`='quan',
 `id_loai`='2013',
 `tenvatpham` = 'Quần Tanjiro', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
 mysql_query("UPDATE `users` SET `ruongsk15`=`ruongsk15`-'1' WHERE `id`='{$user_id}'");
$bot = ' @'.$login.' Vừa mở rương trang phục nhận được Quần Tanjiro xin chúc mừng :O';
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
		echo'<div class="lethinh"><b><font color="red">Chúc bạn may mắn lần sau</b></font></div>';
		 mysql_query("UPDATE `users` SET `ruongsk15`=`ruongsk15`-'1' WHERE `id`='{$user_id}'");

}
}
}
if($r == 8){
	if ($datauser['sex'] =='zh') {
	$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='1711' AND `user_id`='".$user_id."'");
$check=mysql_num_rows($query);
if ($check<1) {
echo'<div class="lethinh"><b><font color="red">Xin chức mừng, bạn mở được Ống tre Nezuko</b></font></div>';
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='1711', 
 `loai`='matna',
 `id_loai`='2006',
 `tenvatpham` = 'Ống tre Nezuko', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
 mysql_query("UPDATE `users` SET `ruongsk15`=`ruongsk15`-'1' WHERE `id`='{$user_id}'");
 $bot = ' @'.$login.' Vừa mở rương trang phục nhận được Ống tre Nezuko xin chúc mừng :O';
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
		echo'<div class="lethinh"><b><font color="red">Chúc bạn may mắn lần sau</b></font></div>';
		 mysql_query("UPDATE `users` SET `ruongsk15`=`ruongsk15`-'1' WHERE `id`='{$user_id}'");

}
}
	if ($datauser['sex'] =='m') {
			$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='1719' AND `user_id`='".$user_id."'");
$check=mysql_num_rows($query);
if ($check<1) {
	
echo'<div class="lethinh"><b><font color="red">Xin chức mừng, bạn mở được Bông tai Tanjiro</b></font></div>';
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='1719', 
 `loai`='matna',
 `id_loai`='2014',
 `tenvatpham` = 'Bông tai Tanjiro', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
 mysql_query("UPDATE `users` SET `ruongsk15`=`ruongsk15`-'1' WHERE `id`='{$user_id}'");
 $time = time();
$bot = ' @'.$login.' Vừa mở rương trang phục nhận được Bông tai Tanjiro xin chúc mừng :O';
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
		echo'<div class="lethinh"><b><font color="red">Chúc bạn may mắn lần sau</b></font></div>';
		 mysql_query("UPDATE `users` SET `ruongsk15`=`ruongsk15`-'1' WHERE `id`='{$user_id}'");

}
}
}
if ($r >8) {
echo'<div class="lethinh"><b><font color="red">Bạn mở được '.$dans.' đá nâng cấp</b></font></div>';
	                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$dans."' WHERE `user_id`='".$user_id."' AND `id_shop` = '60'");
 mysql_query("UPDATE `users` SET `ruongsk15`=`ruongsk15`-'1' WHERE `id`='{$user_id}'");




}
	echo'<div class="omenu"><b><font color="red">Bạn đang có '.number_format($datauser['ruongsk15']).' rương trang phục</b></font></div>'; 

}
}
?>