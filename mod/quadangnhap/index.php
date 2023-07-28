<?PHP
define('_IN_JOHNCMS', 1);
$rootpath='../../';

require('../../incfiles/core.php');
$headmod = 'Quà đăng nhập ngày';
$noionline = 'Quà đăng nhập ngày';
$textl = 'Quà đăng nhập ngày';
require('../../incfiles/head.php');
date_default_timezone_set('asia/ho_chi_minh');
if (!$user_id){
header("Location: /");
exit;
}
echo '<div class="phdr">Đăng nhập ngày</div>';
if(isset($_GET['del'])){
mysql_query("delete from quadangnhap");
}
$qua=mysql_num_rows(mysql_query("SELECT * FROM `quadangnhap` WHERE `user_id`='".$user_id."'"));
if ($qua<1) {
mysql_query("INSERT INTO `quadangnhap` SET `user_id`='".$user_id."', `tichluy`='1'");
}
$req = mysql_query("SELECT * FROM `quadangnhap` WHERE `user_id` = '$user_id'");
while($res = mysql_fetch_array($req)){
$timetichluy = $res['time'] +3600*24;
echo'<div class="omenu">Nhận 1 điểm tích lũy vào lúc '.date("d/m/Y - H:i", $timetichluy).'</div>';
echo'<div class="omenu"> <b><font color="ff3399"> Tích lũy đăng nhập ('.$res['tichluy'].'/1) ngày </font></b><br><b><font color="blue"> Phần thưởng: </font></b> 500.000 Xu, 200 Kinh nghiệm <br>'; if($res['tichluy']>=1){if($res['1']==1){echo'<center><font color="#9932CC"> [ Đã nhận ] </font></center></div>';}else{echo'<center><a href="nhanqua.php?id=1"><font color="green"> [ Nhận thưởng ] </font></a></center></div>'; }}else{echo'<center><font color="red"> [ Chưa đủ ngày để nhận ] </font></center></div>';}
echo'<div class="omenu"> <b><font color="ff3399"> Tích lũy đăng nhập ('.$res['tichluy'].'/3) ngày </font></b><br><b><font color="blue"> Phần thưởng: </font></b> 1.000.000 Xu, 1000 Kinh nghiệm <br>'; if($res['tichluy']>=3){if($res['3']==1){echo'<center><font color="#9932CC"> [ Đã nhận ] </font></center></div>';}else{echo'<center><a href="nhanqua.php?id=3"><font color="green"> [ Nhận thưởng ] </font></a></center></div>'; }}else{echo'<center><font color="red"> [ Chưa đủ ngày để nhận ] </font></center></div>';}
echo'<div class="omenu"> <b><font color="ff3399"> Tích lũy đăng nhập ('.$res['tichluy'].'/5) ngày </font></b><br><b><font color="blue"> Phần thưởng: </font></b> 1.500.000 Xu, 1500 Kinh nghiệm<br>'; if($res['tichluy']>=5){if($res['5']==1){echo'<center><font color="#9932CC"> [ Đã nhận ] </font></center></div>';}else{echo'<center><a href="nhanqua.php?id=5"><font color="green"> [ Nhận thưởng ] </font></a></center></div>'; }}else{echo'<center><font color="red"> [ Chưa đủ ngày để nhận ] </font></center></div>';}
echo'<div class="omenu"> <b><font color="ff3399"> Tích lũy đăng nhập ('.$res['tichluy'].'/7) ngày </font></b><br><b><font color="blue"> Phần thưởng: </font></b> 2.000.000 Xu, 2000 Kinh nghiệm<br>'; if($res['tichluy']>=7){if($res['7day']==1){echo'<center><font color="#9932CC"> [ Đã nhận ] </font></center></div>';}else{echo'<center><a href="nhanqua.php?id=7"><font color="green"> [ Nhận thưởng ] </font></a></center></div>'; }}else{echo'<center><font color="red"> [ Chưa đủ ngày để nhận ] </font></center></div>';}
echo'<div class="omenu"> <b><font color="ff3399"> Tích lũy đăng nhập ('.$res['tichluy'].'/10) ngày </font></b><br><b><font color="blue"> Phần thưởng: </font></b> 2.500.000 Xu, 2500 Kinh nghiệm <br>'; if($res['tichluy']>=10){if($res['10']==1){echo'<center><font color="#9932CC"> [ Đã nhận ] </font></center></div>';}else{echo'<center><a href="nhanqua.php?id=10"><font color="green"> [ Nhận thưởng ] </font></a></center></div>'; }}else{echo'<center><font color="red"> [ Chưa đủ ngày để nhận ] </font></center></div>';}
}
require('../../incfiles/end.php');
?>