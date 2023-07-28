<?php



define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl = 'Shop năng động';

if (!$user_id) {
    require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
require('../incfiles/head.php');
echo'<div class="phdr">Shop năng động</div>';
echo'<div class="omenu"><center>Bạn đang có <b> <font color="red">'.number_format($datauser['diemnangdong']).'</font></b> điểm năng động</br>Điểm năng động có được khi làm nhiệm vụ hằng ngày/tân thủ </center></div>';

if ($datauser['rights']>=9) {
    echo'<div class="omenu"><a href="?act=add">Thêm đồ</a></div>';
}

switch($act) {
default:
$tong =mysql_result(mysql_query("SELECT COUNT(*) FROM `shopnangdong` "),0);
$req=mysql_query("SELECT * FROM `shopnangdong` ORDER BY `id` DESC LIMIT $start,$kmess");
while($res=mysql_fetch_array($req)) {


$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$res[idshop]."'"));
echo'<div class="omenu">
 <img src="/images/khungvien.png"><img src="/images/shop/'.$shop['id'].'.png" style="position: absolute;verticalalign: 0 px;margin:0px 0 0 -45px;">
       <font style="position: absolute;verticalalign: 0 px;margin:10px 0 0 0px;"><font color="ff007f">Vật phẩm:</font>
          '.$shop[tenvatpham].'';
 if ($res['timebd']==0) { 
              echo' (Vĩnh viễn)'; 
              } else {
                             echo' ('.$res['timebd'].' ngày)'; 
              }
			  echo'
          </br><font color="ff007f">Cần:</font> '.number_format($res['diem']).' Điểm năng động</font>
          <a href="?act=doi&id='.$res[id].'" class="menu" style="float:right"><button type="button">Đổi</button></a> 
            ';
			if ($datauser['rights'] >= 9) {
    echo' </br><a href="?act=xoa&id='.$res[id].'"><input type="submit" name="submit" value="Xóa"></a>';
      echo' <a href="?act=edit&id='.$res[id].'"><input type="submit" name="submit" value="Sửa"></a>';
    } 
			ECHO'
           <br></div>';   
  

}
if ($tong > $kmess){
echo '<div class="topmenu">' . functions::display_pagination('shopnangdong.php?', $start, $tong, $kmess) . '</div>';
}
break;
case 'edit':
if ($rights>=9) {


$id=$_GET[id];
$item=mysql_fetch_array(mysql_query("SELECT * FROM `shopnangdong` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item[idshop]."'"));
  $xyz=mysql_num_rows(mysql_query("SELECT * FROM `shopnangdong` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}


echo '<div class="phdr"><b>'.$shop[tenvatpham].'</b></div>';
if (isset($_POST[submit])) {
    $timesd=(int)$_POST[timesudung];

  
@mysql_query("UPDATE `shopnangdong` SET
`diem`='".$_POST[diemnangdong]."',
`timebd`='".$_POST[timesudung]."'


WHERE `id`='".$id."'
");

echo '<div class="omenu">Edit thành công! </div>';
}
echo '<img src="/images/shop/'.$shop['id'].'.png">';
echo '<form method="post">';

echo 'Thời hạn(nhập ngày): <input type="number" name="timesudung" value="'.$item[timebd].'"><br/>';

echo 'Nhập điểm: <input type="number" name="diemnangdong" value="'.$item[diem].'"><br/>';

echo '<input type="submit" name="submit" value="Lưu">';
echo '</form>';
}
break;
case 'xoa':
if ($datauser['rights'] >= 9) {
$id = $_GET['id'];
if (isset($_POST['delit'])) {
mysql_query("DELETE FROM `shopnangdong` WHERE `id`='".$id."'");
    header ('Location : shopnangdong.php ');

}
$checkit = mysql_result(mysql_query("select count(*) from `shopnangdong` where `id` = '".$id."'"),0);
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
$vatpham=(int)$_POST[vatpham];
$diem=(int)$_POST[diem];
$hsd=(int)$_POST[hsd];
/*
if ($hsd !=0)
{
$timesd= $hsd*24*3600+time();
}
*/
if (empty($vatpham)) {
echo '<div class="news">Không được bỏ trống chỗ nào hết!</div>';
} else {
mysql_query("INSERT INTO `shopnangdong` SET
`idshop`='".$vatpham."',
`diem`='".$diem."',
`timebd`='".$hsd."'");
$tenvatpham=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$vatpham."'"));
$bot='[b]'.$login.' vừa thêm [red]'.$tenvatpham[tenvatpham].' [/red] vào shop năng động![/b]';
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
echo '<div class="rmenu">Thêm thành công</div>';
}
}
echo '<form method="post">';
echo 'Vật phẩm: <select name="vatpham">';
$qs=mysql_query("SELECT * FROM `shopdo` WHERE `hienthi`='1'");
while ($show=mysql_fetch_array($qs)) {
echo '<option value="'.$show[id].'"> '.$show['id'].': '.$show[tenvatpham].'</option>';
}
echo '</select><br/>';
echo 'Cần điểm: <input type="number" name="diem" size="5"><br/>';
echo 'Hạn sử dụng: <input type="number" name="hsd" size="5"><br/>';

echo '<input type="submit" name="add" value="Thêm">';
echo '</form>';
}
break;
case 'doi':



$id = (int)$_GET['id'];
$check=mysql_num_rows(mysql_query("SELECT * FROM `shopnangdong` WHERE `id`='".$id."'"));
if ($check<1) {
header('Location: shopnangdong.php');
exit;
}

$item=mysql_fetch_array(mysql_query("SELECT * FROM `shopnangdong` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item[idshop]."'"));
echo'<div class="omenu"><center> <img src="/images/shop/'.$shop['id'].'.png"><br>Bạn có muốn đổi <font color="ff007f">'.$shop['tenvatpham'].' ';
if ($item['timebd']==0) { 
              echo' (Vĩnh viễn)'; 
              } else {
                             echo' ('.$item['timebd'].' ngày)'; 
              }
echo'</font> với <b>'.number_format($item['diem']).' Điểm năng động không </b>? <br>

 <form method="post">
    <center><input type="submit" name="submit" value="Đổi" class="button" />


</center></div>';
 
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
if(isset($_POST['submit'])){
$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else 

if($datauser['diemnangdong'] >= $item['diem']){
    
    if ($item['timebd'] !=0)
{
$timesd= $item['timebd']*24*3600+time();
}
mysql_query("UPDATE `users` SET `diemnangdong` = `diemnangdong` - '".$item['diem']."' WHERE `id` = '".$user_id."'");
mysql_query("INSERT INTO `khodo` SET `user_id`='".$user_id."', `id_shop`='".$shop['id']."', `loai`='".$shop['loai']."', `id_loai`='".$shop['id_loai']."', `tenvatpham` = '".$shop['tenvatpham']."', `timesudung`='".$timesd."'");


echo'<div class="omenu">Bạn đã đổi thành công: <b><font color="red"> '.$shop['tenvatpham'].' ';
 if ($item['timebd']==0) { 
              echo' (Vĩnh viễn)'; 
              } else {
                             echo' ('.$item['timebd'].' ngày)'; 
              }
              echo'</font></b></div>';
}else{
echo'<div class="omenu">Giao dịch không thành công !!</div>';
}
}





break;
}

require('../incfiles/end.php');
?>