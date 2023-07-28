<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$headmod='Khu nâng cấp';
$textl='Khu nâng cấp';
require('../incfiles/head.php');
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#btn-dap').click(function(){
		var idvp = $('#idvp').val();
		var typedap=$('select option:selected').val();
		var url = "nangcap-load.php";
		var data = {"dap": "", "idvp": idvp, "type": typedap};
		$('#content-load').load(url, data);
		return false;
	});
});
</script>
<?php
echo '<div class="thinhdz">';
if (!$user_id) {
header('Location: /index.php');
exit;
}
if ($datauser['kichhoat'] ==0 ){ 
echo'<div class="omenu">Vui lòng kích hoạt để sử dụng chức năng</div></div>';
require('../incfiles/end.php');
exit;
}
$kcx=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='1'"));
$kchv=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='2'"));
$kct=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='3'"));
$nhb=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='4'"));
switch($act) {
default:
echo '<div class="phdr"><font color="white"> Nâng cấp vật phẩm [<a href="?act=index">Thợ kim hoàn</a>]'.($rights==9?'- [<a href="?act=add"><b>Thêm đồ</b></a>]':'').' </font></div>';

$tong =mysql_result(mysql_query("SELECT COUNT(*) FROM `nangcap` WHERE `type` IN ('none', 'parent')"),0);
$req=mysql_query("SELECT * FROM `nangcap` WHERE `type` IN ('none', 'parent') AND `id`!='0' ORDER BY `id` DESC LIMIT $start,$kmess");
while($res=mysql_fetch_array($req)) {
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$res['vatpham']."'"));
echo'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info"><tbody><tr><td class="left-info"><img src="/images/shop/'.$res['vatpham'].'.png"></td><td class="right-info"><span> '.($res['type'] == 'none' ? 'Vật phẩm: <font color="green"> '.$shop['tenvatpham'].' </font></a> <br>
    <a href="?act=dap&id='.$res['id'].'"><input type="submit" value="Nâng Cấp"></a>



' : 'Vật phẩm: <font color="green"> '.$shop['tenvatpham'].' </font></a> <br>
    <a href="?act=list&id='.$res['id'].'"><input type="submit" value="Nâng Cấp"></a>').' </span></td></tr></tbody></table>';
}
if ($tong > $kmess){
echo '<div class="topmenu">' . functions::pages('nangcap.php?page=', $start, $tong, $kmess) . '</div>';
}
break;
case 'list':
$id = intval($_GET['id']);
$check = mysql_num_rows(mysql_query("SELECT * FROM `nangcap` WHERE `id` = '".$id."'"));
if ($check < 1) {
header('Location: nangcap.php');
exit;
} else {
echo '<div class="phdr">NÂNG CẤP > VẬT PHẨM [<a href="nangcap.php">Quay lại</a>]</div>';
$req = mysql_query("SELECT * FROM `nangcap` WHERE `refid` = '".$id."'");
while ($res = mysql_fetch_assoc($req)) {
$shop = mysql_fetch_assoc(mysql_query("SELECT * FROM `shopdo` WHERE `id` ='".$res['vatpham']."'"));
echo '<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><img src="/images/shop/'.$shop['id'].'.png">
</td>
<td class="right-info"> Vật phẩm: <font color="green">'.$shop['tenvatpham'].'</font><br>
Tỉ lệ:<font color="red"> '.$res['tile'].'%</font><br>
<a href="?act=dap&id='.$res['id'].'"><input type="submit" value="Nâng Cấp"></a>
</td>
</tr></tbody></table>';
}
}
break;
case 'add':
if ($rights>=9) {
Echo '<div class="phdr">Thêm đồ</div>';
if (isset($_POST['add'])) {
$vatpham=(int)$_POST['vatpham'];
$loait=(int)$_POST['loait'];

$loait2=(int)$_POST['loait2'];

$vnd=(int)$_POST['vnd'];
$xu=(int)$_POST['xu'];
$tile=(int)$_POST['tile'];
if (empty($vatpham) or empty($vnd) or empty($xu) or empty($tile)) {
echo '<div class="news">Không được bỏ trống!</div>';
} else {
mysql_query("INSERT INTO `nangcap` SET
`vatpham`='".$vatpham."',
`canvp`='".$_POST['canvp']."',
`kcx`='".$_POST['kcx']."',
`kchv`='".$_POST['kchv']."',
`kct`='".$_POST['kct']."',
`vnd`='".$vnd."',
`type`='none',

`xu`='".$xu."',
`tile`='".$tile."'");
$tenvatpham=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$vatpham."'"));
$bot=''.$login.' vừa thêm [red]'.$tenvatpham['tenvatpham'].' [/red] vào nâng cấp!';
mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
echo '<div class="omenu">Thêm thành công</div>';
}
}
echo '<form method="post">';
echo 'Cần vật phẩm: <select name="canvp">';
$cvp=mysql_query("SELECT * FROM `shopdo`");
while ($showcvp=mysql_fetch_array($cvp)) {
echo '<option value="'.$showcvp['id'].'"> '.$showcvp['id'].' - '.$showcvp['tenvatpham'].'</option>';
}
echo '</select><br/>';
echo 'Vật phẩm: <select name="vatpham">';
$nc=mysql_query("SELECT * FROM `shopdo` WHERE `hienthi`='1'");
while ($show=mysql_fetch_array($nc)) {
echo '<option value="'.$show['id'].'">'.$show['id'].' - '.$show['tenvatpham'].'</option>';
}
echo '</select><br/>';

