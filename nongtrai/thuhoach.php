<?php
define('_IN_JOHNCMS', 1);
$textl = 'Thu hoạch';
require_once('../incfiles/core.php');
require('../incfiles/head.php');

if (!$user_id){
echo'<div class="menu">Chỉ dành cho thành viên diễn đàn! Hãy đăng ký để tham gia nhé</div>';
require('../incfiles/end.php');
exit;
}

$time = time();
$user = mysql_query("SELECT * FROM `users` WHERE `id` = '" .$user_id. "'");
$tv = mysql_fetch_array($user);



$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `fermer_gr` WHERE `semen` != '0' AND `id_user` = '".$user_id."' "),0);
if ($check == '0') {
echo '<div class="mainblok"><div class="phdr"><b>Thu hoạch hàng loạt &raquo;</b></div>
<div class="menu">Các ô đất chưa có cây trồng, không thể thu hoạch, hãy gieo hạt trước đã nhé</div>
<div class="rmenu"><a href="index.php">&raquo; Quay lại</a>
</div></div>';
}
else {
$check1 = mysql_query("SELECT * FROM `fermer_gr` WHERE `semen` != '0' AND `id_user` = '".$user_id."' ORDER BY `id` ASC");
$mang = array();
$i = 0;
while ($check2 = mysql_fetch_array($check1)) {
$bien = $check2['id'];
$mang[] = "$bien";
++$i;
}

$demmang = count($mang);
$mang2= array();

for ($i2 = 0; $i2 <= ($demmang-1); $i2++) {
$xuat = $mang[$i2];
$check3 = mysql_query("SELECT * FROM `fermer_gr` WHERE `semen` != '0' AND `id_user` = '".$user_id."' AND `id` = '".$xuat."' LIMIT 1");
$check4 = mysql_fetch_array($check3);
$loaisp = $check4['semen'];
$res1 = mysql_query("select * from `fermer_name` WHERE `id` = '".$loaisp."' LIMIT 1");
$post1 = mysql_fetch_array($res1);
$tgsinhtruong = $post1['time'];
$tgtrong = $check4['time'];
$tgcheck = $tgtrong+$tgsinhtruong;

if ($time > $tgcheck) {
$bien2 = $check4['id'];
$mang2[] = "$bien2";
}
}

$demmang2 = count($mang2);

if ($demmang2 == 0) {
echo '<div class="mainblok"><div class="phdr"><b>Thu hoạch hàng loạt &raquo;</b></div>
<div class="menu">Chưa có cây trồng nào trưởng thành, không thể thu hoạch!</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {

if (!isset($_POST['submit'])) {

echo '<div class="mainblok"><div class="phdr"><b>Thu hoạch hàng loạt &raquo;</b></div><div class="menu">
<form method="POST" action="thuhoach.php">';
echo 'Hiện có <b>'.$demmang2.'</b> ô đất có cây trồng đã trưởng thành, bạn có muốn thu hoạch toàn bộ không?';
echo '<br/><input type="submit" name="submit" value="Thu hoạch" /></form>';
echo '</div>
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';
}
else {

for ($i3 = 0; $i3 <= ($demmang2-1); $i3++) {
$xuat2 = $mang2[$i3];
$check5 = mysql_query("SELECT * FROM `fermer_gr` WHERE `semen` != '0' AND `id_user` = '".$user_id."' AND `id` = '".$xuat2."' LIMIT 1");
$check6 = mysql_fetch_array($check5);
$loaisp2 = $check6['semen'];
$res2 = mysql_query("select * from `fermer_name` WHERE `id` = '".$loaisp2."' LIMIT 1");
$post2 = mysql_fetch_array($res2);
if ($check6['woter'] == '0') $sanluong = $post2['rand1'];
else $sanluong = $post2['rand2'];

	$randkem=rand (1,$sanluong);

$khogiong = mysql_query("select * from `fermer_sclad` WHERE `semen` = '".$post2['id']."' AND `id_user` = '".$user_id."' ");
$res = mysql_num_rows($khogiong);
if ($res != '0') {
mysql_query("UPDATE `fermer_sclad` SET `kol` = `kol`+'".$sanluong."' WHERE `semen` = '".$post2['id']."' AND `id_user` = '".$user_id."'");
} else {
mysql_query("INSERT INTO `fermer_sclad` (`kol`,`semen`, `id_user`) VALUES  ( '".$sanluong."', '".$post2['id']."', '".$user_id."') ");
}
mysql_query("UPDATE `fermer_gr` SET `semen` = '0', `kol` = '0', `woter` = '0', `time` = '0' WHERE `id` = '".$xuat2."' AND `id_user` = '".$user_id."' LIMIT 1");

  //mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$randkem."' WHERE `user_id`='".$user_id."' AND `id_shop` = '104'");


}
echo '<div class="mainblok"><div class="phdr"><b>Thu hoạch hàng loạt &raquo;</b></div>
<div class="menu">Thu hoạch thành công, nông sản đã được chuyển vào kho của bạn</div>';

$checknv3=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='19'"));
if ($checknv3>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='19'");
}
/*
$randsn=rand(1,10);
	if ($datauser['gioihanthuhoach']<40){
		if ($randsn==1){
		    echo' <div class="omenu">Bạn nhận được 1 số 1 yêu thương <img src="/images/vatpham/158.png"></br></div>';
mysql_query("UPDATE `users` SET `gioihanthuhoach` =`gioihanthuhoach` + '1'  WHERE `id` = '{$user_id}'");
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '158'");

	}
	}
*/
/*sk 1-6
echo'
<div class="menu">Bạn nhận được '.$randkem.' <img src="/images/vatpham/104.png"> Kem giải nhiệt </div>';
*/
///ngoc rong
    if ($datauser['matna']=='254'){
         $randnr=rand(1,5);
   
    } else {
    $randnr=rand(1,9);
    }
    if ($randnr==1){
       echo'<script>alert("Bạn nhận được ngọc rồng 7 sao");</script>';
     mysql_query("UPDATE `vatpham` SET `soluong`=`soluong` +'1' WHERE `user_id`='{$user_id}' AND `id_shop`='275'");
}
//ngoc rong
/*
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '242'");

		  $text='Bạn đã nhận được 1 Bóng thường  từ Thu hoạch cây trồng ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
*/

echo'
<div class="rmenu">&raquo; <a href="index.php">Quay lại</a>
</div></div>';


}
}








}



require('../incfiles/end.php');

?>