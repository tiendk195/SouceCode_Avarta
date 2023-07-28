<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$textl='Mã quà tặng Gift Code';
require('../incfiles/head.php');
echo '<div class="mainblok">';
if (!$user_id) {
header('Location: /index.php');
exit;
}
//mod by lethinhpro

    ?> <script language="javascript">
	$(document).ready(function(){
		$('.tt9x').on('click','#lethinhpro',function(){
				var gift = $("#gift").val();

			$.ajax({
				url: 'code-load.php',
				type: 'POST',
				dataType: 'text',
				data: {
				    gift : gift,
					submit: ""
				},
				success: function(result){
					$('.tt9x').html(result);
				}
			});
			return false;
		});
	});
</script>  <?php

switch($act) {
default:
echo '<div class="phdr"><b>Nhận quà từ mã gift</b></div>';


$ma = functions::checkout($_POST['gift']);
$req = mysql_query("SELECT * FROM `magift` WHERE `ma`='".$ma."'");
$dem = mysql_num_rows($req);
$res = mysql_fetch_array($req);
echo '<div class="omenu"><div class="tt9x">';


if(isset($_POST['submit'])) {
    $ma=($_POST['gift']);
    $req = mysql_query("SELECT * FROM `magift` WHERE `ma`='".$ma."'");
$dem = mysql_num_rows($req);
$res = mysql_fetch_array($req);


if(empty($ma)) {
echo '<center><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập mã vào ô</center>';
} else if($dem == 0) {
echo '<center><font color="red"><b>Lỗi!!</b></font> Mã gift không tồn tại hoặc đã được sử dụng!</center>';
} else if($res['loaigift'] != 0) {

if ($datauser['giftdungchung']==1){
  echo '<center><font color="red"><b>Lỗi!!</b></font> Bạn chỉ được phép nhập mã này 1 lần!</center>';  
} else {

mysql_query("UPDATE `users` SET `xu`=`xu` + '".$res['xu']."' WHERE `id`='".$user_id."'");

mysql_query("UPDATE `users` SET `luong`=`luong`+'".$res['luong']."' WHERE `id`='".$user_id."'");
	mysql_query("UPDATE `users` SET `giftdungchung`='1' WHERE `id`='".$user_id."'");

echo '<center><div class="omenu"><b>Nhận thưởng thành công công!</b><br>' . 'Với mã gift này bạn sẽ nhận được'.($res['xu'] != 0 ? '<b> '.$res['xu'].' xu</b>':'').' '.($res['xu'] != 0 && $res['luong'] != 0 ? '<b>và </b>':'').''.($res['luong'] != 0 ? '<b>'.$res['luong'].' lượng </b>':'').'cộng vào tài khoản!</div></center>';
	$text='Bạn đã nhận được được'.($res['xu'] != 0 ? '<b> '.$res['xu'].' xu</b>':'').' '.($res['xu'] != 0 && $res['luong'] != 0 ? '<b>và </b>':'').''.($res['luong'] != 0 ? '<b>'.$res['luong'].' lượng </b>':'').' từ mã gif: '.$ma.'  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
//lịch sử chuyển
mysql_query("INSERT INTO `ls_nhapcode` SET
`user_id`='".$user_id."',
`code`='$ma',
`xu`='".$res['xu']."',
`luong`='".$res['luong']."',
`user_tao`='".$res['user']."',
`loaicode`='".$res['loaigift']."',

`time`='".time()."'
");
}
} else {
mysql_query("UPDATE `users` SET `xu`=`xu` + '".$res['xu']."' WHERE `id`='".$user_id."'");

mysql_query("UPDATE `users` SET `luong`=`luong`+'".$res['luong']."' WHERE `id`='".$user_id."'");

echo '<center><div class="omenu"><b>Nhận thưởng thành công công!</b><br>' . 'Với mã gift này bạn sẽ nhận được'.($res['xu'] != 0 ? '<b> '.$res['xu'].' xu</b>':'').' '.($res['xu'] != 0 && $res['luong'] != 0 ? '<b>và </b>':'').''.($res['luong'] != 0 ? '<b>'.$res['luong'].' lượng </b>':'').'cộng vào tài khoản!</div></center>';
	$text='Bạn đã nhận được được'.($res['xu'] != 0 ? '<b> '.$res['xu'].' xu</b>':'').' '.($res['xu'] != 0 && $res['luong'] != 0 ? '<b>và </b>':'').''.($res['luong'] != 0 ? '<b>'.$res['luong'].' lượng </b>':'').' từ mã gif: '.$ma.'  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
//lịch sử chuyển
mysql_query("INSERT INTO `ls_nhapcode` SET
`user_id`='".$user_id."',
`code`='$ma',
`xu`='".$res['xu']."',
`luong`='".$res['luong']."',
`user_tao`='".$res['user']."',
`loaicode`='".$res['loaigift']."',

`time`='".time()."'
");


mysql_query("DELETE FROM `magift` WHERE `ma`='".$ma."'");

}
}
echo'<center>';
echo 'Nhập mã:<form method="post"> <input type="text" id="gift" name="gift"></br>';
echo '<input type="submit" name="submit" id="lethinhpro"  value="Nhận quà">';
echo'</form>';
echo'</center>';

echo 'Mã gift gồm 8 kí tự, có thể là chữ hoặc số, không phân biệt hoa thường.<br>';
echo '- Mã gift sẽ được share ở trên diễn đàn, quà tặng của event, người chiến thắng trong wap hay chỉ đơn giản là trả lương cho bạn.' . '<br>Mã có đủ mọi giá trị, ít cũng có mà nhiều cũng có. Phần thưởng bạn có thể nhận là lượng hoặc xu. Để có mã gift hãy tích cực tham gia các hoạt động trên diễn đàn nhé!';
echo '</div>';
if($datauser['rights'] >= 9) {
echo '</br><a href="code.php?act=add">Thêm mã gift</a><br</a>';
echo '</br><a href="code.php?act=panel">Quản lí</a><br</a>';
echo '</br><a href="code.php?act=reset">Reset code dùng chung</a><br</a>';
echo '</br><a href="code.php?act=lichsu">Xem lịch sử</a><br</a>';

}
echo '</div>';

break;
//Thêm mã gift
case 'add':
echo '<div class="phdr"><b>Thêm mã gift</b></div>';
if($datauser['rights'] < 9) {
echo '<div class="omenu"><center>Bạn không đủ thẩm quyền!</center></div>';
require('../incfiles/end.php');
exit;
}
//random ma gift
function rand_string($length) {
$chars ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$size = strlen($char);
for($i = 0; $i<$length; $i++) {
$str .= $chars[rand(0, $size -1)];
$str=substr(str_shuffle($chars), 0, $length);
}
return$str;
}
$random = rand_string(8);
////
$ktm = mysql_result(mysql_query("SELECT COUNT(`ma`) FROM `magift` WHERE `ma`='".$random."'"), 0);

echo '<div class="omenu">';
$xu = (int)$_POST['xu'];
$type = (int)$_POST['loaigift'];
$ma = $_POST['ma'];
$ktm2 = mysql_result(mysql_query("SELECT COUNT(`ma`) FROM `magift` WHERE `ma`='".$ma."'"), 0);

$luong = (int)$_POST['luong'];
if(isset($_POST['submit'])) {
if(empty($xu) && empty($luong)&& empty($type)) {
echo '<center><font color="red"><b>Bạn đã để trống cả 3 ô!</b></font></center>';
} else if($ktm != 0) {
echo '<div class="omenu"><b>Dường như mã gift đã tồn tại vì hệ thống đã random trùng. Tỉ lệ này rất hiếm. Vui lòng làm lại!</b></div>';
} else {
	if (empty($ma)){
		
mysql_query("INSERT INTO `magift` SET `user`='".$user_id."', `ma`='".$random."',
`time`='".time()."', `xu`='".$xu."', `luong`='".$luong."',`loaigift`='".$type."'");
echo '<div class="omenu"><b>Tạo mã gift thành công!</b><br>Mã:<b> '.$random.'</b><br>Bạn có thể quản lí<a href="code.php?act=panel"> ở đây</a>!</div>';
	} else if ($ma!=''){
	    if ($ktm2!= 0) {
	        echo '<div class="omenu"><b>Dường như mã gift đã tồn tại vì hệ thống đã random trùng. Tỉ lệ này rất hiếm. Vui lòng làm lại!</b></div>';
} else {
	    
		mysql_query("INSERT INTO `magift` SET `user`='".$user_id."', `ma`='".$ma."',
`time`='".time()."', `xu`='".$xu."', `luong`='".$luong."',`loaigift`='".$type."'");
echo '<div class="omenu"><b>Tạo mã gift thành công!</b><br>Mã:<b> '.$ma.'</b><br>Bạn có thể quản lí<a href="code.php?act=panel"> ở đây</a>!</div>';
}
	}

}
}
echo '<form action="code.php?act=add" method="post">Giá trị phần quà (Xu):<br>
<input type="text" name="xu" value="'.$_POST['xu'].'"/><br>
Giá trị phần quà (Lượng):<br>
<input type="text" name="luong" value="'.$_POST['luong'].'"/><br>
Nhập mã giftcode (bỏ trống nêu muốn random):<br>
<input type="text" name="ma" value="'.$_POST['ma'].'"/><br>
Loại gift: <select name="loaigift"><option value="0"> Cá nhân</option><option value="1"> Dùng chung</option></select></br>
<input type="submit" name="submit" value="Lưu"/></form>';
echo '<font color="red">Lưu ý:</font>Giá trị phần quà có thể là Xu hoặc Lượng hay cả 2. Đối với phần quà có giá trị là Lượng hoặc Xu thì ô còn lại hãy điền số 0 hoặc để trống.<br>-Mã gift sẽ được hệ thống random 8 kí tự ngẫu nhiên với giá trị mà bạn đã đặt và bạn hãy copy để sử dụng hay quản lí tại phần quản lí. Việc cuối cùng là sử dụng đúng mục đích!';
echo '</div>';

break;
//kết thúc


//Edit mã
case'edit':
echo '<div class="phdr"><b>Chỉnh sửa mã gift</b></div>';
if($datauser['rights'] < 9) {
echo '<div class="omenu"><center>Bạn không đủ thẩm quyền!</center></div>';
require('../incfiles/end.php');
exit;
}
$id = (int)$_GET['id'];
$kt = mysql_num_rows(mysql_query("SELECT `id` FROM `magift` WHERE `id`='".$id."'"));
if($kt==0) {
echo '<div class="omenu">Dữ liệu mã gift không tồn tại!</div>';
require('../incfiles/end.php');
exit;
}
$bv = mysql_fetch_array(mysql_query("SELECT * FROM `magift` WHERE `id`='".$id."'"));
echo '<div class="omenu">';
if(isset($_POST['submit'])) {
	$type = (int)$_POST['loaigift'];

$xu = (int)$_POST['xu'];
$luong = (int)$_POST['luong'];
if(empty($xu) && empty($luong)&& empty($type)) {
echo '<div class="omenu">Bạn chưa nhập giá trị!</div>';
} else {
mysql_query("UPDATE `magift` SET `xu`='".$xu."', `luong`='".$luong."',`loaigift`='".$type."'  WHERE `id`='".$id."'");
echo '<div class="omenu">Bạn đã chỉnh sửa thành công!</div>';
}
} else{
echo '<form action="?act=edit&id='.$id.'" method="post">Giá trị Xu:<br><input name="xu" type="text" value="'.$bv['xu'].'"/><br>Giá ̣trị Lượng:<br><input name="luong" type="text" value="'.$bv['luong'].'"/><br>Loại gift: <select name="loaigift"><option value="0"> Cá nhân</option><option value="1"> Dùng chung</option></select></br><input type="submit" name="submit" value="Lưu"/></form>';
}
echo '</div>';

break;
//kết thúc
//
case'reset':
echo '<div class="phdr"><b>Quản lí mã gift</b></div>';
if($datauser['rights'] < 9) {
echo '<div class="omenu"><center>Bạn không đủ thẩm quyền!</center></div>';
require('../incfiles/end.php');
exit;
}
echo '<div class="omenu">';

if(isset($_POST['submit'])) {
	mysql_query("UPDATE `users` SET `giftdungchung`='0' ");
	mysql_query("DELETE FROM `magift` WHERE `loaigift`='1'");

echo '<div class="omenu">Bạn đã reset mã gift thành công!</div>';
} else {
echo 'Bạn có thực sự muốn reset. Khi xóa, hệ thống sẽ xóa code dùng chung hiện tại. Bạn phải tạo mới nhé?<br><form method="post"><input type="submit" name="submit" value="Ok"/> - <a href="?act=panel">Hủy bỏ</a></form>';
}
echo '</div>';
break;
//kết thúc
//
case'lichsu':
echo '<div class="phdr"><b>Quản lí mã gift</b></div>';
if($datauser['rights'] < 9) {
echo '<div class="omenu"><center>Bạn không đủ thẩm quyền!</center></div>';
require('../incfiles/end.php');
exit;
}
$res=mysql_query("SELECT * FROM `ls_nhapcode` WHERE `id`!='0' ORDER BY `id` DESC LIMIT $start,$kmess");



while ($post = mysql_fetch_array($res)){

    echo'<div class="omenu">';
echo'<b>Người tạo: </b><a href="/member/'.$post[user_tao].'.html" >'.nick($post['user_tao']).' </a></br>
<b>Người nhập: </b><a href="/member/'.$post[user_id].'.html" >'.nick($post['user_id']).' </a></br>
<b>Số tiền: </b>'.number_format($post['xu']).' xu và '.number_format($post['luong']).' lượng </a></br>
<b>Mã code: </b>'.$post[code].'</br>
<b>Loại code: </b>'.$post[loaicode].'</br>

<b>Thời gian:  '.date("d/m/Y - H:i", $post['time']).'</b></br></div>';
}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `ls_nhapcode` WHERE `id`!=0"), 0);
IF($total > $kmess){
Echo'<div class="phdr">'.functions::pages('?act=lichsu&page=', $start, $total, $kmess).'</div>';
}




break;
//panel
case'panel':
echo '<div class="phdr"><b>Quản lí mã gift</b></div>';
if($datauser['rights'] < 9) {
echo '<div class="omenu"><center>Bạn không đủ thẩm quyền!</center></div>';
require('../incfiles/end.php');
exit;
}
$lg=mysql_query("SELECT * FROM `magift` ORDER BY `id` DESC LIMIT $start, $kmess");
$tong=mysql_result(mysql_query("SELECT COUNT(*) FROM `magift`"),0);
while($plg=mysql_fetch_array($lg)) {
	if ($plg['loaigift']==0){
		$loai='Cá nhân';
	} else {
		$loai='Dùng chung';
	}
echo '<div class="omenu"><b>Mã số '.$plg['id'].'</b><br>Mã:<b> '.$plg['ma'].'</b><br>Xu:<b> '.number_format($plg['xu']).'</b><br>
Lượng:<b> '.number_format($plg['luong']).'</b><br>Loại:<b> '.$loai.'</b><br>Người tạo: <a href="/member/'.$plg['user'].'.html">'.nick($plg['user']).' </a></br><a href="?act=del&id='.$plg['id'].'">Xóa</a></br><a href="?act=edit&id='.$plg['id'].'">Sửa</a></div>';
}

if ($tong>$kmess) {
echo '<div class="phantrang">'.functions::pages('code.php?act=panel&page=',$start,$tong,$kmess).'</div><div>';
}
break;

//xóa mã
case'del':
echo '<div class="phdr"><b>Xoá mã gift</b></div>';
if($datauser['rights'] < 9) {
echo '<div class="omenu"><center>Bạn không đủ thẩm quyền!</center></div>';
require('../incfiles/end.php');
exit;
}

$id = (int)$_GET['id'];
$kt = mysql_num_rows(mysql_query("SELECT `id` FROM `magift` WHERE `id`='".$id."'"));
if($kt==0) {
echo '<div class="omenu">Dữ liệu mã gift không tồn tại!</div>';
require('../incfiles/end.php');
exit;
}

echo '<div class="omenu">';

if(isset($_POST['submit'])) {
mysql_query("DELETE FROM `magift` WHERE `id`='".$id."'");
echo '<div class="omenu">Bạn đã xoá mã gift thành công!</div>';
} else {
echo 'Bạn có thực sự muốn xoá?<br><form  method="post"><input type="submit" name="submit" value="Xoá"/> - <a href="?act=panel">Hủy bỏ</a></form>';
}
echo '</div>';

break;
//kết thúc

//Kết thúc


}




echo '</div>';


require('../incfiles/end.php');
?>