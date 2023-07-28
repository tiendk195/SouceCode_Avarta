<?php
define('_IN_JOHNCMS', 1);
$textl = 'Nông trại/Trang trại';
require_once('../incfiles/core.php');
require('../incfiles/head.php');


if (!$user_id){
echo'<div class="menu">Chỉ dành cho thành viên diễn đàn! Hãy đăng ký để tham gia nhé</div>';
require('../incfiles/end.php');
exit;
}
	$madb=mysql_fetch_array(mysql_query("SELECT * FROM `nhabep_kho` WHERE `user_id`='".$user_id."' AND `chebien`='6'"));

echo'<div class="main"><div class="phantrang"><marquee>Đổi món ăn đặt biệt lấy điểm tích lũy</marquee></div>
<div class="news"><br><b><center><img src="/avatar/'.$datauser['id'].'.png" alt="'.$datauser['name'].'"><br></center><br>• Nhân Vật : <font color="#FF1493">'.$datauser['name'].'</font>
<br>• Đang Có : <font color="#FF1493"> '.$datauser['diemtichluynt'].' Điểm tích lũy</font>
<br>• Đang Có : <font color="#FF1493">'.$madb['soluong'].'  Món ăn đặc biệt <img src="icon/nhabep/6.png"></font><br>
</b></div><form action="doimonan.php?act=okay" name="but" method="post"><div class="forumlist"><b><br>
<center>1 món ăn đặc biệt <img src="icon/nhabep/6.png"> = <b>1 điểm tích lũy</b><br>
<br>Nhập số lượng muốn đổi :<br><input name="sl"><br><input type="submit" name="submit" value="Đổi"></center></b></div></form></div>';

if (isset($_POST['submit'])) {
	$sl=(int)$_POST[sl];
if ($sl > $madb['soluong']) {
	        echo'<div class="omenu"><b><font color="red">Bạn không đủ món ăn đặc biệt!!</b></font></div>';
} else 
    if ($madb['soluong']<=0) {
        echo'<div class="omenu"><b><font color="red">Bạn không đủ món ăn đặc biệt!!</b></font></div>';
    } else 
    if ($sl <=0 ) {
	        echo'<div class="omenu"><b><font color="red">Bạn chưa nhập số lượng!!</b></font></div>';
    } else {
            echo'<div class="omenu"><b><font color="red">Bạn đã đổi thành công!!
</b></font></div>';
mysql_query("UPDATE `nhabep_kho` SET `soluong` = `soluong`-'".$sl."' WHERE `user_id` = $user_id");
mysql_query("UPDATE `users` SET `diemtichluynt` = `diemtichluynt`+'".$sl."' WHERE `id` = $user_id");

    }
}
echo'</center>';

require('../incfiles/end.php');

?>