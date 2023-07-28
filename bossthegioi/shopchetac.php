<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$headmod='Chế tác';
$textl='Chế tác';
require('../incfiles/head.php');
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#btn-dap').click(function(){
		var idvp = $('#idvp').val();
		var typedap=$('select option:selected').val();
		var url = "shopchetac-load.php";
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
$congthuc=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='129'"));
	$x5shopchetac=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='128'"));

switch($act) {
default:
echo '<div class="phdr">NPC Boss Thế giới &gt; Shop Chế tác </div>';
if ($datauser['rights']>=9){
echo'<div class="omenu"><a href="?act=add">Add</a></div>';
}
$tong =mysql_result(mysql_query("SELECT COUNT(*) FROM `shopchetac` WHERE `type` IN ('none', 'parent')"),0);
$req=mysql_query("SELECT * FROM `shopchetac` WHERE  `id`!='0' ORDER BY `id` DESC LIMIT $start,$kmess");
while($res=mysql_fetch_array($req)) {
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$res['vatpham']."'"));
echo'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><center><img src="/images/shop/'.$res['vatpham'].'.png"></center>
</td>
<td class="right-info">
<font color="green">'.$shop['tenvatpham'].' </font> <br>
Tỉ lệ thành công: <font color="red">'.$res['tile'].'%</font> 
<br><a href="?act=chetac&amp;id='.$res['id'].'"> <input type="submit" value="Chế tác"></a> 
</td>
</tr></tbody></table>';

}
if ($tong > $kmess){
echo '<div class="topmenu">' . functions::pages('shopchetac.php?page=', $start, $tong, $kmess) . '</div>';
}

break;
case 'add':
if ($rights>=9) {
if (isset($_POST['add'])) {
$vatpham=(int)$_POST['vatpham'];


$vnd=(int)$_POST['vnd'];
$xu=(int)$_POST['xu'];
$tile=(int)$_POST['tile'];
if (empty($vatpham) or empty($vnd) or empty($xu) or empty($tile)) {
echo '<div class="news">Không được bỏ trống!</div>';
} else {
mysql_query("INSERT INTO `shopchetac` SET
`vatpham`='".$vatpham."',
`canvp`='".$_POST['canvp']."',
`congthuc`='".$_POST['congthuc']."',

`luong`='".$vnd."',


`xu`='".$xu."',
`tile`='".$tile."'");
$tenvatpham=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$vatpham."'"));
$bot=''.$login.' vừa thêm [red]'.$tenvatpham['tenvatpham'].' [/red] vào nâng cấp!';
//mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
echo '<div class="omenu">Thêm thành công</div>';
}
}
echo '<form method="post">';

echo 'Cần vật phẩm: <select name="canvp">';
$cvp=mysql_query("SELECT * FROM `shopdo`WHERE `hienthi`='1'");
while ($showcvp=mysql_fetch_array($cvp)) {
echo '<option value="'.$showcvp['id'].'"> '.$showcvp['id'].' : '.$showcvp['tenvatpham'].'</option>';
}
echo '</select><br/>';
echo 'Vật phẩm: <select name="vatpham">';
$nc=mysql_query("SELECT * FROM `shopdo` WHERE `hienthi`='1'");
while ($show=mysql_fetch_array($nc)) {
echo '<option value="'.$show['id'].'">'.$show['id'].' : '.$show['tenvatpham'].'</option>';
}
echo '</select><br/>';

echo 'Lượng: <input type="number" name="vnd" size="3"> Lượng<br/>';
echo 'Xu: <input type="number" name="xu" size="3"> xu<br/>';
echo 'Công thức: <input type="number" name="congthuc" size="1"> viên<br/>';
echo 'Tỉ lệ trúng: <input type="text" name="tile" size="1">%<br/>';
echo '<input type="submit" name="add" value="Thêm">';
echo '</form>';
}

break;
case 'chetac':
echo '<div id="content-load">';
$id=(int)$_GET[id];
$check=mysql_num_rows(mysql_query("SELECT * FROM `shopchetac` WHERE `id`='".$id."'"));
if ($check<1) {
header('Location: shopchetac.php');
exit;
} else {
$item=mysql_fetch_array(mysql_query("SELECT * FROM `shopchetac` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item['vatpham']."'"));
$canvp=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item['canvp']."'"));
$ruong=mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp['loai']."' AND `user_id`='".$user_id."' AND `id_loai`='".$canvp['id_loai']."' AND `timesudung` = '0'"));
$ktruong=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp['loai']."' AND `id_loai`='".$canvp['id_loai']."' AND `user_id`='".$user_id."' AND `timesudung` = '0'"));
echo '<div class="phdr">NPC Boss Thế giới &gt; Shop Chế tác </div>';

