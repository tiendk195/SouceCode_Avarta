<?php
define('_IN_JOHNCMS', 1);
date_default_timezone_set('Asia/Ho_Chi_Minh');
$textl = 'Mua đá mặt trăng';
require_once ("../incfiles/core.php");
require_once ("../incfiles/head.php");
if (!$user_id) {

echo '<div class="phdr">Xin Chào Quý Khách</div>';
    echo '<div class="menu">Truy Cập Chỉ Dành Cho Thành Viên</div>';


    require_once ('../incfiles/end.php');


    exit;}
switch($_GET['act'])
{
default:
echo'<div class="phdr">Mua Đá Mặt Trăng</div>';
echo'<form action ="?act=ok" method="post">';
echo'<div class="menu">Giá: 1 Viên / 5.000.000 Xu</div>';
echo '<div class="menu">Bạn Có Muốn Mua?<br>';
echo'<input type="submit" value="Mua"></input></form></div>';
break;
case 'ok':
if($datauser['xu'] >= 5000000){
mysql_query("UPDATE `users` SET `xu`=`xu`-'5000000'  WHERE `id` = '$user_id' LIMIT 1");
mysql_query("UPDATE `users` SET `mattrang`=`mattrang`+ '1'  WHERE `id`= '$user_id' LIMIT 1");
echo'<div class="phdr">Mua đá mặt trăng</div><br>';
echo'<div class="rmenu">Mua Thành Công Rồi ...</div><br>';
echo'<div class="menu"><a href="/hawaii/muada.php"> Quay Lại </a></div><br>';
} else { 
echo'<div class="phdr">Lỗi</div><br>';
echo'<div class="menu">Bạn không đủ tiền</div>';}
break;
}
require_once ("../incfiles/end.php");
?>