echo 'Lượng: <input type="text" name="vnd" size="3"> Lượng<br/>';
echo 'Xu: <input type="text" name="xu" size="3"> xu<br/>';
echo 'Kim cương xanh: <input type="text" name="kcx" size="1"> viên<br/>';
echo 'Kim cương hi vọng: <input type="text" name="kchv" size="1"> viên<br/>';
echo 'Kim cương tím: <input type="text" name="kct" size="1"> viên<br/>';
echo 'Ngọn huyền bí: <input type="text" name="nhb" size="1"> viên<br/>';
echo 'Tỉ lệ trúng: <input type="text" name="tile" size="1">%<br/>';
echo '<input type="submit" name="add" value="Thêm">';
echo '</form>';
}
break;
case 'index':
echo'<div class="phdr">Nâng cấp vật phẩm > Chức năng</div><center><b><img src="/icon/kimhoan.gif"><br> Ta có thể giúp Vật phẩm trở nên đẹp hơn !!</b></center><div class="omenu"><img src="/icon/next.png"><a href="nangcap.php"> Danh sách vật phẩm</a></div>
<div class="omenu"><img src="/icon/next.png"><a href="/avatar/vatpham.php?act=danhsach&loai=nangcap"> Mua đá </a></div>
<div class="omenu"><img src="/icon/next.png"><a href="/shop/vet.html"> Biến hình vẹt</a></div><div class="omenu"><img src="/icon/next.png"><a href="/shop/kirby.html"> Biến hình kirby</a></div>
<div class="omenu"><img src="/icon/next.png"><a href="nangcap.php?act=ban"> Bán đá </a></div>
<div class="omenu"><img src="/icon/next.png"><a href="/"> Quay về </a></div> ';
/*
echo '<div class="phdr">Thợ kim hoàn [<a href="nangcap.php">Quay lại</a>]</div>';
echo'<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tr><td width="50px;" class="blog-avatar"><img src="/icon/kimhoan.gif"/></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0"><tbody><tr><td class="current-blog" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div><img src="/images/on.png" alt="online"/><font color="red"> <b> Thợ Kim Hoàn </b></font><div class="text">';
echo '<div class="omenu"><a href="/avatar/vatpham.php?act=danhsach&loai=nangcap"><img src="/icon/next.png"><b><font color="blue"> Chợ mua bán đá </b></font</a></div>';
echo '<div class="omenu"><a href="/avatar/nangcap.php"><img src="/icon/next.png"><b><font color="blue"> Nâng cấp Item</font></b></a></div>';
echo'<div class="omenu"><a href="/khungoaio/sieuxe.php"><img src="/icon/next.png"><b><font color="#9932cc"> Biến hình siêu xe </font></b></a></div>';
echo'<div class="omenu"><a href="/shop/vet.html"><img src="/icon/next.png"><b><font color="#9932cc"> Biến hình vẹt </font></b></a></div>';
echo'<div class="omenu"><a href="/shop/kirby.html"><img src="/icon/next.png"><b><font color="#9932cc"> Biến hình kirby </font></b></a></div>';

echo'</div></div></td></tr></tbody></table></td></tr></tbody></table>';
*/
break;
case 'ban':

		
$kcx=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='1'"));
$kchv=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='2'"));
$kct=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='3'"));
$nhb=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='4'"));