if (isset($_POST['dap'])) {
$tile=$item['tile'];
if ($x5shopchetac['soluong']>0) {
$tile=40/$tile;
} else 
	if ($x5shopchetac['soluong']<=0) {
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
if ($datauser['xu']<$item['xu'] || $ktruong<1 || $congthuc['soluong']<$item['congthuc']) {
echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Chưa đủ điều kiện đập đồ!</div>';

} else

	{
if ($x5shopchetac['soluong']>0) {
	mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='128'");
}

mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$item['congthuc']."' WHERE `user_id`='".$user_id."' AND `id_shop`='129'");

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

$bot='[b][red]Chúc mừng [blue]'.$login.'[/blue] vừa chế tác thành công [blue]'.$shop['tenvatpham'].' [/blue]![/red][/b]';
mysql_query("INSERT INTO `wnew` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
echo '<div class="omenu">Chế tác thành công (Dùng cỏ 3 lá <img src="/images/vatpham/128.png">): <font color="red"><b>'.$shop['tenvatpham'].'</b></font></div>';
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
if ($datauser['luong']<$item['luong'] || $ktruong<1 || $congthuc['soluong']<$item['congthuc']) {
echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Chưa đủ điều kiện đập đồ!</div>';

} else

	{
if ($x5shopchetac['soluong']>0) {
	mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='128'");
}

mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$item['congthuc']."' WHERE `user_id`='".$user_id."' AND `id_shop`='129'");

mysql_query("UPDATE `users` SET `luong`=`luong`-'".$item['luong']."' WHERE `id`='".$user_id."'");
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

$bot='[b][red]Chúc mừng [blue]'.$login.'[/blue] vừa chế tác thành công [blue]'.$shop['tenvatpham'].' [/blue]![/red][/b]';
mysql_query("INSERT INTO `wnew` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
echo '<div class="omenu">Chế tác thành công (Dùng cỏ 3 lá <img src="/images/vatpham/128.png">): <font color="red"><b>'.$shop['tenvatpham'].'</b></font></div>';
} else {
echo '<div class="omenu">Thất bại rồi, Thử lại nhé ^^</div>';

}
}
}
}
}
	$x5shopchetac=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='128'"));
echo'<form method="post"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><center><img src="/images/shop/'.$shop['id'].'.png"></center>
</td>
<td class="right-info">
<font color="green">Công thức chế tác:</font> <font color="red"> '.$shop['tenvatpham'].'</font> <br> <input type="hidden" id="idvp" name="idvp" value="'.$id.'">  
+ Cần vật phẩm: '.$canvp['tenvatpham'].'</font> <font color="red">'.($ktruong>0?' (Đã có) ':' (Chưa có) ').' </font><br>
+ Cần: <b>'.$item['congthuc'].'</b> Công thức chế tác <img src="/images/vatpham/129.png">: Bạn đang có: '.$congthuc['soluong'].'<br>

+ Cần: <b>'.$item['luong'].'</b> Lượng/<b>'.$item['xu'].'</b> Xu<br>
+ Tỉ lệ thành công: <font color="red">'.$item['tile'].'%</font><br>
+ Sử dụng <font color="#FA5882">Cỏ 3 lá <img src="/images/vatpham/128.png">:</font> <font color="green">Bạn đang có: '.$x5shopchetac['soluong'].'</font><br>
<br> <center>

<select name="type">
<option '.($type==1?'selected="selected"':'').' value="1"> Chế tác bằng '.number_format($item['xu']).' xu</option>
<option '.($type==2?'selected="selected"':'').' value="2"> Chế tác bằng '.number_format($item['luong']).' Lượng</option>
</select><br/>
<input type="submit"  id="btn-dap" name="dap" value="Chế tác"></center></td>
</tr></tbody></table><div id="load"></div></form>';


}
echo '</div>';
break;
}
echo '</div>';
require('../incfiles/end.php');
?>