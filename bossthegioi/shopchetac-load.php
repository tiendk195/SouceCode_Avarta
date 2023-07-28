<?php
header('Content-Type: text/html; charset="utf-8');
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
if (!$user_id) {
header('Location: /index.php');
exit;
}
$congthuc=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='129'"));
	$x5shopchetac=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='128'"));

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
$id=(int)$_POST[idvp];
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
if (isset($_POST['dap'])) {
echo '<div class="phdr">NPC Boss Thế giới &gt; Shop Chế tác </div>';

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
echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Chưa đủ điều kiện chế tác!</div>';

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
echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Chưa đủ điều kiện chế tác!</div>';

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
+ Cần: <b>'.$item['congthuc'].'</b> Công thức chế tác <img src="/images/vatpham/129.png">: Bạn đang có '.$congthuc['soluong'].' <br>

+ Cần: <b>'.$item['luong'].'</b> Lượng/<b>'.$item['xu'].'</b> Xu<br>
+ Tỉ lệ thành công: <font color="red">'.$item['tile'].'%</font><br>
+ Sử dụng <font color="#FA5882">Cỏ 3 lá <img src="/images/vatpham/128.png">:</font> <font color="green">Bạn đang có: '.$x5shopchetac['soluong'].'</font><br>
<br> <center>

<select name="type">
<option '.($type==1?'selected="selected"':'').' value="1"> Chế tác bằng '.number_format($item['xu']).' xu</option>
<option '.($type==2?'selected="selected"':'').' value="2"> Chế tác bằng '.number_format($item['luong']).' Lượng</option>
</select><br/><input type="submit" id="btn-dap" name="dap" value="Chế tác"></center></td>
</tr></tbody></table><div id="load"></div></form>';


}
?>