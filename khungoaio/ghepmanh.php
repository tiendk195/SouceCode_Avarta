<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
require('../incfiles/head.php');

if (!$user_id) {
header('Location: /index.php');
exit;
}

if ($datauser['postforum']<2 && $datauser['id']!=1) {
    echo'<div class="omenu">Bạn cần đạt 2 bài viết để vào đây</div>';
    require('../incfiles/end.php');
exit;
}

switch($act) {
default:
echo '
<div class="phdr"><font color="white"> Ghép mảnh '.($rights>=9?'- [<a href="?act=add"><b>Thêm đồ</b></a>]':'').' </font></div>';
if ($datauser['kichhoat']==0){
		echo'<div class="omenu"><b><font color="red">Lỗi!</font></b>Bạn cần kích hoạt tài khoản</div>';
require('../incfiles/end.php');
exit;
} 
echo'
<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tbody><tr><td width="80px;" class="blog-avatar"><img src="/icon/lethinh.gif"></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0"><tbody><tr><td class="current-blog" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div><img src="/images/on.png" alt="online"><font color="red"> <b> NPC Le Thinh</b></font><div class="text"><div class="lethinhdz">';

$tong =mysql_result(mysql_query("SELECT COUNT(*) FROM `shopghepmanh`"),0);
$req=mysql_query("SELECT * FROM `shopghepmanh` WHERE  `id`!='0' ORDER BY `id` DESC LIMIT $start,$kmess");
while($res=mysql_fetch_array($req)) {
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$res['vatpham']."'"));

echo'<div class="omenu"><a href="?act=ghepmanh&id='.$res['id'].'"><b><font color="003366"><img src="/icon/next.png"> Ghép mảnh '.$shop['tenvatpham'].'  </font></b></a>   '.($rights>=9?'- [<a href="?act=xoa&id='.$res['id'].'"><b>Xóa</b></a>]':'').'</div>';

/*
echo'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info"><tbody><tr>
<td class="left-info"><img src="/images/shop/'.$res['vatpham'].'.png"></td><td class="right-info"><span>
<b><a href="?act=ghepmanh&id='.$res['id'].'"> '.$shop['tenvatpham'].' </a></b></span></td></tr></tbody></table>';
*/
}
echo'</div>


</div></td></tr></tbody></table></td></tr></tbody></table>';
if ($tong > $kmess){
echo '<div class="topmenu">' . functions::pages('?page=', $start, $tong, $kmess) . '</div>';
}
break;

case 'add':
if ($rights>=9) {
Echo '<div class="phdr">Thêm đồ</div>';
if (isset($_POST['add'])) {
$vatpham=(int)$_POST['vatpham'];
$manh=(int)$_POST['manh'];
$idshop=(int)$_POST['idshop'];


if (empty($vatpham) or empty($manh) or empty($idshop) or ($manh)<=0) {
echo '<div class="omenu">Lỗi!</div>';
} else {
mysql_query("INSERT INTO `shopghepmanh` SET
`vatpham`='".$vatpham."',
`id_shop`='".$idshop."',

`manh`='".$manh."'");
$tenvatpham=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$vatpham."'"));
echo '<div class="omenu">Thêm thành công</div>';
}
}
echo '<form method="post">';
$cvp=mysql_query("SELECT * FROM `shopdo`");

echo 'Vật phẩm: <select name="vatpham">';
$nc=mysql_query("SELECT * FROM `shopdo` WHERE `hienthi`='1'");
while ($show=mysql_fetch_array($nc)) {
echo '<option value="'.$show['id'].'"> '.$show['tenvatpham'].'</option>';
}
echo '</select><br/>';
echo 'ID Shop: <select name="idshop">';
$nc2=mysql_query("SELECT * FROM `shopvatpham` ");
while ($show2=mysql_fetch_array($nc2)) {
echo '<option value="'.$show2['id'].'"> '.$show2['tenvatpham'].'</option>';
}

echo '</select></br>Số Mảnh: <input type="number" name="manh" size="1"><br/>';
echo '<input type="submit" name="add" value="Thêm">';
echo '</form>';
}
break;
case 'ghepmanh':
echo '<div id="content-load">';
$id=(int)$_GET[id];
$check=mysql_num_rows(mysql_query("SELECT * FROM `shopghepmanh` WHERE `id`='".$id."'"));
if ($check<1) {
header('Location: ghepmanh.php');
exit;
} else {
$item=mysql_fetch_array(mysql_query("SELECT * FROM `shopghepmanh` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item['vatpham']."'"));
$shopvp=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$item['id_shop']."'"));

$canvp=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item['canvp']."'"));
$ruong=mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp['loai']."' AND `user_id`='".$user_id."' AND `id_loai`='".$canvp['id_loai']."' AND `timesudung` = '0'"));
$ktruong=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp['loai']."' AND `id_loai`='".$canvp['id_loai']."' AND `user_id`='".$user_id."' AND `timesudung` = '0'"));
$m1=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='".$shopvp['id']."'"));