echo'<div class="phdr"> Tho.Kim.Hoan > Mua bán đá</div><form method="post"> ';

if ($kcx['soluong']>0) {
	echo'<input type="radio" name="vatpham" value="1">Kim cương xanh [*'.$kcx['soluong'].']<img src="/images/vatpham/1.png"> là <font color="red">950 Xu/1</font><br>
';
}
if ($kchv['soluong']>0) {
	echo'<input type="radio" name="vatpham" value="2">Kim cương hi vọng [*'.$kchv['soluong'].'] <img src="/images/vatpham/2.png"> là <font color="red">2500 Xu/1</font><br>
';
}
if ($kct['soluong']>0) {
	echo'<input type="radio" name="vatpham" value="3">Kim cương tím [*'.$kct['soluong'].'] <img src="/images/vatpham/3.png"> là <font color="red">8500 Xu/1</font><br>
';
}
if ($nhb['soluong']>0) {
	echo'<input type="radio" name="vatpham" value="4">Ngọc huyền bí [*'.$nhb['soluong'].']<img src="/images/vatpham/4.png"> là <font color="red">4500 Xu/1</font><br>
';
}
if ($kcx['soluong']>0|| $kchv['soluong']>0 || $kct['soluong']>0 || $nhb['soluong']>0)  {

echo'

 <center>Nhập số lượng muốn bán : <br><input type="number" name="soluong" value="1"><br><input type="submit" name="submit" value="Bán"></center></form>';
} else {
					echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn chưa có đá nào để bán</div>';
}



