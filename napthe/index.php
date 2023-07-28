<?php
define('_IN_JOHNCMS', 1);
$headmod = 'mod';
require('../incfiles/core.php');
if(!$user_id){
require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
$textl = 'Nạp thẻ ';
require('../incfiles/head.php');
switch($act) {
default:
echo'<div class="phdr"> Cú pháp Nạp thẻ</div><div class="omenu"><font color="red"><b><center>TRƯỜNG HỢP NẠP LẬU KHÔNG THEO HỆ THỐNG SẼ BỊ THU HỒI VÀ KHÔNG ĐỀN BÙ</font></b></center><br>
▶ Để nạp thẻ vui lòng soạn tin nhắn theo cú pháp: <b>LT23_IDCủaBạn_SốSeri_MãPin_LoạiThẻ_MệnhGiá</b> gửi đến <a href="https://facebook.com/lethinhpro123">Facebook Admin (Le Thinh) </a> Khi đã hoàn tất Admin sẽ gửi lại bảng thẻ mã PIN của thẻ 1STPay<br>
<font color="red"><b>(*) Có thể nhận Momo, viettel pay, thẻ game, điện thoại</b></font>
</div>';




echo'<div class="phdr">Danh sách VIP</div>';
echo'<div class="omenu"> Khi nạp thẻ với mệnh giá
bất kì hệ thống sẽ lưu lại số tiền của bạn đã nạp và tính vào chỉ số VIP theo
mốc như sau:<br>
<img src="/icon/next.png"> <font color="red">[VIP1]</font> Nạp tích lũy 10.000 VND<br>
<img src="/icon/next.png"> <font color="red">[VIP2]</font> Nạp tích lũy 20.000 VND<br>
<img src="/icon/next.png"> <font color="red">[VIP3]</font> Nạp tích lũy 50.000 VND<br>
<img src="/icon/next.png"> <font color="red">[VIP4]</font> Nạp tích lũy 70.000 VND<br>
<img src="/icon/next.png"> <font color="red">[VIP5]</font> Nạp tích lũy 100.000 VND<br>
<img src="/icon/next.png"> <font color="red">[VIP6]</font> Nạp tích lũy 150.000 VND<br>
<img src="/icon/next.png"> <font color="red">[VIP7]</font> Nạp tích lũy 300.000 VND<br>
<img src="/icon/next.png"> <font color="red">[VIP8]</font> Nạp tích lũy 450.000 VND<br>
<img src="/icon/next.png"> <font color="red">[VIP9]</font> Nạp tích lũy 750.000 VND<br>
<img src="/icon/next.png"> <font color="red">[VIP10]</font> Nạp tích lũy 1.000.000 VND<br>
<b>- Vip sẽ hiển thị ở đầu tên nick của người chơi. Danh hiệu VIP này sẽ có màu
đặc trưng khác với các danh hiệu khác. Ngoài ra người chơi khi đang sở hữu VIP sẽ
được tặng các phần thưởng khác tương đương VIP mình đang có.</b>
';
echo'</br><font color="red"><b>* Lưu ý:
Bạn chỉ có thể nhận quà theo mốc VIP mà mình đang sở hữu mà thôi nhé. Bạn đang ở VIP 2 thì chỉ nhận được quà ở VIP 2 chứ không nhận được quà ở VIP 1. Vì vậy bạn nên nạp vip theo trình tự để nhận được nhiều quà hơn nhé.</b></font>';
echo'<center><span style="font-size:20px;"><font color="blue">▶ QUÀ
TẶNG KHI ĐẠT MỐC VIP ◀</font></span></center>
<b><font color="9932CC">▶ VIP1</font></b> Hào quang Vàng vĩnh viễn.<br>
<b><font color="9932CC">▶ VIP2</font></b> Hào quang Lục vĩnh viễn + 1 Cánh trái tim Hồng vĩnh viễn.<br>
<b><font color="9932CC">▶ VIP3</font></b> Hào quang Xanh vĩnh viễn + 1 cánh Xanh lục bảo vĩnh viễn<br>
<b><font color="9932CC">▶ VIP4</font></b> Sét Siêu nhân Xanh vĩnh viễn<br>
<b><font color="9932CC">▶ VIP5</font></b> Sét Heo hư hỏng vĩnh viễn<br>
<b><font color="9932CC">▶ VIP6</font></b> 1 Hào quang Thần + 1 Cánh sử thi truyền thuyết vĩnh viễn<br>
<b><font color="9932CC">▶ VIP7</font></b> SET Tôn ngộ không (gồm 6 món) vĩnh viễn<br>
<b><font color="9932CC">▶ VIP8</font></b> 1 Cánh pha lê bướm hi vọng + SET Heo hồng vĩnh viễn<br>
<b><font color="9932CC">▶ VIP9</font></b> SET Liliana vĩnh viễn<br>
<b><font color="9932CC">▶ VIP10</font></b> SET Overlord vĩnh viễn<br>
';
echo'</div>';

echo'<div class="phdr">Bảng Giá Nạp Xu</div>
<div class="omenu">
10.000 VNĐ =&gt; 2.000.000 xu<br>
20.000 VNĐ =&gt; 5.000.000 xu<br>
50.000 VNĐ =&gt; 14.000.000 xu<br>
100.000 VNĐ =&gt; 30.000.000 xu<br>
200.000 VNĐ =&gt; 70.000.000 xu<br>

500.000 VNĐ =&gt; 300.000.000 xu</div>';
echo'
<div class="phdr">Bảng Giá Nạp Lượng</div>
<div class="omenu">
10.000 VNĐ =&gt; 500 lượng - 350 lượng khóa<br>
20.000 VNĐ =&gt; 1.500 lượng - 770 lượng khóa<br>
50.000 VNĐ =&gt; 7.500 lượng - 2100 lượng khóa<br>
100.000 VNĐ =&gt; 25.000 lượng - 5250 lượng khóa<br>

200.000 VNĐ =&gt; 70.000 lượng - 11900 lượng khóa<br>

500.000 VNĐ =&gt; 200.000 lượng - 31000 lượng khóa
</div>';

echo'<div class="phdr">Chức năng thêm</div>';

echo'<div class="omenu"><img src="/icon/next.png"><a href="doibaongoc.php"> Đổi Bảo ngọc <img src="/images/vatpham/60.png"> <img src="/images/hot.gif"></a></div>

<div class="omenu"><img src="/icon/next.png"><a href="1stpay.php"> Nạp thẻ 1STPAY</a></div>
<div class="omenu"><img src="/icon/next.png"><a href="viptrian.php">  Nhận quà VIP tri ân</a></div>
<div class="omenu"><img src="/icon/next.png"><a href="?act=nhanqua"> Nhận Quà VIP</a></div>


';
break;
break;
case 'menhgia':
echo'<div class="phdr">Bảng Giá Nạp Xu</div>
<div class="omenu">
10.000 VNĐ =&gt; 2.000.000 xu<br>
20.000 VNĐ =&gt; 5.000.000 xu<br>
50.000 VNĐ =&gt; 14.000.000 xu<br>
100.000 VNĐ =&gt; 30.000.000 xu<br>
200.000 VNĐ =&gt; 70.000.000 xu<br>

500.000 VNĐ =&gt; 300.000.000 xu</div>';
echo'
<div class="phdr">Bảng Giá Nạp Lượng</div>
<div class="omenu">
10.000 VNĐ =&gt; 500 lượng - 350 lượng khóa<br>
20.000 VNĐ =&gt; 1.500 lượng - 770 lượng khóa<br>
50.000 VNĐ =&gt; 7.500 lượng - 2100 lượng khóa<br>
100.000 VNĐ =&gt; 25.000 lượng - 5250 lượng khóa<br>

200.000 VNĐ =&gt; 70.000 lượng - 11900 lượng khóa<br>

500.000 VNĐ =&gt; 200.000 lượng - 31000 lượng khóa
</div>';
break;
 case 'nhanqua':
  echo '<div class="phdr">QUÀ TẶNG MỐC VIP</div>';
   echo '<div class="list1">';

echo'<b>Đã nạp tích lũy '.number_format($datauser['naptichluy']).' VND</br>Xin chào bạn '.nick($datauser['id']).' </br>Bạn hãy nhấn vào nút nhận quà phía dưới để nhận phần thưởng cho từng mốc vip khác nhau nhé !!</b>';  
 echo '<form method="post"><input type="submit" name="submit" value="Nhận Quà" /></form> ';


if(isset($_POST['submit'])) {
	 $tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
if ($datauser['naptichluy']<10000){
	echo'<font color="red"><b>Lỗi!</b></font> Bạn chưa nạp lần nào !!';
} else 	if ($checktongruong>=$datauser['tongruong']) {
    echo'Giao dịch không thành công, rương của bạn đã đầy !!';
} else 
if ($datauser['naptichluy']>=10000 and $datauser['naptichluy']<20000 ){
	if ($datauser['vip1']>=1){
			echo'<font color="red"><b>Lỗi!</b></font> Bạn đã nhận Mốc VIP1 !!';
	} else {
	echo'Bạn đã nhận được Mốc VIP1';
mysql_query("UPDATE `users` SET `vip1`= `vip1` +'1' WHERE `id`='".$user_id."'");

	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='1391'"));

 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='0'
");
} 
}
else if ($datauser['naptichluy']>=20000 and $datauser['naptichluy']<50000 ){
	if ($datauser['vip2']>=1){
			echo'<font color="red"><b>Lỗi!</b></font> Bạn đã nhận Mốc VIP2 !!';
	} else {
	echo'Bạn đã nhận được Mốc VIP2';
mysql_query("UPDATE `users` SET `vip2`= `vip2` +'1' WHERE `id`='".$user_id."'");

	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2097'"));
	$do2=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2836'"));

 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='0'
");
 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do2[loai]."',
`id_loai`='".$do2[id_loai]."',
`tenvatpham`='".$do2[tenvatpham]."',
`id_shop`='".$do2[id]."',
`timesudung`='0'
");
} 
}
else if ($datauser['naptichluy']>=50000 and $datauser['naptichluy']<70000 ){
	if ($datauser['vip3']>=1){
			echo'<font color="red"><b>Lỗi!</b></font> Bạn đã nhận Mốc VIP3 !!';
	} else {
	echo'Bạn đã nhận được Mốc VIP3';
mysql_query("UPDATE `users` SET `vip3`= `vip3` +'1' WHERE `id`='".$user_id."'");

	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2098'"));
	$do2=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2949'"));

 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='0'
");
 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do2[loai]."',
`id_loai`='".$do2[id_loai]."',
`tenvatpham`='".$do2[tenvatpham]."',
`id_shop`='".$do2[id]."',
`timesudung`='0'
");
} 
}
else if ($datauser['naptichluy']>=70000 and $datauser['naptichluy']<100000 ){
	if ($datauser['vip4']>=1){
			echo'<font color="red"><b>Lỗi!</b></font> Bạn đã nhận Mốc VIP4 !!';
	} else {
	echo'Bạn đã nhận được Mốc VIP4';
mysql_query("UPDATE `users` SET `vip4`= `vip4` +'1' WHERE `id`='".$user_id."'");

	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2341'"));
	$do2=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2340'"));
	$do3=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2342'"));

 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='0'
");
 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do2[loai]."',
`id_loai`='".$do2[id_loai]."',
`tenvatpham`='".$do2[tenvatpham]."',
`id_shop`='".$do2[id]."',
`timesudung`='0'
");
 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do3[loai]."',
`id_loai`='".$do3[id_loai]."',
`tenvatpham`='".$do3[tenvatpham]."',
`id_shop`='".$do3[id]."',
`timesudung`='0'
");
} 
}
else if ($datauser['naptichluy']>=100000 and $datauser['naptichluy']<150000 ){
	if ($datauser['vip5']>=1){
			echo'<font color="red"><b>Lỗi!</b></font> Bạn đã nhận Mốc VIP5 !!';
	} else {
	echo'Bạn đã nhận được Mốc VIP5';
mysql_query("UPDATE `users` SET `vip5`= `vip5` +'1' WHERE `id`='".$user_id."'");

	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2932'"));
	$do2=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2931'"));
	$do3=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2933'"));

 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='0'
");
 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do2[loai]."',
`id_loai`='".$do2[id_loai]."',
`tenvatpham`='".$do2[tenvatpham]."',
`id_shop`='".$do2[id]."',
`timesudung`='0'
");
 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do3[loai]."',
`id_loai`='".$do3[id_loai]."',
`tenvatpham`='".$do3[tenvatpham]."',
`id_shop`='".$do3[id]."',
`timesudung`='0'
");
} 
}
else if ($datauser['naptichluy']>=150000 and $datauser['naptichluy']<200000 ){
	if ($datauser['vip6']>=1){
			echo'<font color="red"><b>Lỗi!</b></font> Bạn đã nhận Mốc VIP6 !!';
	} else {
	echo'Bạn đã nhận được Mốc VIP6';
mysql_query("UPDATE `users` SET `vip6`= `vip6` +'1' WHERE `id`='".$user_id."'");

	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='1697'"));
	$do2=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2937'"));

 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='0'
");
 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do2[loai]."',
`id_loai`='".$do2[id_loai]."',
`tenvatpham`='".$do2[tenvatpham]."',
`id_shop`='".$do2[id]."',
`timesudung`='0'
");

} 
}
else if ($datauser['naptichluy']>=200000 and $datauser['naptichluy']<250000 ){
	if ($datauser['vip7']>=1){
			echo'<font color="red"><b>Lỗi!</b></font> Bạn đã nhận Mốc VIP7 !!';
	} else {
	echo'Bạn đã nhận được Mốc VIP7';
mysql_query("UPDATE `users` SET `vip7`= `vip7` +'1' WHERE `id`='".$user_id."'");

	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2919'"));
	$do2=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2920'"));
	$do3=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2921'"));
	$do4=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2922'"));
	$do5=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2923'"));
	$do6=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2924'"));

 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='0'
");
 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do2[loai]."',
`id_loai`='".$do2[id_loai]."',
`tenvatpham`='".$do2[tenvatpham]."',
`id_shop`='".$do2[id]."',
`timesudung`='0'
");
 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do3[loai]."',
`id_loai`='".$do3[id_loai]."',
`tenvatpham`='".$do3[tenvatpham]."',
`id_shop`='".$do3[id]."',
`timesudung`='0'
"); mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do4[loai]."',
`id_loai`='".$do4[id_loai]."',
`tenvatpham`='".$do4[tenvatpham]."',
`id_shop`='".$do4[id]."',
`timesudung`='0'
"); mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do5[loai]."',
`id_loai`='".$do5[id_loai]."',
`tenvatpham`='".$do5[tenvatpham]."',
`id_shop`='".$do5[id]."',
`timesudung`='0'
"); mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do6[loai]."',
`id_loai`='".$do6[id_loai]."',
`tenvatpham`='".$do6[tenvatpham]."',
`id_shop`='".$do6[id]."',
`timesudung`='0'
");
} 
}
else if ($datauser['naptichluy']>=250000 and $datauser['naptichluy']<350000 ){
	if ($datauser['vip8']>=1){
			echo'<font color="red"><b>Lỗi!</b></font> Bạn đã nhận Mốc VIP8 !!';
	} else {
	echo'Bạn đã nhận được Mốc VIP8';
mysql_query("UPDATE `users` SET `vip8`= `vip8` +'1' WHERE `id`='".$user_id."'");

	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2940'"));
	$do2=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2821'"));
	$do3=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2825'"));
	$do4=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2820'"));


 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='0'
");
 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do2[loai]."',
`id_loai`='".$do2[id_loai]."',
`tenvatpham`='".$do2[tenvatpham]."',
`id_shop`='".$do2[id]."',
`timesudung`='0'
");
 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do3[loai]."',
`id_loai`='".$do3[id_loai]."',
`tenvatpham`='".$do3[tenvatpham]."',
`id_shop`='".$do3[id]."',
`timesudung`='0'
"); mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do4[loai]."',
`id_loai`='".$do4[id_loai]."',
`tenvatpham`='".$do4[tenvatpham]."',
`id_shop`='".$do4[id]."',
`timesudung`='0'
");
} 
}
else if ($datauser['naptichluy']>=350000 and $datauser['naptichluy']<500000 ){
	if ($datauser['vip9']>=1){
			echo'<font color="red"><b>Lỗi!</b></font> Bạn đã nhận Mốc VIP9 !!';
	} else {
	echo'Bạn đã nhận được Mốc VIP9';
mysql_query("UPDATE `users` SET `vip9`= `vip9` +'1' WHERE `id`='".$user_id."'");

	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2862'"));
	$do2=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2863'"));
	$do3=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2864'"));
	$do4=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2865'"));


 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='0'
");
 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do2[loai]."',
`id_loai`='".$do2[id_loai]."',
`tenvatpham`='".$do2[tenvatpham]."',
`id_shop`='".$do2[id]."',
`timesudung`='0'
");
 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do3[loai]."',
`id_loai`='".$do3[id_loai]."',
`tenvatpham`='".$do3[tenvatpham]."',
`id_shop`='".$do3[id]."',
`timesudung`='0'
"); mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do4[loai]."',
`id_loai`='".$do4[id_loai]."',
`tenvatpham`='".$do4[tenvatpham]."',
`id_shop`='".$do4[id]."',
`timesudung`='0'
");
} 
}
else if ($datauser['naptichluy']>=500000 ){
	if ($datauser['vip10']>=1){
			echo'<font color="red"><b>Lỗi!</b></font> Bạn đã nhận Mốc VIP10 !!';
	} else {
	echo'Bạn đã nhận được Mốc VIP10';
mysql_query("UPDATE `users` SET `vip10`= `vip10` +'1' WHERE `id`='".$user_id."'");

	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2716'"));
	$do2=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2714'"));
	$do3=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2713'"));
	$do4=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2712'"));

	$do5=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2711'"));

 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='0'
");
 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do2[loai]."',
`id_loai`='".$do2[id_loai]."',
`tenvatpham`='".$do2[tenvatpham]."',
`id_shop`='".$do2[id]."',
`timesudung`='0'
");
 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do3[loai]."',
`id_loai`='".$do3[id_loai]."',
`tenvatpham`='".$do3[tenvatpham]."',
`id_shop`='".$do3[id]."',
`timesudung`='0'
"); mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do4[loai]."',
`id_loai`='".$do4[id_loai]."',
`tenvatpham`='".$do4[tenvatpham]."',
`id_shop`='".$do4[id]."',
`timesudung`='0'
"); 
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do5[loai]."',
`id_loai`='".$do5[id_loai]."',
`tenvatpham`='".$do5[tenvatpham]."',
`id_shop`='".$do5[id]."',
`timesudung`='0'
");
} 
}
}



echo'</div>';
break;




}




require_once('../incfiles/end.php');
?>