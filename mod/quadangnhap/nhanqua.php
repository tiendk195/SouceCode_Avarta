<?PHP
Define('_IN_JOHNCMS', 1);
$headmod = 'Nhận quà đăng nhập';
$textl = 'Nhận quà đăng nhập';
$rootpath='../../';

Require('../../incfiles/core.php');
If(!$user_id){
Header('location: /');
exit;
}
Require('../../incfiles/head.php');
Echo '<div class="phdr">Quà đăng nhập ngày</div>';
$id=(int)$_GET[id];
$time=time();
$req = mysql_query("SELECT * FROM `quadangnhap` WHERE `user_id` = '$user_id'");
while($res = mysql_fetch_array($req)){
if($id==1){
if($res['tichluy']<1){
echo'<div class="omenu">Bạn chưa đủ ngày để nhận quà !!</div>';
}else{
if($res['1']!=1){
echo'<div class="omenu"><center><font color="red"><b>Nhận quà thành công</b></font></center>Bạn nhận được 500.000 xu, 200 kinh nghiệm !</div>';

mysql_query("UPDATE `users` SET `xu` = `xu` + '500000', `postforum` = `postforum` + '1',`exp`= `exp` +'200' WHERE `id` = '".$user_id."'");
mysql_query("UPDATE `quadangnhap` SET `1` = '1', `time` = '$time' WHERE `user_id` = '".$user_id."'");
}else{
echo'<div class="omenu">Bạn đã nhận quà rồi!!</div>';
}
}
}
if($id==3){
if($res['tichluy']<3){
echo'<div class="omenu">Bạn chưa đủ ngày để nhận quà !!</div>';
}else{
if($res['3']!=1){
echo'<div class="omenu"><center><font color="red"><b>Nhận quà thành công</b></font></center>Bạn nhận được 1.000.000 xu, 1000 kinh nghiệm </div>';
mysql_query("UPDATE `users` SET `xu` = `xu` + '1000000', `postforum` = `postforum` + '50' ,`exp`= `exp` +'1000' WHERE `id` = '".$user_id."'");
mysql_query("UPDATE `quadangnhap` SET `3` = '1', `time` = '$time' WHERE `user_id` = '".$user_id."'");
}else{
echo'<div class="omenu">Bạn đã nhận quà rồi!!</div>';
}
}
}
if($id==5){
if($res['tichluy']<5){
echo'<div class="omenu">Bạn chưa đủ ngày để nhận quà !!</div>';
}else{
if($res['5']!=1){
echo'<div class="omenu"><center><font color="red"><b>Nhận quà thành công</b></font></center>Bạn nhận được 1.500.000 xu, 1500 kinh nghiệm !</div>';
mysql_query("UPDATE `users` SET `xu` = `xu` + '1500000', `postforum` = `postforum` + '100' ,`exp`= `exp` +'1500' WHERE `id` = '".$user_id."'");
mysql_query("UPDATE `quadangnhap` SET `5` = '1', `time` = '$time' WHERE `user_id` = '".$user_id."'");
}else{
echo'<div class="omenu">Bạn đã nhận quà rồi!!</div>';
}
}
}
if($id==7){
if($res['tichluy']<7){
echo'<div class="omenu">Bạn chưa đủ ngày để nhận quà !!</div>';
}else{
if($res['7day']!=1){
echo'<div class="omenu"><center><font color="red"><b>Nhận quà thành công</b></font></center>Bạn nhận được 2.000.000 xu, 2000 kinh nghiệm</div>';
mysql_query("UPDATE `users` SET `xu` = `xu` + '2000000',  `postforum` = `postforum` + '200' ,`exp`= `exp` +'2000' WHERE `id` = '".$user_id."'");
mysql_query("UPDATE `quadangnhap` SET `7day` = '1', `time` = '$time' WHERE `user_id` = '".$user_id."'");
}else{
echo'<div class="omenu">Bạn đã nhận quà rồi!!</div>';
}
}
}
if($id==10){
if($res['tichluy']<10){
echo'<div class="omenu">Bạn chưa đủ ngày để nhận quà !!</div>';
}else{
if($res['10']!=1){
echo'<div class="omenu"><center><font color="red"><b>Nhận quà thành công</b></font></center>Bạn nhận được 2.500.000 xu, 2500 kinh nghiệm !</div>';
mysql_query("UPDATE `users` SET `xu` = `xu` + '2500000', `postforum` = `postforum` + '500' ,`exp`= `exp` +'2500' WHERE `id` = '".$user_id."'");
mysql_query("UPDATE `quadangnhap` SET `10` = '1', `time` = '$time' WHERE `user_id` = '".$user_id."'");
}else{
echo'<div class="omenu">Bạn đã nhận quà rồi!!</div>';
}
}
}
}
Require('../../incfiles/end.php');
?>