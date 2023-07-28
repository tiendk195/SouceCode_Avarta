<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$headmod='Nhiệm vụ hằng ngày';
$textl='Nhiệm vụ hằng ngày';
require('../incfiles/head.php');
if (!$user_id) {
header('Location: /login.php');
exit;
}
echo '<div class="mainblok">';
switch($act) {
default:
echo '';
echo '<div class="phdr">'.$textl.'</div>';
if ($datauser['kichhoat']==0){
echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font>Bạn cần kích hoạt tài khoản</div></div>';
require('../incfiles/end.php');
exit;
}
echo'<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
<tbody><tr><td width="65px;" class="blog-avatar"><img src="/images/thitruong.gif"></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0"><tbody>
<tr><td class="current-blog" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div><img src="/images/on.png" alt="online"><font color="red"><b> Thị Trưởng</b></font><div class="text">
<div class="menu"><a href="?act=mytanthu"><img src="/images/vao.png"> Nhiệm vụ Tân thủ hiện tại</a></div>
<div class="menu"><a href="?act=myhangngay"><img src="/images/vao.png"> Nhiệm vụ Hằng ngày hiện tại</a></div>

<div class="menu"><a href="?act=nhiemvutanthu"><img src="/images/vao.png"> Danh sách Nhiệm vụ Tân thủ</a></div>
<div class="menu"><a href="?act=nhiemvuhangngay"><img src="/images/vao.png"> Danh sách Nhiệm vụ Hằng ngày</a></div>

<div class="menu"><a href="?act=resetnvhn"><img src="/images/vao.png"> Làm mới Nhiệm vụ hằng ngày</a></div>
<div class="menu"><a href="/"><img src="/images/vao.png"> Thoát</a></div>
</div></td></tr></tbody></table></td></tr></tbody></table>';


/*
echo'<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tr><td width="50px;" class="blog-avatar"><img src="/icon/npcnhiemvu.gif"/></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0"><tbody><tr><td class="current-blog" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div><img src="/images/on.png" alt="online"/><font color="red"> <b> NPC Nhiệm Vụ </b></font><div class="text"><div class="omenu"><img src="/icon/vao.png"><a href="?act=nhiemvutanthu"> Nhận nhiệm vụ tân thủ </a></div>
<div class="omenu"><img src="/icon/vao.png"><a href="?act=nhiemvuhangngay"> Nhiệm vụ hằng ngày</a></div><div class="omenu"><img src="/icon/vao.png"><a href="?act=my"> Nhiệm vụ đã nhận </a></div>';
echo'</div></div></td></tr></tbody></table></td></tr></tbody></table>';
*/
break;
case 'add':
if (!$user_id||$rights<9) {
header('Location: /login.php');
exit;
}
echo '<div class="phdr">Thêm nhiệm vụ</div>';
if (isset($_POST['submit'])) {
$tennv=$_POST['tennv'];
$chitiet=$_POST['chitiet'];
$chitietphanthuong=$_POST['chitietphanthuong'];
$hoanthanh=(int)$_POST['hoanthanh'];
$query=$_POST['query'];
$loai=$_POST['loai'];

if (empty($tennv)||empty($chitiet)||empty($chitietphanthuong)||empty($hoanthanh)||empty($query)||empty($loai)) {
echo '<div class="omenu">Nhập đầy đủ đi!</div>';
} else {
mysql_query("INSERT INTO `nhiemvu` SET
`tennhiemvu`='".$tennv."',
`chitiet`='".$chitiet."',
`hoanthanh`='".$hoanthanh."',
`query`='".$query."',
`loai`='".$loai."',

`phanthuong`='".$chitietphanthuong."'");
echo '<div class="omenu">Thêm thành công!</div>';
}
}
echo '<form method="post">
Tên nhiệm vụ: <input type="text" name="tennv"><br/>
Chi tiết: <input type="text" name="chitiet"><br/>
Chi tiết phần thưởng: <input type="text" name="chitietphanthuong"><br/>
Hoàn thành: <input type="number" name="hoanthanh"><br/>
Query: <textarea name="query"></textarea><br/>

Loại: <textarea name="loai"></textarea><br/>

<input type="submit" name="submit" value="Thêm">
</form>';
break;
case 'chitiet':
$id=(int)$_GET['id'];
$check=mysql_fetch_array(mysql_query("SELECT * FROM `nhiemvu` WHERE `loai`!='hangngay' AND `id`='".$id."'"));
if ($check<1) {
echo '<div class="omenu">Không có nhiệm vụ này!</div></div>';
require('../incfiles/end.php');
exit;
}
echo '<div class="phdr">Chi tiết nhiệm vụ</div>';
$res=mysql_fetch_array(mysql_query("SELECT * FROM `nhiemvu` WHERE `id`='".$id."'"));
if (isset($_POST['nhan'])) {
$checknhan=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='".$res['id']."'"));
if ($checknhan>0) {
echo '<div class="omenu">Bạn đã nhận nhiệm vụ này rồi!</div>';
} else {
mysql_query("INSERT INTO `nhiemvu_user` SET
`user_id`='".$user_id."',
`loai`='tanthu',

`id_nv`='".$res['id']."'");
echo '<div class="omenu">Nhận thành công nhiệm vụ <b>'.$res['tennhiemvu'].'</b> <a href="nhiemvu.php"><input type="button" value="Quay lại"></a></div>';
}
}
echo'<div class="omenu"><b><font color="darkviolet"><center>Chi tiết Nhiệm vụ</center></font></b>
<br><b><font color="ff3399">Nhiệm vụ '.$res['id'].' :  </font></b><br>
<b><font color="#003366">Tên nhiệm vụ: </font></b>'.$res['tennhiemvu'].'</br>
<b><font color="#003366">Chi tiết: </font></b>'.$res['chitiet'].'<center>';
if ($checknhan>0) {
echo'<input id="submit" type="submit" name="submit" value="Đã nhận">';
} else {
	echo'
	<form method="post">
<input type="submit" name="nhan" value="Nhận nhiệm vụ">
</form>';
}
echo'</center></div>';


break;
case 'chitietnv':
$id=(int)$_GET['id'];
$check=mysql_fetch_array(mysql_query("SELECT * FROM `nhiemvu` WHERE `loai`!='tanthu' AND `id`='".$id."'"));
if ($check<1) {
echo '<div class="omenu">Không có nhiệm vụ này!</div></div>';
require('../incfiles/end.php');
exit;
}
echo '<div class="phdr">Chi tiết nhiệm vụ</div>';
$res=mysql_fetch_array(mysql_query("SELECT * FROM `nhiemvu` WHERE `id`='".$id."'"));
if (isset($_POST['nhan'])) {
$checknhan=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `loai`='hangngay'"));
if ($checknhan>0) {
echo '<div class="omenu">Bạn đã nhận nhiệm vụ này rồi!</div>';
} else {
mysql_query("INSERT INTO `nhiemvu_user` SET
`user_id`='".$user_id."',
`loai`='hangngay',
`id_nv`='".$res['id']."'");
echo '<div class="omenu">Nhận thành công nhiệm vụ <b>'.$res['tennhiemvu'].'</b> <a href="nhiemvu.php"><input type="button" value="Quay lại"></a></div>';
}
}
echo '<div class="menu">Tên nhiệm vụ: <b>'.$res['tennhiemvu'].'</b></div>';
echo '<div class="menu">Phần thưởng: <b>'.$res['phanthuong'].'</b></div>';
echo '<div class="menu">Chi tiết nhiệm vụ: <b>'.$res['chitiet'].'</b></div>';
echo '<form method="post">
<input type="submit" name="nhan" value="Nhận nhiệm vụ">
</form>';
break;
case 'nhiemvutanthu':
echo '<div class="phdr">Nhận nhiệm vụ</div>';
$req=mysql_query("SELECT * FROM `nhiemvu` WHERE `loai`='tanthu'");
$i=1;
while ($res=mysql_fetch_array($req)) {
	$check=mysql_fetch_array(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='".$res['id']."'"));
echo'<div class="omenu"><b><font color="#003366">Nhiệm vụ tân thủ '.$i.':</font> </b>
<br><b><font color="ff3399">Phần thưởng :</font></b>  '.$res['phanthuong'].'<center>';
if ($check>=1) {
	echo'<input type="submit" value="Đã nhận"></a>';
} else {
echo'
<a href="?act=chitiet&amp;id='.$res['id'].'"><input type="submit" value="Chi tiết"></a>';
}
echo'</div>';
++$i;
}
break;
case 'resetnvhn':
echo'<div class="phdr">Reset nhiệm vụ hằng ngày</div>';
if ($datauser['solanrsnv']==0){
	$tien=0;
} if ($datauser['solanrsnv']>=1){
	$tien=$datauser['solanrsnv']*15;
}
if (isset($_POST['reset'])) {
if ($datauser['luongkhoa']<$tien) {
		echo'<div class="omenu">Bạn không đủ tiền!</div>';
} else {
       mysql_query("DELETE FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `loai`='hangngay'");
       mysql_query("UPDATE  `timenhiemvuhn`SET `time`='0'  WHERE `user_id`='".$user_id."' ");
mysql_query("UPDATE `users` SET `luongkhoa`=`luongkhoa`- '".$tien."',`solanrsnv`=`solanrsnv`+'1' WHERE `id`='".$user_id."' ");

echo '<div class="omenu">Reset thành công <a href="nhiemvu.php?act=nhiemvuhangngay">Nhấp vào đây để nhận nhiệm vụ mới</a></div>';

}
}
	
	
echo '<center><div class="omenu"><b>Reset nhiệm vụ với '.$tien.' lượng khóa?</b>';
echo '<form method="post">
<input type="submit" name="reset" value="Đồng ý">
</form>';

echo'</div></center>';


break;
case 'khoitao':
echo'<div class="phdr">Khởi tạo nhiệm vụ hằng ngày</div>';
$rand = rand(4,10);
$rand1 = rand(4,10);

$rand2 = rand(4,10);

	$check=mysql_fetch_array(mysql_query("SELECT * FROM `timenhiemvuhn` WHERE `user_id`='".$user_id."'"));

if ($check['time']!=0){
	echo'<div class="omenu">Bạn đã khởi tạo nhiệm vụ hằng ngày rồi, mỗi ngày chỉ khởi tạo được 1 lần!</div>';
	echo'</div>';
	require('../incfiles/end.php');
exit;
}

mysql_query("INSERT INTO `timenhiemvuhn` SET
`user_id`='".$user_id."',
`time`='".time()."'");
mysql_query("INSERT INTO `nhiemvu_user` SET
`user_id`='".$user_id."',
`loai`='hangngay',
`id_nv`='".$rand."'");
mysql_query("INSERT INTO `nhiemvu_user` SET
`user_id`='".$user_id."',
`loai`='hangngay',
`id_nv`='".$rand1."'");
mysql_query("INSERT INTO `nhiemvu_user` SET
`user_id`='".$user_id."',
`loai`='hangngay',
`id_nv`='".$rand2."'");
echo '<div class="omenu">Khới tạo thành công <a href="nhiemvu.php?act=myhangngay">Xem nhiệm vụ tại đây</a></div>';


break;
case 'nhiemvuhangngay':
echo '<div class="phdr">Nhận nhiệm vụ</div>';
	$check=mysql_fetch_array(mysql_query("SELECT * FROM `timenhiemvuhn` WHERE `user_id`='".$user_id."'"));
$timers= $check['time']+60*60*24;
if ($check['time']!=0){

echo'<div class="omenu"><font color="red">Thời gian reset nhiệm vụ:  '.date("d/m/Y - H:i", $timers).' </font></div>';
}
if ($check['time']==0){
	echo'<div class="omenu">Bạn chưa nhận nhiệm vụ hằng ngày nào! <a href="?act=khoitao">Bấm để khởi tạo</a></div>';
	echo'</div>';
	require('../incfiles/end.php');
exit;
}
	echo'<div class="omenu">Bạn đã nhận nhiệm vụ hằng ngày rồi! <a href="?act=my">Bấm vào đây để xem</a></div>';

break;
case 'nhanthuong':
$id=(int)$_GET['id'];
$check=mysql_fetch_array(mysql_query("SELECT * FROM `nhiemvu` WHERE `id`='".$id."'"));
if ($check<1) {
echo '<div class="omenu">Không có nhiệm vụ này!</div>';
require('../incfiles/end.php');
exit;
}
echo '<div class="phdr">Nhận thưởng nhiệm vụ</div>';
$res=mysql_fetch_array(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `id_nv`='".$id."' AND `user_id`='".$user_id."'"));
$nv=mysql_fetch_array(mysql_query("SELECT * FROM `nhiemvu` WHERE `id`='".$id."'"));
$nhan=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `id_nv`='".$id."' AND `user_id`='".$user_id."'"));
if ($res['nhanthuong']==1) {
echo '<div class="omenu">Bạn đã nhận thưởng nhiệm vụ <b>'.$nv['tennhiemvu'].'</b> rồi nhé <a href="nhiemvu.php"><input type="button" value="Quay lại"></a></div>';
} else if ($nhan<1) {
echo '<div class="omenu">Bạn chưa nhận nhiệm vụ này nhé <a href="nhiemvu.php"><input type="button" value="Quay lại"></a></div>';
} else if($res['tiendo']<$nv['hoanthanh']) {
echo '<div class="omenu">Bạn chưa hoàn thành nhiệm vụ <a href="nhiemvu.php"><input type="button" value="Quay lại"></a></div>';
} else {
$query=$nv['query'];
$query = str_replace('$user_id', $user_id, $query);
$query2=$nv['query2'];
$query2 = str_replace('$user_id', $user_id, $query2);
//Thực hiện đoạn query trong data
mysql_query($query);
mysql_query($query2);

//Check vào
mysql_query("UPDATE `nhiemvu_user` SET `nhanthuong`='1' WHERE `user_id`='".$user_id."' AND `id_nv`='".$res['id_nv']."'");
echo '<div class="omenu">Nhận thưởng thành công nhiệm vụ <b>'.$nv['tennhiemvu'].'</b> <a href="nhiemvu.php"><input type="button" value="Quay lại"></a></div>';
}
break;
case 'mytanthu':
echo '<div class="phdr">Nhiệm vụ của tôi</div>';
echo'<div class="omenu"><center><font color="red">Nhiệm vụ tân thủ hiện tại của bạn là:</font></center></div>';
$req=mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`!='0' AND `nhanthuong`!='1' AND `loai`='tanthu'");
$i=1;
while ($res=mysql_fetch_array($req)) {
$nv=mysql_fetch_array(mysql_query("SELECT * FROM `nhiemvu` WHERE `id`='".$res['id_nv']."' "));

echo'<div class="omenu">
<b><font color="ff3399"> Nhiệm vụ tân thủ '.$i.' </font></b><br>
<b><font color="#003366">Chi tiết: </font></b>'.$nv['chitiet'].'<br>
<b><font color="green">Phần thưởng: </font></b>'.$nv['phanthuong'].'<br>
<b><font color="blue"> Tiến độ: ( '.$res['tiendo'].' / '.$nv['hoanthanh'].' )</font><center>';
if ($res['tiendo']>=$nv['hoanthanh']){
echo'<a href="?act=nhanthuong&id='.$res['id_nv'].'"><input type="submit" value="Nhận thưởng"></a><br/>';
} else {
echo'<input  type="submit" value="Chưa hoàn thành">';
}
echo'</center></b></div>';
++$i;

}
break;
case 'myhangngay':
echo '<div class="phdr">Nhiệm vụ của tôi</div>';
$check=mysql_fetch_array(mysql_query("SELECT * FROM `timenhiemvuhn` WHERE `user_id`='".$user_id."'"));
$timers= $check['time']+60*60*24;
if ($check['time']!=0){
echo'<div class="omenu"><font color="red">Thời gian reset nhiệm vụ:  '.date("d/m/Y - H:i", $timers).' </font></div>';
}
if ($check['time']==0){
	echo'<div class="omenu">Bạn chưa nhận nhiệm vụ hằng ngày nào! <a href="?act=khoitao">Bấm để khởi tạo</a></div>';
	echo'</div>';
	require('../incfiles/end.php');
exit;
}
echo'<div class="omenu"><center><font color="red">Nhiệm vụ hằng ngày hiện tại của bạn là:</font></center></div>';

$req=mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`!='0' AND `nhanthuong`!='1' AND `loai`='hangngay'");
$i=1;
while ($res=mysql_fetch_array($req)) {
$nv=mysql_fetch_array(mysql_query("SELECT * FROM `nhiemvu` WHERE `id`='".$res['id_nv']."'"));

echo'<div class="omenu">
<b><font color="ff3399"> Nhiệm vụ hằng ngày '.$i.' </font></b><br>
<b><font color="#003366">Chi tiết: </font></b>'.$nv['chitiet'].'<br>
<b><font color="green">Phần thưởng: </font></b>'.$nv['phanthuong'].'<br>
<b><font color="blue"> Tiến độ: ( '.$res['tiendo'].' / '.$nv['hoanthanh'].' )</font><center>';
if ($res['tiendo']>=$nv['hoanthanh']){
echo'<a href="?act=nhanthuong&id='.$res['id_nv'].'"><input type="submit" value="Nhận thưởng"></a><br/>';
} else {
echo'<input  type="submit" value="Chưa hoàn thành">';
}
echo'</center></b></div>';

++$i;
}
break;
}
echo '</div>';
require('../incfiles/end.php');
?>