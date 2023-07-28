<?php
require_once('in/data.php'); //file ket noi data o day nhe
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
if($ma == UH || $ma == Uh || $ma == uh){
$ma = $sub[2];
$id = $sub[3];
$dem = mysql_result(mysql_query("select count(*) from `users` where `mibile` = '".$sdt."' and `ungho` = '1'"),0);
$nick = mysql_result(mysql_query("select count(*) from `users` where `id` = '".$id."'"),0);
$kichhoat = mysql_result(mysql_query("select count(*) from `users` where `id` = '".$id."' and `ungho` = '1"),0);
if($dem != 0){
$responseInfo = 'So dien thoai nay da kich hoat cho 1 tai khoan';
}elseif($nick == 0){
$responseInfo = 'Nick nay khong ton tai!';
}elseif($kichhoat != 0){
$responseInfo = 'Nick nay da kich hoat!';
}else{
$rand = rand(1000,99999);
@mysql_query("UPDATE users SET `ungho`='1', `ungho`='1' WHERE `id`='".$id."'");
$responseInfo = 'Cam on ban da ung ho website';
} }elseif($ma == PASS || $ma == Pass || $ma == pass){
$responseInfo = 'Cam on ban da dung dich vu';
}else{
$responseInfo = 'Sai cu phap';
}
echo '0|'.$responseInfo;
?>