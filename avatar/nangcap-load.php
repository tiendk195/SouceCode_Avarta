<?php
header('Content-Type: text/html; charset="utf-8');
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
if (!$user_id) {
header('Location: /index.php');
exit;
}
$kcx=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='1'"));
$kchv=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='2'"));
$kct=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='3'"));
$nhb=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='4'"));
	$x5nangcap=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='124'"));

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
$id=(int)$_POST[idvp];
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
$checknv2=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='16'"));
if ($checknv2>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='16'");
}
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
$checknv2=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='16'"));
if ($checknv2>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='16'");
}

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
/*echo '<div class="login"><details><summary><b><font color="green">Menu</font></b></summary><a href="vatpham.php"><b><font color="brown"><img src="/icon/next.png"> Chợ mua bán vật phẩm</b></font</a></br>
<a href="nangcap.php"><b><font color="brown"><img src="/icon/next.png"> Nâng cấp Item</font></b></a></br>
<a href="/sanbay/vet.php"><b><font color="brown"><img src="/icon/next.png"> Biến hình Vẹt</font></b></a></br>
<a href="/sanbay/kirby.php"><b><font color="brown"><img src="/icon/next.png"> Biến hình Kirby</font></b></a></details></div>';*/
}
?>