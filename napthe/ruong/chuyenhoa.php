<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
if (!$user_id)
{
	header('Location: /dangnhap.php');
	exit;
}
$headmod = 'Chuyển hóa';
$textl = 'Chuyển hóa';
require('../incfiles/head.php');
switch($act) {
case 'add':
$check = mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `id` = '".$id."' AND `user_id` = '".$user_id."'"));
if ($check < 1) {
	header('Location: chuyenhoa.php');
	exit;
} else {
	if (!isset($_SESSION['vatpham_a'])) {
		$_SESSION['vatpham_a'] = NULL;
	}
	if (!isset($_SESSION['vatpham_b'])) {
		$_SESSION['vatpham_b'] = NULL;
	}
	
	if (!empty($_SESSION['vatpham_a']) && !empty($_SESSION['vatpham_b'])) {
		header('Location: chuyenhoa.php');
		exit;
	}
	if (empty($_SESSION['vatpham_a'])) {
		$_SESSION['vatpham_a'] = $id;
	} else if (empty($_SESSION['vatpham_b'])) {
		$_SESSION['vatpham_b'] = $id;
	}
	header('Location: chuyenhoa.php');
	exit;
}
break;
default:
if (isset($_GET['thao_a'])) {
	$_SESSION['vatpham_a'] = NULL;
	header('Location: chuyenhoa.php');
	exit;
}
if (isset($_GET['thao_b'])) {
	$_SESSION['vatpham_b'] = NULL;
	header('Location: chuyenhoa.php');
	exit;
}
echo '<div class="phdr">Rương đồ > <a href="index.php">Chuyển hóa</a></div>';
echo '<center>';
echo'<div class="omenu">Lưu ý: Giá mỗi lần chuyển là 100 lượng khóa/1</br>
Chỉ chuyển được các vật phẩm cùng loại và có thời hạn sử dụng vĩnh viễn
</div>';

if (empty($_SESSION['vatpham_a'])) {
	echo '<a href="/ruong"><font color="brown"><b>Chọn một vật phẩm muốn chuyển SM + HP </font></b></a><br/>';
} else {
	$ida = (int)$_SESSION['vatpham_a'];
	$check = mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id` = '".$user_id."' AND `id` = '".$ida."'"));
	if ($check < 1) {
		$_SESSION['vatpham_a'] = NULL;
		header('Location: chuyenhoa.php');
		exit;
	}
	$posta = mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `id` = '".$ida."'"));
	echo'<div class="omenu"><div class="lt">';
	echo '
	<table>
		<tr>
			<td><img src="/images/shop/'.$posta['id_shop'].'.png"></td>
			<td>
				<b><font color="green">'.$posta['tenvatpham'].'</font></b><br/>
				<font color="blue">Sức mạnh: <b>'.$posta['sucmanh'].' [ +'.$posta['cong'].' ]</b></font><br/>
				<font color="red">HP: <b>'.$posta['hp'].' [ +'.$posta['conghp'].' ]</b></font><br/>
				<a href="?thao_a"><b>[Tháo ra]</b></a>
			</td>
		</tr>
	</table>
	';
	echo'</div></div>';
}
echo '<img src="http://i.imgur.com/OIel4WF.png" width="50px"></br>';
echo '<img src="http://i.imgur.com/nLbPXQl.png" width="50px"></br>';
if (empty($_SESSION['vatpham_b'])) {
	echo '<a href="/ruong"><font color="brown"><b>Chọn một vật phẩm muốn chuyển SM + HP </font></b></a>';
} else {
	$idb = (int)$_SESSION['vatpham_b'];
	$check = mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id` = '".$user_id."' AND `id` = '".$idb."'"));
	if ($check < 1) {
		$_SESSION['vatpham_b'] = NULL;
		header('Location: chuyenhoa.php');
		exit;
	}
	$postb = mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `id` = '".$idb."'"));
		echo'<div class="omenu"><div class="lt">';

	echo '
	<table>
		<tr>
			<td><img src="/images/shop/'.$postb['id_shop'].'.png"></td>
			<td>
				<b><font color="green">'.$postb['tenvatpham'].'</font></b><br/>
				<font color="blue">Sức mạnh: <b>'.$postb['sucmanh'].' [ +'.$postb['cong'].' ]</b></font><br/>
				<font color="red">HP: <b>'.$postb['hp'].' [ +'.$postb['conghp'].' ]</b></font><br/>
				<a href="?thao_b"><b>[Tháo ra]</b></a>
			</td>
		</tr>
	</table>
	';
		echo'</div></div>';

}
if (!empty($_SESSION['vatpham_a']) && !empty($_SESSION['vatpham_b'])) {
	if (isset($_POST['submit'])) {
		if ($datauser['luongkhoa'] < 100) {
			echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ lượng khóa để thực hiện chuyển hóa</div>';
		} else if ($posta['loai'] != $postb['loai']) {
			echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Hai vật phẩm không cùng 1 loại</div>';
		} else if ($posta['timesudung'] != 0 || $postb['timesudung'] !=0) {
			echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Không thẻ chuyển hóa vật phẩm có hạn sử dụng</div>';
		} else {
			mysql_query("UPDATE `users` SET `luongkhoa` = `luongkhoa` - '100' WHERE `id` = '".$user_id."'");
			mysql_query("UPDATE `khodo` SET `sucmanh` = '".$postb['sucmanh']."', `hp` = '".$postb['hp']."', `cong` = '".$postb['cong']."', `conghp` = '".$postb['conghp']."' WHERE `id` = '".$posta['id']."'");
			mysql_query("UPDATE `khodo` SET `sucmanh` = '".$posta['sucmanh']."', `hp` = '".$posta['hp']."', `cong` = '".$posta['cong']."', `conghp` = '".$posta['conghp']."' WHERE `id` = '".$postb['id']."'");
			echo '<div class="omenu">Chuyển hóa thành công </div>';
			  $noidungx='Chúc mừng [red]'.$datauser['name'].'[/red] vừa chuyển hóa thành công từ [b]'.$posta['tenvatpham'].' [blue][+'.$posta['cong'].'SM][/blue][red] [+'.$posta['conghp'].'HP][/red][/b] sang [b]'.$postb['tenvatpham'].'  [blue][+'.$postb['cong'].'SM][/blue] [red][+'.$postb['conghp'].'HP][/red][/b] ';
        mysql_query("INSERT INTO `wnew` SET
`user` = '2',
`time` = '".time()."',
`text` = '".$noidungx."'
");
		}
	}
	echo '<form method="post"><input type="submit" value="Chuyển hóa" name="submit" class="nut"></form>';
}

echo'</center>';
break;
}
require('../incfiles/end.php');
?>