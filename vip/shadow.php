<?php



define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl = 'Shop Hiệu Ứng';

if (!$user_id) {
    require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
require('../incfiles/head.php');
if ($datauser['kichhoatvip']<1) {
    header ('Location : index.php ');
exit;
}
echo'<div class="nenvip">Mua Hiệu ứng nick</div>';

switch($act) {
default:

echo'<div class="omenu"><div class="lt"><center>';
if ($datauser['shadow']=='') {
echo'Bạn chưa sở hữu hiệu ứng nào!';
} else {
echo'Bạn đang sở hữu Hiệu ứng <span class="rank2"><span class="'.$datauser['shadow'].'">  '.nick($datauser['id']).'</span></span> Còn: <font color="red">'.($datauser['timeshadow'] < time() ? '<font color="red">Đã hết hạn</font>' : '<b>'.thoigiantinh($datauser['timeshadow']).'</b>').'</font><br>
<br>'.($datauser['btshadow'] == '1' ? '<a href="?act=tathieuung"><input type="submit" name="tat" value="Tắt"></a>' : '<a href="?act=bathieuung"><input type="submit" name="bat" value="Bật"></a>').' 
<a href="?act=xoahieuung"><input id="submit" type="submit" name="submit" value="Xóa"></a> ';
}
echo'
</center></div></div>';
echo'<div class="nenvip">Khu VIP</div>';


if ($datauser['rights']>=9) {
    echo'<div class="omenu"><a href="?act=add">Thêm</a></div>';
}




$tong =mysql_result(mysql_query("SELECT COUNT(*) FROM `shophieuung` "),0);
$req=mysql_query("SELECT * FROM `shophieuung` ORDER BY `id`DESC LIMIT $start,$kmess");
echo'<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
<tbody><tr><td width="55px;" class="blog-avatar"><img src="/avatar/'.$datauser['id'].'.png"></td><td style="" vertical-align:="" bottom;"=""><table cellpadding="" cellspacing=""><tbody>
<tr><td class="current-blog" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div><img src="/images/on.png" alt="online"><font color="red"> <b> Mua hiệu ứng nick </b></font><div class="text">
';
while($res=mysql_fetch_array($req)) {


echo'<div class="omenu"><a href="?act=mua&amp;id='.$res['id'].'"><img src="/images/vao.png"> Mua hiệu ứng <span class="'.$res['loai'].'">    '.nick($datauser['id']).'</span> </a>';
             if ($datauser['rights'] >= 9) {
    echo' <a href="?act=xoa&id='.$res[id].'">(Xóa)</a>';
      echo' <a href="?act=edit&id='.$res[id].'">(Sửa)</a>';
    }
echo'</div>';



}
echo'</div></td></tr></tbody></table>';
    
  
echo'</td></tr></tbody></table>';
if ($tong > $kmess){
echo '<div class="topmenu">' . functions::display_pagination('shadow.php?', $start, $tong, $kmess) . '</div>';
}
break;
case 'tathieuung':
if ($datauser['btshadow'] == 2) {
	echo '<div class="omenu">Bạn đã tắt rồi !</div>';
} else 
if ($datauser['shadow'] == '') {
	echo '<div class="omenu">Bạn chưa có hiệu ứng nào !</div>';
} else {

					mysql_query("UPDATE `users` SET `btshadow` = '2' WHERE `id` = '".$user_id."'");
}
    header ('Location : shadow.php ');

break;
case 'bathieuung':
if ($datauser['btshadow'] == 1) {
	echo '<div class="omenu">Bạn đã bật rồi !</div>';
} else 
if ($datauser['shadow'] == '') {
	echo '<div class="omenu">Bạn chưa có hiệu ứng nào !</div>';
} else {

					mysql_query("UPDATE `users` SET `btshadow` = '1' WHERE `id` = '".$user_id."'");
}
    header ('Location : shadow.php ');
break;
case 'xoahieuung':
if ($datauser['shadow'] == '') {
	echo '<div class="omenu">Bạn chưa có hiệu ứng nào !</div>';
} else {

					mysql_query("UPDATE `users` SET `shadow` = '',`timeshadow`='0' WHERE `id` = '".$user_id."'");
}
    header ('Location : shadow.php ');

break;
case 'edit':
if ($rights>=9) {


$id=$_GET[id];
$item=mysql_fetch_array(mysql_query("SELECT * FROM `shophieuung` WHERE `id`='".$id."'"));
  $xyz=mysql_num_rows(mysql_query("SELECT * FROM `shophieuung` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}

echo '<div class="homeforum"><br/><div class="icon-home"><div class="home">Khu Mua Sắm</div></div></div>';

echo '<div class="nenvip"><b>Edit</b></div>';
if (isset($_POST[submit])) {
    $timesd=(int)$_POST[timesudung];

  
@mysql_query("UPDATE `shophieuung` SET
`luong`='".$_POST[diem]."'


WHERE `id`='".$id."'
");

echo '<div class="omenu">Edit thành công! </div>';
}
echo '<form method="post">';


echo 'Nhập lượng: <input type="number" name="diem" value="'.$item[luong].'"><br/>';

echo '<input type="submit" name="submit" value="Lưu">';
echo '</form>';
}

break;
case 'xoa':
if ($datauser['rights'] >= 9) {
$id = $_GET['id'];
if (isset($_POST['delit'])) {
mysql_query("DELETE FROM `shophieuung` WHERE `id`='".$id."'");
    header ('Location : shadow.php ');

}
$checkit = mysql_result(mysql_query("select count(*) from `shophieuung` where `id` = '".$id."'"),0);
if ($checkit == 0) {
	echo '<div class="omenu">Không có Item này !</div>';
} else {
echo '<div class="phdr"> Xóa Item </div>';
echo '<center><div class="omenu">Bạn có chắc muốn xóa item này khỏi shop ?<br/>
<form method="post"><input type="submit" name="delit" value="Xóa"></form></div>';
}
}
break;
case 'add':
if ($datauser['rights'] >=9) {
if (isset($_POST[add])) {
$loai = $_POST[loai];
$diem=(int)$_POST[diem];
$hsd=(int)$_POST[hsd];
/*
if ($hsd !=0)
{
$timesd= $hsd*24*3600+time();
}
*/
$checkit = mysql_result(mysql_query("select count(*) from `shophieuung` where `loai` = '".$loai."'"),0);
if ($checkit == $loai) {
	echo '<div class="omenu">Vật phẩm đã có trong shop !</div>';
} else 
if (empty($loai) || empty($diem)) {
echo '<div class="news">Không được bỏ trống chỗ nào hết!</div>';
} else {
mysql_query("INSERT INTO `shophieuung` SET
`loai`='".$loai."',
`luong`='".$diem."'");
$tenvatpham=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$vatpham."'"));
$bot='[b]'.$login.' vừa thêm [red]'.$tenvatpham[tenvatpham].' [/red] vào shop chém gió![/b]';
//mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
echo '<div class="omenu">Thêm thành công</div>';
}




}
echo '<form method="post">';


echo 'Loại: <input type="text" name="loai" size="5"><br/>';

echo 'Cần lượng: <input type="number" name="diem" size="5"><br/>';

echo '<input type="submit" name="add" value="Thêm">';
echo '</form>';
}
break;
case 'mua':



$id = (int)$_GET['id'];
$check=mysql_num_rows(mysql_query("SELECT * FROM `shophieuung` WHERE `id`='".$id."'"));
if ($check<1) {
header('Location: shadow.php');
exit;
}

$item=mysql_fetch_array(mysql_query("SELECT * FROM `shophieuung` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item[idshop]."'"));
echo'<div class="omenu"><center>Xin chào!<br>
Bạn có muốn mua hiệu ứng <span class="'.$item['loai'].'">(    '.nick($datauser['id']).'  </span>) với giá <font color="green">'.$item['luong'].' Lượng</font> không?
<br>
<form method="post"><input class="submit" type="submit" name="mua" value="Mua"> </form>
<center></center></center></div>';
 
/*
if($datauser['mattrang'] < $item['mattrang']){
echo'<div class="pmenu"> Lỗi! Bạn không đủ đá mặt trăng</div>';
} else  {
echo'<div class="rmenu"><b>Đổi thành công!</div>';
mysql_query("INSERT INTO `khodo` SET `user_id`='".$user_id."', `id_shop`='".$shop['id']."', `loai`='".$shop['loai']."', `id_loai`='".$shop['id_loai']."', `tenvatpham` = '".$shop['tenvatpham']."', `timesudung`='".$shop['timesudung']."'");

mysql_query("UPDATE `users` SET `mattrang` = `mattrang` - '".$item['mattrang']."' WHERE `id` = '".$user_id."'");
}
}
*/
if(isset($_POST['mua'])){
	$thevip=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='122'"));
if ($datauser['shadow'] !='') {
	echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn cần xóa hiệu ứng cữ mới có thể mua hiệu ứng này!</div>';
} else 
if ($datauser['luong']>=$item['luong']) {   
	$time = time() + 7 * 24 * 3600;
			mysql_query("UPDATE `users` SET `luong`=`luong`-'".$item['luong']."',`shadow` = '".$item['loai']."',`timeshadow`= '".$time."', `btshadow`='1' WHERE `id` = '".$user_id."'");
			
echo'<div class="omenu"><font color="blue"><b>Thành công!</b></font> Bạn đã mua hiệu ứng <span class="'.$item['loai'].'">( '.nick($datauser['id']).')</span> với thời hạn
<font color="red">7 ngày</font></div>';
}else{
echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn cần <font color="green">'.$item['luong'].' Lượng mới có thể mua hiệu ứng này!</div>';
}
}





break;
}

require('../incfiles/end.php');
?>