if (isset($_POST['submit'])) {
$soluong=(int)$_POST['soluong'];

	$vatpham = $_POST['vatpham'];
if ($vatpham=='1'){
		$tien=$soluong*950;
	} else 
			if ($vatpham=='2'){
		$tien=$soluong*2500;
	} else 	if ($vatpham=='3'){
		$tien=$soluong*8500;
	} else 
			if ($vatpham=='4'){
		$tien=$soluong*4500;
	} 

	
	if (empty($soluong)) {
		echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn chưa nhập số lượng</div>';
	} else if ($soluong<0) {
				echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn chưa nhập số lượng</div>';
	} else if (!in_array($vatpham, array('1', '2', '3', '4'))) {
		echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Vui lòng thao tác lại</div>';
		} else 
			if ($vatpham=='1'){
if ($kcx['soluong']>=$soluong) {
		echo'<div class="omenu"><font color="red"><b>Bán thành công *'.$soluong.' <img src="/images/vatpham/'.$vatpham.'.png">, bạn nhận được '.number_format($tien).' xu</b></font></div>';
						mysql_query("UPDATE `users` SET `xu` = `xu`+ '".$tien."' WHERE `id` = '".$user_id."'");
			mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$soluong."' WHERE `user_id`='".$user_id."' AND `id_shop`='1'");
}
		} else 	if ($vatpham=='2'){
if ($kchv['soluong']>=$soluong) {
	echo'<div class="omenu"><font color="red"><b>Bán thành công *'.$soluong.' <img src="/images/vatpham/'.$vatpham.'.png">, bạn nhận được '.number_format($tien).' xu</b></font></div>';
						mysql_query("UPDATE `users` SET `xu` = `xu`+ '".$tien."' WHERE `id` = '".$user_id."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$soluong."' WHERE `user_id`='".$user_id."' AND `id_shop`='2'");
		}
		} else 
			if ($vatpham=='3'){
if ($kct['soluong']>=$soluong) {
	echo'<div class="omenu"><font color="red"><b>Bán thành công *'.$soluong.' <img src="/images/vatpham/'.$vatpham.'.png">, bạn nhận được '.number_format($tien).' xu</b></font></div>';
						mysql_query("UPDATE `users` SET `xu` = `xu`+ '".$tien."' WHERE `id` = '".$user_id."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$soluong."' WHERE `user_id`='".$user_id."' AND `id_shop`='3'");
			}
			} else 
				if ($vatpham=='4'){
if ($nhb['soluong']>=$soluong) {
	echo'<div class="omenu"><font color="red"><b>Bán thành công *'.$soluong.' <img src="/images/vatpham/'.$vatpham.'.png">, bạn nhận được '.number_format($tien).' xu</b></font></div>';
						mysql_query("UPDATE `users` SET `xu` = `xu`+ '".$tien."' WHERE `id` = '".$user_id."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$soluong."' WHERE `user_id`='".$user_id."' AND `id_shop`='4'");
				}
}


}

		
	




break;
case 'dap':
echo '<div id="content-load">';
$id=(int)$_GET[id];
$check=mysql_num_rows(mysql_query("SELECT * FROM `nangcap` WHERE `id`='".$id."'"));
if ($check<1) {
header('Location: nangcap.php');
exit;
} else {
$item=mysql_fetch_array(mysql_query("SELECT * FROM `nangcap` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item['vatpham']."'"));
$canvp=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item['canvp']."'"));
$ruong=mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp['loai']."' AND `user_id`='".$user_id."' AND `id_loai`='".$canvp['id_loai']."' AND `timesudung` = '0'"));
$ktruong=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp['loai']."' AND `id_loai`='".$canvp['id_loai']."' AND `user_id`='".$user_id."' AND `timesudung` = '0'"));
echo '<div class="phdr"><b>Nâng item : '.$shop['tenvatpham'].' - [<a href="nangcap.php">Quay lại</a>]</b></div>';
if (isset($_POST['dap'])) {
$tile=$item['tile'];
if ($x5nangcap['soluong']>0) {
$tile=40/$tile;
} else 
	if ($x5nangcap['soluong']<=0) {
$tile=200/$tile;
}

$tile=floor($tile);
$rand=rand(1,$tile+1);
$type=(int)$_POST[type];
if ($type!=1&&$type!=2) {
echo '<div class="list1">NoNo...!!!!</div>';
} else {
if ($type==1) {
	$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else 
if ($datauser['xu']<$item['xu'] || $ktruong<1 || $kcx['soluong']<$item['kcx'] || $kchv['soluong']<$item['kchv'] || $kct['soluong']<$item['kct']) {
echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Chưa đủ điều kiện đập đồ!</div>';

} else

	{
if ($x5nangcap['soluong']>0) {
	mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='124'");
}

mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$item['kcx']."' WHERE `user_id`='".$user_id."' AND `id_shop`='1'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$item['kchv']."' WHERE `user_id`='".$user_id."' AND `id_shop`='2'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$item['kct']."' WHERE `user_id`='".$user_id."' AND `id_shop`='3'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$item['nhb']."' WHERE `user_id`='".$user_id."' AND `id_shop`='4'");
mysql_query("UPDATE `users` SET `xu`=`xu`-'".$item['xu']."' WHERE `id`='".$user_id."'");
/////
if ($rand==1) {
mysql_query("DELETE FROM `khodo` WHERE `id`='".$ruong['id']."' LIMIT 1");
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$shop['loai']."',
`id_loai`='".$shop['id_loai']."',
`timesudung`='".$ruong['timesudung']."',
`tenvatpham`='".$shop['tenvatpham']."',
`id_shop`='".$shop['id']."'
");

$bot='[b][red]Chúc mừng [blue]'.$login.'[/blue] vừa nâng cấp thành công [blue]'.$shop['tenvatpham'].' [/blue]![/red][/b]';
mysql_query("INSERT INTO `wnew` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
echo '<div class="omenu">Đập thành công (Dùng X5 Nâng Cấp<img src="/images/vatpham/124.png">): <font color="red"><b>'.$shop['tenvatpham'].'</b></font></div>';
} else {
echo '<div class="omenu">Thất bại rồi, Thử lại nhé ^^</div>';

}
}

/////
} else if ($type==2) {
	$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else 
if ($datauser['luong']<$item['luong'] || $ktruong<1 || $kcx['soluong']<$item['kcx'] || $kchv['soluong']<$item['kchv'] || $kct['soluong']<$item['kct']) {
echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Chưa đủ điều kiện đập đồ!</div>';
} else {
	if ($x5nangcap['soluong']>0) {
	mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='124'");
}
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$item['kcx']."' WHERE `user_id`='".$user_id."' AND `id_shop`='1'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$item['kchv']."' WHERE `user_id`='".$user_id."' AND `id_shop`='2'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$item['kct']."' WHERE `user_id`='".$user_id."' AND `id_shop`='3'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$item['nhb']."' WHERE `user_id`='".$user_id."' AND `id_shop`='4'");
mysql_query("UPDATE `users` SET `luong`=`luong`-'".$item['vnd']."' WHERE `id`='".$user_id."'");
///
if ($rand==1) {
mysql_query("DELETE FROM `khodo` WHERE `id`='".$ruong['id']."' LIMIT 1");
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$shop['loai']."',
`id_loai`='".$shop['id_loai']."',
`timesudung`='".$ruong['timesudung']."',
`tenvatpham`='".$shop['tenvatpham']."',
`id_shop`='".$shop['id']."'
");

$bot='[b][red]Chúc mừng [blue]'.$login.'[/blue] vừa nâng cấp thành công [blue]'.$shop['tenvatpham'].' [/blue]![/red][/b]';
mysql_query("INSERT INTO `chatthegioi` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
echo '<div class="omenu">Đập thành công (Dùng X5 Nâng Cấp<img src="/images/vatpham/124.png">): <font color="red"><b>'.$shop['tenvatpham'].'</b></font></div>';
} else {
echo '<div class=rmenu">Thất bại rồi, thử lại nhé ^^</div>';

}
}
}
}
}
	$x5nangcap=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='124'"));

