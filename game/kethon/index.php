<?php
define('_IN_JOHNCMS',1);
$rootpath='../../';

require('../../incfiles/core.php');
$headmod='Khu kết hôn';
$textl='Khu kết hôn';
require('../../incfiles/head.php');
if(!$user_id){
header('Location: /dangnhap.html');
exit;
}
switch($act) {
default:

echo'<div class="phdr">Chức Năng</div>';
echo'<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tr><td width="45px;" class="blog-avatar"><img src="images/chuhon.gif"/></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0"><tbody><tr><td class="current-blog" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div><img src="/images/on.png" alt="online"/><font color="red"> <b> Chủ Hôn </b></font>';
if ($datauser['kichhoat'] ==0 ){ 
echo'<div class="omenu">Vui lòng kích hoạt để sử dụng chức năng</div>';
} else {
echo'<div class="omenu"><a href="?act=tochuc"><img src="/images/vao.png"> Tổ Chức Đám Cưới</a></div>
<div class="omenu"><a href="leduong.php"><img src="/images/vao.png"> Lễ Đường</a></div>

'.(empty($datauser['nguoiyeu']) ? '
<div class="omenu"><a href="?act=kethon"><img src="/images/vao.png"> Gửi lời cầu hôn</a></div>
' : '
<div class="omenu"><a href="?act=nangcap"><img src="/images/vao.png"> Nâng cấp</a></div>
<div class="omenu"><a href="?act=lydi"><img src="/images/vao.png"> Ly dị</a></div>
').'';
}
echo'</div></div></td></tr></tbody></table></td></tr></tbody></table>';
if ($datauser['nguoiyeu']!=0) {
echo'


<div class="phdr"> Kết Hôn - WEDDING </div>
<div class="da">';
if(time() < $datauser['timetim']+300){
echo'<a href="?act=thuhoach"><img src="images/caythutim.png" alt="icon" style="vertical-align: -5px">';
}Else{
echo'<a href="?act=thuhoach"><img src="images/caythutim.png" alt="icon" style="vertical-align: -5px">';
}
echo'    <br/>
    <a href="?act=shop"><img src="images/shopdoi.png" alt="icon" style="vertical-align: -5px">
    </a>
    <a href="?act=ruong"><img src="images/ruongdoi.png" alt="icon" style="vertical-align: -5px">
    </a>
    <br>
</div>
<div class="da">
</div>
';
}
break;
case'tochuc':
echo'<div class="phdr">Hôn lễ</div>';
$leduong = mysql_fetch_array(mysql_query("SELECT * FROM `leduong` WHERE `time`>'0' "));
$time = $leduong['time']+60*60;
if ($datauser['nguoiyeu']==0) {
		echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn chưa có người yêu</div>';
} else {
 $tr=mysql_query("SELECT * FROM `leduong`");
$checktr=mysql_num_rows($tr);
if(isset($_POST['ok'])){
	if ($datauser['luong']<500){
		echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn không đủ lượng</div>';
	} else 
if ($checktr>0) {
	echo'<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Hiện tại đang có hôn lễ diễn ra, vui lòng tổ chức vào lúc  '.date("d/m/Y - H:i", $time).'</div>';


} else {
				echo'<div class="omenu">Tổ chức hôn lễ thành công!!</div>';
      mysql_query("UPDATE `users` SET `viewleduong`='0' ");
  mysql_query("INSERT INTO `leduong` SET `user_id`='".$user_id."', `nguoi_ay`='".$datauser['nguoiyeu']."',`time`='".time()."' ");
mysql_query("UPDATE `users` SET `luong` =`luong`- '500' WHERE `id` = '".$user_id."'");

	}
}

echo'<div class="omenu"> Phí tổ chức đám cưới là 500 lượng! Bạn có muốn tổ chức không?<br><form method="post">
	<input type="submit" name="ok" value="Ok"> </form></div>';
	
}
break;
case'shop':
echo'<div class="phdr"> Shop đôi '.($rights >= 9 ? '[<a href="?act=add"> Thêm đồ</a>]' : '').'</div>';
if(empty($datauser['nguoiyeu'])){
echo'<div class="omenu"> Lỗi ! Đang FA.</div>';
require('../../incfiles/end.php');
exit;
}
$nguoiyeu=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$datauser['nguoiyeu']."'"));
echo'<div class="omenu blue"> Cặp đôi bạn đang có '.number_format($datauser['tim']+$nguoiyeu['tim']).' tim</div>';
$req=mysql_query("SELECT * FROM `shopdoi` ORDER BY `id` DESC LIMIT $start,$kmess");
while($res=mysql_fetch_array($req)){
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$res['vatpham']."'"));
echo'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><img src="/images/shop/'.$shop['id'].'.png">
</td>
<td class="right-info">
<font color="ff007f">Vật phẩm:</font>'.$shop['tenvatpham'].' ('.($shop['timesudung'] ? thoigiantinh(floor($shop['timesudung'])).'' : 'Vĩnh viễn').')<br>
<font color="ff007f">Giá bán:</font>'.number_format($res['tim']).' tim<br>
<a href="?act=mua&id='.$res['id'].'"><input type="submit" name="submit" value="Mua"></a>'.($rights >= 9 ? '<a href="?act=edit&id='.$res['id'].'"> <input type="submit" value="Sửa"></a><a href="?act=del&id='.$res['id'].'"> <input type="submit" value="Xóa"></a>' : '').'</td>
</tr></tbody></table>';
}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `shopdoi`"),0);
if($total > $kmess){
echo'<div class="topmenu">' . functions::pages('?act=shop&page=', $start, $total, $kmess) . '</div>';
}
break;
case'ruong':
echo'<div class="phdr"> Rương đôi</div>';
if(empty($datauser['nguoiyeu'])){
echo'<div class="omenu"> Lỗi ! Đang FA.</div>';
require('../../incfiles/end.php');
exit;
}
$req=mysql_query("SELECT * FROM `ruongdoi` WHERE `user_id`='".$user_id."' OR `muser_id`='".$user_id."' ORDER BY `id` DESC LIMIT 5");
while($res=mysql_fetch_array($req)){

$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$res['vatpham']."'"));

