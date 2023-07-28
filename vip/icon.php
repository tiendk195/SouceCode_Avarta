<?php



define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl = 'Shop Icon';

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
echo'<div class="nenvip">Mua Icon Nick</div>';
if ($datauser['rights']>=9) {
    echo'<div class="omenu"><a href="?act=add">Thêm</a></div>';
}

switch($act) {
default:
$tong =mysql_result(mysql_query("SELECT COUNT(*) FROM `shopicon` "),0);
$req=mysql_query("SELECT * FROM `shopicon` ORDER BY `id` AND `hienthi`='0' DESC LIMIT $start,$kmess");
while($res=mysql_fetch_array($req)) {


    echo'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><img src="/icon/nick/'.$res['id'].'.gif">
</td>
<td class="right-info">
Giá: <font color="red">'.number_format($res['diem']).'</font> <img src="/images/vatpham/122.png"><br>
<a href="?act=mua&amp;id='.$res['id'].'"><input type="submit" name="submit" value="Mua"></a>
';
              if ($datauser['rights'] >= 9) {
    echo' <a href="?act=xoa&id='.$res[id].'"><input type="submit" name="submit" value="Xóa"></a>';
      echo' <a href="?act=edit&id='.$res[id].'"><input type="submit" name="submit" value="Sửa"></a>';
    } 

          echo'</td></tr></tbody></table>';


}
if ($tong > $kmess){
echo '<div class="topmenu">' . functions::display_pagination('icon.php?', $start, $tong, $kmess) . '</div>';
}
break;
case 'edit':
if ($rights>=9) {


$id=$_GET[id];
$item=mysql_fetch_array(mysql_query("SELECT * FROM `shopicon` WHERE `id`='".$id."'"));
  $xyz=mysql_num_rows(mysql_query("SELECT * FROM `shopicon` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}

echo '<div class="homeforum"><br/><div class="icon-home"><div class="home">Khu Mua Sắm</div></div></div>';

echo '<div class="nenvip"><b>Edit</b></div>';
if (isset($_POST[submit])) {
    $timesd=(int)$_POST[timesudung];

  
@mysql_query("UPDATE `shopicon` SET
`diem`='".$_POST[diem]."'


WHERE `id`='".$id."'
");

echo '<div class="omenu">Edit thành công! </div>';
}
echo '<img src="/icon/nick/'.$item['id'].'.gif">';
echo '<form method="post">';


echo 'Nhập điểm: <input type="number" name="diem" value="'.$item[diem].'"><br/>';

echo '<input type="submit" name="submit" value="Lưu">';
echo '</form>';
}
break;
case 'xoa':
if ($datauser['rights'] >= 9) {
$id = $_GET['id'];
if (isset($_POST['delit'])) {
mysql_query("DELETE FROM `shopicon` WHERE `id`='".$id."'");
    header ('Location : icon.php ');

}
$checkit = mysql_result(mysql_query("select count(*) from `shopicon` where `id` = '".$id."'"),0);
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
$id=(int)$_POST[id];
$diem=(int)$_POST[diem];
$hsd=(int)$_POST[hsd];
/*
if ($hsd !=0)
{
$timesd= $hsd*24*3600+time();
}
*/
$checkit = mysql_result(mysql_query("select count(*) from `shopicon` where `id` = '".$id."'"),0);
if ($checkit == $id) {
	echo '<div class="omenu">Vật phẩm đã có trong shop !</div>';
} else 
if (empty($id) || empty($diem)) {
echo '<div class="news">Không được bỏ trống chỗ nào hết!</div>';
} else {
mysql_query("INSERT INTO `shopicon` SET
`id`='".$id."',
`diem`='".$diem."'");
$tenvatpham=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$vatpham."'"));
$bot='[b]'.$login.' vừa thêm [red]'.$tenvatpham[tenvatpham].' [/red] vào shop chém gió![/b]';
//mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
echo '<div class="omenu">Thêm thành công</div>';
}
}
$i=1;
for($j=1;$j<=10001;$j++){
if(getimagesize('../icon/nick/'.$j.'.gif')!=false) {
if($i%10==1){
if($i!=1) echo'</tr>';
echo'<tr>';
}
$checkit = mysql_result(mysql_query("select count(*) from `shopicon` where `id` = '".$j."'"),0);

echo'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><img src="/icon/nick/'.$j.'.gif">
</td>
<td class="right-info">
ID: '.$j.' ';
if ($checkit >0) {
	echo'(<font color="red">Đã có</font>)';
}
echo'
</td>
</tr></tbody></table>';

$i++;
}
}
echo '<form method="post">';

echo 'ID: <input type="number" name="id" size="5"><br/>';


echo 'Cần điểm: <input type="number" name="diem" size="5"><br/>';

echo '<input type="submit" name="add" value="Thêm">';
echo '</form>';
}
break;
case 'mua':



$id = (int)$_GET['id'];
$check=mysql_num_rows(mysql_query("SELECT * FROM `shopicon` WHERE `id`='".$id."'"));
if ($check<1) {
header('Location: icon.php');
exit;
}

$item=mysql_fetch_array(mysql_query("SELECT * FROM `shopicon` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item[idshop]."'"));
echo'<div class="omenu"><center>Xin chào!<br>
Bạn có muốn mua Icon <img src="/icon/nick/'.$item['id'].'.gif"> với giá <font color="green">'.$item['diem'].' Thẻ VIP <img src="/images/vatpham/122.png"></font> không?
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
$kt = mysql_fetch_array(mysql_query("SELECT * FROM `ruongicon` WHERE `user_id` = '".$user_id."'"));
if ($kt['icon']==$item['id']) {
	echo'<div class="omenu">Lỗi! Bạn đã sở hữu <img src="/icon/nick/'.$item['id'].'.gif"></div> ';
} else
if ($thevip['soluong']>=$item['diem']) {   
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$item['diem']."' WHERE `user_id`='".$user_id."' AND `id_shop`='122'");
mysql_query("INSERT INTO `ruongicon` SET
`user_id` = '".$user_id."',
`icon` = '".$item['id']."'
");

echo'<div class="omenu">Bạn đã mua thành công: <b><font color="red"><img src="/icon/nick/'.$item['id'].'.gif"> ';
              echo'</font></b></div>';
}else{
echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn cần <font color="green">'.$item['diem'].' Thẻ VIP <img src="/images/vatpham/122.png"></font> mới có thể mua Icon!</div>';
}
}





break;
}

require('../incfiles/end.php');
?>