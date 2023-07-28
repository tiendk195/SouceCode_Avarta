<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
require('../incfiles/head.php');

if (!$user_id) {
header('Location: /index.php');
exit;
}
if ($datauser['kichhoat'] ==0 ){ 
echo'<div class="omenu">Vui lòng kích hoạt để sử dụng chức năng</div>';
require('../incfiles/end.php');
exit;
}
if ($datauser['postforum']<2) {
    echo'<div class="omenu">Bạn cần đạt 2 bài viết để vào đây</div></div>';
    require('../incfiles/end.php');
exit;
}
$dangusac=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='123'"));

switch($act) {
default:
echo '<div class="box_forums"><br/><div class="homeforum"><div class="icon-home"><div class="home">Ngoại ô</div></div></div></div>
<div class="phdr"><font color="white"> Biến đổi siêu xe '.($rights>=9?'- [<a href="?act=add"><b>Thêm đồ</b></a>]':'').' </font></div>';
echo'
<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tbody><tr><td width="80px;" class="blog-avatar"><img src="/icon/lethinh.gif"></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0"><tbody><tr><td class="current-blog" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div><img src="/images/on.png" alt="online"><font color="red"> <b> NPC Le Thinh</b></font><div class="text"><div class="omenu">';

$tong =mysql_result(mysql_query("SELECT COUNT(*) FROM `shopsieuxe`"),0);
$req=mysql_query("SELECT * FROM `shopsieuxe` WHERE  `id`!='0' ORDER BY `id` DESC LIMIT $start,$kmess");
while($res=mysql_fetch_array($req)) {
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$res['vatpham']."'"));

echo'<div class="omenu"><a href="?act=sieuxe&id='.$res['id'].'"><b><font color="003366"><img src="/icon/next.png"> Biến đổi '.$shop['tenvatpham'].'  </font></b></a></div>';


}
echo'</div>


</div></td></tr></tbody></table></td></tr></tbody></table>';
if ($tong > $kmess){
echo '<div class="topmenu">' . functions::pages('?page=', $start, $tong, $kmess) . '</div>';
}
break;

case 'add':
if ($rights>=9) {
Echo '<div class="box_forums"><br/><div class="homeforum"><div class="icon-home"><div class="home">Khu Ngoại Ô</div></div></div></div><div class="phdr">Thêm đồ</div>';
if (isset($_POST['add'])) {
$vatpham=(int)$_POST['vatpham'];
$dangusac =(int)$_POST['dangusac'];
$canvp=(int)$_POST['canvp'];
$xu=(int)$_POST['xu'];
$luong=(int)$_POST['luong'];
if (empty($vatpham) or empty($canvp) or empty($dangusac) or empty($xu) or empty($luong)) {
echo '<div class="news">Không được bỏ trống!</div>';
} else {

mysql_query("INSERT INTO `shopsieuxe` SET
`vatpham`='".$vatpham."',
`canvp`='".$canvp."',
`xu`='".$xu."',
`luong`='".$luong."',

`dangusac`='".$dangusac."'");
$tenvatpham=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$vatpham."'"));
echo '<div class="omenu">Thêm thành công</div>';
}}

echo '<form method="post">';


echo 'ID Vật phẩm: <input type="number" name="vatpham" size="1"><br/>';
echo 'ID Cần vp: <input type="number" name="canvp" size="1"><br/>';
echo 'Xu: <input type="number" name="xu" size="1"><br/>';
echo 'Lượng: <input type="luong" name="luong" size="1"><br/>';

echo 'Đá ngũ sắc: <input type="number" name="dangusac" size="1"><br/>';
echo '<input type="submit" name="add" value="Thêm">';
echo '</form>';
}
break;
case 'sieuxe':
echo '<div id="content-load">';
$id=(int)$_GET[id];
$check=mysql_num_rows(mysql_query("SELECT * FROM `shopsieuxe` WHERE `id`='".$id."'"));
if ($check<1) {
header('Location: sieuxe.php');
exit;
} else {
$item=mysql_fetch_array(mysql_query("SELECT * FROM `shopsieuxe` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item['vatpham']."'"));
$canvp=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item['canvp']."'"));
$ruong=mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp['loai']."' AND `user_id`='".$user_id."' AND `id_loai`='".$canvp['id_loai']."' AND `timesudung` = '0'"));
$ktruong=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp['loai']."' AND `id_loai`='".$canvp['id_loai']."' AND `user_id`='".$user_id."' AND `timesudung` = '0'"));


echo '<div class="box_forums"><br/><div class="homeforum"><div class="icon-home"><div class="home">Ghép mảnh</div>
</div></div></div><div class="phdr"><b>Biến đổi siêu xe - [<a href="sieuxe.php">Quay lại</a>]</b></div>';
echo'<div class="omenu">Bạn đang có '.number_format($dangusac['soluong']).' đá ngũ sắc </div>';


if (isset($_POST['biendoi'])) {
	
				if ($dangusac['soluong']<$item['dangusac']|| $ktruong<1 ||  $datauser['xu']<$item['xu'] ||  $datauser['luong']<$item['luong'] ) {
			echo '<div class="omenu">Chưa đủ điều kiện để biến đổi siêu xe!</div>';
			} else {
mysql_query("UPDATE `users` SET `xu`=`xu`-'".$item['xu']."', `luong`=`luong`- '".$item['luong']."' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$item['dangusac']."' WHERE `user_id`='".$user_id."' AND `id_shop`='123'");

mysql_query("DELETE FROM `khodo` WHERE `id`='".$ruong['id']."' LIMIT 1");

mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$shop['loai']."',
`id_loai`='".$shop['id_loai']."',
`timesudung`='".$ruong['timesudung']."',
`tenvatpham`='".$shop['tenvatpham']."',
`id_shop`='".$shop['id']."'
");
$bot='[b][red]Xin chúc mừng [blue]'.$login.'[/blue] vừa biến đổi thành công [blue]'.$shop['tenvatpham'].' ! [/blue][/red][/b]';


mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
echo '<div class="omenu">Biến đổi thành công: <font color="red"><b>'.$shop['tenvatpham'].'</b></font></div>';
			
	
			}
}
}








echo '<form method="post">';
echo'
<div class="omenu"><center><img src="/images/shop/'.$shop['id'].'.png"><br>Bạn có muốn Biến đổi <font color="green">'.$shop['tenvatpham'].'</font> bằng <font color="red"> ';

echo''.$canvp['tenvatpham'].'  <img src="/images/shop/'.$canvp['id'].'.png"></font> +<b> '.number_format($item['xu']).' xu, '.number_format($item['luong']).' lượng và '.number_format($item['dangusac']).' <img src="/images/vatpham/123.png"> đá ngũ sắc</b>';

 
echo' không?<br>
</br>
<form method="post">	<input type="submit" value="Biến đổi" name="biendoi"> </input></form>
<center></div>';



echo '</div>';
break;
}

require('../incfiles/end.php');
?>