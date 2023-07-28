<?php
define('_IN_JOHNCMS', 1);
$textl = '1STPay';
require('../incfiles/core.php');
require('../incfiles/head.php');
if(!$user_id){
require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}

$quanli = mysql_fetch_array(mysql_query("select * from `1STPay_quanli` where `id` = '1' "));

switch($act) {
case 'add':
    ?>
    <script src="http://werfamily.tk/js/khung-code-2.1.1jquery.min.js"></script>
<script src="http://werfamily.tk/js/khung-code-clipboard.js"></script>
<script>
$(function(){
new Clipboard('.copy-text');
});
</script>
    <?php
if($datauser['id'] == 1 ) {
echo '<div class="phdr">Tạo thẻ 1STPay</div>';
if (isset($_POST['add'])) {
$menhgia= (int)$_POST['menhgia'];
$pin =rand(100000000,999999999);

$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `1STPay` where `pin` = '".$pin.""), 0);
if (empty($menhgia)) {
echo '<div class="omenu">Không được bỏ trống chỗ nào hết!</div>';
} else if($check == 1 || $check == 3){
echo '<div class="omenu">Lỗi vui lòng tạo lại</div>';
} else {
if($user_id == 1 ) {
mysql_query("INSERT INTO `1STPay` SET
`pin`= '".$pin."',
`menhgia`='".$menhgia."',`user_tao`= '{$user_id}',`timetao`='".time()."'");
}
echo'<div class="codeHeader clo">
<pre class="code clo" id="p1"><div class="gd_"><div class="pmenu"><center>
Thẻ 1STPay mệnh giá '.number_format($menhgia).' VNĐ</br>
Mã PIN: '.$pin.'</br>
Thời gian tạo: '.date("d/m/Y - H:i", time()).'</center></div></div>
</pre><center><a class="copy-text" data-clipboard-target="#p1" href="javascript:void(0);"><i class="fa fa-files-o"></i> Copy</a></center></div>';


}
}
echo '<div class="omenu"><form method="post">';
echo 'Mệnh giá: <select name="menhgia">
<option value = "10000">10,000đ</option><option value = "20000">20,000đ</option><option value = "50000">50,000đ</option><option value = "100000">100,000đ</option>
<option value = "200000">200,000đ</option><option value = "500000">500,000đ</option></select><br>';
echo '<input type="submit" name="add" value="Tạo Card"></div>';
echo '</form>';
}
include'../incfiles/end.php';
exit;

break;
case 'lichsunap':

echo'<div class="phdr"><i class="fa fa-line-chart"></i> Lịch sử nạp thẻ</div>';

$res=mysql_query("SELECT * FROM `1STPay` WHERE `user`='".$user_id."' AND `sudung`='1' ORDER BY `id`");
$n=mysql_num_rows(mysql_query("SELECT * FROM `1STPay` WHERE `user`='".$user_id."' AND `sudung`='1' "));
IF($n<1){
echo'<div class="omenu">Lịch sử trống</div>';
} else {
    echo'<div style="overflow: auto;height:200px">';
echo'<div class="omenu"><table border="3" align="center;" style="width:100%; padding-right: 10px; padding-left: 10px;"><tbody><tr><th bgcolor="#99FFFF"><center>Mệnh giá</center></th><th bgcolor="#99FFFF"><center>Mã PIN</center></th>
<th bgcolor="#99FFFF"><center>Mã giao dịch</center></th>
<th bgcolor="#99FFFF"><center>Loại tiền tệ</center></th>
<th bgcolor="#99FFFF"><center>Thời gian nạp</center></th>
<th bgcolor="#99FFFF"><center>Trạng thái</center></th>
</tr>';

while ($post = mysql_fetch_array($res)){
    echo'<tr><td><center><font color="red">Thẻ 1STPay '.number_format($post['menhgia']).' VNĐ</font></center></td>

<td><center>'.$post['pin'].'</center></td>
<td><center>'.$post['id'].'</center></td>

<td><center>'.$post['loainap'].'</center></td>
<td><center><span class="blog-time">'.date("d/m/Y - H:i", $post['timenhap']).'</span></center></td>
<td><center><i class="fa fa-check-circle"></i></center></td>
</tr>';

    
}
echo'</tbody></table></div>';
echo'</div>';

}

break;
case 'xoa':
if ($datauser['id']!=1 ) {
header('Location: /index.php');
exit;
}
	mysql_query("DELETE FROM `1STPay` WHERE `sudung`='1' ");

break;
case 'edit':
if ($datauser['id']!=1) {
header('Location: /index.php');
exit;
}
echo'<div class="phdr">Edit hệ thống</div>';
echo'<div class="omenu">';
$res=mysql_fetch_array(mysql_query("SELECT * FROM `1STPay_quanli` WHERE `id`='1'"));

if (isset($_POST[sua])) {
@mysql_query("UPDATE `1STPay_quanli` SET
`khuyenmai`='".$_POST[khuyenmai]."',
`quanap`='".$_POST[quanap]."',
`ngaybd`='".$_POST[ngaybd]."',
`ngaykt`='".$_POST[ngaykt]."',

`idshop`='".$_POST[idshop]."'
WHERE `id`='1'
");
	mysql_query("UPDATE `users` SET `viewthongbao` = '0' where `id`>'0'");
	mysql_query("UPDATE `users` SET `nhanquanap` = '0' where `id`>'0'");

echo '<div class="omenu">Edit thành công! </div>';
}
echo '<form method="post">';
echo 'Ngày bắt đầu: <input type="number" name="ngaybd" value="'.$res[ngaybd].'"><br/>';
echo 'Ngày kết thúc: <input type="number" name="ngaykt" value="'.$res[ngaykt].'"><br/>';

echo 'Khuyến mãi: <input type="number" name="khuyenmai" value="'.$res[khuyenmai].'"><br/>';
echo 'Nạp trên bao nhiêu được quà: <input type="number" name="quanap" size="3" value="'.$res[quanap].'"><br/>';
echo 'Quà nạp: <select name="idshop">';
$tenvp=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$res['idshop']."'"));
echo '<option value="'.$res['idshop'].'">'.$res['idshop'].' '.$tenvp['tenvatpham'].'</option>';
$cvp=mysql_query("SELECT * FROM `shopdo` WHERE `hienthi`='1'");
while ($showcvp=mysql_fetch_array($cvp)) {
echo '<option value="'.$showcvp['id'].'">'.$showcvp['id'].' '.$showcvp['tenvatpham'].'</option>';
}
echo '</select><br/>';



echo '<input type="submit" name="sua" value="Sửa">';
echo '</form>';
echo'</div>';


break;
case 'lichsu':
if ($datauser['id']!=1) {
header('Location: /index.php');
}
echo'<div class="phdr">Lịch sử</div>';

$res=mysql_query("SELECT * FROM `1STPay` WHERE `id`!='0' ORDER BY `id` DESC LIMIT $start,$kmess");



while ($post = mysql_fetch_array($res)){
    	$t2= mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` where  `id`= '" . $post[id_shop] . "'"));

    echo'<div class="omenu">';
echo'<b>Mã PIN: </b>'.$post['pin'].'</a></br>';
echo'<b>Mệnh giá: </b>'.number_format($post['menhgia']).' VNĐ</a></br>';

echo'<b>Người tạo: </b><a href="/member/'.$post[user_tao].'.html" >'.nick($post['user_tao']).' </a></br>
';
if ($post['sudung']==1) {
echo'
<b>Người nhập: </b><a href="/member/'.$post[user].'.html" >'.nick($post['user']).' </a></br>

<b>Thời gian nhập:  '.date("d/m/Y - H:i", $post['timenhap']).'</b></br>';
}
echo'<b>Thời gian tạo :  '.date("d/m/Y - H:i", $post['timetao']).'</b></div>';
}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `1STPay` WHERE `id`!=0"), 0);
IF($total > $kmess){
Echo'<div class="phdr">'.functions::pages('?act=lichsu&page=', $start, $total, $kmess).'</div>';
}
default:



echo '<div class="phdr"><b>NẠP thẻ 1STPay - <a href="?act=lichsunap">[ Lịch Sử Nạp ]</a></b></div>';
if ($quanli['khuyenmai']>=1){
	echo '<div class="lethinh"><b><font color="brown"><marquee behavior="alternate" scrollamount="2" position: absolute; width: 500px;" onmouseover="this.stop();" onmouseout="this.start();"><b>Hiện tại đang khuyến mãi '.$quanli['khuyenmai'].'% giá trị thẻ nạp ( từ ngày '.$quanli['ngaybd'].' đến '.$quanli['ngaykt'].')</b></marquee></font></b></div>';
}
	
if ($quanli['quanap']>0 && $quanli['idshop']>0){
$quanap=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$quanli['idshop']."'"));

echo '<div class="lt">Nạp trên '.number_format($quanli['quanap']).'VNĐ nhận '.$quanap[tenvatpham].'</div>';
}
echo'<div class="omenu">
<font color="red"><b>Admin:</b></font> Thẻ 1STPay chỉ duy nhất do <font color="red">Admin</font> Thitran9x.tk cung cấp! <br><br>

<form method="post"><center>
<input type="number" name="pin" placeholder="Mã PIN">
<br><input type="submit" name="napxu" value="Nạp Xu"><input type="submit" name="napvnd" value="Nạp Lượng"></br><input type="submit" name="napvndkhoa" value="Nạp Lượng Khóa"></center></form></div>';
if (isset($_POST['napxu'])) {
$loai='xu';
$pin=($_POST['pin']);
$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `1STPay` where `pin` = '".$pin."' "), 0);
$p = mysql_fetch_array(mysql_query("select * from `1STPay` where `pin` = '".$pin."' "));
$menhgia = $p['menhgia'];

////Tính tiền
$tien = ($menhgia == 10000 ? '2000000':NULL).
            ($menhgia == 20000 ? '5000000':NULL). 
            ($menhgia == 50000 ? '14000000':NULL).
			            ($menhgia == 100000 ? '30000000':NULL).

            ($menhgia == 200000 ? '70000000':NULL).

            ($menhgia == 500000 ? '300000000':NULL);


$diem = ($menhgia == 10000 ? '0':NULL).
            ($menhgia == 20000 ? '1':NULL). 
            ($menhgia == 50000 ? '3':NULL).
            ($menhgia == 100000 ? '9':NULL).
            ($menhgia == 200000 ? '9':NULL).
            ($menhgia == 500000 ? '9':NULL);
if($quanli['khuyenmai'] >= 1){
$tkm=$tien*$quanli['khuyenmai']/100;
$tien=$tien+$tkm;
}


if (empty($pin)) {
echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn chưa nhập mã PIN</div>';
} else if($check == 0){
echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Thẻ không tồn tại</div>';
} else if($p['sudung'] == 1){
echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Thẻ đã được sử dụng</div>';
} else {
echo'<div class="omenu"><b>Bạn đã nạp thành công thẻ 1STPay<font color="red">'.$menhgia.'</font>, Bạn nhận được '.number_format($tien).' '.$loai.' và <img src="/images/vatpham/60.png">'.$menhgia.' Bảo ngọc nạp thẻ';
if ($quanli['quanap']>0 && $quanli['idshop']>0 && $datauser['nhanquanap']==0){


if($menhgia >= $quanli['quanap']){
$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$quanli['idshop']."'"));
@mysql_query("UPDATE users SET `nhanquanap`='1' WHERE `id`='{$user_id}'");

		echo'<br><font color="green">Chúc mừng bạn nhận được '.$do['tenvatpham'].' </font>';

 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='0'
");
$text='Chúc mừng bạn nhận được '.$do['tenvatpham'].' từ quà nạp thẻ ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
}
}
echo'</b></div>';

///Update mysql
$bot='@'.$user_id.' vừa nạp thành công Thẻ [b]1STPay '.number_format($menhgia).'VNĐ [/b]';
mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
@mysql_query("UPDATE users SET `$loai`=`$loai`+'$tien',`dabaongoc`=`dabaongoc`+'$menhgia', `naptuan`=`naptuan`+'$menhgia' ,`diemnapthe`=`diemnapthe`+'$menhgia' ,`naptichluy`=`naptichluy` +'$menhgia' WHERE `id`='{$user_id}'");
mysql_query("UPDATE `1STPay` SET `loainap`=  'xu',`sudung`='1',`timenhap`='".time()."',`user`= '{$user_id}' WHERE `id` = '".$p['id']."'");
}
}
//Nạp lượng
if (isset($_POST['napvnd'])) {
$loai='luong';

$pin=($_POST['pin']);
$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `1STPay` where `pin` = '".$pin."' "), 0);
$p = mysql_fetch_array(mysql_query("select * from `1STPay` where `pin` = '".$pin."' "));
$menhgia = $p['menhgia'];

////Tính tiền

$tien = ($menhgia == 10000 ? '500':NULL).
            ($menhgia == 20000 ? '1500':NULL). 
            ($menhgia == 50000 ? '7500':NULL).
        	            ($menhgia == 100000 ? '25000':NULL).

            ($menhgia == 200000 ? '70000':NULL).

            ($menhgia == 500000 ? '200000':NULL);

$diem = ($menhgia == 10000 ? '0':NULL).
            ($menhgia == 20000 ? '1':NULL). 
            ($menhgia == 50000 ? '3':NULL).
            ($menhgia == 100000 ? '9':NULL).
            ($menhgia == 200000 ? '9':NULL).
            ($menhgia == 500000 ? '9':NULL);
if($quanli['khuyenmai'] >= 1){
$tkm=$tien*$quanli['khuyenmai']/100;
$tien=$tien+$tkm;
}


if (empty($pin)) {
echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn chưa nhập mã PIN</div>';
} else if($check == 0){
echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Thẻ không tồn tại</div>';
} else if($p['sudung'] == 1){
echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Thẻ đã được sử dụng</div>';
} else {
echo'<div class="omenu"><b>Bạn đã nạp thành công thẻ 1STPay<font color="red">'.$menhgia.'</font>, Bạn nhận được '.number_format($tien).' '.$loai.' và <img src="/images/vatpham/60.png">'.$menhgia.' Bảo ngọc nạp thẻ';
if ($quanli['quanap']>0 && $quanli['idshop']>0 && $datauser['nhanquanap']==0){


if($menhgia >= $quanli['quanap']){
$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$quanli['idshop']."'"));
@mysql_query("UPDATE users SET `nhanquanap`='1' WHERE `id`='{$user_id}'");

		echo'<br><font color="green">Chúc mừng bạn nhận được '.$do['tenvatpham'].' </font>';

 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='0'
");
$text='Chúc mừng bạn nhận được '.$do['tenvatpham'].' từ quà nạp thẻ ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
}
}

echo'</b></div>';

///Update mysql
$bot='@'.$user_id.' vừa nạp thành công Thẻ [b]1STPay '.number_format($menhgia).'VNĐ [/b]';
mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
@mysql_query("UPDATE users SET `$loai`=`$loai`+'$tien',`dabaongoc`=`dabaongoc`+'$menhgia', `naptuan`=`naptuan`+'$menhgia' ,`diemnapthe`=`diemnapthe`+'$menhgia' ,`naptichluy`=`naptichluy` +'$menhgia' WHERE `id`='{$user_id}'");
mysql_query("UPDATE `1STPay` SET `loainap`=  'lượng',`sudung`='1',`timenhap`='".time()."',`user`= '{$user_id}' WHERE `id` = '".$p['id']."'");
}
}
// Nạp lượng khóa
if (isset($_POST['napvndkhoa'])) {
$loai='luongkhoa';

$pin=($_POST['pin']);
$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `1STPay` where `pin` = '".$pin."' "), 0);
$p = mysql_fetch_array(mysql_query("select * from `1STPay` where `pin` = '".$pin."' "));
$menhgia = $p['menhgia'];

////Tính tiền

$tien = ($menhgia == 10000 ? '350':NULL).
            ($menhgia == 20000 ? '770':NULL). 
            ($menhgia == 50000 ? '2100':NULL).
        	            ($menhgia == 100000 ? '5250':NULL).

            ($menhgia == 200000 ? '11900':NULL).

            ($menhgia == 500000 ? '31000':NULL);

$diem = ($menhgia == 10000 ? '0':NULL).
            ($menhgia == 20000 ? '1':NULL). 
            ($menhgia == 50000 ? '3':NULL).
            ($menhgia == 100000 ? '9':NULL).
            ($menhgia == 200000 ? '9':NULL).
            ($menhgia == 500000 ? '9':NULL);
if($quanli['khuyenmai'] >= 1){
$tkm=$tien*$quanli['khuyenmai']/100;
$tien=$tien+$tkm;
}


if (empty($pin)) {
echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn chưa nhập mã PIN</div>';
} else if($check == 0){
echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Thẻ không tồn tại</div>';
} else if($p['sudung'] == 1){
echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Thẻ đã được sử dụng</div>';
} else {
echo'<div class="omenu"><b>Bạn đã nạp thành công thẻ 1STPay<font color="red">'.$menhgia.'</font>, Bạn nhận được '.number_format($tien).' '.$loai.' và <img src="/images/vatpham/60.png">'.$menhgia.' Bảo ngọc nạp thẻ';

if ($quanli['quanap']>0 && $quanli['idshop']>0 && $datauser['nhanquanap']==0){


if($menhgia >= $quanli['quanap']){
$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$quanli['idshop']."'"));
@mysql_query("UPDATE users SET `nhanquanap`='1' WHERE `id`='{$user_id}'");

		echo'<br><font color="green">Chúc mừng bạn nhận được '.$do['tenvatpham'].' </font>';

 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='0'
");
$text='Chúc mừng bạn nhận được '.$do['tenvatpham'].' từ quà nạp thẻ ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
}
}
echo'</b></div>';

///Update mysql
$bot='@'.$user_id.' vừa nạp thành công Thẻ [b]1STPay '.number_format($menhgia).'VNĐ [/b]';
mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
@mysql_query("UPDATE users SET `$loai`=`$loai`+'$tien',`dabaongoc`=`dabaongoc`+'$menhgia', `naptuan`=`naptuan`+'$menhgia' ,`diemnapthe`=`diemnapthe`+'$menhgia' ,`naptichluy`=`naptichluy` +'$menhgia' WHERE `id`='{$user_id}'");
mysql_query("UPDATE `1STPay` SET `loainap`=  'lượng khóa', `sudung`='1',`timenhap`='".time()."',`user`= '{$user_id}' WHERE `id` = '".$p['id']."'");
}
}
if($datauser['id'] == 1   ){
echo'<div class="omenu"><a href="?act=add">Tạo thẻ 1STPay</a> - <a href="?act=lichsu">Xem lịch sử</a> - <a href="?act=xoa">Xóa thẻ đã sử dụng</a> - <a href="?act=edit">Chỉnh sửa hệ thống</a> </div>';
}

}
require('../incfiles/end.php');

?>
<style>
    #test {
    width: auto;
    height: auto;
    overflow-y: auto;
}
</style>
<style>
.codeHeader{border:1px solid #e0e0e0;border-bottom:0;text-align:right;padding:2px}
.copy-text{font-size:14px;cursor:pointer;color:#e6e6e6;padding:0 12px;border-left:1px solid #e0e0e0}
.copy-text:hover{color:#707070}
.the-text{float:left;padding:0 0 0 10px;color:#d6d6d6;font-weight:bold}
pre.code{display:block;background-color:#565b63;max-height:210px;font-size:14px;text-align:left;overflow:overlay;border:1px solid #d3d6db;margin:auto;padding:16px;line-height:21px;white-space:normal;font-style:italic;-webkit-user-modify:read-write-plaintext-only}
.clo{background-color:#506073;color:#ccc9c9}
.css{background-color:#4c9e91;color:#9bd2c8}
.css:hover{background-color:#597571;color:#fff}
.java{background-color:#566a8a;color:#dcd288}
.java:hover{background-color:#808fa9;color:#fff}
.html{background-color:#8b7ca0;color:#ae9fff}
.html:hover{background-color:#61596d;color:#fff}
</style>