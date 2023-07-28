<?php
require_once('pkoolvndz.php'); //file ket noi data o day nhe
$code = $_REQUEST['code'];
$subCode = $_REQUEST['subCode'];
$mobile = $_REQUEST['mobile'];
$phone = ' '.$mobile.'';
$phone = str_replace(' 84','0', $phone);
$phone = str_replace(' 01','01', $phone);
$phone= str_replace(' 09','09', $phone);
$sdt = $phone; //so dien thoai da qua xu ly bo 84
$serviceNumber = $_REQUEST['serviceNumber'];
$tongdai = $serviceNumber;
$info = $_REQUEST['info'];
$sub = explode(' ', $info);
$ma = $sub[2];
if($ma == KH || $ma == Kh || $ma == kh){
$ma = $sub[2];
$id = $sub[3];
$dem = mysql_result(mysql_query("select count(*) from `users` where `mibile` = '".$sdt."' and `kichhoat` = '1'"),0);
$nick = mysql_result(mysql_query("select count(*) from `users` where `id` = '".$id."'"),0);
$tk = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$id."'"));
$kichhoat = mysql_result(mysql_query("select count(*) from `users` where `id` = '".$id."' and `kichhoat` = '1"),0);
if($tongdai == 8098) {
$responseInfo = 'DAU SO 8098 KHONG CHO PHEP KH, MONG BAN THONG CAM !';
}elseif($tongdai == 8198) {
$responseInfo = 'DAU SO 8198 KHONG CHO PHEP KH, MONG BAN THONG CAM !';
}elseif($nick == 0){
$responseInfo = 'Nick nay khong ton tai!';
}elseif($tk['kichhoat'] == 1){
$responseInfo = 'Nick nay da kich hoat!';
}else{
$rand = rand(1000,99999);
@mysql_query("UPDATE users SET `kichhoat`='1', `mibile`='".$sdt."', `timekichhoat`='".time()."' WHERE `id`='".$id."'");
@mysql_query("UPDATE users SET `xu`=`xu`+'10000000', `luong`=`luong`+'2000' WHERE `id`='".$id."'");
$responseInfo = 'Kich hoat thanh cong cho ID tai khoan: '.$tk['id'].'. Ban duoc tang 10M xu va 2k luong. Chuc ban online vui ve!
⭐pkoolvn⭐';
} }elseif($ma == PASS || $ma == Pass || $ma == pass){
$responseInfo = 'Chuc nang lay pass dang bao tri vui long lien he voi admin pkoolvn fb.com/pkoolvn hoac zalo 0914.214.018 de lay pass';
}elseif($ma == XU || $ma == Xu || $ma == xu){
$ma = $sub[2];
$id = $sub[3];
$nick = mysql_result(mysql_query("select count(*) from `users` where `id` = '".$id."'"),0);
$tk = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$id."'"));
$credit_set = ($tongdai == 8198 ? '5000000':NULL).($tongdai == 8298 ? '10000000':NULL).($tongdai == 8398 ? '20000000':NULL).($tongdai == 8498 ? '30000000':NULL).($tongdai == 8598 ? '40000000':NULL).($tongdai == 8698 ? '100000000':NULL).($tongdai == 8798 ? '200000000':NULL);
if($nick == 0){
$responseInfo = 'ID khong ton tai';
} else if ($tongdai == 8098) {
$responseInfo = 'DAU SO 8098 KHONG CHO PHEP NAP, MONG BAN THONG CAM !';
} else {
mysql_query("UPDATE users SET `xu` = `xu` + '{$credit_set}' WHERE `id`='{$id}'");
$responseInfo = 'Ban da nap thanh cong '.$credit_set.' xu vao id nick '.$tk['id'].'';
}
}elseif($ma == LUONG || $ma == Luong || $ma == luong){
$ma = $sub[2];
$id = $sub[3];
$nick = mysql_result(mysql_query("select count(*) from `users` where `id` = '".$id."'"),0);
$tk = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$id."'"));
$luong = ($tongdai == 8198 ? '500':NULL).($tongdai == 8298 ? '1000':NULL).($tongdai == 8398 ? '3000':NULL).($tongdai == 8498 ? '4000':NULL).($tongdai == 8598 ? '5000':NULL).($tongdai == 8698 ? '7000':NULL).($tongdai == 8798 ? '10000':NULL);
if($nick == 0){
$responseInfo = 'ID khong ton tai';
} else if ($tongdai == 8098) {
$responseInfo = 'DAU SO 8098 KHONG CHO PHEP NAP, MONG BAN THONG CAM !';
} else {
mysql_query("UPDATE users SET `luong` = `luong` + '{$luong}' WHERE `id`='{$id}'");
$responseInfo = 'Ban da nap thanh cong '.$luong.' luong vao id nick '.$tk['id'].'';
} 
}else{
$responseInfo = 'Sai cu phap';
}
echo '0|'.$responseInfo;
?>