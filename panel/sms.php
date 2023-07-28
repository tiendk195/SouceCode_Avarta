<?php
error_reporting(0);
$db_host = 'localhost';
$db_name = '';
$db_username = '';
$db_password = '';
$baotri = 'Dang bao tri !';
$conn = @mysql_connect("{$db_host}", "{$db_username}", "{$db_password}") or die("$baotri");
@mysql_select_db("{$db_name}") or die("$baotri");
mysql_query("SET character_set_results=utf8", $conn);
mb_internal_encoding('UTF-8');
mysql_query("set names 'utf8'",$conn);
date_default_timezone_set('Asia/Ho_Chi_Minh');
// 1. Nhan du lieu request tu iNET gui qua
$code               = $_REQUEST['code'];            // Ma chinh
$subCode            = $_REQUEST['subCode'];         // Ma phu
$mobile             = $_REQUEST['mobile'];          // So dien thoai +84
$serviceNumber      = $_REQUEST['serviceNumber'];   // Dau so 8x85
$info               = $_REQUEST['info'];            // Noi dung tin nhan
$ipremote           = $_SERVER['REMOTE_ADDR'];      // IP server goi qua truyen du lieu
$sub = explode(' ', $info);
$ma = strtoupper($sub[2]);
$id = intval($sub[3]);
// 2. Ghi log va kiem tra du lieu
// Tim file log.txt tai thu muc chua file php xu ly sms nay
// kiem tra de biet ban da nhan du thong tin ve tin nhan hay chua
$text = $code." - ".$subCode." - ".$mobile." - ".$serviceNumber." - ".$ipremote." - ".$info;
$fh = fopen('log.txt', "a+") or die("Could not open log.txt file.");
@fwrite($fh, date("d-m-Y, H:i")." - $text\n") or die("Could not write file!");
fclose($fh);
$nick = mysql_result(mysql_query("select count(*) from `users` where `id` = '".$id."'"),0);
$ktsdt = mysql_result(mysql_query("select count(*) from `users` where `mibile` = '".$mobile."'"),0);
$sdt = mysqli_num_rows(mysqli_query("SELECT * FROM `users` WHERE `mibile` = '".$mobile."'"));
$i = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$id."'"));
$y = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$i['user_gt']."'"));
if ($subCode == 'MTEEN') {
if ($ma == 'KH') {
if($i['kichhoat'] == 1){
$noidung = "Hi ".$mobile."! \nNick nay da kich hoat roi nhe";
} else if ($serviceNumber < 885) {
$noidung = "Hi ".$mobile."! \nBan vui long gui vao dau so 8285 nhe";
} else if ($nick < 1) {
$noidung = "Hi ".$mobile."! \nID ban vua gui khong ton tai vui long kiem tra lai";
} else if ($ktsdt > 1) {
$noidung = "Hi ".$mobile."! \nSDT nay da kich hoat qua nhieu nick nen khong the kich hoat them";
} else {
@mysql_query("UPDATE users SET `xu`=`xu`+'1000000000', `luong`=`luong`+'5000',`kichhoat`='1',`mibile`='".$mobile."' WHERE `id`='".$id."'");
if($i['user_gt'] > 0){
@mysql_query("UPDATE users SET `xu`=`xu`+'500000000', `luong`=`luong`+'2000',`ruongvip`=`ruongvip`+3,`gioithieu`=`gioithieu`+1,`quagioithieu`=`quagioithieu`+1,`sucmanh`=`sucmanh`+'20000000' WHERE `id`='".$i['user_gt']."'");
if($y['quagioithieu'] >= 2){
mysql_query("INSERT INTO `kho` SET `nick`='" . $y['name'] . "',`ten`='diabay',`loai`='thucung',`imgd`='/images/thucung/diabay.png'");
mysql_query("UPDATE `users` SET `quagioithieu`='0' WHERE `id`='".$i['user_gt']."'");
}

}
$noidung = "Hi ".$mobile."! \nBan da kich hoat thanh cong cho id ".$id."";
}
}
else
if ($ma == 'PASS') {
$checksdt =  mysql_result(mysql_query("select count(*) from `users` where `sdt` = '".$mobile."'"),0);
$nick = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `sdt`='".$mobile."'"));
if ($checksdt < 1) {
$noidung = "Hi ".$mobile."! \nSDT nay khong ton tai voi tai khoan nao tren mteen.net";
} else{
$rand = rand(9999,99999);
$mahoa = md5(md5($rand));
mysqli_query("UPDATE `users` SET `password` = '".$mahoa."' WHERE `id` = '".$nick['id']."'");
$noidung = "Hi ".$mobile."! \nMat khau moi cua ban la ".$rand."";
}
} else if ($ma == 'PASS2') {
$checksdt = mysql_result(mysql_query("select count(*) from `users` where `sdt` = '".$mobile."'"),0);
$nick = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `sdt`='".$mobile."'"));
if ($checksdt <1) {
$noidung = "Hi ".$mobile."! \nSDT nay khong ton tai voi tai khoan nao tren mteen.net";
} else {
$rand = rand(9999,99999);
$mahoa = md5(md5($rand));
mysqli_query("UPDATE `users` SET `password_2` = '".$mahoa."' WHERE `id` = '".$nick['id']."'");
$noidung = "Hi ".$mobile."! \nMat khau cap 2 moi cua ban la ".$rand."";
}
} else if ($ma == 'XU') {
$tongdai = $serviceNumber;
$nick = mysql_result(mysql_query("select count(*) from `users` where `id` = '".$id."'"),0);
$tk = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$id."'"));
$credit_set = ($tongdai == 8185 ? '5000000':NULL).($tongdai == 8285 ? '50000000':NULL).($tongdai == 8385 ? '100000000':NULL).($tongdai == 8485 ? '150000000':NULL).($tongdai == 8585 ? '200000000':NULL).($tongdai == 8685 ? '300000000':NULL).($tongdai == 8785 ? '500000000':NULL);
if($nick == 0){
$noidung = 'ID khong ton tai';
} else if ($tongdai == 8085) {
$noidung = 'DAU SO 8085 KHONG CHO PHEP NAP, MONG BAN THONG CAM !';
} else {
mysql_query("UPDATE users SET `xu` = `xu` + '{$credit_set}' WHERE `id`='{$id}'");
$noidung = 'Ban da nap thanh cong '.$credit_set.' xu vao id nick '.$tk['id'].'';
}
} else if ($ma == 'LUONG') {
$tongdai = $serviceNumber;
$nick = mysql_result(mysql_query("select count(*) from `users` where `id` = '".$id."'"),0);
$tk = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$id."'"));
$luong = ($tongdai == 8185 ? '500':NULL).($tongdai == 8285 ? '1000':NULL).($tongdai == 8385 ? '3000':NULL).($tongdai == 8485 ? '4000':NULL).($tongdai == 8585 ? '5000':NULL).($tongdai == 8685 ? '10000':NULL).($tongdai == 8785 ? '15000':NULL);
if($nick == 0){
$noidung = 'ID khong ton tai';
} else if ($tongdai == 8085) {
$noidung = 'DAU SO 8085 KHONG CHO PHEP NAP, MONG BAN THONG CAM !';
} else {
mysql_query("UPDATE users SET `luong` = `luong` + '{$luong}' WHERE `id`='{$id}'");
$noidung = 'Ban da nap thanh cong '.$luong.' luong vao id nick '.$tk['id'].'';
} 
} else {
$noidung = "Hi ".$mobile."! \nBan nhan sai cu phap rui nhe! Ho tro: 0914.214.018";
	}
echo "0|".$noidung;
}
?>