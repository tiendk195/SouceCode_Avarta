<?php



define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl = 'Thùng rác';

if (!$user_id) {
    require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
require('../incfiles/head.php');
echo'<div class="phdr">Thùng rác của bạn - <a href="index.php">Trở lại rương</a></div>';


switch($act) {
default:
$tong =mysql_result(mysql_query("SELECT COUNT(*) FROM `thungrac`  WHERE `user_id`='".$user_id."'"),0);
$req=mysql_query("SELECT * FROM `thungrac` WHERE `user_id`='".$user_id."' ORDER BY `id` DESC LIMIT $start, $kmess");
echo'<center><div class="omenu"><b><font color="red">Lưu ý:</font></b> Thùng rác vật phẩm chỉ lưu giữ item trong 1 ngày</div></center>';
$check=mysql_num_rows(mysql_query("SELECT * FROM `thungrac` WHERE `user_id`= '".$user_id."'"));
if ($check>=1) {
echo'<div class="omenu"><a href="thungrac.php?act=xoaall">Xóa tất cả</a></div>';

}
while($res=mysql_fetch_array($req)) {


$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$res[idshop]."'"));
echo'<div class="omenu"><img style="border: 1px solid #FF0000;" src="/images/shop/'.$res['id_shop'].'.png" alt="do"><br>
Tên vật phẩm: <font color="blue">'.$res['tenvatpham'].'</font><br>
Thời gian bỏ: <font color="red"> '.date("d/m/Y - H:i", $res['time']).'</font>
<center><a href="thungrac.php?act=khoiphuc&id='.$res['id'].'"><input id="submit" type="submit" name="submit" value="Khôi phục"></a></center></div>
';


}
if($tong <= 0){
echo'<div class="omenu">Thùng rác của bạn trống!</div>';
}else if($tong > $kmess){

echo '<div class="topmenu">' . functions::display_pagination('thungrac.php?', $start, $tong, $kmess) . '</div>';
}
break;
case 'xoaall':
$check=mysql_num_rows(mysql_query("SELECT * FROM `thungrac` WHERE `user_id`= '".$user_id."'"));
if ($check<1) {
header('Location: thungrac.php');
exit;
}
	mysql_query("DELETE FROM `thungrac` where `user_id`= '".$user_id."'");

header('Location: thungrac.php');


break;
case 'khoiphuc':



$id = (int)$_GET['id'];
$check=mysql_num_rows(mysql_query("SELECT * FROM `thungrac` WHERE `id`='".$id."' AND `user_id`= '".$user_id."'"));
if ($check<1) {
header('Location: thungrac.php');
exit;
}

$item=mysql_fetch_array(mysql_query("SELECT * FROM `thungrac` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item[idshop]."'"));
echo'<div class="omenu"><center> <img src="/images/shop/'.$item['id_shop'].'.png"><br>Bạn có muốn khôi phục lại <font color="ff007f">'.$item['tenvatpham'].' ';

echo'</font>  không? <br>

 <form method="post">
    <center><input type="submit" name="submit" value="Khôi phục" class="button" />


</center></div>';
 

//if(isset($_POST['submit'])){
$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else {

    echo'<div class="omenu">Khôi phục thành công. <a href="thungrac.php">Quay lại thùng rác</a>!!</div>';
	mysql_query("DELETE FROM `thungrac` where `id`='{$item['id']}' ");
	@mysql_query("INSERT INTO `khodo` SET
 `id_shop`='".$item['id_shop']."',
 `user_id`='".$user_id."',
 `id_loai`='".$item['id_loai']."',
 `tenvatpham` ='".$item['tenvatpham']."',
  `timesudung` ='0',
 `loai`='".$item['loai']."'");

}

header('Location: thungrac.php');






break;
}

require('../incfiles/end.php');
?>