echo '<div class="phdr"><b>Ghép mảnh - [<a href="ghepmanh.php">Quay lại</a>]</b></div>';

if (isset($_POST['ghepmanh'])) {
	$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else     			$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='".$shop['id']."' AND `user_id`='".$user_id."'");
$checkdo=mysql_num_rows($query);
if ($checkdo>=1) {
    echo'<div class="omenu">Giao dịch không thành công, Bạn đã sở hữu  <b>'.$shop['tenvatpham'].'</b> !!</div>';
} else 
	//if ($item['loaimanh'] ==1) {
		if ( $m1['soluong']<$item['manh']) {
			echo '<div class="omenu">Chưa đủ điều kiện để ghép mảnh. </div>';
		} else {
			mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$item['manh']."' WHERE `user_id`='".$user_id."' AND `id_shop`='".$shopvp['id']."'");
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$shop['loai']."',
`id_loai`='".$shop['id_loai']."',
`timesudung`='".$ruong['timesudung']."',
`tenvatpham`='".$shop['tenvatpham']."',
`id_shop`='".$shop['id']."'
");
$bot='[b][red]Xin chúc mừng [blue]'.$login.'[/blue] vừa ghép thành công [blue]'.$shop['tenvatpham'].' ! [/blue][/red][/b]';


mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
echo '<div class="omenu">Ghép thành công: <font color="red"><b>'.$shop['tenvatpham'].'</b></font></div>';
		}

}	
echo '<form method="post">';
echo'<div class="omenu">Bạn đang có '.$m1['soluong'].'<img src="/images/vatpham/'.$shopvp['id'].'.png"> '.$shopvp['tenvatpham'].'!</div>';
echo'
<div class="omenu"><center><br>Bạn có muốn ghép vật phẩm <font color="green">'.$shop['tenvatpham'].'</font> bằng <font color="red"> ';

echo''.$item['manh'].' <img src="/images/vatpham/'.$shopvp['id'].'.png"></font>';

 
echo' không?<br>
</br>
<form method="post">	<input type="submit" value="Ghép" name="ghepmanh"> </input></form>
<center></div>';


}
echo '</div>';
break;
case 'xoa':
if ($rights>=9) {
echo '<div id="content-load">';
$id=(int)$_GET[id];
$check=mysql_num_rows(mysql_query("SELECT * FROM `shopghepmanh` WHERE `id`='".$id."'"));
if ($check<1) {
header('Location: ghepmanh.php');
exit;
} else {
$item=mysql_fetch_array(mysql_query("SELECT * FROM `shopghepmanh` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item['vatpham']."'"));
$shopvp=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$item['id_shop']."'"));

$canvp=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item['canvp']."'"));
$ruong=mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp['loai']."' AND `user_id`='".$user_id."' AND `id_loai`='".$canvp['id_loai']."' AND `timesudung` = '0'"));
$ktruong=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp['loai']."' AND `id_loai`='".$canvp['id_loai']."' AND `user_id`='".$user_id."' AND `timesudung` = '0'"));
$m1=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='".$shopvp['id']."'"));


echo '<div class="phdr"><b>Ghép mảnh - [<a href="ghepmanh.php">Quay lại</a>]</b></div>';

if (isset($_POST['xoa'])) {
	
		
mysql_query("DELETE FROM `shopghepmanh` WHERE `id`='".$item[id]."'");
header('Location: ghepmanh.php');
		}

}	
echo '<form method="post">';
echo'
<div class="omenu"><center><img src="/images/shop/'.$shop['id'].'.png"><br>Bạn có muốn xóa vật phẩm <font color="green">'.$shop['tenvatpham'].'</font> khỏi <font color="red"> ';

echo'Shop ghép mảnh</font> không';

 
echo'
</br>
<form method="post">	<input type="submit" value="Xóa" name="xoa"> </input></form>
<center></div>';



echo '</div>';
}
break;

}

require('../incfiles/end.php');
?>