echo'<form method="post"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><img src="/images/shop/'.$shop['id'].'.png">
</td>
<td class="right-info">
Cần vật phẩm: <font color="blue"> '.$canvp['tenvatpham'].'</font> <font color="red">'.($ktruong>0?' (Đã có) ':' (Chưa có) ').' </font>
<br>Công thức ghép đồ: <br> <input type="hidden" id="idvp" name="idvp" value="'.$id.'">
<input type="hidden" name="type" value="1">+ Bạn có muốn ghép <font color="blue"> '.$shop['tenvatpham'].'</font> bằng <font color="red">'.$canvp['tenvatpham'].' </font> 
'.($item['kcx']>0?'+<img src="/images/vatpham/1.png">'.$item['kcx'].' '.($kcx['soluong']>=$item['kcx']?'<font color="green"> (Đã có) </font>':'<font color="red"> (Chưa đủ) </font>').'':'').'
'.($item['kchv']>0?'+<img src="/images/vatpham/2.png">'.$item['kchv'].'  '.($kchv['soluong']>=$item['kchv']?'<font color="green"> (Đã có) </font>':'<font color="red"> (Chưa đủ) </font>').'':'').'
'.($item['kct']>0?'+<img src="/images/vatpham/3.png">'.$item['kct'].'  '.($kct['soluong']>=$item['kct']?'<font color="green"> (Đã có) </font>':'<font color="red"> (Chưa đủ) </font>').'':'').'
'.($item['nhb']>0?'+<img src="/images/vatpham/4.png">'.$item['nhb'].'  '.($nhb['soluong']>=$item['nhb']?'<font color="green"> (Đã có) </font>':'<font color="red"> (Chưa đủ) </font>').'':'').'

