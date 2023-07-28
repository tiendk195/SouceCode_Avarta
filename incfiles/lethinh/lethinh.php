<?php
//Đấu giá
$dg = mysql_query("SELECT * FROM `daugia` WHERE `timeend` < '".time()."'");
while($check = mysql_fetch_array($dg)){ 
$win = mysql_fetch_array(mysql_query("SELECT `user_id`,`id` FROM `daugia_act` WHERE `iddg` = '".$check['id']."' ORDER BY `cost` DESC LIMIT 1"),0);
$arr = mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id` = '".$check['idvp']."'"),0);
                mysql_query("INSERT INTO `khodo` SET 
               `user_id`='" . $win['user_id']. "',
               `id_loai`='" . $arr['id_loai'] . "',
               `loai`='" . $arr['loai'] . "',
               `id_shop`='" . $arr['id']. "',
               `tenvatpham` = '".$arr['tenvatpham']."'
               "); 
         
              
               
                              $text='Đã kết thúc phiên đấu giá #'.$check['id'].'. Xin chúc mừng bạn nào may mắn nhé B-)';

mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");
               $text='Chúc mừng bạn đã dành chiến thắng trong phiên đấu giá #'.$check['id'].'. Bạn nhận được <b>'.$arr['tenvatpham'].'</b>  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$win['user_id']."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
                              $text='Đã kết thúc phiên đấu giá #'.$check['id'].'. Xin chúc mừng bạn nào may mắn nhé B-)';

@mysql_query("INSERT INTO `guest` SET `time` = '".time()."', `text` = '".$text."', `user_id` = 2");
$cost = $check['loaitien'];
$lay = mysql_query("SELECT `cost`,`user_id` FROM `daugia_act` WHERE `iddg` = '".$check['id']."' AND `id` != '".$win['id']."'");
while($cong = mysql_fetch_array($lay)){ 
$c = $cong['cost']; 
@mysql_query("UPDATE users SET $cost = $cost+$c WHERE `id` = '".$cong['user_id']."'");
   $text='Chia buồn bạn vì đã không dành chiến thắng trong phiên đấu giá #'.$check['id'].'. Bạn nhận được <b>'.number_format($c).' '.$cost.'</b>  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$cong['user_id']."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
} 
mysql_query("DELETE FROM `daugia_act` WHERE `iddg`='".$check['id']."'");
      mysql_query("DELETE FROM `daugia` WHERE `id`='".$check['id']."'");
}
// Mod hạn sử dụng đồ
$time = time();
mysql_query("DELETE FROM `khodo` WHERE `timesudung`<'".$time."' AND `timesudung`!='0'");
mysql_query("UPDATE `vatpham` SET `soluong` = '0' WHERE `timesudung`<'".$time."' AND `timesudung`!='0'");
mysql_query("UPDATE `khokhung` SET `soluong` = '0' WHERE `timesudung`<'".$time."' AND `timesudung`!='0'");
$checkao=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `loai`='ao' AND `timesudung`<'".$time."' AND `timesudung`!='0' AND `user_id`='".$user_id."'"));
$checkquan=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `loai`='quan' AND `timesudung`<'".$time."' AND `timesudung`!='0' AND `user_id`='".$user_id."'"));
$checknon=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `loai`='non' AND `timesudung`<'".$time."' AND `timesudung`!='0' AND `user_id`='".$user_id."'"));
$checkdocamtay=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `loai`='docamtay' AND `timesudung`<'".$time."' AND `timesudung`!='0' AND `user_id`='".$user_id."'"));
$checkthucung=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `loai`='thucung' AND `timesudung`<'".$time."' AND `timesudung`!='0' AND `user_id`='".$user_id."'"));
$checkhaoquang=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `loai`='haoquang' AND `timesudung`<'".$time."' AND `timesudung`!='0' AND `user_id`='".$user_id."'"));
$checkmat=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `loai`='mat' AND `timesudung`<'".$time."' AND `timesudung`!='0' AND `user_id`='".$user_id."'"));
$checkmatna=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `loai`='matna' AND `timesudung`<'".$time."' AND `timesudung`!='0' AND `user_id`='".$user_id."'"));
$checkkinh=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `loai`='kinh' AND `timesudung`<'".$time."' AND `timesudung`!='0' AND `user_id`='".$user_id."'"));
$checktoc=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `loai`='toc' AND `timesudung`<'".$time."' AND `timesudung`!='0' AND `user_id`='".$user_id."'"));
$checkkhuonmat=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `loai`='khuonmat' AND `timesudung`<'".$time."' AND `timesudung`!='0' AND `user_id`='".$user_id."'"));
$checkcanh=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `loai`='canh' AND `timesudung`<'".$time."' AND `timesudung`!='0' AND `user_id`='".$user_id."'"));
$checknensau=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `loai`='nensau' AND `timesudung`<'".$time."' AND `timesudung`!='0' AND `user_id`='".$user_id."'"));
$checkcancau=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `loai`='cancau' AND `timesudung`<'".$time."' AND `timesudung`!='0' AND `user_id`='".$user_id."'"));
if ($checkao>0) {
mysql_query("UPDATE `users` SET `ao`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `timesudung`='0',`id_loai`='',`id_ruong`='' WHERE `user_id`='".$user_id."' AND `loai`='ao'");
}
if ($checkquan>0) {
mysql_query("UPDATE `users` SET `quan`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `timesudung`='0',`id_loai`='',`id_ruong`='' WHERE `user_id`='".$user_id."' AND `loai`='quan'");
}
if ($checknon>0) {
mysql_query("UPDATE `users` SET `non`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `timesudung`='0',`id_loai`='',`id_ruong`='' WHERE `user_id`='".$user_id."' AND `loai`='non'");
}
if ($checkdocamtay>0) {
mysql_query("UPDATE `users` SET `docamtay`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `timesudung`='0',`id_loai`='',`id_ruong`='' WHERE `user_id`='".$user_id."' AND `loai`='docamtay'");
}
if ($checkthucung>0) {
mysql_query("UPDATE `users` SET `thucung`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `timesudung`='0',`id_loai`='',`id_ruong`='' WHERE `user_id`='".$user_id."' AND `loai`='thucung'");
}
if ($checkhaoquang>0) {
mysql_query("UPDATE `users` SET `haoquang`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `timesudung`='0',`id_loai`='',`id_ruong`='' WHERE `user_id`='".$user_id."' AND `loai`='haoquang'");
}
if ($checkmat>0) {
mysql_query("UPDATE `users` SET `mat`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `timesudung`='0',`id_loai`='',`id_ruong`='' WHERE `user_id`='".$user_id."' AND `loai`='mat'");
}
if ($checkmatna>0) {
mysql_query("UPDATE `users` SET `matna`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `timesudung`='0',`id_loai`='',`id_ruong`='' WHERE `user_id`='".$user_id."' AND `loai`='matna'");
}
if ($checkkinh>0) {
mysql_query("UPDATE `users` SET `kinh`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `timesudung`='0',`id_loai`='',`id_ruong`='' WHERE `user_id`='".$user_id."' AND `loai`='kinh'");
}
if ($checktoc>0) {
mysql_query("UPDATE `users` SET `toc`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `timesudung`='0',`id_loai`='',`id_ruong`='' WHERE `user_id`='".$user_id."' AND `loai`='toc'");
}
if ($checkkhuonmat>0) {
mysql_query("UPDATE `users` SET `khuonmat`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `timesudung`='0',`id_loai`='',`id_ruong`='' WHERE `user_id`='".$user_id."' AND `loai`='khuonmat'");
}
if ($checkcanh>0) {
mysql_query("UPDATE `users` SET `canh`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `timesudung`='0',`id_loai`='',`id_ruong`='' WHERE `user_id`='".$user_id."' AND `loai`='canh'");
}
if ($checknensau>0) {
mysql_query("UPDATE `users` SET `nensau`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `timesudung`='0',`id_loai`='',`id_ruong`='' WHERE `user_id`='".$user_id."' AND `loai`='nensau'");
}
if ($checkcancau>0) {
mysql_query("UPDATE `users` SET `cancau`='' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `dangmac` SET `timesudung`='0',`id_loai`='',`id_ruong`='' WHERE `user_id`='".$user_id."' AND `loai`='cancau'");
}
//Vị trí
$checkvt=mysql_num_rows(mysql_query("SELECT * FROM `vitri` WHERE `user_id`='".$user_id."'"));
if ($checkvt<1) {
mysql_query("INSERT INTO `vitri` SET
`user_id`='".$user_id."'");
}
//Check

//End
//--Thêm data đang mặc--//
//áo
$checkdangmac=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='ao'"));
if ($checkdangmac<1) {
mysql_query("INSERT INTO `dangmac` SET `user_id`='".$user_id."', `loai`='ao'");
}
//quần
$checkdangmac=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='quan'"));
if ($checkdangmac<1) {
mysql_query("INSERT INTO `dangmac` SET `user_id`='".$user_id."', `loai`='quan'");
}
//cánh
$checkdangmac=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='canh'"));
if ($checkdangmac<1) {
mysql_query("INSERT INTO `dangmac` SET `user_id`='".$user_id."', `loai`='canh'");
}
//đồ cầm tay
$checkdangmac=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='docamtay'"));
if ($checkdangmac<1) {
mysql_query("INSERT INTO `dangmac` SET `user_id`='".$user_id."', `loai`='docamtay'");
}
//thú cưng
$checkdangmac=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='thucung'"));
if ($checkdangmac<1) {
mysql_query("INSERT INTO `dangmac` SET `user_id`='".$user_id."', `loai`='thucung'");
}
//hào quang
$checkdangmac=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='haoquang'"));
if ($checkdangmac<1) {
mysql_query("INSERT INTO `dangmac` SET `user_id`='".$user_id."', `loai`='haoquang'");
}
//mặt nạ
$checkdangmac=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='matna'"));
if ($checkdangmac<1) {
mysql_query("INSERT INTO `dangmac` SET `user_id`='".$user_id."', `loai`='matna'");
}
//kính
$checkdangmac=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='kinh'"));
if ($checkdangmac<1) {
mysql_query("INSERT INTO `dangmac` SET `user_id`='".$user_id."', `loai`='kinh'");
}
//khuôn mặt
$checkdangmac=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='khuonmat'"));
if ($checkdangmac<1) {
mysql_query("INSERT INTO `dangmac` SET `user_id`='".$user_id."', `loai`='khuonmat'");
}
//tóc
$checkdangmac=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='toc'"));
if ($checkdangmac<1) {
mysql_query("INSERT INTO `dangmac` SET `user_id`='".$user_id."', `loai`='toc'");
}
//tóc
$checkdangmac=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='mat'"));
if ($checkdangmac<1) {
mysql_query("INSERT INTO `dangmac` SET `user_id`='".$user_id."', `loai`='mat'");
}
//nón
$checkdangmac=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='non'"));
if ($checkdangmac<1) {
mysql_query("INSERT INTO `dangmac` SET `user_id`='".$user_id."', `loai`='non'");
}
//nền sau
$checkdangmac=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='nensau'"));
if ($checkdangmac<1) {
mysql_query("INSERT INTO `dangmac` SET `user_id`='".$user_id."', `loai`='nensau'");
}
//cần câu
$checkdangmac=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='cancau'"));
if ($checkdangmac<1) {
mysql_query("INSERT INTO `dangmac` SET `user_id`='".$user_id."', `loai`='cancau'");
}
//rương dự phòng
//áo
$checkruongduphong=mysql_num_rows(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='".$user_id."' AND `loai`='ao'"));
if ($checkruongduphong<1) {
mysql_query("INSERT INTO `ruongduphong` SET `user_id`='".$user_id."', `loai`='ao'");
}
//quần
$checkruongduphong=mysql_num_rows(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='".$user_id."' AND `loai`='quan'"));
if ($checkruongduphong<1) {
mysql_query("INSERT INTO `ruongduphong` SET `user_id`='".$user_id."', `loai`='quan'");
}
//cánh
$checkruongduphong=mysql_num_rows(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='".$user_id."' AND `loai`='canh'"));
if ($checkruongduphong<1) {
mysql_query("INSERT INTO `ruongduphong` SET `user_id`='".$user_id."', `loai`='canh'");
}
//đồ cầm tay
$checkruongduphong=mysql_num_rows(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='".$user_id."' AND `loai`='docamtay'"));
if ($checkruongduphong<1) {
mysql_query("INSERT INTO `ruongduphong` SET `user_id`='".$user_id."', `loai`='docamtay'");
}
//thú cưng
$checkruongduphong=mysql_num_rows(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='".$user_id."' AND `loai`='thucung'"));
if ($checkruongduphong<1) {
mysql_query("INSERT INTO `ruongduphong` SET `user_id`='".$user_id."', `loai`='thucung'");
}
//hào quang
$checkruongduphong=mysql_num_rows(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='".$user_id."' AND `loai`='haoquang'"));
if ($checkruongduphong<1) {
mysql_query("INSERT INTO `ruongduphong` SET `user_id`='".$user_id."', `loai`='haoquang'");
}
//mặt nạ
$checkruongduphong=mysql_num_rows(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='".$user_id."' AND `loai`='matna'"));
if ($checkruongduphong<1) {
mysql_query("INSERT INTO `ruongduphong` SET `user_id`='".$user_id."', `loai`='matna'");
}
//kính
$checkruongduphong=mysql_num_rows(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='".$user_id."' AND `loai`='kinh'"));
if ($checkruongduphong<1) {
mysql_query("INSERT INTO `ruongduphong` SET `user_id`='".$user_id."', `loai`='kinh'");
}
//khuôn mặt
$checkruongduphong=mysql_num_rows(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='".$user_id."' AND `loai`='khuonmat'"));
if ($checkruongduphong<1) {
mysql_query("INSERT INTO `ruongduphong` SET `user_id`='".$user_id."', `loai`='khuonmat'");
}
//tóc
$checkruongduphong=mysql_num_rows(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='".$user_id."' AND `loai`='toc'"));
if ($checkruongduphong<1) {
mysql_query("INSERT INTO `ruongduphong` SET `user_id`='".$user_id."', `loai`='toc'");
}
//tóc
$checkruongduphong=mysql_num_rows(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='".$user_id."' AND `loai`='mat'"));
if ($checkruongduphong<1) {
mysql_query("INSERT INTO `ruongduphong` SET `user_id`='".$user_id."', `loai`='mat'");
}
//nón
$checkruongduphong=mysql_num_rows(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='".$user_id."' AND `loai`='non'"));
if ($checkruongduphong<1) {
mysql_query("INSERT INTO `ruongduphong` SET `user_id`='".$user_id."', `loai`='non'");
}
//nền sau
$checkruongduphong=mysql_num_rows(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='".$user_id."' AND `loai`='nensau'"));
if ($checkruongduphong<1) {
mysql_query("INSERT INTO `ruongduphong` SET `user_id`='".$user_id."', `loai`='nensau'");
}
//cần câu
$checkdangmac=mysql_num_rows(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='".$user_id."' AND `loai`='cancau'"));
if ($checkdangmac<1) {
mysql_query("INSERT INTO `ruongduphong` SET `user_id`='".$user_id."', `loai`='cancau'");
}
//--Update HP AND SM--//
$tongsm = $datauser['smthem'];
$tonghp = $datauser['hpthem'];
$uphpsm=mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."'");
while($crossover=mysql_fetch_array($uphpsm)) {
$ruong=mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `id`='".$crossover['id_ruong']."'"));
$tongsm+=$ruong['sucmanh'];
$tonghp+=$ruong['hp'];
}
if ($datauser['suckhoe']>100){
mysql_query("UPDATE `users` SET `suckhoe`='100' WHERE `id`='".$user_id."'");
}
if ($datauser['gayroi']>100){
mysql_query("UPDATE `users` SET `gayroi`='100' WHERE `id`='".$user_id."'");
}
if ($datauser['hp']>$datauser['hpfull']) {
mysql_query("UPDATE `users` SET `hp`='".$datauser['hpfull']."' WHERE `id`='".$user_id."'");
}
mysql_query("UPDATE `users` SET `sucmanh`='".$tongsm."' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `users` SET `hpfull`='".$tonghp."' WHERE `id`='".$user_id."'");
if ($datauser[hp]<0) {
mysql_query("UPDATE `users` SET `hp`='0' WHERE `id`='".$user_id."'");
}
//update dự phòng

$querydo=mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='".$user_id."'");
while($updo=mysql_fetch_array($querydo)) {
$checkruong=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `id`='".$updo['id_ruong']."' AND `user_id`='".$user_id."'"));
if ($checkruong<1) {
mysql_query("UPDATE `ruongduphong` SET `id_loai`='',`id_ruong`='',`timesudung`='' WHERE `user_id`='".$user_id."' AND `loai`='".$updo['loai']."'");
}
if (!isset($_GET['xem_ok'])) {
mysql_query("UPDATE `users` SET `".$updo['loai']."`='".$updo['id_loai']."' WHERE `id`='".$user_id."'");
}
}
//--Update đồ--//
$querydo=mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."'");
while($updo=mysql_fetch_array($querydo)) {
$checkruong=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `id`='".$updo['id_ruong']."' AND `user_id`='".$user_id."'"));
if ($checkruong<1) {
mysql_query("UPDATE `dangmac` SET `id_loai`='',`id_ruong`='',`timesudung`='' WHERE `user_id`='".$user_id."' AND `loai`='".$updo['loai']."'");
}
if (!isset($_GET['xem_ok'])) {
mysql_query("UPDATE `users` SET `".$updo['loai']."`='".$updo['id_loai']."' WHERE `id`='".$user_id."'");
}
}
//--Khu sinh thái--//
//rương cá
$checkca1=mysql_num_rows(mysql_query("SELECT * FROM `fish_ruong` WHERE `user_id`='".$user_id."' AND `id_ca`='1'"));
if ($checkca1<1) {
mysql_query("INSERT INTO `fish_ruong` SET `user_id`='".$user_id."', `id_ca`='1'");
}
$checkca2=mysql_num_rows(mysql_query("SELECT * FROM `fish_ruong` WHERE `user_id`='".$user_id."' AND `id_ca`='2'"));
if ($checkca2<1) {
mysql_query("INSERT INTO `fish_ruong` SET `user_id`='".$user_id."', `id_ca`='2'");
}
$checkca3=mysql_num_rows(mysql_query("SELECT * FROM `fish_ruong` WHERE `user_id`='".$user_id."' AND `id_ca`='3'"));
if ($checkca3<1) {
mysql_query("INSERT INTO `fish_ruong` SET `user_id`='".$user_id."', `id_ca`='3'");
}
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time = time();
$gio = date("Hi");

//Quà đăng nhập
$req = mysql_query("SELECT * FROM `quadangnhap` WHERE `user_id` = '$user_id'");
while($res = mysql_fetch_array($req)){
if($res['time']+3600*24 <= time()){
$time = time();
mysql_query("UPDATE `quadangnhap` SET `tichluy` = `tichluy` + '1', `time` = '$time' WHERE `user_id` = '".$user_id."'");
}
}

//Bot online
mysql_query("UPDATE `users` SET $sql `total_on_site` = '$totalonsite', `lastdate` = ". time() . " WHERE `id` = '2'");
mysql_query("UPDATE `users` SET $sql `total_on_site` = '$totalonsite', `lastdate` = ". time() . " WHERE `id` = '3'");

//Level
$_exp_lv = array(
1 => '20000',
2 => '25000',
3 => '30000',
4 => '40000',
5 => '50000',
6 => '70000',
7 => '100000',
8 => '125000',
9 => '150000',
10 => '200000',
11 => '255000',
12 => '295000',
13 => '320000',
14 => '350000',
15 => '385000',
16 => '4350000',
17 => '4750000',
18 => '5150000',
19 => '5550000',
20 => '6000000',
21 => '6200000',
22 => '6500000',
23 => '7950000',
24 => '8350000',
25 => '8750000',
25 => '9000000',
26 => '9500000',
27 => '10000000',
28 => '12500000',
29 => '18500000',
30 => '22500000',
31 => '28500000',
32 => '33500000',
33 => '39500000',
34 => '45500000',
35 => '50000000',
36 => '55000000',
37 => '60000000',
38 => '66000000',
39 => '70000000',
40 => '80000000',
41 => '88000000',
42 => '99000000',
43 => '111000000',
44 => '123450000',
45 => '180000000',
46 => '200000000',
47 => '222000000',
48 => '234000000',
49 => '250000000',
50 => '300000000',
);

$_level = $datauser['level'];
$_lv_up = $datauser['level'] + 1;
$_exp = $datauser['exp'];
$_exp_all = $_exp_lv[$datauser['level']];
$_exp_new = $_exp - $_exp_all;
$_chiso = $_exp / $_exp_all * 100;

mysql_query("UPDATE `users` SET `chisolevel` = $_chiso WHERE `id` = $user_id");
if($_exp >= $_exp_all) {
mysql_query("UPDATE `users` SET `exp` = $_exp_new WHERE `id` = $user_id");
if($_exp >= $_exp_all) {
mysql_query("UPDATE `users` SET `tongexp` = `tongexp` + $_exp_all WHERE `id` = $user_id");
} else {
mysql_query("UPDATE `users` SET `tongexp` = `tongexp` + $_exp_new WHERE `id` = $user_id");
}
mysql_query("UPDATE `users` SET `level` = $_lv_up WHERE `id` = $user_id");
$text='Chúc mừng bạn đã lên level <b>'.$_lv_up.'</b>. Bạn nhận được 100 tim <img src="https://i.imgur.com/ZL9ehAx.gif"> và 200 SM, 200 HP';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");

mysql_query("UPDATE `users` SET `chisolevel` = '0' WHERE `id` = $user_id");
mysql_query("UPDATE `users` SET `tim1st` = `tim1st` + '100' WHERE `id` = $user_id");

mysql_query("UPDATE `users` SET `hp` = `hp` + '200' WHERE `id` = $user_id");
mysql_query("UPDATE `users` SET `hpthem` = `hpthem` + '200' WHERE `id` = $user_id");
mysql_query("UPDATE `users` SET `hpfull` = `hpfull` + '200' WHERE `id` = $user_id");
mysql_query("UPDATE `users` SET `sucmanh` = `sucmanh` + '200' WHERE `id` = $user_id");
mysql_query("UPDATE `users` SET `smthem` = `smthem` + '200' WHERE `id` = $user_id");

}
?>