echo'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><img src="/images/shop/'.$shop['id'].'.png">
</td>
<td class="right-info">
<font color="ff007f">Vật phẩm:</font> '.$shop['tenvatpham'].'  ('.($shop['timesudung'] ? thoigiantinh(floor($shop['timesudung'])).'' : 'Vĩnh viễn').')<br>
<form method="post">
<input type="hidden" name="id" value="'.$shop['id'].'">
<input type="hidden" name="id1" value="'.$res['id'].'">
<input type="submit" name="submit" value="Lấy"></form></a></td>
</tr></tbody></table>';

}
if(isset($_POST['submit'])){
$id=$_POST['id'];
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$id."'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$shop['loai']."',
`id_loai`='".$shop['id_loai']."',
`tenvatpham`='".$shop['tenvatpham']."',
`timesudung`='".$shop['timesudung']."',

`id_shop`='".$shop['id']."'
");
if($res['user_id'] == $user_id){
mysql_query("UPDATE `ruongdoi` SET `user_id`='' WHERE `id`='".$id1."'");
}else{
mysql_query("UPDATE `ruongdoi` SET `muser_id`='' WHERE `id`='".$id1."'");
}
echo'<div class="omenu"> Vật phẩm đã được chuyển vào rương.</div>';
}
break;
case'add':
if($rights >= 9){
echo'<div class="phdr"> Thêm đồ</div>';
echo'<form method="post">';
echo'ID shop: <br><input type="number" name="vatpham"><br>';
echo'Tim: <br><input type="number" name="tim"><br>';
echo'<input type="submit" name="add" value="Thêm">';
echo'</form>';
if(isset($_POST['add'])){
$vatpham=$_POST['vatpham'];
$tim=$_POST['tim'];
mysql_query("INSERT INTO `shopdoi` SET
`vatpham`='".$vatpham."',
`tim`='".$tim."'
");
echo'<div class="omenu"> Thêm thành công.</div>';
}
}
break;
case'edit':
if($rights >= 9){
echo'<div class="phdr"> Sửa đồ</div>';
$shopdoi=mysql_fetch_array(mysql_query("SELECT * FROM `shopdoi` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$shopdoi['vatpham']."'"));
$tim=(int)$_POST[tim];

echo'<center><img src="/images/shop/'.$shop['id'].'.png">';
echo'<form method="post">';
echo'Tim: <br><input type="number" name="tim" value="'.$shopdoi['tim'].'"><br>';
echo'<input type="submit" name="edit" value="Sửa">';
echo'</form></center>';
if(isset($_POST['edit'])) {
mysql_query("UPDATE `shopdoi` SET
`tim`='".$tim."'
WHERE `id`='".$id."'
");
echo'<div class="omenu"> Sửa thành công.</div>';
}
}
break;
case'del':
if($rights >= 9){
echo'<div class="phdr"> Xóa đồ</div>';
$shopdoi=mysql_fetch_array(mysql_query("SELECT * FROM `shopdoi` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$shopdoi['vatpham']."'"));
if(isset($_POST['del'])){
mysql_query("DELETE FROM `shopdoi` WHERE `id` = '".$id."'");
header('location: ?act=shop');
}
echo'<center><img src="/images/shop/'.$shop['id'].'.png"><br>
<form method="post">
<input type="submit" value="Xoá" name="del">
</form></center>';
}
break;
case'mua':
echo'<div class="phdr"> Shop đôi</div>';
if(empty($datauser['nguoiyeu'])){
echo'<div class="omenu"> Lỗi ! Đang FA.</div>';
require('../../incfiles/end.php');
exit;
}
$check=mysql_result(mysql_query("SELECT COUNT(*) FROM `shopdoi` WHERE `id`='".$id."'"),0);
if($check < 1){
header('location: index.html');
}
$shopdoi=mysql_fetch_array(mysql_query("SELECT * FROM `shopdoi` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$shopdoi['vatpham']."'"));
$nguoiyeu=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$datauser['nguoiyeu']."'"));
echo'<div class="omenu"><center> <img src="/images/shop/'.$shop['id'].'.png"><br>Bạn có muốn mua item này với giá <b>'.number_format($shopdoi['tim']).' tim  </b>? </div><br>';


echo'<form method="post">';
echo'
<center><input type="submit" name="submit"  value="Mua" class="button" />


</center>';
echo'</form>';
if(isset($_POST['submit'])){
if($datauser['tim'] + $nguoiyeu['tim'] >= $shopdoi['tim']){
mysql_query("INSERT INTO `ruongdoi` SET
`user_id`='".$user_id."',
`muser_id`='".$nguoiyeu['id']."',
`vatpham`='".$shop['id']."'
");
mysql_query("UPDATE `users` SET `tim`=`tim`-'".$shopdoi['tim']."' WHERE `id`='".$user_id."'");
echo'<div class="omenu"> Bạn đã mua thành công. Vật phẩm đã chuyển về rương đôi !!</div>';
}else{
echo'<div class="omenu"> Bạn không đủ tim để mua món đồ này !!</div>';
}
}
break;
case 'thuhoach':
echo'<div class="phdr"> Cây tim</div>';
if(empty($datauser['nguoiyeu'])){
echo'<div class="omenu"> Lỗi ! Đang FA.</div>';
require('../../incfiles/end.php');
exit;
}
echo'<form method="post">
<input type="submit" name="submit" value="Thu hoạch">
</form>';
if(isset($_POST['submit'])){
if(time() < $datauser['timetim']+300){
echo'<div class="omenu"> Lỗi ! Chưa đến thời gian thu hoạch nhé.</div>';
}else{
mysql_query("UPDATE `users` SET `tim`=`tim`+10, `timetim`='".time()."' WHERE `id`='".$user_id."'");
echo'<div class="omenu"> Bạn đã thu 10 tim. 5 phút sau có thể thu hoạch tiếp !!</div>';
}
}
break;
case'nangcap':
/*if($rights < 7){
echo'<div class="omenu red"> Lỗi. Đang bảo trì</div>';
require('../../incfiles/end.php');
exit;
}*/
echo'<div class="phdr"> Nâng cấp nhẫn</div>';
$nguoiyeu=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$datauser['nguoiyeu']."'"));
if(empty($datauser['nguoiyeu'])){
echo'<div class="omenu"> Lỗi ! Đang FA.</div>';
require('../../incfiles/end.php');
exit;
}
$mtim=$datauser['tim']+$nguoiyeu['tim'];
echo'<div class="omenu"> Cặp đôi bạn đang có <b>'.$mtim.' tim</b></div>';
if($datauser['nhan'] == 1)
$tim=500;
if($datauser['nhan'] == 2)
$tim=1000;
if($datauser['nhan'] == 3)
$tim=1500;
if($datauser['nhan'] == 4)
$tim=2000;
if($datauser['nhan'] == 5)
$tim=2500;
if($datauser['nhan'] == 6)
$tim=3000;
if($datauser['nhan'] == 7)
$tim=3500;
if($datauser['nhan'] == 8)
$tim=4000;
if($datauser['nhan'] == 9)
$tim=4500;
if($datauser['nhan'] == 10)
$tim=5000;
if($datauser['nhan'] == 11)
$tim=5500;
if($datauser['nhan'] == 12)
$tim=6000;
if($datauser['nhan'] == 13)
$tim=6500;
if($datauser['nhan'] == 14)
$tim=7000;
if($datauser['nhan'] == 15)
$tim=7500;
if($datauser['nhan'] == 16)
$tim=8000;
if($datauser['nhan'] == 17)
$tim=8500;
if($datauser['nhan'] == 18)
$tim=9000;
echo'<div class="omenu">'.($datauser['nhan'] < 19 ? 'Nâng cấp nhẫn từ <img src="/images/nhancuoi/'.$datauser['nhan'].'.png"> lên <img src="/images/nhancuoi/'.($datauser['nhan']+1).'.png"> cần <b>'.$tim.' tim</b>' : 'Cặp đôi bạn đang sở hữu nhẫn Level MAX <img src="/images/nhancuoi/'.$datauser['nhan'].'.png">').'</div>';
echo'<form method="post">';
echo'<input type="submit" name="submit" value="Nâng cấp">';
echo'</form>';
if(isset($_POST['submit'])){
if($mtim < $tim){
echo'<div class="omenu"> Đôi bạn không đủ tim.</div>';
}else if($datauser['nhan'] >= 19){
echo'<div class="omenu"> Đôi bạn đã đạt level cao nhất !</div>';
}else{
mysql_query("UPDATE `users` SET `tim`=`tim`-'".$tim."' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `users` SET `nhan`=`nhan`+1 WHERE `id`='".$user_id."' OR `id`='".$datauser['nguoiyeu']."'");
echo'<div class="omenu"> Chúc mừng đôi bạn đã nâng cấp nhẫn lên level '.($datauser['nhan']+1).'</div>';
}
}
break;
case 'tim':
echo '<div class="phdr">10 thanh niên FA ngẫu nhiên  <a href="honnhan.php"> [Quay lại]</a></div>';
$req=mysql_query("SELECT * FROM `users` WHERE `nguoiyeu`='0' AND `sex`!='".$datauser['sex']."' ORDER BY RAND() LIMIT 10");
while($res=mysql_fetch_array($req)) {
echo '<div class="omenu"><img src="/avatar/'.$res['id'].'.png" class="avatar_vina">'.nick($res['id']).'<br/><a href="honnhan.php?act=kethon&id='.$res['id'].'"><img src="/images/clan/21.png"> Cầu hôn</a><br/><br/><br/></div>';
}
break;
case 'lydi':
echo '<div class="phdr">Ly hôn</div>';
if ($datauser['nguoiyeu']==0) {
echo '<div class="omenu">Vần còn ế mà!</div>';
} else {
$xxx=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$datauser['nguoiyeu']."'"));
if (isset($_POST['lydi'])) {
if($datauser['luong'] >= 50){
mysql_query("UPDATE `users` SET `nguoiyeu`='0', `nhan`='0', `tim`='0' WHERE `id`='".$user_id."'");
mysql_query("DELETE FROM `kethon` WHERE `user_id`='".$user_id."' AND `nguoi_ay`='".$xxx['id']."' ");
mysql_query("DELETE FROM `kethon` WHERE `user_id`='".$xxx['id']."' AND `nguoi_ay`='".$user_id."' ");

mysql_query("UPDATE `users` SET `nguoiyeu`='0', `nhan`='0', `tim`='0' WHERE `id`='".$xxx['id']."'");
mysql_query("UPDATE `users` SET `luong`=`luong`-'50' WHERE `id`='".$user_id."'");
echo '<div class="omenu">Bạn đã trở thành người tự do</div>';
}else{
echo'<div class="omenu"> Bạn không đủ lượng</div>';
}
}
echo '<form method="post"><center><label style="display: inline-block;text-align: center;"><b style="font-size: 9px;color:red;font-weight:bold;text-align: center;">'.$login.'</b><br><img src="/avatar/'.$user_id.'.png" class="xavt"></label> <img src="/icon/tinhyeu.png"> <label style="display: inline-block;text-align: center;"><b style="font-size: 9px;color:red;font-weight:bold;text-align: center;">'.$xxx['name'].'</b><br><img src="/avatar/'.$datauser['nguoiyeu'].'.png"></label><br/><font color="blue">Hãy suy nghĩ trước khi quyết định bạn nhé....! Ly dị mất 500 lượng</font><br/><input type="submit" class="nut" name="lydi" value="Ly hôn"></center></form>';
}
break;
case 'kethon':
echo '<div class="phdr">Đăng kí kết hôn</div>';
if ($datauser['kichhoat'] ==0 ){ 
echo'<div class="omenu">Vui lòng kích hoạt để sử dụng chức năng</div>';
} else {
if (!$id) {
if (isset($_POST['cauhon'])) {
$ten=trim($_POST['ten']);
$num=mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE LCASE(`name`)='".mysql_real_escape_string(strtolower($ten))."'"));
$xxx=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE LCASE(`name`)='".mysql_real_escape_string(strtolower($ten))."'"));
if (!$num) {
echo '<div class="omenu">Nhân vật không tồn tại!</div>';
} else {
header('Location: ?act=kethon&id='.$xxx['id'].'');
}
}
echo '<form method="post">
<input type="text" placeholder="Tên người ấy..." name="ten"> <input type="submit" value="Cầu hôn" name="cauhon"> </form>';
} else {
$xxx=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$id."'"));
if ($xxx['nguoiyeu']!=0) {
echo '<center>Hoa đã có chủ...!!!</center>';
} else {
if (isset($_POST['cauhon'])) {
$xxx=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$id."'"));
if ($datauser['sex'] == $xxx['sex'] || $datauser['id'] == $xxx['id']){
echo'<center>Nghĩ gì lấy người cùng giới tính ... Gay hay Less à ...!!!</center>';
}else{
if ($datauser['luong']<1500) {
echo '<center>Bạn không đủ 1500 lượng để mua nhẫn!!</center>';
} else {
mysql_query("UPDATE `users` SET `luong`=`luong`-'1500' WHERE `id`='".$user_id."'");
mysql_query("INSERT INTO `kethon` SET `user_id`='".$user_id."',`dongy`='0',`nguoi_ay`='".$id."',`time`='".time()."'");
echo '<center><font color="red">Đã gửi lời câu hôn, hãy đợi câu trả lời từ người ấy</font></center>';
}
}
}
echo '<form method="post"><center><label style="display: inline-block;text-align: center;"><b style="font-size: 9px;color:red;font-weight:bold;text-align: center;">'.$login.'</b><br><img src="/avatar/'.$user_id.'.png"></label> <img src="/icon/tinhyeu.png"> <label style="display: inline-block;text-align: center;"><b style="font-size: 9px;color:red;font-weight:bold;text-align: center;">'.$xxx['name'].'</b><br><img src="/avatar/'.$id.'.png" class="xavt"></label><br/><font color="blue">Lệ phí mua <img src="/icon/nhan.png"> là 1500 lượng, bạn có chắc chắn muốn cầu hôn?</font><br/><input type="submit" class="nut" name="cauhon" value="Cầu hôn"></center></form>';
}
}
}
break;
}
require('../../incfiles/end.php');