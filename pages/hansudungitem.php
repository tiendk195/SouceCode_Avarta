<?php
////--Mod hạn sử dụng by pkoolvn--////
if($time2 == 600 or $time2 == 700 or $time2 == 800 or $time2 == 900 or $time2 == 1000 or $time2 == 1100 or $time2 == 1200 or $time2 == 1300 or $time2 == 1400 or $time2 == 1500 or $time2 == 1600 or $time2 == 1700 or $time2 == 1800 or $time2 == 1900 or $time2 == 2000 or $time2 == 2100 or $time2 == 2200 or $time2 == 2300){
$time = time();
//--delete item khi het han--//
mysql_query("DELETE FROM `kho` WHERE `timesudung`<'".$time."' AND `timesudung`!='0'");
//--set item khi het han--//
$checkao=mysql_num_rows(mysql_query("SELECT * FROM `kho` WHERE `loai`='ao' AND `ten`='".$datauser['ao']."' AND `idnick`='".$user_id."'"));
$checkquan=mysql_num_rows(mysql_query("SELECT * FROM `kho` WHERE `loai`='quan' AND `ten`='".$datauser['quan']."' AND `idnick`='".$user_id."'"));
$checknon=mysql_num_rows(mysql_query("SELECT * FROM `kho` WHERE `loai`='non' AND `ten`='".$datauser['non']."' AND `idnick`='".$user_id."'"));
$checkdocamtay=mysql_num_rows(mysql_query("SELECT * FROM `kho` WHERE `loai`='docamtay' AND `ten`='".$datauser['docamtay']."' AND `idnick`='".$user_id."'"));
$checkthucung=mysql_num_rows(mysql_query("SELECT * FROM `kho` WHERE `loai`='thucung' AND `ten`='".$datauser['thucung']."' AND `idnick`='".$user_id."'"));
$checkhaoquang=mysql_num_rows(mysql_query("SELECT * FROM `kho` WHERE `loai`='haoquang' AND `ten`='".$datauser['haoquang']."' AND `idnick`='".$user_id."'"));
$checkmat=mysql_num_rows(mysql_query("SELECT * FROM `kho` WHERE `loai`='mat' AND `ten`='".$datauser['mat']."' AND `idnick`='".$user_id."'"));
$checkmatna=mysql_num_rows(mysql_query("SELECT * FROM `kho` WHERE `loai`='matna' AND `ten`='".$datauser['matna']."' AND `idnick`='".$user_id."'"));
$checkkinh=mysql_num_rows(mysql_query("SELECT * FROM `kho` WHERE `loai`='kinh' AND `ten`='".$datauser['kinh']."' AND `idnick`='".$user_id."'"));
$checktoc=mysql_num_rows(mysql_query("SELECT * FROM `kho` WHERE `loai`='toc' AND `ten`='".$datauser['toc']."' AND `idnick`='".$user_id."'"));
$checkkhuonmat=mysql_num_rows(mysql_query("SELECT * FROM `kho` WHERE `loai`='khuonmat' AND `ten`='".$datauser['khuonmat']."' AND `idnick`='".$user_id."'"));
$checkcanh=mysql_num_rows(mysql_query("SELECT * FROM `kho` WHERE `loai`='canh' AND `ten`='".$datauser['canh']."' AND `idnick`='".$user_id."'"));

if ($checkao < 1) {
mysql_query("UPDATE `users` SET `ao`='' WHERE `id`='".$user_id."'");
}
if ($checkquan < 1) {
mysql_query("UPDATE `users` SET `quan`='' WHERE `id`='".$user_id."'");
}
if ($checknon < 1) {
mysql_query("UPDATE `users` SET `non`='' WHERE `id`='".$user_id."'");
}
if ($checkdocamtay < 1) {
mysql_query("UPDATE `users` SET `docamtay`='' WHERE `id`='".$user_id."'");
}
if ($checkthucung < 1) {
mysql_query("UPDATE `users` SET `thucung`='' WHERE `id`='".$user_id."'");
}
if ($checkhaoquang < 1) {
mysql_query("UPDATE `users` SET `haoquang`='' WHERE `id`='".$user_id."'");
}
if ($checkmat > 10000) {
mysql_query("UPDATE `users` SET `mat`='' WHERE `id`='".$user_id."'");
}
if ($checkmatna < 1) {
mysql_query("UPDATE `users` SET `matna`='' WHERE `id`='".$user_id."'");
}
if ($checkkinh < 1) {
mysql_query("UPDATE `users` SET `kinh`='' WHERE `id`='".$user_id."'");
}
if ($checktoc < 1) {
mysql_query("UPDATE `users` SET `toc`='' WHERE `id`='".$user_id."'");
}
if ($checkkhuonmat < 1) {
mysql_query("UPDATE `users` SET `khuonmat`='' WHERE `id`='".$user_id."'");
}
if ($checkcanh < 1) {
mysql_query("UPDATE `users` SET `canh`='' WHERE `id`='".$user_id."'");
}

}

////--DONE--pkoolvn--////
?>