+ <font color="red">'.number_format($item['xu']).' xu/'.number_format($item['vnd']).' lượng </font>  - Xác suất thành công là: <font color="red"> '.$item['tile'].'% </font> không ?<br> 
<i>Mẹo: Sử dụng <font color="red">X5 Nâng cấp <img src="/images/vatpham/124.png"></font> giúp tăng tỉ lệ thành công - Bạn đang có: '.$x5nangcap['soluong'].'</i>
<br><br><center>

<select name="type">
<option '.($type==1?'selected="selected"':'').' value="1"> Đập bằng '.number_format($item['xu']).' xu</option>
<option '.($type==2?'selected="selected"':'').' value="2"> Đập bằng '.number_format($item['vnd']).' Lượng</option>
</select><br/>

<input type="submit" id="btn-dap" name="dap" value="Nâng cấp"></form></div></center>
 </td>
</tr></tbody></table><div id="load"></div>';
/*
echo '<form method="post">';
echo '<input type="hidden" id="idvp" name="idvp" value="'.$id.'">
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info"><tbody><tr><td class="left-info">
<b> Vật phẩm nâng cấp </b><br><img src="/images/shop/'.$shop['id'].'.png"> '.$shop['tenvatpham'].' </td><td class="right-info"><span><b> Nguyên liệu ghép đồ </b><br> '.$canvp['tenvatpham'].' <img src="/images/shop/'.$canvp['id'].'.png"> '.($ktruong>0?'<font color="green"> (Đã có) </font>':'<font color="red"> Chưa có </font>').' <br>
</br>'.($item['kcx']>0?' <img src="/images/vatpham/1.png">+'.$item['kcx'].' <br> '.($kcx['soluong']>=$item['kcx']?'<font color="green"> (Đã có) </font>':'<font color="red"> Chưa đủ </font>').'<br/>':'').'
'.($item['kchv']>0?'+ <img src="/images/vatpham/2.png">+'.$item['kchv'].' <br> '.($kchv['soluong']>=$item['kchv']?'<font color="green"> (Đã có) </font>':'<font color="red"> Chưa đủ </font>').'<br/>':'').'
'.($item['kct']>0?'+ <img src="/images/vatpham/3.png">+'.$item['kct'].' <br> '.($kct['soluong']>=$item['kct']?'<font color="green"> (Đã có) </font>':'<font color="red"> Chưa đủ </font>').'<br/>':'').'
'.($item['nhb']>0?'+ <img src="/images/vatpham/4.png">+'.$item['nhb'].' <br> '.($nhb['soluong']>=$item['nhb']?'<font color="green"> (Đã có) </font>':'<font color="red"> Chưa đủ </font>').'<br/>':'').'
Tỉ Lệ:&nbsp<font color="red">'.$item['tile'].'%</font><br/>
<select name="type">
<option '.($type==1?'selected="selected"':'').' value="1"> Đập bằng '.number_format($item['xu']).' xu</option>
<option '.($type==2?'selected="selected"':'').' value="2"> Đập bằng '.number_format($item['vnd']).' Lượng</option>
</select><br/></br>
</td></tr></tbody></table><div class="omenu"><button id="btn-dap" name="dap"> Nâng cấp </button>';
echo'</div>';
echo '</form>';
*/
/*echo '<div class="login"><details><summary><b><font color="green">Menu</font></b></summary><a href="vatpham.php"><b><font color="brown"><img src="/icon/next.png"> Chợ mua bán vật phẩm</b></font</a></br>
<a href="nangcap.php"><b><font color="brown"><img src="/icon/next.png"> Nâng cấp Item</font></b></a></br>
<a href="/sanbay/vet.php"><b><font color="brown"><img src="/icon/next.png"> Biến hình Vẹt</font></b></a></br>
<a href="/sanbay/kirby.php"><b><font color="brown"><img src="/icon/next.png"> Biến hình Kirby</font></b></a></details></div>';*/
}
echo '</div>';
break;
}
echo '</div>';

require('../incfiles/end.php');
?>
<script type="text/JavaScript">
var message="NoRightClicking"; function defeatIE() {if (document.all) {(message);return false;}} function defeatNS(e) {if (document.layers||(document.getElementById&&!document.all)) { if (e.which==2||e.which==3) {(message);return false;}}} if (document.layers) {document.captureEvents(Event.MOUSEDOWN);document.onmousedown=defeatNS;} else{document.onmouseup=defeatNS;document.oncontextmenu=defeatIE;} document.oncontextmenu=new Function("return false")
</script>
<script type='text/javascript'>
//<![CDATA[
//Ctrl+U
shortcut={all_shortcuts:{},add:function(a,b,c){var d={type:"keydown",propagate:!1,disable_in_input:!1,target:document,keycode:!1};if(c)for(var e in d)"undefined"==typeof c[e]&&(c[e]=d[e]);else c=d;d=c.target,"string"==typeof c.target&&(d=document.getElementById(c.target)),a=a.toLowerCase(),e=function(d){d=d||window.event;if(c.disable_in_input){var e;d.target?e=d.target:d.srcElement&&(e=d.srcElement),3==e.nodeType&&(e=e.parentNode);if("INPUT"==e.tagName||"TEXTAREA"==e.tagName)return}d.keyCode?code=d.keyCode:d.which&&(code=d.which),e=String.fromCharCode(code).toLowerCase(),188==code&&(e=","),190==code&&(e=".");var f=a.split("+"),g=0,h={"`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":":","'":'"',",":"<",".":">","/":"?","\\":"|"},i={esc:27,escape:27,tab:9,space:32,"return":13,enter:13,backspace:8,scrolllock:145,scroll_lock:145,scroll:145,capslock:20,caps_lock:20,caps:20,numlock:144,num_lock:144,num:144,pause:19,"break":19,insert:45,home:36,"delete":46,end:35,pageup:33,page_up:33,pu:33,pagedown:34,page_down:34,pd:34,left:37,up:38,right:39,down:40,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,f8:119,f9:120,f10:121,f11:122,f12:123},j=!1,l=!1,m=!1,n=!1,o=!1,p=!1,q=!1,r=!1;d.ctrlKey&&(n=!0),d.shiftKey&&(l=!0),d.altKey&&(p=!0),d.metaKey&&(r=!0);for(var s=0;k=f[s],s<f.length;s++)"ctrl"==k||"control"==k?(g++,m=!0):"shift"==k?(g++,j=!0):"alt"==k?(g++,o=!0):"meta"==k?(g++,q=!0):1<k.length?i[k]==code&&g++:c.keycode?c.keycode==code&&g++:e==k?g++:h[e]&&d.shiftKey&&(e=h[e],e==k&&g++);if(g==f.length&&n==m&&l==j&&p==o&&r==q&&(b(d),!c.propagate))return d.cancelBubble=!0,d.returnValue=!1,d.stopPropagation&&(d.stopPropagation(),d.preventDefault()),!1},this.all_shortcuts[a]={callback:e,target:d,event:c.type},d.addEventListener?d.addEventListener(c.type,e,!1):d.attachEvent?d.attachEvent("on"+c.type,e):d["on"+c.type]=e},remove:function(a){var a=a.toLowerCase(),b=this.all_shortcuts[a];delete this.all_shortcuts[a];if(b){var a=b.event,c=b.target,b=b.callback;c.detachEvent?c.detachEvent("on"+a,b):c.removeEventListener?c.removeEventListener(a,b,!1):c["on"+a]=!1}}},shortcut.add("Ctrl+U",function(){top.location.href="/"});
//]]>
</script>